<?php
// database connection
$connect = mysqli_connect('localhost','root','','product_crud');
if(!$connect){
    die("Database connection error".mysqli_error());
}


if(isset($_REQUEST['submit_update'])){
  $username_updated = $_REQUEST['username'];
  $email_updated = $_REQUEST['email'];
  $password_updated = $_REQUEST['password'];
  $rcv_id = $_REQUEST['edit_id'];
  $hidden_id = $_REQUEST['updating_hidden_id'];
  $update_query = "UPDATE crud_practice SET username='$username_updated', email='$email_updated', password='$password_updated' WHERE Id=$hidden_id";
  $update_query_connection = mysqli_query($connect,$update_query);
  if($update_query_connection){
    echo "updated";
  }
  
}


?>