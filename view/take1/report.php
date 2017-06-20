<main>
    <?php
    @include "contentHeader.php";
    ?>
    <div class="contentBody">

        <div class="kmom">
            <div class="kmomHeader">
                <div class="title">
                    Kmom01
                </div>
                <div class="date">
                    <i>9 April 2017</i>
                </div>
            </div>
            <div class="text">
                <b><i>Hur känns det att hoppa rakt in i klasser med PHP, gick det bra?</i></b>
                <br>
                Det var roligt och jag tyckte att det gick mycket bra. Jag har
                såklart en del tidigare erfarenhet med klasser och objekt nu
                vilket gjorde att det var lätt att hoppa in i samma struktur i
                PHP. Något jag märker är hur jag blir bättre och bättre på att
                strukturera min kod i allmänhet, och nu specifikt i klasser.
                Ibland kan det bli lite rörigt men jag tycker ändå att det går
                frammåt med fart!
                <br><br>
                <b><i>Berätta om dina reflektioner kring ramverk, anax-lite och din me-sida.</i></b>
                <br>
                Första gången vi jobbade med ett ramverk, alltså i Designkursen,
                tyckte jag att det var jobbigt. Man hade ingen aning om hur större
                delen av koden fungerade och man satt bara och lade till nya saker här och
                där. Nu däremot kan jag hänga med helt på hur allt fungerar, vilket
                är vad jag vill, genom att vara med när hela ramverket byggs upp.
                Jag tycker att det har gått mycket bra, även fast det var ett väldigt
                stort första kursmoment. Dock förstår jag varför, det känns som man
                nu har en väldigt stabil grund att bygga på.
                <br><br>
                Det finns såklart fortfarande en del som jag inte är helt införstådd
                i och kan tycka vara knepiga. Alla filer som finns i default/views
                tycker jag kan vara svåra att tyda och förstå hur man ska använda.
                Dock är ju detta som jag nämnde tidigare det förstakursmomentet
                och det finns mycket tid kvar att lära sig.
                <br><br>
                <b><i>Gick det bra att komma igång med MySQL, har du liknande erfarenheter sedan tidigare?</i></b>
                <br>
                Jag har jobbat med SQL en hel del tidigare och tycker att det är
                ganska enkelt. Det är en enkel struktur och språket är inte direkt
                svårt att minnas. Därför hade jag heller inte några problem med att
                komma igång med början av SQL-uppgiften.
            </div>
        </div>

        <div class="kmom">
            <div class="kmomHeader">
                <div class="title">
                    Kmom02
                </div>
                <div class="date">
                    <i>15 April 2017</i>
                </div>
            </div>
            <div class="text">
                <b><i>Hur känns det att skriva kod utanför och inuti ramverket,
                    ser du fördelar och nackdelar med de olika sätten?</i></b>
                <br>
                Genom att använda ramverket kan man hålla kod separerad och väl
                uppdelad. Eftersom att de olika delarna är tydligt namngedda blir
                det tydligt när man använder dess funktioner. Det blir mycket kod
                så för en liten hemsida kanske det känns onödigt att bygga och använda
                ett helt ramverk. Men allt efterso att sidan utvidgas och nya delar
                läggs till är det skönt med ett ramverk då det är lätt att lägga
                till nya bitar.
                <br><br>
                <b><i>Hur väljer du att organisera dina vyer?</i></b>
                <br>
                Än så länge har jag nästan alla mina vyer i mappen "take1". Vissa
                vyer delar jag upp i flera filer (header, footer, contentHeader
                osv.) för att göra koden mer DRY. Detta är dock endast temporärt
                och är något jag kommer städa upp för att göra tydligare.
                <br><br>
                <b><i>Berätta om hur du löste integreringen av klassen Session.</i></b>
                <br>
                I "src/Session/Session.php" har jag skrivit en klass som hanterar
                Session. Denna klassen skapar jag ett objekt av(om det inte redan
                finns) i "index.php" och objektet läggs till i ramverkets variabel
                "$app". Från sessions olika routes kan jag sedan använda de olika
                medlemsfunktionerna som låter mig hantera sessionen.
                <br><br>
                <b><i>Berätta om hur du löste uppgiften med Tärningsspelet 100/Månadskalendern,
                    hur du tänkte, planerade och utförde uppgiften samt hur du
                    organiserade din kod?</i></b>
                <br>
                Jag skapade tre olika klasser i en mapp, "DiceGame", som ligger
                under src/. Klassen Dice var från början tänkt att hantera
                alla tärningsvariabler, men jag flyttade över det mesta till
                Player då jag tyckte att det passade bättre där. Dice är därför
                nu bara ett objekt man använder för att slå en tärning.
                Player-klassen innehåller logiken för att en spelara ska kunna
                spela spelet och hantera sina variabler. Klassen Game är huvudobjektet
                som hanterar hela spelet, det är där i två objekt av klassen Player
                skapas, tillsammans med ett objekt av en tärning. Jag lägger till
                Game-objektet i sessionen och i mina routes för
                tärningsspelet(som blir lite av en frontcontroller), kan man
                köra funktioner som roll, stop eller reset.
                <br><br>
                <b><i>Några tankar kring SQL så här långt?</i></b>
                Eftersom att man ska ha all kod i samma fil blir det lite klumpig
                då man inte kan köra hela filen för att testa det man har gjort.
                Istället får man köra de separata rader man vill utföra.
                Annars tycker jag att min SQL-kod är bra. Jag tycker att SQL är
                ganska lätt, men jag har ändå lärt mig några nya inbyggda funktioner.
                <br>
            </div>
        </div>

        <div class="kmom">
            <div class="kmomHeader">
                <div class="title">
                    Kmom03
                </div>
                <div class="date">
                    <i>20 Juni 2017</i>
                </div>
            </div>
            <div class="text">
                <b><i>Hur kändes det att jobba med PHP PDO, SQL och MySQL</i></b>
                <br>
                Det kändes mycket lärorikt. Jag kan nu i efterhand känna att jag
                blivit mycket säkrare på att jobba med MySQL och har fått en djupare
                förståelse för PHP PDO.
                <br><br>
                <b><i>Reflektera kring koden du skrev för att lösa uppgifterna,
                klasser, formulär, integration Anax Lite?</i></b>
                Detta var ett mycket stort kursmoment och det var mycket som skulle
                läggas till. Jag kan känna att min kod blev lite rörig eftersom
                jag inte planerade så mycket. Dock känner jag att jag gjorde det
                bästa jag kunde i stunden. Jag tyckte att det var ett ganska tungt
                kursmoment, men jag fick allting att fungera. Jag vill också poängtera
                att jag endbart skrev en setup-fil för users. I den skapas allt
                som behövs för både första och andra uppgiften.
                <br><br>
                <b><i>Känner du dig hemma i ramverket, dess komponenter och struktur?</i></b>
                <br>
                Jag tycker att jag börjar ha ganska bra koll på hur det bör fungera.
                Dock kan det ibland vara svårt att veta helt var man bör lägga vissa
                funktioner eller filer, så jag har fått improvisera några gånger.
                Annars tycker jag att det fungerar ganska bra.
                <br><br>
                <b><i>Hur bedömmer du svårighetsgraden på kursens inledadnde
                kursmoment, känner du att du lär dig något/bra saker?</i></b>
                <br>
                Ja, absolut, kursmomenten känns mycket lärorika. Dock vill jag säga
                att detta kursmomentet kändes väldigt tungt, som att det aldrig tog slut.
                Det var mycket att lära sig, och det är nog en av de största
                och svåraste kursmoment jag gjort.
                <br>
            </div>
        </div>

    </div>
    <br><br>
</main>
