<?php
require('config/auth.php');
require 'layouts/auth/header.php' ;
$cek =new Auth;
    if(!isset($_GET['page'])){
        echo "<script>";
        echo "alert('harus login dulu');";
        echo "window.location.href = 'index.php?page=login';";
        echo "</script>";
    }
    if($_GET['page'] == 'login'){
        require 'login.php' ;

    } elseif($_GET['page'] == 'register'){
        include 'register.php' ;
    } elseif($_GET['page'] == 'postlogin'){
        $cek->login($_POST['email'],$_POST['password']);
    }elseif($_GET['page'] == 'postregister'){
        if($_POST['Username'] == null){
            echo "<script>";
        echo "alert('harus login dulu');";
        echo "window.location.href = 'index.php?page=login';";
        echo "</script>";
        } else {

            $data['Username'] = $_POST['Username']; 
            $data['Password'] = $_POST['Password']; 
            $data['NamaLengkap'] = $_POST['NamaLengkap']; 
            $data['Email'] = $_POST['Email']; 
            $data['Alamat'] = $_POST['Alamat']; 
            $cek->register($data);
        }
    }
    elseif ($_GET['page'] == 'logout'){
        $cek->logout();
    }


    require 'layouts/auth/footer.php';
?>