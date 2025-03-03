-- Crear la base de datos
DROP DATABASE IF EXISTS EscuelaMusica5;
CREATE DATABASE EscuelaMusica5;
USE EscuelaMusica5;

-- Crear tabla de Especialidades
CREATE TABLE Especialidades (
    id_especialidad INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

-- Crear tabla de Alumnos
CREATE TABLE Alumnos (
    id_alumno INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(9) NOT NULL UNIQUE,  -- Agregado campo DNI
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    telefono VARCHAR(15),
    email VARCHAR(100),
    nombre_padre VARCHAR(100),
    telefono_padre VARCHAR(15),
    email_padre VARCHAR(100)
);

-- Crear tabla de Profesores
CREATE TABLE Profesores (
    id_profesor INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(9) NOT NULL UNIQUE,  -- Agregado campo DNI
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    id_especialidad INT,
    telefono VARCHAR(15),
    email VARCHAR(100),
    FOREIGN KEY (id_especialidad) REFERENCES Especialidades(id_especialidad)
);

-- Crear tabla de Asignaturas
CREATE TABLE Asignaturas (
    id_asignatura INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nivel TINYINT NOT NULL,
    tipo ENUM('Individual', 'Colectiva') NOT NULL,
    id_profesor INT DEFAULT 1,
    id_especialidad INT,
    FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor) ON DELETE SET NULL,
    FOREIGN KEY (id_especialidad) REFERENCES Especialidades(id_especialidad) ON DELETE SET NULL
);

-- Crear tabla de Matriculas
CREATE TABLE Matriculas (
    id_matricula INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT,
    nivel TINYINT NOT NULL,
    curso_escolar VARCHAR(20) NOT NULL,
    id_especialidad INT,
    FOREIGN KEY (id_alumno) REFERENCES Alumnos(id_alumno) ON DELETE CASCADE,
    FOREIGN KEY (id_especialidad) REFERENCES Especialidades(id_especialidad) ON DELETE SET NULL
);

-- Crear tabla de Asignaciones con campo de nota final
CREATE TABLE Asignaciones (
    id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula INT,
    id_asignatura INT,
    nota_trimestre1 FLOAT NULL,
    nota_trimestre2 FLOAT NULL,
    nota_trimestre3 FLOAT NULL,
    nota_final FLOAT NULL, -- Este campo se calculará mediante PHP
    FOREIGN KEY (id_matricula) REFERENCES Matriculas(id_matricula) ON DELETE CASCADE,
    FOREIGN KEY (id_asignatura) REFERENCES Asignaturas(id_asignatura) ON DELETE SET NULL
);


/* -------TRIGGERS--------*/ 

-- Comprobación de la existencia previa del alumno por el DNI
DELIMITER //
CREATE TRIGGER verificar_dni_alumno
BEFORE INSERT ON Alumnos
FOR EACH ROW
BEGIN
    DECLARE dni_existente INT;

    -- Comprobar si el DNI ya existe
    SELECT COUNT(*)
    INTO dni_existente
    FROM Alumnos
    WHERE dni = NEW.dni;

    -- Si el DNI ya existe, lanzar un error
    IF dni_existente > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un alumno con el mismo DNI.';
    END IF;
END;
//

DELIMITER ;
-- Comprobación 1 matricula por alumno en un curso escolar
DELIMITER //

CREATE TRIGGER check_student_enrollment
BEFORE INSERT ON Matriculas
FOR EACH ROW
BEGIN
    DECLARE existing_count INT;

    -- Check if the student is already enrolled in the same academic year
    SELECT COUNT(*)
    INTO existing_count
    FROM Matriculas
    WHERE id_alumno = NEW.id_alumno
      AND curso_escolar = NEW.curso_escolar;

    -- If the count is greater than 0, raise an error
    IF existing_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El alumno ya está matriculado en otro curso o especialidad para el año escolar actual.';
    END IF;
END; //

DELIMITER ;
-- Asignacion automática de asignaturas según nivel
DELIMITER //
CREATE TRIGGER asignar_asignaturas_alumnos
AFTER INSERT ON Matriculas
FOR EACH ROW
BEGIN
    DECLARE id_asignatura INT;
    
    -- Asignar Instrumento según nivel y especialidad
    INSERT INTO Asignaciones (id_matricula, id_asignatura)
    SELECT NEW.id_matricula, a.id_asignatura
    FROM Asignaturas a
    WHERE a.nivel = NEW.nivel AND a.tipo = 'Individual' AND a.id_especialidad = NEW.id_especialidad;
    
    -- Asignar Lenguaje Musical según nivel
    INSERT INTO Asignaciones (id_matricula, id_asignatura)
    SELECT NEW.id_matricula, a.id_asignatura
    FROM Asignaturas a
    WHERE a.nivel = NEW.nivel AND a.nombre LIKE 'Lenguaje musical%';
    
    -- Asignar Música Colectiva para alumnos de 2º, 3º y 4º
    IF NEW.nivel >= 2 THEN
        INSERT INTO Asignaciones (id_matricula, id_asignatura)
        SELECT NEW.id_matricula, a.id_asignatura
        FROM Asignaturas a
        WHERE a.nivel = NEW.nivel AND a.tipo = 'Colectiva' AND a.id_especialidad = NEW.id_especialidad 
        AND a.nombre LIKE 'Música colectiva%';
    END IF;
    
    -- Asignar Coro para alumnos de 3º y 4º
    IF NEW.nivel >= 3 THEN
        INSERT INTO Asignaciones (id_matricula, id_asignatura)
        SELECT NEW.id_matricula, a.id_asignatura
        FROM Asignaturas a
        WHERE a.nivel = NEW.nivel AND a.nombre = 'Coro';
    END IF;
END;
//
DELIMITER ;
