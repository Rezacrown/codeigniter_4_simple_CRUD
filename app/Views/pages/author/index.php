<?php $this->extend('/layouts/app.php') ?>





<?php $this->section('content'); ?>

<?= $this->include('/components/Navbar/index.php'); ?>


<!-- alert -->
<div class="mt-10 mb-10">
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


<!-- add category -->
<a href="/category/new">
    <span class="mb-10 btn btn-sm btn-primary">
        Add Author
    </span>
</a>
<!-- add category end -->

<!-- table -->
<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>No.</th>
                <th>Name Author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($author as $key => $item) : ?>
                <tr>
                    <td class="bg-base-200">
                        <?= $key + 1 ?>
                    </td>
                    <td class="bg-base-200">
                        <?= $item['name'] ?>
                    </td>
                    <td class="bg-base-200">
                        <form action="/category/<?= $item['id'] ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-error btn-sm">Delete</button>
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