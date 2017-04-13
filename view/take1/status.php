<main>
    <?php
    @include "contentHeader.php";
    ?>

    <div class="contentBody">
        <div class="sessionContent">
            <?= @include "buttons.php" ?>
            <div class="info">
                <span class="title">
                    Status JSON..
                </span>
                <?= $statusData ?>
            </div>

        </div>
    </div>
</main>
