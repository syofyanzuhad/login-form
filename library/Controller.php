<?php

class control 
{
    function __construct()
    {
        $this->connect = new PDO ('mysql:host=localhost;dbname=method', 'root', '');
    }

    function input($barang, $harga) {
        $insert = "INSERT INTO list (nama_barang, harga) VALUE ('$barang', '$harga')";
        $query = $this->connect->query($insert);
        if (!$query) {
            return "failed";
        } else {
            return "success";
        }
    }

    function show() {
        $show = "SELECT * FROM list";
        $query = $this->connect->query($show);
        return $query;
    }

    function insert($kurir, $pengirim, $asal, $tujuan) {
        $insert = "INSERT INTO pengiriman (nama_kurir, nama_pengirim, asal, tujuan) VALUE ('$kurir', '$pengirim', '$asal', '$tujuan') ";
        $query = $this->connect->query($insert);
        if (!$query) {
            return "failed";
        } else {
            return "success";
        }
    }

    function delete($id) {
        $delete = "DELETE FROM list WHERE id='$id'";
        $query = $this->connect->query($delete);
    }

    function edit($id) {
        $edit = "SELECT * FROM list WHERE id='$id'";
        $query = $this->connect->query($edit);
        return $query;
        if (!$query) {
            echo "GAGAL";
        } else {
            echo "SUCCESS";
        }
    }

    function update($id, $barang, $harga) {
        $update = "UPDATE list SET nama_barang='$barang', harga='$harga' WHERE id='$id'";
        $query = $this->connect->query($update);
        if (!$query) {
            return "failed";
        } else {
            return "success";
        }
    }
}
