DROP DATABASE CampusLands;

CREATE DATABASE CampusLands;

USE CampusLands;

CREATE TABLE Paises(
    IdPais BIGINT PRIMARY KEY AUTO_INCREMENT,
    NombrePais VARCHAR(69) NOT NULL
);
INSERT INTO Paises (IdPais, NombrePais) VALUES ('123', 'Colombia'),(321, 'Venezuela');

CREATE TABLE Departamentos(
    IdDepartamento BIGINT PRIMARY KEY AUTO_INCREMENT,
    NombreDepartamento VARCHAR(50) NOT NULL,
    IdPais BIGINT NOT NULL,
    FOREIGN KEY (IdPais) REFERENCES Paises(IdPais)
);

INSERT INTO Departamentos (IdDepartamento, NombreDepartamento, IdPais) VALUES (111, 'Santander', 123), (222, 'Norte De Santander', 123), (333, 'Antioquia', 123);
/* DROP TABLE Departamentos; */

CREATE TABLE Regiones(
    IdRegion BIGINT PRIMARY KEY AUTO_INCREMENT,
    NombreRegion VARCHAR(60) NOT NULL,
    idDepartamento BIGINT NOT NULL,
    FOREIGN KEY (IdDepartamento) REFERENCES Departamentos(IdDepartamento) 
);
INSERT INTO Regiones (IdRegion, NombreRegion, idDepartamento) VALUES (111, 'Bucaramanga', 111), (222, 'Barrancabermeja', 111), (333, 'Floridablanca', 111), (444, 'Piedecuesta', 111),(123, 'Medellín', 333);

CREATE TABLE Campers(
    IdCamper BIGINT PRIMARY KEY AUTO_INCREMENT,
    NombreCamper Varchar(50) NOT NULL,
    ApellidoCamper VARCHAR(50) NOT NULL,
    FechaNacimiento DATE,
    IdRegion BIGINT NOT NULL,
    FOREIGN KEY (IdRegion) REFERENCES Regiones(IdRegion)
);

INSERT INTO Campers (IdCamper, NombreCamper, ApellidoCamper, FechaNacimiento, IdRegion) VALUES (333, 'Luis Felipe', 'Rueda García', '2003-07-24', 333), (444, 'Germán Andrés', 'Torres Cely','2005-02-10', 444), (111, 'Kevin', 'Arce','2002-02-22', 123);

DELETE FROM Campers WHERE IdCamper = 999