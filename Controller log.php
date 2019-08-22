<?php

class Controller 
{
    function __construct() {
        $this->connect = new pdo('mysql:host=localhost;dbname=login', 'root', '');
    } 

    function logname($username) {
        $selectuser = "SELECT * FROM user WHERE username= '$username'";
        $query = $this->connect->query($selectuser);
        return $query;
        if (!$query) {
            // echo "Failed";
            return "Failed";
        } else {
            // echo "success";
            // print_r($data);
            return "Success";
        }
    }

    function login($password) {
        $login ="SELECT * from user where pass = '$password'";
        $query = $this->connect->query($login);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!$query) {
            // echo "Failed";
            return "Failed";
        } else {
            // echo "success";
            // print_r($data);
            return "Success";
        }
    }

    function register($nama, $password, $email, $gender) {
        $register = "INSERT INTO user (username, pass ,email , gend) VALUES ('$nama', '$password', '$email', '$gender')";
        $query  = $this->connect->query($register);
        if (!$query ) {
            return "Failed";
        } else {
            return "Success";
        }
    }
}
