<main>
    <?php
    @include "contentHeader.php";
    ?>

    <div class="contentBody">
        <div class="sessionContent">
            <?php
            @include "buttons.php";
            ?>
            <div class="info">
                <span class="title">
                    The value of the session variable "number" is currently..
                </span>
                <div class="number"><?= $number ?></div>
            </div>

        </div>
    </div>
</main>
