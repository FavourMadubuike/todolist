<?php
// Insert(user input store in the database)

include("connection.php");
// echo $msg;


if (isset($_POST['sub'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $myinsertquery="INSERT INTO `favour_tbl` (`Name`, `Email`, `Password`)
    VALUES ('$name','$email','$password')";
    mysqli_select_db($connect, "form");
    mysqli_query($connect, $myinsertquery);
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="form.css">
    
    <title>Sign up form</title>
</head>
<body>
   <main class="context d-flex justify-content-center align-item-center container my-5">

        <section class="img_content">
            <img class="" src="images/singnup.jpg" alt="" width="465px" height="470px">

            <div class="img_text text-light m-5 py-5">
                <p class="fw-bold fs-3 text-center">Start turning your ideals into reality</p>
                <p class="">Create a free account and get full access to all features for 30-days. No credit card needed. Trusted by over 4,000 professionals.</p>
            </div>
        </section>

        <form class="p-5 bg-light" action="" method="post">
            <h2 class="fs-3 fw-bold">sign up</h2>

            <div>
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" maxlength="8" class="form-control" name="password" id="password" placeholder="Create a password" > 
                <p>Must be at least 8 characters</p>
            </div>

            <input type="submit" name="sub">
            <!-- <button type="submit">Get Started</button> -->

            <p>Already have an account <a href="login.php">Login</a></p>
        </form>
    </main> 
</body>
</html>