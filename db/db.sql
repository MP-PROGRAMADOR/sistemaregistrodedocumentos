DROP DATABASE IF EXISTS TESORERIA;
CREATE DATABASE TESORERIA;
USE TESORERIA;

CREATE TABLE Instituciones(
    Id int(3) not null auto_increment,
    Nombre varchar(100),
    PRIMARY KEY (Id)
);

CREATE TABLE Departementos(
    Id int(3) not null auto_increment,
    Nombre varchar(80) not null,
    Telefono varchar(15),
    Email varchar(100),
    Institucion  int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Institucion) REFERENCES Instituciones (Id)
);

CREATE TABLE Empleados(
    Id int(3) not null auto_increment,
    Nombre varchar(30),
    Apellidos varchar(100),
    Telefono varchar(15),
    Email varchar(100),
    Foto varchar(10),
    Dpto int (3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Dpto) REFERENCES Departementos (Id)
);

CREATE TABLE Usuarios(
    Id int(3) not null auto_increment,
    Nombre varchar(50),
    Pass varchar(100),
    Empleado int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Empleado) REFERENCES Empleados (Id)
);

CREATE TABLE Salidas(
    Id int(3) not null auto_increment,
    NumRegistro varchar(8),
    Fecha date,
    TipoDoc varchar(50),
    Descripcion text,
    Observacion text,
    Procedencia int(3),
    Destino int(3),
    Usuario int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Procedencia) REFERENCES Departementos (Id),
    FOREIGN KEY (Destino) REFERENCES Departementos (Id),
    FOREIGN KEY (Usuario) REFERENCES Usuarios (Id)
);
CREATE TABLE Entradas(
    Id int(3) not null auto_increment,
    NumRegistro varchar(8),
    Fecha date,
    TipoDoc varchar(50),
    Descripcion text,
    Observacion text,
    Procedencia int(3),
    Destino int(3),
    Usuario int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Procedencia) REFERENCES Departementos (Id),
    FOREIGN KEY (Destino) REFERENCES Departementos (Id),
    FOREIGN KEY (Usuario) REFERENCES Usuarios (Id)
);