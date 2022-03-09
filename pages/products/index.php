<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h1> <?= Auth::fullname() ?> </h1>

    <a href="/products/create" class="btn btn-primary mb-5">Create</a>


    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h1>Products</h1>

    <table class="table table-hover table-bordered table-dark">
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Image</td>
            <td>AVG Review</td>
            <td>Action</td>

        </tr>

        <?php

        foreach ($products as $product) { ?>
            <tr>
                <td> <?= $product["name"] ?> </td>
                <td> <?= $product["description"] ?> </td>
                <td><img src="/public/img/<?= $product["image"] ?>" width="100px" alt=""></td>
                <td> <?= $product["avg_review"] ?> </td>
                <td>
                    <a href="/products/edit?id=<?= $product["id"] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php for ($i = 1; $i <= ceil($count / $pagination); $i++) { ?>

        <a
                href="/products?page=<?= $i ?>"
                class="btn btn-outline-primary <?= $i == $page ? 'active' : '' ?>"
        >
            <?= $i ?>
        </a>

    <?php } ?>

    <br>
    <br>

    <form method="POST" action="log-out">
        <input type="submit" value="log out" class="btn btn-danger">
    </form>


</div>


</body>
</html>