<?php $this->extend('/layouts/app.php') ?>





<?php $this->section('content'); ?>

<?= $this->include('/components/Navbar/index.php'); ?>


<!-- alert -->
<?php if (session()->has('validation')) : ?>
    <?php foreach (session()->getFlashdata('validation') as  $key) : ?>
        <?php foreach (array($key) as $error) : ?>
            <div class="mt-4 alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>
                    <?= $error ?? '' ?>
                </span>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>
<?php endif ?>
<!-- alert end -->


<!-- table -->
<div class="w-[80%] mx-auto">
    <form action="<?= url_to('\App\Controllers\Crud\PostController::create') ?>" method="post" class="flex flex-col gap-y-10 mt-14">

        <div class="inline-block">
            <input name="name" type="text" placeholder="Name Post" class="w-full input input-bordered input-success" />
        </div>
        <div class="inline-block">
            <input name="description" type="text" placeholder="Description your post" class="w-full input input-bordered input-success" />
        </div>

        <div class="inline-block">
            <select name="category_id" required class="w-full select select-info">
                <option disabled selected>Select category</option>
                <?php foreach ($category as $key => $item) : ?>
                    <option value="<?= $item['id'] ?>">
                        <?= $item['name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="inline-block">
            <select name="author_id" required class="w-full select select-info">
                <option disabled selected>Select Author</option>
                <?php foreach ($author as $key => $item) : ?>
                    <option value="<?= $item['id'] ?>">
                        <?= $item['name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create new Post</button>
    </form>
</div>
<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>