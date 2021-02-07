<?php
include("../partials/connect.php");
$noProduit=$_POST['noProduit'];
$name=$_POST['name'];
$price=$_POST['price'];
$description=$_POST['description'];



$target="uploads/";
$file_path=$target.basename($_FILES['file']['name']);
$file_name=$_FILES['file']['name'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_store="uploads/".$file_name;

move_uploaded_file($file_tmp, $file_store);








$sql="INSERT INTO produit(noProduit,nomProduit,prixUnitaire,picture,description)
 VALUES('$noProduit','$name','$price','$file_path','$description')";
$connect->query($sql);


header('location: productsshow.php');
?>