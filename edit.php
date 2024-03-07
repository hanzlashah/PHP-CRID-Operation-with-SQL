<?php
include('./config/database.php');
include('./middlewere.php');

//  echo $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "select * from users where id=" . $_GET['id'];
    $result = $conn->query($sql);
    $users = mysqli_fetch_assoc($result);
    // echo"<pre>";print_r($users['id']);exit;
} else {
    echo "<h1>Invalid Request</h1>";
     exit;
}
//edit information

if (isset($_POST['submit'])) {
    // echo $_GET['id'];
   extract($_POST);
    // echo "<pre>";
    // print_r($_POST);
    // exit;
    $sql = "update users set firstName='$firstName' , lastName='$lastName' where id=" . $_GET['id'];
    $result = $conn->query($sql);
    // if ($result) {
    //     echo "User has been updated";
    
    // } else {
      
    //     echo "Something went wrong, plese try again" . $conn->error;
    // }
    //   header("LOCATION:users.php");

    if ($result) {
        // echo "New User Created";
        $_SESSION['success']="User has been updated";
        header("LOCATION:users.php");
    } else {
        $_SESSION['error']="Something went wrong , Plese tyt agains";
        // echo "No record created error" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-3">
        <h1>Edit Form</h1>
        <form class="container mt-5" method="post" action="./edit.php?id=<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="firstName" placeholder="First Name" value="<?php echo $users['firstName']; ?>">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="lastName" placeholder="Last Name" value="<?php echo $users['lastName']; ?>">
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div> -->

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>