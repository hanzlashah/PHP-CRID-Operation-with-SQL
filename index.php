<?php
include('./config/database.php');
if (isset($_POST['submit'])) {
    extract($_POST);
    ##sql login
    $sql = "select * from users where email='$email' AND password='$password'";
    //   $sql = "insert into users(firstName,lastName,email,password) values('$firstName','$lastName','$email','$password')";
    $result = $conn->query($sql);
    if ($result->num_rows) {
        //  echo "Valid";
        //  exit;
        $_SESSION['is_user_loggedin'] = true;
        $_SESSION['user_data'] = mysqli_fetch_assoc($result);
        header("LOCATION:users.php");
    } else {
        // $_SESSION['error'] = "Something went wrong , Plese tyt agains";
        // echo "invalid" . $conn->error;
        // exit;
        $_SESSION['error'] = "Invalid login info";
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
    <title>Crud Application</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-3">
        <?php include('./include/alerts.php') ?>
        <h1>Login Form</h1>
        <form class="container mt-5" method="post" action="./index.php">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" aria-describedby="emailHelp" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="password" placeholder="password">
            </div>


            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>