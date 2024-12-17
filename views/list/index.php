<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>List Page</title>
</head>
<body>
<section class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/list">List</a>
        </li>
    </ul>

    <br>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_GET['error'] ?>
        </div>
    <?php endif ?>


    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success" role="alert">
            <?= $_GET['message'] ?>
        </div>
    <?php endif ?>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Size</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><?= $file['filename'] ?></td>
                <td><?= $file['filesize'] ?></td>
                <td>
                    <a href="<?= '/list/table?doc=' . $file['filename'] ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="<?= '/list/download?doc=' . $file['filename'] ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-download"></i>
                    </a>
                    <a href="<?= '/list/delete?doc=' . $file['filename'] ?>" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>