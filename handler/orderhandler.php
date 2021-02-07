<?php
session_start();
include('../partials/connect.php');

$total=$_POST['total'];

$phone=$_POST['phone'];

$address=$_POST['address'];
$customerid=$_SESSION['customerid'];
$payment=$_POST['payment'];


$sql="INSERT INTO commande(noCommande , address, phone, prixTotal, pay_method) VAlUES('$customerid','$address','$phone','$total', '$payment')";
$connect->query($sql);


$sql2="Select noCommande  from commande order by noCommande  DESC limit 1";
$result=$connect->query($sql2);
$final=$result->fetch_assoc();
$orderid=$final['noCommande'];



foreach ($_SESSION['cart'] as $key => $value) {
	$proid=$value['item_id'];
	$quantity=$value['quantity'];


	$sql3="INSERT Into produitcommande(quantity,produit_id,etatProduit) VAlUES('$orderid','$proid','$quantity')";
	$connect->query($sql3);
	# code...
}

if ($payment=="paypal") {
	$_SESSION['total']=$total;
	header('location: paypal.php');
}else{
	echo "<script> alert('ORDER IS PLACED');
		window.location.href='../index.php';
		</script>";
}
unset($_SESSION['cart']);


?>