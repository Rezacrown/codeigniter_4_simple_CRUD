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
    <form action="post/<?= $post['id'] ?>" method="post" class="flex flex-col gap-y-10 mt-14">

        <input type="hidden" name="_method" value="PUT">

        <div class="inline-block">
            <input name="name" value="<?= $post['name'] ?>" type="text" placeholder="Name Post" class="w-full input input-bordered input-success" />
        </div>
        <div class="inline-block">
            <input name="description" value="<?= $post['description'] ?>" type="text" placeholder="Description your post" class="w-full input input-bordered input-success" />
        </div>

        <div class="inline-block">
            <select name="category_id" value="<?= $post['category_id'] ?>" required class="w-full select select-info">
                <option disabled>Select category</option>
                <?php foreach ($category as $key => $item) : ?>

                    <?php if ($item['id'] === $post['category_id']) : ?>
                        <option selected value="<?= $item['id'] ?>">
                            <?= $item['name'] ?>
                        </option>
                    <?php else : ?>
                        <option value="<?= $item['id'] ?>">
                            <?= $item['name'] ?>
                        </option>
                    <?php endif ?>

                <?php endforeach ?>
            </select>
        </div>

        <div class="inline-block">
            <input type="hidden" name="author_id" value="<?= $author['id'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>