USE tierheimat;

CREATE TABLE IF NOT EXISTS Nutzerrollen (
    NutzerrollenID INT AUTO_INCREMENT PRIMARY KEY,
    Rolle VARCHAR(100) NOT NULL UNIQUE,
    kannLesen BOOLEAN DEFAULT 0,
    kannSchreiben BOOLEAN DEFAULT 0,
    kannEigenesBearbeitenUndLoeschen BOOLEAN DEFAULT 0,
    kannAllesLoeschen BOOLEAN DEFAULT 0
);

CREATE TABLE IF NOT EXISTS Nutzer (
    NutzerID INT AUTO_INCREMENT PRIMARY KEY,
    NutzerrollenID INT NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Passwort VARCHAR(250) NOT NULL,
    FOREIGN KEY (NutzerrollenID) REFERENCES Nutzerrollen(NutzerrollenID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS Tierart (
    TierartID INT AUTO_INCREMENT PRIMARY KEY,
    Tierart VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Rasse (
    RasseID INT AUTO_INCREMENT PRIMARY KEY,
    TierartID INT NOT NULL,
    Rasse VARCHAR(100) NOT NULL UNIQUE,
    FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS VermisstGefundenTiere (
    VermisstGefundenTiereID INT AUTO_INCREMENT PRIMARY KEY,
    ZuletztGeaendertNutzerID INT,
    TierartID INT NOT NULL,
    Typ VARCHAR(100) NOT NULL,
    Datum DATETIME NOT NULL,
    Ort VARCHAR(250) NOT NULL,
    Beschreibung VARCHAR(500) NOT NULL,
    Kontaktaufnahme VARCHAR(50) NOT NULL,
    Bildadresse VARCHAR(255) NULL,
    Geloescht BOOLEAN NOT NULL,
    ZuletztGeaendert DATETIME NOT NULL,
    FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT,
    FOREIGN KEY (ZuletztGeaendertNutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS Tiere (
    TierID INT AUTO_INCREMENT PRIMARY KEY,
    RasseID INT NOT NULL,
    Geschlecht VARCHAR(50),
    Beschreibung VARCHAR(500) NOT NULL,
    Geburtsjahr INT,
    Name VARCHAR(100),
    Charakter VARCHAR(255),
    Datum DATE NOT NULL,
    FOREIGN KEY (RasseID) REFERENCES Rasse(RasseID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS BilderTiere (
    BilderID INT AUTO_INCREMENT PRIMARY KEY,
    TierID INT NOT NULL,
    Bildadresse VARCHAR(255) NOT NULL,
    Hauptbild BOOLEAN NOT NULL,
    Alternativtext VARCHAR(255) NOT NULL,
    FOREIGN KEY (TierID) REFERENCES Tiere(TierID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS Artikel (
    ArtikelID INT AUTO_INCREMENT PRIMARY KEY,
    Ueberschrift VARCHAR(200) NOT NULL,
    Text VARCHAR(5000) NOT NULL,
    Datum DATE NOT NULL,
    Bildadresse VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS ArtDerHilfe (
    ArtID INT AUTO_INCREMENT PRIMARY KEY,
    ArtDerHilfe VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Helfen (
    HelfenID INT AUTO_INCREMENT PRIMARY KEY,
    NutzerID INT,
    ArtDerHilfe INT NOT NULL,
    Angenommen BOOLEAN NOT NULL,
    Zeit TIME,
    Datum DATE,
    Wochentag VARCHAR(50),
    FOREIGN KEY (NutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL,
    FOREIGN KEY (ArtDerHilfe) REFERENCES ArtDerHilfe(ArtID) ON DELETE RESTRICT
);

INSERT INTO Tierart (Tierart) VALUES
    ('Hunde'),
    ('Katzen'),
    ('Kleintiere'),
    ('Exoten');

INSERT INTO Rasse (TierartID, Rasse) VALUES
    (1, 'Golden Retriever'),
    (1, 'Beagle'),
    (1, 'Deutscher Schäferhund'),
    (1, 'Bulldogge'),
    (1, 'Labrador'),
    (1, 'Cocker Spaniel'),
    (2, 'Perser'),
    (2, 'Siam'),
    (2, 'Maine Coon'),
    (2, 'Britisch Kurzhaar'),
    (2, 'Bengal'),
    (2, 'Ragdoll'),
    (3, 'Wellensittich'),
    (3, 'Papagei'),
    (3, 'Kanarienvogel'),
    (3, 'Ara'),
    (4, 'Python'),
    (4, 'Kornnatter'),
    (4, 'Gecko'),
    (4, 'Chamäleon'),
    (3, 'Maus/Ratte'),
    (3, 'Hase'),
    (3, 'Kaninchen'),
    (3, 'Hamster'),
    (3, 'Meerschweinchen'),
    (4, 'Axolotl'),
    (4, 'Schmetterling'),
    (4, 'Ameise');

INSERT INTO Nutzerrollen (Rolle, kannLesen, kannSchreiben, kannEigenesBearbeitenUndLoeschen, kannAllesLoeschen) VALUES
    ('Administrator', 1, 1, 1, 1),
    ('Nutzer', 1, 1, 1, 0),
    ('Gast', 1, 0, 0, 0);

INSERT INTO Nutzer (NutzerrollenID, Name, Email, Passwort) VALUES
    (1, 'Lisa', 'betreuer@example.com', '$2y$10$U4DPGbciuerXruoMIu86.uKKhVs33FzKySH8Azi8CZjzW2v1BBGV6'),
    (2, 'Maier', 'tierarzt@example.com', '$2y$10$Y.mzZG5LrCPHiik130UexuNIRoWuY96cdm5SlzCWO1xzkRBjhl53W');
-- TODO: müssen wir Nutzer beim registrieren bestätigen (z.B. durch Bestätigungslink per Mail??)
-- Nutzer1: securepassword2
-- Nutzer2: securepassword3


INSERT INTO Tiere (RasseID, Geschlecht, Beschreibung, Geburtsjahr, Name, Charakter, Datum) VALUES
    (2, 'Weiblich', 'Freundliche Hündin, liebt Kinder.', 2001, 'Lila', 'Verspielt', '2024-11-01'),
    (17, 'Weiblich', 'Ruhige Schlange, pflegeleicht.', 2011, 'Tiger', 'Ruhig', '2024-11-02'),
    (21, 'Weiblich', 'Kleine Ratte, sehr aktiv.', 2008, 'Greta', 'Neugierig', '2024-11-03'),
    (13, 'Weiblich', 'Gesellige Sittiche in großer Gruppe.', 2011, 'Wellis', 'Fröhlich', '2024-11-04'),
    (10, 'Männlich', 'Kuschelt gerne, ideal für Familien.', 2001, 'Simba', 'Zutraulich', '2024-11-05'),
    (4, 'Weiblich', 'Lebhafte Hündin, liebt Spaziergänge.', 2013, 'Bella', 'Energisch', '2024-11-10'),
    (3, 'Männlich', 'Treuer Begleiter, liebt Aufmerksamkeit.', 2012, 'Rex', 'Treu', '2024-11-11'),
    (2, 'Weiblich', 'Sanfter Hund, eher zurückhaltend.', 2011, 'Mila', 'Sanft', '2024-11-12'),
    (23, 'Männlich', 'Fluffy ist sehr liebevoll zu Kindern.', 2011, 'Fluffy', 'Liebevoll', '2024-10-12'),
    (23, 'Weiblich', 'Hoppel ist gut mit Fluffy befreundet.', 2011, 'Hoppel', 'Liebevoll', '2024-10-12'),
    (18, 'Weiblich', 'Diese Kornnatter liebt es zu fressen.', 2011, 'Korni', 'Fressgierig', '2024-10-12'),
    (14, 'Weiblich', 'Lora spricht gerne alles nach.', 2011, 'Lora', 'Verspielt', '2024-10-12'),
    (14, 'Weiblich', 'Rosella ist sehr bunt.', 2011, 'Rosella', 'prächtig', '2024-10-12'),
    (18, 'Weiblich', 'Unser liebevoll getauftes Mosnter ist rasend schnell unterwegs.', 2011, 'Monster', 'Fressgierig', '2024-02-12'),
    (21, 'Weiblich', 'Neugierige und spaßige Ratte.', 2008, 'Kira', 'Neugierig', '2024-11-08'),
    (2, 'Weiblich', 'Freundliche und spaßige Hündin, liebt Kinder.', 2001, 'Lilly', 'Verspielt', '2024-06-01');

INSERT INTO VermisstGefundenTiere (ZuletztGeaendertNutzerID, TierartID, Typ, Datum, Ort, Beschreibung, Kontaktaufnahme, Bildadresse, Geloescht, ZuletztGeaendert) VALUES
    (1, 1, 'vermisst', '2024-01-02 00:00:000', 'Weimar', 'Wir waren am Samstag Abend mit Pablo in Weimar am Park an der Ilm spazieren und haben ihn nur kurz aus den Augen gelassen. Wir vermissen ihn sehr. Jeder Hinweis könnte uns bei der Suche helfen.', 'telefon', 'pablo.jpg', 0, '2024-01-02 00:00:000'),
    (2, 3, 'vermisst', '2024-03-02 00:00:000', 'Vieselbach', 'Unser Degu Luke wird seit dem 2. März in Vieselbach vermisst. Hinweise nehmen wir dankend telefonisch entgegen. Bitte helfen Sie uns, ihn wiederzufinden!', 'telefon', 'luke.jpg', 0, '2024-01-02 00:00:000'),
    (2, 2, 'vermisst', '2024-01-03 00:00:000', 'Stotternheim', 'Lotta, unsere getigerte Katze mit einem weißen Fleck auf der Brust, wird seit dem 3. Januar in Stotternheim vermisst. Sie ist scheu, aber sehr lieb. Bitte melden Sie sich per E-Mail, falls Sie sie sehen.', 'email', 'lotta.jpg', 0, '2024-01-04 00:00:000'),
    (2, 3, 'vermisst', '2024-06-07 00:00:000', 'Erfurt', 'Unsere Schildkröte Raspun ist am 7. Juni in Erfurt verschwunden. Jeder Hinweis hilft uns, sie wiederzufinden. Bitte melden Sie sich per E-Mail!', 'email', 'raspun.jpg', 0, '2024-12-06 00:00:000'),
    (1, 2, 'vermisst', '2024-05-02 00:00:000', 'Arnstadt', 'Drako, unser schwarz-weißer Kater, wird seit dem 2. Mai in Arnstadt vermisst. Er trägt ein grünes Halsband mit unserer Telefonnummer. Bitte melden Sie sich per E-Mail, falls Sie ihn gesehen haben.', 'email', 'drako.jpg', 0, '2024-11-04 00:00:000'),
    (2, 2, 'gefunden', '2024-05-23 00:00:000', 'Weimar', 'Ich habe die Katze am Mittwoch Abend in Erfurt an der Altonaer Straße gefunden. Sie wirkte verschreckt, abgemagert und hatte Flöhe. Ich habe sie mit nach Hause genommen und sie wieder aufgepäppelt. Jetzt geht es ihr wieder besser.', 'telefon', 'gefundeneKatze.jpg', 0, '2024-01-05 00:00:000'),
    (2, 1, 'gefunden', '2023-09-27 00:00:000', 'Erfurt', 'Dieser Hund ist mir am 27. September in Erfurt zugelaufen. Falls Sie ihn vermissen, melden Sie sich bitte per E-Mail, damit er wieder nach Hause kann', 'email', 'max.jpg', 0, '2024-06-04 00:00:000'),
    (1, 2, 'gefunden', '2024-02-25 00:00:000', 'Vieselbach', 'Ich habe diese Katze am 25. Februar in Vieselbach gefunden. Sie scheint ein Zuhause zu suchen. Bitte melden Sie sich telefonisch, falls Sie sie kennen.', 'telefon', 'flo.jpg', 0, '2024-02-04 00:00:000'),
    (1, 1, 'gefunden', '2024-04-26 00:00:000', 'Erfurt', 'Dieser Hund ist mir am 26. April in Erfurt begegnet. Er war allein unterwegs. Falls Sie ihn suchen, melden Sie sich bitte per E-Mail!', 'email', 'nick.jpg', 0, '2024-03-04 00:00:000'),
    (2, 2, 'gefunden', '2024-06-19 00:00:000', 'Hohenfelden', 'Ich habe diesen Kater am 19. Juni in Hohenfelden gefunden. Er ist zutraulich und gut gepflegt. Bitte melden Sie sich telefonisch, falls er Ihnen gehört.', 'telefon', 'stan.jpg', 0, '2024-01-07 00:00:000');

INSERT INTO BilderTiere (TierID, Bildadresse, Hauptbild, Alternativtext) VALUES
    (6, 'bella.jpeg', TRUE, 'Bella'),
    (6, 'bella2.jpeg', FALSE, ''),
    (3, 'greta.jpg', TRUE, 'Greta, eine aktive Ratte'),
    (3, 'greta2.jpg', FALSE, ''),
    (15, 'greta2.jpg', TRUE, 'Kira, eine schmusige Ratte'),
    (15, 'greta.jpg', FALSE, ''),
    (2, 'tigerpython.jpg', TRUE, 'eine tolle Tigerpython'),
    (2, 'tigerpython2.jpg', FALSE, ''),
    (4, 'wellensittiche.jpg', TRUE, 'eine Gruppe Wellensittiche'),
    (4, 'wellensittiche2.jpg', FALSE, ''),
    (5, 'simba.jpg', TRUE, 'Katze'),
    (5, 'simba2.jpg', FALSE, ''),
    (7, 'rocky.jpg', TRUE, 'Hund Rex'),
    (7, 'rocky2.jpg', FALSE, ''),
    (8, 'lilly.jpg', TRUE, 'Hund Mila'),
    (8, 'lilly2.jpg', FALSE, ''),
    (1, 'lila.jpg', TRUE, 'Lila'),
    (1, 'lila2.jpg', FALSE, ''),
    (16, 'lila2.jpg', TRUE, 'Lilly'),
    (16, 'lila.jpg', FALSE, ''),
    (9, 'fluffy.jpg', TRUE, 'Hase Fluffy'),
    (9, 'fluffy2.jpg', FALSE, ''),
    (10, 'hoppel.jpg', TRUE, 'Hase Hoppel'),
    (10, 'hoppel2.jpg', FALSE, ''),
    (11, 'kornnatter.jpg', TRUE, 'Kornnatter Korni'),
    (11, 'kornnatter2.jpg', FALSE, ''),
    (12, 'loraJendayasittich.jpg', TRUE, 'Jendayasittich Lora'),
    (12, 'loraJendayasittich2.jpg', FALSE, ''),
    (13, 'prachtrosella.jpg', TRUE, 'Rosella'),
    (13, 'prachtrosella2.jpg', FALSE, ''),
    (14, 'kornnatter2.jpg', TRUE, 'Kornnatter Monster'),
    (14, 'kornnatter.jpg', FALSE, '');

INSERT INTO Artikel (Ueberschrift, Text, Datum, Bildadresse) VALUES
    ('Neues aus dem Tierheim', 'Sehr geehrte Unterstützer und Freunde unseres Tierheims, wir freuen uns sehr, Ihnen mitteilen zu können, dass die bauliche Erweiterung unseres Tierheims erfolgreich begonnen hat. Dank Ihrer großzügigen Spenden und Unterstützung konnten wir neue Unterkünfte und moderne Einrichtungen für unsere Tiere schaffen. Diese Erweiterung ermöglicht es uns noch mehr Tieren in Not zu helfen und ihnen ein vorübergehendes Zuhause zu bieten. Ein herzliches Dankeschön an alle Spender, freiwilligen Helfer und Partner, die dieses Projekt möglich gemacht haben. Ihr Engagement und Ihre Großzügigkeit sind ein bedeutender Beitrag zu unserem gemeinsamen Ziel, den Tieren in unserer Obhut das bestmögliche Leben zu ermöglichen.', '2024-12-23', 'ausbauTierheim.jpg'),
    ('15 Jahre Tierheimat', 'Dieses Jahr feiern wir mit Stolz das 15-jährige Bestehen unseres Tierheims und blicken auf eine bewegte, erfolgreiche Geschichte zurück. Seit unserer Gründung haben wir es uns zur Aufgabe gemacht, Tieren in Not ein sicheres Zuhause, liebevolle Betreuung und die Aussicht auf ein neues Leben in einer Familie zu bieten. In diesen Jahren konnten wir nicht nur zahlreiche Tiere retten und vermitteln, sondern auch ein Netzwerk aus engagierten Unterstützern, freiwilligen Helfern und Partnern aufbauen, die unsere Arbeit erst möglich machen. Unsere Vision war von Beginn an klar: Jedes Tier verdient eine zweite Chance. Wir danken all den Menschen, die uns über die Jahre begleitet und unsere Mission geteilt haben. Ohne eure Unterstützung wären wir heute nicht da, wo wir sind.', '2024-11-05', 'tierheimFest.jpg'),
    ('Sieger des Thüringer Tierheimwettbewerb', 'Wir freuen uns außerordentlich, bekannt zu geben, dass unser Tierheim den Thüringer Tierheimwettbewerb gewonnen hat. Diese prestigeträchtige Auszeichnung ist ein Beweis für die harte Arbeit, das Engagement und die Hingabe unseres Teams. Sie honoriert nicht nur die hervorragenden Bedingungen, die wir unseren Tieren bieten, sondern auch unsere innovativen Ansätze in der Tiervermittlung, Pflege und Öffentlichkeitsarbeit. Der Preis motiviert uns, noch mehr zu tun, und wir möchten ihn mit all jenen teilen, die uns täglich unterstützen – sei es durch Spenden, ehrenamtliche Arbeit oder den einfachen, aber wertvollen Akt des Teilens unserer Botschaft. Dieser Erfolg gehört uns allen!', '2024-09-12', 'Pokal.jpg'),
    ('Wir begrüßen unsere neuen Veterinärstudenten', 'Wir heißen einen neuen Veterinärstudenten in unserem Team herzlich willkommen. Mit seinen frischen Kenntnissen und seinem Enthusiasmus bringt er wertvolle Impulse in unsere Arbeit ein. Seine Perspektive ergänzt die Erfahrung unseres Teams auf wunderbare Weise, und wir freuen uns, gemeinsam neue Ideen umzusetzen, die unseren Tieren zugutekommen. Der Einsatz eines Veterinärstudenten zeigt auch, wie wichtig uns Bildung und die Förderung junger Talente sind. Gemeinsam wollen wir noch besser werden und den Tieren die bestmögliche Versorgung bieten. Willkommen in der Tierheimfamilie!', '2024-07-27', 'tierarztStudent.jpg'),
    ('Erneuerung der Ruhestätte', 'Mit großem Respekt und Hingabe haben wir die Ruhestätte unseres Tierheims erneuert. Dieser Ort bietet nun eine würdevolle Umgebung, um unseren tierischen Freunden, die uns verlassen haben, die letzte Ehre zu erweisen. Die neugestaltete Ruhestätte ist nicht nur ein Ort der Erinnerung, sondern auch ein Zeichen dafür, wie wichtig uns jedes einzelne Tier ist – ob es noch bei uns ist oder bereits gegangen ist. Wir laden alle herzlich ein, diesen besonderen Platz zu besuchen, um der Tiere zu gedenken, die unsere Herzen berührt haben. Ihr Andenken bleibt für immer ein Teil unserer Tierheimgeschichte.', '2024-05-18', 'friedhof.jpg'),
    ('Erfolgreiche Tiervermittlung', 'In den letzten Monaten konnten wir zahlreiche Tiere erfolgreich in liebevolle Zuhause vermitteln. Dank der intensiven Betreuung und Pflege durch unser Team haben viele Hunde, Katzen und Kleintiere die Chance auf ein neues Leben erhalten. Unsere Vermittlungsarbeit endet jedoch nicht, wenn ein Tier unser Tierheim verlässt. Wir stehen neuen Besitzern beratend zur Seite und sorgen dafür, dass die Tiere in ihrem neuen Zuhause gut ankommen. Nichts erfüllt uns mehr, als die strahlenden Gesichter von Menschen und Tieren, die ihr Glück gefunden haben. Dies treibt uns an, weiterzumachen und noch mehr Leben zu verändern.', '2024-02-24', 'glücklicheKatze.jpg'),
    ('Erfolgreiche Spendenaktion', 'Unsere jüngste Spendenaktion war ein großer Erfolg! Dank der Großzügigkeit unserer Unterstützer konnten wir eine beträchtliche Summe sammeln, die direkt in die Verbesserung der Lebensbedingungen unserer Tiere fließt. Mit den gesammelten Mitteln planen wir, dringend benötigte medizinische Geräte anzuschaffen, unsere Gehege zu erweitern und weitere Schulungen für unser Team zu finanzieren. Jeder Beitrag, ob groß oder klein, hilft uns, unseren Schützlingen ein besseres Leben zu ermöglichen. Wir sind unendlich dankbar für die Unterstützung und das Vertrauen, das uns entgegengebracht wird. Gemeinsam können wir Großes bewirken!', '2024-01-03', 'tierschutzLogo.jpg');

INSERT INTO ArtDerHilfe (ArtDerHilfe) VALUES
    ('Tiere füttern'),
    ('Spazieren gehen'),
    ('Reinigung der Gehege'),
    ('Transport von Tieren'),
    ('Kleintiersitting');