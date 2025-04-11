-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centar_za_polise_i_stete_webportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `brokerska_kuca`
--

CREATE TABLE `brokerska_kuca` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brokerska_kuca_procenti`
--

CREATE TABLE `brokerska_kuca_procenti` (
  `id` int(11) NOT NULL,
  `brokerska_kuca_id` int(11) NOT NULL,
  `procenat` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE `klijent` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(255) NOT NULL,
  `kontakt` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jmbg` varchar(13) NOT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `mesto` varchar(100) DEFAULT NULL,
  `punomoc_procenat` decimal(10,2) DEFAULT 0.00,
  `punomoc_dinara` decimal(20,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`id`, `ime_prezime`, `kontakt`, `email`, `jmbg`, `adresa`, `mesto`, `punomoc_procenat`, `punomoc_dinara`) VALUES
(14, 'Stefan Dramicanin', '+3816332095', 'dramicanin.stefan@gmail.com', '0105002860011', 'Svetozara Miletića 91', 'Pančevo', 15.00, 0.00),
(15, 'Mihajlo Dramicanin', '+381653320955', '', '2004005860019', 'Svetozara Miletića 91, 15', 'Pancevo', 12.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `klijenti_stete`
--

CREATE TABLE `klijenti_stete` (
  `id` int(11) NOT NULL,
  `klijent_id` int(11) NOT NULL,
  `opis` text DEFAULT NULL,
  `mail_subject` varchar(255) DEFAULT NULL,
  `vrsta_stete` varchar(255) DEFAULT NULL,
  `preporucilac` varchar(255) DEFAULT NULL,
  `reg_oznaka` varchar(20) DEFAULT NULL,
  `osig_kuca_stetnik` varchar(255) DEFAULT NULL,
  `status_izvrsenja` enum('U pripremi','Poslato') NOT NULL DEFAULT 'U pripremi',
  `poslato` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `punomoc` longblob DEFAULT NULL,
  `punomoc_extension` varchar(10) DEFAULT NULL,
  `osteceni_licna_prednja` longblob DEFAULT NULL,
  `osteceni_licna_prednja_extension` varchar(10) DEFAULT NULL,
  `osteceni_licna_zadnja` longblob DEFAULT NULL,
  `osteceni_licna_zadnja_extension` varchar(10) DEFAULT NULL,
  `osteceni_saobracajna_prednja` longblob DEFAULT NULL,
  `osteceni_saobracajna_prednja_extension` varchar(10) DEFAULT NULL,
  `osteceni_saobracajna_zadnja` longblob DEFAULT NULL,
  `osteceni_saobracajna_zadnja_extension` varchar(10) DEFAULT NULL,
  `osteceni_vozacka_prednja` longblob DEFAULT NULL,
  `osteceni_vozacka_prednja_extension` varchar(10) DEFAULT NULL,
  `osteceni_vozacka_zadnja` longblob DEFAULT NULL,
  `osteceni_vozacka_zadnja_extension` varchar(10) DEFAULT NULL,
  `osteceni_izvestaj` longblob DEFAULT NULL,
  `osteceni_izvestaj_extension` varchar(10) DEFAULT NULL,
  `osteceni_izjava` longblob DEFAULT NULL,
  `osteceni_izjava_extension` varchar(10) DEFAULT NULL,
  `osteceni_polisa` longblob DEFAULT NULL,
  `osteceni_polisa_extension` varchar(10) DEFAULT NULL,
  `osteceni_tekuci` longblob DEFAULT NULL,
  `osteceni_tekuci_extension` varchar(10) DEFAULT NULL,
  `stetnik_licna_prednja` longblob DEFAULT NULL,
  `stetnik_licna_prednja_extension` varchar(10) DEFAULT NULL,
  `stetnik_licna_zadnja` longblob DEFAULT NULL,
  `stetnik_licna_zadnja_extension` varchar(10) DEFAULT NULL,
  `stetnik_saobracajna_prednja` longblob DEFAULT NULL,
  `stetnik_saobracajna_prednja_extension` varchar(10) DEFAULT NULL,
  `stetnik_saobracajna_zadnja` longblob DEFAULT NULL,
  `stetnik_saobracajna_zadnja_extension` varchar(10) DEFAULT NULL,
  `stetnik_vozacka_prednja` longblob DEFAULT NULL,
  `stetnik_vozacka_prednja_extension` varchar(10) DEFAULT NULL,
  `stetnik_vozacka_zadnja` longblob DEFAULT NULL,
  `stetnik_vozacka_zadnja_extension` varchar(10) DEFAULT NULL,
  `stetnik_izjava` longblob DEFAULT NULL,
  `stetnik_izjava_extension` varchar(10) DEFAULT NULL,
  `stetnik_polisa` longblob DEFAULT NULL,
  `stetnik_polisa_extension` varchar(10) DEFAULT NULL,
  `evropski_izvestaj` longblob DEFAULT NULL,
  `evropski_izvestaj_extension` varchar(10) DEFAULT NULL,
  `emin_procena` longblob DEFAULT NULL,
  `emin_procena_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument1` longblob DEFAULT NULL,
  `dodatni_dokument1_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument2` longblob DEFAULT NULL,
  `dodatni_dokument2_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument3` longblob DEFAULT NULL,
  `dodatni_dokument3_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument4` longblob DEFAULT NULL,
  `dodatni_dokument4_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument5` longblob DEFAULT NULL,
  `dodatni_dokument5_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument6` longblob DEFAULT NULL,
  `dodatni_dokument6_extension` varchar(10) DEFAULT NULL,
  `emin_procena_status` tinyint(1) DEFAULT 0,
  `emin_procena_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `punomoc_status` tinyint(1) DEFAULT 0,
  `sluzbena_beleska_status` tinyint(1) DEFAULT 0,
  `sluzbena_beleska_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `sluzbena_beleska` longblob DEFAULT NULL,
  `sluzbena_beleska_extension` varchar(10) DEFAULT NULL,
  `sluzbena_beleska_potrebna` tinyint(1) DEFAULT 0,
  `sluzbena_beleska_poslata` tinyint(1) DEFAULT 0,
  `dodatni_dokument7` longblob DEFAULT NULL,
  `dodatni_dokument7_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument8` longblob DEFAULT NULL,
  `dodatni_dokument8_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument9` longblob DEFAULT NULL,
  `dodatni_dokument9_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument10` longblob DEFAULT NULL,
  `dodatni_dokument10_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument11` longblob DEFAULT NULL,
  `dodatni_dokument11_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument12` longblob DEFAULT NULL,
  `dodatni_dokument12_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument13` longblob DEFAULT NULL,
  `dodatni_dokument13_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument14` longblob DEFAULT NULL,
  `dodatni_dokument14_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument15` longblob DEFAULT NULL,
  `dodatni_dokument15_extension` varchar(10) DEFAULT NULL,
  `dodatni_dokument16` longblob DEFAULT NULL,
  `dodatni_dokument16_extension` varchar(10) DEFAULT NULL,
  `odstetni_zahtev` longblob DEFAULT NULL,
  `odstetni_zahtev_extension` varchar(10) DEFAULT NULL,
  `odstetni_zahtev_status` tinyint(1) NOT NULL DEFAULT 0,
  `weTransfer_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `klijenti_stete`
--
DELIMITER $$
CREATE TRIGGER `before_update_preporucilac` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.preporucilac = '' THEN
        SET NEW.preporucilac = NULL;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_and_update_punomoc_before_insert` BEFORE INSERT ON `klijenti_stete` FOR EACH ROW BEGIN
    -- Provera da li je 'punomoc' BLOB (ako je dužina veća od 0, znači da je fajl BLOB)
    IF LENGTH(NEW.punomoc) > 0 THEN
        -- Ako je fajl validan, postavi punomoc_status na 1
        SET NEW.punomoc_status = 1;
    END IF;
    -- Ako je 'punomoc' NULL, triger ne radi ništa
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disabled_insert_emin_procena` BEFORE INSERT ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.emin_procena_disabled = 1 THEN
        SET NEW.emin_procena = NULL;
        SET NEW.emin_procena_extension = NULL;
        SET NEW.emin_procena_status = 1;
    ELSEIF NEW.emin_procena_disabled = 0 THEN
        SET NEW.emin_procena_status = 0;
    END IF;
    
    IF NEW.emin_procena IS NOT NULL THEN
        SET NEW.emin_procena_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disabled_insert_sluzbena_beleska` BEFORE INSERT ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.sluzbena_beleska_disabled = 1 THEN
        SET NEW.sluzbena_beleska = NULL;
        SET NEW.sluzbena_beleska_extension = NULL;
        SET NEW.sluzbena_beleska_status = 1;
    ELSEIF NEW.sluzbena_beleska_disabled = 0 THEN
        SET NEW.sluzbena_beleska_status = 0;
    END IF;
    
    IF NEW.sluzbena_beleska IS NOT NULL THEN
        SET NEW.sluzbena_beleska_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disabled_update_emin_procena` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.emin_procena_disabled = 1 THEN
        SET NEW.emin_procena = NULL;
        SET NEW.emin_procena_extension = NULL;
        SET NEW.emin_procena_status = 1;
    ELSEIF NEW.emin_procena_disabled = 0 THEN
        SET NEW.emin_procena_status = 0;
    END IF;
    
    IF NEW.emin_procena IS NOT NULL THEN
        SET NEW.emin_procena_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disabled_update_sluzbena_beleska` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.sluzbena_beleska_disabled = 1 THEN
        SET NEW.sluzbena_beleska = NULL;
        SET NEW.sluzbena_beleska_extension = NULL;
        SET NEW.sluzbena_beleska_status = 1;
    ELSEIF NEW.sluzbena_beleska_disabled = 0 THEN
        SET NEW.sluzbena_beleska_status = 0;
    END IF;
    
    IF NEW.sluzbena_beleska IS NOT NULL THEN
        SET NEW.sluzbena_beleska_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_null_if_empty_weTransfer_link` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.weTransfer_link = '' THEN
        SET NEW.weTransfer_link = NULL;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_insert_sluzbena_beleska_status` BEFORE INSERT ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.sluzbena_beleska_disabled = 1 THEN
        SET NEW.sluzbena_beleska_status = 1;
    ELSEIF NEW.sluzbena_beleska_disabled = 0 THEN
        SET NEW.sluzbena_beleska_status = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_emin_procena_status` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF OLD.emin_procena IS NULL AND NEW.emin_procena IS NOT NULL THEN
        SET NEW.emin_procena_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_odstetni_zahtev_status` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF OLD.odstetni_zahtev IS NULL AND NEW.odstetni_zahtev IS NOT NULL THEN
        SET NEW.odstetni_zahtev_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_punomoc_status` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF OLD.punomoc IS NULL AND NEW.punomoc IS NOT NULL THEN
        SET NEW.punomoc_status = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_sluzbena_beleska_status` BEFORE INSERT ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.sluzbena_beleska IS NOT NULL AND LENGTH(NEW.sluzbena_beleska) > 0 THEN
        SET NEW.sluzbena_beleska_status = 1;
    ELSE
        SET NEW.sluzbena_beleska_status = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_sluzbena_beleska_status_on_update` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.sluzbena_beleska IS NOT NULL AND LENGTH(NEW.sluzbena_beleska) > 0 THEN
        SET NEW.sluzbena_beleska_status = 1;
    ELSE
        SET NEW.sluzbena_beleska_status = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_on_sent` BEFORE UPDATE ON `klijenti_stete` FOR EACH ROW BEGIN
    IF NEW.poslato IS NOT NULL AND OLD.poslato IS NULL THEN
        SET NEW.status_izvrsenja = 'Poslato';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obracun_stete`
--

CREATE TABLE `obracun_stete` (
  `obracun_id` int(11) NOT NULL,
  `steta_id` int(11) NOT NULL,
  `klijent_id` int(11) NOT NULL,
  `osig_kuca` varchar(255) DEFAULT NULL,
  `vrsta_stete` varchar(255) DEFAULT NULL,
  `mail_subject` varchar(255) DEFAULT NULL,
  `ime_prezime` varchar(255) DEFAULT NULL,
  `kontakt` varchar(255) DEFAULT NULL,
  `preporucilac_stete` varchar(255) DEFAULT NULL,
  `sluzbena_beleska_status` tinyint(1) DEFAULT 0,
  `emin_procena_status` tinyint(1) DEFAULT 0,
  `nas_procenat` decimal(10,2) DEFAULT 0.00,
  `isplaceno_klijent` decimal(10,2) DEFAULT 0.00,
  `advokatski_troskovi` decimal(10,2) DEFAULT 0.00,
  `advokatski_troskovi_uplaceno` datetime DEFAULT NULL,
  `emin_procena` decimal(10,2) DEFAULT 0.00,
  `emin_procena_uplaceno` datetime DEFAULT NULL,
  `uplatnica` decimal(10,2) DEFAULT 0.00,
  `preporucilac` decimal(10,2) DEFAULT 0.00,
  `preporucilac_uplaceno` datetime DEFAULT NULL,
  `trosak1` decimal(10,2) DEFAULT 0.00,
  `trosak2` decimal(10,2) DEFAULT 0.00,
  `trosak3` decimal(10,2) DEFAULT 0.00,
  `trosak4` decimal(10,2) DEFAULT 0.00,
  `trosak5` decimal(10,2) DEFAULT 0.00,
  `trosak6` decimal(10,2) DEFAULT 0.00,
  `trosak7` decimal(10,2) DEFAULT 0.00,
  `total_sum` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `obracun_stete`
--
DELIMITER $$
CREATE TRIGGER `before_update_nas_procenat` BEFORE UPDATE ON `obracun_stete` FOR EACH ROW BEGIN
    DECLARE punomoc_procenat DECIMAL(10,2);

    -- Dohvatanje punomoc_procenat za odgovarajućeg klijenta
    SELECT k.punomoc_procenat
    INTO punomoc_procenat
    FROM klijent k
    WHERE k.id = NEW.klijent_id;

    -- Računanje nas_procenat pre nego što se izvrši update
    SET NEW.nas_procenat = NEW.isplaceno_klijent * (punomoc_procenat / 100);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_update_adv_troskovi_uplaceno` BEFORE UPDATE ON `obracun_stete` FOR EACH ROW BEGIN
    IF NEW.advokatski_troskovi != OLD.advokatski_troskovi THEN
        IF NEW.advokatski_troskovi = 0.00 THEN
            SET NEW.advokatski_troskovi_uplaceno = NULL;
        ELSE
            SET NEW.advokatski_troskovi_uplaceno = NOW();
        END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_update_emin_procena_uplaceno` BEFORE UPDATE ON `obracun_stete` FOR EACH ROW BEGIN
    IF NEW.emin_procena != OLD.emin_procena THEN
        IF NEW.emin_procena = 0.00 THEN
            SET NEW.emin_procena_uplaceno = NULL;
        ELSE
            SET NEW.emin_procena_uplaceno = NOW();
        END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_update_preporucilac_uplaceno` BEFORE UPDATE ON `obracun_stete` FOR EACH ROW BEGIN
    IF NEW.preporucilac != OLD.preporucilac THEN
        IF NEW.preporucilac = 0.00 THEN
            SET NEW.preporucilac_uplaceno = NULL;
        ELSE
            SET NEW.preporucilac_uplaceno = NOW();
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `odstetni_zahtev`
--

CREATE TABLE `odstetni_zahtev` (
  `id` int(11) NOT NULL,
  `stete_id` int(11) NOT NULL,
  `klijent_id` int(11) NOT NULL,
  `marka_tip_vozila` varchar(255) DEFAULT NULL,
  `registraciona_oznaka` varchar(50) DEFAULT NULL,
  `broj_racuna` varchar(50) DEFAULT NULL,
  `naziv_banke` varchar(255) DEFAULT NULL,
  `ime_prezime_stetnik` varchar(255) DEFAULT NULL,
  `mb_pib_stetnik` varchar(50) DEFAULT NULL,
  `adresa_stetnik` varchar(255) DEFAULT NULL,
  `marka_tip_vozila_stetnik` varchar(255) DEFAULT NULL,
  `registraciona_oznaka_stetnik` varchar(50) DEFAULT NULL,
  `osiguranje` varchar(255) DEFAULT NULL,
  `broj_polise` varchar(50) DEFAULT NULL,
  `datum_nezgode` varchar(50) DEFAULT NULL,
  `mesto_nezgode` varchar(255) DEFAULT NULL,
  `ulica_broj` varchar(255) DEFAULT NULL,
  `tip_prijave` tinyint(4) DEFAULT NULL CHECK (`tip_prijave` in (1,2,3)),
  `iznos_za_naplatu` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skadencar`
--

CREATE TABLE `skadencar` (
  `id` int(11) NOT NULL,
  `broj_polise` varchar(50) NOT NULL,
  `ime_prezime` varchar(255) NOT NULL,
  `mb_pib` varchar(50) NOT NULL,
  `osig_kuca` varchar(255) NOT NULL,
  `skadencar_pocetak` date NOT NULL,
  `skadencar_kraj` date DEFAULT NULL,
  `skadencar_obnova` tinyint(1) NOT NULL DEFAULT 0,
  `grana_tarifa` varchar(100) NOT NULL,
  `premija_bez_poreza` decimal(10,2) DEFAULT 0.00,
  `premija_sa_porezom` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nacin_placanja` varchar(100) NOT NULL,
  `brokerska_kuca_isplaceno` tinyint(1) DEFAULT 0,
  `brokerska_kuca` varchar(255) DEFAULT NULL,
  `brokerska_kuca_procenat` decimal(5,2) DEFAULT NULL,
  `brokerska_kuca_uplata` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata1` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata1_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata2` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata2_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata3` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata3_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata4` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata4_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata5` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata5_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata6` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata6_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata7` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata7_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata8` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata8_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata9` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata9_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata10` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata10_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata11` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata11_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_rata12` decimal(10,2) DEFAULT 0.00,
  `brokerska_kuca_uplata_rata12_datum` datetime DEFAULT NULL,
  `brokerska_kuca_uplata_nacin_placanja_toggle` tinyint(1) DEFAULT 0,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `skadencar`
--
DELIMITER $$
CREATE TRIGGER `before_update_skadencar_celost_ili_rate_na_0` BEFORE UPDATE ON `skadencar` FOR EACH ROW BEGIN
    -- Provera da li je brokerska_kuca_uplata_nacin_placanja_toggle 0
    IF NEW.brokerska_kuca_uplata_nacin_placanja_toggle = 0 THEN
        SET NEW.brokerska_kuca_uplata = 0.00;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_skadencar_rata_datum` BEFORE UPDATE ON `skadencar` FOR EACH ROW BEGIN
    -- Proverava da li je promenjena vrednost za svaku ratu i postavlja datum
    IF NEW.brokerska_kuca_uplata_rata1 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata1 != OLD.brokerska_kuca_uplata_rata1 THEN
        IF NEW.brokerska_kuca_uplata_rata1 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata1_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata1_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata2 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata2 != OLD.brokerska_kuca_uplata_rata2 THEN
        IF NEW.brokerska_kuca_uplata_rata2 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata2_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata2_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata3 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata3 != OLD.brokerska_kuca_uplata_rata3 THEN
        IF NEW.brokerska_kuca_uplata_rata3 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata3_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata3_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata4 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata4 != OLD.brokerska_kuca_uplata_rata4 THEN
        IF NEW.brokerska_kuca_uplata_rata4 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata4_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata4_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata5 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata5 != OLD.brokerska_kuca_uplata_rata5 THEN
        IF NEW.brokerska_kuca_uplata_rata5 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata5_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata5_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata6 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata6 != OLD.brokerska_kuca_uplata_rata6 THEN
        IF NEW.brokerska_kuca_uplata_rata6 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata6_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata6_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata7 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata7 != OLD.brokerska_kuca_uplata_rata7 THEN
        IF NEW.brokerska_kuca_uplata_rata7 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata7_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata7_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata8 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata8 != OLD.brokerska_kuca_uplata_rata8 THEN
        IF NEW.brokerska_kuca_uplata_rata8 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata8_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata8_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata9 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata9 != OLD.brokerska_kuca_uplata_rata9 THEN
        IF NEW.brokerska_kuca_uplata_rata9 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata9_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata9_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata10 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata10 != OLD.brokerska_kuca_uplata_rata10 THEN
        IF NEW.brokerska_kuca_uplata_rata10 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata10_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata10_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata11 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata11 != OLD.brokerska_kuca_uplata_rata11 THEN
        IF NEW.brokerska_kuca_uplata_rata11 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata11_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata11_datum = NOW();
        END IF;
    END IF;
    IF NEW.brokerska_kuca_uplata_rata12 IS NOT NULL AND NEW.brokerska_kuca_uplata_rata12 != OLD.brokerska_kuca_uplata_rata12 THEN
        IF NEW.brokerska_kuca_uplata_rata12 = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_rata12_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_rata12_datum = NOW();
        END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `reset_isplaceno_on_toggle_change` BEFORE UPDATE ON `skadencar` FOR EACH ROW BEGIN
    IF NEW.brokerska_kuca_uplata_nacin_placanja_toggle != OLD.brokerska_kuca_uplata_nacin_placanja_toggle THEN
        SET NEW.brokerska_kuca_isplaceno = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_premija_bez_poreza` BEFORE INSERT ON `skadencar` FOR EACH ROW BEGIN
    SET NEW.premija_bez_poreza = NEW.premija_sa_porezom * 0.95238;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_skadencar_kraj` BEFORE INSERT ON `skadencar` FOR EACH ROW BEGIN
    SET NEW.skadencar_kraj = DATE_ADD(NEW.skadencar_pocetak, INTERVAL 1 YEAR);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_auto_obnova_pzo` BEFORE INSERT ON `skadencar` FOR EACH ROW BEGIN
    IF NEW.grana_tarifa = 'PZO' THEN
        SET NEW.skadencar_obnova = 1;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_brokerska_kuca_uplata_datum` BEFORE UPDATE ON `skadencar` FOR EACH ROW BEGIN
    IF NEW.brokerska_kuca_uplata != OLD.brokerska_kuca_uplata THEN
        IF NEW.brokerska_kuca_uplata = 0.00 THEN
            SET NEW.brokerska_kuca_uplata_datum = NULL;
        ELSE
            SET NEW.brokerska_kuca_uplata_datum = NOW();
        END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_premija_bez_poreza` BEFORE UPDATE ON `skadencar` FOR EACH ROW BEGIN
    SET NEW.premija_bez_poreza = NEW.premija_sa_porezom * 0.95238;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_skadencar_kraj` BEFORE UPDATE ON `skadencar` FOR EACH ROW BEGIN
    SET NEW.skadencar_kraj = DATE_ADD(NEW.skadencar_pocetak, INTERVAL 1 YEAR);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'DRAMICANIN', '$2y$10$auUfrQvW8r.vkLq3jO9/VuqupL1IkGkui6WIWEp3KQGEU4P1Kntim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokerska_kuca`
--
ALTER TABLE `brokerska_kuca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brokerska_kuca_procenti`
--
ALTER TABLE `brokerska_kuca_procenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brokerska_kuca_id` (`brokerska_kuca_id`);

--
-- Indexes for table `klijent`
--
ALTER TABLE `klijent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jmbg` (`jmbg`);

--
-- Indexes for table `klijenti_stete`
--
ALTER TABLE `klijenti_stete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obracun_stete`
--
ALTER TABLE `obracun_stete`
  ADD PRIMARY KEY (`obracun_id`);

--
-- Indexes for table `odstetni_zahtev`
--
ALTER TABLE `odstetni_zahtev`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klijent_id` (`klijent_id`);

--
-- Indexes for table `skadencar`
--
ALTER TABLE `skadencar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brokerska_kuca`
--
ALTER TABLE `brokerska_kuca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brokerska_kuca_procenti`
--
ALTER TABLE `brokerska_kuca_procenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `klijent`
--
ALTER TABLE `klijent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `klijenti_stete`
--
ALTER TABLE `klijenti_stete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `obracun_stete`
--
ALTER TABLE `obracun_stete`
  MODIFY `obracun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `odstetni_zahtev`
--
ALTER TABLE `odstetni_zahtev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `skadencar`
--
ALTER TABLE `skadencar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brokerska_kuca_procenti`
--
ALTER TABLE `brokerska_kuca_procenti`
  ADD CONSTRAINT `brokerska_kuca_procenti_ibfk_1` FOREIGN KEY (`brokerska_kuca_id`) REFERENCES `brokerska_kuca` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `odstetni_zahtev`
--
ALTER TABLE `odstetni_zahtev`
  ADD CONSTRAINT `odstetni_zahtev_ibfk_2` FOREIGN KEY (`klijent_id`) REFERENCES `klijent` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
