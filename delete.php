<?php
$connect = mysqli_connect('localhost','root','','product_crud');
if(!$connect){
    die("Database connection error".mysqli_error());
}
$recv_id = $_REQUEST['Id'];
$delete_query = "DELETE FROM crud_practice WHERE Id=$recv_id";
$delete_query_connection = mysqli_query($connect,$delete_query);
if($delete_query_connection){
    header("location:index.php?deleted");
}


?>


