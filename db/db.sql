DROP DATABASE IF EXISTS TESORERIA;
CREATE DATABASE TESORERIA;
USE TESORERIA;

CREATE TABLE Instituciones(
    Id int(5) not null auto_increment,
    Nombre varchar(100),
    Nombre_Corto varchar(10),
    PRIMARY KEY (Id)
);


CREATE TABLE Departementos(
    Id int(4) not null auto_increment,
    Nombre varchar(80) not null,
    Telefono varchar(15),
    Email varchar(100),
    Institucion  int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Institucion) REFERENCES Instituciones (Id)
);


CREATE TABLE Miembros(
    Id int(4) not null auto_increment,
    Nombre varchar(60),
    Dpto int (4),
    PRIMARY KEY (Id),
    FOREIGN KEY (Dpto) REFERENCES Departementos (Id)
);

CREATE TABLE Usuarios(
    Id int(5) not null auto_increment,
    Nombre varchar(50),
    Pass varchar(100),
    Foto BLOB,
    Dpto int(4),
    Tipo_Usuario varchar(15),
    PRIMARY KEY (Id),
    FOREIGN KEY (Dpto) REFERENCES Departementos (Id)
);




CREATE TABLE Salidas(
    Id int(10) not null auto_increment,
    NumRegistro varchar(8),
    FechaRegistro date,
    TipoDoc varchar(50),
    Archivo varchar(15),
    Descripcion text,
    PalabrasClaves text,
    FechaFirma date,
    Importe varchar(20),
    Destino int(3),
    Usuario int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Destino) REFERENCES Departementos (Id),
    FOREIGN KEY (Usuario) REFERENCES Usuarios (Id)
);
CREATE TABLE Entradas(
    Id int(10) not null auto_increment,
    NumRegistro varchar(8),
    FechaRegistro date,
    TipoDoc varchar(50),
    Archivo varchar(15),
    Descripcion text,
    PalabrasClaves text,
    FechaFirma date,
    Importe varchar(20),
    Procedencia int(3),
    Usuario int(3),
    PRIMARY KEY (Id),
    FOREIGN KEY (Procedencia) REFERENCES Departementos (Id),
    FOREIGN KEY (Usuario) REFERENCES Usuarios (Id)
);

CREATE TABLE Decretos(
    Id int(20) not null auto_increment,
    Descripcion text,
    Fecha date,
    Archivo varchar(15),
    DocEntrada int(10),
    PRIMARY KEY (Id),
    FOREIGN KEY (DocEntrada) REFERENCES Entradas (Id)
);

CREATE TABLE Destino(
    Id int(15) not null auto_increment,
    Miembro int(4),
    Decreto int(20),
    PRIMARY KEY (Id),
    FOREIGN KEY (Miembro) REFERENCES Miembros (Id),
    FOREIGN KEY (Decreto) REFERENCES Decretos (Id)
);

CREATE TABLE Informe(
    Id int(20) not null auto_increment,
    Estado varchar(3),
    Descripcion text,
    Archivo varchar(15),
    Dpto int(4),
    Decreto int(20),
    PRIMARY KEY (Id),
    FOREIGN KEY (Dpto) REFERENCES Departementos (Id),
    FOREIGN KEY (Decreto) REFERENCES Decretos (Id)
);