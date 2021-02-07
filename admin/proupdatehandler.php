<?php
include('../partials/connect.php');
if(isset($_POST['update'])){
	$newid=$_POST['form_id'];
	$newname=$_POST['name'];
	$newprice=$_POST['price'];
	$newdesc=$_POST['description'];
	


$target="uploads/";
$file_path=$target.basename($_FILES['file']['name']);
$file_name=$_FILES['file']['name'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_store="uploads/".$file_name;

move_uploaded_file($file_tmp, $file_store);


$sql="UPDATE produit set nomProduit='$newname', prixUnitaire='$newprice',  picture='$file_path', description='$newdesc'
 where noProduit='$newid'";

if (mysqli_query($connect,$sql)) {
	header('location: productsshow.php');
}else{
	header('location: adminindex.php');
}


}








?>