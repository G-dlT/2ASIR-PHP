/* ------ INSERT INTOs --------*/ 

-- ESPECIALIDADES
--
-- Inserción de Especialidades
INSERT INTO Especialidades (nombre) VALUES
('Todos'),  -- Nueva especialidad añadida en primer lugar
('Piano'),
('Guitarra'),
('Clarinete'),
('Flauta'),
('Saxofón');


-- PROFESORES
-- Inserción de Profesores
--
INSERT INTO Profesores (dni, nombre, apellidos, id_especialidad, telefono, email) VALUES
('000000000', 'Sin determinar', 'Sin determinar', 1, '123456001', 'default@example.com'),  -- por defecto
('12345678A', 'Carlos', 'González', 2, '123456001', 'carlos.gonzalez@example.com'),  -- Piano
('23456789B', 'María', 'López', 3, '123456002', 'maria.lopez@example.com'),          -- Guitarra
('34567890C', 'Fernando', 'Martínez', 4, '123456003', 'fernando.martinez@example.com'), -- Clarinete
('45678901D', 'Sofía', 'Ramírez', 5, '123456004', 'sofia.ramirez@example.com'),      -- Flauta
('56789012E', 'Diego', 'Hernández', 6, '123456005', 'diego.hernandez@example.com');   -- Saxofón

-- ASIGNATURAS
--
-- Inserción de Asignaturas
INSERT INTO Asignaturas (nombre, nivel, tipo, id_profesor, id_especialidad) VALUES
-- Asignaturas de 1º
('Instrumento Piano', 1, 'Individual', 2, 2),  -- Piano (ID 2)
('Instrumento Guitarra', 1, 'Individual', 3, 3),  -- Guitarra (ID 3)
('Instrumento Clarinete', 1, 'Individual', 4, 4),  -- Clarinete (ID 4)
('Instrumento Flauta', 1, 'Individual', 5, 5),  -- Flauta (ID 5)
('Instrumento Saxofón', 1, 'Individual', 6, 6),  -- Saxofón (ID 6)
('Lenguaje musical I', 1, 'Colectiva', 2, 2),  -- Piano (ID 2)

-- Asignaturas de 2º
('Instrumento Piano', 2, 'Individual', 2, 2),  -- Piano (ID 2)
('Instrumento Guitarra', 2, 'Individual', 3, 3),  -- Guitarra (ID 3)
('Instrumento Clarinete', 2, 'Individual', 4, 4),  -- Clarinete (ID 4)
('Instrumento Flauta', 2, 'Individual', 5, 5),  -- Flauta (ID 5)
('Instrumento Saxofón', 2, 'Individual', 6, 6),  -- Saxofón (ID 6)
('Lenguaje musical II', 2, 'Colectiva', 4, 4),  -- Flauta (ID 5)
('Música colectiva de Piano', 2, 'Colectiva', 2, 2),  -- Piano (ID 2)
('Música colectiva de Guitarra', 2, 'Colectiva', 3, 3),  -- Guitarra (ID 3)
('Música colectiva de Clarinete', 2, 'Colectiva', 4, 4),  -- Clarinete (ID 4)
('Música colectiva de Flauta', 2, 'Colectiva', 5, 5),  -- Flauta (ID 5)
('Música colectiva de Saxofón', 2, 'Colectiva', 6, 6),  -- Saxofón (ID 6)

-- Asignaturas de 3º
('Instrumento Piano', 3, 'Individual', 2, 2),  -- Piano (ID 2)
('Instrumento Guitarra', 3, 'Individual', 3, 3),  -- Guitarra (ID 3)
('Instrumento Clarinete', 3, 'Individual', 4, 4),  -- Clarinete (ID 4)
('Instrumento Flauta', 3, 'Individual', 5, 5),  -- Flauta (ID 5)
('Instrumento Saxofón', 3, 'Individual', 6, 6),  -- Saxofón (ID 6)
('Lenguaje musical III', 3, 'Colectiva', 4, 4),  -- Flauta (ID 5)
('Música colectiva de Piano', 3, 'Colectiva', 2, 2),  -- Piano (ID 2)
('Música colectiva de Guitarra', 3, 'Colectiva', 3, 3),  -- Guitarra (ID 3)
('Música colectiva de Clarinete', 3, 'Colectiva', 4, 4),  -- Clarinete (ID 4)
('Música colectiva de Flauta', 3, 'Colectiva', 5, 5),  -- Flauta (ID 5)
('Música colectiva de Saxofón', 3, 'Colectiva', 6, 6),  -- Saxofón (ID 6)
('Coro', 3, 'Colectiva', 2, 1),  -- Coro para Todos (ID 1)

-- Asignaturas de 4º
('Instrumento Piano', 4, 'Individual', 2, 2),  -- Piano (ID 2)
('Instrumento Guitarra', 4, 'Individual', 3, 3),  -- Guitarra (ID 3)
('Instrumento Clarinete', 4, 'Individual', 4, 4),  -- Clarinete (ID 4)
('Instrumento Flauta', 4, 'Individual', 5, 5),  -- Flauta (ID 5)
('Instrumento Saxofón', 4, 'Individual', 6, 6),  -- Saxofón (ID 6)
('Lenguaje musical IV', 4, 'Colectiva', 4, 4),  -- Flauta (ID 5)
('Música colectiva de Piano', 4, 'Colectiva', 2, 2),  -- Piano (ID 2)
('Música colectiva de Guitarra', 4, 'Colectiva', 3, 3),  -- Guitarra (ID 3)
('Música colectiva de Clarinete', 4, 'Colectiva', 4, 4),  -- Clarinete (ID 4)
('Música colectiva de Flauta', 4, 'Colectiva', 5, 5),  -- Flauta (ID 5)
('Música colectiva de Saxofón', 4, 'Colectiva', 6, 6),  -- Saxofón (ID 6)
('Coro', 4, 'Colectiva', 2, 1);  -- Coro para Todos (ID 1)

-- ALUMNOS
-- Alumnos de 1º
--
INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) VALUES
-- Piano 1º
('11111111A', 'Juan', 'Pérez', '123456789', 'juan.perez@example.com', 'Carlos Pérez', '987654321', 'carlos.perez@example.com'),
('11111112B', 'Ana', 'Gómez', '123456780', 'ana.gomez@example.com', 'Laura Gómez', '987654320', 'laura.gomez@example.com'),

-- Guitarra 1º
('11111113C', 'Luis', 'Martínez', '123456781', 'luis.martinez@example.com', 'José Martínez', '987654319', 'jose.martinez@example.com'),
('11111114D', 'María', 'López', '123456782', 'maria.lopez@example.com', 'Sofía López', '987654318', 'sofia.lopez@example.com'),

-- Clarinete 1º
('11111115E', 'Pedro', 'Sánchez', '123456783', 'pedro.sanchez@example.com', 'Fernando Sánchez', '987654317', 'fernando.sanchez@example.com'),
('11111116F', 'Lucía', 'Ramírez', '123456784', 'lucia.ramirez@example.com', 'Elena Ramírez', '987654316', 'elena.ramirez@example.com'),

-- Flauta 1º
('11111117G', 'Javier', 'Torres', '123456785', 'javier.torres@example.com', 'Ricardo Torres', '987654315', 'ricardo.torres@example.com'),
('11111118H', 'Clara', 'Hernández', '123456786', 'clara.hernandez@example.com', 'Patricia Hernández', '987654314', 'patricia.hernandez@example.com'),

-- Saxofón 1º
('11111119I', 'Sofía', 'Martínez', '123456787', 'sofia.martinez@example.com', 'Andrés Martínez', '987654313', 'andres.martinez@example.com'),
('11111120J', 'Diego', 'García', '123456788', 'diego.garcia@example.com', 'Marta García', '987654312', 'marta.garcia@example.com');

-- Alumnos de 2º
INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) VALUES
-- Piano 2º
('22222221A', 'Valentina', 'Fernández', '123456789', 'valentina.fernandez@example.com', 'Luis Fernández', '987654311', 'luis.fernandez@example.com'),
('22222222B', 'Nicolás', 'Jiménez', '123456790', 'nicolas.jimenez@example.com', 'Carmen Jiménez', '987654310', 'carmen.jimenez@example.com'),

-- Guitarra 2º
('22222223C', 'Gabriel', 'Morales', '123456791', 'gabriel.morales@example.com', 'Fernando Morales', '987654309', 'fernando.morales@example.com'),
('22222224D', 'Isabella', 'Cruz', '123456792', 'isabella.cruz@example.com', 'Patricia Cruz', '987654308', 'patricia.cruz@example.com'),

-- Clarinete 2º
('22222225E', 'Mateo', 'Rojas', '123456793', 'mateo.rojas@example.com', 'Jorge Rojas', '987654307', 'jorge.rojas@example.com'),
('22222226F', 'Camila', 'Vargas', '123456794', 'camila.vargas@example.com', 'Ana Vargas', '987654306', 'ana.vargas@example.com'),

-- Flauta 2º
('22222227G', 'Andrés', 'Mendoza', '123456795', 'andres.mendoza@example.com', 'Ricardo Mendoza', '987654305', 'ricardo.mendoza@example.com'),
('22222228H', 'Sofia', 'Pérez', '123456796', 'sofia.perez@example.com', 'Laura Pérez', '987654304', 'laura.perez@example.com'),

-- Saxofón 2º
('22222229I', 'Diego', 'Salazar', '123456797', 'diego.salazar@example.com', 'Fernando Salazar', '987654303', 'fernando.salazar@example.com'),
('22222230J', 'Lucía', 'Cordero', '123456798', 'lucia.cordero@example.com', 'Elena Cordero', '987654302', 'elena.cordero@example.com');

-- Alumnos de 3º
INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) VALUES
-- Piano 3º
('33333331A', 'Fernando', 'González', '123456799', 'fernando.gonzalez@example.com', 'Carlos González', '987654301', 'carlos.gonzalez@example.com'),
('33333332B', 'Lucía', 'Hernández', '123456800', 'lucia.hernandez@example.com', 'Laura Hernández', '987654300', 'laura.hernandez@example.com'),

-- Guitarra 3º
('33333333C', 'Javier', 'Torres', '123456801', 'javier.torres@example.com', 'José Torres', '987654299', 'jose.torres@example.com'),
('33333334D', 'Clara', 'Ramírez', '123456802', 'clara.ramirez@example.com', 'Patricia Ramírez', '987654298', 'patricia.ramirez@example.com'),

-- Clarinete 3º
('33333335E', 'Diego', 'Martínez', '123456803', 'diego.martinez@example.com', 'Fernando Martínez', '987654297', 'fernando.martinez@example.com'),
('33333336F', 'Sofía', 'López', '123456804', 'sofia.lopez@example.com', 'Ana López', '987654296', 'ana.lopez@example.com'),

-- Flauta 3º
('33333337G', 'Mateo', 'García', '123456805', 'mateo.garcia@example.com', 'Ricardo García', '987654295', 'ricardo.garcia@example.com'),
('33333338H', 'Isabella', 'Cruz', '123456806', 'isabella.cruz@example.com', 'Laura Cruz', '987654294', 'laura.cruz@example.com'),

-- Saxofón 3º
('33333339I', 'Gabriel', 'Salazar', '123456807', 'gabriel.salazar@example.com', 'Fernando Salazar', '987654293', 'fernando.salazar@example.com'),
('33333340J', 'Ana', 'Vargas', '123456808', 'ana.vargas@example.com', 'Elena Vargas', '987654292', 'elena.vargas@example.com');

-- Alumnos de 4º
INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) VALUES
-- Piano 4º
('44444441A', 'Valeria', 'Fernández', '123456809', 'valeria.fernandez@example.com', 'Luis Fernández', '987654291', 'luis.fernandez@example.com'),
('44444442B', 'Nicolás', 'Jiménez', '123456810', 'nicolas.jimenez@example.com', 'Carmen Jiménez', '987654290', 'carmen.jimenez@example.com'),

-- Guitarra 4º
('44444443C', 'Gabriel', 'Morales', '123456811', 'gabriel.morales@example.com', 'Fernando Morales', '987654289', 'fernando.morales@example.com'),
('44444444D', 'Isabella', 'Cruz', '123456812', 'isabella.cruz@example.com', 'Patricia Cruz', '987654288', 'patricia.cruz@example.com'),

-- Clarinete 4º
('44444445E', 'Mateo', 'Rojas', '123456813', 'mateo.rojas@example.com', 'Jorge Rojas', '987654287', 'jorge.rojas@example.com'),
('44444446F', 'Camila', 'Vargas', '123456814', 'camila.vargas@example.com', 'Ana Vargas', '987654286', 'ana.vargas@example.com'),

-- Flauta 4º
('44444447G', 'Andrés', 'Mendoza', '123456815', 'andres.mendoza@example.com', 'Ricardo Mendoza', '987654285', 'ricardo.mendoza@example.com'),
('44444448H', 'Sofia', 'Pérez', '123456816', 'sofia.perez@example.com', 'Laura Pérez', '987654284', 'laura.perez@example.com'),

-- Saxofón 4º
('44444449I', 'Diego', 'Salazar', '123456817', 'diego.salazar@example.com', 'Fernando Salazar', '987654283', 'fernando.salazar@example.com'),
('44444450J', 'Lucía', 'Cordero', '123456818', 'lucia.cordero@example.com', 'Elena Cordero', '987654282', 'elena.cordero@example.com');

-- Inserción de Matrículas
-- Alumnos de 1º
INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES
(1, 1, '2023-2024', 2),  -- Juan Pérez (Piano)
(2, 1, '2023-2024', 2),  -- Ana Gómez (Piano)
(3, 1, '2023-2024', 3),  -- Luis Martínez (Guitarra)
(4, 1, '2023-2024', 3),  -- María López (Guitarra)
(5, 1, '2023-2024', 4),  -- Pedro Sánchez (Clarinete)
(6, 1, '2023-2024', 4),  -- Lucía Ramírez (Clarinete)
(7, 1, '2023-2024', 5),  -- Javier Torres (Flauta)
(8, 1, '2023-2024', 5),  -- Clara Hernández (Flauta)
(9, 1, '2023-2024', 6),  -- Sofía Martínez (Saxofón)
(10, 1, '2023-2024', 6);  -- Diego García (Saxofón)

-- Alumnos de 2º
INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES
(11, 2, '2023-2024', 2),  -- Valentina Fernández (Piano)
(12, 2, '2023-2024', 2),  -- Nicolás Jiménez (Piano)
(13, 2, '2023-2024', 3),  -- Gabriel Morales (Guitarra)
(14, 2, '2023-2024', 3),  -- Isabella Cruz (Guitarra)
(15, 2, '2023-2024', 4),  -- Mateo Rojas (Clarinete)
(16, 2, '2023-2024', 4),  -- Camila Vargas (Clarinete)
(17, 2, '2023-2024', 5),  -- Andrés Mendoza (Flauta)
(18, 2, '2023-2024', 5),  -- Sofía Pérez (Flauta)
(19, 2, '2023-2024', 6),  -- Diego Salazar (Saxofón)
(20, 2, '2023-2024', 6);  -- Lucía Cordero (Saxofón)

-- Alumnos de 3º
INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES
(21, 3, '2023-2024', 2),  -- Fernando González (Piano)
(22, 3, '2023-2024', 2),  -- Lucía Hernández (Piano)
(23, 3, '2023-2024', 3),  -- Javier Torres (Guitarra)
(24, 3, '2023-2024', 3),  -- Clara Ramírez (Guitarra)
(25, 3, '2023-2024', 4),  -- Diego Martínez (Clarinete)
(26, 3, '2023-2024', 4),  -- Sofía López (Clarinete)
(27, 3, '2023-2024', 5),  -- Mateo García (Flauta)
(28, 3, '2023-2024', 5),  -- Isabella Cruz (Flauta)
(29, 3, '2023-2024', 6),  -- Gabriel Salazar (Saxofón)
(30, 3, '2023-2024', 6);  -- Ana Vargas (Saxofón)

-- Alumnos de 4º
INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES
(31, 4, '2023-2024', 2),  -- Valeria Fernández (Piano)
(32, 4, '2023-2024', 2),  -- Nicolás Jiménez (Piano)
(33, 4, '2023-2024', 3),  -- Gabriel Morales (Guitarra)
(34, 4, '2023-2024', 3),  -- Isabella Cruz (Guitarra)
(35, 4, '2023-2024', 4),  -- Mateo Rojas (Clarinete)
(36, 4, '2023-2024', 4),  -- Camila Vargas (Clarinete)
(37, 4, '2023-2024', 5),  -- Andrés Mendoza (Flauta)
(38, 4, '2023-2024', 5),  -- Sofía Pérez (Flauta)
(39, 4, '2023-2024', 6),  -- Diego Salazar (Saxofón)
(40, 4, '2023-2024', 6);  -- Lucía Cordero (Saxofón)