<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <h2 style="margin-bottom:50px"> Edit Barang <?php echo $_GET['id'] ?></h2>

        <form method="post" action="edit.php?id=<?php echo $_GET['id'] ?>" >
            <div class="row text-left ">
                <table>
                    <tr>
                        <td>Nama Barang :</td>
                        <td>Harga :</td>
                    </tr>

                    <?php
                    $pilih = $_GET['id'];
                    require('Controller.php');
                    $conn = new control();
                    $edit = $conn->edit($pilih);
                    $result = $edit->fetch(PDO::FETCH_OBJ);
                    ?>
                    <tr>
                        <td> <input type="text" name="barang" class="form-control" value="<?= $result->nama_barang ?>"> </td>
                        <td> <input type="text" name="harga" class="form-control" value="<?= $result->harga ?>" </td> </tr> <tr>
                    </tr>
                    <tr>
                        <td><br><input type="submit" class="btn btn-primary" name="update" value="Ubah"> </td>
                    </tr>

                </table>
            </div>
        </form>
    </div>
    <?php
    $barang = $_POST['barang'];
    $harga = $_POST['harga'];

    if (isset($_POST['update'])) {

        $update = $conn->update($pilih, $barang, $harga);
        if ($update == "success") {
            header('Location: list.php');
        }
    }
    ?>
</body>

</html>