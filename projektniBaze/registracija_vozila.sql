SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `registracija_vozila`

--  `registracija`

CREATE TABLE `registracija` (
  `ID_registracija` int(11) NOT NULL,
  `ID_vozilo` int(11) NOT NULL,
  `datum_registracije` date NOT NULL,
  `datum_isteka_reg` date NOT NULL,
  `cijena_registracije` varchar(20) NOT NULL,
  `kategorija` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- podaci za `registracija`

INSERT INTO `registracija` (`ID_registracija`, `ID_vozilo`, `datum_registracije`, `datum_isteka_reg`, `cijena_registracije`, `kategorija`) VALUES
(1, 1, '2023-05-02', '2024-05-02', '450.00 KM', 'Lični automobil'),
(2, 2, '2023-05-15', '2024-05-15', '280.00 KM', 'Lični automobil'),
(3, 4, '2023-02-02', '2024-02-02', '400.00 KM', 'Lični automobil'),
(4, 3, '2023-04-02', '2024-04-02', '270.00 KM', 'Lični automobil'),
(5, 5, '2023-03-14', '2024-03-14', '290.00 KM', 'Lični automobil'),
(6, 6, '2023-06-13', '2024-06-13', '350.00 KM', 'Lični automobil'),
(7, 7, '2023-09-19', '2024-09-19', '380.00 KM', 'Lični automobil'),
(8, 8, '2023-05-15', '2024-05-15', '450.00 KM', 'Lični automobil'),
(9, 10, '2023-08-08', '2024-08-08', '270.00 KM', 'Lični automobil'),
(10, 9, '2023-08-02', '2024-08-02', '390.00 KM', 'Lični automobil'),
(11, 12, '2023-04-02', '2024-04-02', '490.00 KM', 'Lični automobil'),
(12, 11, '2023-10-04', '2024-10-04', '390.00 KM', 'Lični automobil'),
(13, 14, '2023-11-14', '2024-11-14', '270.00 KM', 'Lični automobil'),
(14, 15, '2023-10-04', '2024-10-04', '450.00 KM', 'Lični automobil'),
(15, 13, '2023-05-31', '2024-05-31', '450.00 KM', 'Lični automobil'),
(16, 16, '2023-12-12', '2024-12-12', '320.00 KM', 'Lični automobil'),
(17, 17, '2023-12-25', '2024-12-25', '270.00 KM', 'Lični automobil'),
(18, 18, '2023-06-05', '2024-06-05', '350.00 KM', 'Lični automobil'),
(19, 20, '2023-03-11', '2024-03-11', '480.00 KM', 'Lični automobil'),
(20, 19, '2023-12-12', '2024-12-12', '380.00 KM', 'Lični automobil'),
(21, 24, '2023-05-02', '2024-05-02', '450.00 KM', 'Lični automobil'),
(22, 25, '2023-04-02', '2024-04-02', '450.00 KM', 'Lični automobil'),
(23, 21, '2023-07-16', '2024-07-16', '270.00 KM', 'Lični automobil'),
(24, 22, '2023-09-19', '2024-09-19', '390.00 KM', 'Lični automobil'),
(25, 23, '2023-08-08', '2024-08-08', '490.00 KM', 'Lični automobil');

-- `vlasnik`

CREATE TABLE `vlasnik` (
  `ID_vlasnik` int(11) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL DEFAULT 'Nepoznato',
  `broj_telefona` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- podaci za`vlasnik`

INSERT INTO `vlasnik` (`ID_vlasnik`, `ime`, `prezime`, `adresa`, `broj_telefona`, `username`, `password`) VALUES
(1, 'Amar', 'Hodžić', 'Sarajevo, Titova 1', '061123456', 'amarHodzic@example.com', 'sifra12'),
(2, 'Sara', 'Hadžić', 'Mostar, Rade Bitange 2', '062234567', 'saraHadzic@example.com', 'sifra12'),
(3, 'Emir', 'Šabić', 'Tuzla, Alije Nametak 3', '063345678', 'emirSabic@example.com', 'sifra12'),
(4, 'Lejla', 'Mehić', 'Zenica, Safeta Hadžića 4', '064456789', 'lejlaMehic@example.com', 'sifra12'),
(5, 'Haris', 'Delić', 'Bihać, Prva ulica 5', '065567890', 'harisDelic@example.com', 'sifra12'),
(6, 'Emina', 'Mujkić', 'Banja Luka, Druga ulica 6', '066678901', 'eminaMujkic@example.com', 'sifra12'),
(7, 'Adnan', 'Ahmetović', 'Bijeljina, Treća ulica 7', '067789012', 'adnanAhmetovic@example.com', 'sifra12'),
(8, 'Ajla', 'Kovačević', 'Cazin, Četvrta ulica 8', '068890123', 'ajlaKovacevic@example.com', 'sifra12'),
(9, 'Nedim', 'Muratović', 'Trebinje, Peta ulica 9', '069901234', 'nedimMuratovic@example.com', 'sifra12'),
(10, 'Amela', 'Hodžić', 'Goražde, Šesta ulica 10', '060012345', 'amelaHodzic@example.com', 'sifra12'),
(11, 'Dženan', 'Hadžić', 'Livno, Sedma ulica 11', '061123450', 'dzenanHadzic@example.com', 'sifra12'),
(12, 'Amina', 'Šabić', 'Visoko, Osma ulica 12', '062234561', 'aminaSabic@example.com', 'sifra12'),
(13, 'Mirza', 'Mehić', 'Jajce, Deveta ulica 13', '063345672', 'mirzaMehic@example.com', 'sifra12'),
(14, 'Lamija', 'Delić', 'Konjic, Deseta ulica 14', '064456783', 'lamijaDelic@example.com', 'sifra12'),
(15, 'Harun', 'Mujkić', 'Cazin, Jedanaesta ulica 15', '065567894', 'harunMujkic@example.com', 'sifra12'),
(16, 'Ermina', 'Ahmetović', 'Živinice, Dvanaesta ulica 16', '066678905', 'erminaAhmetovic@example.com', 'sifra12'),
(17, 'Adisa', 'Kovačević', 'Gračanica, Trinaesta ulica 17', '067789016', 'adisaKovacevic@example.com', 'sifra12'),
(18, 'Amar', 'Muratović', 'Srebrenik, Četrnaesta ulica 18', '068890127', 'amarMuratovic@example.com', 'sifra12'),
(19, 'Emina', 'Hodžić', 'Velika Kladuša, Petnaesta ulica 19', '069901238', 'eminaHodzic@example.com', 'sifra12'),
(20, 'Lejla', 'Hadžić', 'Sarajevo, Šesnaesta ulica 20', '060012349', 'lejlaHadzic@example.com', 'sifra12'),
(21, 'Haris', 'Šabić', 'Mostar, Sedamnaesta ulica 21', '061123450', 'harisSabic@example.com', 'sifra12'),
(22, 'Nermina', 'Mehić', 'Tuzla, Osamnaesta ulica 22', '062234561', 'nerminaMehic@example.com', 'sifra12'),
(23, 'Armin', 'Delić', 'Zenica, Devetnaesta ulica 23', '063345672', 'arminDelic@example.com', 'sifra12'),
(24, 'Amra', 'Mujkić', 'Bihać, Dvadeseta ulica 24', '064456783', 'amraMujkic@example.com', 'sifra12'),
(25, 'Elvir', 'Ahmetović', 'Banja Luka, Dvadesetprva ulica 25', '065567894', 'elvirAhmetovic@example.com', 'sifra12');

--`vozilo`


CREATE TABLE `vozilo` (
  `ID_vozilo` int(11) NOT NULL,
  `ID_vlasnik` int(11) NOT NULL,
  `marka` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `godina_proizvodnje` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- podaci `vozilo`

INSERT INTO `vozilo` (`ID_vozilo`, `ID_vlasnik`, `marka`, `model`, `godina_proizvodnje`) VALUES
(1, 2, 'Audi', 'A3', '2015'),
(2, 4, 'BMW', 'X5', '2018'),
(3, 6, 'Mercedes', 'C200', '2016'),
(4, 8, 'Toyota', 'Corolla', '2017'),
(5, 10, 'Volkswagen', 'Golf', '2019'),
(6, 12, 'Ford', 'Focus', '2014'),
(7, 1, 'Honda', 'Civic', '2016'),
(8, 3, 'Nissan', 'Qashqai', '2018'),
(9, 5, 'Hyundai', ' i30', '2016'),
(10, 7, 'Kia', 'Sportage', '2015'),
(11, 9, 'Renault', 'Clio', '2016'),
(12, 11, 'Peugeot', '307', '2012'),
(13, 13, 'Citroen', ' C4', '2018 '),
(14, 14, 'Fiat', '500', '2019'),
(15, 16, 'BMW', 'X3', '2016'),
(16, 15, 'Subaru ', 'Impreza', '2017'),
(17, 20, 'Mitsubishi Lancer\', 2018', 'Lancer', '2018'),
(18, 17, 'Mercedes', 'C200', '2015'),
(19, 18, 'Ford', 'Focus', '2014'),
(20, 19, 'Audi', 'A4', '2010'),
(21, 25, 'Kia', 'Rio', '2017'),
(22, 21, 'Mercedes', 'GLA', '2017'),
(23, 22, 'Škoda', 'Superb', '2017'),
(24, 24, 'Mitsubishi ', 'Outlander', '2015'),
(25, 23, 'Seat', ' Ibiza', '2016');
--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`ID_registracija`),
  ADD KEY `Vozilo` (`ID_vozilo`);

--
-- Indexes for table `vlasnik`
--
ALTER TABLE `vlasnik`
  ADD PRIMARY KEY (`ID_vlasnik`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`ID_vozilo`),
  ADD KEY `ID_vlasnik` (`ID_vlasnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `ID_registracija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vlasnik`
--
ALTER TABLE `vlasnik`
  MODIFY `ID_vlasnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `ID_vozilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registracija`
--
ALTER TABLE `registracija`
  ADD CONSTRAINT `Vozilo` FOREIGN KEY (`ID_vozilo`) REFERENCES `vozilo` (`ID_vozilo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD CONSTRAINT `vozilo_ibfk_1` FOREIGN KEY (`ID_vlasnik`) REFERENCES `vlasnik` (`ID_vlasnik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


