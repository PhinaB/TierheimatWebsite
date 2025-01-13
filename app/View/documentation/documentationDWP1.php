<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../public/css/main.css" />
    <link rel="stylesheet" href="../public/css/documentation.css" />

    <link rel="stylesheet" href="../public/lib/fontawesome-6.5.2/css/all.min.css" />

    <title>Tierheimat Projektdokumentation dynamische Webprogrammierung</title>
</head>
<body>
    <header>
        <a href="impressum" class="button" draggable="false"><i class="fa-solid fa-arrow-left"></i> Zurück zum Impressum</a>
    </header>
    <main>
        <div class="container deckblatt">
            <div>
                <h2>Beleg dynamische Webprogrammierung 1</h2>
                <br />
                <h1>Tierheimat</h1>
                <br /><br /><br />
                <img src="../public/imgDokumentation/logoFHE.jpg" alt="Logo FHE" title="Logo FHE" draggable="false">
                <br /><br /><br />
                <h2>Fachbereich <br />Gebäudetechnik und Informatik<br />Angewandte Informatik</h2>
                <br /><br />
                <h2>Projektmitglieder</h2>
                <span>Stephanie Wachs</span><br />
                <span>Josephina Burger </span><br />
                <span>Lucas-Manfred Herpe</span>
                <br /><br />
                <h2>Betreuer</h2>
                <span>Prof. Dr. Marcel Spehr</span>
                <br /><br />
                <h2>Bearbeitungszeitraum</h2>
                <span>21.10.2024 - 19.01.2025</span>
            </div>
        </div>

        <div class="container">
            <h1 id="inhaltsverzeichnis">Inhaltsverzeichnis</h1>
            <hr class="underHeadline" />
            <dl>
                <dt><a href="#einleitung" draggable="false">1 Einleitung</a></dt>
                <dd><a href="#ziel" draggable="false">1.1 Projektziel und Anforderungen</a></dd>
                <dd><a href="#rückblick" draggable="false">1.2 Projektrückblick</a></dd>
                <dd><a href="#erweiterung" draggable="false">1.3 Geplante Erweiterungen</a></dd>
                <dt><a href="#planung" draggable="false">2 Konzeption und Planung</a></dt>
                <dd><a href="#technologien" draggable="false">2.1 Technologie- und Architekturwahl</a></dd>
                <dd><a href="#zeitplanMeilensteine" draggable="false">2.2 Zeitplan und Meilensteine</a></dd>
                <dd><a href="#aufgabenaufteilung" draggable="false">2.3 Geplante Aufgabenteilung</a></dd>
                <dd><a href="#funktionalitaet" draggable="false">2.4 Übersicht der Funktionalitäten und Seitenstruktur</a> </dd>
                <dt><a href="#backend" draggable="false">3 Backend-Entwicklung</a></dt>
                <dd><a href="#datenbankentwurf" draggable="false">3.1 Datenbankentwurf</a></dd>
                <dd><a href="#datenbankAnbindung" draggable="false">3.2 Datenbank-Setup und Anbindung</a></dd>
                <dd><a href="#php" draggable="false">3.3 PHP-Skripte und Logik</a></dd>
                <dd><a href="#rollenkonzept" draggable="false">3.4 Rollenkonzept</a></dd>
                <dd><a href="#routing" draggable="false">3.5 Routing</a></dd>
                <dt><a href="#interaktiveFeatures" draggable="false">4 Interaktive Features</a></dt>
                <dd><a href="#benutzerinteraktion" draggable="false">4.1 Benutzerinteraktion</a></dd>
                <dd><a href="#formulare" draggable="false">4.2 Dynamische Formulare und Eingabevalidierung</a></dd>
                <dt><a href="#tests" draggable="false">5 Tests und Optimierung </a></dt>
                <dd><a href="#frontendTests" draggable="false">5.1 Frontend-Tests</a></dd>
                <dd><a href="#backendTests" draggable="false">5.2 Backend-Tests</a></dd>
                <dt><a href="#dokumentation" draggable="false">6 Dokumentation</a></dt>
                <dt><a href="#fazit" draggable="false">7 Fazit</a></dt>
                <dd><a href="#sollIst" draggable="false">7.1 Soll- / Ist-Vergleich</a></dd>
                <dd><a href="#lessonsLearned" draggable="false">7.2 Lessons Learned</a></dd>
                <dd><a href="#ausblick" draggable="false">7.3 Ausblick</a></dd>
                <dt><a href="#anlagen" draggable="false">8 Anlagenverzeichnis</a></dt>
                <dd class="emptyDD">&nbsp;</dd>
                <dt><a href="#quellen" draggable="false">9 Quellen</a></dt>
            </dl>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="einleitung">1 Einleitung</h2>
                <hr class="underHeadline" />
                <p>
                    Diese Seite dokumentiert den zweiten Teil des Projekts
                    <img src="../public/img/logo.jpg" class="inlineLogo" alt="Tierheimat Logo" title="Tierheimat Logo" draggable="false">, das über zwei Semester in den Modulen
                    "Grundlegende Webprogrammierung" und "Dynamische Webprogrammierung" entwickelt wurde. Eine detaillierte Dokumentation des ersten Teils ist <a href="dokuGWP" draggable="false">hier</a> verfügbar.
                    Informationen, wie die Wahl des Layouts und der Farben, aber auch die Zielgruppe, sind dort zu finden und werden in folgender Dokumentation nicht erneut erwähnt.
                </p><br /><p>
                    Die Dokumentation ist in Abschnitte gegliedert, die die Projektziele, die Planung und Konzeption, die Backend-Entwicklung sowie die durchgeführten Tests abdecken.
                    Abschließend werden Lessons Learned und mögliche Weiterentwicklungen beschrieben.
                </p> <br /> <p>
                    Zur besseren Lesbarkeit wird auf geschlechtsneutrale Sprachformen verzichtet; alle Personenbezeichnungen gelten für alle Geschlechter gleichermaßen.
                </p>
                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="ziel">1.1 Projektziel und Anforderung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Im Rahmen des Moduls "Dynamische Webprogrammierung" wurde die Aufgabe gestellt, eine dynamische Website zu entwickeln, die PHP und JavaScript integriert.
                    </p><p>
                        Für dieses Projekt nutzen wir die Grundlage unseres früheren Projekts aus dem Modul "Grundlegende Webprogrammierung" und erweitern es um dynamische und interaktive Elemente. Eine zugehörige Projektdokumentation aus dem ersten Modul ist <a href="dokuGWP" draggable="false">hier</a> verfügbar.
                    </p><br /><p>
                        Im ersten Abschnitt des Projekts lag der Schwerpunkt auf der Gestaltung eines benutzerfreundlichen und klar strukturierten Designs sowie der Implementierung grundlegender Funktionen mithilfe von HTML und CSS, um eine solide Basis für die Webseite zu schaffen.
                    </p><p>
                        Im zweiten Abschnitt wird nun das Backend strukturiert entwickelt und um dynamische sowie interaktive Features ergänzt. Ziel ist es, das Nutzererlebnis zu verbessern und der Website zusätzliche Funktionalitäten zu verleihen.
                    </p><br /><p>
                        Dieser Teil des Projekt startete am 21.10.2024 und soll bis zum 19.01.2025 abgeschlossen sein. 
                        Mit der Fertigstellung wird eine nutzerfreundliche, voll funktionsfähige Webseite bereitgestellt, die die grundlegenden Anforderungen von Tierheimen und ihrer Webseitenbesucher erfüllt.
                    </p>
                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="rückblick">1.2 Projektrückblick</h3>
                    <hr class="underHeadline" />
                    <p>
                        Der erste Teil des Projekts konzentrierte sich auf den Entwurf und die Umsetzung der Webseite mithilfe von HTML und CSS. Dazu gehörten eine <a href="dokuGWP#istAnalyse">Ist-Analyse</a>
                        bestehender Tierheim-Webseiten, die Definition der <a href="dokuGWP#zielgruppe">Zielgruppe</a> und die Ableitung zentraler Funktionen wie interaktiver Formulare.
                    </p>

                    <img src="../public/imgDokumentation/webseitenstruktur.jpg" title="Webseitenstruktur" alt="Webseitenstruktur" draggable="false">
                    <div class="caption">Abbildung 03: Aufbau der Webseite</div>
                    <br />

                    <p>
                        Darauf aufbauend wurden das <a href="dokuGWP#entwurfLogo">Logo</a>, ein einheitliches Design und eine responsive Struktur entwickelt. Abschließend erfolgten
                        <a href="dokuGWP#testen">Nutzertests</a> und eine Reflexion der <a href="dokuGWP#lessonsLearned">Lessons Learned</a>.
                    </p><br />

                    <img src="../public/imgDokumentation/logoFinal.PNG" title="Finales Logo" alt="Finales Logo im Design und Bsp." draggable="false">
                    <div class="caption">Abbildung 04: Auszug "Unsere Tiere" aus dem Projekt "Grundlagen Webprogrammierung"</div>

                    <br />
                    <p>
                        Eine detaillierte Dokumentation aller Zwischenschritte ist <a href="dokuGWP">hier</a> zu finden. Die Ergebnisse des ersten Projektteils bilden die Grundlage für die Erweiterungen im zweiten Teil.
                    </p>
                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="erweiterung">1.3 Geplante Erweiterungen</h3>
                    <hr class="underHeadline" />
                    <p>
                        Im zweiten Teil des Projekts liegt der Schwerpunkt auf der Entwicklung des Backends mit PHP sowie der Integration interaktiver Funktionen mit JavaScript, um die Webseite benutzerfreundlicher und funktionaler zu gestalten.
                    </p><br /><p>
                        Zunächst ist eine strukturierte Anbindung der Webseite an eine Datenbank vorgesehen. Diese ermöglicht eine effiziente Datenverwaltung, reduziert redundanten Code und bildet die Grundlage für verschiedene Formular- und Filterfunktionen. 
                        Dazu wird ein Entity-Relationship-Modell entworfen, welches die spezifischen Anforderungen der Webseite abbildet. Beispielsweise eine "Tiere" Tabelle, die zur Adoption freigegebene Tiere verwaltet.
                        Aus diesem Modell werden mithilfe von SQL die entsprechenden Tabellen in MariaDB erstellt.
                        Anschließend erfolgt die Einrichtung einer Datenbankverbindung über ein PHP-Skript, um den sicheren Austausch von Daten zwischen der Webseite und der Datenbank zu gewährleisten.
                    </p>
                    <br /><p>
                        Für die weitere Backend-Entwicklung sollen CRUD-Funktionen (Create, Read, Update, Delete) in PHP implementiert werden, abhängig von den spezifischen Anforderungen des Projekts.
                        Diese Funktionen ermöglichen es, neue Datensätze hinzuzufügen, bestehende Daten zu lesen, zu aktualisieren oder zu löschen. So wird es beispielsweise möglich sein, vermisste Tiere in die Datenbank aufzunehmen, deren Informationen zu bearbeiten oder diese von der Webseite zu entfernen.
                    </p><p>
                        Hierfür sind separate PHP-Dateien vorgesehen, die zudem Sicherheitsmaßnahmen, wie etwa gegen SQL-Injection, beinhalten. Nutzern, die vermisste oder gefundene Tiere melden, wird außerdem die Möglichkeit geboten, ihre Einträge zu bearbeiten oder zu löschen. Administratoren sollen dabei alle Einträge löschen und bearbeiten können. Dies gewährleistet eine stets aktuelle Tierdatenbank und eine effiziente Datenverwaltung.
                    </p><p>
                        Abschließend soll die Backend-Logik umfassenden Tests unterzogen werden, um eine fehlerfreie Datenverarbeitung sicherzustellen.
                    </p><br /><p>
                        Neben der Backend-Entwicklung ist auch die Einbindung interaktiver Elemente mithilfe von JavaScript geplant, um das Nutzererlebnis zu verbessern.
                        Eine der vorgesehenen Funktionen ist ein Filter, mit dem Nutzer bei den Tieren gezielt nach Tierart, Rasse oder Geschlecht suchen können. Diese dynamische Filteroption erleichtert die Navigation und ermöglicht den Nutzern, die für sie relevanten Informationen schnell zu finden.
                        Darüber hinaus soll ein "Gefällt mir"-Button für die Tiere integriert werden, sodass Interessenten ihre Favoriten speichern können. Diese Speicherung soll als Cookie umgesetzt werden.
                    </p><br /><p>
                        Zusätzlich ist die Integration weiterer dynamischer Inhalte geplant, die sich auf Nutzereingaben basierend anpassen. 
                        So sollen "Weiterlesen" Buttons eine detailliertere Ansicht zu einem Tier oder Artikel bieten, während im Hilfsformular zusätzliche Termineingaben hinzugefügt werden können, ohne die Seite neu laden zu müssen.
                        Ein weiteres Formular soll es dem Nutzer ermöglichen vermisste oder gefundene Tiere hochzuladen. Diese sollen nach dem neu laden der Seite dort angezeigt werden können. Nutzer, die ein solches Tier hochgeladen haben, sollen dieses später auch löschen oder bearbeiten können.
                    </p><p>
                        Auch die Funktion "weitere Tiere anzeigen" soll es den Nutzern ermöglichen, zusätzliche Tiere anzuzeigen, ohne die gesamte Webseite zu aktualisieren.
                    </p><p>
                        Darüber hinaus soll JavaScript genutzt werden, um Benutzereingaben bereits im Browser zu prüfen, bevor sie an den Server gesendet werden.
                        Dies erlaubt die direkte Erkennung und Korrektur unvollständiger oder fehlerhafter Eingaben im Formular.
                    </p><br /><p>
                        Des Weiteren sollen, sich wiederholende Elemente, wie beispielsweise das Menü oder der Footer, in einer Datei zusammen gefasst und überall eingebunden werden.
                    </p><p>
                        Die Formulare sollen außerdem nur von angemeldeten Nutzern verwendet werden. Daher wird auch ein Login und eine Registration integriert.
                    </p><br /><p>
                        Diese geplanten Erweiterungen sollen die Webseite strukturiert und interaktiv ausbauen, um den Anforderungen einer modernen Tierheim-Plattform gerecht zu werden und den Nutzern eine angenehme und effiziente Bedienung zu bieten.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="planung">2 Konzeption und Planung</h2>
                <hr class="underHeadline" />
                <p>
                    Dieses Kapitel bietet einen umfassenden Einblick in die Planung des Projekts. Zunächst wird die Auswahl der verwendeten Technologien sowie der zugrunde liegenden Architektur erläutert, die als Fundament für die Entwicklung dient. Anschließend folgt eine Übersicht über den Zeitplan und die festgelegten Meilensteine, die den Fortschritt des Projekts strukturieren. 
                    Abschließend wird die geplante Aufgabenteilung vorgestellt, welche einer effizienten Zusammenarbeit und der erfolgreichen Umsetzung der Projektziele dient.
                </p>
                 

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
              
                <div class="section"> 
                    <h3 id="technologien">2.1 Technologie- und Architekturwahl</h3>
                    <hr class="underHeadline" />
                    <p>
                        Für die Entwicklung der Webseite wurden XAMPP mit PHP und MariaDB sowie JavaScript verwendet. PHP dient als Backendsprache für die Verarbeitung von Formularen und Datenbankinteraktionen, während MariaDB eine zuverlässige Speicherung von Nutzer- und Tierdaten ermöglicht.
                    </p><p>
                        JavaScript sorgt für eine interaktive Benutzeroberfläche mit Funktionen wie Filtern und asynchronen Datenanfragen.
                    </p><p>
                        MariaDB wird als relationales Datenbankmanagementsystem eingesetzt, um alle relevanten Daten, wie Nutzer und Tierdaten, strukturiert zu speichern.
                        MariaDB bietet dabei hohe Leistungsfähigkeit und Zuverlässigkeit, was für die konsistente Datenverwaltung der Anwendung entscheidend ist.
                    </p><p>
                        Für die Programmierung und Verwaltung des Codes wurde die Entwicklungsumgebung PHP Storm gewählt.
                    </p><p>
                        Die gewählte Kombination aus Technologien und Architektur ermöglicht eine moderne, benutzerfreundliche und effiziente Webseite.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>


                <div class="section">
                    <h3 id="zeitplanMeilensteine">2.2 Zeitplan und Meilensteine</h3>
                    <hr class="underHeadline" />
                    <p>
                        In der nachfolgenden Tabelle ist ein grober Zeitplan für diesen Teil des Projektes hinterlegt.
                        Die detaillierte Zeitplanung ist in <a href="#detaillierteZeitplanung" draggable="false">Anlage 1</a> zu finden.
                    </p>

                    <table>
                        <thead>
                            <tr class="headlineTable">
                                <th>Projektbereich</th>
                                <th>geplante Zeit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vorbereitungsphase</td>
                                <td class="time">18h</td>
                            </tr><tr>
                                <td>Implementierungsphase</td>
                                <td class="time">120h</td>
                            </tr><tr>
                                <td>Dokumentationsphase</td>
                                <td class="time">51h</td>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Gesamt</td>
                                <td class="time">189h</td>
                        </tfoot>
                    </table>
                    <div class="caption">Tabelle 1</div>

                    <p>
                        Der Zeitplan für das Projekt ist in die Bereiche der Backend-Entwicklung mit PHP, der Frontend-Entwicklung mit JavaScript und der Ausarbeitung der Dokumentation unterteilt.
                    </p><br /><p>
                        Die Backend-Entwicklung beginnt mit dem Kick-Off am 21.10.2024. Ab Anfang Dezember 2024 soll die Frontend-Entwicklung mit JavaScript beginnen. Beides soll
                        bis zum 07.01.2025 abgeschlossen und implementiert werden.
                        Die Entwicklung wird durch abschließende Nutzertests beendet. Final soll das Projekt am 19.01.2025 abgegeben werden.
                    </p><p>
                        Durch wöchentliche Konsultationen werden die Fortschritte der jeweiligen Bearbeiter präsentiert, reflektiert und analysiert.
                    </p><br /><p>
                        Die Dokumentation läuft dabei parallel zum Projekt. Eine abschließende Präsentation rundet das ganze Projekt ab.
                    </p>
                    <br/>

                    <img src="../public/imgDokumentationDWP/Meilensteine.png" title="Meilensteine und Zeitachse" alt="Meilensteine und Zeitachse" draggable="false">
                    <div class="caption">Abbildung 05: Zeitachse mit Meilensteinen</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="aufgabenaufteilung">2.3 Geplante Aufgabenteilung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Aufgabenaufteilung ist nach gemeinschaftlicher, interner Abstimmung getroffen wurden.
                    </p><br /><p>
                        Regelmäßige Team Meetings und Status-Updates stellen sicher, dass alle Teammitglieder stets auf dem neuesten Stand sind und effizient zusammenarbeiten.
                    </p><p>
                        Webgestütze Tools wie "Jira" und "WhatsApp" haben dazu beigetragen eine klare Übersicht und eine direkte Kommunikation zu gewährleisten.
                        Nachfolgend, ein Ausschnitt unserer Aufgaben in Jira:
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentationDWP/jiraAuszug.jpg" title="Jira Auszug Projekt: Tierheimat" alt="Jira Auszug Projekt: Tierheimat" draggable="false">
                    </div><div class="caption">Abbildung 06: Ausschnitt aus Aufgabenmanagement Tool "Jira"</div>
                    <br />
                    <p>
                        Die genaue Aufgabenteilung lässt sich der folgenden Tabelle entnehmen. In der letzten Zeile der Tabelle sind die Aufgaben verzeichnet,
                        die von allen Projektmitgliedern zusammen vorgenommen wurden.
                    </p><br />
                    <table class="divisionTasks">
                        <thead>
                            <tr class="headlineTable">
                                <th>Lucas-Manfred Herpe</th>
                                <th>Stephanie Wachs</th>
                                <th>Josephina Burger</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul class="tasks">
                                        <li>SQL-Befehle zur Erstellung der Tabellen </li>
                                        <li>Erst-Entwicklung der databaseInit </li>
                                        <li>Weiterentwicklung der Dokumentation </li>
                                        <li>Erst-Entwurf einer Implementierung der dynamischen Features auf der "Aktuelles"-Seite</li>
                                        <li>Erarbeitung der Projektpräsentationen </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="tasks">
                                        <li>Vereinheitlichung des Menüs, des Breadcrumb Menüs und des Footers für alle Seiten </li>
                                        <li>StaticPageController und Vereinheitlichung aller redundanten Elemente </li>
                                        <li>Entwicklung des Routings + Implementierung der Fehlerseite 404 </li>
                                        <li>Umsetzung der MVC-Ordnerstruktur (mit Josephina) </li>
                                        <li>Umwandlung der Startseite (3 zufällige Tiere aus der Datenbank laden) </li>
                                        <li>Formular "Helfen" (Validierung der Eingabefelder, Hochladen in Datenbank, "Art der Hilfe" aus Datenbank laden und ins Formular schreiben) </li>
                                        <li>dynamisches Laden der Seite "unsere Tiere" (Laden der Tiere aus Datenbank, Filterung der Tiere durch das Menü, Filterung der Tiere durch 3 Dropdown-Menüs,
                                    "Gefällt mir"-Funktion der Tiere, Nachladen der Tiere, Weiterlesen eines einzelnen Tieres) </li>
                                        <li>Fertigstellung der databaseInit Datei (auch: Erstellung von SQL Befehlen - CREATE und INSERT)</li>
                                        <li>Prüfung und Fertigstellung der Dokumentation</li>
                                        <li>Fertigstellung der "Aktuelles"-Seite (Laden der Artikel und Weiterlesen eines einzelnen Artikels)</li>
                                        <li>Bearbeiten der Tiere auf der vermisst / gefunden Seite mit Prüfung des Nutzers und der Nutzerrechte</li>
                                        <li>Update der README</li>
                                        <li>Unterstützung bei Komplikationen</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="tasks">
                                        <li>Beginn der Dokumentation </li>
                                        <li>Umsetzung der MVC-Ordnerstruktur (mit Stephanie) </li>
                                        <li>Formular "Vermisst / Gefunden" (Validierung der Eingaben im Formular, absenden des Formulars und Hochladen
                                            in Datenbank)</li>
                                        <li>dynamisches Laden der Seite "Vermisst / Gefunden" (Weiterlesen der Tier-Informationen, Anzeige der Bearbeiten und Löschen Buttons mit Prüfung des Nutzers und der Nutzerrechte,
                                            Filterung der Tiere durch das Menü und das Dropdown-Menü)</li>
                                        <li>Löschen der Tiere auf der vermisst / gefunden Seite mit Prüfung des Nutzers und der Nutzerrechte</li>
                                        <li>Login und Registration von Nutzern mit Sessions (+ Hashing der Passwörter, + Anzeige des Nutzernamens und
                                            Veränderung des Menüs nach dem Login) </li>
                                        <li>Prüfung und Ergänzung der Dokumentation</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <ul class="tasks">
                                        <li>Entwurf des Entity-Relationship- und des Relationenmodells </li>
                                        <li>Einhaltung des Clean Codes</li>
                                        <li>Fertigstellung der Projektpräsentationen </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="caption">Tabelle 02</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="funktionalitaet">2.4 Übersicht der Funktionalitäten und Seitenstruktur</h3>
                    <hr class="underHeadline" />
                    <p>
                        Im folgenden Abschnitt wird eine detaillierte Übersicht über die vorgenommenen Veränderungen gegeben.
                        Das folgende Flussdiagramm dient als Orientierungshilfe und bietet eine klare Übersicht über die Navigation der Webseite.
                        Es zeigt die Übergänge zwischen den verschiedenen Seiten und verdeutlicht, welche Möglichkeiten und Funktionalitäten den Benutzern sowohl ohne Login als auch nach dem Login zur Verfügung stehen
                    </p><p>
                        Benutzer können sich registrieren, falls sie noch kein Konto besitzen, oder sich direkt anmelden.
                        Nach erfolgreicher Anmeldung gelangen sie in den eingeloggten Bereich der Webseite.
                        In diesem Bereich stehen ihnen zusätzliche Funktionen wie das Ausfüllen von Formularen oder weitere spezifische Aktionen zur Verfügung.
                    </p><p>
                        Im Anschluss wird ein detaillierter Überblick über die einzelnen Abschnitte gegeben, die im Rahmen dieses Projektteils, der dynamischen Webprogrammierung, verändert wurden.
                        Programmcode, der im Zuge des Moduls Grundlagen Webprogrammierung erstellt wurde, wird in dieser Dokumentation nicht weiter berücksichtigt. Der Fokus liegt stattdessen auf den neuen Entwicklungen und Anpassungen, die speziell in diesem Abschnitt realisiert wurden.
                    </p>
                    <br/>
                    <img src="../public/imgDokumentationDWP/flussdiagramm.png" title="Flussdiagramm" alt="Flussdiagramm" draggable="false">
                    <div class="caption">Abbildung 07: Flussdiagramm</div>


                    <br/><p>
                        <b>Allgemein</b>
                    </p>
                    <p>
                        Sowohl Menü, das Breadcrumb Menü ("Startseite > Unterseite"), als auch der Footer wurden vereinheitlicht, sodass diese nicht mehr auf jeder Seite
                        einzeln zu finden sind. In diesem Zuge wurden auch alle anderen redundanten Elemente zusammengefasst.
                    </p><p>
                        Weiterhin wurde das Routing und die Fehlerseite 404 erstellt, um URL Routen korrekt umzuleiten.
                    </p><p>
                        Für die Umsetzung des MVC Modells wurden verschiedene Ordner und Unterordner angelegt und die entsprechenden Dateien zugewiesen.
                    </p><p>
                        Für die Erst-Initialisierung der Datenbank wurde eine databaseInit.php-Datei angelegt. Diese speichert automatisch alle Inhalte in der lokalen tierheimat Datenbank ab.
                        Informationen über die Initialisierung sind der README zu entnehmen.
                    </p>

                    <br/><p>
                        <b>Startseite</b>
                    </p>
                    <p>
                        Auf der Startseite werden verschiedene Informationen angepriesen. Unter anderem drei verschiedene Tiere, die auch im Abschnitt
                        "Unsere Tiere" zu finden sind. Um für etwas Abwechslung zu sorgen, werden beim neu laden immer drei unterschiedliche Tiere angezeigt.
                        Die Tiere werden dynamisch mit Ajax nachgeladen, weswegen anfangs ein kurzes Ladesymbol zu sehen ist.
                    </p>

                    <br/>
                    <img src="../public/imgDokumentationDWP/Startseite.png" title="Startseite" alt="Startseite" draggable="false">
                    <div class="caption">Abbildung 08: Auszug "Startseite"</div>

                    <br/><p>
                        <b>Unsere Tiere</b>
                    </p>
                    <p>
                        Die Seite "Unsere Tiere" zeigt alle Tiere, die die Tierheimat zur Adoption freigibt. Diese lassen sich durch das Menü oder durch die drei Filteroptionen
                        (Tierart, Rasse, Geschlecht) filtern. Eine Rasse kann dabei nur ausgewählt werden, wenn eine Tierart ausgewählt wurde. Denn erst dann werden die entsprechenden Rassen in das Dropdown-Menü geschrieben. Die Rassen werden beim Laden der Seite mit übergeben und versteckt auf der Seite gespeichert.
                    </p><p>
                        Beim Laden der Seite werden die Tiere dynamisch durch JavaScript von der Datenbank nachgeladen. PHP erhält die AJAX Anfrage und formatiert die Daten. Anschließend werden sie im JSON Format zurück gegeben. Dadurch sieht der Nutzer im ersten Moment ein Ladesymbol, bevor
                        die Tiere dann angezeigt werden.
                    </p><p>
                        Es werden beim Aufruf der Seite immer maximal 8 Tiere angezeigt. Sollten in der Datenbank mehr Tiere mit diesen Filteroptionen vorhanden sein, kann der
                        Nutzer weitere Tiere durch den Button "Weitere Tiere anzeigen" nachladen.
                    </p><p>
                        Sollten die Tiere nicht geladen werden können, wird dem Nutzer auch die Ausgabe angezeigt, dass die Tiere nicht geladen werden. Da ein Nutzer nichts mit php Fehlern anfangen kann, zeigen wir ihm lediglich an, dass die Tiere nicht geladen werden können.
                        In PHP selbst werden alle möglichen Fehler durch Exceptions gefangen.
                    </p><p>
                        Möchte ein Nutzer weitere Informationen erhalten, kann er bei jedem Tier auf "Weiterlesen" klicken und erhält daraufhin weitere Informationen zu diesem spezifischen Tier. Diese "Weiterlesen" Option ist auch auf
                        den Seiten "Aktuelles" und "Vermisste / Gefundene Tiere" zu finden. Da alle drei Fälle auf einem ähnlichen Prinzip basieren, haben wir eine einheitliche Funktion für
                        das schließen und öffnen der Felder erstellt. Diese ist in der readMore.js zu finden. Dadurch wird v.a. redundanter Code vermieden.
                    </p><p>
                        Jedem Nutzer ist es erlaubt Tiere, durch das rechts oben angeordnete Herz, zu favorisieren und wieder zu ent-favorisieren. Diese "Gefällt mir"-Angabe wird in Cookies gespeichert.
                    </p>
                    <img src="../public/imgDokumentationDWP/UnsereTiereOverview.png" title="Unsere Tiere" alt="Unsere Tiere" draggable="false">
                    <div class="caption">Abbildung 09: Auszug "Unsere Tiere"</div>

                    <br/><p>
                        <b>Aktuelles</b>
                    </p>
                    <p>
                        Einzelne Artikel können durch einen Klick auf "Weiterlesen" komplett und detailliert gelesen werden.
                    </p>

                    <br/><p>
                        <b>Vermisst/Gefunden</b>
                    </p>
                    <p>
                        Über das Menü oder die Filteroptionen können die Nutzer entweder vermisste, gefundene oder alle Tiere anzeigen lassen. Diese Tiere werden dynamisch aus der Datenbank geladen, um eine aktuelle und benutzerfreundliche Darstellung zu gewährleisten.
                    </p><p>
                        Jedes Tier verfügt über einen "Weiterlesen"-Button, der beim Klick weitere Informationen zu einem spezifischen Tier anzeigt.
                    </p><br /><p>
                        Hat ein Nutzer sich angemeldet, kann er erweiterte Funktionen verwenden. Unter anderem kann er dann das Formular für ein vermisstes oder gefundenes Tier ausfüllen.
                        In diesem Formular werden die Eingaben des Nutzers, durch JavaScript überprüft. Es wird überprüft, ob alle Pflichtfelder ausgefüllt wurden, das Datum in der Vergangenheit liegt,
                        die Ortsangabe und Beschreibung mindestens drei und maximal 20 oder mindestens sechs und maximal 500 Zeichen haben und ob, wenn ein Bild hochgeladen wurde, es den gängigen Dateitypen entspricht (.jpg, .jpeg, .png).
                        Im Backend werden die eingegebenen Daten mit PHP validiert, bevor das Speichern der Daten in der Datenbank erfolgt.
                    </p><p>
                        Sobald die Daten in der Datenbank hochgeladen wurden, wird das neue Tier nach dem Laden der Seite dort angezeigt.
                    </p><p>
                        Ein angemeldeter Nutzer kann außerdem seine eigenen Beiträge löschen und bearbeiten.
                        Ist der angemeldete Nutzer ein Administrator, kann er jeden Beitrag löschen und bearbeiten.
                        Hierbei wird zum einen geprüft, ob Nutzer und Ersteller des Tieres übereinstimmen und zum anderen, ob die Rollenrechte das Löschen erlauben.
                        Dies wird mithilfe einer Session umgesetzt, in welcher die aktuelle NutzerId und dessen Rollenrechte gespeichert werden.
                    </p>

                    <br/><p>
                        <b>Service/Infos</b>
                    </p>
                    <p>
                        Sobald der Nutzer sich angemeldet hat, kann hier ein weiteres Formular ausgefüllt werden. Dabei wird noch vor dem Absenden des Formulars überprüft, ob alle
                        Felder korrekt gefüllt sind. Bei der erfolgreichen Eingabe in die Datenbank, wird dem Nutzer eine Erfolgsinformation übermittelt, dass das Hochladen geklappt hat.
                    </p><p>
                        Da die "Art der Hilfe" in der Datenbank abgespeichert ist, wird diese beim Laden der Seite dynamisch aus der Datenbank geholt und in das Formular eingesetzt.
                    </p><p>
                        Es können maximal 7 Wochentage angegeben werden. Sollte beim Klick auf "Absenden" eine Zeile (Wochentag und Zeit ODER Datum und Zeit) leer sein, wird diese automatisch durch JavaScript gelöscht.
                        Dadurch verhindern wir die Übergabe von leeren Zeilen an die Datenbank.
                    </p>
                    <img src="../public/imgDokumentationDWP/ServiceInfos.png" title="Service Infos" alt="Service Infos" draggable="false">
                    <div class="caption">Abbildung 10: Auszug "Service Infos"</div>

                    <br/><p>
                        <b>Login und Registration</b>
                    </p>
                    <p>
                        Ein Nutzer kann sich hier registrieren oder, falls schon ein Account vorhanden ist, auch einloggen. Dabei wird mit Javascript bei der Eingabe schon überprüft, ob die Eingaben korrekt und alle Pflichtfelder ausgefüllt sind.
                        Es wird zum Beispiel überprüft, ob das Passwort mehr als sechs Zeichen hat, der Nutzername mehr als drei Zeichen hat und die E-Mail dem gängigen E-Mail-Format entspricht.
                        Sind die Eingaben nicht korrekt, wird der Nutzer darauf hingewiesen. Im Backend werden die Eingaben im Anschluss auch validiert. Bei Eingaben die nicht den gesetzten Kriterien entsprechen wird dies als json-Format an das Forntend geschickt.
                    </p><p>
                        Das Passwort wird außerdem vor dem Speichern in der Datenbank gehasht.
                    </p><p>
                        Es wird mit einer Session gearbeitet, um zustandsbehaftete Daten, wie den Login-Status, die Nutzer-ID, den Nutzernamen und die Rollenrechte, zu speichern.
                        Dadurch bleiben diese Daten über mehrere Seiten hinweg verfügbar und können zum Beispiel bei den Formularen verwendet werden, um Daten in der Datenbank mit der passenden Nutzer-ID zu speichern.
                    </p><p>
                        Nach erfolgreichem Login wird der Nutzer automatisch auf die Startseite umgeleitet. Im Menü ist die Änderung zu sehen, denn dort ist der Nutzername zu finden (dies wird auch mithilfe der Session umgesetzt).
                        Außerdem gibt es dort jetzt den Untermenüpunkt "Logout" statt "Login".
                    </p>
                    <img src="../public/imgDokumentationDWP/LoginFormular.png" title="Login" alt="Login" draggable="false">
                    <div class="caption">Abbildung 11: Auszug "Login"</div>

                    <br/><br/>
                    <p>
                        Wir haben uns dazu entschieden, auf der Startseite sowie den Seiten "Unsere Tiere", "Aktuelles", "Helfen" und "Vermisst / Gefundene Tiere" Ajax einzusetzen, um eine asynchrone Kommunikation mit dem Server zu ermöglichen.
                        Durch den Einsatz von Ajax wird nur ein bestimmter Teil der Webseite aktualisiert, anstatt die gesamte Seite neu zu laden. Dies führt zu einer verbesserten Nutzererfahrung und einer gesteigerten Effizienz, da lediglich die benötigten Informationen vom Server abgerufen werden.
                        Insbesondere bei einer großen Anzahl an Datenbankeinträgen, wie unter anderem bei den vermissten oder gefundenen Tiere – was wir in Zukunft erwarten – zeigt sich der Vorteil dieser Lösung. So wird etwa beim Absenden des Formulars "Vermisst / Gefunden" nicht die gesamte Seite mit den Tieren neu geladen, sondern nur der relevante Abschnitt, also das Formular selbst.
                        Außerdem werden auf der Unterseite "Alle Tiere" im Bereich "Vermisst / Gefundene Tiere" lediglich die Tierdaten aktualisiert, während das Formular weiterhin sichtbar und uneingeschränkt nutzbar bleibt. Dadurch kann der Nutzer parallel mit dem Formular oder anderen Funktionen der Seite interagieren.
                        Auch auf der Seite "Unsere Tiere" ermöglicht Ajax eine nahtlose Nutzung. Beim Klicken auf den "Weiterlesen"-Button werden lediglich die weiteren Tiere nachgeladen, ohne die gesamte Seite neu zu laden. Während des Ladevorgangs können die zuvor angezeigten Inhalte weiterhin betrachtet werden, was die Nutzerfreundlichkeit erheblich steigert.
                    </p><p>
                        Für die Seite "Unsere Tiere" haben wir bewusst XMLHttpRequest für das Nachladen von Daten über AJAX verwendet, während wir auf den anderen Seiten auf die moderne fetch-Methode gesetzt haben. Diese Entscheidung basiert auf der bestehenden Struktur und den spezifischen Anforderungen der jeweiligen Seiten.
                    </p><p>
                        Durch den Einsatz beider Methoden haben wir nicht nur flexibel auf unterschiedliche Anforderungen reagiert, sondern auch unser Wissen über unterschiedliche Techniken zur Handhabung von AJAX-Anfragen unter Beweis gestellt.
                    </p>
                    <br/>
                    <p>
                        Die Druck-CSS-Datei aus dem letzten Semester wurde übernommen, da sie nach wie vor das Drucken der Vermisst / Gefunden Tiere in Chrome oder im Internet Explorer ermöglicht. Es wurden keine Änderungen vorgenommen, da sie die gewünschten Ergebnisse auch weiterhin zuverlässig liefert. Wir haben damit sichergestellt, dass dieser Aspekt des Projekts berücksichtigt wurde.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="backend">3 Backend-Entwicklung</h2>
                <hr class="underHeadline" />
                <p>
                    In diesem Abschnitt wird die Implementierung des Backends umfassend erläutert. Zunächst wird der Entwurf der Datenbank und die dabei aufgetretenen Herausforderungen beschrieben. 
                    Anschließend folgt eine Erläuterung des grundlegenden Datenbank Setups und der Anbindung an die Webseite, die eine reibungslose Speicherung und den schnellen Abruf wichtiger Daten ermöglicht.
                    Abschließend wird auf die PHP Skripte und die Logik eingegangen, die zur Steuerung der zentralen Funktionen der Webseite notwendig sind.
                </p>
                
                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>

            
            <div class="section">
                <h3 id="datenbankentwurf">3.1 Datenbankentwurf </h3>
                <hr class="underHeadline" />
                <p>
                    Zu Beginn des Datenbankentwurfs hat sich jedes Teammitglied Gedanken darüber gemacht, welche Daten für die Webseite erforderlich sind, um die verschiedenen Funktionen optimal zu unterstützen. 
                    Auf dieser Grundlage wurden erste Entwürfe in Form von Entity-Relationship-Modellen oder Tabellen erstellt, die die benötigten Entitäten und deren Beziehungen zueinander skizzierten. 
                </p><br /><p>
                    Im nächsten Schritt wurden diese individuellen Entwürfe im Team zusammengetragen und besprochen, um eine ganzheitliche Sicht auf die Anforderungen zu erhalten. 
                    Gemeinsam wurde daraus ein umfassendes ER-Modell entwickelt, das die Kernfunktionen der Webseite, wie beispielsweise die Verwaltung von Tierinformationen, 
                    Nutzerprofilen und interaktiven Formularen, wie die Formulare zum melden vermisster oder gefundener Tiere oder das Formular zum anbieten von Hilfe, unterstützt.
                </p><br /><p>
                    Eine zentrale Herausforderung im Entwurfsprozess bestand darin, Redundanzen zu vermeiden und gleichzeitig alle Anforderungen bestmöglich zu erfüllen. Besonders bei der Tabelle "Helfen" standen wir vor einer Abwägung: Es war unklar,
                    ob separate Tabellen für "Wochentage" und "Datum" erforderlich wären, um zwischen regelmäßigem und einmaligem Hilfsangebot zu unterscheiden.
                    Der Wochentag im Hilfsformular steht für ein wiederkehrendes Angebot (z. B. "jeden Montag"), während das Datum ein einmaliges Angebot darstellt.
                </p><br /><p>
                    Nach reiflicher Überlegung entschieden wir uns, beide Angaben in einer einzigen Tabelle abzubilden, sodass jeder Wochentag oder jedes Datum ein eigenständiges Tupel darstellt. 
                    Die Herausforderung in der Umsetzung besteht nun darin sicherzustellen, dass entweder ein Datum oder ein Wochentag im Tupel angegeben ist, jedoch niemals beides.
                </p><br /><p>  
                    Das finale ER-Modell dient als Grundlage für die Implementierung der Datenbank und bildet alle notwendigen Datenbeziehungen ab, sodass eine konsistente und effiziente Datenstruktur für die Webseite gewährleistet ist.
                </p><p>
                    Im darauffolgenden Schritt wurden die entsprechenden SQL Befehle erstellt.
                </p><br /><p>
                    Die folgenden Abbildungen zeigen den finalen Entwurf des Entity-Relationship-Modells sowie das dazugehörige Relationenmodell.
                </p><br />

                <img src="../public/imgDokumentationDWP/ERM.jpg" title="ER-Modell" alt="ER-Modell" draggable="false"> <!-- Hover Effekt kann ich hier nicht implementieren da es auf den container beschränkt wäre und das ild füllt diesen bereits aus -->
                <div class="caption">Abbildung 12: Entity-Relationship-Modell</div>
                <br/>

                <p>
                    <b>Nutzerrollen</b>
                    (<u>NutzerrollenID</u>, Rolle, kannLesen, kannSchreiben, kannEigenesBearbeitenUndLoeschen, kannAllesLoeschen)
                </p>

                <p>
                    <b>Nutzer</b>
                    (<u>NutzerID</u>, NutzerrollenID → Nutzerrollen(NutzerrollenID), Name, Email, Passwort)
                </p>

                <p>
                    <b>Tierart</b>
                    (<u>TierartID</u>, Tierart)
                </p>

                <p>
                    <b>Rasse</b>
                    (<u>RasseID</u>, TierartID → Tierart(TierartID), Rasse)
                </p>

                <p>
                    <b>VermisstGefundenTiere</b>
                    (<u>VermisstGefundenTierID</u>, ZuletztGeaendertNutzerID → Nutzer(NutzerID), TierartID → Tierart(TierartID), Typ, Datum, Ort, Beschreibung, Kontaktaufnahme, Bildadresse, Geloescht, ZuletztGeaendert)
                </p>

                <p>
                    <b>Tiere</b>
                    (<u>TierID</u>, RasseID → Rasse(RasseID), Geschlecht, Beschreibung, Geburtsjahr, Name, Charakter, Datum)
                </p>

                <p>
                    <b>BilderTiere</b>
                    (<u>BilderID</u>, TierID → Tier(TierID), Bildadresse, Hauptbild, Alternativtext)
                </p>

                <p>
                    <b>Artikel</b>
                    (<u>ArtikelID</u>, Ueberschrift, Text, Datum, Bildadresse)
                </p>

                <p>
                    <b>ArtDerHilfe</b>
                    (<u>ArtID</u>, ArtDerHilfe)
                </p>

                <p>
                    <b>Helfen</b>
                    (<u>HelfenID</u>, NutzerID → Nutzer(NutzerID), ArtDerHilfe → ArtDerHilfe(ArtID), Angenommen, Zeit, Datum, Wochentag)
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>

            <div class="section">
                <h3 id="datenbankAnbindung">3.2 Datenbank-Setup und Anbindung</h3>
                <hr class="underHeadline" />
                <p>
                    Für die Verwaltung der Datenbank wird eine relationale MariaDB Datenbank verwendet. Die Struktur der Datenbank wurde in einem
                    ER-Diagramm modelliert, welches die Beziehungen zwischen Tabellen wie Tiere, Nutzer, Artikel und deren Eigenschaften beschreibt.
                </p>
                <p>
                    Die Datenbank wird mithilfe des bereitgestellten SQL (CREATE und INSERT) erstellt. Eine Anleitung zur Initialisierung ist dem README zu entnehmen.
                    Die Datei tierheimat.sql enthält dabei die vollständige Struktur der Tabellen sowie Beispieldaten.
                </p>
                <p>
                    Die Anbindung erfolgt über die Klasse "Connection" im Verzeichnis "core". Dabei haben wir uns entschieden mysqli und nicht pdo zu verwenden.
                    Die Verbindungseinstellungen sind standardmäßig auf den lokalen MariaDB Server (localhost) mit dem Benutzer "root" und einem leeren Passwort konfiguriert.
                    Der Name der Datenbank lautet "tierheimat".
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>

            <div class="section">
                <h3 id="php">3.3 PHP-Skripte und Logik</h3>
                <hr class="underHeadline" />
                <p>
                    Die Backend-Logik der Anwendung wurde in PHP implementiert. Dabei wurden verschiedene Skripte erstellt, um die Verarbeitung von Benutzereingaben, Datenbankabfragen und die Anzeige von Informationen zu steuern.
                </p>
                <p>
                    Die Struktur der PHP Skripte folgt dem MVC-Ansatz (Model-View-Controller). Dieser Ansatz sorgt für eine klare Trennung zwischen Datenverarbeitung, Anwendungslogik und Benutzeroberfläche.
                </p>
                <p>
                    Die Modelle befinden sich im Verzeichnis "app/Model" und beinhalten Klassen zur Verwaltung von Datenbankoperationen.
                </p>
                <p>
                    Die Controller im Verzeichnis "app/Controller" enthalten die Logik zur Verarbeitung von Benutzeranforderungen und zur Steuerung der Anwendungsabläufe.
                </p>
                <p>
                    Die Views im Verzeichnis "app/View" sind für die Darstellung der Benutzeroberfläche verantwortlich und greifen auf Daten aus den Modellen zu.
                    Dort gibt es einen Unterordner "page", welcher alle statischen Seiten enthält. Der Unterordner "includes" enthält alle Informationen, die auf mehreren Seiten zu finden sind.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>


            <div class="section">
                <h3 id="rollenkonzept">3.4 Rollenkonzept</h3>
                <hr class="underHeadline" />
                <p>
                    Das Rollenmodell dieses Projekts dient dazu, unterschiedliche Berechtigungsstufen für Nutzer festzulegen. Dadurch wird sichergestellt, dass bestimmte Aktionen nur von
                    autorisierten Personen durchgeführt werden können. Dies ist besonders wichtig, um sensible Daten zu schützen und die Integrität der Ihnalte zu gewährleisten.
                </p><br/><p>
                    Die Nutzerverwaltung basiert auf drei Hauptrollen:
                </p>
                <ul class="tasks" style="padding-left: 20px;">
                    <li>Gast - kann Inhalte nur Lesen aber keine Änderungen vornehmen</li>
                    <li>Nutzer - hat die Rechte eines Gastes und kann Inhalte erstellen sowie eigene Einträge (vermisste / gefundene Tiere) Bearbeiten und Löschen</li>
                    <li>Administrator - hat die Rechte eines Nutzers und kann zusätzlich alle Einträge (vermisste / gefundene Tiere) Bearbeiten und Löschen</li>
                </ul>
                <br/>
                <p>
                    Die Anmeldung erfolgt über das Login Formular:
                </p><br/>
                <img src="../public/imgDokumentationDWP/LoginFormular.png" title="" alt="Login Oberfläche" draggable="false">
                <div class="caption">Abbildung 13: Auszug "Login Oberfläche"</div>

                <br /><br/>

                <p>
                    Die Rollen und deren Berechtigung werden innerhalb der Datenkbanktabelle "Nutzerrollen" definiert. Dabei werden die Rechte als Boolean in der Tabelle mit verwaltet (kannLesen, kannSchreiben, kannEigenesBearbeitenUndLoeschen, kannAllesLoeschen).
                    Dadurch kann sichergestellt werden, dass die jeweiligen Nutzer auch nur die entsprechenden Rechte erhalten.
                </p><br/>
                <img src="../public/imgDokumentationDWP/CreateNutzerrollen.png" title="" alt="DB Create Nutzerrollen" draggable="false">
                <div class="caption">Abbildung 14: DB Create Nutzerrollen</div>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>

            <div class="section">
                <h3 id="routing">3.5 Routing</h3>
                <hr class="underHeadline" />

                <p>
                    Das Routing in unserer Anwendung wird durch eine zentrale Routing-Klasse gesteuert, die es ermöglicht, sowohl Seitenaufrufe als auch AJAX-Anfragen effizient zu verarbeiten. In der index.php definieren wir alle erforderlichen Routen, die sowohl für die Anzeige von Seiten als auch für die Bearbeitung von AJAX-Anfragen genutzt werden. Jede Route ist mit einem spezifischen Controller und einer zugehörigen Methode verknüpft, was die Handhabung der verschiedenen Anfragen vereinfacht.
                </p>
                <p>
                    Das Routing funktioniert, indem wir die aufgerufene URL ermitteln und mit den definierten Routen abgleichen. Ist eine Übereinstimmung vorhanden, wird der zugehörige Controller instanziiert und die passende Methode ausgeführt. Sollte keine Übereinstimmung gefunden werden, sorgt die Anwendung dafür, dass eine 404-Seite angezeigt wird.
                </p><br />
                <p>
                    Die Seiten in der Anwendung werden über den StaticPageController verwaltet. Jede Seite hat eine eigene Methode, die dafür sorgt, dass die richtigen Inhalte mit den entsprechenden CSS- und JavaScript-Dateien geladen werden. Zum Beispiel wird für die Seite "Unsere Tiere" eine spezielle Methode verwendet, die die Tiere anhand der übergebenen Kategorie lädt und die Seite entsprechend rendert. Diese Methode sorgt dafür, dass je nach ausgewählter Kategorie, wie etwa "Hunde", "Katzen" oder "Exoten", die richtigen Daten aus der Datenbank abgerufen und angezeigt werden.
                </p>
                <p>
                    Zusätzlich dazu kümmert sich jede Methode des Controllers darum, die benötigten Stylesheets und JavaScript-Dateien zu laden, um die Funktionalität der Seite zu gewährleisten. Jede Seite wird so optimiert, dass sie das passende visuelle Design und interaktive Elemente erhält.
                </p><br />
                <p>
                    Ein weiterer wichtiger Bestandteil unseres Routings ist die Handhabung von AJAX-Anfragen. Wenn eine Anfrage per AJAX an das Backend gestellt wird, wird die entsprechende Route verarbeitet und die Antwort als JSON an das JavaScript zurückgesendet. Dadurch können Daten dynamisch ohne vollständiges Neuladen der Seite geladen und angezeigt werden.
                </p><br />
                <p>
                    Zusammenfassend stellt unser Routing-System sicher, dass sowohl statische Seiten als auch dynamische AJAX-Anfragen effizient verarbeitet werden, um eine reibungslose Benutzererfahrung zu gewährleisten. Dieses System sorgt für klare Strukturierung und Optimierung der Anwendungslogik, was die Wartung und Erweiterung der Anwendung in der Zukunft erleichtert.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="interaktiveFeatures">4 Interaktive Features</h2>
                <hr class="underHeadline" />
                <p>
                    Die Anwendung bietet eine Vielzahl interaktiver Features, die die Benutzerfreundlichkeit erhöhen und dynamische Funktionen bereitstellen. Diese wurden bereits unter
                    <a href="#funktionalitaet" draggable="false">"2.4 Übersicht der Funktionalitäten und Seitenstruktur"</a> beschrieben. Nachfolgend werden lediglich ein paar JavaScript Features beschrieben.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="benutzerinteraktion">4.1 Benutzerinteraktion</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Inhalte mehrerer Seiten (beispielsweise bei der Seite "Unsere Tiere") werden dynamisch mit Ajax beim Aufrufen der Seite nachgeladen. So besteht die Möglichkeit, dass sich der Nutzer die
                        Seite bereits anschauen kann, während die Inhalte aus der Datenbank noch geladen werden. Dem Nutzer wird hier jeweils ein Ladesymbol angezeigt, damit dieser weiß, dass der Inhalt der Seite noch lädt.
                    </p><p>
                        Auf verschiedenen Seiten besteht außerdem die Möglichkeit einen "Weiterlesen"-Button anzuklicken. Dieser ermöglicht es detaillierte Informationen über das angeklickte Element zu erhalten (u.a. bei "Unsere Tiere").
                    </p><p>
                        Die "Unsere Tiere"-Seite bietet noch weitere Features. Unter anderem können Tiere favorisiert werden, wenn sie dem Nutzer gefallen. Dies wurde mit Cookies durch JavaScript umgesetzt. Weiterhin können die
                        Nutzer die Tiere nach Tierart, Rasse und Geschlecht filtern. Gibt es mit den eingestellten Filtern mehr als 8 Tiere, wird ein "Weitere Tiere anzeigen"-Button angezeigt, welcher es ermöglicht weitere Tiere mit AJAX nachzuladen.
                    </p><p>
                        Ein Besucher der Seite wird erstmal als Gast angezeigt. Er sieht an verschiedenen Stellen, dass man sich anmelden kann, um weitere Inhalte zu sehen. Das sieht beispielsweise so aus:
                    </p>

                    <br />
                    <img src="../public/imgDokumentationDWP/BeforeRegistration.png" title="" alt="Gast Nutzerrollen" draggable="false">
                    <div class="caption">Abbildung 15: Auszug "Gast Nutzerrollen"</div>
                    <p>
                        Sobald sich ein Nutzer angemeldet hat, kann er auf verschiedene weitere Informationen zugreifen. Unter anderem kann er nun Tiere als vermisst oder gefunden melden. Sollte er eine Anzeige eingestellt haben,
                        kann er diese später auch bearbeiten oder löschen. Ein Administrator kann alle Anzeigen löschen.
                    </p><p>
                        Weitere Informationen über die Nutzerrollen sind <a href="#rollenkonzept" draggable="false">hier</a> zu finden.
                    </p><br /><p>
                        Eine Anforderung des Projekts war, die Webseite so zu gestalten, dass sie auch ohne JavaScript funktionsfähig bleibt. Um dieser Anforderung gerecht zu werden, haben wir einen Hinweis implementiert, der Nutzer darauf aufmerksam macht, wenn JavaScript deaktiviert ist. Dieser Hinweis erscheint, sobald JavaScript nicht aktiv ist, und informiert die Nutzer darüber, wie sie alle Funktionen der Seite vollständig nutzen können.
                    </p><p>
                        Aufgrund des hohen Umfangs an dynamischen Inhalten und der begrenzten Zeitressourcen konnten wir jedoch keinen vollständigen serverseitigen Fallback für alle Funktionen umsetzen. Die wesentlichen Inhalte sind für Nutzer mit aktiviertem JavaScript vollständig und performant verfügbar, während der Hinweis sicherstellt, dass Nutzer ohne JavaScript nicht ohne Orientierung bleiben.
                    </p>
                    <br />
                    <img src="../public/imgDokumentationDWP/jsFallback.png" title="" alt="Gast Nutzerrollen" draggable="false">
                    <div class="caption">Abbildung 16: Anzeige, wenn JavaScript deaktiviert ist</div>
                    <br />
                    <p>
                        Im Rahmen der Entwicklung haben wir uns außerdem für die Verwendung einer Singleton-Datenbankklasse (Connection) entschieden, um die Verwaltung der Datenbankverbindung zu zentralisieren und unnötige Instanzierungen zu vermeiden. Obwohl in der Clean Code Literatur darauf hingewiesen wird, dass Datenbankinstanzen nicht als Singleton implementiert werden sollten, sind wir überzeugt, dass diese Lösung in unserem Projektkontext aufgrund der Einfachheit und Effizienz die richtige Wahl darstellt.
                    </p><p>
                        Im Verlauf des Projekts haben wir auch die Bezeichner in unserem Code optimiert. Zu Beginn verwendeten wir deutsche Begriffe, sind jedoch später auf englische Bezeichner umgestiegen, um die Lesbarkeit und Zukunftsfähigkeit des Codes zu verbessern. Aufgrund der verbleibenden Zeit und der Tatsache, dass das Projekt kurz vor der Fertigstellung stand, haben wir uns entschieden, die letzten Anpassungen nicht mehr vorzunehmen, um den Fokus auf den Abschluss des Projekts zu legen. Wir sind jedoch zuversichtlich, dass diese Entscheidungen das Projekt nicht negativ beeinflussen, sondern die Umsetzung effektiv und zielgerichtet vorangetrieben haben.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                
                <div class="section">
                    <h3 id="formulare">4.2 Dynamische Formulare und Eingabevalidierung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Anwendung bietet mehrere Formulare, die eine benutzerfreundliche Eingabe und Validierung in Echtzeit ermöglichen. Mithilfe von JavaScript werden Eingaben direkt beim Ausfüllen geprüft,
                        um fehlerhafte oder unvollständige Daten zu vermeiden. Dabei werden Fehlermeldungen bei ungültigen Eingaben oder fehlenden Pflichtfeldern ausgegeben. Diese weisen den Nutzer schon bei Eingabe,
                        in die Felder, an, mehr Buchstaben einzugeben. Gut zu sehen ist dies beispielsweise beim "Ort" im vermisst/gefunden Formular. In diesem Formular können auch Bilder hochgeladen werden. Es wird auch überprüft,
                        ob das richtige Dateiformat vorliegt und das Meldedatum des vermissten oder gefundenen Tieres in der Vergangenheit liegt.
                    </p>
                    <p>
                        Das Helfen Formular (zu finden im Menü unter Service/Infos) wird beispielsweise bei jedem neu laden der Seite zurückgesetzt. Dann werden neue Inputs geladen, während die alten entfernt werden.
                    </p>
                    <p>
                        Die Formulare, aber auch die Filterfunktion bei "Unsere Tiere", verwenden AJAX, um Daten zu senden und eine sofortige Rückmeldung zu erhalten. Dies verbessert die Benutzererfahrung und vermeidet
                        unnötige Seiten-Reloads.
                    </p>
                    <p>
                        Die Eingaben im Formular werden nach dem Absenden der Formulare im Backend validiert.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="tests">5 Tests und Optimierungen</h2>
                <hr class="underHeadline" />
                <p>
                    Die Anwendung wurde umfassend getestet, um Funktionalität, Benutzerfreundlichkeit und Leistung sicherzustellen. Dabei kamen manuelle Testverfahren zum Einsatz. Dadurch wurde sichergestellt, dass alle Anforderungen entsprechend funktionieren und fehlerfrei arbeiten.
                </p><br/>
                <p>
                    <b>Funktionale Tests:</b><br>
                    Alle Hauptfunktionen wie Registrierung, Anmeldung, Filter und Suchfunktionen sowie das Melden vermisster und gefundener Tiere wurden getestet.
                </p><br/>
                <p>
                    <b>Validierung Tests:</b><br>
                    Formulare wurden auf korrekte Eingabevalidierung überprüft, insbesondere die Echtzeitprüfungen. Fehlerhafte Eingaben werden erfolgreich erkannt und dem Benutzer gemeldet.
                </p>
                <p><br/>
                    <b>Performance Tests:</b><br>
                    Die Ladezeiten der dynamischen Inhalte wurden getestet, um sicherzustellen, dass die Daten schnell geladen und angezeigt werden.
                </p>
                <p><br/>
                    <b>Sicherheitsüberprüfungen:</b><br>
                    Es wurden Tests zur SQL Injection Prävention und zur sicheren Speicherung von Passwörtern durchgeführt.
                </p>
                <p><br/>
                    <b>Optimierungen:</b><br>
                    Basierend auf den Testergebnissen wurden Optimierungen an der Performance, den Validierungen und der Fehlerbehandlung vorgenommen.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="frontendTests">5.1 Frontend-Tests</h3>
                    <hr class="underHeadline" />
                    <p>
                        Im Rahmen der Frontend-Tests wurden die Benutzeroberfläche und die interaktiven Features der Anwendung ausführlich getestet. Dabei wurde besonderes Augenmerk auf Funktionalität, Benutzerfreundlichkeit und Kompatibilität gelegt.
                    </p>
                    <p><br/>
                        <b>Interaktive Elemente:</b><br>
                        Dynamische Inhalte, Filterfunktionen und Formulare wurden getestet, um sicherzustellen, dass die AJAX und Validierungsfunktionen korrekt arbeiten. Dies umfasst das Laden von Inhalten ohne Seitenreload sowie die Echtzeitprüfung von Eingaben.
                    </p>
                    <p><br/>
                        <b>Formularvalidierungen:</b><br>
                        Die Formularvalidierungen für E-Mail-Adressen, Passwörter und Bild Uploads wurden getestet. Fehlerhafte Eingaben wurden erkannt und den Nutzern entsprechende Hinweise angezeigt.
                    </p><br/>
                    <p>
                        <b>Browser Kompatibilität:</b><br>
                        Die Anwendung wurde in verschiedenen Browsern (Google Chrome, Mozilla Firefox, Microsoft Edge) getestet, um eine einheitliche Darstellung und Funktionalität sicherzustellen.
                    </p><br/>
                    <p>
                        <b>Navigationstests:</b><br>
                        Die Navigationselemente und Links wurden getestet, um eine intuitive Bedienung und korrekte Verlinkungen sicherzustellen.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="backendTests">5.2 Backend-Tests</h3>
                    <hr class="underHeadline" />
                    <p>
                        Im Rahmen der Backend-Tests wurden die Datenbankanbindung und Sicherheitsaspekte überprüft. Dabei lag der Fokus auf den implementierten Funktionen und deren Stabilität.
                    </p><br/>
                    <p>
                        <b>Datenbankoperationen:</b><br>
                        Es wurden Tests zu CRUD-Operationen (create, read, update, delete) durchgeführt.
                    </p><br/>
                    <p>
                        <b>Sicherheitsüberprüfungen:</b><br>
                        SQL Injection Schutz wurde durch Prepared Statements in der Datei <code>Connection.php</code> getestet und als sicher befunden. <!-- haben wir passwort hashing? -->
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="dokumentation">6 Dokumentation</h2>
                <hr class="underHeadline" />
                <p>
                    Die Dokumentation des Projekts "Tierheimat" ist ein wesentlicher Bestandteil unserer Arbeit, der die gesamte Entwicklung und Umsetzung des zweiten Teils des Projekts transparent und nachvollziehbar macht.
                </p><p>
                    Eine sorgfältig erstellte Dokumentation stellt sicher, dass alle Phasen des Projekts, von der Planung bis zur Implementierung, detailliert festgehalten werden und als wertvolle Ressource für zukünftige Referenzen dient.
                </p><p>
                    Ein wichtiger Aspekt der Nachvollziehbarkeit stellen auch die <a href="#anlagen" draggable="false">Anlagen</a> und <a href="#quellen" draggable="false">Quellen</a> dar.
                    Aus diesen Abschnitten können alle wichtigen erhobenen Daten klar und nachvollziehbar betrachtet werden.
                </p>
                <div class="Dokumentation">
                    <img src="../public/imgDokumentation/processDocumentation.jpg" title="Process Documentation" alt="Ablauf der Process Documentation" draggable="false">
                </div><div class="caption">Abbildung 17: Prozess Dokumentation</div>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="fazit">7 Fazit</h2>
                <hr class="underHeadline" />
                <p>
                    Das Ziel des Projekts war die Erweiterung der bestehenden 'Tierheimat'-Webseite durch die Implementierung dynamischer Inhalte mit PHP und JavaScript.
                    Insgesamt konnten wir viele der geplanten Funktionen erfolgreich umsetzen.
                </p><p>
                    Eine besondere Herausforderung bestand darin, sich die notwendigen Kenntnisse eigenständig anzueignen. Dies erforderte einen erheblichen Aufwand an
                    Recherche, um die technischen Konzepte und Werkzeuge vollständig zu verstehen und richtig anzuwenden. Durch gute Teamarbeit und den Austausch von Tipps und Erfahrungen konnten wir uns gegenseitig unterstützen und die Aufgaben erfolgreich bewältigen.
                </p><p>
                    Wir sind mit dem Ergebnis zufrieden. Das Projekt war eine wertvolle Erfahrung, die unsere
                    Fähigkeiten in der Webentwicklung mit PHP und JavaScript weiter gestärkt hat.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="sollIst">7.1 Soll- / Ist-Vergleich</h3>
                    <hr class="underHeadline" />

                    <p>
                        Im Rahmen des Projekts wurde ein Soll- / Ist-Vergleich durchgeführt, um die geplanten und tatsächlich
                        aufgewendeten Stunden in den verschiedenen Projektphasen zu analysieren. Die Ergebnisse sind in der folgenden Tabelle dargestellt:
                    </p>

                    <table>
                        <thead>
                            <tr class="headlineTable">
                                <th>Projektphase</th>
                                <th>Soll</th>
                                <th>Ist</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vorbereitungsphase</td>
                                <td class="time">18h</td>
                                <td class="time greenColor">18h</td>
                            </tr>
                            <tr>
                                <td>Implementierungsphase</td>
                                <td class="time">120h</td>
                                <td class="time redColor">150h</td>
                            </tr>
                            <tr>
                                <td>Dokumentationsphase</td>
                                <td class="time">51h</td>
                                <td class="time greenColor">51h</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Gesamt</td>
                                <td class="time">189h</td>
                                <td class="time redColor">219h</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="caption">Tabelle 3</div>

                    <p>
                        Insgesamt wurden für das Projekt 219 Stunden aufgewendet, während ursprünglich 189 Stunden geplant waren.
                        Die zusätzlichen 30 Stunden ergaben sich dadurch, dass zwei der drei Teammitglieder keine Vorerfahrungen in PHP und Javascript hatten und dadurch einen höheren Einarbeitungsaufwand hatten.
                        Dadurch verlängerte sich die Implementierungsphase, insbesondere durch die notwendige Aneignung von Wissen
                        und die schrittweise Verbesserung der Umsetzung.
                    </p><p>
                        Dieser Mehraufwand trug jedoch wesentlich zur Vertiefung der Kenntnisse aller Beteiligten bei
                        und führte letztlich zu einem besseren Verständnis der Projektinhalte.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="lessonsLearned">7.2 Lessons Learned</h3>
                    <hr class="underHeadline" />
                    <ol>
                        <li class="list-item">
                            <strong>Bedeutung einer klaren Projektplanung:</strong>
                            <p>Wir haben gelernt, dass eine sorgfältige und detaillierte Planung der Schlüssel zum Erfolg eines Projektes ist.</p>
                            <p>Die Erstellung eines klaren Projektplans, einschließlich Meilensteine und Zeitpläne, hat uns geholfen den Überblick zu behalten und sicherzustellen, dass alle Teammitglieder auf dem gleichen Stand sind.</p>
                        </li>
                        <li class="list-item">
                            <strong>Kommunikation und Teamarbeit:</strong>
                            <p>Effektive Kommunikation innerhalb des Teams war ein entscheidender Faktor für den Projekterfolg.</p>
                            <p>Regelmäßige Meetings, offene Diskussionen und das Teilen von Feedback haben dazu beigetragen, Missverständnisse zu vermeiden und die Zusammenarbeit zu stärken.</p>
                            <p>Die Bedeutung der Teamarbeit und die Fähigkeit, effektiv zusammenzuarbeiten, können nicht genug betont werden.</p>
                        </li>
                        <li class="list-item">
                            <strong>Flexibilität und Anpassungsfähigkeit:</strong>
                            <p>Während des Projektes sind wir auf unvorhergesehene Herausforderungen gestoßen, die Flexibilität und Anpassungsfähigkeit erforderten.</p>
                            <p>Die Bereitschaft, Pläne anzupassen und Lösungen für unerwartete Probleme zu finden, war entscheidend für das Vorankommen des Projekts.</p>
                        </li>
                        <li class="list-item">
                            <strong>Technische Herausforderungen meistern:</strong>
                            <p>Die Implementierung verschiedener Technologien und Tools hat uns gelehrt, wie wichtig es ist, kontinuierlich zu lernen und sich weiterzuentwickeln.</p>
                            <p>Wir haben neue Techniken und Best Practices kennengelernt, die unsere technischen Fähigkeiten verbessert haben.</p>
                        </li>
                        <li class="list-item">
                            <strong>Organisation:</strong>
                            <p>Eine getaktete Arbeitsweise sowie Fristen haben das Arbeiten produktiver, allerdings auch fehleranfälliger gestaltet. Diese Fristen haben uns dabei geholfen stets eine Orientierung über das Projekt und den aktuellen Standpunkt zu haben.
                            </p>
                        </li>
                    </ol>


                    <br />
                    <p>
                        Insgesamt stellte das Projekt "Tierheimat" eine äußerst wertvolle und bereichernde Lernerfahrung dar. Es bot uns die Möglichkeit, sowohl unser theoretisches Wissen, als auch unsere praktischen Fähigkeiten erheblich zu erweitern und zu vertiefen. </p>
                    <p>
                        Dabei konnten wir nicht nur unser technisches Know-how im Bereich der Webentwicklung, Datenbankanbindung und interaktiven Features ausbauen, sondern auch wichtige Erkenntnisse im Hinblick auf Teamarbeit, Organisation und Projektmanagement gewinnen.</p>
                    <P>
                        Insbesondere die Zusammenarbeit im Team förderte unsere Kommunikationsfähigkeiten und verdeutlichte, wie essenziell klare Absprachen, regelmäßige Abstimmungen und die flexible Anpassung an neue Herausforderungen für den Projekterfolg sind.</P>
                    <p>
                        Abschließend lässt sich festhalten, dass das Projekt nicht nur ein wichtiger Meilenstein in unserer akademischen Laufbahn war, sondern auch einen nachhaltigen Einfluss auf unsere persönliche und berufliche Entwicklung hatte.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="ausblick">7.3 Ausblick</h3>
                    <hr class="underHeadline" />
                    <p>
                        Das Projekt "Tierheimat" hat eine solide Grundlage für die Zukunft geschaffen und bietet zahlreiche Möglichkeiten zur Weiterentwicklung. 
                        Während die aktuelle Website den Bedürfnissen der Nutzer und des Tierheims gerecht wird, gibt es immer Raum für Verbesserungen und Erweiterungen.
                    </p><br
                    <p>
                        In einem fortführenden Modul könnten weitere Funktionen implementiert werden, um die Benutzererfahrung und den Verwaltungsprozess zu optimieren. Dazu gehören:
                    </p><br/>
                    <ul class="tasks" style="padding-left: 20px;">
                        <li>Administratorseite zur Verwaltung von Nutzern</li>
                        <li>Administratorseite zur Verwaltung von hochgeladenen Hilfsangeboten (aus dem Formular Service/Infos)</li>
                        <li>Eine Übersichtsseite über favorisierte Tiere (für jeden Nutzer)</li>
                        <li>Eine Benachrichtigungsfunktion, die es Nutzern ermöglicht, direkt mit dem Tierheim (oder einem Chatbot) zu kommunizieren</li>
                        <li>Erweiterte Filter und Suchfunktionen, um die Navigation und Auffindbarkeit von Tieren weiter zu verbessern</li>
                        <li>Ein direktes anzeigen der neu gemeldeten vermissten / gefundenen Tiere nach Erstellung</li>
                        <li>Eine Überblickseite zur Auswertung von Daten für das Tierheimmanagement, in Form von Statistiken u.v.m.</li>
                    </ul><br/>
                    <p>
                        Diese Erweiterungen würden das Projekt auf ein neues Level heben und die Effizienz sowie die Benutzerfreundlichkeit weiter steigern.
                        Zudem könnte die Plattform langfristig durch die Einbindung neuer Technologien wie KI gestützte Bild und Mustererkennung zur Identifikation vermisster Tiere ausgebaut werden.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 id="anlagen">Anlagenverzeichnis</h1>
            <hr class="underHeadline" />
            <ul>
                <li><a href="#detaillierteZeitplanung" draggable="false">Anlage 1: Detaillierte Zeitplanung</a></li>
            </ul>
            <br />
    
   

            <h2 id="detaillierteZeitplanung">Anlage 1: Detaillierte Zeitplanung</h2>
            <hr class="underHeadline" />
            <table class="table">
                <tbody>
                    <tr class="headlineTable">
                        <td colspan="2">Vorbereitungsphase</td>
                        <td class="time">18h</td>
                    </tr>
                    <tr>
                        <td>Erstellen von Entity-Relationship- und Relationenmodell</td>
                        <td class="time">5h</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Erstellen der Datenbank Befehle (CREATE, INSERT) und kreieren einer Datei zur Erst-Initialisierung</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr>
                        <td>Erstellung einer funktionierenden Datenbankverbindung in einer Connection Klasse</td>
                        <td class="time">3h</td>
                    </tr>
                    <tr class="headlineTable">
                        <td colspan="2">Implementierungsphase</td>
                        <td class="time">120h</td>
                    </tr>
                    <tr>
                        <td>Erstellen des Routings + 404 Fehlerseite</td>
                        <td class="time">10h</td>
                        <td rowspan="15"></td>
                    </tr>
                    <tr>
                        <td>Erstellen des MVC Patterns</td>
                        <td class="time">7h</td>
                    </tr>
                    <tr>
                        <td>Vereinheitlichung von Menü, Footer und Breadcrumbmenü auf einer Seite</td>
                        <td class="time">7h</td>
                    </tr>
                    <tr>
                        <td>Anzeige der Tiere in "Unsere Tiere" (aus der Datenbank)</td>
                        <td class="time">7h</td>
                    </tr>
                    <tr>
                        <td>Filterung der Tiere in "Unsere Tiere" nach Tierart, Rasse und Geschlecht</td>
                        <td class="time">7h</td>
                    </tr>
                    <tr>
                        <td>Weiterlesen der Tier-Informationen bei "Unsere Tiere"</td>
                        <td class="time">7h</td>
                    </tr>
                    <tr>
                        <td>"Gefällt mir"-Angabe einzelner Tiere in "Unsere Tiere"</td>
                        <td class="time">8h</td>
                    </tr>
                    <tr>
                        <td>Weiterlesen der Artikel in "Aktuelles"</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr>
                        <td>Anzeige der Tiere in "Vermisste / Gefundene Tiere" (aus der Datenbank)</td>
                        <td class="time">6h</td>
                    </tr>
                    <tr>
                        <td>Filterung der Tiere in "Vermisst / Gefunden"</td>
                        <td class="time">6h</td>
                    </tr>
                    <tr>
                        <td>Weiterlesen der Tier-Informationen bei "Vermisste / Gefundene Tiere"</td>
                        <td class="time">5h</td>
                    </tr>
                    <tr>
                        <td>Validierung und Upload des Formulars bei "Vermisste / Gefundene Tiere"</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr>
                        <td>Validierung und Upload des Formulars bei "Service / Infos"</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr>
                        <td>Bearbeiten und Löschen von vermissten und gefundenen Tieren</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr>
                        <td>Login und Registration</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr class="headlineTable">
                        <td colspan="2">Dokumentationsphase</td>
                        <td class="time">51h</td>
                    </tr>
                    <tr>
                        <td>Erstellen der Projektdokumentation</td>
                        <td class="time">40h</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Prüfung der Projektdokumentation durch die anderen Projektmitglieder</td>
                        <td class="time">10h</td>
                    </tr>
                    <tr>
                        <td>Erstellung der README</td>
                        <td class="time">1h</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Gesamt</td>
                        <td class="time">189h</td>
                    </tr>
                </tfoot>
            </table>
            <div class="caption">Tabelle 4</div>
        </div>




        <div class="container" id="quellen">
            <h1>Quellen</h1>
            <hr class="underHeadline" />
            <ul>
                <li><a href="#quelleDeckblatt" draggable="false">Quelle: Deckblatt</a></li>
                <li><a href="#quelleDokumentation" draggable="false">Quelle: 6 Dokumentation</a></li>
            </ul>

            <div class="section">
                <p>
                    Im Quellverzeichnis können alle verwendeten Pfade der erhobenen Daten nach Über- und Unterpunkten sortiert nachvollzogen werden.
                </p><p>
                    Für diesen Teil des Projekts wurden keine neuen Bilder verwendet. Die Quellen der Bilder sind im Quellverzeichnis der
                    <a href="dokuGWP#quelleDeckblatt" draggable="false">Dokumentation "Grundlagen Webprogrammierung"</a> zu finden.
                </p>
            </div>

            <div class="section">
                <h2 id="quelleDeckblatt">Quelle: Deckblatt</h2>
                <hr class="underHeadline" />

                <p>Logo FHE (Abbildung 01):</p>
                <a href="https://www.fh-erfurt.de/" draggable="false">https://www.fh-erfurt.de/</a>
            </div>

            <div class="section">
                <h2 id="quelleDokumentation">Quelle: 6 Dokumentation</h2>
                <hr class="underHeadline" />

                <p>Prozess Dokumentation (Abbildung 17):</p>
                <a href="https://www.bing.com/images/search?view=detailV2&ccid=3yUARhkc&id=B868D94755CD197FCF8A98FCFF1461B9E5E68189&thid=OIP.3yUARhkcIxmF9NnVDH4w8wHaEK&mediaurl=https%3a%2f%2fwww.marketing91.com%2fwp-content%2fuploads%2f2020%2f11%2fProcess-Documentation.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.df250046191c231985f4d9d50c7e30f3%3frik%3diYHm5blhFP%252f8mA%26pid%3dImgRaw%26r%3d0&exph=1080&expw=1920&q=documentation+image&simid=608003890566794839&FORM=IRPRST&ck=10053D9DE211BF4ECEF8F382AC847D2D&selectedIndex=18&itb=0&ajaxhist=0&ajaxserp=0"
                   draggable="false">https://www.bing.com/images/search?view=detailV2&ccid=3yUARhkc&id=B868D94755CD197FCF8A98FCFF1461B9E5E68189&thid=OIP.3yUARhkcIxmF9NnVDH4w8wHaEK&mediaurl=https%3a%2f%2fwww.marketing91.com%2fwp-content%2fuploads%2f2020%2f11%2fProcess-Documentation.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.df250046191c231985f4d9d50c7e30f3%3frik%3diYHm5blhFP%252f8mA%26pid%3dImgRaw%26r%3d0&exph=1080&expw=1920&q=documentation+image&simid=608003890566794839&FORM=IRPRST&ck=10053D9DE211BF4ECEF8F382AC847D2D&selectedIndex=18&itb=0&ajaxhist=0&ajaxserp=0</a>
            </div>

            <div class="backButton">
                <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
            </div>
        </div>
    </main>
</body>
</html>