<?php $this->extend('/layouts/app.php') ?>





<?php $this->section('content'); ?>

<?= $this->include('/components/Navbar/index.php'); ?>


<!-- alert -->
<div class="my-10">
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

<div class="flex flex-col flex-wrap justify-center md:flex-row md:gap-x-8 md:gap-y-10 gap-y-3">
    <?php foreach ($posts as $key => $item) : ?>

        <div class="shadow-xl sm:w-40 md:w-3/12 card bg-base-300">
            <div class="card-body">
                <h2 class="card-title text-accent">
                    <?= $item['name'] ?>
                </h2>
                <p  class="text-accent-content" >
                    <?= isset($item['description']) ? $item['description'] : '-' ?>
                </p>
                
                <div class="justify-end card-actions">
                    
                    <?php if ($is_admin || $item['author_id'] == session()->get('verified')['id']  ) : ?>
                        <form action="/post/<?= $item['id'] ?>" method="post">
                        
                            <a href="/post/<?= $item['name'] ?>/edit" class="btn btn-sm btn-warning">Edit</a>

                            <button type="submit" class="btn btn-sm btn-error">Delete</button>
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    <?php endif ?>

                </div>
            </div>
        </div>


    <?php endforeach ?>
</div>

<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>