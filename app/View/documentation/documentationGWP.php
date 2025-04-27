<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../public/css/main.css" />
    <link rel="stylesheet" href="../public/css/documentation.css" />

    <link rel="stylesheet" href="../public/lib/fontawesome-6.5.2/css/all.min.css" />

    <title>Projektdokumentation Tierheimat</title>
</head>
<body>
    <header>
        <a href="impressum" class="button" draggable="false"><i class="fa-solid fa-arrow-left"></i> Zurück zum Impressum</a>
    </header>

    <main>
        <div class="container deckblatt">
            <div>
                <h2>Beleg Grundlagen Webprogrammierung</h2>
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
                <span>Prof. Rolf Kruse</span>
                <br /><br />
                <h2>Bearbeitungszeitraum</h2>
                <span>23.05.2024 - 09.07.2024</span>
            </div>
        </div>

        <div class="container">
            <h1 id="inhaltsverzeichnis">Inhaltsverzeichnis</h1>
            <hr class="underHeadline" />
            <dl>
                <dt><a href="#einleitung" draggable="false">1 Einleitung</a></dt>
                <dd><a href="#umfeld" draggable="false">1.1 Projektumfeld</a></dd>
                <dd><a href="#zielsetzung" draggable="false">1.2 Zielsetzung</a></dd>
                <dt><a href="#planung" draggable="false">2 Planung und Analyse</a></dt>
                <dd><a href="#istAnalyse" draggable="false">2.1 IST-Analyse</a></dd>
                <dd><a href="#zielgruppe" draggable="false">2.2 Zielgruppenanalyse</a></dd>
                <dd><a href="#projektanforderung" draggable="false">2.3 Projektanforderungen</a></dd>
                <dd><a href="#zeitplanMeilensteine" draggable="false">2.4 Zeitplan und Meilensteine</a></dd>
                <dd><a href="#aufgabenaufteilung" draggable="false">2.5 Ressourcenplanung / geplante Aufgabenteilung</a></dd>
                <dt><a href="#entwurf" draggable="false">3 Entwurf</a></dt>
                <dd><a href="#zielplattform" draggable="false">3.1 Zielplattform und grundlegender Seitenaufbau</a></dd>
                <dd><a href="#entwurfLogo" draggable="false">3.2 Entwurf des Logos</a></dd>
                <dd><a href="#entwurfBenutzeroberfläche" draggable="false">3.3 Entwurf der Benutzeroberfläche</a></dd>
                <dt><a href="#implementierung" draggable="false">4 Implementierung</a></dt>
                <dd><a href="#implementierungBenutzeroberfläche" draggable="false">4.1 Implementierung der Benutzeroberfläche</a></dd>
                <dd><a href="#testen" draggable="false">4.2 Testen der Anwendung</a></dd>
                <dt><a href="#dokumentation" draggable="false">5 Dokumentation</a></dt>
                <dd class="emptyDD">&nbsp;</dd>
                <dt><a href="#fazit" draggable="false">6 Fazit</a></dt>
                <dd><a href="#sollIst" draggable="false">6.1 Soll- / Ist-Vergleich</a></dd>
                <dd><a href="#lessonsLearned" draggable="false">6.2 Lessons Learned</a></dd>
                <dd><a href="#ausblick" draggable="false">6.3 Ausblick</a></dd>
                <dt><a href="#anlagen" draggable="false">7 Anlagen</a></dt>
                <dd class="emptyDD">&nbsp;</dd>
                <dt><a href="#quellen" draggable="false">8 Quellen</a></dt>
                <dd class="emptyDD">&nbsp;</dd>
            </dl>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="einleitung">1 Einleitung</h2>
                <hr class="underHeadline" />
                <p>
                    Diese Seite beinhaltet die Projektdokumentation des Projektes
                    <img src="../public/img/logo.jpg" class="inlineLogo" alt="Tierheimat Logo" title="Tierheimat Logo" draggable="false">.
                </p><br />
                <p>
                    Zuerst erfolgt die Erläuterung und Planung des Projektumfeldes und des gewählten Projektrahmens.
                </p><p>
                    Darauf folgt eine detaillierte Beschreibung der Zielsetzungen und Anforderungen, die an die Webseite gestellt wurden.
                </p><p>
                    Anschließend wird der Entwicklungsprozess der Website erläutert, einschließlich der verwendeten Technologien, der Gestaltung der
                    Benutzeroberfläche und der Implementierung der Funktionalitäten.
                </p><p>
                    Abschließend werden die Testergebnisse und das Feedback der Benutzer präsentiert sowie ein Ausblick auf mögliche zukünftige
                    Erweiterungen und Verbesserungen gegeben.
                </p><br /><p>
                    Aus Gründen der Lesbarkeit wird in dieser Dokumentation auf die gleichzeitige Verwendung männlicher, weiblicher und diverser Sprachformen verzichtet. Sämtliche Personenbezeichnungen gelten gleichermaßen für alle Geschlechter.
                </p><br /><p>
                    Bilder, welche bei den <a href="#quellen" draggable="false">Quellen</a> nicht näher erwähnt werden, wurden von Stephanie Wachs fotografiert oder sind von den Gruppenmitgliedern eigenständig erarbeitet wurden.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="umfeld">1.1 Projektumfeld</h3>
                    <hr class="underHeadline" />
                    <p>
                        Es gibt zahlreiche Tierheime mit eigenen Websites, jedoch sind diese häufig veraltet und wenig ansprechend gestaltet. Oft fehlt es an modernem Design, einer klaren Navigation und aktuellen Informationen. Dies erschwert es potenziellen Adoptanten und Unterstützern, schnell und unkompliziert die benötigten Informationen zu finden.
                    </p><p>
                        Um diesen Anforderungen gerecht zu werden, hat sich das Projektteam PfotenDesign das Ziel gesetzt, eine neue, benutzerfreundliche und moderne Website für das Tierheim zu entwickeln. Das Team setzt sich aus Stephanie Wachs, Josephina Burger und Lucas-Manfred Herpe zusammen. Somit wurde das Projekt "Tierheimat" ins Leben gerufen.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="zielsetzung">1.2 Zielsetzung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Das Projekt "Tierheimat" hat das Ziel, eine effektive und benutzerfreundliche Website für ein Tierheim zu entwickeln.
                    </p><p>
                        Diese Plattform soll die Vermittlung von Tieren erleichtern, indem sie umfassende Informationen, wie Fotos, detaillierte
                        Beschreibungen und Kontaktdaten bereitstellt. Zugleich soll die Website die Sichtbarkeit des Tierheims in der Öffentlichkeit
                        stärken und interne Abläufe durch digitale Prozesse optimieren.
                    </p><p>
                        Langfristig zielt das Projekt darauf ab, die Anzahl der erfolgreichen
                        Tiervermittlungen zu erhöhen und das Engagement der Gemeinschaft zu fördern. Dies geschieht unter anderem durch persönliche
                        Beratungsgespräche mit dem Team, um das Bewusstsein für den Tierschutz zu schärfen.
                    </p><br /><p>
                        Dieses Projekt startete am 23.05.2024 und soll bis zum 09.07.2024 abgeschlossen sein.
                    </p><p>
                        Während dieser Zeit wird ein besonderes Augenmerk auf eine intuitive Benutzerführung und eine ansprechende Darstellung der Inhalte gelegt.
                    </p>
                    <br />
                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="planung">2 Planung und Analyse</h2>
                <hr class="underHeadline" />
                <p>
                    In diesem Abschnitt wird die Planung und Analyse des Projektes detailliert beschrieben.
                </p><p>
                    Zuerst wird die Ausgangssituation analysiert und die Zielgruppen definiert. Hierbei werden Informationen über bestehende Websites erhoben und bewertet.
                </p><p>
                    Danach erfolgt eine umfassende Beschreibung der Projektanforderungen und eine Zeitaufteilung.
                </p><p>
                    Die Ergebnisse dienen als Grundlage für die weitere Projektarbeit, um die bestmögliche Strategie für das Projekt zu entwickeln.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="istAnalyse">2.1 IST-Analyse</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die IST-Analyse umfasste eine ausgiebige Datenerhebung der Tierheime Erfurt, Leipzig und Jena.
                    </p><p>
                        Dabei wurden verschiedene Aspekte wie die bestehenden digitalen Angebote, die Benutzerfreundlichkeit der Webseiten, die angebotenen Dienstleistungen und die Kommunikationskanäle genau unter die Lupe genommen.
                    </p><p>
                        Ziel dieser Analyse war es, die Stärken und Schwächen der bestehenden Systeme zu identifizieren und wertvolle Erkenntnisse
                        für die Entwicklung unserer eigenen Website "Tierheimat" zu gewinnen.
                    </p><p>
                        Die Ergebnisse dieser Vergleichsanalyse flossen direkt in die Planung und Gestaltung unseres Projektes ein, um sicherzustellen,
                        dass "Tierheimat" die Bedürfnisse der Nutzer optimal erfüllt und sich von bestehenden Angeboten positiv abhebt.
                    </p><p>
                        Während der Untersuchung wurden die Websites der Tierheime in Erfurt, Leipzig und Jena genauer betrachtet. Diese Analyse half uns, positive und negative Eigenschaften sowie das Design zu bewerten. Es zeigte sich, dass die Websites von Erfurt und Leipzig veraltet und wenig benutzerfreundlich sind. Die Website des Tierheims Jena fiel jedoch durch ihr modernes und benutzerfreundliches Design positiv auf.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="zielgruppe">2.2 Zielgruppenanalyse</h3>
                    <hr class="underHeadline" />
                    <p>
                        Zuerst wurden verschiedene potenzielle Nutzergruppen identifiziert, die von der Website "Tierheimat" profitieren könnten.
                    </p><p>
                        Dazu gehören Tierliebhaber, die ein Haustier adoptieren möchten, Menschen, die nach Informationen und Ratschlägen zur Tierhaltung suchen, oder ihr Tier im Terheim abgeben wollen, sowie potenzielle Spender und Freiwillige, die das Tierheim unterstützen möchten.
                    </p><p>
                        Anschließend wurden die Bedürfnisse und Erwartungen dieser Zielgruppen untersucht und analysiert.
                    </p><p>
                        Ziel dieser Analyse war es, die Website so zu gestalten, dass sie den Anforderungen und Wünschen der verschiedenen Zielgruppen gerecht wird.
                    </p><p>
                        Die Ergebnisse der Zielgruppenanalyse flossen direkt in die Entwicklung der Benutzeroberfläche, die Gestaltung der Inhalte und die Implementierung der Funktionalitäten ein, um eine benutzerfreundliche und zielgruppengerechte Webseite zu schaffen. Das Ergebnis unserer Analyse ist in folgender Abbildung zusammenfassend zu finden:
                    </p><br />
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/zielgruppenanalyse.jpg" title="Zielgruppenanalyse" alt="Tabelle der Zielgruppenanalyse" draggable="false">
                    </div>
                    <div class="caption">Abbildung 1</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="projektanforderung">2.3 Projektanforderungen</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Anforderungen an das Projekt "Tierheimat" umfassen verschiedene technische, menschliche und funktionale Aspekte. Unter anderem muss die Website, welche mit html und css geschrieben werden soll, responsiv gestaltet sein, um auf verschiedenen Endgeräten optimal angezeigt zu werden.
                    </p><p>
                        Zudem sollen umfangreiche Filter- und Suchfunktionen integriert werden, um den Nutzern die Auswahl der Tiere zu erleichtern und optimal auf die Bedürfnisse der Nutzer einzugehen.
                    </p><p>
                        Weitere technische Anforderungen und Empfehlungen sind der Vorlesung von Herrn Prof. Kruse zu entnehmen. Auszüge sind unter anderem die Verwendung eines GRID-Layouts, Einbindung ansprechender textuereller sowie farblicher Designs und themenbezogene Bilder.
                        Hierzu ist die Herangehensweise aufgezeigt:
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/projektanforderung-1.PNG" class="imgEffekt" title="Projektanforderung Vorlesung" alt="Projektanforderung Vorlesung Prof. Kruse" draggable="false">
                        <img src="../public/imgDokumentation/projektanforderung-2.PNG" class="imgEffekt" title="Projektanforderung Vorlesung" alt="Projektanforderung Vorlesung Prof. Kruse" draggable="false">
                        <img src="../public/imgDokumentation/projektanforderung-3.PNG" class="imgEffekt" title="Projektanforderung Vorlesung" alt="Projektanforderung Vorlesung Prof. Kruse" draggable="false">
                    </div><div class="caption">Abbildung 2, 3 und 4</div>

                    <br /><p>
                        Dieses Projekt stellt auch Anforderungen an die Projektmitglieder. Dabei soll die Teamarbeit gestärkt, die interne Kommunikation verbessert, die Zuverlässigkeit sowie die Erweiterung der Fachkenntnisse gefördert werden.
                    </p><br /><p>
                        Die Farbgestaltung wird sich am Corporate Design des Tierheims orientieren und soll eine freundliche und einladende Atmosphäre schaffen.
                    </p><p>
                        Besonderes Augenmerk liegt auf der Lesbarkeit der Texte und der intuitiven Bedienbarkeit der Navigationselemente.
                    </p><p>
                        Zudem sollen CSS-Animationen eingesetzt werden, um visuelle Akzente zu setzen und die Benutzererfahrung zu verbessern.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="zeitplanMeilensteine">2.4 Zeitplan und Meilensteine</h3>
                    <hr class="underHeadline" />
                    <p>
                        In der nachfolgenden Tabelle ist ein grober Zeitplan hinterlegt.
                        Die detaillierte Zeitplanung ist in <a href="#detaillierteZeitplanung" draggable="false">Anlage 2</a> zu finden.
                    </p>

                    <table>
                        <thead>
                            <tr class="headlineTable">
                                <th>Projektphase</th>
                                <th>geplante Zeit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Planungs- und Entwurfsphase</td>
                                <td class="time"> 50 h </td>
                            </tr>
                            <tr>
                                <td>Implementierungsphase</td>
                                <td class="time"> 50 h </td>
                            </tr>
                            <tr>
                                <td>Dokumentationsphase</td>
                                <td class="time"> 50 h </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Gesamt</td>
                                <td class="time"> 150 h </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="caption">Tabelle 1</div>

                    <p>
                        Der Zeitplan für das Projekt ist in mehrere Phasen unterteilt: Planungs-, Implementierungs- und Dokumentationsphase.
                    </p><br /><p>
                        Die Planungsphase beginnt mit dem Kick-Off am 23.05.2024 und umfasst die Anforderungsanalyse und die Erstellung eines ersten Entwurfs/Mockups im Online-Tool "Figma". Weitere Feinarbeiten für das finale Mockup erfolgen im selben Programm.
                    </p><br /><p>
                        Die Implementierungsphase soll den kompletten Juni über laufen. Während dieser Phase wird das Frontend mit Hilfe von HTML und CSS entwickelt.
                    </p><p>
                        Durch wöchentliche Konsultationen werden die Fortschritte der jeweiligen Bearbeiter präsentiert, reflektiert und analysiert.
                    </p><p>
                        Die Implementierung wird durch abschließende Nutzertests beendet.
                    </p><br /><p>
                        Die Dokumentationsphase läuft dabei parallel zur Erstellung der Website ab. Eine abschließende Präsentation rundet das ganze Projekt ab.
                    </p><p>
                        Wichtige Meilensteine sind unter anderem die Fertigstellung des Mockups und der Abschluss des Nutzertests.
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/arbeitsplanDokumentation.PNG" title="Arbeitsplanung Phase 1-4" alt="Arbeitsplanung Phase 1-4" draggable="false">
                    </div>
                    <div class="caption">Abbildung 5</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="aufgabenaufteilung">2.5 Ressourcenplanung / geplante Aufgabenteilung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Die Aufgaben sind nach gemeinschaftlicher, interner Abstimmung getroffen wurden.
                    </p><br /><p>
                        In der Entwurfsphase ist geplant, dass sich alle Mitglieder des Teams individuell mit der Gestaltung des Layouts auseinandersetzen. Anschließend soll eine gemeinsame Auswahl von Layout-Elementen getroffen werden, die dann zu einem abschließenden Layout-Entwurf von Stephanie Wachs und Joesphina Burger kombiniert werden sollen.  
                    </p><p>
                        Nach der Erstellung des Entwurfs ist geplant, dass Stephanie Wachs die Umsetzung der grundlegenden Struktur der Webseiten umsetzt, dazu gehört der Header mit dem Menü, der Footer und das Grid-Layout. Außerdem ist geplant, dass sie die Startseite, die Login-Webseite und das Impressum umsetzt. Lucas-Manfred Herpe wird sich um die Umsetzung der Aktuelles-Webseite und um die Dokumentation kümmern. Josephina Burger wird sich mit der Umsetzung der Webseiten Unsere Tiere, Vermisst/Gefunden inklusive Formular und mit der Umsetzung des Formulars für die Webseite Service/Infos auseinandersetzen. 
                    </p><p>
                        Eine detaillierte Darstellung der tatsächlichen Aufgabenteilung, bei der Implementierung der Webseite und der Dokumentation, lässt sich auch unter dem Punkt <a href="#implementierungBenutzeroberfläche" draggable="false">4.1 Implementierung der Benutzeroberfläche</a> finden.
                    </p><br /><p> 
                        Regelmäßige Team-Meetings und Status-Updates stellen sicher, dass alle Teammitglieder stets auf dem neuesten Stand sind und effizient zusammenarbeiten.
                    </p><p>
                        Webgestütze Tools wie "Jira Software" und "Whatsapp" tragen dazu bei, eine klare Übersicht und eine direkte Kommunikation zu gewährleisten.
                        Die Entwicklungsumgebung besteht aus Visual Studio Code bzw. Visual Studio als Haupt-IDE. Nachfolgend ein Ausschnitt unserer Aufgaben in Jira (Stand: Beginn der Entwicklung):
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/jiraAufteilung.PNG" title="Jira Auszug Projekt: Tierheimat" alt="Jira Auszug Projekt: Tierheimat" draggable="false">
                    </div><div class="caption">Abbildung 6</div>
                    <br />
                    <p>
                        Im Anschluss führt jedes Projektmitglied eine Prüfung der gesamten Website durch.
                    </p><br /><p>
                        Die Bilder für die Website und die Dokumentation wurden entweder selbst von Stephanie Wachs fotografiert oder sind bei den <a href="#quellen" draggable="false">Quellen</a> zu finden.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="entwurf">3 Entwurf</h2>
                <hr class="underHeadline" />

                <p>
                    In diesem Abschnitt wird der Entwurf des Projektes Tierheimat detailliert beschrieben.
                </p><p>
                    Auf Grundlage der Analyseergebnisse werden außerdem die funktionalen und nicht-funktionalen Anforderungen definiert.
                </p><p>
                    Basierend auf diesen Anforderungen wird ein Konzept für die Website entwickelt, welches die Struktur, Navigation und Gestaltung umfasst.
                </p><p>
                    Besonders wichtig ist uns, dass wir eine benutzerfreundliche und intuitive Navigation gewährleisten, damit sich die Nutzer leicht zurechtfinden.
                </p><p>
                    Weiterhin wird auf ein ansprechendes und modernes Design geachtet, welches die Werte und das Image des Tierheims widerspiegelt.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="zielplattform">3.1 Zielplattform und grundlegender Seitenaufbau</h3>
                    <hr class="underHeadline" />
                    <p>
                        Für die Gestaltung und Entwicklung der Website sollen HTML und CSS verwendet werden.
                    </p><p>
                        Die Struktur der Website ist klar und logisch aufgebaut, um den Nutzern eine einfache Navigation zu ermöglichen.
                    </p><br /><p>
                        Folgende Seiten haben sich heraus kristallisiert:
                    </p>
                    <br />
                    <ol>
                        <li class="list-item">
                            <strong>Startseite:</strong>
                            <p>Eine einladende Einführung in das Tierheim mit aktuellen Informationen, Highlights und den wichtigsten Informationen.</p>
                        </li>
                        <li class="list-item">
                            <strong>Unsere Tiere:</strong>
                            <p>Diese Seite gibt eine Gesamtübersicht über alle Tiere, die sich im Tierheim befinden. Für die leichtere Navigation besteht die Möglichkeit zu filtern. Dieselbe Filter-Möglichkeit besteht auch über das Untermenü.</p>
                        </li>
                        <li class="list-item">
                            <strong>Aktuelles:</strong>
                            <p>Hier befinden sich Neuigkeiten rund um alle Themenbereiche, unter anderem Feste, Spenden, Umbaumaßnahmen, Mitarbeiter und vieles mehr.</p>
                        </li>
                        <li class="list-item">
                            <strong>Vermisst/Gefunden:</strong>
                            <p>Eine detaillierte Übersicht jeder gemeldeten, entlaufenen und zugelaufenen Tiere kann hier eingesehen werden. Sowohl über das Untermenü, als auch über die Filterung können hier bestimmte Seitenbereiche hervorgehoben werden.</p>
                            <p>Im eingeloggten Bereich können hier auch Anzeigen zu den vermissten und gefundenen Tieren vom Nutzer erstellt werden.</p>
                        </li>
                        <li class="list-item">
                            <strong>Service/Infos:</strong>
                            <p>Wichtige Informationen zum Vermittlungsablauf, zur Tierpension oder weiteren interessanten Themen finden sich hier wieder.</p>
                            <p>Als eingeloggter Nutzer besteht außerdem die Möglichkeit seine Hilfe für das Tierheim anzubieten (Gassi gehen, ...).</p>
                        </li>
                        <li class="list-item">
                            <strong>Login:</strong>
                            <p>Nutzer können sich einloggen, um eigene Anzeigen (vermisste oder gefundene Tiere) zu erstellen oder ihre Hilfe (Gassi gehen, ...) anzubieten.</p>
                        </li>
                        <li class="list-item">
                            <strong>Dokumentation:</strong>
                            <p>Die Übersicht aller getätigten Aufwände sowie Informationen rund um das Projekt.</p>
                        </li>
                    </ol>
                    <p>In der folgenden Abbildung ist die Struktur grafisch dargestellt.</p>

                    <img src="../public/imgDokumentation/webseitenstruktur.jpg" title="Webseitenstruktur" alt="Webseitenstruktur" draggable="false">
                    <div class="caption">Abbildung 7</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="entwurfLogo">3.2 Entwurf des Logos</h3>
                    <hr class="underHeadline" />

                    <div class="alternative">
                        <img src="../public/img/logo.jpg" title="Tierheimat Logo" alt="Tierheimat Logo" draggable="false">
                    </div>
                    <div class="caption">Abbildung 8</div>

                    <br />

                    <p>Das von Stephanie Wachs erstellte Logo ist sowohl einladend als auch symbolisch gestaltet.</p>
                    <p>Hier sind einige Aspekte, die den Entwurf des Logos auszeichnen:</p>
                    <br />
                    <ol>
                        <li class="list-item">
                            <strong>Verspieltes und freundliches Design:</strong>
                            <p>Die Schriftart ist weich und abgerundet, was eine freundliche und einladende Atmosphäre schafft. Dieselbe Schriftart wird auf der gesamten Website verwendet.</p>
                            <p>Diese Gestaltung spricht die Zielgruppe an, die eine positive und liebevolle Umgebung für Tiere sucht.</p>
                        </li>
                        <li class="list-item">
                            <strong>Einbindung von Tieren:</strong>
                            <p>Das Logo integriert verschiedene Tiere (Katze, Vogel, Hund, Hase) und eine Pfote direkt in den Schriftzug "Tierheimat".</p>
                            <p>Diese Tiere repräsentieren die Vielfalt der im Tierheim beherbergten Tiere und vermitteln sofort, dass es sich um eine tierbezogene Einrichtung handelt.</p>
                        </li>
                        <li class="list-item">
                            <strong>Die richtige Farbauswahl:</strong>
                            <p>Die grüne Farbe des Schriftzuges symbolisiert Natur, Wachstum und Leben. All diese Themen passen gut zu einem Tierheim, welches sich um das Wohl und die Pflege von Tieren kümmert.</p>
                            <p>Daher haben wir für die gesamte Website verschiedene Nuancen dieses Grüntons gewählt.</p>
                        </li>
                        <li class="list-item">
                            <strong>Kombination von Text und Bild:</strong>
                            <p>Die Tiere sind geschickt in den Text integriert, was dem Logo eine verspielte Note verleiht und gleichzeitig den Text hervorhebt.</p>
                            <p>Diese Kombination ist ansprechend und leicht verständlich.</p>
                            <p>Die Schriftart Comic Sans MS ist dabei sehr verspielt und passt perfekt zu den Tieren im Tierheim. Dieselbe Schrift findet sich auf der kompletten Website wieder.</p>
                        </li>
                        <li class="list-item">
                            <strong>Klarheit und Einfachheit:</strong>
                            <p>Das Logo ist einfach und klar, ohne übermäßige Details. Dies erleichtert die Wiedererkennung und stellt sicher, dass das Logo in verschiedenen Größen gut aussieht, sei es auf der Website, in Druckmedien oder auf Schildern.</p>
                        </li>
                        <li class="list-item">
                            <strong>Emotionale Verbindung:</strong>
                            <p>Durch die Darstellung von Tieren wird eine emotionale Verbindung zu Tierliebhabern hergestellt.</p>
                            <p>Das Logo spricht diejenigen an, die Tiere lieben und sich für deren Wohlergehen einsetzen möchten.</p>
                        </li>
                    </ol>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="entwurfBenutzeroberfläche">3.3 Entwurf der Benutzeroberfläche</h3>
                    <hr class="underHeadline" />

                    <p>
                        Bevor die Implementierung der Website starten konnte, wurden mehrere umfassenden Entwürfe von Stephanie und Josephina in figma erstellt. Abschließend stimmten alle gemeinsam für den finalen Entwurf ab.
                    </p>
                    <p>
                        Dabei kommt ein leichtes und benutzerfreundliches Layout / Design zum Einsatz, welches eine detailreiche Ansicht der Bilder ermöglicht und eine moderne und dynamische Benutzeroberfläche besitzt.
                    </p><p>
                        Lucas ergänzte alle Entwürfe, indem er die Bilder durch Kreuze darstellte und sie so in die Dokumentation einfügen konnte.
                        Alle weiteren Design-Ideen können der <a href="#mockup" draggable="false">Anlage 3</a> entnommen werden, dort befindet sich eine detaillierte Übersicht.
                    </p><p>
                        Der finale Entwurf ist dabei eine Mischung aller Design-Ideen und in Anlage 3 - Figma Model 4 zu finden. Alle Elemente, die im Designentwurf, aber nicht auf der Website zu finden sind, werden nicht implementiert.
                    </p>

                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/figmaModel-2.2.PNG" class="imgEffekt" title="Figma 2.2" alt="Figma Model 2.2" draggable="false">
                        <img src="../public/imgDokumentation/figmaModel-2.4.PNG" class="imgEffekt" title="Figma 2.4" alt="Figma Model 2.4" draggable="false">
                    </div>
                    <br class="pageToSmall" />
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/figmaModel-3.5.PNG" class="imgEffekt" title="Figma 3.5" alt="Figma Model 3.5" draggable="false">
                        <img src="../public/imgDokumentation/figmaModel-3.7.PNG" class="imgEffekt" title="Figma 3.7" alt="Figma Model 3.7" draggable="false">
                    </div>
                    <div class="caption">Abbildung 9, 10, 11 und 12</div>
                    <br />

                    <p>
                        Während der Implementierung wurde der finale Entwurf erneut leicht überarbeitet. Beispielsweise wurde die Position des Logos überprüft und überarbeitet, da durch die mittige Positionierung ein ungleicher Abstand am rechten und linken Rand entstand. Positionierten wir den gesamten Header jedoch mittig, war das Logo für uns zu weit links.
                        Nachfolgend die Design-Ideen zum Logo:
                    </p>
                    <br />
                    <img src="../public/imgDokumentation/logoMitte.jpg" title="Bild der ersten Entüwrfe, Logo mittig" alt="Logo mittig" draggable="false">
                    <img src="../public/imgDokumentation/logoLinks.jpg" title="Bild der ersten Entüwrfe, Logo links" alt="Logo links" draggable="false">
                    <img src="../public/imgDokumentation/logoOben.jpg" title="Bild der ersten Entüwrfe, Logo oben" alt="Logo oben" draggable="false">
                    <img src="../public/imgDokumentation/logoObenLinksFarbig.jpg" title="Bild der ersten Entüwrfe, Logo oben links farbig" alt="Logo oben linksbündig" draggable="false">
                    <img src="../public/imgDokumentation/logoObenMitte.jpg" title="Bild der ersten Entüwrfe, Logo oben mittig" alt="Logo oben mittig und farbig" draggable="false">
                    <img src="../public/imgDokumentation/logoObenMitteFarbig.jpg" title="Bild der ersten Entüwrfe, Logo oben mittig mit Farbe" alt="Logo oben mittig mit Farbe" draggable="false">
                    <div class="caption">Abbildung 13</div>
                    <br />
                    <p>
                        Es ist entscheidend, dass das Erlebnis des Nutzers nicht negativ beeinträchtigt wird und eine gute Übersicht sowie Navigierung weiterhin bestehen bleibt.
                    </p>
                    <p>
                        Aus diesem Grund haben wir uns gemeinschaftlich auf das nachfolgende Design des Headers geeinigt, da es für alle Seiten und Funktionen der Website das bestmögliche Ergebnis erzielt:
                    </p>
                    <br />
                    <img src="../public/imgDokumentation/logoFinal.PNG" title="Finales Logo" alt="Finales Logo im Design und Bsp." draggable="false">
                    <div class="caption">Abbildung 14</div>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="implementierung">4 Implementierung</h2>
                <hr class="underHeadline" />
                <p>
                    Die Implementierung stellt den praktischen Teil unserer Arbeit dar, in dem die theoretischen Planungen und Entwürfe in eine funktionierende Website umgesetzt werden.
                </p><p>
                    Dieser Prozess umfasst mehrere Phasen und erfordert eine enge Zusammenarbeit im Team sowie den Einsatz verschiedener Technologien und Werkzeuge.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="implementierungBenutzeroberfläche">4.1 Implementierung der Benutzeroberfläche</h3>
                    <hr class="underHeadline" />
                    <p>
                        Zuerst wurden die grundlegenden Layouts und Designs, die in der Entwurfsphase entwickelt wurden, in HTML und CSS umgesetzt. Dabei kam es zu folgender Aufgabenteilung:
                    </p><br /><p>
                        Stephanie setzte zunächst das grundlegende Design (Header mit Menü, Footer, Responsive Design und Grid-Layout für main) um. Sobald dieses fertig war, wurde die Startseite, der Login und das Impressum von Stephanie umgesetzt. Die Seiten "Unsere Tiere", "Vermisst/Gefunden" und "Service/Infos" wurden von Josephina erstellt.
                    </p><p>
                        Josephina entwickelte dabei auch die Formulare, die für die Seiten "Vermisst/Gefunden" und "Service/Infos" im eingeloggten Bereich benötigt wurden. Alle Formularfelder wurden mit Min- und Max-Werten, required sowie einem type-Attribut versehen, das klar definiert, wofür die jeweiligen Felder benötigt werden. Beim Login wird diese Validierung zwar eingebunden, derzeit jedoch nicht beansprucht. Diese Funktion wurde bewusst deaktiviert, da bei jedem Neuladen der Seite im eingeloggten Bereich nochmals eine Aufforderung erscheint, das Formular erneut abzusenden.
                    </p><p>
                        Lucas begann mit einer umfangreichen Bildrecherche und kümmerte sich anschließend um die komplette Dokumentation. Zusätzlich dazu erstellte Lucas eine erste Version der "Aktuelles" Seite. Ein finaler Abschluss dieser Seite erfolgte durch Stephanie. Vereinzelte Bilder hat sich dann jeder Entwickler selbst raus gesucht - Stephanie suchte auch selbst fotografierte Bilder heraus (z.B. die Ratte mit dem Apfel auf der Startseite).
                    </p><p>
                        Jeder entwickelte seine Seiten mitsamt Responsive Design zunächst in Eigenarbeit und sprach es dann mit den anderen ab.
                    </p><p>
                        Dabei wurden auch interessante Hover-Effekte entwickelt, welche im folgenden beschrieben werden. Die kleinen Bilder auf der Startseite und der Seite "Unsere Tiere" werden beim hovern ausgetauscht. Diesen besonderen Effekt entwickelten Josephina und Stephanie gemeinsam. Die großen Bilder auf der Startseite wechseln alle 3 Sekunden - ein weiterer interessanter Effekt von Stephanie. Beim hovern der Menüpunkte erhält der entsprechende Menüpunkt einen Unterstrich. Dies wurde von Stephanie entwickelt. Beim hovern der Artikelvorschau auf der "Aktuelles" Seite werden diese divs kurz nach oben verschoben. Diesen tollen Effekt entwickelte Lucas.
                    </p><p>
                        Auf der Seite "Unsere Tiere - Alle Tiere" besteht die Möglichkeit die Hündin "Lila" detaillierter anzusehen. Diese Unterseite, inklusive Responsive Design, hat Josephina entwickelt. Anschließend wurde diese Option von Lucas auch auf der "Aktuelles" Seite integriert. Zukünftig (im nächsten Semester) soll dies bei allen Artikeln und Anzeigen möglich sein.
                    </p><p>
                        Stephanie übertrug alle Inhalte in den Bereich der für die eingeloggten Nutzer gedacht ist. Zusätzlich implementierte sie beispielhaft Bearbeiten- und Löschen-Buttons auf der Seite "Vermisst/Gefunden" im eingeloggten Bereich. Diese Buttons ermöglichen es den angemeldeten Nutzern, ihre eigenen Anzeigen zu bearbeiten oder zu löschen. Beim Bearbeiten soll die Seite zukünftig nach oben gescrollt werden, sodass der Nutzer seine Änderungen direkt in der Eingabemaske vornehmen kann. Dies ist nützlich, um zum Beispiel nachträglich ein Bild hinzuzufügen.
                    </p><p>
                        Für die Seite "Vermisst / Gefunden" erstellte Josephina noch gesonderte CSS Stile, um die Seite drucken zu können. Dies schränkte sie auf mehrere verschiedene Browser (Firefox, Chrome, Edge, ...) ein.
                    </p><p>
                        Zur besseren Übersicht fügte Stephanie noch ein Untermenü für die Seiten "Unsere Tiere" und "Vermisst/Gefunden" ein.
                    </p><p>
                        Abschließend prüfte Stephanie die komplette Seite auf Redundanzen und kümmerte sich auch darum, dass die Dokumentation zu einer runden Sache wurde. Hier schrieb sie einige weitere Texte und passte auch das Design etwas an.
                        Alle prüften die komplette Website und Dokumentation nach Unstimmigkeiten und sprachen diese dann mit der Gruppe ab.
                    </p><p>
                        Die README Datei erstellte Stephanie.
                    </p><p>
                        Weitere Details zur Aufgabenteilung sind dem GitLab Projekt zu entnehmen.
                    </p>

                    <br /><br />

                    <p>
                        Durch die Einschränkung der Programmierung auf HTML und CSS sind die Formular und einige Buttons nicht funktional implementiert wurden.
                        Auf den Seiten "Unsere Tiere" und "Vermisst/Gefunden" befinden sich kleine Auswahlmenüs, die es ermöglichen sollen, die komplette Seite zu filtern. Bei der Seite "Unsere Tiere" soll weiterhin die Möglichkeit bestehen weitere Tiere anzuzeigen, damit die Seite beim ersten öffnen nicht zu viel erscheint.
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/formUnsereTiere.jpg" class="imgEffekt" title="Screenshot der Filterung für die Seite 'Unsere Tiere'" alt="Screenshot der Filterung für die Seite 'Unsere Tiere'" draggable="false">
                        <img src="../public/imgDokumentation/formKleinVermisstGefunden.jpg" class="imgEffekt" title="Screenshot der Filterung für die Seite 'Vermisst / Gefunden'" alt="Screenshot der Filterung für die Seite 'Vermisst / Gefunden'" draggable="false">
                        <img src="../public/imgDokumentation/unsereTiereWeitereTiere.jpg" class="imgEffekt" title="Screenshot Button für die Seite 'Unsere Tiere', um weitere Tiere anzuzeigen" alt="Screenshot Button für die Seite 'Unsere Tiere', um weitere Tiere anzuzeigen" draggable="false">
                    </div>
                    <div class="caption">Abbildung 15, 16 und 17</div>

                    <p>
                        Eine weitere nicht-funktionale Abhängigkeit sind die Formulare zum Login und zur Registration. Dadurch, dass diese nicht funktional sind, wird beim Klick auf "Anmelden" direkt auf die Seite im eingeloggten Bereich weitergeleitet. Der Nutzername des angemeldeten Nutzers soll anschließend oben erscheinen. Wir haben uns bewusst dagegen entschieden einen Logout durch einen Klick über den Nutzernamen auszuführen.
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/formLoginRegistration.jpg" class="imgEffekt" title="Screenshot Formulare Login und Registration" alt="Screenshot Formulare Login und Registration" draggable="false">
                    </div>
                    <div class="caption">Abbildung 18</div>

                    <p>
                        Die Formulare auf den Seiten "Vermisst / Gefunden" und "Service / Infos" sind lediglich erreichbar, wenn der Nutzer sich erfolgreich angemeldet hat, um somit gegen Spam besser vorzugehen. Hier kann der Nutzer sein Tier vermisst melden oder ein gefundenes Tier anzeigen. Im Formular "Helfen" kann der Nutzer seine Hilfe für das Tierheim anbieten. Beispielsweise kann er sich hier für eine Gassirunde mit den Tierheimhunden anmelden.
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/formVermisstGefunden.jpg" class="imgEffekt" title="Screenshot Formular vermisste und gefundene Tiere melden" alt="Screenshot Formular vermisste und gefundene Tiere melden" draggable="false">
                        <img src="../public/imgDokumentation/formHelfen.jpg" class="imgEffekt" title="Screenshot Formular Helfen" alt="Screenshot Formular Helfen" draggable="false">
                    </div>
                    <div class="caption">Abbildung 19 und 20</div>

                    <p>
                        Hat ein Nutzer ein Tier als vermisst gemeldet oder ein gefundenes Tier angegeben, kann er diese Anzeige jederzeit bearbeiten und löschen. Dafür wurden beispielhaft Icons an mehreren Vermisst-Anzeigen angebracht. Jeder Nutzer soll nur seine eigenen Anzeigen bearbeiten und löschen dürfen.
                    </p>
                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/beispielLoeschenBearbeiten.jpg" class="imgEffekt" title="Screenshot Löschen und Bearbeiten Buttons" alt="Screenshot Löschen und Bearbeiten Buttons" draggable="false">
                    </div>
                    <div class="caption">Abbildung 21</div>
                    <br />
                    <p>
                        Ein weiteres wichtiges Ziel, das wir umgesetzt haben, ist sicherzustellen, dass alle Nutzer, einschließlich Menschen mit Beeinträchtigungen, einfachen und uneingeschränkten Zugang zu unseren Inhalten haben. Zur Erhöhung der Barrierefreiheit haben wir daher verschiedene Komponenten ergänzt, unter anderem alt- und title-Attribute bei Bildern und Verlinkungen sowie labels in den Formularen.
                    </p>

                    <br />
                    <p>
                        Weiterhin wollten wir einen sauberen, strukturierten Quellcode und einheitlichen Codestyle erreichen. Dies gelang uns durch effektive Klassen, die auch auf jeder Seite genutzt werden können. Ein Beispiel ist in folgendem Quellcodeausschnitt zu finden:
                    </p>
                    <img src="../public/imgDokumentation/richtigerCodestyle.PNG" title="richtiger Codestyle" alt="Bild von einem verbesserten Codestyle" draggable="false">
                    <div class="caption">Abbildung 22</div>

                    <p>
                        Durch den Befehl "draggable='false'" kann beispielsweise das verschieben von Bildern unterbunden werden.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="testen">4.2 Testen der Anwendung</h3>
                    <hr class="underHeadline" />
                    <p>
                        Nachdem die Implementierung abgeschlossen war, wurde ein umfassender Testprozess durchgeführt, um die Qualität und Zuverlässigkeit der Website sicherzustellen.
                    </p><p>
                        Zuerst testeten alle Entwickler ihre eigenen Seiten, anschließend aber auch alle Seiten der anderen Entwickler. Die Tests wurden auf verschiedenen Browsern und verschiedenen Geräten durchgeführt und auf Fehler geprüft.
                    </p>
                    <p>
                        Außerdem wurden Personen aus unserem Umfeld zur Website befragt, um ein möglichst umfangreiches Feedback aus verschiedenen Perspektiven zu erhalten. Dabei wurden die Kriterien Struktur, Benutzerfreundlichkeit, Design und Funktionalität berücksichtigt.
                    </p><p>
                        Zur Struktur der Website haben wir das Feedback bekommen, dass es hilfreich wäre, eine Telefonnummer im Header zu platzieren, um den direkten Kontakt zum Tierheim zu erleichtern. Wir haben uns jedoch dagegen entschieden, da die Kontaktinformationen bereits im Footer stehen und somit auf jeder Seite zugänglich sind.
                    </p><p>
                        Positiv wurde die gute Strukturierung der Website hervorgehoben. Die befragten Personen fanden die Themen auf Anhieb und konnten sich leicht erschließen, was sich hinter den einzelnen Unterpunkten verbirgt.
                    </p><p>
                        Im Entwurfsprozess haben wir besonderen Wert darauf gelegt, den Ansprüchen der Nutzer gerecht zu werden. Als konstruktive Kritik wurde geäußert, dass wir weitere Themen wie Bilder des Tierheims und Informationen zur Katzenkastrationspflicht berücksichtigen sollten. Diese Anregungen haben wir umgesetzt.
                    </p><p>
                        Zum Design der Website erhielten wir gemischtes Feedback. Zwei Personen empfanden die Schriftart als veraltet, während eine Person sie ansprechend fand und den hohen Wiedererkennungswert betonte. Ein weiteres Feedback war, dass an manchen Stellen zu viel Text vorhanden sei und ein "Weiterlesen"-Button hilfreich wäre. Diese Kritikpunkte werden wir im folgenden Semestern berücksichtigen.
                    </p><p>
                        Insgesamt wurde das Design der Website sehr positiv bewertet. Es wurde als stimmig und einladend empfunden und besitzt einen hohen Wiedererkennungswert.
                    </p><p>
                        Bezüglich der Funktionalität wurde angemerkt, dass nicht klar ersichtlich ist, welche zusätzlichen Funktionen nach dem Einloggen zur Verfügung stehen. Dies lag daran, dass die betreffende Person nicht versucht hat, ein Tier als vermisst oder gefunden zu melden. Wäre dies der Fall gewesen, hätte sich die Notwendigkeit des Login-Bereichs erschlossen.
                    </p><p>
                        Ein weiteres positives Feedback betraf die Formulare, die eine einfache Kontaktaufnahme zum Tierheim ermöglichen. Eine Danksagung an das Tierheim, sobald eine vermissten Anzeige gelöscht wird, planen wir im kommenden Semester umzusetzen.
                    </p><p>
                        Zusammenfassend haben wir viele der erhaltenen Rückmeldungen bereits umgesetzt oder planen dies für die Zukunft. Einige Kritikpunkte haben wir jedoch bewusst nicht berücksichtigt. So haben wir uns aus gestalterischen Gründen entschieden, die Schriftart Comic Sans MS beizubehalten, da sie einen hohen Wiedererkennungswert für unsere Website schafft.
                    </p><br /><p>
                        Alle Seiten wurden abschließend mit dem W3C Validator geprüft und jeder gefundene Fehler wurde behoben. Unser Ziel ist es, einen sauberen und strukturierten Quellcode zu schreiben. Daher haben wir alle Tags ordnungsgemäß geschlossen, auch wenn der W3C Validator angibt, dass dies nicht immer erforderlich ist (beispielsweise beim br-Tag).
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="dokumentation">5 Dokumentation</h2>
                <hr class="underHeadline" />
                <p>
                    Die Dokumentation des Projekts "Tierheimat" ist ein wesentlicher Bestandteil unserer Arbeit, der die gesamte Entwicklung und Umsetzung des Projekts transparent und nachvollziehbar macht.
                </p><p>
                    Eine sorgfältig erstellte Dokumentation stellt sicher, dass alle Phasen des Projekts, von der Planung bis zur Implementierung, detailliert festgehalten werden und als wertvolle Ressource für zukünftige Referenzen dient.
                </p><p>
                    Ein wichtiger Aspekt der Nachvollziehbarkeit stellen auch die <a href="#anlagen" draggable="false">Anlagen</a> und <a href="#quellen" draggable="false">Quellen</a> dar.
                    Aus diesen Abschnitten können alle wichtigen erhobenen Daten klar und nachvollziehbar betrachtet werden.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="section">
                <h2 id="fazit">6 Fazit</h2>
                <hr class="underHeadline" />
                <p>
                    Das finale Produkt des Projekts "Tierheimat" ist eine strukturierte, voll funktionsfähige und benutzerfreundliche Website, welche die Anforderungen eines Tierheims und der Zielgruppen erfüllt.
                </p><p>
                    Die Website bietet eine intuitive Navigation, detaillierte Informationen zu den verfügbaren Tieren und ermöglicht eine einfache Kontaktaufnahme.
                </p><p>
                    Das Design ist ansprechend, responsiv und entspricht dem Corporate Design, wodurch es auf verschiedenen Geräten gleichermaßen gut funktioniert.
                </p><p>
                    Die Implementierung ist erfolgreich abgeschlossen, wodurch eine zuverlässige und effiziente Navigation und ein gutes Nutzererlebnis sichergestellt wird.
                </p>

                <div class="backButton">
                    <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                </div>

                <div class="section">
                    <h3 id="sollIst">6.1 Soll- / Ist-Vergleich</h3>
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
                                <td class="time"> 50 h </td>
                                <td class="time greenColor">40 h</td>
                            </tr>
                            <tr>
                                <td>Implementierungsphase</td>
                                <td class="time"> 50 h </td>
                                <td class="time redColor">120 h</td>
                            </tr>
                            <tr>
                                <td>Dokumentationsphase</td>
                                <td class="time"> 50 h </td>
                                <td class="time greenColor">40 h</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Gesamt</td>
                                <td class="time"> 150 h </td>
                                <td class="time redColor">200 h</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="caption">Tabelle 2</div>

                    <p>
                        Insgesamt wurden für das Projekt 200 Stunden aufgewendet, während ursprünglich 150 Stunden geplant waren. Dies ergibt eine Gesamtabweichung von
                        50 Stunden über dem Soll. Die Hauptursache für diese Abweichung liegt in der Implementierungsphase, die wesentlich mehr Zeit in Anspruch genommen
                        hat als ursprünglich vorgesehen. Diese erhebliche Überschreitung ist hauptsächlich darauf zurückzuführen, dass zwei von drei Entwicklern noch nicht
                        viel Erfahrung in der Programmierung mit HTML und CSS hatten. Daher wurde die benötigte Zeit für diese Phase einfach zu kurz eingeschätzt.
                    </p><p>
                        Für zukünftige Projekte sollte daher ein längerer Zeitrahmen für die Implementierung eingeplant werden, um solche Überschreitungen zu vermeiden.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="lessonsLearned">6.2 Lessons Learned</h3>
                    <hr class="underHeadline" />
                    <ol>
                        <li class="list-item">
                            <strong>Bedeutung einer klaren Projektplanung:</strong>
                            <p>Wir haben gelernt, dass eine sorgfältige und detaillierte Planung der Schlüssel zum Erfolg eines Projektes ist.</p>
                            <p>Die Erstellung eines klaren Projektplans, einschließlich Meilensteine und Zeitpläne, hat uns geholfen den Überblick zu behalten und sicherzustellen, dass alle Teammitglieder auf dem gleichen Stand sind. Trotz dessen merken wir uns, dass die Zeitpläne noch besser konkretisiert werden müssen, um diese zeitlich korrekt einhalten zu können.</p>
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
                            <p>
                                Für eine gute Zusammenarbeit ist eine einheitliche Strukturierung der Ordner essenziell. Dies trug dazu bei, dass die Einbindung von Bildern, die Navigierung durch das Projekt und deren Dokumente komplikationslos verlief. Die nächsten Bilder zeigen die Ordnerstruktur klar und deutlich:
                            </p>
                        </li>
                    </ol>

                    <div class="divAroundImgEffekt">
                        <img src="../public/imgDokumentation/ordnerStruktur.PNG" title="ordnerStruktur" alt="Bild der Ordnerstruktur" draggable="false">
                    </div>
                    <div class="caption">Abbildung 23</div>

                    <br />
                    <p>
                        Insgesamt war das Projekt "Tierheimat" eine wertvolle Lernerfahrung, die uns geholfen hat, unsere Fähigkeiten und unser Wissen zu erweitern.
                    </p><p>
                        Die Erkenntnisse, die wir aus diesem Projekt gewonnen haben, werden uns in zukünftigen Projekten zugutekommen und uns helfen, noch effizienter und erfolgreicher zu arbeiten.
                    </p>

                    <div class="backButton">
                        <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
                    </div>
                </div>

                <div class="section">
                    <h3 id="ausblick">6.3 Ausblick</h3>
                    <hr class="underHeadline" />
                    <p>
                        Das Projekt "Tierheimat" hat eine solide Grundlage für die Zukunft geschaffen und bietet zahlreiche Möglichkeiten zur Weiterentwicklung. Während die aktuelle Website den Bedürfnissen der Nutzer und des Tierheims gerecht wird, gibt es immer Raum für Verbesserungen und Erweiterungen.
                    </p><br /><p>
                    </p><p>
                        Die Integration interaktiver Elemente, wie beispielsweise ein Live-Chat für direkte Anfragen oder eine virtuelle Tour durch das Tierheim, könnte den Nutzern eine noch umfassendere und ansprechendere Erfahrung bieten.
                    </p><br /><p>
                        Die zukünftige Integration von JavaScript ermöglicht es zudem Tiere zu favorisieren. Dies könnte durch einen "Gefällt mir"-Button am Bild des jeweiligen Tieres umgesetzt werden, was eine schnellere Vermittlung der Tiere unterstützen würde.
                    </p><p>
                        Durch die zukünftige Nutzung von PHP ist es außerdem möglich, dass eine Datenbank an das Projekt angebunden werden kann. Diese kann die Tiere sehr gut verwalten und ermöglicht auch das Bearbeiten und Löschen von Tieren über die Web-Oberfläche.
                    </p><br /><p>
                        Letztlich bleibt das Hauptziel von "Tierheimat" jedoch unverändert: eine benutzerfreundliche, informative und unterstützende Plattform zu bieten, die dazu beiträgt, dass Tiere schneller ein neues Zuhause finden und die Kommunikation zwischen Tierheim und Tierfreunden erleichtert wird.
                    </p><p>
                        Durch kontinuierliche Verbesserungen und innovative Ansätze kann "Tierheimat" langfristig einen bedeutenden Beitrag zum Wohl der Tiere und zur Zufriedenheit der Nutzer leisten.
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
                <li><a href="#screenshotsAndereSeiten" draggable="false">Anlage 1: Screenshots anderer Seiten</a></li>
                <li><a href="#detaillierteZeitplanung" draggable="false">Anlage 2: Detaillierte Zeitplanung</a></li>
                <li><a href="#mockup" draggable="false">Anlage 3: Mockup</a></li>
            </ul>
            <br />
            <h2 id="screenshotsAndereSeiten">Anlage 1: Screenshots anderer Seiten</h2>
            <hr class="underHeadline" />

            <h3>Tierheim Erfurt:</h3>

            <h3>Tierheim Leipzig:</h3>

            <h3>Tierheim Jena:</h3>

            <h2 id="detaillierteZeitplanung">Anlage 2: Detaillierte Zeitplanung</h2>
            <hr class="underHeadline" />
            <table class="table">
                <tbody>
                    <tr class="headlineTable">
                        <td colspan="2">Planungs- und Entwurfsphase</td>
                        <td class="time">50 h</td>
                    </tr>
                    <tr>
                        <td>Ideenfindung</td>
                        <td class="time">5 h</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Benutzeroberfläche entwerfen und abstimmen</td>
                        <td class="time">30 h</td>
                    </tr>
                    <tr>
                        <td>Recherche (Bildersuche, ...)</td>
                        <td class="time">15 h</td>
                    </tr>
                    <tr class="headlineTable">
                        <td colspan="2">Implementierungsphase</td>
                        <td class="time">50 h</td>
                    </tr>
                    <tr>
                        <td>Umsetzung des Mockups, auch im Responsive Design</td>
                        <td class="time">30 h</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Umsetzung der Formulare (required, ...)</td>
                        <td class="time">15 h</td>
                    </tr>
                    <tr>
                        <td>Testen aller Eingaben und Ansichten</td>
                        <td class="time">5 h</td>
                    </tr>
                    <tr class="headlineTable">
                        <td colspan="2">Dokumentationsphase</td>
                        <td class="time">50 h</td>
                    </tr>
                    <tr>
                        <td>Erstellen der Projektdokumentation</td>
                        <td class="time">40 h</td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td>Prüfung der Projektdokumentation durch die anderen Projektmitglieder</td>
                        <td class="time">10 h</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Gesamt</td>
                        <td class="time">150 h</td>
                    </tr>
                </tfoot>
            </table>
            <div class="caption">Tabelle 3</div>

            <h2 id="mockup">Anlage 3: Mockup</h2>
            <hr class="underHeadline" />

            <h3>Figma Entwurf Model 1:</h3>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-1.PNG" title="Figma Model 1" alt="Figma Model 1" draggable="false">
            </div>

            <br />
            <br />

            <h3>Figma Entwurf Model 2:</h3>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-2.1.PNG" title="Figma Model 2" alt="Figma Model 2.1" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-2.2.PNG" title="Figma Model 2" alt="Figma Model 2.2" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-2.3.PNG" title="Figma Model 2" alt="Figma Model 2.3" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-2.4.PNG" title="Figma Model 2" alt="Figma Model 2.4" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-2.5.PNG" title="Figma Model 2" alt="Figma Model 2.5" draggable="false">
            </div>

            <br />
            <br />

            <h3>Figma Entwurf Model 3:</h3>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.1.PNG" title="Figma Model 3" alt="Figma Model 3.1" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.2.PNG" title="Figma Model 3" alt="Figma Model 3.2" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.3.PNG" title="Figma Model 3" alt="Figma Model 3.3" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.4.PNG" title="Figma Model 3" alt="Figma Model 3.4" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.5.PNG" title="Figma Model 3" alt="Figma Model 3.5" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.6.PNG" title="Figma Model 3" alt="Figma Model 3.6" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.7.PNG" title="Figma Model 3" alt="Figma Model 3.7" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.8.PNG" title="Figma Model 3" alt="Figma Model 3.8" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.9.PNG" title="Figma Model 3" alt="Figma Model 3.9" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.10.PNG" title="Figma Model 3" alt="Figma Model 3.10" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.11.PNG" title="Figma Model 3" alt="Figma Model 3.11" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.12.PNG" title="Figma Model 3" alt="Figma Model 3.12" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.13.PNG" title="Figma Model 3" alt="Figma Model 3.13" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.14.PNG" title="Figma Model 3" alt="Figma Model 3.14" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.15.PNG" title="Figma Model 3" alt="Figma Model 3.15" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-3.16.PNG" title="Figma Model 3" alt="Figma Model 3.16" draggable="false">
            </div>

            <br />
            <br />

            <h3>Figma Entwurf Model 4:</h3>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-4.1.PNG" title="Figma Model 4" alt="Figma Model 4.1" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-4.2.PNG" title="Figma Model 4" alt="Figma Model 4.2" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-4.3.PNG" title="Figma Model 4" alt="Figma Model 4.3" draggable="false">
            </div>

            <br />
            <br />

            <h3>Figma Entwurf Model 5 (Mobiles Endgerät):</h3>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-5.1.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.1" draggable="false">
                <img src="../public/imgDokumentation/figmaModel-5.6.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.6" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-5.3.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.3" draggable="false">
                <img src="../public/imgDokumentation/figmaModel-5.4.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.4" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-5.5.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.5" draggable="false">
                <img src="../public/imgDokumentation/figmaModel-5.2.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.2" draggable="false">
            </div>
            <div class="divAroundImgEffekt">
                <img src="../public/imgDokumentation/figmaModel-5.8.PNG" class="imgEffekt" title="Figma Model 5" alt="Figma Model 5.8" draggable="false">
            </div>

            <div class="backButton">
                <a href="#inhaltsverzeichnis" draggable="false"><i class="fa-solid fa-arrow-up"></i> Zurück zum Inhaltsverzeichnis</a>
            </div>
        </div>

        <div class="container" id="quellen">
            <h1>Quellen</h1>
            <hr class="underHeadline" />
            <ul>
                <li><a href="#quelleDeckblatt" draggable="false">Quelle: Deckblatt</a></li>
                <li><a href="#quelleEinleitung" draggable="false">Quelle: 1. Einleitung</a></li>
                <li><a href="#quelleZielsetzung" draggable="false">Quelle: 1.2 Zielsetzung</a></li>
                <li><a href="#quelleIstAnalyse" draggable="false">Quelle: 2.1 Ist-Analyse</a></li>
                <li><a href="#quelleZielgruppenanalyse" draggable="false">Quelle: 2.2 Zielgruppenanalyse</a></li>
                <li><a href="#quelleProjektanforderung" draggable="false">Quelle: 2.3 Projektanforderung</a></li>
                <li><a href="#quelleZeitplanMeilensteine" draggable="false">Quelle: 2.4 Zeitplan und Meilensteine</a></li>
                <li><a href="#quelleRessourcenplanungAufgabenteilung" draggable="false">Quelle: 2.5 Ressourcenplanung / geplante Aufgabenteilung</a></li>
                <li><a href="#quelleSeitenaufbau" draggable="false">Quelle: 3.1 Zielplattform und grundlegender Seitenaufbau</a></li>
                <li><a href="#quelleEntwurfLogo" draggable="false">Quelle: 3.2 Entwurf des Logos</a></li>
                <li><a href="#quelleEntwurfBenutzeroberfläche" draggable="false">Quelle: 3.3 Entwurf der Benutzeroberfläche</a></li>
                <li><a href="#quelleImplementierungBenutzeroberfläche" draggable="false">Quelle: 4.1 Implementierung der Benutzeroberfläche</a></li>
                <li><a href="#quelleDokumentation" draggable="false">Quelle: 5. Dokumentation</a></li>
                <li><a href="#quelleSollIstVergleich" draggable="false">Quelle: 6.1 Soll-/Ist-Vergleich</a></li>
                <li><a href="#quelleLessonsLearned" draggable="false">Quelle: 6.2 Lessons Learned</a></li>
                <li><a href="#quelleAnlagen" draggable="false">Quelle: 7. Anlagen</a></li>
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
                <h2 id="quelleEinleitung">Quelle: 1. Einleitung</h2>
                <hr class="underHeadline" />

                <p>
                    Logo Tierheimat:
                </p>
                <p>
                    Erstellt durch Stephanie Wachs
                </p>
            </div>

            <div class="section">
                <h2 id="quelleIstAnalyse">Quelle: 2.1 Ist-Analyse</h2>
                <hr class="underHeadline" />

                <p>
                    Tierheim Erfurt (Abbildung 2 und 3):
                </p>
                <p>
                    <a href="https://www.tierheimverein-erfurt.de/tiere.html" draggable="false">
                        https://www.tierheimverein-erfurt.de/tiere.html
                    </a>
                    <br />
                    <a href="https://www.tierheimverein-erfurt.de/interessantes.html" draggable="false">
                        https://www.tierheimverein-erfurt.de/interessantes.html
                    </a>
                </p>
                <br />
                <p>Tierheim Leipzig (Abbildung 4 und 5):</p>
                <p>
                    <a href="https://www.tierheim-leipzig.de/" draggable="false">https://www.tierheim-leipzig.de/</a>
                    <br />
                    <a href="https://www.tierheim-leipzig.de/Project/sancho/" draggable="false">https://www.tierheim-leipzig.de/Project/sancho/</a>
                </p>
                <br />
                <p>Tierheim Jena (Abbildung 6 und 7):</p>
                <p>
                    <a href="https://tierheim-jena.de" draggable="false">https://tierheim-jena.de</a>
                    <br />
                    <a href="https://tierheim-jena.de/tiere/" draggable="false">https://tierheim-jena.de/tiere/</a>
                </p>
            </div>

            <div class="section">
                <h2 id="quelleZielgruppenanalyse">Quelle: 2.2 Zielgruppenanalyse</h2>
                <hr class="underHeadline" />

                <p>
                    Tabelle Zielgruppenanalyse (Abbildung 8):
                </p>
                <p>
                    Erstellt durch Josephina Burger
                </p>
            </div>

            <div class="section">
                <h2 id="quelleProjektanforderung">Quelle: 2.3 Projektanforderung</h2>
                <hr class="underHeadline" />

                <p>
                    Herangehensweise Projektaufgabe (Abbildung 9, 10, 11):
                </p>
                <p>
                    <a href="https://moodle.fh-erfurt.de/pluginfile.php/431752/mod_resource/content/0/GWP-SS24-2Layout.pdf" draggable="false">https://moodle.fh-erfurt.de/pluginfile.php/431752/mod_resource/content/0/GWP-SS24-2Layout.pdf</a>
                </p>
            </div>

            <div class="section">
                <h2 id="quelleZeitplanMeilensteine">Quelle: 2.4 Zeitplan und Meilensteine</h2>
                <hr class="underHeadline" />

                <p>Tabelle Zeitübersicht (Tabelle 1):</p>
                <p>
                    Erstellt durch Stephanie Wachs
                </p>
                <br />
                <p>Arbeitsplan (Abbildung 12):</p>
                <p>
                    Erstellt durch Projektteam Tierheimat
                </p>
            </div>

            <div class="section">
                <h2 id="quelleRessourcenplanungAufgabenteilung">Quelle: 2.5 Ressourcenplanung / geplante Aufgabenteilung</h2>
                <hr class="underHeadline" />

                <p>Jira Übersicht (Abbildung 13):</p>
                <a href="https://tierheimat.atlassian.net/jira/software/projects/SCRUM/boards/1" draggable="false">https://tierheimat.atlassian.net/jira/software/projects/SCRUM/boards/1</a>
            </div>

            <div class="section">
                <h2 id="quelleSeitenaufbau">Quelle: 3.1 Zielplattform und grundlegender Seitenaufbau</h2>
                <hr class="underHeadline" />

                <p>
                    Grundlegender Aufbau der Website (Abbildung 14):
                </p>
                <p>
                    Erstellt durch Josephina Burger
                </p>
            </div>

            <div class="section">
                <h2 id="quelleEntwurfLogo">Quelle: 3.2 Entwurf des Logos</h2>
                <hr class="underHeadline" />

                <p>
                    Logo Tierheimat (Abbildung 15):
                </p>
                <p>
                    Erstellt durch Stephanie Wachs
                </p>
            </div>

            <div class="section">
                <h2 id="quelleEntwurfBenutzeroberfläche">Quelle: 3.3 Entwurf der Benutzeroberfläche</h2>
                <hr class="underHeadline" />

                <p>
                    Figma Entwurf 2 und 3 (Abbildung 16 bis 19) sowie Abbildung 20 und 21:
                </p>
                <p>
                    Erstellt durch Projektmitglieder (Stephanie Wachs und Josephina Burger)
                </p>
            </div>

            <div class="section">
                <h2 id="quelleImplementierungBenutzeroberfläche">Quelle: 4.1 Implementierung der Benutzeroberfläche</h2>
                <hr class="underHeadline" />

                <p>
                    Screenshots der Anwendung (Abbildung 22 - 29):
                </p>
                <p>
                    Erstellt durch Projektmitglieder
                </p>
            </div>

            <div class="section">
                <h2 id="quelleSollIstVergleich">Quelle: 6.1 Soll-/Ist-Vergleich</h2>
                <hr class="underHeadline" />

                <p>Tabelle tatsächlicher Zeitaufwand (Tabelle 2):</p>
                <p>
                    Erstellt durch Stephanie Wachs
                </p>
            </div>

            <div class="section">
                <h2 id="quelleLessonsLearned"> Quelle: 6.2 Lessons Learned</h2>
                <hr class="underHeadline" />

                <p>
                    Screenshots Ordnerstruktur (Abbildung 31 und 32):
                </p>
                <p>
                    Erstellt durch Projektmitglieder
                </p>
            </div>

            <div class="section">
                <h2 id="quelleAnlagen"> Quelle: 7. Anlagen</h2>
                <hr class="underHeadline" />

                <p>Anlage 1: Screenshots anderer Websiten:</p>
                <p>
                    Tierheim Erfurt (Abbildung 33 und 34):
                </p>
                <p>
                    <a href="https://www.tierheimverein-erfurt.de/tiere.html" draggable="false">https://www.tierheimverein-erfurt.de/tiere.html</a>
                    <br />
                    <a href="https://www.tierheimverein-erfurt.de/veranstaltungen.html" draggable="false">https://www.tierheimverein-erfurt.de/veranstaltungen.html</a>
                </p>
                <br />
                <p>
                    Tierheim Leipzig (Abbildung 35 und 36):
                </p>
                <p>
                    <a href="https://www.tierheim-leipzig.de/meldung/" draggable="false">https://www.tierheim-leipzig.de/meldung/</a>
                    <br />
                    <a href="https://www.tierheim-leipzig.de/vermittlungsbedingungen/" draggable="false">https://www.tierheim-leipzig.de/vermittlungsbedingungen/</a>
                </p>
                <br />
                <p>
                    Tierheim Jena (Abbildung 37 und 38):
                </p>
                <p>
                    <a href="https://tierheim-jena.de/aktuelles/" draggable="false">https://tierheim-jena.de/aktuelles/</a>
                    <br />
                    <a href="https://tierheim-jena.de/service/" draggable="false">https://tierheim-jena.de/service/</a>
                </p>
                <br />
                <p>
                    Anlage 2: Detaillierte Zeitplanung (Tabelle 3):
                </p>
                <p>
                    Erstellt durch Stephanie Wachs
                </p>
                <br />
                <p>
                    Anlage 3: Mockup
                </p>
                <p>
                    Erstellt durch Projektmitglieder
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