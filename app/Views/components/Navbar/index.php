<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="text-xl normal-case btn btn-ghost">daisyUI</a>
    </div>
    <div class="flex-none">
        <ul class="px-1 menu menu-horizontal">
            <?php if (request()->getPath() === 'post/new') : ?>
                <li>
                    <a href="/post">All Post</a>
                </li>
            <?php else : ?>
                <li>
                    <a href="/post/new">Create new data</a>
                </li>


            <?php endif ?>


        </ul>
    </div>
</div>