-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3308
-- Χρόνος δημιουργίας: 11 Ιουν 2020 στις 22:54:25
-- Έκδοση διακομιστή: 8.0.18
-- Έκδοση PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `webvillas`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` char(5) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `account`
--

INSERT INTO `account` (`username`, `password`, `email`, `code`, `activate`) VALUES
('abc', '$6$aek159951$XuZl0LS/m9dpSoj6NXGgUzhT2N88kFza0d1SurjVEWVVhAcw9Dz0yoeO1UWQxildFHJypgkP3ScynUb3sGKNv.', 'abc@hotmail.gr', '50887', 1),
('amalias-hotel', '$6$aek159951$pOY1iBvLN/TFHpotw7SIus5/lEXwsrFeCCMqYrnYrYT9.U3g1zNbwNBpUWfDy29lZkE.WSqrwb8ImNwUQLKvR0', 'amaliasss@gmail.com', '63705', 1),
('batman', '$6$aek159951$qAWCWnmiHFvhK2/jF88XqyH19BCQcMOtvJm1H43uGEE2dAQfhZaK2lcBIogO0GCyyN8MVX0yE34KGBnBARJ6o.', 'batman@gmail.com', '39293', 1),
('maria', '$6$aek159951$aCDsepz4QMNz3JsbtZpY4x6.8id3wH.oyj7QQeK1i8lv.qIuDULtAU7GLpIOUWB/NBXEpjytyTzBvwDhUFXSU1', 'marakizafeiropoulou@gmail.com', '37662', 1),
('menron', '$6$aek159951$fgiMUd8edJt.gB6RdphoI6BFUvPTWM4NJZLvy2.TX4bIDWpmltlyfBezpj80Afp06XYJtD3oAVpo4.IHY9qqM/', 'menrongames21@gmail.com', '19734', 1),
('miltiadis', '$6$aek159951$gbmQ7Uh10VhX4/5PxP3rrDev0LwLzGRPshuUosQtI5Vx35ML4YVp8TDX00Z3lqM5V2FXfYMYsSCe/dHrieT691', 'miltiadis10000@gmail.com', '44199', 1),
('nikos', '$6$aek159951$961vq4NzhFwRXSUg3iOL7VtGej7bouCJE6YSooobGHpz.OIj4DN3EWJtQDAldS5NX3xrhH.JA81ExgGoOr3TG.', 'zaf@gmail.com', '39516', 1),
('ntina', '$6$aek159951$NBbxJS1NoKBYyeVKXGJHTcS78addP6g9hCQGnpATKLS2.ucJoGLP.qYeI3C4QSKO2Hv.guXbRVS4lmL2QpcPH1', 'ntina@hotmail.gr', '50404', 1),
('sakis', '$6$aek159951$vL8rDqda8DPJIxfgtiwABUeVHFA3bt93GEILisQDZi/DMHBEeMSyLWAaxIHwkffzR2zoSDCfTtfRsCwn98aBk/', 'schumisakis89@gmail.com', '13011', 1),
('zafeiropoulos', '$6$aek159951$waBi9E4maSt0z6bbv8icyXW1Zc2C8CxCw475z3m6Of4trC33dVaQTw6sswMaNLs2scwkioIp/7cK5BNViAqqM0', 'miltiadis10000@hotmail.gr', '48258', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `namephoto` varchar(50) NOT NULL,
  `alt` varchar(80) DEFAULT NULL,
  `villa_title` varchar(50) NOT NULL,
  `username_fk` varchar(50) NOT NULL,
  PRIMARY KEY (`namephoto`),
  KEY `fk_photo_villa1_idx` (`villa_title`),
  KEY `fk_photo_account1_idx` (`username_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `photo`
--

INSERT INTO `photo` (`namephoto`, `alt`, `villa_title`, `username_fk`) VALUES
('04095821-9E62-435D-8ED1-47773E198384.jpg', 'aqua', 'aqua', 'maria'),
('24D616AF-26C8-4A45-9203-2A9BD195E666.jpg', 'nikos_villa', 'nikos_villa', 'nikos'),
('3108FE43-2A4A-4ECF-91CE-3ADA4CEC1A1E.jpg', 'view', 'ntina_villa', 'ntina'),
('4F7B44F4-74D2-48DF-8341-38E2A9836843.jpg', 'batcave', 'batman_villa', 'batman'),
('57659D77-70B6-4235-9A4E-15F6F14BEA7C.jpg', 'front view', 'abc_villa', 'abc'),
('87FFD534-7A85-42E4-982E-FD75FFD6D8FD.jpg', 'pool', 'aqua', 'maria'),
('A7882274-4257-4DF1-AEF3-D06D477D1C28.jpg', 'amalias-hotel', 'amalias__hotel', 'amalias-hotel'),
('C091AD3E-0C65-4A13-88AC-2A0F41DF35CC.jpg', 'sea_view', 'zafeiropoulos_villa', 'zafeiropoulos'),
('ED11E13C-9D77-487D-A857-F0423A0728AD.jpg', 'villa-miltiadis', 'miltiadis_villa', 'miltiadis'),
('FBCA1E2F-7A83-49A3-B9B9-B167FEE5E7D4.jpg', 'garden', 'menron_villa', 'menron'),
('FEEB24BC-A769-40E5-B867-54100E0E451A.jpg', 'view', 'sakis_vila', 'sakis');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `villa`
--

DROP TABLE IF EXISTS `villa`;
CREATE TABLE IF NOT EXISTS `villa` (
  `title` varchar(50) NOT NULL,
  `area` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `people` smallint(6) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `rating` enum('1','2','3') NOT NULL,
  `pool` tinyint(1) DEFAULT '0',
  `gym` tinyint(1) DEFAULT '0',
  `parking` tinyint(1) DEFAULT '0',
  `sauna` tinyint(1) DEFAULT '0',
  `usernamefk` varchar(50) NOT NULL,
  PRIMARY KEY (`title`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `username_UNIQUE` (`usernamefk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `villa`
--

INSERT INTO `villa` (`title`, `area`, `address`, `phone`, `people`, `latitude`, `longitude`, `rating`, `pool`, `gym`, `parking`, `sauna`, `usernamefk`) VALUES
('abc_villa', 'Νομός Βοιωτίας-Λιβαδειά', 'kougioumitzoglou', '0000000000', 7, 0, 0, '3', 1, 0, 0, 0, 'abc'),
('amalias__hotel', 'Νομός Ηλείας-Πύργος', 'amaliada', '1111111111', 25, 0, 0, '3', 1, 1, 1, 1, 'amalias-hotel'),
('aqua', 'Νομός Δυτικής Αττικής-Ελευσίνα', 'ermou 19', '6988888888', 20, 0, 0, '3', 1, 1, 1, 1, 'maria'),
('batman_villa', 'Νομός Πειραιά-Πειραιάς', 'batcave', '1234567890', 2, 0, 0, '3', 1, 1, 1, 1, 'batman'),
('menron_villa', 'Νομός Θεσσαλονίκης-Θεσσαλονίκη', 'ermou 12', '1010101010', 25, 0, 0, '1', 0, 0, 1, 0, 'menron'),
('miltiadis_villa', 'Νομός Δυτικής Αττικής-Ελευσίνα', 'filiki etairia', '2105555555', 10, 244.414, 121.124, '2', 1, 0, 0, 1, 'miltiadis'),
('nikos_villa', 'Νομός Δυτικής Αττικής-Ελευσίνα', 'nikolaidou 20', '6666666666', 8, 0, 0, '2', 1, 0, 0, 1, 'nikos'),
('ntina_villa', 'Νομός Αχαΐας-Πάτρα', 'okeanidou', '1231231231', 9, 0, 0, '2', 1, 0, 0, 1, 'ntina'),
('sakis_vila', 'Νομός Ηλείας-Πύργος', 'pagkalou', '6986986986', 25, 0, 0, '2', 1, 0, 0, 1, 'sakis'),
('zafeiropoulos_villa', 'Νομός Δυτικής Αττικής-Ελευσίνα', 'eukleidi', '0987654321', 5, 0, 0, '3', 1, 0, 1, 1, 'zafeiropoulos');

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_photo_account1` FOREIGN KEY (`username_fk`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `fk_photo_villa1` FOREIGN KEY (`villa_title`) REFERENCES `villa` (`title`);

--
-- Περιορισμοί για πίνακα `villa`
--
ALTER TABLE `villa`
  ADD CONSTRAINT `fk_villa_account` FOREIGN KEY (`usernamefk`) REFERENCES `account` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
