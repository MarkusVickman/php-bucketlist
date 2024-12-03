<!-- php script to include the websites header, a config file and tab title -->
<?php
$title = "Startsida";
include("includes/header.php");
include("includes/config.php");
?>

<!-- Header text on top of hero image -->
<section class="hero is-medium is-link" style="background-image: url('./images/background-index.jpg'); background-repeat: no-repeat">
    <div class="hero-body">
        <h1 class="title is-size-1 has-text-centered is-underlined">Introduktion till PHP</h1>
    </div>
</section>


<!-- Section panel with articles of text -->
<section class="panel container is-max-desktop mt-6">
    <h2 class="panel-heading title">Uppgiften</h2>

    <article class="panel-block">
        <div class="control">
            <h3 class="subtitle">Krav</h3>
            <p class="">
                Moment 2 i kursen Webbutveckling för WordPress ska vi också lära oss programmeringsspråket PHP och hur UML-diagram ser ut. Uppgiften gick ut på att skapa en webbplats med PHP.
                På webbplatsen ska det gå att skapa inlägg till en bucket list som sedan också går att ta bort. Inläggen ska sparas i en MySQL/MariaDb-databas.
            </p>
            <div class="content mt-3">
                <ol type="1">
                    <li>Responsiv webbplats med minst två sidor och en huvudmeny</li>
                    <li>Kunna läsa ut, lägga till och radera inlägg från en bucketlist</li>
                    <li>Databas med lämpliga tabeller samt tillhörande ER-digram</li>
                    <li>Objektorienterad PHP med tillhörande klassdiagram (UML-diagram)</li>
                    <li>Tydlig filstruktur för dokument och script på din webbplats</li>
                    <li>Genererad HTML-kod validerar korrekt</li>
                    <li>Webbplatsen publiceras samt inlämning av källkods-filer, export av databas/installations-skript.</li>
                </ol>
            </div>
        </div>
    </article>

    <article class="panel-block">
        <div class="control">
            <h3 class="subtitle">Hur det var att lösa uppgiften med PHP</h3>
            <p class="">Att lösa uppgiften med PHP var både ris och ros. Det strulade mycket i starten att få PHP att fungera korrekt. Men PHP blir väldigt tydligt och är lättarbetat då script och HTML kan blandas.
                Det modulära upplägget med att kod från filer kan implementeras direkt i kodflödet var väldigt uppskattat då det endast behövdes en header och en footer för båda sidorna. Jag lär mig fortfarande objectorienterad
                programmering, men jag uppskattade att det gick att typsäkra värden in till och från metoder. Jag saknar dock hur lätt JavaScript kan hämta data och manupulera värden dynamiskt i HTML och det går även att göra på
                flera olika sätt med JavaScript.
            </p>
        </div>
    </article>

</section>

<!-- Section panel with Picture of UML diagram -->
<section class="panel container is-max-desktop mt-6 has-background-white">
    <h2 class="panel-heading title">UML-diagram</h2>

    <div class="panel-block">
        <div class="control has-text-centered">
            <img src="./diagrams/uml_diagram.svg" alt="UML-diagram för webbplatsens klasser" class="" style="max-width: 100%" width="400">
        </div>
    </div>
</section>

<!-- Section panel with Picture of ER diagram -->
<section class="panel container is-max-desktop mt-6 mb-6 has-background-white">
    <h2 class="panel-heading title">ER-diagram</h2>

    <div class="panel-block">
        <div class="control has-text-centered">
            <img src="./diagrams/er_diagram.svg" alt="ER-diagram för databasens tabell" class="" style="max-width: 100%" width="500">
        </div>
    </div>
</section>

<!-- PHP script to include the footer -->
<?php
include("includes/footer.php");
