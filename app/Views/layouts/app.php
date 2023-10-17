<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <title> Halaman | <?= $title  ?? ''; ?> </title>
</head>

<body>
    <div class="container mx-auto min-h-full w-[90%]">

        <?php $this->renderSection('content'); ?>
    </div>
</body>

</html>