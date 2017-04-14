<main>
    <?php
    @include "contentHeader.php";
    ?>

    <div class="contentBody">
        <div class="diceGameArea">
            <div class="scores">
                <div class="title">
                    Totala poäng
                </div>
                <span class="total">Spelare 1 | <?= $p1Score ?> poäng.</span>
                <span class="total">Spelare 2 | <?= $p2Score ?> poäng.</span>
            </div>
            <div class="game">
                <span>Din tur, spelare <?= $currentPlayerNum ?>.</span>
                <span>Du har sammanlagt rullat <?= $rollTotal ?> poäng.</span>
                <br><br>
                <span><i>Du kan fortsätta att slå och samla poäng, eller
                stanna och slå samman dina rullade poäng med dina totala poäng.
                Slår du en etta blir det direkt nästa spelares tur och du förlorar
                då alla dina slagna poäng(men inte dina total poäng). Först
                till 100 totala poäng vinner.</i></span>
                <br><br>
                <a href="<?= $link_roll ?>">
                    <li class="button reportBtn">Slå</li>
                </a>
                <a href="<?= $link_stop ?>">
                    <li class="button stopBtn">Stanna</li>
                </a>
                <a href="<?= $link_restart ?>">
                    <li class="button homeBtn">Starta om</li>
                </a>
                <br><br><br>
                <span class="status"><?= $status ?></span>
            </div>
        </div>
    </div>
</main>
