<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="text-xl normal-case btn btn-ghost">daisyUI</a>
    </div>
    <div class="flex-none">
        <!-- navigation for category and author -->
        <ul class="px-1 menu menu-horizontal">
            <?php if (request()->getPath() === 'post') : ?>
                <li>
                    <a href="/category">Create Category</a>
                </li>
                <li>
                    <a href="/post">Create Author</a>
                </li>
            <?php endif ?>


        </ul>

        <!-- navigation for post -->
        <ul class="px-1 menu menu-horizontal">
            <?php if (request()->getPath() === 'post/new') : ?>
                <li>
                    <a href="/post">All Post</a>
                </li>
            <?php else : ?>

                <li>
                    <a href="/post/new">Create new post</a>
                </li>

            <?php endif ?>


        </ul>
    </div>
</div>