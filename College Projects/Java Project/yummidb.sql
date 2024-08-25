CREATE DATABASE IF NOT EXISTS `yummidb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yummidb`;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `KategorijaID` int(11) NOT NULL AUTO_INCREMENT,
  `NazivKategorije` varchar(30) NOT NULL,
  `Program` varchar(10) NOT NULL,
  PRIMARY KEY (`KategorijaID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`KategorijaID`, `NazivKategorije`, `Program`) VALUES
(1, 'Main Dish', 'slani'),
(2, 'Desserts', 'slatki');


--
-- Triggers `kategorije`
--
DELIMITER $$
CREATE TRIGGER `IzbrisiKategorijeProizvoda` BEFORE DELETE ON `kategorije` FOR EACH ROW UPDATE `proizvodi` SET `KategorijaID` = 0 WHERE OLD.`KategorijaID` = proizvodi.KategorijaID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `KorisnickoIme` varchar(50) NOT NULL,
  `Ime` varchar(30) NOT NULL,
  `Prezime` varchar(30) NOT NULL,
  `Adresa` varchar(30) NOT NULL,
  `Poeni` int(11) NOT NULL,
  `PasswordHash` varchar(50) NOT NULL,
  `RolaID` int(11) NOT NULL,
  PRIMARY KEY (`KorisnickoIme`),
  KEY `FK_Korisnik_Rola` (`RolaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`KorisnickoIme`, `Ime`, `Prezime`, `Adresa`, `Poeni`, `PasswordHash`, `RolaID`) VALUES
('Stefan', 'Stefan', 'Dramicanin', 'Svetozara Miletica 91', 30, '202cb962ac59075b964b07152d234b70', 1),
('Mihajlo', 'Mihajlo', 'Dramicanin', 'Svetozara Miletica 91', 0, '202cb962ac59075b964b07152d234b70', 3);

--
-- Triggers `korisnici`
--
DELIMITER $$
CREATE TRIGGER `IzbrisiNarudzbe` BEFORE DELETE ON `korisnici` FOR EACH ROW UPDATE narudzbine SET narudzbine.KorisnickoIme = 'izbrisani' WHERE narudzbine.KorisnickoIme = OLD.KorisnickoIme
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine`
--

CREATE TABLE IF NOT EXISTS `narudzbine` (
  `NarudzbinaID` int(11) NOT NULL AUTO_INCREMENT,
  `KorisnickoIme` varchar(50) NOT NULL,
  `DatumKreiranja` date NOT NULL,
  `DatumOstvarivanja` date DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `UkupnaCena` int(11) NOT NULL,
  `Popust` int(11) NOT NULL,
  PRIMARY KEY (`NarudzbinaID`) USING BTREE,
  KEY `FK_Narudzbina_Korisnik` (`KorisnickoIme`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narudzbine`
--

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE IF NOT EXISTS `proizvodi` (
  `ProizvodID` int(11) NOT NULL AUTO_INCREMENT,
  `NazivProizvoda` varchar(30) NOT NULL,
  `Opis` varchar(256) NOT NULL,
  `Slika` varchar(50) NOT NULL,
  `CenaPoPorciji` int(11) NOT NULL,
  `KategorijaID` int(11) NOT NULL,
  PRIMARY KEY (`ProizvodID`),
  KEY `FK_Proizvodi_Kategorije` (`KategorijaID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`ProizvodID`, `NazivProizvoda`, `Opis`, `Slika`, `CenaPoPorciji`, `KategorijaID`) VALUES
(1, 'Chicken Burger', 'A Chicken Burger is a tasty sandwich with a chicken patty, lettuce, tomatoes, and sauces in a soft bun.', 'chickenBurger.jpg', 9.99, 1),
(2, 'Dumblings', 'Dumplings are bite-sized pieces of dough filled with meat, vegetables, or sweets, often steamed, boiled, or fried.', 'dumblings.jpg', 5.69, 1),
(3, 'Scampi in tomato sauce', 'Scampi in tomato sauce is a flavorful dish featuring shrimp cooked in a rich, tangy tomato sauce, often seasoned with garlic and herbs.', 'scampiInTomato Sauce.jpg', 18.99, 1),
(4, 'Vegan Pad Thai', 'Vegan Pad Thai is a stir-fried noodle dish made with rice noodles, tofu, vegetables, and a tangy-sweet sauce, garnished with peanuts and lime.', 'veganPadThai.jpg', 5.10, 1),
(5, 'Chocolate cupcake', 'A chocolate cupcake is a small, rich, and moist cake flavored with chocolate, often topped with creamy chocolate frosting.', 'chocolateCupcake.jpg', 2.50, 2),
(6, 'Oreo donut', 'An Oreo donut is a donut topped with Oreo cookie crumbles, often filled or glazed with a sweet cream.', 'oreoDonut.jpg', 2.20, 2),
(7, 'Chocolate Lava Cake', 'Chocolate Lava Cake is a rich dessert with a gooey, molten chocolate center, often served warm with ice cream.', 'lavaCake.jpg', 3.10, 2);



--
-- Triggers `proizvodi`
--
DELIMITER $$
CREATE TRIGGER `IzbrisiStavke` BEFORE DELETE ON `proizvodi` FOR EACH ROW UPDATE stavkenarudzbine SET `ProizvodID` = 0 WHERE OLD.`ProizvodID` = stavkenarudzbine.ProizvodID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `RolaID` int(11) NOT NULL AUTO_INCREMENT,
  `NazivRole` varchar(50) NOT NULL,
  PRIMARY KEY (`RolaID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RolaID`, `NazivRole`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `stavkenarudzbine`
--

CREATE TABLE IF NOT EXISTS `stavkenarudzbine` (
  `ProizvodID` int(11) NOT NULL,
  `NarudzbinaID` int(11) NOT NULL,
  `Kolicina` int(11) NOT NULL,
  PRIMARY KEY (`ProizvodID`,`NarudzbinaID`) USING BTREE,
  KEY `FK_Stavke_Narudzbe` (`NarudzbinaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `FK_Korisnik_Rola` FOREIGN KEY (`RolaID`) REFERENCES `role` (`RolaID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD CONSTRAINT `FK_Narudzbina_Korisnik` FOREIGN KEY (`KorisnickoIme`) REFERENCES `korisnici` (`KorisnickoIme`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `FK_Proizvodi_Kategorije` FOREIGN KEY (`KategorijaID`) REFERENCES `kategorije` (`KategorijaID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stavkenarudzbine`
--
ALTER TABLE `stavkenarudzbine`
  ADD CONSTRAINT `FK_Stavke_Narudzbe` FOREIGN KEY (`NarudzbinaID`) REFERENCES `narudzbine` (`NarudzbinaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Stavke_Proizvodi` FOREIGN KEY (`ProizvodID`) REFERENCES `proizvodi` (`ProizvodID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
