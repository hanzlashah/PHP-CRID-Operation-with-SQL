<?php
include('./config/database.php');
include('./middlewere.php');

//echo "<pre>"; print_r($result);exit;
// if($result ->num_rows>0){
//     while($row=$result->fetch_assoc()){
//         // echo $row;
//         print_r($row);
//     }
// }
// if ($result) {
//     echo "New User Created";
// } else {
//     echo "No record created error" . $conn->error;
// }


//Delete Operation
if (isset($_GET['id'])) {
    //     extract($_GET);
    // echo $_GET['id'];
    $sql = "delete from users where id=" . $_GET['id'];
    $result = $conn->query($sql);

    // if ($result) {
    //     echo "User has been Deleted";
    //     // header("LOCATION:user.php");
    // } else {
    //     echo "No User has been Deleted" . $conn->error;
    // }

    if ($result) {
        // echo "New User Created";
        $_SESSION['success']="User has been Deleted";
        // header("LOCATION:users.php");
    } else {
        $_SESSION['error']="Something went wrong , Plese try agains";
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
        <h1>Users Info</h1>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Oprations</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // echo $_SESSION["name"];
                include('./include/alerts.php');
                $sql = "select * from users";
                $result = $conn->query($sql);
                //print_r($result);
                if (!$result) {
                    die("query Failed");
                } else {
                    $num = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo"print";
                ?>
                        <tr>
                            <td><?php echo   $num; ?></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><a href="./users.php?id=<?php echo $row['id']; ?>">Delete</a> &nbsp;&nbsp;&nbsp;
                                <a href="./edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                        </tr>

                <?php
                        $num++;
                    }
                }
                ?>





            </tbody>



            <tr>
                <td colspan="1"><a href="./register.php">Register</a></td>
                <td><a  class="btn btn-primary" href="./logout.php">Logout</a></td>
            </tr>
        </table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>