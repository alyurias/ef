CREATE DATABASE bp_registracija_vozila;

--Tabela vlasnik
CREATE TABLE vlasnik(
    ID_vlasnik INT(10) PRIMARY KEY AUTO_INCREMENT,
    ime VARCHAR (25) NOT NULL,
    prezime VARCHAR(30) NOT NULL,
    adresa VARCHAR(50),
    broj_telefona VARCHAR(20) DEFAULT'Nepoznat',
    username  varchar(30) NOT NULL,
    password varchar(30) NOT NULL
);

--Tabela vozilo 
CREATE TABLE vozilo(
    ID_vozilo INT(10) PRIMARY KEY AUTO_INCREMENT,
    ID_vlasnik INT(10) NOT NULL,
    marka VARCHAR(40) NOT NULL,
    model VARCHAR(40) NOT NULL,
    godina_proizvodnje VARCHAR(20) NOT NULL,
    FOREIGN KEY(ID_vlasnik) REFERENCES vlasnik(ID_vlasnik) ON DELETE CASCADE ON UPDATE CASCADE
);

--Tabela registracija
CREATE TABLE registracija(
    ID_registracija INT(10) PRIMARY KEY AUTO_INCREMENT,
    ID_vozilo INT(10) NOT NULL,
    datum_registracije DATE NOT NULL,
    datum_isteka_reg date NOT NULL,
    cijena_registracije VARCHAR(20) NOT NULL,
    kategorija VARCHAR(30) NOT NULL,
    FOREIGN KEY (ID_vozilo) REFERENCES vozilo (ID_vozilo) ON DELETE CASCADE ON UPDATE CASCADE
);  