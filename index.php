<?php
// database connection
$connect = mysqli_connect('localhost','root','','product_crud');
if(!$connect){
    die("Database connection error".mysqli_error());
}
if(isset($_POST['submit'])){
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // data inserted
    if($username && $email && $password){
        $insert_query = "INSERT INTO crud_practice(username, email, password) VALUES ('$username','$email','$password')";
        $insert_query_connect = mysqli_query($connect,$insert_query);
        if(!$insert_query_connect){
            die("Data not inserted".mysqli_error());
        }
    }else{
        echo 'Any field cannot be blanked';
    }
    header("location: index.php");
    exit;
  }
    // data show
    $show_query = "SELECT * FROM crud_practice";
    $show_query_connection = mysqli_query($connect,$show_query);
    $count = mysqli_fetch_assoc($show_query_connection);
    if($count>0){
    ?>
    <!-- table start -->
  <table class="table">
    <thead>
        <tr>
          <th scope="col">Serial no.</th>
          <th scope="col">DB ID</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <?php
    $serial_no= 0;
    while($fetch_data = mysqli_fetch_assoc($show_query_connection)){
      $db_id = $fetch_data['Id'];
      $db_username = $fetch_data['username'];
      $db_email = $fetch_data['email'];
      $db_password = $fetch_data['password'];
      $serial_no++;
?>
<tbody>
    <tr>
      <th scope="row"><?php echo $serial_no;?></th>
      <td><?php echo $db_id;?></td>
      <td><?php echo $db_username;?></td>
      <td><?php echo $db_email;?></td>
      <td><?php echo $db_password;?></td>
      <td><a href="edit.php?edit_id=<?php echo $db_id;?>">Edit</a> || <a href="delete.php?Id=<?php echo $db_id?>">Delete</a></td>
    </tr>
  </tbody>
<?php
    }
?>
</table>
<?php
    }else{
      echo "Empty database";
    }
?>
<!-- table end -->
<!-- form start -->

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
<form action="index.php" method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<!-- form end -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>