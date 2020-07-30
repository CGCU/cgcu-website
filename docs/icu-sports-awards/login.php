<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 2019-05-10
 * Time: 20:32
 */

session_start();
session_destroy();
session_start();

require_once 'not-public/authorised_users.php';

/* Initialise all strings to the empty string */
$username = $password = $err = '';
if(isset($_POST['sub'])) {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    /* If correct password, allow entry
     * (union ldap auth functions at dougal.union.ic.ac.uk/sysadmin) */
    if (pam_auth($username, $password) /* && in_array($username, $authorised_users, true) */) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;

        $date = new DateTime();
        $_SESSION['loginTime'] = $date->getTimestamp();

        /* Redirect to logged in page */
        header('LOCATION:awards.php');
        die();
    } else {
        unset($password);
        unset($_POST['password']);
        $err = 'Your username or password is incorrect, or you do not have permission. Please try again!';
    }
}

?>
<!-- NOTE: This page uses bootstrap 3 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
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

    <title>Login</title>

</head>

<body>

<form name='form-signin' class="form-signin" action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
    <h2 class="form-signin-heading">Sports Awards Viewer 2019 - Login</h2>
    <label for='username'></label>
    <input type='text' value='<?php echo $username;?>' id='username' class="form-control" name='username' placeholder="Username" required autofocus />
    <label for='password'></label>
    <input type='password' value='' class="form-control" id='password' name='password' placeholder="Password" required />
    <input type='submit' value='Submit' name='sub' class="btn btn-primary" />
    <div class="error"><?php echo "<p class='text-danger'>$err</p>";?> </div>
</form>

</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</html>