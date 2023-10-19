<?php $this->extend('/layouts/app.php') ?>




<?php $this->section('content'); ?>

<?= $this->include('/components/Navbar/index.php'); ?>


<!-- alert -->
<div class="">
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
</div>
<!-- alert end -->


<!-- table -->
<div class="w-[80%] mx-auto">
    <form action="<?= url_to('App\Controllers\Crud\AuthorController::create') ?>" method="post" class="space-y-4">
        <div>
            <label class="label">
                <span class="text-base label-text">Name</span>
            </label>
            <input type="text" placeholder="Name" name="name" class="w-full input input-bordered input-primary" />
        </div>
        <div>
            <label class="label">
                <span class="text-base label-text">Email</span>
            </label>
            <input type="text" placeholder="Email" name="email" class="w-full input input-bordered input-primary" />
        </div>
        <div>
            <label class="label">
                <span class="text-base label-text">Password</span>
            </label>
            <input type="password" name="password" placeholder="Password" class="w-full input input-bordered input-primary" />
        </div>
        <div>
            <label class="label">
                <span class="text-base label-text">Is Admin?</span>
            </label>
            <!-- <input type="radio" name="is_admin"> -->
            <input type="checkbox" name="is_admin" value="true" >
        </div>
        <div>
            <button class="btn btn-primary">Create Author</button>
        </div>
    </form>
</div>
<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>