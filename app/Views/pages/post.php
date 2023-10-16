<?php $this->extend('/layouts/app.php') ?>





<?php $this->section('content'); ?>

<?= $this->include('/components/Navbar/index.php'); ?>
<?= $this->include('/components/Breadcrumb/index.php'); ?>

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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $key => $item) : ?>
                <tr class="bg-base-200">
                    <th><?= $key + 1 ?></th>
                    <td><?= $item['author_id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['description'] ?? '-' ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>