-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 12:52 AM
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
(3, 112, NULL, NULL),
(4, 113, NULL, NULL),
(5, 114, NULL, NULL),
(6, 115, NULL, NULL),
(7, 116, NULL, NULL),
(8, 117, NULL, NULL),
(9, 118, NULL, NULL),
(10, 119, NULL, NULL),
(11, 120, NULL, NULL),
(12, 121, NULL, NULL),
(13, 122, NULL, NULL),
(14, 123, NULL, NULL),
(15, 124, NULL, NULL),
(16, 125, NULL, NULL),
(17, 126, NULL, NULL),
(18, 127, NULL, NULL),
(19, 128, NULL, NULL),
(20, 129, NULL, NULL),
(21, 130, NULL, NULL);

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
(103, 'joni', 'joppe', 'joni2@gmail.com'),
(104, 'dfg', 'dfgdfg', 'df@sdfsdf'),
(105, 'dfg', 'dfg', 'dfg@dfgdfgdf'),
(106, 'dfg', 'dfg', 'df@sdfdsf'),
(107, 'gfd', 'dfg', 'fdg@asfdasd'),
(108, 'dfg', 'sdfgsd', 'dfasdk@asdasd'),
(109, 'sdf', 'sdfs', 'df@asdasd'),
(110, 'dfg', 'dfg', 'dfg@asasd'),
(111, 'dfg', 'dfgd', 'fg@sdfsdf'),
(112, 'sdf', 'sdfs', 'df2asdasdas@asd'),
(113, 'sdf', 'sdf', 'sdf@asdasd'),
(114, 'sdf', 'sdfs', 'df2asdasd@asdas'),
(115, 'dfg', 'dfgd', 'fg@asdasd'),
(116, 'fgh', 'fghfg', 'h@sdfds'),
(117, 'dfg', 'dfg', 'df2asda@asd'),
(118, 'dfg', 'dfg', 'df2asdasd@asdasd'),
(119, 'asd', 'asda', 'sd2asdasdasd@asdasd'),
(120, 'dfg', 'dfg', 'df@asdsd'),
(121, 'dsf', 'sdf', 'sdf@asdasd'),
(122, 'sdf', 'sdfs', 'df@dfsdfggfd'),
(123, 'dfg', 'dfg', 'dfg@sdgfsdf'),
(124, 'dfgd', 'fgdf', 'g@sdfgsdf'),
(125, 'dfg', 'dfg', 'dfg2sdfdf@sdfsdf'),
(126, 'sdf', 'sdf', 'sdf@dfasdasd'),
(127, 'dfg', 'dfgd', 'fg@asdasdas'),
(128, 'dfg', 'dfg', 'sdfsfgdf@asdasdasd'),
(129, 'sdf', 'sdf', 'sdf@asd'),
(130, 'dfg', 'dfg', 'dfg@asdasdasdasd');

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
(46, 103, 4, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(47, 104, 7, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(48, 105, 2, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(49, 106, 7, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(50, 107, 9, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(51, 108, 8, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(52, 109, 7, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(53, 110, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(54, 111, 2, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(55, 112, 2, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(56, 113, 6, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(57, 114, 10, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(58, 115, 4, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(59, 116, 6, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(60, 117, 3, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(61, 118, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(62, 119, 9, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '0', '2022-05-13'),
(63, 120, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 121, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 122, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 123, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 124, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 125, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 126, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 127, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 128, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 129, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 130, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `rewardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
