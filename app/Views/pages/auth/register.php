<?php $this->extend('/layouts/app.php') ?>



<?php $this->section('content') ?>


<!-- alert -->
<div class="mt-10 mb-10">
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= session()->getFlashdata('error') ?></span>
        </div>
    <?php endif ?>
</div>

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


<div class="relative flex flex-col justify-center h-screen overflow-hidden">
    <div class="w-full p-6 m-auto rounded-md shadow-md lg:max-w-lg bg-secondary-content">
        <h1 class="text-3xl font-semibold text-center text-purple-700">Register Page</h1>

        <form action="<?= route_to('auth.register') ?>" method="post" class="space-y-4">
            <div>
                <label class="label">
                    <span class="text-base label-text">Name</span>
                </label>
                <input type="text" placeholder="Your Name" name="name" class="w-full input input-bordered input-primary" />
            </div>
            <div>
                <label class="label">
                    <span class="text-base label-text">Email</span>
                </label>
                <input type="text" placeholder="Your Email Address" name="email" class="w-full input input-bordered input-primary" />
            </div>
            <div>
                <label class="label">
                    <span class="text-base label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="Enter Your Password" class="w-full input input-bordered input-primary" />
            </div>
            <div class="gap-x-3">
                <button class="btn btn-primary">Register</button>
                <a href="/login" class="cursor-pointer btn btn-accent">Login Page</a>
            </div>
        </form>
    </div>
</div>


<?php $this->endsection('content') ?>