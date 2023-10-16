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
                <th></th>
                <th>Name</th>
                <th>Job</th>
                <th>Favorite Color</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            <tr class="bg-base-200">
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
            </tr>
            <!-- row 2 -->
            <tr>
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
            </tr>
            <!-- row 3 -->
            <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- table end -->

<?php $this->endsection('content'); ?>

<!-- <title>halsss</title>