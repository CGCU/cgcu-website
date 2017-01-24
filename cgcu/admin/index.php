<?php

    session_start();

    /* Initialise all strings to the empty string */
    $username = $password = $err = "";

    if(isset($_POST['sub'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'password'){
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header('LOCATION:dashboard.php');
            die();
        }
        if($username !== 'admin' || $password !== 'password') {
            $err = "Your username or password is incorrect. Please try again.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">

        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin {
            margin-bottom: 10px;
        }
        .form-signin {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .error {
            padding-top: 5px;
        }

    </style>

    <title>CGCU Admin Login</title>

</head>

<body>

    <form name='form-signin' class="form-signin" action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
        <h2 class="form-signin-heading">CGCU Admin Login</h2>
        <label for='username'></label>
        <input type='text' value='<?php echo $username;?>' id='username' class="form-control" name='username' placeholder="Username" required autofocus />
        <label for='password'></label>
        <input type='password' value='<?php echo $password;?>' class="form-control" id='password' name='password' placeholder="Password" required />
        <input type='submit' value='Submit' name='sub' class="btn btn-primary" />
        <div class="error"><?php echo "<p class='text-danger'>$err</p>";?> </div>
    </form>

</body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap: Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
</html>