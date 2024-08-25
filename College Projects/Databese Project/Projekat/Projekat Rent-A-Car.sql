USE master;
GO

IF EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name = 'Rentacar') 
DROP DATABASE Rentacar;
GO
CREATE DATABASE Rentacar;
GO

USE Rentacar;
GO

CREATE TABLE Klijent
(
	BrojVozackeDozvole NCHAR(9) NOT NULL,
	BrojTelefona NCHAR(10) NOT NULL,
	Ime NVARCHAR(50) NOT NULL,
	Prezime NVARCHAR(50) NOT NULL,
	IstorijaIznajmljivanja INT NOT NULL
	PRIMARY KEY (BrojVozackeDozvole)
);

CREATE TABLE Placanje
(
	SifraPlacanja INT NOT NULL,
	NacinPlacanja NVARCHAR(50) NOT NULL,
	DatumPlacanja DATE NOT NULL,
	Iznos MONEY NOT NULL,
	PRIMARY KEY (SifraPlacanja)
);

CREATE TABLE OsiguravajucaKuca
(
	SifraOsigKuce INT NOT NULL,
	NazivOsigKuce NVARCHAR(50) NOT NULL,
	PRIMARY KEY (SifraOsigKuce)
);

CREATE TABLE Delovi
(
	SifraDelova INT NOT NULL,
	NazivDelova NVARCHAR(50) NOT NULL,
	VrstaDelova NVARCHAR(50) NOT NULL,
	PRIMARY KEY (SifraDelova)
);

CREATE TABLE Dobavljac
(
	SifraDobavljaca INT NOT NULL,
	AdresaDobavljaca NVARCHAR(50) NOT NULL,
	NazivDobavljaca NVARCHAR(50) NOT NULL,
	PRIMARY KEY (SifraDobavljaca)
);

CREATE TABLE Polisa
(
	SifraPolise INT NOT NULL, 
	DatOd DATE NOT NULL,
	DatDo DATE NOT NULL,
	VrstaOsiguranja NVARCHAR(50) NOT NULL,
	Cena MONEY NOT NULL,
	SifraOsigKuce INT NOT NULL,
	FOREIGN KEY (SifraOsigKuce) REFERENCES OsiguravajucaKuca (SifraOsigKuce),
	PRIMARY KEY (SifraPolise)
);

CREATE TABLE Vozilo 
(
	SifraSasije NVARCHAR(50) NOT NULL,
	Marka NVARCHAR(50) NOT NULL,
	Model NVARCHAR(50) NOT NULL,
	Godina NUMERIC(4,0) NOT NULL,
	TrenutnaKilometraza NVARCHAR(50) NOT NULL,
	PRIMARY KEY (SifraSasije)
);

CREATE TABLE UgovorIznajmljivanja
(
	BrojUgovora INT NOT NULL,
	DatOd DATE NOT NULL, 
	DatDo DATE NOT NULL,
	SifraSasije NVARCHAR(50) NOT NULL,
	SifraPolise INT NOT NULL,
	SifraPlacanja INT NOT NULL,
	BrojVozackeDozvole NCHAR(9) NOT NULL,
	FOREIGN KEY (SifraSasije) REFERENCES Vozilo (SifraSasije),
	FOREIGN KEY (SifraPolise) REFERENCES Polisa (SifraPolise),
	FOREIGN KEY (SifraPlacanja) REFERENCES Placanje (SifraPlacanja),
	FOREIGN KEY (BrojVozackeDozvole) REFERENCES Klijent (BrojVozackeDozvole),
	PRIMARY KEY (BrojUgovora, SifraSasije, SifraPolise, SifraPlacanja, BrojVozackeDozvole)
);

CREATE TABLE Majstor
(
	SifraMajstora INT NOT NULL,
	BrojTelefona NCHAR(10) NOT NULL,
	Ime NVARCHAR(50) NOT NULL,
	PRIMARY KEY (SifraMajstora)
);

CREATE TABLE ServisKnjizica
(
	SifraKnjizice INT NOT NULL,
	DatumServisa DATE NOT NULL,
	NazivServisa NVARCHAR(50) NOT NULL,
	Cena MONEY NOT NULL,
	SifraSasije NVARCHAR(50) NOT NULL,
	SifraMajstora INT NOT NULL,
	FOREIGN KEY (SifraSasije) REFERENCES Vozilo (SifraSasije),
	FOREIGN KEY (SifraMajstora) REFERENCES Majstor (SifraMajstora),
	PRIMARY KEY (SifraKnjizice, SifraSasije)
);

CREATE TABLE Faktura
(
	BrojFakture	INT NOT NULL,
	Kolicina INT NOT NULL,
	Vrednost MONEY NOT NULL,
	DatumFakture DATE NOT NULL,
	SifraDobavljaca INT NOT NULL,
	SifraDelova INT NOT NULL,
	FOREIGN KEY (SifraDobavljaca) REFERENCES Dobavljac (SifraDobavljaca),
	FOREIGN KEY (SifraDelova) REFERENCES Delovi (SifraDelova),
	PRIMARY KEY (BrojFakture, SifraDobavljaca)
);

CREATE TABLE Isplata
(
	SifraIsplate INT NOT NULL,
	Datum DATE NOT NULL,
	Iznos MONEY NOT NULL,
	SifraDobavljaca INT NOT NULL,
	SifraDobavljacaf INT NOT NULL,
	BrojFakture INT NOT NULL,
	FOREIGN KEY (SifraDobavljaca) REFERENCES Dobavljac (SifraDobavljaca),
	FOREIGN KEY (BrojFakture, SifraDobavljacaf) REFERENCES Faktura (BrojFakture, SifraDobavljaca),
	PRIMARY KEY (SifraIsplate)
);

CREATE TABLE Otpremnica
(
	BrojOtpremnice INT NOT NULL,
	Kolicina INT NOT NULL,
	Datum DATE NOT NULL,
	Vrednost MONEY NOT NULL,
	SifraDobavljaca INT NOT NULL,
	SifraDelova INT NOT NULL,
	FOREIGN KEY (SifraDobavljaca) REFERENCES Dobavljac (SifraDobavljaca),
	FOREIGN KEY (SifraDelova) REFERENCES Delovi (SifraDelova),
	PRIMARY KEY (BrojOtpremnice)
) ;

CREATE TABLE Narudzbenica
(
	BrojNarudzbenice INT NOT NULL,
	Datum DATE NOT NULL,
	Kolicina INT NOT NULL,
	SifraDobavljaca INT NOT NULL,
	SifraDelova INT NOT NULL,
	SifraMajstora INT NOT NULL,
	FOREIGN KEY (SifraDobavljaca) REFERENCES Dobavljac (SifraDobavljaca),
	FOREIGN KEY (SifraDelova) REFERENCES Delovi (SifraDelova),
	FOREIGN KEY (SifraMajstora) REFERENCES Majstor (SifraMajstora),
	PRIMARY KEY (BrojNarudzbenice)
);


--Klijent--

INSERT dbo.Klijent (BrojVozackeDozvole, BrojTelefona, Ime, Prezime, IstorijaIznajmljivanja) VALUES (CAST(N'195359904' AS NCHAR(9)), CAST(N'064212415' AS NCHAR(10)), N'Marko', N'Markovic', 20)

INSERT dbo.Klijent (BrojVozackeDozvole, BrojTelefona, Ime, Prezime, IstorijaIznajmljivanja) VALUES (CAST(N'361169122' AS NCHAR(9)), CAST(N'0668609136' AS NCHAR(10)), N'Janko', N'Jankovic', 10)

INSERT dbo.Klijent (BrojVozackeDozvole, BrojTelefona, Ime, Prezime, IstorijaIznajmljivanja) VALUES (CAST(N'978458557' AS NCHAR(9)), CAST(N'065449366' AS NCHAR(10)), N'Tamara', N'Jaksic', 5)

INSERT dbo.Klijent (BrojVozackeDozvole, BrojTelefona, Ime, Prezime, IstorijaIznajmljivanja) VALUES (CAST(N'072492693' AS NCHAR(9)), CAST(N'0634431200' AS NCHAR(10)), N'Ana', N'Andjelovic', 50)

--Placanje--

INSERT dbo.Placanje (SifraPlacanja, NacinPlacanja, Iznos, DatumPlacanja) VALUES (11, N'KES', 25900, CAST(N'2022-01-11' AS Date))
	
INSERT dbo.Placanje (SifraPlacanja, NacinPlacanja, Iznos, DatumPlacanja) VALUES (22, N'KARTICA', 13500, CAST(N'2022-03-10' AS Date))
	
INSERT dbo.Placanje (SifraPlacanja, NacinPlacanja, Iznos, DatumPlacanja) VALUES (33, N'KARTICA', 20300, CAST(N'2022-07-13' AS Date))
	
INSERT dbo.Placanje (SifraPlacanja, NacinPlacanja, Iznos, DatumPlacanja) VALUES (44, N'KES', 55960, CAST(N'2022-12-01' AS Date))

--OsiguravajucaKuca--

INSERT dbo.OsiguravajucaKuca (SifraOsigKuce, NazivOsigKuce) VALUES (1, N'DDOR')
	
INSERT dbo.OsiguravajucaKuca (SifraOsigKuce, NazivOsigKuce) VALUES (2, N'DUNAV')
	
INSERT dbo.OsiguravajucaKuca (SifraOsigKuce, NazivOsigKuce) VALUES (3, N'TRIGLAV')

--Delovi--
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (1111, N'ELF-10W40', N'Ulje')
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (2222, N'Filter za Ulje', N'Filter')
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (3333, N'Filter za Vazduh', N'Filter')
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (4444, N'Tecnost za vetrobran', N'Tecnost')
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (5555, N'Antifriz', N'Tecnost')
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (6666, N'XENON 4300K', N'Sijalica')
	
INSERT dbo.Delovi (SifraDelova, NazivDelova, VrstaDelova) VALUES (7777, N'Akumulator', N'Akumulator')

--Dobavljac--

INSERT dbo.Dobavljac (SifraDobavljaca, AdresaDobavljaca, NazivDobavljaca) VALUES (1, N'Servantesova 7', N'Deloovi')
	
INSERT dbo.Dobavljac (SifraDobavljaca, AdresaDobavljaca, NazivDobavljaca) VALUES (2, N'Belo vrelo 1', N'Autohub')
	
INSERT dbo.Dobavljac (SifraDobavljaca, AdresaDobavljaca, NazivDobavljaca) VALUES (3, N'Maršala Tita 220', N'Autocraft')
	
--Polisa--

INSERT dbo.Polisa (SifraPolise, DatOd, DatDo, VrstaOsiguranja, Cena, SifraOsigKuce) VALUES (111, CAST(N'2022-01-11' AS Date), CAST(N'2022-03-11' AS Date), N'KASKO', 9400, 1)
	
INSERT dbo.Polisa (SifraPolise, DatOd, DatDo, VrstaOsiguranja, Cena, SifraOsigKuce) VALUES (222, CAST(N'2022-03-10' AS Date), CAST(N'2022-05-10' AS Date), N'PUTNO', 3500, 2)
	
INSERT dbo.Polisa (SifraPolise, DatOd, DatDo, VrstaOsiguranja, Cena, SifraOsigKuce) VALUES (333, CAST(N'2022-07-13' AS Date), CAST(N'2022-08-02' AS Date), N'KASKO', 12300, 3)
	
INSERT dbo.Polisa (SifraPolise, DatOd, DatDo, VrstaOsiguranja, Cena, SifraOsigKuce) VALUES (444, CAST(N'2022-12-01' AS Date), CAST(N'2023-03-03' AS Date), N'KASKO', 20000, 1)

--Vozilo--

INSERT dbo.Vozilo (SifraSasije, Marka, Model, Godina, TrenutnaKilometraza) VALUES (N'Z2H0Q6H1H1B5G7W3M', N'Skoda', N'Superb', CAST(N'2018' AS Numeric(4,0)), 082796)	
	
INSERT dbo.Vozilo (SifraSasije, Marka, Model, Godina, TrenutnaKilometraza) VALUES (N'K4Z6J9C7D9O2I9I2I', N'Skoda', N'Fabia', CAST(N'2010' AS Numeric(4,0)), 184429)	
	
INSERT dbo.Vozilo (SifraSasije, Marka, Model, Godina, TrenutnaKilometraza) VALUES (N'M4O3U0X5C2P6M2Q9P', N'Peugeot', N'3008', CAST(N'2015' AS Numeric(4,0)), 026675)	
	
INSERT dbo.Vozilo (SifraSasije, Marka, Model, Godina, TrenutnaKilometraza) VALUES (N'V2S1F7B9J4B4T4S7B', N'Mercedes', N'E220-AMG', CAST(N'2020' AS Numeric(4,0)), 021974)	
	
--UgovorIznajmljivanja--

INSERT dbo.UgovorIznajmljivanja (BrojUgovora, DatOd, DatDo, SifraSasije, SifraPolise, SifraPlacanja, BrojVozackeDozvole) VALUES (60, CAST(N'2022-01-11' AS Date), CAST(N'2022-03-11' AS Date), N'Z2H0Q6H1H1B5G7W3M', 111, 11, CAST(N'195359904' AS NCHAR(9)))
	
INSERT dbo.UgovorIznajmljivanja (BrojUgovora, DatOd, DatDo, SifraSasije, SifraPolise, SifraPlacanja, BrojVozackeDozvole) VALUES (70, CAST(N'2022-03-10' AS Date), CAST(N'2022-05-10' AS Date), N'K4Z6J9C7D9O2I9I2I', 222, 22, CAST(N'361169122' AS NCHAR(9)))
	
INSERT dbo.UgovorIznajmljivanja (BrojUgovora, DatOd, DatDo, SifraSasije, SifraPolise, SifraPlacanja, BrojVozackeDozvole) VALUES (80, CAST(N'2022-07-13' AS Date), CAST(N'2022-08-02' AS Date), N'M4O3U0X5C2P6M2Q9P', 333, 33, CAST(N'978458557' AS NCHAR(9)))
	
INSERT dbo.UgovorIznajmljivanja (BrojUgovora, DatOd, DatDo, SifraSasije, SifraPolise, SifraPlacanja, BrojVozackeDozvole) VALUES (90, CAST(N'2022-12-01' AS Date), CAST(N'2023-03-03' AS Date), N'V2S1F7B9J4B4T4S7B', 444, 44, CAST(N'072492693' AS NCHAR(9)))

--Majstor--

INSERT dbo.Majstor (SifraMajstora, BrojTelefona, Ime) VALUES (100, CAST(N'063869218' AS NCHAR(10)), N'Milos')
	
INSERT dbo.Majstor (SifraMajstora, BrojTelefona, Ime) VALUES (200, CAST(N'0646865441' AS NCHAR(10)), N'Darko')

--ServisKnjizica--

INSERT dbo.ServisKnjizica (SifraKnjizice, DatumServisa, NazivServisa, Cena, SifraMajstora, SifraSasije) VALUES (111, CAST(N'2021-12-09' AS Date), N'Zamena tecnosti', 2568, 200, N'Z2H0Q6H1H1B5G7W3M')
	
INSERT dbo.ServisKnjizica (SifraKnjizice, DatumServisa, NazivServisa, Cena, SifraMajstora, SifraSasije) VALUES (222, CAST(N'2022-03-06' AS Date), N'Mali Servis', 5698, 100, N'K4Z6J9C7D9O2I9I2I')
	
INSERT dbo.ServisKnjizica (SifraKnjizice, DatumServisa, NazivServisa, Cena, SifraMajstora, SifraSasije) VALUES (333, CAST(N'2022-05-01' AS Date), N'Zamena sijalica', 1345, 200, N'M4O3U0X5C2P6M2Q9P')
	
INSERT dbo.ServisKnjizica (SifraKnjizice, DatumServisa, NazivServisa, Cena, SifraMajstora, SifraSasije) VALUES (444, CAST(N'2022-10-11' AS Date), N'Mali Servis', 6650, 100, N'V2S1F7B9J4B4T4S7B')
	
--Faktura--

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (11111, CAST(N'2022-03-06' AS Date), 28900, 10, 1, 1111)

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (22222, CAST(N'2022-03-06' AS Date), 6300, 10, 3, 2222)

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (33333, CAST(N'2022-03-06' AS Date), 7000, 10, 2, 3333)

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (44444, CAST(N'2021-12-09' AS Date), 8700, 6, 1, 4444)

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (55555, CAST(N'2021-12-09' AS Date), 3200, 8, 1, 5555)

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (66666, CAST(N'2022-05-01' AS Date), 2000, 4, 3, 6666)

INSERT dbo.Faktura (BrojFakture, DatumFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova) VALUES (77777, CAST(N'2022-05-01' AS Date), 15600, 2, 2, 7777)


--Isplata--

INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture)  VALUES (10, CAST(N'2022-03-05' AS Date), 28900, 1, 1, 11111)
	
INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture) VALUES (20, CAST(N'2022-03-05' AS Date), 6300, 3, 3, 22222)
	
INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture) VALUES (30, CAST(N'2022-03-05' AS Date), 7000, 2, 2, 33333)
	
INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture) VALUES (40, CAST(N'2022-12-08' AS Date), 8700, 1, 1, 44444)
	
INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture) VALUES (50, CAST(N'2022-12-08' AS Date), 3200, 1, 1, 55555)
	
INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture) VALUES (60, CAST(N'2022-05-07' AS Date), 2000, 3, 3, 66666)

INSERT dbo.Isplata (SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture) VALUES (70, CAST(N'2022-05-07' AS Date), 15600, 2, 2, 77777)

--Otpremnica--

INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (1, 10, CAST(N'2022-03-02' AS Date), 28900, 1, 1111)
	
INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (2, 10, CAST(N'2022-03-02' AS Date), 6300, 3, 2222)
	
INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (3, 10, CAST(N'2022-03-02' AS Date), 7000, 2, 3333)
	
INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (4, 6, CAST(N'2022-12-05' AS Date), 8700, 1, 4444)
	
INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (5, 8, CAST(N'2022-12-05' AS Date), 3200, 1, 5555)
	
INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (6, 4, CAST(N'2022-04-29' AS Date), 2000, 3, 6666)
	
INSERT dbo.Otpremnica (BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova) VALUES (7, 2, CAST(N'2022-04-29' AS Date), 15600, 2, 7777)

--Narudzbenica--

INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (11, CAST(N'2022-03-01' AS Date), 10, 1, 1111, 100)

INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (22, CAST(N'2022-03-01' AS Date), 10, 3, 2222, 100)
	
INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (33, CAST(N'2022-03-01' AS Date), 10, 2, 3333, 100)
	
INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (44, CAST(N'2022-12-04' AS Date), 6, 1, 4444, 200)
	
INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (55, CAST(N'2022-12-04' AS Date), 8, 1, 5555, 200)
	
INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (66, CAST(N'2022-04-28' AS Date), 4, 3, 6666, 200)
	
INSERT dbo.Narudzbenica (BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora) VALUES (77, CAST(N'2022-04-28' AS Date), 2, 2, 7777, 200)


--Tabelarni prikaz--
	SELECT BrojTelefona, BrojVozackeDozvole, Ime, Prezime, IstorijaIznajmljivanja FROM Klijent

	SELECT SifraPlacanja, DatumPlacanja, Iznos, NacinPlacanja FROM Placanje 

	SELECT SifraOsigKuce, NazivOsigKuce FROM OsiguravajucaKuca

	SELECT SifraDelova, NazivDelova, VrstaDelova FROM Delovi

	SELECT SifraDobavljaca, AdresaDobavljaca, NazivDobavljaca FROM Dobavljac 
	
	SELECT SifraPolise, DatOd, DatDo, VrstaOsiguranja, Cena, SifraOsigKuce FROM Polisa

	SELECT SifraSasije, Marka, Model, Godina, TrenutnaKilometraza FROM Vozilo

	SELECT BrojUgovora, DatOd, DatDo, SifraSasije, SifraPolise, SifraPlacanja, BrojVozackeDozvole FROM UgovorIznajmljivanja

	SELECT SifraMajstora, BrojTelefona, Ime FROM Majstor

	SELECT SifraKnjizice, DatumServisa, NazivServisa, Cena, SifraMajstora, SifraSasije FROM ServisKnjizica

	SELECT BrojFakture, Vrednost, Kolicina, DatumFakture, SifraDobavljaca, SifraDelova FROM Faktura

	SELECT SifraIsplate, Datum, Iznos, SifraDobavljaca, SifraDobavljacaf, BrojFakture FROM Isplata

	SELECT BrojOtpremnice, Kolicina, Datum, Vrednost, SifraDobavljaca, SifraDelova FROM Otpremnica

	SELECT BrojNarudzbenice, Datum, Kolicina, SifraDobavljaca, SifraDelova, SifraMajstora FROM Narudzbenica


--CREATE VIEW PrikazUgovorIznajmljivanja 
--SELECT v.SifraSasije, v.Marka, v.Model, v.Godina, v.TrenutnaKilometraza,  FROM Vozilo v join 


CREATE VIEW pDobavljac_Otpremnica_Faktura (SifraDobavljaca, AdresaDobavljaca,
NazivDobavljaca, BrojOtpremnice, Kolicina, Datum, Vrednost, BrojFakture, DatumFakture,
 UkupnaVrednost)
AS
SELECT d.SifraDobavljaca, d.AdresaDobavljaca, d.NazivDobavljaca, o.BrojOtpremnice,
o.Kolicina, o.Datum, o.Vrednost, f.BrojFakture, f.DatumFakture, f.Vrednost
FROM Dobavljac d JOIN Otpremnica o ON d.SifraDobavljaca = o.SifraDobavljaca
LEFT JOIN Faktura f ON d.SifraDobavljaca = f.SifraDobavljaca
AND f.SifraDelova = o.SifraDelova AND f.Vrednost = o.Vrednost

--Upit nad pogledom

SELECT * FROM dbo.pDobavljac_Otpremnica_Faktura


CREATE PROCEDURE udpFormiranjeOFI
-- podaci za otpremnicu
@Kolicina int,
@Vrednost money,
@SifraDobavljaca int,
@SifraDelova int

AS
DECLARE
--podaci za otpremnicu
@DatumOtpremnice as date, @BrojOtpremnice as int, @BrojUbacenihOtpremnica as int = 0,
--podaci za fakturu
@BrojFakture as int, @UkupnaVrednost as money,
--podaci za isplatu
@SifraIsplate as int, @Datum as date, @SifraDobavljacaf as int
BEGIN TRY
SET XACT_ABORT ON -- U slučaju pojave greške automatsko sprečavanje daljeg izvršavanja niza naredbi
BEGIN TRANSACTION
--otpremnica
SELECT @BrojOtpremnice = max(BrojOtpremnice)+1,
@DatumOtpremnice = GETDATE()-10
FROM Otpremnica;
--faktura
SELECT @BrojFakture = max(BrojFakture)+11111
FROM Faktura;
SET @UkupnaVrednost = @Vrednost;
--isplata
SELECT @SifraIsplate = max(SifraIsplate)+10
FROM Isplata;
SET @Datum = @DatumOtpremnice;
SET @SifraDobavljacaf = @SifraDobavljaca
-- Ubacivanje otpremnice
INSERT INTO Otpremnica(BrojOtpremnice, Kolicina, Datum, Vrednost,
SifraDobavljaca, SifraDelova)
VALUES(@BrojOtpremnice, @Kolicina, @DatumOtpremnice, @Vrednost,
@SifraDobavljaca, @SifraDelova);
--Ubacivanje fakture
INSERT INTO Faktura(BrojFakture, Vrednost, Kolicina, SifraDobavljaca, SifraDelova, DatumFakture)
VALUES(@BrojFakture, @UkupnaVrednost, @Kolicina, @SifraDobavljaca, @SifraDelova, @DatumOtpremnice);
-- Ubacivanje isplate
INSERT INTO Isplata(SifraIsplate, Iznos, Datum, BrojFakture,
SifraDobavljaca, SifraDobavljacaf)
VALUES(@SifraIsplate, @UkupnaVrednost, @Datum, @BrojFakture,
@SifraDobavljaca, @SifraDobavljacaf);
PRINT 'Ubačena je otpremnica se brojem otpremnice:' + str(@BrojOtpremnice) ;
PRINT 'Ubačena je faktura se brojem fakture:' + str(@BrojFakture) ;
PRINT 'Ubačena je isplata se šifrom isplate:' + str(@SifraIsplate) ;
COMMIT TRANSACTION;
END TRY
BEGIN CATCH
PRINT 'DOŠLO JE DO POJAVE GREŠKE!' ;
PRINT '------ Proverite ulazne parametre-------' ;
PRINT ERROR_MESSAGE();
ROLLBACK TRANSACTION;
PRINT 'Procedura je poništila promene.';
END CATCH;
-- Prvo pozivanje bazne procedure
EXEC udpFormiranjeOFI @Kolicina = 6, @Vrednost = 1500, @SifraDobavljaca = 3, @SifraDelova = 5555

select * from dbo.pDobavljac_Otpremnica_Faktura


CREATE FUNCTION udfOtpremnicaFakturaIsplata (@BrojOtpremnice INT)
RETURNS TABLE
AS
RETURN SELECT p.BrojOtpremnice, p.Vrednost AS VrednostOtpremnice, p.Datum AS
datumOtpremnice, p.NazivDobavljaca, p.BrojFakture,
i.datum AS datumIsplate, i.Iznos AS iznosIsplate
FROM pDobavljac_Otpremnica_Faktura p LEFT JOIN Isplata i
ON i.BrojFakture = p.BrojFakture
WHERE p.BrojOtpremnice = @BrojOtpremnice;

-- Pozivanje bazne funkcije

SELECT * FROM dbo.udfOtpremnicaFakturaIsplata(8)






