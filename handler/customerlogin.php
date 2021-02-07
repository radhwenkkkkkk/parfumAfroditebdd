<?php
session_start();

if(isset($_POST['login'])){

include('../partials/connect.php');



$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * from client_entity Where email='$email' AND password='$password'";
$results=$connect->query($sql);
$final=$results->fetch_assoc();

$_SESSION['email']=$final['email'];
$_SESSION['password']=$final['password'];

$_SESSION['customerid']=$final['codeClient'];



if($email=$final['email'] AND $password=$final['password']){
  header('location: ../cart.php');
}else{
  echo "<script> alert('Credentials are wrong');
        window.location.href='../customerforms.php';
        </script>";
}






}



?>