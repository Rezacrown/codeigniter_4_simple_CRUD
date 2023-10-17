<div class="">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a>Home</a></li>

            <?php if (request()->getUri()->getSegment(1)) : ?>
                <li>
                    <?= request()->getUri()->getSegment(1) ?>
                </li>
            <?php endif ?>

            <?php if (request()->getUri()->getSegment(2)) : ?>
                <li>
                    <?= request()->getUri()->getSegment(2) ?>
                </li>
            <?php endif ?>



        </ul>
    </div>
</div>