<?php
// database connection
$connect = mysqli_connect('localhost','root','','product_crud');
if(!$connect){
    die("Database connection error".mysqli_error());
}
?>

<!-- update part start -->
<?php
if(isset($_REQUEST['edit_id'])){
  $rcv_id = $_REQUEST['edit_id'];
  $get_info = "SELECT * FROM crud_practice WHERE id=$rcv_id";
  $get_query = mysqli_query($connect,$get_info);
  while($get_query_info = mysqli_fetch_assoc($get_query)){
    ?>
    <form action="update.php" method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="Username" class="form-control" id="exampleInputEmail1" value="<?php echo $get_query_info['username'];?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $get_query_info['email'];?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $get_query_info['password'];?>">
  </div>
  <input type="hidden" name="updating_hidden_id" class="form-control" value="<?php echo $rcv_id;?>">
  <button type="submit_update" name="submit" class="btn btn-primary">Submit</button>
</form>
<!-- form end -->
    <?php
    
  }
}
?>

<!-- update part end -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>