<div class="navbar bg-base-100">
    <div class="flex-1">
        <a href="/post" class="text-xl normal-case btn btn-ghost">Tweetou</a>
    </div>
    <div class="flex-none">
        <!-- navigation for category and author -->
        <ul class="px-1 menu menu-horizontal">
            <?php if (session()->get('verified')['is_admin']) : ?>
                <li>
                    <a href="/category">Category</a>
                </li>
                <li>
                    <a href="/author">Author</a>
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

        <!-- auth nav -->
        <ul class="px-1 menu menu-horizontal">
            <?php if (session()->get('verified')) : ?>
                <li>
                    <form action="<?= route_to('auth.logout') ?>" method="post">
                        <button type="submit">Logout</button>
                    </form>
                </li>
            <?php else : ?>
                <li>
                    <a href="/login">Login</a>
                </li>
            <?php endif ?>
        </ul>

    </div>
</div>