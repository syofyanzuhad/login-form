<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .bold {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h2 style="margin-bottom:50px">Daftar Barang</h2>
        <table class="table text-left table-bordered">
            <tr class="bold">
                <td>No. </td>
                <td>Nama Barang</td>
                <td>Harga Barang</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>

                <?php
                require('Controller.php');
                $conn = new control();
                $query = $conn->show();
                // $result = $query->fetch(PDO::FETCH_OBJ);

                while ($show = $query->fetch(PDO::FETCH_OBJ)) {
                    echo "
                    <tr>
                    <td> $show->id</td>
                    <td> $show->nama_barang</td> 
                    <td> Rp. $show->harga,00</td> 
                    <td> <a class='btn btn-warning' href='edit.php?id=$show->id'>Edit </td> 
                    <td> <a class='btn btn-danger' href='list.php?delete=$show->id'>Delete </td>
                    </tr> ";
                };
                ?>

        </table>
        <div class="text-left">
            <a class="btn btn-primary " href="post.php">Tambah Barang</a>
        </div>
    </div>
</body>

<?php

if (isset($_GET['delete'])) {
    $delete = $conn->delete($_GET['delete']);
    header('Location: list.php');
}
?>

</html>