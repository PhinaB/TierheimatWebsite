Tierheimat

    Tierheimat ist eine Website, die es ermöglicht, Informationen über Tiere im Tierheim, vermisste und gefundene Tiere sowie aktuelle Neuigkeiten und Services rund um das Tierheim zu erhalten. Diese Website wurde mit HTML, CSS, PHP und JavaScript erstellt und kann lokal auf jedem Gerät genutzt werden.

Seitenübersicht

    Startseite: Einführung und allgemeine Informationen.

    Unsere Tiere: Anzeigen von Tieren im Tierheim mit Filter- und „Weiterlesen“-Funktion.

    Aktuelles: Neuigkeiten und Updates mit „Weiterlesen“-Option.

    Vermisst/Gefunden: Informationen über vermisste und gefundene Tiere, mit Filterfunktion.

    Service/Infos: Nützliche Informationen und Dienstleistungen rund um das Tierheim.

    Login: Anmeldung und Registrierung für erweiterte Funktionen.

    Impressum: Rechtliche Informationen und Zugang zur Projektdokumentation.


Erweiterte Funktionen

    Nach erfolgreichem Login stehen zusätzliche Funktionen zur Verfügung:

        Vermisst/Gefunden: Eigene Meldungen einreichen, bearbeiten oder löschen.

        Service/Helfen: Weitere Dienstleistungen und Hilfsangebote nutzen und anbieten.

        Adminrechte: Administratoren können alle Einträge verwalten.

    Details hierzu finden sich auch in der Projektdokumentation.


Installation und Nutzung

    1. Klonen des Repositories: git clone <Repository-URL>

    2. Starten Sie Ihren lokalen Apache und MySQL Server (beispielsweise über xampp)

    3. Öffnen Sie phpMyAdmin (https://127.0.0.1/phpmyadmin/) und erstellen eine Datenbank‚ ´tierheimat‘ mit folgenden Befehlen:
    DROP DATABASE tierheimat; CREATE DATABASE tierheimat;

    4. Öffnen Sie folgende Seite und warten auf die Bestätigung, dass die
    Datenbank ihre Einträge erhalten hat:
    http://127.0.0.1/TierheimatWebsite/database/databaseInit.php
    Sollte dies nicht klappen, können die SQL Befehle aus der folgenden Datei im lokalen phpMyAdmin (Unterseite SQL) eingefügt werden: projektverzeichnis/database/tierheimat.sql(ein Export der Datenbank ist im Unterordner /database/export zu findendiese -> diese kann Alternativ auch in phpMyAdmin importiert werden)
    
    5. Öffnen der Website: Geben Sie den Dateipfad http://127.0.0.1/TierheimatWebsite/public/ im Browser ein (eventuell abweichender Pfad, wenn das Projekt in einem anderen Unterordner zu finden ist)


Zugangsdaten für Login

    Sie können sich mit den folgenden Benutzerdaten anmelden:
        Aministrator:
            E-Mail: betreuer@example.com
            Passwort: securepassword2
        Nutzer:
            E-Mail: tierarzt@example.com
            Passwort: securepassword3

    Alternativ können Sie sich registrieren, um einen neuen Nutzer zu erstellen. Dieser verfügt über die gleichen Rechte wie ein angemeldeter Standard-Nutzer, jedoch keine Administratorberechtigungen.

Ideen für die Zukunft

    Ideen und Vorschläge für zukünftige Erweiterungen und Verbesserungen der Website sind in der Projektdokumentation im Impressum zu finden.

Weitere Informationen

    Plattformunabhängig: Die Website kann offline genutzt werden und passt sich jeder Bildschirmbreite an, um eine optimale Nutzungserfahrung zu gewährleisten.

    Projektdokumentation: Im Impressum finden Sie einen Link zur vollständigen Projektdokumentation.