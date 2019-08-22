<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Input Data Pengiriman</h2>
    <div class="container" style="padding-bottom:50px">
        <form method="get" action="get.php">
            <table>
                <tr>
                    <td>Nama Kurir </td>
                    <td>: <input type="text" name="kurir"> </td>
                </tr>
                <tr>
                    <td>Nama Pengirim </td>
                    <td>: <input type="text" name="pengirim"> </td>
                </tr>
                <tr>
                    <td>Asal Barang </td>
                    <td>: <input type="text" name="asal"> </td>
                </tr>
                <tr>
                    <td>Tujuan Barang </td>
                    <td>: <input type="text" name="tujuan"> </td>
                </tr>
                <tr>
                    <td> <input type="submit" name="submit"> </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
require('Controller.php');
$kurir = $_GET['kurir'];
$pengirim = $_GET['pengirim'];
$asal = $_GET['asal'];
$tujuan = $_GET['tujuan'];

if (isset($_GET['submit'])) {
    // echo "<table>
    // <tr><td>Kurir     </td> <td>: " . $kurir . "</td>      </tr>
    // <tr><td>Pengirim  </td> <td>: " . $pengirim . "</td>   </tr>
    // <tr><td>Asal      </td> <td>: " . $asal . "</td>       </tr>
    // <tr><td>Tujuan    </td> <td>: " . $tujuan . "</td>     </tr>
    // </table>";
    $conn = new control();
    $ins = $conn->insert($kurir, $pengirim, $asal, $tujuan);
    if ($ins == "success") {
        echo "SUCCESS";
    }
}
