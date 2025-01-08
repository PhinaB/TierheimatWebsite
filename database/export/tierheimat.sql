-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jan 2025 um 21:05
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tierheimat`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artderhilfe`
--

CREATE TABLE `artderhilfe` (
  `ArtID` int(11) NOT NULL,
  `ArtDerHilfe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `artderhilfe`
--

INSERT INTO `artderhilfe` (`ArtID`, `ArtDerHilfe`) VALUES
(5, 'Kleintiersitting'),
(3, 'Reinigung der Gehege'),
(2, 'Spazieren gehen'),
(1, 'Tiere füttern'),
(4, 'Transport von Tieren');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `ArtikelID` int(11) NOT NULL,
  `Ueberschrift` varchar(200) NOT NULL,
  `Text` varchar(5000) NOT NULL,
  `Datum` date NOT NULL,
  `Bildadresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`ArtikelID`, `Ueberschrift`, `Text`, `Datum`, `Bildadresse`) VALUES
(1, 'Neues aus dem Tierheim', 'Sehr geehrte Unterstützer und Freunde unseres Tierheims, wir freuen uns sehr, Ihnen mitteilen zu können, dass die bauliche Erweiterung unseres Tierheims erfolgreich begonnen hat. Dank Ihrer großzügigen Spenden und Unterstützung konnten wir neue Unterkünfte und moderne Einrichtungen für unsere Tiere schaffen. Diese Erweiterung ermöglicht es uns noch mehr Tieren in Not zu helfen und ihnen ein vorübergehendes Zuhause zu bieten. Ein herzliches Dankeschön an alle Spender, freiwilligen Helfer und Partner, die dieses Projekt möglich gemacht haben. Ihr Engagement und Ihre Großzügigkeit sind ein bedeutender Beitrag zu unserem gemeinsamen Ziel, den Tieren in unserer Obhut das bestmögliche Leben zu ermöglichen.', '2024-12-23', 'ausbauTierheim.jpg'),
(2, '15 Jahre Tierheimat', 'Dieses Jahr feiern wir mit Stolz das 15-jährige Bestehen unseres Tierheims und blicken auf eine bewegte, erfolgreiche Geschichte zurück. Seit unserer Gründung haben wir es uns zur Aufgabe gemacht, Tieren in Not ein sicheres Zuhause, liebevolle Betreuung und die Aussicht auf ein neues Leben in einer Familie zu bieten. In diesen Jahren konnten wir nicht nur zahlreiche Tiere retten und vermitteln, sondern auch ein Netzwerk aus engagierten Unterstützern, freiwilligen Helfern und Partnern aufbauen, die unsere Arbeit erst möglich machen. Unsere Vision war von Beginn an klar: Jedes Tier verdient eine zweite Chance. Wir danken all den Menschen, die uns über die Jahre begleitet und unsere Mission geteilt haben. Ohne eure Unterstützung wären wir heute nicht da, wo wir sind.', '2024-11-05', 'tierheimFest.jpg'),
(3, 'Sieger des Thüringer Tierheimwettbewerb', 'Wir freuen uns außerordentlich, bekannt zu geben, dass unser Tierheim den Thüringer Tierheimwettbewerb gewonnen hat. Diese prestigeträchtige Auszeichnung ist ein Beweis für die harte Arbeit, das Engagement und die Hingabe unseres Teams. Sie honoriert nicht nur die hervorragenden Bedingungen, die wir unseren Tieren bieten, sondern auch unsere innovativen Ansätze in der Tiervermittlung, Pflege und Öffentlichkeitsarbeit. Der Preis motiviert uns, noch mehr zu tun, und wir möchten ihn mit all jenen teilen, die uns täglich unterstützen – sei es durch Spenden, ehrenamtliche Arbeit oder den einfachen, aber wertvollen Akt des Teilens unserer Botschaft. Dieser Erfolg gehört uns allen!', '2024-09-12', 'Pokal.jpg'),
(4, 'Wir begrüßen unsere neuen Veterinärstudenten', 'Wir heißen einen neuen Veterinärstudenten in unserem Team herzlich willkommen. Mit seinen frischen Kenntnissen und seinem Enthusiasmus bringt er wertvolle Impulse in unsere Arbeit ein. Seine Perspektive ergänzt die Erfahrung unseres Teams auf wunderbare Weise, und wir freuen uns, gemeinsam neue Ideen umzusetzen, die unseren Tieren zugutekommen. Der Einsatz eines Veterinärstudenten zeigt auch, wie wichtig uns Bildung und die Förderung junger Talente sind. Gemeinsam wollen wir noch besser werden und den Tieren die bestmögliche Versorgung bieten. Willkommen in der Tierheimfamilie!', '2024-07-27', 'tierarztStudent.jpg'),
(5, 'Erneuerung der Ruhestätte', 'Mit großem Respekt und Hingabe haben wir die Ruhestätte unseres Tierheims erneuert. Dieser Ort bietet nun eine würdevolle Umgebung, um unseren tierischen Freunden, die uns verlassen haben, die letzte Ehre zu erweisen. Die neugestaltete Ruhestätte ist nicht nur ein Ort der Erinnerung, sondern auch ein Zeichen dafür, wie wichtig uns jedes einzelne Tier ist – ob es noch bei uns ist oder bereits gegangen ist. Wir laden alle herzlich ein, diesen besonderen Platz zu besuchen, um der Tiere zu gedenken, die unsere Herzen berührt haben. Ihr Andenken bleibt für immer ein Teil unserer Tierheimgeschichte.', '2024-05-18', 'friedhof.jpg'),
(6, 'Erfolgreiche Tiervermittlung', 'In den letzten Monaten konnten wir zahlreiche Tiere erfolgreich in liebevolle Zuhause vermitteln. Dank der intensiven Betreuung und Pflege durch unser Team haben viele Hunde, Katzen und Kleintiere die Chance auf ein neues Leben erhalten. Unsere Vermittlungsarbeit endet jedoch nicht, wenn ein Tier unser Tierheim verlässt. Wir stehen neuen Besitzern beratend zur Seite und sorgen dafür, dass die Tiere in ihrem neuen Zuhause gut ankommen. Nichts erfüllt uns mehr, als die strahlenden Gesichter von Menschen und Tieren, die ihr Glück gefunden haben. Dies treibt uns an, weiterzumachen und noch mehr Leben zu verändern.', '2024-02-24', 'glücklicheKatze.jpg'),
(7, 'Erfolgreiche Spendenaktion', 'Unsere jüngste Spendenaktion war ein großer Erfolg! Dank der Großzügigkeit unserer Unterstützer konnten wir eine beträchtliche Summe sammeln, die direkt in die Verbesserung der Lebensbedingungen unserer Tiere fließt. Mit den gesammelten Mitteln planen wir, dringend benötigte medizinische Geräte anzuschaffen, unsere Gehege zu erweitern und weitere Schulungen für unser Team zu finanzieren. Jeder Beitrag, ob groß oder klein, hilft uns, unseren Schützlingen ein besseres Leben zu ermöglichen. Wir sind unendlich dankbar für die Unterstützung und das Vertrauen, das uns entgegengebracht wird. Gemeinsam können wir Großes bewirken!', '2024-01-03', 'tierschutzLogo.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bildertiere`
--

CREATE TABLE `bildertiere` (
  `BilderID` int(11) NOT NULL,
  `TierID` int(11) NOT NULL,
  `Bildadresse` varchar(255) NOT NULL,
  `Hauptbild` tinyint(1) NOT NULL,
  `Alternativtext` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bildertiere`
--

INSERT INTO `bildertiere` (`BilderID`, `TierID`, `Bildadresse`, `Hauptbild`, `Alternativtext`) VALUES
(1, 6, 'bella.jpeg', 1, 'Bella'),
(2, 6, 'bella2.jpeg', 0, ''),
(3, 3, 'greta.jpg', 1, 'Greta, eine aktive Ratte'),
(4, 3, 'greta2.jpg', 0, ''),
(5, 15, 'greta2.jpg', 1, 'Kira, eine schmusige Ratte'),
(6, 15, 'greta.jpg', 0, ''),
(7, 2, 'tigerpython.jpg', 1, 'eine tolle Tigerpython'),
(8, 2, 'tigerpython2.jpg', 0, ''),
(9, 4, 'wellensittiche.jpg', 1, 'eine Gruppe Wellensittiche'),
(10, 4, 'wellensittiche2.jpg', 0, ''),
(11, 5, 'simba.jpg', 1, 'Katze'),
(12, 5, 'simba2.jpg', 0, ''),
(13, 7, 'rocky.jpg', 1, 'Hund Rex'),
(14, 7, 'rocky2.jpg', 0, ''),
(15, 8, 'lilly.jpg', 1, 'Hund Mila'),
(16, 8, 'lilly2.jpg', 0, ''),
(17, 1, 'lila.jpg', 1, 'Lila'),
(18, 1, 'lila2.jpg', 0, ''),
(19, 16, 'lila2.jpg', 1, 'Lilly'),
(20, 16, 'lila.jpg', 0, ''),
(21, 9, 'fluffy.jpg', 1, 'Hase Fluffy'),
(22, 9, 'fluffy2.jpg', 0, ''),
(23, 10, 'hoppel.jpg', 1, 'Hase Hoppel'),
(24, 10, 'hoppel2.jpg', 0, ''),
(25, 11, 'kornnatter.jpg', 1, 'Kornnatter Korni'),
(26, 11, 'kornnatter2.jpg', 0, ''),
(27, 12, 'loraJendayasittich.jpg', 1, 'Jendayasittich Lora'),
(28, 12, 'loraJendayasittich2.jpg', 0, ''),
(29, 13, 'prachtrosella.jpg', 1, 'Rosella'),
(30, 13, 'prachtrosella2.jpg', 0, ''),
(31, 14, 'kornnatter2.jpg', 1, 'Kornnatter Monster'),
(32, 14, 'kornnatter.jpg', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `helfen`
--

CREATE TABLE `helfen` (
  `HelfenID` int(11) NOT NULL,
  `NutzerID` int(11) DEFAULT NULL,
  `ArtDerHilfe` int(11) NOT NULL,
  `Angenommen` tinyint(1) NOT NULL,
  `Zeit` time DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Wochentag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `NutzerID` int(11) NOT NULL,
  `NutzerrollenID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Passwort` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`NutzerID`, `NutzerrollenID`, `Name`, `Email`, `Passwort`) VALUES
(1, 1, 'Lisa', 'betreuer@example.com', '$2y$10$U4DPGbciuerXruoMIu86.uKKhVs33FzKySH8Azi8CZjzW2v1BBGV6'),
(2, 2, 'Maier', 'tierarzt@example.com', '$2y$10$Y.mzZG5LrCPHiik130UexuNIRoWuY96cdm5SlzCWO1xzkRBjhl53W');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzerrollen`
--

CREATE TABLE `nutzerrollen` (
  `NutzerrollenID` int(11) NOT NULL,
  `Rolle` varchar(100) NOT NULL,
  `kannLesen` tinyint(1) DEFAULT 0,
  `kannSchreiben` tinyint(1) DEFAULT 0,
  `kannEigenesBearbeitenUndLoeschen` tinyint(1) DEFAULT 0,
  `kannAllesLoeschen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `nutzerrollen`
--

INSERT INTO `nutzerrollen` (`NutzerrollenID`, `Rolle`, `kannLesen`, `kannSchreiben`, `kannEigenesBearbeitenUndLoeschen`, `kannAllesLoeschen`) VALUES
(1, 'Administrator', 1, 1, 1, 1),
(2, 'Nutzer', 1, 1, 1, 0),
(3, 'Gast', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rasse`
--

CREATE TABLE `rasse` (
  `RasseID` int(11) NOT NULL,
  `TierartID` int(11) NOT NULL,
  `Rasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rasse`
--

INSERT INTO `rasse` (`RasseID`, `TierartID`, `Rasse`) VALUES
(1, 1, 'Golden Retriever'),
(2, 1, 'Beagle'),
(3, 1, 'Deutscher Schäferhund'),
(4, 1, 'Bulldogge'),
(5, 1, 'Labrador'),
(6, 1, 'Cocker Spaniel'),
(7, 2, 'Perser'),
(8, 2, 'Siam'),
(9, 2, 'Maine Coon'),
(10, 2, 'Britisch Kurzhaar'),
(11, 2, 'Bengal'),
(12, 2, 'Ragdoll'),
(13, 3, 'Wellensittich'),
(14, 3, 'Papagei'),
(15, 3, 'Kanarienvogel'),
(16, 3, 'Ara'),
(17, 4, 'Python'),
(18, 4, 'Kornnatter'),
(19, 4, 'Gecko'),
(20, 4, 'Chamäleon'),
(21, 3, 'Maus/Ratte'),
(22, 3, 'Hase'),
(23, 3, 'Kaninchen'),
(24, 3, 'Hamster'),
(25, 3, 'Meerschweinchen'),
(26, 4, 'Axolotl'),
(27, 4, 'Schmetterling'),
(28, 4, 'Ameise');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tierart`
--

CREATE TABLE `tierart` (
  `TierartID` int(11) NOT NULL,
  `Tierart` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tierart`
--

INSERT INTO `tierart` (`TierartID`, `Tierart`) VALUES
(4, 'Exoten'),
(1, 'Hunde'),
(2, 'Katzen'),
(3, 'Kleintiere');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tiere`
--

CREATE TABLE `tiere` (
  `TierID` int(11) NOT NULL,
  `RasseID` int(11) NOT NULL,
  `Geschlecht` varchar(50) DEFAULT NULL,
  `Beschreibung` varchar(500) NOT NULL,
  `Geburtsjahr` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Charakter` varchar(255) DEFAULT NULL,
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tiere`
--

INSERT INTO `tiere` (`TierID`, `RasseID`, `Geschlecht`, `Beschreibung`, `Geburtsjahr`, `Name`, `Charakter`, `Datum`) VALUES
(1, 2, 'Weiblich', 'Freundliche Hündin, liebt Kinder.', 2001, 'Lila', 'Verspielt', '2024-11-01'),
(2, 17, 'Weiblich', 'Ruhige Schlange, pflegeleicht.', 2011, 'Tiger', 'Ruhig', '2024-11-02'),
(3, 21, 'Weiblich', 'Kleine Ratte, sehr aktiv.', 2008, 'Greta', 'Neugierig', '2024-11-03'),
(4, 13, 'Weiblich', 'Gesellige Sittiche in großer Gruppe.', 2011, 'Wellis', 'Fröhlich', '2024-11-04'),
(5, 10, 'Männlich', 'Kuschelt gerne, ideal für Familien.', 2001, 'Simba', 'Zutraulich', '2024-11-05'),
(6, 4, 'Weiblich', 'Lebhafte Hündin, liebt Spaziergänge.', 2013, 'Bella', 'Energisch', '2024-11-10'),
(7, 3, 'Männlich', 'Treuer Begleiter, liebt Aufmerksamkeit.', 2012, 'Rex', 'Treu', '2024-11-11'),
(8, 2, 'Weiblich', 'Sanfter Hund, eher zurückhaltend.', 2011, 'Mila', 'Sanft', '2024-11-12'),
(9, 23, 'Männlich', 'Fluffy ist sehr liebevoll zu Kindern.', 2011, 'Fluffy', 'Liebevoll', '2024-10-12'),
(10, 23, 'Weiblich', 'Hoppel ist gut mit Fluffy befreundet.', 2011, 'Hoppel', 'Liebevoll', '2024-10-12'),
(11, 18, 'Weiblich', 'Diese Kornnatter liebt es zu fressen.', 2011, 'Korni', 'Fressgierig', '2024-10-12'),
(12, 14, 'Weiblich', 'Lora spricht gerne alles nach.', 2011, 'Lora', 'Verspielt', '2024-10-12'),
(13, 14, 'Weiblich', 'Rosella ist sehr bunt.', 2011, 'Rosella', 'prächtig', '2024-10-12'),
(14, 18, 'Weiblich', 'Unser liebevoll getauftes Mosnter ist rasend schnell unterwegs.', 2011, 'Monster', 'Fressgierig', '2024-02-12'),
(15, 21, 'Weiblich', 'Neugierige und spaßige Ratte.', 2008, 'Kira', 'Neugierig', '2024-11-08'),
(16, 2, 'Weiblich', 'Freundliche und spaßige Hündin, liebt Kinder.', 2001, 'Lilly', 'Verspielt', '2024-06-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vermisstgefundentiere`
--

CREATE TABLE `vermisstgefundentiere` (
  `VermisstGefundenTiereID` int(11) NOT NULL,
  `ZuletztGeaendertNutzerID` int(11) DEFAULT NULL,
  `TierartID` int(11) NOT NULL,
  `Typ` varchar(100) NOT NULL,
  `Datum` datetime NOT NULL,
  `Ort` varchar(250) NOT NULL,
  `Beschreibung` varchar(500) NOT NULL,
  `Kontaktaufnahme` varchar(50) NOT NULL,
  `Bildadresse` varchar(255) DEFAULT NULL,
  `Geloescht` tinyint(1) NOT NULL,
  `ZuletztGeaendert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `vermisstgefundentiere`
--

INSERT INTO `vermisstgefundentiere` (`VermisstGefundenTiereID`, `ZuletztGeaendertNutzerID`, `TierartID`, `Typ`, `Datum`, `Ort`, `Beschreibung`, `Kontaktaufnahme`, `Bildadresse`, `Geloescht`, `ZuletztGeaendert`) VALUES
(1, 1, 1, 'vermisst', '2024-01-02 00:00:00', 'Weimar', 'Wir waren am Samstag Abend mit Pablo in Weimar am Park an der Ilm spazieren und haben ihn nur kurz aus den Augen gelassen. Wir vermissen ihn sehr. Jeder Hinweis könnte uns bei der Suche helfen.', 'telefon', '../public/img/pablo.jpg', 0, '2024-01-02 00:00:00'),
(2, 2, 3, 'vermisst', '2024-03-02 00:00:00', 'Vieselbach', 'Unser Degu Luke wird seit dem 2. März in Vieselbach vermisst. Hinweise nehmen wir dankend telefonisch entgegen. Bitte helfen Sie uns, ihn wiederzufinden!', 'telefon', '../public/img/luke.jpg', 0, '2024-01-02 00:00:00'),
(3, 2, 2, 'vermisst', '2024-01-03 00:00:00', 'Stotternheim', 'Lotta, unsere getigerte Katze mit einem weißen Fleck auf der Brust, wird seit dem 3. Januar in Stotternheim vermisst. Sie ist scheu, aber sehr lieb. Bitte melden Sie sich per E-Mail, falls Sie sie sehen.', 'email', '../public/img/lotta.jpg', 0, '2024-01-04 00:00:00'),
(4, 2, 3, 'vermisst', '2024-06-07 00:00:00', 'Erfurt', 'Unsere Schildkröte Raspun ist am 7. Juni in Erfurt verschwunden. Jeder Hinweis hilft uns, sie wiederzufinden. Bitte melden Sie sich per E-Mail!', 'email', '../public/img/raspun.jpg', 0, '2024-12-06 00:00:00'),
(5, 1, 2, 'vermisst', '2024-05-02 00:00:00', 'Arnstadt', 'Drako, unser schwarz-weißer Kater, wird seit dem 2. Mai in Arnstadt vermisst. Er trägt ein grünes Halsband mit unserer Telefonnummer. Bitte melden Sie sich per E-Mail, falls Sie ihn gesehen haben.', 'email', '../public/img/drako.jpg', 0, '2024-11-04 00:00:00'),
(6, 2, 2, 'gefunden', '2024-05-23 00:00:00', 'Weimar', 'Ich habe die Katze am Mittwoch Abend in Erfurt an der Altonaer Straße gefunden. Sie wirkte verschreckt, abgemagert und hatte Flöhe. Ich habe sie mit nach Hause genommen und sie wieder aufgepäppelt. Jetzt geht es ihr wieder besser.', 'telefon', '../public/img/gefundeneKatze.jpg', 0, '2024-01-05 00:00:00'),
(7, 2, 1, 'gefunden', '2023-09-27 00:00:00', 'Erfurt', 'Dieser Hund ist mir am 27. September in Erfurt zugelaufen. Falls Sie ihn vermissen, melden Sie sich bitte per E-Mail, damit er wieder nach Hause kann', 'email', '../public/img/max.jpg', 0, '2024-06-04 00:00:00'),
(8, 1, 2, 'gefunden', '2024-02-25 00:00:00', 'Vieselbach', 'Ich habe diese Katze am 25. Februar in Vieselbach gefunden. Sie scheint ein Zuhause zu suchen. Bitte melden Sie sich telefonisch, falls Sie sie kennen.', 'telefon', '../public/img/flo.jpg', 0, '2024-02-04 00:00:00'),
(9, 1, 1, 'gefunden', '2024-04-26 00:00:00', 'Erfurt', 'Dieser Hund ist mir am 26. April in Erfurt begegnet. Er war allein unterwegs. Falls Sie ihn suchen, melden Sie sich bitte per E-Mail!', 'email', '../public/img/nick.jpeg', 0, '2024-03-04 00:00:00'),
(10, 2, 2, 'gefunden', '2024-06-19 00:00:00', 'Hohenfelden', 'Ich habe diesen Kater am 19. Juni in Hohenfelden gefunden. Er ist zutraulich und gut gepflegt. Bitte melden Sie sich telefonisch, falls er Ihnen gehört.', 'telefon', '../public/img/stan.jpg', 0, '2024-01-07 00:00:00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artderhilfe`
--
ALTER TABLE `artderhilfe`
  ADD PRIMARY KEY (`ArtID`),
  ADD UNIQUE KEY `ArtDerHilfe` (`ArtDerHilfe`);

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ArtikelID`);

--
-- Indizes für die Tabelle `bildertiere`
--
ALTER TABLE `bildertiere`
  ADD PRIMARY KEY (`BilderID`),
  ADD KEY `TierID` (`TierID`);

--
-- Indizes für die Tabelle `helfen`
--
ALTER TABLE `helfen`
  ADD PRIMARY KEY (`HelfenID`),
  ADD KEY `NutzerID` (`NutzerID`),
  ADD KEY `ArtDerHilfe` (`ArtDerHilfe`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`NutzerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `NutzerrollenID` (`NutzerrollenID`);

--
-- Indizes für die Tabelle `nutzerrollen`
--
ALTER TABLE `nutzerrollen`
  ADD PRIMARY KEY (`NutzerrollenID`),
  ADD UNIQUE KEY `Rolle` (`Rolle`);

--
-- Indizes für die Tabelle `rasse`
--
ALTER TABLE `rasse`
  ADD PRIMARY KEY (`RasseID`),
  ADD UNIQUE KEY `Rasse` (`Rasse`),
  ADD KEY `TierartID` (`TierartID`);

--
-- Indizes für die Tabelle `tierart`
--
ALTER TABLE `tierart`
  ADD PRIMARY KEY (`TierartID`),
  ADD UNIQUE KEY `Tierart` (`Tierart`);

--
-- Indizes für die Tabelle `tiere`
--
ALTER TABLE `tiere`
  ADD PRIMARY KEY (`TierID`),
  ADD KEY `RasseID` (`RasseID`);

--
-- Indizes für die Tabelle `vermisstgefundentiere`
--
ALTER TABLE `vermisstgefundentiere`
  ADD PRIMARY KEY (`VermisstGefundenTiereID`),
  ADD KEY `TierartID` (`TierartID`),
  ADD KEY `ZuletztGeaendertNutzerID` (`ZuletztGeaendertNutzerID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artderhilfe`
--
ALTER TABLE `artderhilfe`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ArtikelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `bildertiere`
--
ALTER TABLE `bildertiere`
  MODIFY `BilderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `helfen`
--
ALTER TABLE `helfen`
  MODIFY `HelfenID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `NutzerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `nutzerrollen`
--
ALTER TABLE `nutzerrollen`
  MODIFY `NutzerrollenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `rasse`
--
ALTER TABLE `rasse`
  MODIFY `RasseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `tierart`
--
ALTER TABLE `tierart`
  MODIFY `TierartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tiere`
--
ALTER TABLE `tiere`
  MODIFY `TierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `vermisstgefundentiere`
--
ALTER TABLE `vermisstgefundentiere`
  MODIFY `VermisstGefundenTiereID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bildertiere`
--
ALTER TABLE `bildertiere`
  ADD CONSTRAINT `bildertiere_ibfk_1` FOREIGN KEY (`TierID`) REFERENCES `tiere` (`TierID`);

--
-- Constraints der Tabelle `helfen`
--
ALTER TABLE `helfen`
  ADD CONSTRAINT `helfen_ibfk_1` FOREIGN KEY (`NutzerID`) REFERENCES `nutzer` (`NutzerID`) ON DELETE SET NULL,
  ADD CONSTRAINT `helfen_ibfk_2` FOREIGN KEY (`ArtDerHilfe`) REFERENCES `artderhilfe` (`ArtID`);

--
-- Constraints der Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD CONSTRAINT `nutzer_ibfk_1` FOREIGN KEY (`NutzerrollenID`) REFERENCES `nutzerrollen` (`NutzerrollenID`);

--
-- Constraints der Tabelle `rasse`
--
ALTER TABLE `rasse`
  ADD CONSTRAINT `rasse_ibfk_1` FOREIGN KEY (`TierartID`) REFERENCES `tierart` (`TierartID`);

--
-- Constraints der Tabelle `tiere`
--
ALTER TABLE `tiere`
  ADD CONSTRAINT `tiere_ibfk_1` FOREIGN KEY (`RasseID`) REFERENCES `rasse` (`RasseID`);

--
-- Constraints der Tabelle `vermisstgefundentiere`
--
ALTER TABLE `vermisstgefundentiere`
  ADD CONSTRAINT `vermisstgefundentiere_ibfk_1` FOREIGN KEY (`TierartID`) REFERENCES `tierart` (`TierartID`),
  ADD CONSTRAINT `vermisstgefundentiere_ibfk_2` FOREIGN KEY (`ZuletztGeaendertNutzerID`) REFERENCES `nutzer` (`NutzerID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
