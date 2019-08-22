<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center" style="padding-bottom:50px">
        <h2 style="margin-bottom:50px">Input Barang</h2>
        <form method='post' action="post.php" class="form-group-row text-left">
            <table>
                <tr>
                    <td>Nama Barang </td>
                    <td>: </td><td><input type="text" name="barang" class="form-control"> </td>
                </tr>
                <tr>
                    <td>Harga </td>
                    <td>: </td><td><input type="text" name="harga" class="form-control"> </td>
                </tr>
                <tr>
                    <td><input class="btn btn-primary" type="submit" name="kirim"> </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>


<?php
require('Controller.php');
$barang = $_POST['barang'];
$harga = $_POST['harga'];

if (isset($_POST['kirim'])) {
    // echo $barang." : Rp. ".$harga.",00 <br>";

    $conn = new control();
    $insert = $conn->input($barang, $harga);
    if ($insert == "success") {
        header('Location: list.php');
    } else {
        echo "INPUT FAILED !";
    }
}

?>