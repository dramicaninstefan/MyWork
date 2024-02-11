<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    print $email;

    $mysqli = new mysqli("localhost", "root", "", "interbell");
    if($mysqli->error){
      die("Greska prilikom konekcije sa bazom");
    }

    $upit = "SELECT * FROM `login`";

    $rez = $mysqli->query($upit);
    if(!$rez){
      print("Ne moze se izvrsiti upit!");
    }
    if(!($red=$rez->fetch_assoc())){
      print("Nema nista u bazi!!");
    } 

    if($email === $red['email'] && $password === $red['password']){
        header("Location: ../adminPage/admin.php");
    } else {
        header("Location: ./adminLogin.php");
    }

?>
