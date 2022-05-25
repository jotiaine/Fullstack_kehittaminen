-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datadrivers_v2`
--
CREATE DATABASE IF NOT EXISTS `datadrivers_v2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `datadrivers_v2`;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `questionID` int(11) NOT NULL,
  `question_1` varchar(255) NOT NULL,
  `question_2` varchar(255) NOT NULL,
  `question_3` varchar(255) NOT NULL,
  `opt_1_1` varchar(255) NOT NULL,
  `opt_1_2` varchar(255) NOT NULL,
  `opt_1_3` varchar(255) NOT NULL,
  `opt_2_1` varchar(255) NOT NULL,
  `opt_2_2` varchar(255) NOT NULL,
  `opt_2_3` varchar(255) NOT NULL,
  `opt_3_1` varchar(255) NOT NULL,
  `opt_3_2` varchar(255) NOT NULL,
  `opt_3_3` varchar(255) NOT NULL,
  `correct_answer_1` varchar(255) NOT NULL,
  `correct_answer_2` varchar(255) NOT NULL,
  `correct_answer_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `question_1`, `question_2`, `question_3`, `opt_1_1`, `opt_1_2`, `opt_1_3`, `opt_2_1`, `opt_2_2`, `opt_2_3`, `opt_3_1`, `opt_3_2`, `opt_3_3`, `correct_answer_1`, `correct_answer_2`, `correct_answer_3`) VALUES
(1, 'Missä sijaitsee kytkin?', 'Mikä on oikea toimintajärjestys?', 'Mikä suurin sallittu nopeus Suomessa?', 'Vasen', 'Oikea', 'Keskellä', 'Vilkku-Kaistanvaihto-Olan yli katse', 'Vilkku-Vilkaisu olan yli-Kaistanvaihto', 'Kaistanvaihto-Vilkku-Olan yli vilkaisu', '80km/h', '120km/h', '100km/h', 'Vasen', 'Vilkku-Vilkaisu olan yli-Kaistanvaihto', '120km/h'),
(2, 'Olet kääntymässä liikennevaloista vasemmalle vihreän valon palaessa. Kääntyjille (sinulle) on nuolen muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Mikä nopeusrajoitus sisältyy pyöräkatu -liikennemerkkiin?', 'Olet kääntymässä liikennevaloista vasemmalle vihreän valon palaessa. Kääntyjille (sinulle) on ympyrän muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Edestä lähestyviä ajoneuvoja.', 'Vasemmalta lähestyvää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', '20 km/h', '30 km/h', 'Pyöräkatu -liikennemerkki ei sisällä nopeusrajoitusta. Pyöräkadulla nopeus on sovitettava pyöräilijöiden mukaiseksi, tie- tai aluekohtaisen nopeusrajoituksen puitteissa.', 'Edestä lähestyviä ajoneuvoja.', 'Oikealta lähestyvää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Vasemmalta lähestyvää kevyttä liikennettä.', 'Pyöräkatu -liikennemerkki ei sisällä nopeusrajoitusta. Pyöräkadulla nopeus on sovitettava pyöräilijöiden mukaiseksi, tie- tai aluekohtaisen nopeusrajoituksen puitteissa.', 'Edestä lähestyviä ajoneuvoja.'),
(3, 'Takanasi ajaa poliisiauto, jonka maskissa vilkkuu punainen valo. Miten toimit?', 'Lähestyt liikennevaloja. Sinulle palaa keltainen valo. Minkä väriseksi valot ovat vaihtumassa?', 'Saavut risteykseen, jossa sinulla on STOP-merkki. Mihin kohtaan pysähdyt?', 'Kiihdytän vauhtia, jotta en hidasta poliisin pääsyä kohteeseen.', 'Pyrin etsimään mahdollisimman nopeasti turvallisen paikan, johon voin pysähtyä.', 'Annan poliisille tietä kaistaa vaihtamalla.', 'Vihreäksi', 'Punaiseksi', 'Tulevan valon väriä on mahdoton ennustaa.', 'Mikäli pysäytysviivaa ei ole, STOP-merkin kohdalle.', 'Mikäli pysäytysviivaa ei ole, sellaiseen paikkaan ennen risteävää tietä, josta on esteetön näkyvyys molempiin suuntiin.', 'Mikäli pysäytysviivaa ei ole, aina ennen STOP-merkkiä.', 'Pyrin etsimään mahdollisimman nopeasti turvallisen paikan, johon voin pysähtyä.', 'Punaiseksi', 'Mikäli pysäytysviivaa ei ole, sellaiseen paikkaan ennen risteävää tietä, josta on esteetön näkyvyys molempiin suuntiin.'),
(4, 'Olet kääntymässä liikennevaloista oikealle vihreän valon palaessa. Kääntyjille (sinulle) on nuolen muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Olet kääntymässä liikennevaloista vasemmalle vihreän valon palaessa. Kääntyjille (sinulle) on nuolen muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Lähestyt liikennevaloja, joissa sinulla on myös väistämismerkki. Tarkoituksenasi on jatkaa suoraan. Ketä saatat joutua väistämään liikennevalon vaihduttua vihreäksi?', 'Vasemmalta lähestyviä ajoneuvoja.', 'Takaa lähestyvää, risteävää tietä ylittävää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Edestä lähestyviä ajoneuvoja.', 'Vasemmalta lähestyvää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Vasemmalta lähestyvää autoa.', 'Oikealta lähestyvää autoa.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.'),
(5, 'Sinua vastaan tulee poliisiauto, jonka maskissa vilkkuu punainen valo. Miten toimit?', 'Olet kääntymässä liikennevaloista oikealle vihreän valon palaessa. Kääntyjille (sinulle) on ympyrän muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Miten helpotat muiden ennakointia?', 'Tilanne edellyttää minulta varovaisuutta, mutta ei pysähtymistä.', 'Pysähdyn seuraavaan turvalliseen paikkaan.', 'Pysähdyn välittömästi.', 'Edestä lähestyviä ja tulosuunnastaan katsottuna vasemmalle kääntyviä ajoneuvoja.', 'Edestä lähestyvää, risteävää tietä ylittävää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Ajamalla aina suurinta sallittua nopeutta.', 'Hiljentämällä nopeutta vasta juuri ennen risteystä, jos minulla on väistämisvelvollisuus.', 'Pitämällä valot aina päällä.', 'Tilanne edellyttää minulta varovaisuutta, mutta ei pysähtymistä.', 'Edestä lähestyvää, risteävää tietä ylittävää kevyttä liikennettä.', 'Pitämällä valot aina päällä.'),
(6, 'Miten kuljettajan tulee toimia, jos liikennevaloissa, viereisellä kaistalla oleva kuljettaja haastaa kilpailuun.', 'Mitä seuraavista saat kuljettaa B-luokan ajo-oikeudella?', 'Millainen vaikutus havainnointiin on edellä ajavaan pidettävällä etäisyydellä?', 'Haasteeseen on vastattava välittömästi rajulla kiihdytyksellä, jolloin haastajalta otetaan luulot pois heti eikä kilpa-ajosta tule kohtuuttoman pitkä.', 'Kuljettajan on osoitettava nyökkäämällä, että hän aikoo ottaa haasteen vastaan. Itse kilpa-ajo on syytä suorittaa moottoritiellä, missä kevyttä liikennettä on vähemmän.', 'Kuljettaja ei saa antaa kilpailuhaasteen vaikuttaa omaan ajamiseensa mitenkään.', 'Pakettiautoa', 'Kevyttä kuorma-autoa', 'Kuorma-autoa', 'Mitä vähemmän edellä ajavaan on etäisyyttä, sitä helpompaa on havainnointi.', 'Mitä enemmän edellä ajavaan on etäisyyttä, sitä helpompaa on havainnointi.', 'Edellä ajavaan pidettävällä etäisyydellä ei ole vaikutusta havainnointiin.', 'Kuljettaja ei saa antaa kilpailuhaasteen vaikuttaa omaan ajamiseensa mitenkään.', 'Pakettiautoa', 'Mitä enemmän edellä ajavaan on etäisyyttä, sitä helpompaa on havainnointi.'),
(7, 'Lähestyt liikennevaloja, joissa vilkkuu keltainen liikennevalo. Viereisellä kaistalla on suojatien eteen pysähtynyt auto. Miten toimit?', 'Aiot vaihtaa kaistaa vasemmalle. Mistä peilistä on tässä tilanteessa eniten apua?', 'Miten alkoholi vaikuttaa kuljettajan rutiineihin?', 'Minun on pysähdyttävä, koska suojatien eteen pysähtynyttä autoa ei saa ohittaa pysähtymättä.', 'Voin jatkaa ajamista riitävän alhaisella tilannenopeudella, koska risteyksessä on liikennevalot.', 'Minun on pysähdyttävä tilanteessa vain, jos risteyksessä on tulosuunnastani katsottuna STOP-merkki.', 'Vasemmasta sivupeilistä', 'Oikeasta sivupeilistä', 'Taustapeilistä', 'Nautittuaan alkoholia kuljettajan rutiinit unohtuvat herkemmin.', 'Alkoholilla ei ole vaikutusta kokeneen kuljettajan rutiineihin.', 'Alkoholilla ei ole vaikutusta kuljettajalle muodostuneisiin rutiineihin.', 'Minun on pysähdyttävä, koska suojatien eteen pysähtynyttä autoa ei saa ohittaa pysähtymättä.', 'Vasemmasta sivupeilistä', 'Nautittuaan alkoholia kuljettajan rutiinit unohtuvat herkemmin.'),
(8, 'Miten helpotat omia mahdollisuuksiasi ennakoida?', 'Mikä on törkeän rattijuopumuksen promilleraja?', 'Mistä tiedät, että käyttämäsi lääke saattaa heikentää suorituskykyäsi liikenteessä?', 'Ajamalla aina suurinta sallittua nopeutta.', 'Havainnoimalla mahdollisimman lähelle.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '0,2', '0,5', '1,2', 'Tablettien punaisesta väristä.', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.', 'Lääkepaketin viivakoodin viimeinen numero on parillinen.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '1,2', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.'),
(9, 'Millainen on sosiaalinen kuljettaja?', 'Olet liittymässä väistämismerkin takaa valtatien liikenteeseen. Vasemmalta lähestyy auto, joka on aikeissa kääntyä tulosuunnastaan katsottuna oikealle. Muita ajoneuvoja ei ole näkyvissä. Miten toimit?', 'Aiot kääntyä risteyksestä. Mikä seuraavista on oikea tapa kertoa aikeesta muille?', 'Sosiaalinen kuljettaja kykenee puhumaan puhelimeen ajaessaan keskittymisen herpaantumatta.', 'Sosiaalinen kuljettaja asettaa muiden tienkäyttäjien tarpeet omiensa edelle.', 'Sosiaalinen kuljettaja ei uskalla ajaa yksin.', 'Lähden poikkeuksellisen ripeästi liikkeelle ennen kuin muita ehtii ilmestyä näköpiiriin.', 'Tilanne on täysin riskitön, joten voin lähteä liikkeelle normaalisti.', 'Annan vasemmalta lähestyvän auton kääntyä ensin, jotta voin varmistaa, ettei sen takana, katveessa, ole ketään.', 'Ensin syttyy suuntamerkki ja vasta sitten jarruvalo.', 'Ensin syttyy jarruvalo ja vasta sen jälkeen suuntamerkki.', 'Jarruvalojen ja suuntamerkin on syytä syttyä yhtäaikaa.', 'Sosiaalinen kuljettaja asettaa muiden tienkäyttäjien tarpeet omiensa edelle.', 'Annan vasemmalta lähestyvän auton kääntyä ensin, jotta voin varmistaa, ettei sen takana, katveessa, ole ketään.', 'Ensin syttyy suuntamerkki ja vasta sitten jarruvalo.'),
(10, 'Miten kuljettajan tulisi reagoida, jos kyydissä olevat matkustajat yllyttävät häntä ajamaan kovempaa?', 'Mitä tarkoitetaan kuljettajan reaktiomatkalla?', 'Mistä tiedät maantienopeutta 80 km/h ajaessasi, että turvaväliä edellä ajavaan on riittävästi?', 'Kuljettajan on syytä nostaa nopeutta, koska muuten häntä ei arvosteta kuljettajana.', 'Kuljettajan on syytä päästää takapenkillä istuva nopeampi kuljettaja rattiin.', 'Kuljettaja ei saa antaa matkustajien luoman sosiaalisen paineen vaikuttaa ajamiseensa.', 'Matkaa, jonka auto kulkee kuljettajan havainnosta jarrutuksen aloittamiseen.', 'Matkaa, jonka auto kulkee kuljettajan havainnosta pysähtymiseen.', 'Matkaa, jonka auto kulkee jarrutuksen aloittamisesta pysähtymiseen.', 'Kun etäisyyden säätely edellä ajavaan onnistuu pelkän kaasupolkimen avulla.', 'Kun etäisyyden säätö edellä ajavaan onnistuu vähän väliä jarruttamalla.', 'Kun oman auton ja edellä ajavan väliin mahtuisi yksi henkilöauto.', 'Kuljettaja ei saa antaa matkustajien luoman sosiaalisen paineen vaikuttaa ajamiseensa.', 'Matkaa, jonka auto kulkee kuljettajan havainnosta jarrutuksen aloittamiseen.', 'Kun etäisyyden säätely edellä ajavaan onnistuu pelkän kaasupolkimen avulla.');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward` (
  `rewardID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`rewardID`, `studentID`, `level`, `certificate`) VALUES
(442, 555, NULL, NULL),
(443, 556, NULL, NULL),
(444, 557, NULL, NULL),
(445, 558, NULL, NULL),
(446, 559, NULL, NULL),
(447, 560, NULL, NULL),
(448, 561, NULL, NULL),
(449, 562, NULL, NULL),
(450, 563, NULL, NULL),
(451, 564, NULL, NULL),
(452, 565, NULL, NULL),
(453, 566, NULL, NULL),
(454, 567, NULL, NULL),
(455, 568, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `studentID` int(3) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `first_name`, `last_name`, `email`) VALUES
(555, 'joku', 'oppilas', 'joku@mail.fi'),
(556, 'andy', 'oppilas', 'andy@mail.fi'),
(557, 'uusi', 'oppilas', 'uusi@mail.fi'),
(558, 'uusi2', 'oppilas', 'uusi2@mail.fi'),
(559, 'uusi3', 'oppilas', 'uusi3@mail.fi'),
(560, 'uusi4', 'oppilas', 'uusi4@mail.fi'),
(561, 'uusi4', 'oppilas', 'uusi@mail.fi'),
(562, 'uusi5', 'oppilas', 'uusi5@mail.fi'),
(563, 'mikko', 'mallikas', 'mikko@mail.fi'),
(564, 'mikko', 'mallikas2', 'mikko2@mail.fi'),
(565, 'random', 'sukunimi', 'random@mail.fi'),
(566, 'brad', 'smith', 'brad@mail.fi'),
(567, 'angelina', 'smith', 'angelina@mail.fi'),
(568, 'gabriel', 'smith', 'gabriel@mail.fi');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `testID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `question_1` varchar(255) DEFAULT NULL,
  `question_2` varchar(255) DEFAULT NULL,
  `question_3` varchar(255) DEFAULT NULL,
  `opt_1_1` varchar(255) DEFAULT NULL,
  `opt_1_2` varchar(255) DEFAULT NULL,
  `opt_1_3` varchar(255) DEFAULT NULL,
  `opt_2_1` varchar(255) DEFAULT NULL,
  `opt_2_2` varchar(255) DEFAULT NULL,
  `opt_2_3` varchar(255) DEFAULT NULL,
  `opt_3_1` varchar(255) DEFAULT NULL,
  `opt_3_2` varchar(255) DEFAULT NULL,
  `opt_3_3` varchar(255) DEFAULT NULL,
  `user_answer_1` varchar(255) DEFAULT NULL,
  `user_answer_2` varchar(255) DEFAULT NULL,
  `user_answer_3` varchar(255) DEFAULT NULL,
  `score` int(1) DEFAULT NULL,
  `teacher_feedback` varchar(255) DEFAULT NULL,
  `creationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testID`, `studentID`, `questionID`, `question_1`, `question_2`, `question_3`, `opt_1_1`, `opt_1_2`, `opt_1_3`, `opt_2_1`, `opt_2_2`, `opt_2_3`, `opt_3_1`, `opt_3_2`, `opt_3_3`, `user_answer_1`, `user_answer_2`, `user_answer_3`, `score`, `teacher_feedback`, `creationDate`) VALUES
(498, 555, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(499, 556, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Palautetta', NULL),
(500, 557, 9, 'Millainen on sosiaalinen kuljettaja?', 'Olet liittymässä väistämismerkin takaa valtatien liikenteeseen. Vasemmalta lähestyy auto, joka on aikeissa kääntyä tulosuunnastaan katsottuna oikealle. Muita ajoneuvoja ei ole näkyvissä. Miten toimit?', 'Aiot kääntyä risteyksestä. Mikä seuraavista on oikea tapa kertoa aikeesta muille?', 'Sosiaalinen kuljettaja kykenee puhumaan puhelimeen ajaessaan keskittymisen herpaantumatta.', 'Sosiaalinen kuljettaja asettaa muiden tienkäyttäjien tarpeet omiensa edelle.', 'Sosiaalinen kuljettaja ei uskalla ajaa yksin.', 'Lähden poikkeuksellisen ripeästi liikkeelle ennen kuin muita ehtii ilmestyä näköpiiriin.', 'Tilanne on täysin riskitön, joten voin lähteä liikkeelle normaalisti.', 'Annan vasemmalta lähestyvän auton kääntyä ensin, jotta voin varmistaa, ettei sen takana, katveessa, ole ketään.', 'Ensin syttyy suuntamerkki ja vasta sitten jarruvalo.', 'Ensin syttyy jarruvalo ja vasta sen jälkeen suuntamerkki.', 'Jarruvalojen ja suuntamerkin on syytä syttyä yhtäaikaa.', 'Sosiaalinen kuljettaja ei uskalla ajaa yksin.', 'Lähden poikkeuksellisen ripeästi liikkeelle ennen kuin muita ehtii ilmestyä näköpiiriin.', 'Jarruvalojen ja suuntamerkin on syytä syttyä yhtäaikaa.', 0, 'joku kommentti', '2022-05-25'),
(501, 558, 2, 'Olet kääntymässä liikennevaloista vasemmalle vihreän valon palaessa. Kääntyjille (sinulle) on nuolen muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Mikä nopeusrajoitus sisältyy pyöräkatu -liikennemerkkiin?', 'Olet kääntymässä liikennevaloista vasemmalle vihreän valon palaessa. Kääntyjille (sinulle) on ympyrän muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Edestä lähestyviä ajoneuvoja.', 'Vasemmalta lähestyvää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', '20 km/h', '30 km/h', 'Pyöräkatu -liikennemerkki ei sisällä nopeusrajoitusta. Pyöräkadulla nopeus on sovitettava pyöräilijöiden mukaiseksi, tie- tai aluekohtaisen nopeusrajoituksen puitteissa.', 'Edestä lähestyviä ajoneuvoja.', 'Oikealta lähestyvää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.', 'Pyöräkatu -liikennemerkki ei sisällä nopeusrajoitusta. Pyöräkadulla nopeus on sovitettava pyöräilijöiden mukaiseksi, tie- tai aluekohtaisen nopeusrajoituksen puitteissa.', 'Edestä lähestyviä ajoneuvoja.', 0, NULL, '2022-05-25'),
(502, 559, 8, 'Miten helpotat omia mahdollisuuksiasi ennakoida?', 'Mikä on törkeän rattijuopumuksen promilleraja?', 'Mistä tiedät, että käyttämäsi lääke saattaa heikentää suorituskykyäsi liikenteessä?', 'Ajamalla aina suurinta sallittua nopeutta.', 'Havainnoimalla mahdollisimman lähelle.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '0,2', '0,5', '1,2', 'Tablettien punaisesta väristä.', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.', 'Lääkepaketin viivakoodin viimeinen numero on parillinen.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '1,2', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.', 1, 'NULL', '2022-05-25'),
(503, 560, 8, 'Miten helpotat omia mahdollisuuksiasi ennakoida?', 'Mikä on törkeän rattijuopumuksen promilleraja?', 'Mistä tiedät, että käyttämäsi lääke saattaa heikentää suorituskykyäsi liikenteessä?', 'Ajamalla aina suurinta sallittua nopeutta.', 'Havainnoimalla mahdollisimman lähelle.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '0,2', '0,5', '1,2', 'Tablettien punaisesta väristä.', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.', 'Lääkepaketin viivakoodin viimeinen numero on parillinen.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '1,2', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.', 1, 'NULL', '2022-05-25'),
(504, 561, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(505, 562, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(506, 563, 7, 'Lähestyt liikennevaloja, joissa vilkkuu keltainen liikennevalo. Viereisellä kaistalla on suojatien eteen pysähtynyt auto. Miten toimit?', 'Aiot vaihtaa kaistaa vasemmalle. Mistä peilistä on tässä tilanteessa eniten apua?', 'Miten alkoholi vaikuttaa kuljettajan rutiineihin?', 'Minun on pysähdyttävä, koska suojatien eteen pysähtynyttä autoa ei saa ohittaa pysähtymättä.', 'Voin jatkaa ajamista riitävän alhaisella tilannenopeudella, koska risteyksessä on liikennevalot.', 'Minun on pysähdyttävä tilanteessa vain, jos risteyksessä on tulosuunnastani katsottuna STOP-merkki.', 'Vasemmasta sivupeilistä', 'Oikeasta sivupeilistä', 'Taustapeilistä', 'Nautittuaan alkoholia kuljettajan rutiinit unohtuvat herkemmin.', 'Alkoholilla ei ole vaikutusta kokeneen kuljettajan rutiineihin.', 'Alkoholilla ei ole vaikutusta kuljettajalle muodostuneisiin rutiineihin.', 'Minun on pysähdyttävä tilanteessa vain, jos risteyksessä on tulosuunnastani katsottuna STOP-merkki.', 'Taustapeilistä', 'Nautittuaan alkoholia kuljettajan rutiinit unohtuvat herkemmin.', 0, 'NULL', '2022-05-25'),
(507, 564, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(508, 565, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(509, 566, 3, 'Takanasi ajaa poliisiauto, jonka maskissa vilkkuu punainen valo. Miten toimit?', 'Lähestyt liikennevaloja. Sinulle palaa keltainen valo. Minkä väriseksi valot ovat vaihtumassa?', 'Saavut risteykseen, jossa sinulla on STOP-merkki. Mihin kohtaan pysähdyt?', 'Kiihdytän vauhtia, jotta en hidasta poliisin pääsyä kohteeseen.', 'Pyrin etsimään mahdollisimman nopeasti turvallisen paikan, johon voin pysähtyä.', 'Annan poliisille tietä kaistaa vaihtamalla.', 'Vihreäksi', 'Punaiseksi', 'Tulevan valon väriä on mahdoton ennustaa.', 'Mikäli pysäytysviivaa ei ole, STOP-merkin kohdalle.', 'Mikäli pysäytysviivaa ei ole, sellaiseen paikkaan ennen risteävää tietä, josta on esteetön näkyvyys molempiin suuntiin.', 'Mikäli pysäytysviivaa ei ole, aina ennen STOP-merkkiä.', 'Pyrin etsimään mahdollisimman nopeasti turvallisen paikan, johon voin pysähtyä.', 'Punaiseksi', 'Mikäli pysäytysviivaa ei ole, STOP-merkin kohdalle.', 0, 'NULL', '2022-05-25'),
(510, 567, 4, 'Olet kääntymässä liikennevaloista oikealle vihreän valon palaessa. Kääntyjille (sinulle) on nuolen muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Olet kääntymässä liikennevaloista vasemmalle vihreän valon palaessa. Kääntyjille (sinulle) on nuolen muotoinen liikennevalo. Ketä saatat joutua väistämään?', 'Lähestyt liikennevaloja, joissa sinulla on myös väistämismerkki. Tarkoituksenasi on jatkaa suoraan. Ketä saatat joutua väistämään liikennevalon vaihduttua vihreäksi?', 'Vasemmalta lähestyviä ajoneuvoja.', 'Takaa lähestyvää, risteävää tietä ylittävää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Edestä lähestyviä ajoneuvoja.', 'Vasemmalta lähestyvää kevyttä liikennettä.', 'Väistettäviä ei pitäisi olla.', 'Vasemmalta lähestyvää autoa.', 'Oikealta lähestyvää autoa.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.', 'Väistettäviä ei pitäisi olla.', 1, 'NULL', '2022-05-25'),
(511, 568, 8, 'Miten helpotat omia mahdollisuuksiasi ennakoida?', 'Mikä on törkeän rattijuopumuksen promilleraja?', 'Mistä tiedät, että käyttämäsi lääke saattaa heikentää suorituskykyäsi liikenteessä?', 'Ajamalla aina suurinta sallittua nopeutta.', 'Havainnoimalla mahdollisimman lähelle.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '0,2', '0,5', '1,2', 'Tablettien punaisesta väristä.', 'Lääkepaketin kyljessä olevasta punaisesta kolmiosta.', 'Lääkepaketin viivakoodin viimeinen numero on parillinen.', 'Pitämällä riittävästi turvaväliä edellä ajavaan.', '0,2', 'Lääkepaketin viivakoodin viimeinen numero on parillinen.', 0, 'NULL', '2022-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`rewardID`),
  ADD KEY `userID` (`studentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `questionID` (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `rewardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reward`
--
ALTER TABLE `reward`
  ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
