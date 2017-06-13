<main>
    <?php
    @include "contentHeader.php";
    ?>
    <div class="contentBody">
        <img src="img/code.png" alt="Lines of code" class="codeImg">

        Kursen OOPHP handlar om scriptingspråket PHP och hur det används
        objektorienterat. Under kursens gång byggs ett mini-ramverk
        upp med hjälp av PHP och andra tillgångar som SASS/LESS,
        Bootstrap och SQL.
        <br><br>
        Kursen lär ut föjande engligt dbwebb:
        <blockquote cite="https://dbwebb.se/kurser/oophp-v3">
            <ul>
                <li>
                    PHP-programmering i webbmiljö, syntax, semantik, koppling
                    mot databaser, funktionsorienterad programmering,
                    datastrukturer, algoritmer och inbyggda funktioner.
                </li>
                <li>
                    Objektorienterad PHP-programmering med språkkonstruktioner
                    och begrepp. Objektorientering som sätt att strukturera
                    och återanvända kod. Enkla designmönster.
                </li>
                <li>
                    SQL och databasen MySQL tillsammans med PHP Data Objects.
                </li>
                <li>
                    Webbapplikationer, utveckling av webbapplikationer där
                    tekniker såsom webbserver (Apache), PHP, HTML, CSS, och
                    SQL integreras.
                </li>
                <li>
                    Användning av verktyg och tekniker som lämpar sig för
                    utveckling av webbapplikationer, tex UNIX/Linux,
                    installation på extern webbserver, ssh, ftp/sftp,
                    databasklienter såsom PHPMyAdmin, MySQL Workbench och
                    kommandoklienter.
                </li>
            </ul>
        </blockquote>
        <br><br>
        Hemisdans källkod finns tillgänglig på <a href="https://github.com/reblex/anax-lite">
        Github</a>. Där finns även kod till några andra projekt jag har jobbat med.
        <br><br>
        Det är möjligt att få ut lite händig information om hemsidan i ett JSON-objekt
        genom att besöka länken nedan.
        <br><br>
        <a href="<?= $app->url->create("status") ?>">Staus</a>
    </div>
</main>
