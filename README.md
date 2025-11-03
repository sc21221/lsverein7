## Über LS-Verein 7

'LS-Verein 7' ist eine übersichtliche Webanwendung, 
mit der man die Mitglieder eines Vereins verwalten kann.
Es ist eine 'Single-Page-Application' und kann per Browser von verschiedenen Endgeräten benutzt werden.

Ist ein Fork von [vauteer/lsverein7}(https://github.com/vauteer/lsverein7)


### Enthaltene Funktionen:
- Eingabe der Stammdaten
- Benutzerverwaltung mit Rechte-Management (Rollen)
- Zeitliche Zuordnung zu Abteilungen (Sparten)
- Zeitliches Festhalten von Funktionen (Ämtern)
- Zeitliches Festhalten von Ereignissen (Ehrungen)
- Zeitliches Festhalten von Inventar
- Zuordnen von Mitgliedsbeiträgen
- Abbuchen der Mitgliedsbeiträge (Sepa-Datei)
- Erstellen von einmaligen Lastschriften (Sepa-Datei)
- Erstellung einer Statistik für die jährliche BLSV-Meldung
- Exportieren der Mitglieder als PDF, CSV und vCard
- Die Verwaltung mehrerer Vereine ist möglich
## Voraussetzungen
1. PHP 8.1+
2. Composer
3. Node (mit npm)
4. MySQL 5.7+ oder MariaDB 10.10+

## Installation
1. Das Projekt klonen/installieren
2. In das Projekt-Verzeichnis wechseln
3. Die Konfigurationsdatei erzeugen<br>`cp .env.example .env`
4. `composer install --optimize-autoloader --no-dev`
5. `php artisan key:generate`
6. `php artisan storage:link`
7. sail installieren siehe https://laravel.com/docs/12.x/sail#installing-sail-into-existing-applications
8. alias anlegen für sail: <br/>`alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'`
9. Die Konfigurationsdatei anpassen (Datenbank, Titel, ...)
10. `./vendor/bin/sail artisan migrate`
11. Einen Administrator anlegen<br>`./vendor/bin/sail  artisan app:user 'Max Mustermann' 'max@mustermann.de' --password=******** --admin`
12. `npm install`
13. `npm run build` 
14. Testen mit eingebautem Webserver: `sail artisan serve` 
15. Eine Domain/Subdomain einrichten<br>Dokumentenstamm ist das 'public' Verzeichnis! 
16. Mit den Administrator-Daten anmelden

## Wiederherstellen eines Backups
Machen Sie ein Backup, falls sie Daten überschreiben!
1. Installieren der Anwendung, falls nötig
2. Das Löschen der aktuellen Daten ist nicht nötig, weil die komplette Datenbank überschrieben wird!
3. Mit phpMyAdmin oder ähnlichen Programmen das Export-Script importieren.

## Wiederherstellen eines Exports
Machen Sie ein Backup, falls sie Daten überschreiben! <br/> Export-Datei enthält nur die Daten eines Vereins!
1. Installieren der Anwendung, falls nötig
2. Löschen der aktuellen Daten<br>php artisan migrate:fresh
3. Mit phpMyAdmin oder ähnlichen Programmen das Export-Script importieren.

## Benutzte Frameworks und Tools
- [Laravel](https://laravel.com)
- [Vue.js](https://vuejs.org)
- [Inertia.js](https://inertiajs.com)
- [tailwindcss](https://tailwindcss.com)
- [Vite](https://vitejs.dev)
- [Laravel Sail](https://laravel.com/docs/12.x/sail)
- und viele mehr

This web application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
