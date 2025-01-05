<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../public/css/main.css" />
    <link rel="stylesheet" href="../public/css/documentation.css" />

    <link rel="stylesheet" href="../public/lib/fontawesome-6.5.2/css/all.min.css" />

    <title>Projektdokumentation dynamische Webprogrammierung Tierheimat</title>
</head>
<body>
    <header>
        <a href="impressum" class="button" draggable="false"><i class="fa-solid fa-arrow-left"></i> Zurück zum Impressum</a>
    </header>

    <!--
    TODO WICHTIG!!!!




    -Flussbild für Dateneingabe per mehrseitigem Formular mit Validierung


    -Rollenmodell für die Nutzer -> Teilweise Implementiert, würde noch gerne mehr Code Beispiele einbringen, Feedback ausstehend um Aufwand und Sinnhaftigkeit abzuschätzen

     -> Hinweis v.a. auf besondere techn. Anforderungen, bekannte Fehler, unvollständige Implementierung, "versteckte" Features, ... → abgeschlossen, ist z.B mit der favourite Funktion benannnt, dass diese als Cookies gespeichert werden und nicht in der DB
    -Auflistung Tätigkeiten jeder Person und benötigter Aufwand → integriert bis auf die h per person
    -ERM und relationales Modell für die DB!  → integriert
-Beschreibung der Funktionalitäten für jede Seite (beschriftete Screenshots) -> done
    -->

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
                <dd><a href="#ziel" draggable="false">1.1 Projektziel und Anfroderungen</a></dd>
                <dd><a href="#rückblick" draggable="false">1.2 Projektrückblick</a></dd>
                <dd><a href="#erweiterung" draggable="false">1.3 Geplante Erweiterungen</a></dd>
                <dt><a href="#planung" draggable="false">2 Konzeption und Planung</a></dt>
                <dd><a href="#technologien" draggable="false">2.1 Technologie- und Architekturwahl</a></dd>
                <dd><a href="#zeitplanMeilensteine" draggable="false">2.2 Zeitplan und Meilensteine</a></dd>
                <dd><a href="#aufgabenaufteilung" draggable="false">2.3 Geplante Aufgabenteilung</a></dd>
                <dd><a href="#funktionalität" draggable="false">2.4 Übersicht der Funktionalitäten und Seitenstruktur</a> </dd>
                <dt><a href="#backend" draggable="false">3 Backend-Entwicklung</a></dt>
                <dd><a href="#datenbankentwurf" draggable="false">3.1 Datenbankentwurf</a></dd>
                <dd><a href="#datenbankAnbindung" draggable="false">3.2 Datenbank-Setup und Anbindung</a></dd>
                <dd><a href="#php" draggable="false">3.3 PHP-Skripte und Logik</a></dd>
                <dt><a href="#interaktiveFeatures" draggable="false">4 Interaktive Features</a></dt>
                <dd><a href="#benutzerinteraktion" draggable="false">4.1 Benutzerinteraktion</a></dd>
                <dd><a href="#formulare" draggable="false">4.2 Dynamische Formulare und Eingabevalidierung</a></dd>
                <dt><a href="#tests" draggable="false">5 Tests und Optimierung </a></dt>
                <dd><a href="#frontendTests" draggable="false">5.1 Frontend-Tests</a></dd>
                <dd><a href="#backendTests" draggable="false">5.2 Backend-Tests</a></dd>
                <dt><a href="#dokumentation" draggable="false">6 Dokumentation</a></dt>
                <dt><a href="#fazit" draggable="false">7 Fazit und Ausblick</a></dt>
                <dd><a href="#sollIst" draggable="false">7.1 Soll- / Ist-Vergleich</a></dd>
                <dd><a href="#lessonsLearned" draggable="false">7.2 Lessons Learned</a></dd>
                <dd><a href="#ausblick" draggable="false">7.3 Ausblick</a></dd>
                <dt><a href="#anlagen" draggable="false">8 Anlagenverzeichnis</a></dt>
                <dd class="emptyDD">&nbsp;</dd>
                <dt><a href="#quellen" draggable="false">9 Quellen</a></dt>
                <dd class="emptyDD">&nbsp;</dd>
            </dl>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="einleitung">1 Einleitung</h2>
                <hr class="underHeadline" />
                <p>
                    Diese Seite dokumentiert den zweiten Teil des Projektes
                    <img src="../public/img/logo.jpg" class="inlineLogo" alt="Tierheimat Logo" title="Tierheimat Logo" draggable="false">.
                </p><br />
                <p>
                    Das Projekt ist in zwei Phasen gegliedert, die über zwei Semester laufen. 
                    Hier wird der zweite Teil ausführlich beschrieben, während eine detaillierte Dokumentation des ersten Teils <a href="dokuGWP" draggable="false">hier </a> verfügbar ist.
                </p> <br /> <p>
                    Diese Dokumentation ist in mehrere Abschnitte gegliedert, die einen umfassenden Überblick über alle Phasen und Aspekte des Projekts bieten. 
                    Sie beginnt mit einer Einleitung, in der das Projektziel und die Anforderungen beschrieben werden. 
                    Zudem enthält dieser Abschnitt einen Rückblick auf den bisherigen Projektverlauf sowie eine Übersicht über die geplanten Erweiterungen.
                </p> <br /> <p>
                    Im Anschluss folgt der Bereich Konzeption und Planung, der die Auswahl der Technologien und Architektur beleuchtet, 
                    den Zeitplan mit wichtigen Meilensteinen darstellt und die Ressourcenplanung sowie die Aufgabenverteilung im Team beschreibt.
                </p> <br /> <p>
                    Daraufhin widmet sich die Dokumentation der Backend-Entwicklung, einschließlich des Datenbankentwurfs und -setups sowie der PHP-basierten Skript-Logik, 
                    die die Kernfunktionalität der Webseite unterstützt.
                </p> <br /> <p>
                    Der Abschnitt Interaktive Features geht auf die Umsetzung der Benutzerinteraktionen ein, wie etwa dynamische Formulare und Eingabevalidierungen, um eine benutzerfreundliche Oberfläche zu gewährleisten.
                </p> <br /> <p>
                    Im Kapitel zu Tests und Optimierung werden die durchgeführten Frontend- und Backend-Tests beschrieben, die zur Sicherstellung der Funktionalität und Stabilität dienen.
                </p> <br /> <p>
                    Ein abschließender Abschnitt Fazit und Ausblick bietet einen Vergleich zwischen dem Ist- und Soll-Zustand, eine Reflexion der gewonnenen Erkenntnisse (Lessons Learned) und einen Ausblick auf mögliche Weiterentwicklungen. 
                    Ergänzend werden in den Anlagen und im Quellenverzeichnis unterstützende Materialien und die genutzten Quellen bereitgestellt.
                </p> <br /> <p>
                    Der folgende Abschnitt beginnt mit einer Erläuterung des Projektziels und der Anforderungen. 
                    Anschließend wird ein kurzer Rückblick auf die im ersten Teil umgesetzten Frontend-Entwicklungen gegeben, gefolgt von einer Übersicht der geplanten Erweiterungen.
                </p> <br /> <p>
                    Zur besseren Lesbarkeit wird in dieser Dokumentation auf geschlechtsneutrale Sprachformen verzichtet; 
                    alle Personenbezeichnungen gelten für alle Geschlechter gleichermaßen.                
                </p>
                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="ziel">1.1 Projektziel und Anforderung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Während unserer Projektrecherche erkannten wir schnell, dass viele Tierheime in der digitalen Welt hinter ihren Möglichkeiten zurückbleiben. 
                        Veraltete Webseiten beeinträchtigen oft die Nutzererfahrung erheblich, was das Auffinden von Informationen und die Kontaktaufnahme erschwert. 
                        Aus dieser Beobachtung entstand die Idee für unser Projekt: die Entwicklung einer modernen, benutzerfreundlichen Webseite für Tierheime, die durch eine klare Struktur, hilfreiche Funktionen und ein ansprechendes Design überzeugt. 
                        Dynamische und interaktive Elemente sollen dabei den Nutzern eine möglichst intuitive und angenehme Bedienung ermöglichen.
                    </p><br /><p>
                        Das Hauptziel der Webseite ist es, die Vermittlung von Tieren zu unterstützen, indem sie strukturierte und umfassende Informationen wie Fotos, detaillierte Beschreibungen und Kontaktdaten bereitstellt. 
                        Darüber hinaus soll die Webseite die Sichtbarkeit des Tierheims in der Öffentlichkeit erhöhen und interne Abläufe durch digitale Prozesse effizienter gestalten. So werden Funktionen wie Formulare für Hilfsangebote und für das Melden vermisster oder gefundener Tiere integriert, um die Interaktion der Nutzer mit dem Tierheim zu fördern und das Gemeinschaftsengagement zu stärken. 
                        Informationsseiten und regelmäßige Ankündigungen sollen Besucher über aktuelle Geschehnisse und Aktionen stets auf dem Laufenden halten.
                    </p><br /><p>
                        Um diese Ziele zu erreichen, wurde das Projekt in zwei Phasen gegliedert, die sich jeweils über ein Semester erstrecken: 
                        Der erste Teil konzentrierte sich auf die Entwicklung eines benutzerfreundlichen und übersichtlichen Designs sowie die Bereitstellung grundlegender Funktionen mithilfe von HTML und CSS, um eine solide Basis zu schaffen. 
                        Der zweite Teil widmet sich nun der Entwicklung eines strukturierten Backends und der Integration dynamischer Elemente und interaktiver Features, die das Nutzererlebnis weiter verbessern und der Webseite zusätzliche Funktionalität verleihen.
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
                        Der erste Teil des Projekts befasste sich mit dem Entwurf der Webseite mithilfe von HTML und CSS.  
                        Im Folgenden sind Links hinterlegt, die auf die detaillierte Dokumentation der Zwischenschritte des ersten Projektteils verweisen und diese nachvollziehbar beschreiben. 
                    </p><br /><p>
                        Zu Beginn des ersten Projektteils wurde eine <a href="dokuGWP#istAnalyse">Ist-Analyse</a> durchgeführt, bei der bestehende Tierheim-Webseiten untersucht und positive sowie negative Aspekte identifiziert wurden.
                        Die Erkenntnisse daraus dienten als Orientierung für das eigene Projekt: Positive Eigenschaften, wie die klare Darstellung vermisster und gefundener Tiere auf der Webseite des Tierheims Jena, sollten übernommen werden, während negative Merkmale, wie das unstimmige Farbschema der Webseite des Tierheims Erfurt, bewusst vermieden wurden.
                    </p><br /><p>
                        Anschließend wurde die <a href="dokuGWP#zielgruppe">Zielgruppe</a> der Webseite genauer definiert, um die Gestaltung und Funktionalität gezielt auf die Bedürfnisse der Nutzer abzustimmen.
                    </p>
                    </p><br />
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/zielgruppenanalyse.jpg" title="Zielgruppenanalyse" alt="Tabelle der Zielgruppenanalyse" draggable="false">
                    </div>
                    <div class="caption">Abbildung 02: Tabelle Zielgruppenanalyse</div>
                    <br />

                    <br /><p>
                        Aus dieser Zielgruppenanalyse wurden <a href="dokuGWP#zielplattform">Struktur</a> und Funktionen der „Tierheimat“-Webseite abgeleitet.
                        Zu den wichtigen Funktionen zählten interaktive Formulare, die das Melden vermisster und gefundener Tiere sowie das Anbieten von Unterstützung erleichtern.
                    </p><br />

                    <img src="../public/imgDokumentation/webseitenstruktur.jpg" title="Webseitenstruktur" alt="Webseitenstruktur" draggable="false">
                    <div class="caption">Abbildung 03: Aufbau der Webseite</div>
                    <br />

                    <p>
                        Daraufhin wurde das <a href="dokuGWP#entwurfLogo">Logo</a> der „Tierheimat“ entworfen und ein einheitliches Design für die <a href="dokuGWP#entwurfBenutzeroberfläche">Benutzeroberfläche</a> der Webseite entwickelt.
                        Die grüne Farbgestaltung und die gewählte Schriftart tragen zur Identität der „Tierheimat“ bei und spiegeln die Werte dieser wider.
                    </p><br />

                    <img src="../public/imgDokumentation/logoFinal.PNG" title="Finales Logo" alt="Finales Logo im Design und Bsp." draggable="false">
                    <div class="caption">Abbildung 04: Auszug "Unsere Tiere"</div>

                    <br />
                    <p>
                        Auf Basis der entworfenen Designs wurden die Seiten schließlich in HTML und CSS umgesetzt. Dazu gehörte auch die Entwicklung eines responsive Designs, um eine optimale Darstellung auf verschiedenen Geräten sicherzustellen.
                        Das Teilprojekt wurde abgeschlossen durch <a href="dokuGWP#testen">Nutzertests und die Einholung externen Feedbacks</a> zur Webseite sowie eine Reflexion der <a href="dokuGWP#lessonsLearned">Lessons Learned</a>.
                    </p><br /><p>
                        Die gesamte Projektarbeit wurde parallel in der <a href="dokuGWP">Projektdokumentation</a> festgehalten. Mit der finalen, strukturierten und nutzerfreundlichen Webseite, die ein ansprechendes und responsive Design sowie nützliche Funktionen bietet, wurde das Ziel des ersten Projektteils erfolgreich erreicht.
                        Diese Webseite bildet nun die Grundlage für die geplanten Erweiterungen im zweiten Teil des Projekts.
                    </p>
                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="erweiterung">1.3 Geplante Erweiterungen</h3>
                    <hr class="underHeadline" />
                    <p>
                        Im zweiten Teil des Projekts liegt der Schwerpunkt auf der Entwicklung des Backends sowie der Integration interaktiver Funktionen, um die Webseite benutzerfreundlicher und funktionaler zu gestalten. 
                    </p><br /><p>
                        Zunächst ist eine strukturierte Anbindung der Webseite an eine Datenbank vorgesehen. Diese ermöglicht eine effiziente Datenverwaltung, reduziert redundanten Code und bildet die Grundlage für verschiedene Formular- und Filterfunktionen. 
                        Dazu wird ein Entity-Relationship-Modell entworfen, welches die spezifischen Anforderungen der Webseite abbildet beispielsweise eine „Tiere“ Tabelle, die zwischen zur Adoption freigegebenen, vermissten und gefundenen Tieren unterscheidet.
                        Aus diesem Modell werden mithilfe von SQL die entsprechenden Tabellen in MariaDB erstellt. 
                        Anschließend erfolgt die Einrichtung einer Datenbankverbindung über ein PHP-Skript, um den sicheren Austausch von Daten zwischen der Webseite und der Datenbank zu gewährleisten.
                    </p><br /><p>
                        Anschließend sollen für die weitere Backend Entwicklung die CRUD-Funktionen (Create, Read, Update, Delete) in PHP implementiert werden.
                        Diese Funktionen ermöglichen es, neue Datensätze hinzuzufügen, bestehende Daten zu lesen, zu aktualisieren oder zu löschen. So wird es beispielsweise möglich sein, neue Tiere in die Datenbank aufzunehmen, deren Informationen zu bearbeiten oder diese aus dem System zu entfernen.
                        Die CRUD-Funktionen finden unter anderem in der Verarbeitung der Formulardaten Anwendung. 
                        Hierfür sind separate PHP-Dateien vorgesehen, die zudem Sicherheitsmaßnahmen, wie etwa gegen SQL-Injection, beinhalten. Nutzern, die vermisste oder gefundene Tiere melden, wird außerdem die Möglichkeit geboten, ihre Einträge zu bearbeiten oder zu löschen. Dies gewährleistet eine stets aktuelle Tierdatenbank und eine effiziente Datenverwaltung. 
                        Abschließend soll die Backend-Logik umfassenden Tests unterzogen werden, um eine fehlerfreie Datenverarbeitung sicherzustellen.
                    </p><br /><p>
                        Neben der Backend Entwicklung ist auch die Einbindung interaktiver Elemente mithilfe von JavaScript geplant, um das Nutzererlebnis zu verbessern.
                        Eine der vorgesehenen Funktionen ist ein Filter, mit dem Nutzer gezielt nach Tierarten oder Status (vermisst/gefunden) suchen können. Diese dynamische Filteroption erleichtert die Navigation und ermöglicht den Nutzern, die für sie relevanten Informationen schnell zu finden. 
                        Da die zu erwartende Datenmenge gering bleibt weniger als 200 Einträge, bestehend aus zur Adoption freigegebenen oder vermissten und gefundenen Tieren – planen wir eine clientseitige Filterung direkt im Browser mithilfe von JavaScript.
                        Auf diese Weise werden alle relevanten Daten bereits beim Laden der Seite vollständig in den Browser geladen und können dort ohne zusätzliche Serveranfragen gefiltert werden. 
                        Dies sorgt für eine schnelle, unmittelbare Reaktionszeit der Filterfunktion und verbessert das Nutzungserlebnis durch eine flüssige, verzögerungsfreie Interaktion.
                        Darüber hinaus soll ein „Gefällt mir“ Button für die Tiere integriert werden, sodass Interessenten ihre Favoriten speichern und später leichter darauf zugreifen können.
                    </p><br /><p class="zuBearbeiten">
                        <!--Anmerkung: Je nachdem ob es über den Server laufen soll (in mehreren Browsern und Geräten über längere Zeit sichtbar) oder nicht (nur in dem Browser), wird auch die Verwendung des Backends notwendig. Hierbei sendet ein JavaScript-Event eine Anfrage an das Backend (z.B. per AJAX), um favorisierte Tiere in der Datenbank zu speichern.
                        Wenn wir das so umsetzten müssen wir die Datenbank noch anpassen und noch eine Relation Favorisiert erstellen die in n:m Beziehung zwischen Personen und Tieren steht. Eventuell so: Favoriten (FavoritenID, TierID, PersonID, Datum) -->
                    </p><p>
                        Zusätzlich ist die Integration weiterer dynamischer Inhalte geplant, die sich auf Nutzereingaben basierend anpassen. 
                        So sollen „Weiterlesen“ Buttons eine detailliertere Ansicht zu einem Tier oder Artikel bieten, während im Hilfsformular durch Klicken zusätzliche Termineingaben hinzugefügt werden können, ohne die Seite neu laden zu müssen.
                        Auch die Funktion „weitere Tiere anzeigen“ soll es den Nutzern ermöglichen, zusätzliche Einträge anzuzeigen, ohne die gesamte Webseite zu aktualisieren. Darüber hinaus soll JavaScript genutzt werden, um Benutzereingaben bereits im Browser zu prüfen, bevor sie an den Server gesendet werden. 
                        Dies erlaubt die direkte Erkennung und Korrektur unvollständiger oder fehlerhafter Eingaben im Formular.
                    </p><br /><p>
                        Diese geplanten Erweiterungen sollen die Webseite strukturiert und interaktiv ausbauen, um den Anforderungen einer modernen Tierheim-Plattform gerecht zu werden und den Nutzern eine angenehme und effiziente Bedienung zu bieten.
                    </p><br /><p>
                    </p><br /><p>
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
                        Für die Entwicklung der Webseite wurde eine Kombination aus verschiedenen Technologien und Tools gewählt, um eine funktionale und benutzerfreundliche Plattform zu erstellen. 
                        Zu den eingesetzten Technologien zählen XAMPP, PHP, HTML, MariaDB, JavaScript und die integrierte Entwicklungsumgebung PHPStorm.
                    </p><br /><p>
                        XAMPP stellt eine umfassende lokale Serverumgebung bereit, die den Apache Webserver, das Datenbankmanagementsystem MariaDB und die Programmiersprache PHP vereint.
                        Dank dieser integrierten Lösung wird die Verwaltung und Zusammenarbeit der erforderlichen Komponenten erheblich vereinfacht.
                        Zudem ermöglicht die benutzerfreundliche Installation und Konfiguration von XAMPP dem Entwicklungsteam ein effizientes und reibungsloses Arbeiten am Projekt.
                        Der integrierte Apache-Webserver simuliert dabei die Funktionalität eines echten Servers auf dem lokalen Computer. 
                        So kann die Webseite lokal entwickelt und getestet werden, was schnelle Iterationen und Anpassungen während der Entwicklungsphase ermöglicht.
                    </p><br /><p>
                        PHP wird als Programmiersprache für das Backend verwendet, da sie sich ideal für die Formularverarbeitung und Datenbankinteraktionen eignet. 
                        Durch PHP lassen sich Daten zuverlässig speichern, abrufen und verarbeiten eine zentrale Voraussetzung für die Kernfunktionen der Webseite.
                    </p><br /><p>
                        MariaDB wird als relationales Datenbankmanagementsystem eingesetzt, um alle relevanten Daten, wie Nutzer und Tierdaten, strukturiert zu speichern.
                        MariaDB bietet dabei hohe Leistungsfähigkeit und Zuverlässigkeit, was für die konsistente Datenverwaltung der Anwendung entscheidend ist.
                    </p><br /><p>
                        JavaScript wird für die Gestaltung der interaktiven Benutzeroberfläche genutzt. Durch JavaScript können dynamische Inhalte umgesetzt werden, die auf Nutzereingaben reagieren. 
                        Funktionen wie Filteroptionen, „Weiterlesen“ Buttons und asynchrone Datenanfragen tragen wesentlich zu einem reibungslosen und intuitiven Nutzererlebnis bei.
                    </p><br /><p>
                        Für die Programmierung und Verwaltung des Codes wurde die Entwicklungsumgebung PHP Storm gewählt. Mit Funktionen wie integrierter Syntaxprüfung und Debugging Tools unterstützt PHP Storm eine effiziente und strukturierte Umsetzung der Webseite.
                        Diese Tools erleichtern das schnelle Erkennen und Beheben von Fehlern und sorgen für eine optimierte, fehlerfreie Entwicklung.
                    </p><br /><p>
                        Die Architektur der Anwendung basiert auf dem klassischen Client Server Modell. In diesem Modell sendet der Client (Webbrowser) Anfragen an den Server (XAMPP mit PHP und MariaDB) und empfängt die entsprechenden Antworten.
                        Die klare Trennung von Frontend und Backend sorgt für eine übersichtliche Struktur des Codes und vereinfacht die Wartung und Erweiterung der Anwendung.
                    </p><br /><p>
                        Zusammenfassend ermöglicht die gewählte Kombination von Technologien und die Architekturwahl eine moderne, interaktive und benutzerfreundliche Webseite, die den Anforderungen der Nutzer entspricht und eine effiziente Entwicklungsumgebung für das Team schafft.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>


                <div class="section">
                    <h3 id="zeitplanMeilensteine">2.2 Zeitplan und Meilensteine</h3>
                    <hr class="underHeadline" />
                    <p>
                        In der nachfolgenden Tabelle ist ein grober Zeitplan für den zweiten Teil des Projektes hinterlegt.
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
                                <td>Backend-Entwicklung</td>
                                <td class="time redColor"> h </td>
                            </tr><tr>
                                <td>Implementierung interaktive Features</td>
                                <td class="time greenColor"> h </td>
                            </tr><tr>
                                <td>Dokumentation</td>
                                <td class="time redColor"> h </td>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Gesamt</td>
                                <td class="time greenColor"> h </td>
                        </tfoot>
                    </table>
                    <div class="caption">Tabelle 1</div>

                    <p>
                        Der Zeitplan für das Projekt ist in die Bereiche der Backend Entwicklung, der Implementierung interaktiver Features und der Ausarbeitung der Dokumentation unterteilt.
                    </p><br />
                        Die Backend Entwicklung beginnt mit dem Kick-Off am 21.10.2024 und soll bis zum 05.01.2025 Abgeschlossen und Implementiert werden.
                        Die Entwicklung wird durch abschließende Nutzertests beendet.
                    </p><p>
                        Durch wöchentliche Konsultationen werden die Fortschritte der jeweiligen Bearbeiter präsentiert, reflektiert und analysiert.
                    </p><br /><p>
                        Die Dokumentation läuft dabei parallel zum Projekt. Eine abschließende Präsentation rundet das ganze Projekt ab.
                    </p><p>
                        Wichtige Meilensteine sind unter anderem die Einbindung des Backends, der Abschluss des Nutzertests und die finale Projektabgabe am 19.01.2025, genauere Informationen können ebenfalls folgender Abbildung entnommen werden.
                    </p><br/>

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
                        Die Aufgabenaufteilungen sind nach gemeinschaftlicher, interner Abstimmung getroffen wurden.
                    </p><br />
                        Regelmäßige Team Meetings und Status-Updates stellen sicher, dass alle Teammitglieder stets auf dem neuesten Stand sind und effizient zusammenarbeiten.
                    </p><p>
                        Webgestütze Tools wie "Jira Software" und "Whats App" haben dazu beigetragen eine klare Übersicht und eine direkte Kommunikation zu gewährleisten.
                        Nachfolgend, ein Ausschnitt unserer Aufgaben in Jira (Stand: 50% der Projekt Entwicklung):
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentationDWP/Jira Auszug.png" title="Jira Auszug Projekt: Tierheimat" alt="Jira Auszug Projekt: Tierheimat" draggable="false">
                    </div><div class="caption">Abbildung 06</div>
                    <br />
                    <p>
                        Die genaue Aufgabenteilung lässt sich der folgenden Tabelle entnehmen. In der letzten Zeile der Tabelle sind die Aufgaben verzeichnet, die von allen Projektmitgliedern vorgenommen wurden.
                    </p><br />
                    <table>
                        <thead>
                            <tr class="headlineTable">
                                <th>Lucas-Manfred Herpe</th>
                                <th>Stephanie Wachs</th>
                                <th>Josephina Burger</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> •SQL-Befehle zur Erstellung der Tabellen <br />
                                    •Entwicklung der Datenbankstruktur und der Grundstruktur "databaseInit" <br />
                                    •Weiterentwicklung der Dokumentation <br />
                                    •Implementierung der dynamischen Features auf der "aktuelles" Seite <br/>
                                    •Erarbeitung der Projektpräsentation
                                </td>
                                <td> •Entwicklung des Routings, Formular "Helfen", dynamisches Laden der Seite "unsere Tiere" (Laden der Tiere aus DB" <br />
                                    •Entwicklung des Menüs und Footers für alle Seiten <br />
                                    •Implementierung dynamischer Inhalte wie Filter bei unserer Tiere uvw. <br />
                                    •Erarbeitung der Controller Klassen <br/>
                                    •Einbindung der "Gefällt mir Funktion" <br/>
                                    •Dynamische Weiterlesen Funktion bei "unsere Tiere" <br/>
                                    •Implementierung der "Fehlerbehandlung 404" Unterseite <br/>
                                    •Validierung der Eingabefelder <br/>
                                    •Komplettierung und Funktionsanalyse der databaeInit Datei
                                </td>
                                <td> •Beginn der Dokumentation <br />
                                    •Umsetung der MVC-Ordnerstruktur <br />
                                    Für "LoginRegistrationForm" & "MissingFoundForm"<br/>
                                    •Formular Validierung mit Java Script <br />
                                    •Backend Verarbeitung der Daten und Implementierung der Daten aus DB <br/>
                                    •Einbindung von Sessions, damit der Nutzer eingeloggt bleibt <br />
                                    Für "MissingFoundAnimals" <br/>
                                    •Implementierung des dynamischen Ladens sowie das Bearbeiten und Löschen
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    •Entwurf des E-R-Modells <br />
                                    •Einhaltung des Clean Codes<br/>
                                    •Korrekturlesen der Dokumentation <br />
                                    •Projekt auf redundante Daten prüfen<br/>
                                    •persönliche Meetings und Unterstützung bei Komplikationen <br/>
                                    •Nutzung der Tools Jira, Whats-App zur Kommunikation und Organisation <br />
                                    •Recherche und Erarbeitung von Informationen bei Komplikationen während der Programmierung<br/>
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
                    <h3 id="funktionalität">2.4 Übersicht der Funktionalitäten und Seitenstruktur</h3>
                    <hr class="underHeadline" />
                    <br/><p>
                        Im folgenden Abschnitt wird die Funktionalität und Struktur der Webseite "Tierheimat" im Detail beschrieben.
                        Die Plattform wurde entwickelt um, um Tierfreunden und potentiellen Adoptanten eine benutzerfreundliche und interkative Umgebung zu bieten.
                        </p>
                    <p>
                        Das Herzstück der Webseite bildet ein klar strukturiertes Desing mit dynamischen Inhalten, das sowohl Informationsseiten als auch interkative Features umfasst.
                        Besonderes Augenmerk wurde au die Navigation, die Benutzerfreundlichkeit und dynamische Inhalte gelegt.
                    </p><br/>
                    <p>
                        Die verschiedenen Seiten des Projekts decken zentrale Anforderungen ab:
                    </p><br/>
                    <p>
                        • Tierverwaltung: Präsentation von Tieren, inklusive Filter und Suchfunktionen
                    </p><p>
                        • Aktuelles und Neuigkeiten: Artikel zu Ereignissen und Entwicklungen im Tierheim oder Spendenmöglichkeiten
                    </p><p>
                        • Hilfe und Unterstützung: Formulare zur Registrierung für freiwillige Tätigkeiten oder Spendenmöglichkeiten
                    </p><p>
                        • Vermisste und gefundene Tiere: Verwaltung von Meldungen über verschwundene oder gefundene Tiere
                    </p><p>
                        • Benutzerverwaltung: Registrierung, Login und rollenbasierte Zugriffskontrolle für Administrator und Nutzer
                    </p><br/>
                    <p>
                        Zielsetzung der Funktionalitäten:
                    </p><br/><p>
                        • Effizienz: Einfache Bedienung durch intuitive Formulare und Filteroptionen
                    </p><p>
                        • Transparenz: Übersichtliche Präsentation von Inhalten, z.B. Tierprofile oder Artikel
                    </p><p>
                        • Interaktivität: Dynamische Datenverarbeitung und Live Updates auf verschiedenen Seiten
                    </p><p>
                        • Zugriffsmanagement: Steuerung der Berechtigung je nach Nutzerrolle ( z.B. Administator oder Besucher)
                    </p><br/>
                    <p>
                        Die Nachfolgenden Abschnitte geben eine detaillierten Überblick über die einzelnen Seiten der Webseite, deren Funktionen sowie wichtige Einblicke, die diese Funktionalitäten untersützen.
                    </p><p>
                        Jede Seite wird anhand von Screenshots und einer Funktionsbeschreibung vorgestellt.
                    </p><br/><br/>
                    <p>
                        <b>1. Startseite</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/Startseite.png" title="Startseite" alt="Startseite" draggable="false">
                    <div class="caption">Abbildung : Startseite</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/TeamUndAnlage.png" title="Team und Anlage" alt="Team und Anlage" draggable="false">
                    <div class="caption">Abbildung : Team und Anlage</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/StartAktuelles.png" title="Startseite Aktuelles" alt="Startseite Aktuelles" draggable="false">
                    <div class="caption">Abbildung : Startseite Aktuelles</div>
                    <br/><p>
                        • Zeigt eine Übersicht der Tiere und das Team des Tierheims, gibt einen ersten Eindruck auf den User
                    </p><p>
                        • Informiert über die Anlage und aktuelle Neuigkeiten
                    </p><p>
                        • Enthält Buttons zum Anzeigen weiterer Tiere und Artikel
                    </p><br/>
                    <p>
                        <b>2. Unsere Tiere</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/UnsereTiereOverview.png" title="Unsere Tiere" alt="Unsere Tiere" draggable="false">
                    <div class="caption">Abbildung : Unsere Tiere</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/UnsereTiereOverviewUnsereHunde.png" title="Unsere Hunde" alt="Unsere Hunde" draggable="false">
                    <div class="caption">Abbildung : Unsere Hunde</div><p>
                        • Filterbare Übersicht aller Tiere im Tierheim
                    </p><p>
                        • Dynamisches Nachladen von Tierdaten basierend auf Auswahlkriterien (Tierart, Rasse, Geschlecht)
                    </p><br/>
                    <p>
                        <b>3. Aktuelles</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/Aktuelles1.png" title="Aktuelles" alt="Aktuelles" draggable="false">
                    <div class="caption">Abbildung : Aktuelles</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/Aktuelles2.png" title="Aktuelles" alt="Aktuelles" draggable="false">
                    <div class="caption">Abbildung : Aktuelles</div>
                    <br/><p>
                        • Zeigt Neuigkeiten aus dem Tierheim
                    </p><p>
                        • Listet Artikel mit Bildern, Überschriften und Kurzbescheibung auf
                    </p><p>
                        • Enthält Buttons welche auf detaillierte Artikelunterseiten weiterleiten
                    </p><br/>
                    <p>
                        <b>4. Vermisst/Gefunden</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/.png" title="Vermisste Tiere" alt="Vermisste Tiere" draggable="false">
                    <div class="caption">Abbildung : Vermisste Tiere</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/.png" title="" alt="" draggable="false">
                    <div class="caption">Abbildung : </div>
                    <br/><p>
                        • Zeigt vermisste und gefundene Tiere mit Informationen zu Fundort und Datum
                    </p><p>
                        • Enthält Buttons zur Kontaktaufnahme per E-Mail und zum Login
                    </p><p>
                        • Implementierte Weiterlesen Buttons ermöglichen eine detaillierte Anzeige der Tiere
                    </p><br/>
                    <p>
                        <b>5. Service/Infos</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/ServiceInfos.png" title="Service Infos" alt="Service Infos" draggable="false">
                    <div class="caption">Abbildung : Service Infos</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/ServiceInfos1.png" title="Service Infos" alt="Service Infos" draggable="false">
                    <div class="caption">Abbildung : Service Infos</div>
                    <br/><img src="../public/imgDokumentationDWP/ServiceInfos2.png" title="Service Infos" alt="Service Infos" draggable="false">
                    <div class="caption">Abbildung : Service Infos</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/ServiceInfos3.png" title="Service Infos" alt="Service Infos" draggable="false">
                    <div class="caption">Abbildung : Service Infos</div>
                    <br/><p>
                        • Formulare zur Angabe von Unterstützunsarten und Verfügbarkeit mit Adaptionsmöglichkeiten
                    </p><p>
                        • Informationen zu Spendenmöglichkeiten und Kontaktoptionen
                    </p><p>
                        • Übersicht zu allgemeinen Informationen wie Vermittlungsablauf, die Tierpension, Auflagen und Regularien
                    </p><br/>
                    <p>
                        <b>6. Login</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/LoginFormular.png" title="Login" alt="Login" draggable="false">
                    <div class="caption">Abbildung : Login</div>
                    <br/><p>
                        • Bietet Login und Registrieungsformulare für Nutzer
                    </p><p>
                        • Enthält Validierungen und Fehleranzeigen
                    </p><br/>
                    <p>
                        <b>7. Impressum</b>
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/Impressum.png" title="Impressum" alt="Impressum" draggable="false">
                    <div class="caption">Abbildung : Impressum</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/Impressum1.png" title="Impressum" alt="Impressum" draggable="false">
                    <div class="caption">Abbildung : Impressum</div>
                    <br/><p>
                        • Rechtliche Informationen über das Proekt, Team und Datenschutz
                    </p><p>
                        • Links zu den Dokumentationen und Bildnachweisen
                    </p><br/>

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
                    Nutzerprofilen und interaktiven Formularen, wie die Formulare zum Melden vermisster oder gefundener Tiere oder das Formular zum Anbieten von Hilfe, unterstützt.
                </p><br /><p>
                    Eine zentrale Herausforderung im Entwurfsprozess bestand darin, Redundanzen zu vermeiden und gleichzeitig alle Anforderungen bestmöglich zu erfüllen. Besonders bei der Tabelle „Helfen“ standen wir vor einer Abwägung: Es war unklar, 
                    ob separate Tabellen für „Wochentage“ und „Datum“ erforderlich wären, um zwischen regelmäßigem und einmaligem Hilfsangebot zu unterscheiden. 
                    Der Wochentag im Hilfsformular steht für ein wiederkehrendes Angebot (z. B. „jeden Montag“), während das Datum ein einmaliges Angebot darstellt.
                </p><br /><p>
                    Nach reiflicher Überlegung entschieden wir uns, beide Angaben in einer einzigen Tabelle abzubilden, sodass jeder Wochentag oder jedes Datum ein eigenständiges Tupel darstellt. 
                    Die Herausforderung in der Umsetzung besteht nun darin sicherzustellen, dass entweder ein Datum oder ein Wochentag im Tupel angegeben ist, jedoch niemals beides.
                </p><br /><p>  
                    Das finale ER-Modell dient als Grundlage für die Implementierung der Datenbank und bildet alle notwendigen Datenbeziehungen ab, sodass eine konsistente und effiziente Datenstruktur für die Webseite gewährleistet ist.
                </p><p>
                    Im darauffolgenden Schritt wurden die entsprechenden SQL Befehle erstellt.
                </p><br /><p>
                    Die folgenden Abbildungen zeigt den finalen Entwurf des Entity-Realtionship-Modells sowie das dazugehörige Relationale Schema.
                </p><br />

                <img src="../public/imgDokumentationDWP/E-R-Modell_cleaned.png" title="ER-Modell" alt="ER-Modell" draggable="false"> <!-- Hover Effekt kann ich hier nicht implementieren da es auf den container beschränkt wäre und das ild füllt diesen bereits aus -->
                <div class="caption">Abbildung 07: Entity-Relationship-Modell</div>
                <br/>
                <img src="../public/imgDokumentationDWP/RelationalesSchema.png" title="Relationales Schema" alt="Relationales Schema" draggable="false">
                <div class="caption">Abbildung 08: Relationales Schema</div>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>
            </div>

            <div class="section">
                <h3 id="datenbankAnbindung">3.2 Datenbank-Setup und Anbindung</h3>
                <hr class="underHeadline" />
                <p>
                    Für die Verwaltung der Datenbank wird eine relationale MySQL Datenbank verwendet. Die Struktur der Datenbank wurde in einem
                    E-R-Diagramm modelliert, welches die Beziehungen zwischen Tabellen wie Tiere, Nutzer, Artikel und deren Eigenschaften beschreibt.
                </p>
                <p>
                    Die Datenbank wird mithilfe der bereitgestellten SQL Skripte im Ordner "database" erstellt.<br/>
                    Die Datei tierheimat.sql enthält die vollständige Struktur der Tabellen sowie Test und Beispielsdaten.<br/>
                    Alternativ kann das Skript "databaseInit.php" verwendet werden, um die Datenbank programmgesteuert zu initialisieren.
                </p>
                <p>
                    Die Anbindung erfolgt über die Klasse "Connection" im Verzeichnis "core".<br/>
                    Diese Klasse implementiert ein Singleton-Pattern, um eine einzige, wiederverwendbare Verbindung zur Datenbank zu gewährleisten.<br/>
                    Die Verbindungseinstellungen sind standardmäßig auf den lokalen MySQL Server (localhost) mit dem Benutzer "root" und einem leeren Passwort konfiguriert.<br/>
                    Der Name der Datenbank lautet "tierheimat".
                </p>
                <p>
                    Falls ein Verbindungsfehler auftritt, wird eine Exception geworfen, um den Fehler zu melden.
                </p>
                <!--<img src="../public/imgDokumentationDWP/HerstellungDerVerbindung.png" title="Datenbank Anbindung" alt="Code: Herstellung der Datenbankverbindung" draggable="false">
                <div class="caption">Abbildung ...: Herstellung der Datenbankverbindung</div>-->
                <br/>
                <img src="../public/imgDokumentationDWP/ProtectedFunction.png" title="Datenbank Anbindung" alt="Code: Herstellung der Datenbankverbindung" draggable="false">
                <div class="caption">Abbildung 09: Herstellung der Datenbankverbindung</div>

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
                </p>
                <p>
                    Die Verbindung zur Datenbank erfolgt über die Klasse "Connection" im Verzeichnis "core". Diese Klasse stellt die Verbindung zur MySQL Datenbank her und ermöglicht sichere und effiziente Datenabfragen.
                </p><br/>
                <img src="../public/imgDokumentationDWP/MVC.png" title="Model View Controller" alt="Übersicht der MVC Struktur" draggable="false"> <!--class="centered-image"-->
                <div class="caption">Abbildung 10: Übersicht der MVC Struktur</div>
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
                    Die Anwendung bietet eine Vielzahl interaktiver Features, die die Benutzerfreundlichkeit erhöhen und dynamische Funktionen bereitstellen. Diese wurden durch JavaScript und PHP umgesetzt.
                </p>
                <p>
                    Dynamische Inhalte werden beispielsweise auf der Startseite und im Bereich "Aktuelles" geladen. Hierfür sorgen Skripte wie aktuelles.js und loadHome.js, die Inhalte nachladen und aktualisieren.
                    <br /> Dies geschieht mittels AJAX, vorteile von AJAX sind unter anderem schnellere Ladezeiten, da nur die benötigten Dateien geladen werden und nicht die gesamte Seite, bessere Benutzererfahrung da Daten im Hintergrund geladen werden und der Nutzer noch weiterhin mit der Seite interagieren kann.
                </p>
                <p>
                    Filter und Suchfunktionen ermöglichen es den Nutzern, Tiere basierend auf spezifischen Kriterien wie Art, Rasse oder Status (vermisst/gefunden) zu filtern.
                </p>
                <p>
                    Zusätzlich können Nutzer Tiere als Favoriten markieren, indem sie auf ein Herz Symbol klicken. Diese Favoritenfunktion ermöglicht eine personalisierte Nutzung und könnte in der Datenbank gespeichert werden, um später darauf zugreifen zu können (aktuell nicht implementiert, die Daten werden in Cookies gespeichert).
                </p>
                <p>
                    Formulare zur Registrierung, Anmeldung und zum Melden vermisster Tiere beinhalten Validierungen und dynamische Eingabefelder. Diese Funktionalitäten werden durch Skripte wie loginRegisterForm.js und missingFoundForm.js umgesetzt.
                </p>
                <p>
                    Für eine moderne und intuitive Benutzeroberfläche wurden Icons und Symbole aus der FontAwesome Bibliothek integriert. Zusätzlich sorgen responsive Navigationselemente für eine optimale Darstellung auf verschiedenen Geräten.
                </p>
                <p>
                    Alle Skripte befinden sich im Verzeichnis "public/js" und sind modular aufgebaut, um eine einfache Erweiterbarkeit und Wartung zu gewährleisten.
                </p><br/>
                <img src="../public/imgDokumentationDWP/Favoritenfunktion.png" title="" alt="Code: Favoritenfunktion" draggable="false">
                <div class="caption">Abbildung 11: Umsetzung der Favoritenfunktion</div>
                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>



                <div class="section">
                    <h3 id="benutzerinteraktion">4.1 Benutzerinteraktion</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Anwendung bietet eine Vielzahl von Benutzerinteraktionen, die eine dynamische und personalisierte Nutzung ermöglichen.
                    </p>                    <p>
                        Nutzer können Tiere in einer Liste durch Filter und Suchfunktionen gezielt finden. Hierbei werden Kriterien wie Tierart, Rasse und Status (vermisst oder gefunden) verwendet, um die Ergebnisse anzupassen.
                    </p>                    <p>
                        Eine Favoritenfunktion ermöglicht es den Nutzern, Tiere durch Klicken auf ein Herz Symbol als Favoriten zu markieren.
                    </p>                    <p>
                        Formulare zur Registrierung, Anmeldung und Meldung vermisster Tiere bieten interaktive Validierungen. Nutzereingaben werden in Echtzeit geprüft, um Fehler zu vermeiden und die Benutzerfreundlichkeit zu verbessern.
                    </p>                    <p>
                        Inhalte auf der Startseite werden dynamisch geladen, sodass Nutzer stets aktuelle Informationen erhalten, ohne die Seite neu laden zu müssen.
                    </p>                    <p>
                        Die Benutzeroberfläche wurde für unterschiedliche Bildschirmgrößen optimiert und passt sich dynamisch an. Dies sorgt für eine reibungslose Bedienung.
                    </p>                    <p>
                        Es wurde auf eine Logik und Unterteilung der Interaktiven Features geachtet, um diese klar zu trennen wurden ebenfalls Nutzerrollen eingefügt, auf diese möchten wir nun näher eingehen.
                    </p><br/>
                    <h3> Einführung </h3>
                    <p><br/>
                        Das Rollenmodell in der Anwendung Tierheimat dient dazu, unterschiedliche Berechtigungsstufen für Nutzer festzulegen. Dadurch wird sichergestellt, dass bestimmte Aktionen nur von autorisierten Personen durchgeführt werden können.
                    </p>                    <p>
                        Dies ist besonders wichtig, um sensible Daten zu schützen und die Integrität der Ihnalte zu gewährleisten.
                    </p><p><br/>
                        Die Nutzerverwaltung basiert auf drei Hauptrollen:
                    </p><p>
                        • Administrator - hat alle Rechte, einschließlich Bearbeiten und Löschen <br/>
                        • Nutzer        - kann Inhalte erstellen, eigene Bearbeiten und Löschen <br/>
                        • Gast          - kann Inhalte nur Lesen aber keine Änderungen vornehmen
                    </p><br/>
                    <p>
                        Die Anmeldung erfolgt über folgende Oberfläche.
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/LoginFormular.png" title="" alt="Login Oberfläche" draggable="false">
                    <div class="caption">Abbildung : Login Oberfläche</div>
                    <p><br/>
                        In der Nachfolgenden Abbildung kann ein Auszug der Webseite aus Sicht des Gastes nachempfunden werden.
                    </p><p>
                        Eine präzise und gut aufbereitete Darstellung der Informationen macht leicht erkenntlich, dass es verschiedene Nutzerrollen und Berechtigungsumpfänge gibt.
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/BeforeRegistration.png" title="" alt="Gast Nutzerrollen" draggable="false">
                    <div class="caption">Abbildung : Gast Nutzerrollen</div>
                    <br/>
                    <h3> Umsetzung in der Datenbank</h3>
                    <p><br/>
                        Die Rollen und deren Berechtigung werden innerhalb der Tabelle "Nutzerrollen" definiert.
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/CreateNutzerrollen.png" title="" alt="DB Create Nutzerrollen" draggable="false">
                    <div class="caption">Abbildung : DB Create Nutzerrollen</div>
                    <br/>
                    <p>
                        • Rolle:                            Der Name der Rolle (Administator, Nutzer, Gast)<br/>
                        • kannLesen:                        Gibt an, ob der Nutzer Inhalte lesen darf <br/>
                        • kannSchreiben:                    Gibt an, ob der Nutzer neue Inhalte erstellen darf <br/>
                        • kannEigenesBearbeitenUndLoeschen: Bestimmt, ob der Nutzer seine eigenen Inhalte bearbeiten und löschen darf <br/>
                        • kannAllesLoeschen:                Legt fest, ob der Nutzer Inhalte anderer löschen darf <br/>
                    </p><br/><p>
                        Ein beispielhafter Insert kann den folgenden Abbildung entnommen werden.
                    </p><br/>
                    <img src="../public/imgDokumentationDWP/InsertNutzerrollen.png" title="" alt="DB Insert Nutzerrollen" draggable="false">
                    <div class="caption">Abbildung : DB Insert Nutzerrollen</div>
                    <br/>
                    <img src="../public/imgDokumentationDWP/Bsp.Nutzerrollen.png" title="" alt="Bsp. Nutzerrollen" draggable="false">
                    <div class="caption">Abbildung : Bsp. Nutzerrollen</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                
                <div class="section">
                    <h3 id="formulare">4.2 Dynamische Formulare und Eingabevalidierung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Anwendung bietet dynamische Formulare, die eine benutzerfreundliche Eingabe und Validierung in Echtzeit ermöglichen. Mithilfe von JavaScript werden Eingaben direkt beim Ausfüllen geprüft, um fehlerhafte oder unvollständige Daten zu vermeiden.
                    </p>
                    <p>
                        Formulare für die Registrierung, Anmeldung und das Melden von vermissten Tieren bieten folgende Funktionen:
                    </p>
                    <ul>
                        <li>Echtzeit Validierungen von E-Mail-Adressen und Passwörtern während der Eingabe.</li> <!-- public/js/loginRegisterForm.js -->
                        <li>Fehlermeldungen bei ungültigen Eingaben oder fehlenden Pflichtfeldern.</li> <!-- public/js/loginRegisterForm.js -->
                        <li>Validierung von Bild Uploads im Formular für vermisste Tiere, um Dateitypen zu überprüfen.</li> <!-- public/js/missingFoundForm.js -->
                    </ul>
                    <p>
                        Die Formulare zur Anmeldung und Registrierung verwenden JavaScript und AJAX, um Daten zu senden und eine sofortige Rückmeldung zu erhalten. Dies verbessert die Benutzererfahrung und vermeidet unnötige Seitenreloads.
                    </p>
                    <p>
                        Diese Funktionen stellen sicher, dass die Formulare sowohl benutzerfreundlich als auch effizient sind und tragen zur Verbesserung der Datenqualität bei.
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
                    Die Anwendung wurde umfassend getestet, um Funktionalität, Benutzerfreundlichkeit und Leistung sicherzustellen. Dabei kamen manuelle Testverfahren zum Einsatz.
                </p><br/>
                <p>
                    <b>Funktionale Tests:</b><br>
                    Alle Hauptfunktionen wie Registrierung, Anmeldung, Filter und Suchfunktionen sowie das Melden vermisster Tiere und der Bild Upload wurden getestet, um sicherzustellen, dass sie den Anforderungen entsprechen und fehlerfrei arbeiten. <!-- enthalten in  loginRegisterForm.js, missingFoundForm.js, loadHome.js, Bild Upload noch in missingFoundForm.js von Phina enthalten -->
                </p><br/>
                <p>
                    <b>Validierung Tests:</b><br>
                    Formulare wurden auf korrekte Eingabevalidierung überprüft, insbesondere die Echtzeitprüfungen. Fehlerhafte Eingaben wurden erfolgreich erkannt und dem Benutzer gemeldet.
                </p>
                <p><br/>
                    <b>Performance Tests:</b><br>
                    Die Ladezeiten der dynamischen Inhalte wurden getestet, um sicherzustellen, dass die Daten schnell geladen und angezeigt werden. Hierbei wurde insbesondere die AJAX Funktionalität optimiert.
                </p>
                <p><br/>
                    <b>Sicherheitsüberprüfungen:</b><br>
                    Es wurden Tests zur SQL Injection Prävention und zur sicheren Speicherung von Passwörtern durchgeführt.  <!-- ist in Connection.php enthalten, wurde mit den prepare statement umgesetzt -->
                </p>
                <p><br/>
                    <b>Optimierungen:</b><br>
                    Basierend auf den Testergebnissen wurden Optimierungen an der Performance, den Validierungen und der Fehlerbehandlung vorgenommen, um klare Rückmeldungen zu bieten.
                </p><br/>
                <img src="../public/imgDokumentationDWP/Front-Backend.png" title="" alt="Front-Backend" draggable="false">
                <div class="caption">Abbildung 12: Frontend vs Backend</div>

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
                        <b>Responsives Design:</b><br>
                        Die Anwendung wurde auf unterschiedlichen Bildschirmauflösungen getestet. Das Layout passt sich flexibel an, um eine optimale Darstellung zu gewährleisten.
                    </p>
                    <p><br/>
                        <b>Interaktive Elemente:</b><br>
                        Dynamische Inhalte, Filterfunktionen und Formulare wurden getestet, um sicherzustellen, dass die AJAX und Validierungsfunktionen korrekt arbeiten. Dies umfasst das Laden von Inhalten ohne Seitenreload sowie die Echtzeitprüfung von Eingaben.
                    </p>
                    <p><br/>
                        <b>Formularvalidierungen:</b><br>
                        Die Formularvalidierungen für E-Mail Adressen, Passwörter und Bild Uploads wurden getestet. Fehlerhafte Eingaben wurden erkannt und den Nutzern entsprechende Hinweise angezeigt.
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
                        Im Rahmen der Backend Tests wurden die Datenbankanbindung und Sicherheitsaspekte überprüft. Dabei lag der Fokus auf den implementierten Funktionen und deren Stabilität.
                    </p><br/>
                    <p>
                        <b>Datenbankoperationen:</b><br>
                        Es wurden Tests zu CRUD-Operationen (create, read, update, delete) durchgeführt.
                    </p><br/>
                    <p>
                        <b>Sicherheitsüberprüfungen:</b><br>
                        SQL Injection Schutz wurde durch Prepared Statements in der Datei <code>Connection.php</code> getestet und als sicher befunden. <!-- haben wir passwort hashing? -->
                    </p><br/>
                    <p>
                        <b>Optimierungen:</b><br>
                        Aktuell wurden keine spezifischen Performance Optimierungen implementiert und konnten daher nicht getestet werden.
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
                </div><div class="caption">Abbildung 13: Prozess Dokumentation</div>

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
                                <td>Planungs- und Entwurfsphase</td>
                                <td class="time"> h </td>
                                <td class="time greenColor">h</td>
                            </tr>
                            <tr>
                                <td>Implementierungsphase</td>
                                <td class="time"> h </td>
                                <td class="time redColor">h</td>
                            </tr>
                            <tr>
                                <td>Dokumentationsphase</td>
                                <td class="time"> h </td>
                                <td class="time greenColor">h</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Gesamt</td>
                                <td class="time"> h </td>
                                <td class="time redColor">h</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="caption">Tabelle 3</div>

                    <p>
                        Insgesamt wurden für das Projekt ... Stunden aufgewendet, während ursprünglich ... Stunden geplant waren. 
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="lessonsLearned">7.2 Lessons Learned</h3>
                    <hr class="underHeadline" />
                    <ol
                        <li class="list-item">
                            <strong>Bedeutung einer klaren Projektplanung:</strong>
                            <p>Wir haben gelernt, dass eine sorgfältige und detaillierte Planung der Schlüssel zum Erfolg eines Projektes ist.</p>
                            <p>Die Erstellung eines klaren Projektplans, einschließlich Meilensteine und Zeitpläne, hat uns geholfen den Überblick zu behalten und sicherzustellen, dass alle Teammitglieder auf dem gleichen Stand sind.</p>
                        </li><br/>
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
                            <p>Eine getaktete Arbeitsweise sowie Fristen haben das Arbeiten produktiver allerdings auch Fehleranfälliger gestaltet, diese Fristen haben uns dabei geholfen stets eine Orientierung über das Projekt und den aktuellen Standpunkt zu haben</p>
                        </li>
                    </ol>


                    <br />
                    <p>
                        Insgesamt stellte das Projekt "Tierheimat" eine äußerst wertvolle und bereichernde Lernerfahrung dar. Es bot uns die Möglichkeit, sowohl unser theoretische Wissen als auch unsere praktischen Fähigkeiten erheblich zu erweitern und zu vertiefen. </p>
                    <p>
                        Dabei konnten wir nicht nur unser technisches Know-how im Bereich der Webentwicklung, Datenbankanbindung und interaktiven Features ausbauen, sondern auch wichtige Erkenntnisse im Hinblick auf Teamarbeit, Organisation und Projektmanagement gewinnen.</p>
                    <P>
                        Insbesondere die Zusammenarbeit im Team förderte unsere Kommunikationsfähigkeiten und verdeutlichte, wie essenziell klare Absprachen, regelmäßige Abstimmungen und die flexible Anpassung an neue Herausforderungen für den Projekterfolg sind.</P>
                    <p>
                        Abschließend lässt sich festhalten, dass das Projekt nicht nur ein wichtiger Meilenstein in unserer akademischen Laufbahn war, sondern auch einen nachhaltigen Einfluss auf unsere persönliche und berufliche Entwicklung hatte.</p>
                    <br/>
                    <img src="../public/imgDokumentationDWP/LessonsLearned.jpg" title="" alt="Lessons Learned" draggable="false">
                    <div class="caption">Abbildung 14: Visualisierung Lessons Learned</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>







                <div class="section">
                    <h3 id="lessonsLearned">7.2 Lessons Learned</h3>
                    <hr class="underHeadline" />
                    <ol>
                        <li class="list-item">
                            <strong>Effektive Kommunikation:</strong>
                            <br/><br/>
                            <p>Erkenntnis: Regelmäßige Meetings und klare Kommunikationswege (z.B. über Tools wie Jira und WhatsApp) haben dazu beigetragen, Missverständnisse zu vermeiden und die Zusammenarbeit zu erleichtern.</p><br/>
                            <p>Lernpunkt: Zukünftig sollten feste Meeting Strukturen und Protokolle eingeführt werden, um Diskussionen effizienter zu gestalten und Aufgaben klar zu dokumentieren.</p>
                        </li><br/>
                        <li class="list-item">
                            <strong>Aufgabenverteilung:</strong>
                            <br/><br/>
                            <p>Erkenntnis: Eine klare Zuweisung von Verantwortlichkeiten hat geholfen, Engpässe zu vermeiden und den Fortschritt transparent zu halten.</p><br/>
                            <p>Lernpunkt: Für kommende Projekte könnte eine noch detailliertere Aufgabenplanung mit Zwischenschritten sinnvoll sein, um Zeitpläne besser einzuhalten.</p>
                        </li><br/>
                        <li class="list-item">
                            <strong>Nutzung von Tools:</strong>
                            <br/><br/>
                            <p>Erkenntnis: Der Einsatz von Jira zur Aufgabenverwaltung war hilfreich, um den Überblick über den Projektfortschritt zu behalten.</p><br/>
                            <p>Lernpunkt: Zukünftig sollte eine Schulung zur optimalen Nutzung von Tools vor Projektstart eingeplant werden, um deren Funktionen besser auszuschöpfen.</p>
                        </li><br/>
                        <li class="list-item">
                            <strong>Zeitmanagement:</strong>
                            <br/><br/>
                            <p>Erkenntnis: Eng getaktete Fristen haben teilweise zu Zeitdruck geführt, was die Qualität beeinflussen könnte.</p><br/>
                            <p>Lernpunkt: Eine realistischere Zeitplanung mit Puffern für unerwartete Herausforderungen wäre für zukünftige Projekte empfehlenswert.</p>
                        </li><br/>
                        <li class="list-item">
                            <strong>Dokumentation und Nachverfolgung:</strong>
                            <br/><br/>
                            <p>Erkenntnis: Eine kontinuierliche Aktualisierung der Projektdokumentation war hilfreich, um den Überblick zu behalten.</p><br/>
                            <p>Lernpunkt: In zukünftigen Projekten könnte ein zentraler Dokumentenspeicher noch klarer organisiert werden, um Versionskonflikte zu vermeiden.</p>
                        </li><br/>
                        <li class="list-item">
                            <strong>Flexibilität und Anpassungsfähigkeit:</strong>
                            <br/><br/>
                            <p>Erkenntnis: Unvorhergesehene Probleme konnten durch kurzfristige Anpassungen im Ablauf bewältigt werden.</p><br/>
                            <p>Lernpunkt: Flexibilität sollte beibehalten, jedoch mit einem "Notfallplan" ergänzt werden, um kritische Probleme schneller zu lösen.</p>
                        </li>
                    </ol>

                    <br />
                    <p>
                        Insgesamt stellte das Projekt "Tierheimat" eine äußerst wertvolle und bereichernde Lernerfahrung dar. Es bot uns die Möglichkeit, sowohl unser theoretisches Wissen als auch unsere praktischen Fähigkeiten erheblich zu erweitern und zu vertiefen.
                    </p>
                    <p>
                        Dabei konnten wir nicht nur unser technisches Know-how im Bereich der Webentwicklung, Datenbankanbindung und interaktiven Features ausbauen, sondern auch wichtige Erkenntnisse im Hinblick auf Teamarbeit, Organisation und Projektmanagement gewinnen.
                    </p>
                    <p>
                        Insbesondere die Zusammenarbeit im Team förderte unsere Kommunikationsfähigkeiten und verdeutlichte, wie essenziell klare Absprachen, regelmäßige Abstimmungen und die flexible Anpassung an neue Herausforderungen für den Projekterfolg sind.
                    </p>
                    <p>
                        Abschließend lässt sich festhalten, dass das Projekt nicht nur ein wichtiger Meilenstein in unserer akademischen Laufbahn war, sondern auch einen nachhaltigen Einfluss auf unsere persönliche und berufliche Entwicklung hatte.
                    </p>
                    <br/>
                </div>
                <img src="../public/imgDokumentationDWP/LessonsLearned.jpg" title="" alt="Lessons Learned" draggable="false">
                <div class="caption">Abbildung 14: Visualisierung Lessons Learned</div>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
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
                    <ul>
                        <li>•Ein erweitertes Benutzerrollen und Berechtigungssystem, um unterschiedliche Zugriffsebenen für Administratoren, Mitarbeiter und Nutzer zu schaffen.</li>
                        <li>•Eine Nachrichten und Benachrichtigungsfunktion, die es Nutzern ermöglicht, direkt mit dem Tierheim zu kommunizieren.</li>
                        <li>•Erweiterte Filter und Suchfunktionen, um die Navigation und Auffindbarkeit von Tieren weiter zu verbessern.</li>
                        <li>•Ein Event und Terminverwaltungssystem, um Veranstaltungen und Adoptionstermine effizient zu organisieren.</li>
                        <li>•Die Integration eines Zahlungssystems für Spenden und Adoptionsgebühren.</li>
                        <li>•Ein verbessertes Berichtswesen zur Auswertung von Daten für das Tierheimmanagement, in Form von Statistiken u.v.m.</li>
                    </ul>
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
                        <td colspan="2">Planungs- und Entwurfsphase</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr>
                        <td>Ideenfindung</td>
                        <td class="time"> h</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Benutzeroberfläche entwerfen und abstimmen</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr>
                        <td>Recherche (Bildersuche, ...)</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr class="headlineTable">
                        <td colspan="2">Implementierungsphase</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr>
                        <td>Umsetzung des Mockups, auch im Responsive Design</td>
                        <td class="time"> h</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Umsetzung der Formulare (required, ...)</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr>
                        <td>Testen aller Eingaben und Ansichten</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr class="headlineTable">
                        <td colspan="2">Dokumentationsphase</td>
                        <td class="time"> h</td>
                    </tr>
                    <tr>
                        <td>Erstellen der Projektdokumentation</td>
                        <td class="time"> h</td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td>Prüfung der Projektdokumentation durch die anderen Projektmitglieder</td>
                        <td class="time"> h</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Gesamt</td>
                        <td class="time"> h</td>
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
                <li><a href="#quelleEinleitung" draggable="false">Quelle: 1 Einleitung</a></li>
                <li><a href="#quellePlanung" draggable="false">Quelle: 2 Konzeption und Planung</a></li>
                <li><a href="#quelleBackend" draggable="false">Quelle: 3 Backend-Entwicklung</a></li>
                <li><a href="#quelleInteraktiveFeatures" draggable="false">Quelle: 4. Interaktive Features</a></li>
                <li><a href="#quelleTests" draggable="false">Quelle: 5 Tests und Optimierung</a></li>
                <li><a href="#quelleDokumentation" draggable="false">Quelle: 6 Dokumentation</a></li>
                <li><a href="#quelleFazit" draggable="false">Quelle: Fazit und Ausblick</a></li>
                <li><a href="#quelleAnlagen" draggable="false">Quelle: Anlagen</a></li>
                <li>&nbsp;</li>
                <li><a href="#quelleWebsite" draggable="false">Bildquellen komplette Website</a></li>
            </ul>

            <div class="section">
                <p>
                    Im Quellverzeichnis können alle verwendeten Pfade der erhobenen Daten nach Über- und Unterpunkten sortiert nachvollzogen werden.
                </p><p>
                    Bilder welche nicht im Quellverzeichnis aufgelistet sind stammen aus privaten Quellen und werden nicht näher benannt.
                </p>
            </div>

            <div class="section">
                <h2 id="quelleDeckblatt">Quelle: Deckblatt</h2>
                <hr class="underHeadline" />

                <p>Logo FHE:</p>
                <a href="https://www.fh-erfurt.de/" draggable="false">https://www.fh-erfurt.de/</a>
            </div>

            <div class="section">
                <h2 id="quelleEinleitung">Quelle: 1 Einleitung</h2>
                <hr class="underHeadline" />
                <p>
                    Logo Tierheimat (Abbildung 01):
                </p>
                <p>
                    Erstellt durch Stephanie Wachs
                </p>
                <a href="https://www.bing.com/images/search?view=detailV2&ccid=ZPXi5DE9&id=ECCFF162B8DE1569D7E4534875D37EEFAC526A42&thid=OIP.ZPXi5DE9NMIBSTh26ixcTgHaCX&mediaurl=https%3a%2f%2fwww.zooplus.co.uk%2fbilder%2f1%2f2017_01_CharitySupport_1000x320_DE_1.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.64f5e2e4313d34c201493876ea2c5c4e%3frik%3dQmpSrO9%252b03VIUw%26pid%3dImgRaw%26r%3d0&exph=320&expw=1000&q=tierschutz&simid=608028981758609405&FORM=IRPRST&ck=3F72AE4447F2CCAD2C1123D0B146826D&selectedIndex=27&itb=0&ajaxhist=0&ajaxserp=0" draggable="false">https://www.bing.com/images/search?view=detailV2&ccid=ZPXi5DE9&id=ECCFF162B8DE1569D7E4534875D37EEFAC526A42&thid=OIP.ZPXi5DE9NMIBSTh26ixcTgHaCX&mediaurl=https%3a%2f%2fwww.zooplus.co.uk%2fbilder%2f1%2f2017_01_CharitySupport_1000x320_DE_1.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.64f5e2e4313d34c201493876ea2c5c4e%3frik%3dQmpSrO9%252b03VIUw%26pid%3dImgRaw%26r%3d0&exph=320&expw=1000&q=tierschutz&simid=608028981758609405&FORM=IRPRST&ck=3F72AE4447F2CCAD2C1123D0B146826D&selectedIndex=27&itb=0&ajaxhist=0&ajaxserp=0</a>
                <br/><br/>
                <p>
                    1.2 Projektrückblick
                </p><br/>
                <p>
                    Tabelle Zielgruppenanalyse (Abbildung 02):
                </p><p>Aufbau der Webseite (Abbildung 03):</p>
                <p>Auszug "Unsere Tiere" (Abbildung 04):</p>
                <p>Erstellt durch Josephina Burger
                </p>
            </div>

            <div class="section">
                <h2 id="quellePlanung">Quelle: 2 Konzeption und Planung</h2>
                <hr class="underHeadline" />
                <p>
                   2.2 Zeitplan und Meilensteine
                </p><br/>
                <p>
                    Zeitachse mit Meilensteine (Abbildung 05):
                </p>
                <p>
                    Erstellt durch Lucas-Manfred Herpe
                </p><br/>
                <p>
                    2.3 Geplante Aufgabenteilung
                </p><br/>
                <p>Jira Übersicht (Abbildung 06):</p>
                <P>Erstellt durch das Projektteam</P>
                <a href="https://tierheimat.atlassian.net/jira/software/projects/SCRUM/boards/1" draggable="false">https://tierheimat.atlassian.net/jira/software/projects/SCRUM/boards/1</a>
            </div>

            <div class="section">
                <h2 id="quelleBackend">Quelle: 3 Backend-Entwicklung</h2>
                <hr class="underHeadline" />
                <p>
                    3.1 Datenbankentwurf
                </p><br/>
                <p>Entity-Relationshop-Modell (Abbildung 07):</p>
                <p>Relationales Schema (Abbildung 08):</p>
                <p>
                    Erstellt durch das Projektteam
                </p>
                <p><br/>
                    3.2 Datenbank- Setup und Anbindung
                </p><br/>
                <p>
                    Herstellung der Datenbankverbindung (Abbildung 09):
                </p>
                <p>Erstellt durch das Projektteam</p>
                <p><br/>
                    3.3 PHP- Skripte und Logik
                </p><br/>
                <p>
                    Übersicht der MVC Struktur (Abbildung 10):
                </p>
                <p>
                    Erstellt durch das Projektteam
                </p>
            </div>

            <div class="section">
                <h2 id="quelleInteraktiveFeatures">Quelle: 4 Interaktive Features</h2>
                <hr class="underHeadline" />

                <p>Umsetzung der Favoritenfunktion (Abbildung 11):</p>
                <p>
                    Entwickelt durch das Projektteam.
                </p>
            </div>

            <div class="section">
                <h2 id="quelleTests">Quelle: 5 Tests und Optimierung</h2>
                <hr class="underHeadline" />

                <p>Frontend vs Backend (Abbildung:12)</p>
                <a href="https://www.google.com/search?sca_esv=4a5ffd8fc2d1e287&sxsrf=ADLYWIIRIEX8ix_e-5ouaEsoyPuKI9f5dg:1735948678525&q=frontend&udm=2&fbs=AEQNm0A6bwEop21ehxKWq5cj-cHa02QUie7apaStVTrDAEoT1CkRGSL-1wA3X2bR5dRYtRGv3dh0WX48pQ0OijG3Ir_Ily36WNjIM66TUeQQm6v5pCxPr2gtqfjkC7ffv6Tr7pov6Kj4r20q4qdHCSHuZ8l9l_oCqEwoxOcaGtTQ9oNU0Tr95ug&sa=X&sqi=2&ved=2ahUKEwjxvNPi4NqKAxVb2AIHHbH3FIoQtKgLegQIFBAB&biw=1718&bih=1304&dpr=1#vhid=aQIUZHyPg8uDIM&vssid=mosaic"
                   draggable="false">https://www.google.com/search?sca_esv=4a5ffd8fc2d1e287&sxsrf=ADLYWIIRIEX8ix_e-5ouaEsoyPuKI9f5dg:1735948678525&q=frontend&udm=2&fbs=AEQNm0A6bwEop21ehxKWq5cj-cHa02QUie7apaStVTrDAEoT1CkRGSL-1wA3X2bR5dRYtRGv3dh0WX48pQ0OijG3Ir_Ily36WNjIM66TUeQQm6v5pCxPr2gtqfjkC7ffv6Tr7pov6Kj4r20q4qdHCSHuZ8l9l_oCqEwoxOcaGtTQ9oNU0Tr95ug&sa=X&sqi=2&ved=2ahUKEwjxvNPi4NqKAxVb2AIHHbH3FIoQtKgLegQIFBAB&biw=1718&bih=1304&dpr=1#vhid=aQIUZHyPg8uDIM&vssid=mosaic</a>

            </div>

            <div class="section">
                <h2 id="quelleDokumentation">Quelle: 6 Dokumentation</h2>
                <hr class="underHeadline" />

                <p>Prozess Dokumentation (Abbildung 13):</p>
                <a href="https://www.bing.com/images/search?view=detailV2&ccid=3yUARhkc&id=B868D94755CD197FCF8A98FCFF1461B9E5E68189&thid=OIP.3yUARhkcIxmF9NnVDH4w8wHaEK&mediaurl=https%3a%2f%2fwww.marketing91.com%2fwp-content%2fuploads%2f2020%2f11%2fProcess-Documentation.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.df250046191c231985f4d9d50c7e30f3%3frik%3diYHm5blhFP%252f8mA%26pid%3dImgRaw%26r%3d0&exph=1080&expw=1920&q=documentation+image&simid=608003890566794839&FORM=IRPRST&ck=10053D9DE211BF4ECEF8F382AC847D2D&selectedIndex=18&itb=0&ajaxhist=0&ajaxserp=0"
                   draggable="false">https://www.bing.com/images/search?view=detailV2&ccid=3yUARhkc&id=B868D94755CD197FCF8A98FCFF1461B9E5E68189&thid=OIP.3yUARhkcIxmF9NnVDH4w8wHaEK&mediaurl=https%3a%2f%2fwww.marketing91.com%2fwp-content%2fuploads%2f2020%2f11%2fProcess-Documentation.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.df250046191c231985f4d9d50c7e30f3%3frik%3diYHm5blhFP%252f8mA%26pid%3dImgRaw%26r%3d0&exph=1080&expw=1920&q=documentation+image&simid=608003890566794839&FORM=IRPRST&ck=10053D9DE211BF4ECEF8F382AC847D2D&selectedIndex=18&itb=0&ajaxhist=0&ajaxserp=0</a>
            </div>
            <div class="section">
                <h2 id="quelleFazit">Quelle: 7 Fazit und Ausblick</h2>
                <hr class="underHeadline" />

                <p>7.2 Lessons Learned</p>
                <p>Lessons Learned (Abbildung 14):</p>
                <a href="https://www.google.com/search?sca_esv=4a5ffd8fc2d1e287&sxsrf=ADLYWIKkl1VWl1Qr4-WzTNhDUJCnQ8txeg:1735950692452&q=lessons+learned&udm=2&fbs=AEQNm0A6bwEop21ehxKWq5cj-cHa02QUie7apaStVTrDAEoT1CkRGSL-1wA3X2bR5dRYtRGt1ztFQQ-ZMaiiQH8OsJ7799eMJP-7XlPoj36rPpwK-1vdcfTAsltFyhCvCGIhZPYMvaZjqFDRXT5PbIuHJkj2BUNUc4x--zXWApIorNb_-71dLmg&sa=X&sqi=2&ved=2ahUKEwj34vui6NqKAxVn0AIHHRSOKsoQtKgLegQIChAB&biw=1718&bih=1304&dpr=1#vhid=16LqQyLmyPXW8M&vssid=mosaic"
                   draggable="false">https://www.google.com/search?sca_esv=4a5ffd8fc2d1e287&sxsrf=ADLYWIKkl1VWl1Qr4-WzTNhDUJCnQ8txeg:1735950692452&q=lessons+learned&udm=2&fbs=AEQNm0A6bwEop21ehxKWq5cj-cHa02QUie7apaStVTrDAEoT1CkRGSL-1wA3X2bR5dRYtRGt1ztFQQ-ZMaiiQH8OsJ7799eMJP-7XlPoj36rPpwK-1vdcfTAsltFyhCvCGIhZPYMvaZjqFDRXT5PbIuHJkj2BUNUc4x--zXWApIorNb_-71dLmg&sa=X&sqi=2&ved=2ahUKEwj34vui6NqKAxVn0AIHHRSOKsoQtKgLegQIChAB&biw=1718&bih=1304&dpr=1#vhid=16LqQyLmyPXW8M&vssid=mosaic</a>
                <p>
                </p>
            </div>

            <div class="section">
                <h2 id="quelleAnlagen"> Quelle: 8. Anlagen</h2>
                <hr class="underHeadline" />

                <p>
                    Anlage 2: Detaillierte Zeitplanung (Tabelle 3):
                </p>
                <p>
                </p>

            </div>

            <div class="section">
                <h2 id="quelleWebsite">Bildquellen komplette Website</h2>
                <hr class="underHeadline" />

                <h3>Bildquellen Startseite:</h3>
                <p>
                    Deine-Tierwelt [online] URL:
                    <a href="https://www.deine-tierwelt.de/magazin/wp-content/uploads/sites/7/2018/10/Hund-und-Katze-schlafen.jpg" draggable="false">https://www.deine-tierwelt.de/magazin/wp-content/uploads/sites/7/2018/10/Hund-und-Katze-schlafen.jpg</a>
                    [Stand 30.06.2024]
                </p>
                <p>
                    Flickr.com [online] URL: <a href="https://www.flickr.com/photos/68555868@N04/16403083195/in/pool-terrarium/" draggable="false">https://www.flickr.com/photos/68555868@N04/16403083195/in/pool-terrarium/</a> [Stand 30.06.2024]
                </p>

                <br />
                <h3>Bildquellen: Unsere Tiere</h3>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/Project/cashew/" draggable="false">https://www.tierheim-leipzig.de/Project/cashew/</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240320_155557.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240320_155557.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240320_155545.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240320_155545.jpg</a>  [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/02/IMG_20230213_151007.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/02/IMG_20230213_151007.jpg</a>  [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/02/IMG_20230213_150829.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/02/IMG_20230213_150829.jpg</a>  [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/05/20240519_115028.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/05/20240519_115028.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/05/IMG-20240519-WA0014.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/05/IMG-20240519-WA0014.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/03/20230318_113947.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/03/20230318_113947.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/03/20230314_162813.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/03/20230314_162813.jpg</a>  [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/07/FFBD96E4-F74E-47CC-8FB5-D801AE1E5CA1.jpeg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/07/FFBD96E4-F74E-47CC-8FB5-D801AE1E5CA1.jpeg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/07/19C315C2-71AA-4DEB-801B-825C693DCC82.jpeg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/07/19C315C2-71AA-4DEB-801B-825C693DCC82.jpeg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/IMG-20240422-WA0007.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/IMG-20240422-WA0007.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/IMG-20240422-WA0021.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/IMG-20240422-WA0021.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2022/01/Pino.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2022/01/Pino.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2021/10/20220115_132018.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2021/10/20220115_132018.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2019/06/20230527_162006.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2019/06/20230527_162006.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2019/06/20230527_162232.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2019/06/20230527_162232.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/12/20240113_130739.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/12/20240113_130739.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/12/20231216_131633.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/12/20231216_131633.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240414_143241.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240414_143241.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240414_143304.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/04/20240414_143304.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2022/11/DSC_4334-2.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2022/11/DSC_4334-2.jpg</a>  [Stand 05.07.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2022/11/DSC_4342.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2022/11/DSC_4342.jpg</a> [Stand 05.07.2024]
                </p>
                <br />
                <h3>Bildquellen: Vermisst / Gefunden</h3>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/Project/carlo-moechte-nicht-ins-tierheim/" draggable="false">https://www.tierheim-leipzig.de/Project/carlo-moechte-nicht-ins-tierheim/</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/Project/cello/" draggable="false">https://www.tierheim-leipzig.de/Project/cello/</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/Project/gnocchi/" draggable="false">https://www.tierheim-leipzig.de/Project/gnocchi/</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="" draggable="false">https://www.tierheim-leipzig.de/Project/privatvermittlung-floyd/</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/Project/stitch/" draggable="false">https://www.tierheim-leipzig.de/Project/stitch/</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/05/20230525_160027.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/05/20230525_160027.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/01/IMG_20230119_145515_edit_465193045793598.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/01/IMG_20230119_145515_edit_465193045793598.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2022/04/IMG-20220403-WA0001.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2022/04/IMG-20220403-WA0001.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2024/05/20240525_120351.jpg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2024/05/20240525_120351.jpg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Tierheim-Leipzig [online] URL: <a href="https://www.tierheim-leipzig.de/wp-content/uploads/2023/10/C440C255-1ED9-41FD-9919-DEBFC091A9E8.jpeg" draggable="false">https://www.tierheim-leipzig.de/wp-content/uploads/2023/10/C440C255-1ED9-41FD-9919-DEBFC091A9E8.jpeg</a> [Stand 29.05.2024]
                </p>
                <p>
                    Unsplash [online] URL: <a href="https://images.unsplash.com/photo-1652631822225-0b9e423cd3c8?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fHN0cmV1bmVuZGUlMjBrYXR6ZXxlbnwwfHwwfHx8MA%3D%3D" draggable="false">https://images.unsplash.com/photo-1652631822225-0b9e423cd3c8?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fHN0cmV1bmVuZGUlMjBrYXR6ZXxlbnwwfHwwfHx8MA%3D%3D</a> [Stand 30.06.2024]
                </p>

                <br />
                <h3>Bildquellen: Service / Infos</h3>
                <p>
                    Tierbedarf-Disount [online] URL: <a href="https://www.tierbedarf-discount.ch/media/image/ee/32/0f/katze-spielt-katze-beschaftigen-intro.jpg" draggable="false">https://www.tierbedarf-discount.ch/media/image/ee/32/0f/katze-spielt-katze-beschaftigen-intro.jpg</a> [Stand 30.06.2024]
                </p>
                <p>
                    Unsplash [online] URL: <a href="https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fHBlcnNvbiUyMGhvbGRpbmclMjBhJTIwY2F0fGVufDB8fDB8fHww" draggable="false">https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fHBlcnNvbiUyMGhvbGRpbmclMjBhJTIwY2F0fGVufDB8fDB8fHww</a> [Stand 30.06.2024]
                </p>
                <p>
                    Unsplash [online] URL: <a href="https://images.unsplash.com/photo-1706920147354-77d76004177f?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" draggable="false">https://images.unsplash.com/photo-1706920147354-77d76004177f?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D</a> [Stand 30.06.2024]
                </p>
                <p>
                    Unsplash [online] URL: <a href="https://unsplash.com/de/fotos/flachfokusfotografie-eines-weissen-shih-tzu-welpen-der-auf-dem-gras-lauft-qO-PIF84Vxg" draggable="false">https://unsplash.com/de/fotos/flachfokusfotografie-eines-weissen-shih-tzu-welpen-der-auf-dem-gras-lauft-qO-PIF84Vxg</a> [Stand 30.06.2024]
                </p>
                <p>
                    Unsplash [online] URL: <a href="https://images.unsplash.com/photo-1570745526295-8223b49b3c53?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjE1fHx0cmF1cmlnZXIlMjBodW5kfGVufDB8fDB8fHww" draggable="false">https://images.unsplash.com/photo-1570745526295-8223b49b3c53?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjE1fHx0cmF1cmlnZXIlMjBodW5kfGVufDB8fDB8fHww</a> [Stand 30.06.2024]
                </p>
                <p>
                    Zurich-Versicherung [online] URL: <a href="https://www.zurich.de/-/media/project/zwp/germany/br/images/product/op-versicherung-fuer-katzen_1200x630_2021_07.jpg?rev=331bf83073e14538b45159cf39b53789" draggable="false">https://www.zurich.de/-/media/project/zwp/germany/br/images/product/op-versicherung-fuer-katzen_1200x630_2021_07.jpg?rev=331bf83073e14538b45159cf39b53789</a> [Stand 05.07.2024]
                </p>
            </div>


            <div class="backButton">
                <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
</body>
</html>