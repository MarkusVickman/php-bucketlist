# Moment 2 PHP

Moment 2 i kursen Webbutveckling för WordPress ska vi också lära oss programmeringsspråket PHP och hur UML-diagram ser ut. Uppgiften gick ut på att skapa en webbplats med PHP.
På webbplatsen ska det gå att skapa inlägg till en bucket list som sedan också går att ta bort. Inläggen ska sparas i en MySQL/MariaDb-databas.

## Uppgiften innehåller
* Responsiv webbplats med minst två sidor och en huvudmeny.
* Kunna läsa ut, lägga till och radera inlägg från en bucketlist.
* Databas med lämpliga tabeller samt tillhörande ER-digram.
* Objektorienterad PHP med tillhörande klassdiagram (UML-diagram).
* Tydlig filstruktur för dokument och script på din webbplats.
* Genererad HTML-kod validerar korrekt.
* Webbplatsen publiceras samt inlämning av källkods-filer, export av databas/installations-skript.

## Install
För att implementera databasen behövs en fil med namnet secrets.php skapas i includes med följande innehåll för databasanslutning:

<?php
//Secrets for connecting to the db KEEP SAFE!!!
class DbCredentials
{

public static $dbHost = ""; //localhost eller annan om remote
public static $dbUser = ""; //Användarnamn till databasen
public static $dbPassword = ""; //Lösenord till databasen
public static $dbDatabase = ""; //Databasname

}
?>

### Tillvägagångssätt
Kopiera hela mappen repot och lagra den i public_html mappen på en webbhost som har stöd för PHP.
Kör sedan install.php filen genom att skriva webbadressen ex https://www.example.org/install.php
Nu finns tabellen i din databas och webbplatsen är redo att användas.

## Skapare
**Markus Vickman**
**Miun ID: MAVI2302**
