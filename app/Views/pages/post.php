<?php $this->extend('/layouts/app.php') ?>





<?php $this->section('content'); ?>

<?= $this->include('/components/Navbar/index.php'); ?>


<!-- alert -->
<div class="mt-10">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif ?>
</div>
<!-- alert end -->

<!-- table -->
<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>No.</th>
                <th>Name Author</th>
                <th>Post</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $key => $item) : ?>
                <tr class="bg-base-200">
                    <th><?= $key + 1 ?></th>
                    <td><?= $item['author_id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['description'] ?? '-' ?></td>

                    <td>
                        <form action="/post/<?= $item['id'] ?>" method="post">
                            <a href="/post/<?= $item['name'] ?>/edit" class="btn btn-warning">Edit</a>
                            <button type="submit" class="btn btn-error">Delete</button>
                            
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>