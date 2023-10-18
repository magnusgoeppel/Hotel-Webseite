# Hotel-Webseite

## Beschreibung

Die "Hotel-Webseite" ist eine Webanwendung. Die Webseite ermöglicht es Benutzern, verschiedene Seiten wie die Startseite, 
das Hilfe-Center, das Impressum und viele andere zu besuchen. Sie verwendet PHP für die Backend-Logik und Bootstrap für das Frontend-Design.

## Hauptfunktionen

### Session-Management:
Die Webseite überprüft, ob eine Session vorhanden ist, und startet gegebenenfalls eine neue Session.
Es gibt auch eine Funktion, um zu überprüfen, ob der Benutzer eingeloggt ist.

### Navigation: 
Die Navigation wird über eine separate `nav.php`-Datei eingebunden.

### Dynamisches Laden von Seiten:
Abhängig von der `site` GET-Variable wird die entsprechende Seite aus dem `inc`-Ordner geladen.
Es gibt eine vordefinierte Liste von gültigen Seiten, und wenn eine ungültige Seite angefordert wird,
wird eine Fehlerseite angezeigt.
  
### Styling: 
Die Webseite verwendet Bootstrap für das Styling und hat zusätzliche benutzerdefinierte Styles, insbesondere für den Hintergrund.

### Responsive Design:
Die Webseite ist für verschiedene Bildschirmgrößen optimiert, sodass sie auf Desktops, Tablets und Mobilgeräten gleichermaßen gut aussieht und funktioniert.

## Datenbank
Für die Datenverwaltung wird eine MySQL-Datenbank verwendet. Die Datenbank wurde mit phpMyAdmin erstellt und konfiguriert. 
Die Konfigurationsdatei für die Datenbankverbindung befindet sich im `db`-Verzeichnis des Projekts.

## Benutzung

Zur Benutzung der Webseite wird ein Apache Webserver benötigt.
