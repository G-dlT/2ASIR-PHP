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

-- Crear tabla de Asignaciones
CREATE TABLE Asignaciones (
    id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula INT,
    id_asignatura INT,
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

-- Insertar datos de ejemplo en la tabla de Especialidades
INSERT INTO Especialidades (nombre) VALUES
('Todos'),
('Piano'),
('Guitarra'),
('Clarinete'),
('Flauta'),
('Saxofón');

-- Insertar datos de ejemplo en la tabla de Profesores
INSERT INTO Profesores (dni, nombre, apellidos, id_especialidad, telefono, email) VALUES
('000000000', 'A determinar', '', 1, '123456001', 'default@example.com'),  -- por defecto
('12345678A', 'Carlos', 'González', 1, '123456001', 'carlos.gonzalez@example.com'),  -- Piano
('23456789B', 'María', 'López', 2, '123456002', 'maria.lopez@example.com'),          -- Guitarra
('34567890C', 'Fernando', 'Martínez', 3, '123456003', 'fernando.martinez@example.com'), -- Clarinete
('45678901D', 'Sofía', 'Ramírez', 4, '123456004', 'sofia.ramirez@example.com'),      -- Flauta
('56789012E', 'Diego', 'Hernández', 5, '123456005', 'diego.hernandez@example.com');   -- Saxofón

-- Insertar datos de ejemplo en la tabla de Asignaturas
INSERT INTO Asignaturas (nombre, nivel, tipo, id_profesor, id_especialidad) VALUES
-- Asignaturas de 1º
('Instrumento', 1, 'Individual', 1, 1),  -- Carlos González, Piano
('Lenguaje musical I', 1, 'Colectiva', 2, 2),  -- María López, Guitarra

-- Asignaturas de 2º
('Instrumento', 2, 'Individual', 1, 1),  -- Carlos González, Piano
('Lenguaje musical II', 2, 'Colectiva', 2, 2),  -- María López, Guitarra
('Música colectiva de Piano', 2, 'Colectiva', 1, 1),  -- Carlos González, Piano
('Música colectiva de Guitarra', 2, 'Colectiva', 2, 2),  -- María López, Guitarra
('Música colectiva de Clarinete', 2, 'Colectiva', 3, 3),  -- Fernando Martínez, Clarinete
('Música colectiva de Flauta', 2, 'Colectiva', 4, 4),  -- Sofía Ramírez, Flauta
('Música colectiva de Saxofón', 2, 'Colectiva', 5, 5),  -- Diego Hernández, Saxofón

-- Asignaturas de 3º
('Instrumento', 3, 'Individual', 1, 1),  -- Carlos González, Piano
('Lenguaje musical III', 3, 'Colectiva', 2, 2),  -- María López, Guitarra
('Música colectiva de Piano', 3, 'Colectiva', 1, 1),  -- Carlos González, Piano
('Música colectiva de Guitarra', 3, 'Colectiva', 2, 2),  -- María López, Guitarra
('Música colectiva de Clarinete', 3, 'Colectiva', 3, 3),  -- Fernando Martínez, Clarinete
('Música colectiva de Flauta', 3, 'Colectiva', 4, 4),  -- Sofía Ramírez, Flauta
('Música colectiva de Saxofón', 3, 'Colectiva', 5, 5),  -- Diego Hernández, Saxofón
('Coro', 3, 'Colectiva', 2, 6),  -- María López, Todos

-- Asignaturas de 4º
('Instrumento', 4, 'Individual', 1, 1),  -- Carlos González, Piano
('Lenguaje musical IV', 4, 'Colectiva', 2, 2),  -- María López, Guitarra
('Música colectiva de Piano', 4, 'Colectiva', 1, 1),  -- Carlos González, Piano
('Música colectiva de Guitarra', 4, 'Colectiva', 2, 2),  -- María López, Guitarra
('Música colectiva de Clarinete', 4, 'Colectiva', 3, 3),  -- Fernando Martínez, Clarinete
('Música colectiva de Flauta', 4, 'Colectiva', 4, 4),  -- Sofía Ramírez, Flauta
('Música colectiva de Saxofón', 4, 'Colectiva', 5, 5),  -- Diego Hernández, Saxofón
('Coro', 4, 'Colectiva', 2, 6);  -- María López, Todos

/* ------- ALUMNOS -------*/
-- Alumnos de 1º
INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) VALUES
-- Piano 1º
('12345678A', 'Juan', 'Pérez', '123456789', 'juan.perez@example.com', 'Carlos Pérez', '987654321', 'carlos.perez@example.com'),
('23456789B', 'Ana', 'Gómez', '123456780', 'ana.gomez@example.com', 'Laura Gómez', '987654320', 'laura.gomez@example.com'),

-- Guitarra 1º
('34567890C', 'Luis', 'Martínez', '123456781', 'luis.martinez@example.com', 'José Martínez', '987654319', 'jose.martinez@example.com'),
('45678901D', 'María', 'López', '123456782', 'maria.lopez@example.com', 'Sofía López', '987654318', 'sofia.lopez@example.com'),

-- Clarinete 1º
('56789012E', 'Pedro', 'Sánchez', '123456783', 'pedro.sanchez@example.com', 'Fernando Sánchez', '987654317', 'fernando.sanchez@example.com'),
('67890123F', 'Lucía', 'Ramírez', '123456784', 'lucia.ramirez@example.com', 'Elena Ramírez', '987654316', 'elena.ramirez@example.com'),

-- Flauta 1º
('78901234G', 'Javier', 'Torres', '123456785', 'javier.torres@example.com', 'Ricardo Torres', '987654315', 'ricardo.torres@example.com'),
('89012345H', 'Clara', 'Hernández', '123456786', 'clara.hernandez@example.com', 'Patricia Hernández', '987654314', 'patricia.hernandez@example.com'),

-- Saxofón 1º
('90123456I', 'Sofía', 'Martínez', '123456787', 'sofia.martinez@example.com', 'Andrés Martínez', '987654313', 'andres.martinez@example.com'),
('01234567J', 'Diego', 'García', '123456788', 'diego.garcia@example.com', 'Marta García', '987654312', 'marta.garcia@example.com');

-- Insertar matrículas para todos los alumnos de 1º en sus respectivas especialidades
INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES
(1, 1, '2023-2024', 1),  -- Juan Pérez (Piano)
(2, 1, '2023-2024', 1),  -- Ana Gómez (Piano)
(3, 1, '2023-2024', 2),  -- Luis Martínez (Guitarra)
(4, 1, '2023-2024', 2),  -- María López (Guitarra)
(5, 1, '2023-2024', 3),  -- Pedro Sánchez (Clarinete)
(6, 1, '2023-2024', 3),  -- Lucía Ramírez (Clarinete)
(7, 1, '2023-2024', 4),  -- Javier Torres (Flauta)
(8, 1, '2023-2024', 4);  -- Clara Hernández (Flauta)

-- Alumnos de 2º
INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) VALUES
-- Piano 2º
('12345678K', 'Valentina', 'Fernández', '123456789', 'valentina.fernandez@example.com', 'Luis Fernández', '987654311', 'luis.fernandez@example.com'),
('23456789L', 'Nicolás', 'Jiménez', '123456790', 'nicolas.jimenez@example.com', 'Carmen Jiménez', '987654310', 'carmen.jimenez@example.com'),

-- Guitarra 2º
('34567890M', 'Gabriel', 'Morales', '123456791', 'gabriel.morales@example.com', 'Fernando Morales', '987654309', 'fernando.morales@example.com'),
('45678901N', 'Isabella', 'Cruz', '123456792', 'isabella.cruz@example.com', 'Patricia Cruz', '987654308', 'patricia.cruz@example.com'),

-- Clarinete 2º
('56789012O', 'Mateo', 'Rojas', '123456793', 'mateo.rojas@example.com', 'Jorge Rojas', '987654307', 'jorge.rojas@example.com'),
('67890123P', 'Camila', 'Vargas', '123456794', 'camila.vargas@example.com', 'Ana Vargas', '987654306', 'ana.vargas@example.com'),

-- Flauta 2º
('78901234Q', 'Andrés', 'Mendoza', '123456795', 'andres.mendoza@example.com', 'Ricardo Mendoza', '987654305', 'ricardo.mendoza@example.com'),
('89012345R', 'Sofia', 'Pérez', '123456796', 'sofia.perez@example.com', 'Laura Pérez', '987654304', 'laura.perez@example.com'),

-- Saxofón 2º
('90123456S', 'Diego', 'Salazar', '123456797', 'diego.salazar@example.com', 'Fernando Salazar', '987654303', 'fernando.salazar@example.com'),
('01234567T', 'Lucía', 'Cordero', '123456798', 'lucia.cordero@example.com', 'Elena Cordero', '987654302', 'elena.cordero@example.com');

-- Matricula alumnos 2º
-- Insertar matrículas para todos los alumnos de 2º en sus respectivas especialidades
INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES
(9, 2, '2023-2024', 1),  -- Valentina Fernández (Piano)
(10, 2, '2023-2024', 1), -- Nicolás Jiménez (Piano)
(11, 2, '2023-2024', 2), -- Gabriel Morales (Guitarra)
(12, 2, '2023-2024', 2), -- Isabella Cruz (Guitarra)
(13, 2, '2023-2024', 3), -- Mateo Rojas (Clarinete)
(14, 2, '2023-2024', 3), -- Camila Vargas (Clarinete)
(15, 2, '2023-2024', 4), -- Andrés Mendoza (Flauta)
(16, 2, '2023-2024', 4); -- Sofía Pérez (Flauta)