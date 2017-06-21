<main>
    <?php
    @include "contentHeader.php";

    $textOrig = <<<EOD
Först lite vanlig text följt av en tom rad.
Då tar vi ett nytt stycke med lite bbcode med [b]bold[/b] och [i]italic[/i] samt en [url=https://dbwebb.se]länk till dbwebb[/url].
Sen testar vi en länk till https://dbwebb.se som skall bli klickbar.
Avslutningsvis blir det en [länk skriven i markdown](https://dbwebb.se) och länken leder till dbwebb.
Avsluter med en new line konverterad till break line och en lista som formatteras till ul/li med markdown.\n
* Item 1
* Item 2
EOD;

    $new_shit = $app->tf->doFilter($textOrig, "bbcode,markdown,link,nl2br");

    ?>
    <div class="contentBody">
        <?= $new_shit ?>
    </div>
</main>
