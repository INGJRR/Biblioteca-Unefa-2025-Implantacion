CREATE DATABASE Biblioteca1_0;
USE Biblioteca1_0;

CREATE TABLE carreras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    fecha_apertura DATE,
    activo TINYINT(1)
);



CREATE TABLE estudiantes (
    cedula INT PRIMARY KEY,
	nombre VARCHAR(50),
    apellido VARCHAR(50),
    fecha_nacimiento DATE,
    direccion TEXT,
    telefono VARCHAR(20),
    gmail VARCHAR(50),
	estado ENUM('activo', 'inactivo'),
    moroso BOOLEAN,
    semestre_actual INT,
    id_carrera int,
	FOREIGN KEY (id_carrera) REFERENCES carreras(id)
);

CREATE TABLE profesores (
    cedula INT PRIMARY KEY, -- Asumimos que 'cedula' es la clave primaria en la tabla 'persona'
	nombre VARCHAR(50),
    apellido VARCHAR(50),
    fecha_nacimiento DATE,
    direccion TEXT,
    telefono VARCHAR(20),
    gmail VARCHAR(50),
	estado boolean,
    moroso BOOLEAN
);

CREATE TABLE libros (
	cota varchar(15) PRIMARY KEY ,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    tipo_libro varchar(100),
    fecha DATE,
    carrera VARCHAR(255),
    fecha_registro DATE,
    cantidad INT,
    editorial VARCHAR(100)
);

CREATE TABLE pasantias (
	cota varchar(15) PRIMARY KEY ,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    tutor VARCHAR(255),
    fecha_presentacion DATE,
    carrera VARCHAR(255),
    fecha_registro DATE,
    cantidad INT,
    
    tutor_comunitario VARCHAR(100),
    lugar VARCHAR(255)
);

CREATE TABLE trabajos_investigacion (
	cota varchar(15) PRIMARY KEY ,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    tutor VARCHAR(255),
    fecha_presentacion DATE,
    carrera VARCHAR(255),
    fecha_registro DATE,
    cantidad INT,
    
    linea_investigacion VARCHAR(255),
    mencion VARCHAR(255),
    metodologia TEXT,
    metodo VARCHAR(255),
    tipo ENUM('post', 'pre'),
    palabras_claves TEXT,
    nivel_academico ENUM('Trabajo de investigacion', 'Tesis')
);

CREATE TABLE trabajos_investigacion (
	cota varchar(15) PRIMARY KEY ,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    tutor VARCHAR(255),
    fecha_presentacion DATE,
    carrera VARCHAR(255),
    fecha_registro DATE,
    cantidad INT,
    
    linea_investigacion VARCHAR(255),
    mencion VARCHAR(255),
    metodologia TEXT,
    metodo VARCHAR(255),
    tipo ENUM('post', 'pre'),
    palabras_claves TEXT,
    nivel_academico ENUM('Trabajo de investigacion', 'Tesis')
);



CREATE TABLE usuarios (
    cedula INT PRIMARY KEY,
    rol VARCHAR(50),
    fecha_creacion DATE,
    usuario VARCHAR(50),
    clave VARCHAR(255)
);

CREATE TABLE obreros (
    cedula INT PRIMARY KEY, -- Asumimos que 'cedula' es la clave primaria en la tabla 'persona'
	nombre VARCHAR(50),
    apellido VARCHAR(50),
    fecha_nacimiento DATE,
    direccion TEXT,
    telefono VARCHAR(20),
    gmail VARCHAR(50),
	estado boolean,
    moroso BOOLEAN
);

CREATE TABLE prestamos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cedula_persona INT,
    tipo_persona varchar(100),
    cota_documento varchar(100),
    tipo_documento varchar(100),
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion DATE NOT NULL,
    estado ENUM('Prestado', 'Devuelto') NOT NULL DEFAULT 'Prestado',
    observaciones TEXT,
    usuario_registro VARCHAR(50)
);
