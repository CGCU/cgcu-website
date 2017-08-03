<?php

    /* CONTACT FORM PHP LOGIC */
    // https://github.com/bootstrapbay/contact-form/blob/master/index.php

    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Website Contact Form';
        $to = 'guilds@imperial.ac.uk';
        $subject = 'Message from Website Form from: ' . $email;

        $body ="From: $name\n E-Mail: $email\n Message:\n $message";

        // Check if name has been entered
        $errName = "";
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }

        // Check if email has been entered and is valid
        $errEmail = "";
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }

        //Check if message has been entered
        $errMessage = "";
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        //Check if simple anti-bot test is correct
        $errHuman = "";
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }

        // If there are no errors, send the email
        if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
            // note: the mail function does not work on local phpstorm testserver
            if (mail ($to, $subject, $body, $from)) {
                $result='<div class="alert alert-success">Thank You! Your message has been sent to the committee.</div>';
            } else {
                $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later or email <strong>guilds@imperial.ac.uk</strong> instead.</div>';
            }
        }
    }

    /* END CONTACT FORM PHP LOGIC */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- To ensure proper rendering and touch zooming on mobile, add the viewport meta tag to your <head>. -->
        <!-- maximum-scale=1, user-scalable=no" make it so that the page cannot be zoomed on touch devices-->
        <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Page Title -->
        <title>Contact Us</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

        <!-- Stylesheet -->
        <link href="css/main.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet">

        <!-- Page Specific CSS -->
        <style type="text/css">

            /* Make title more readable with current background */
            /* Surrounds text (due to span tag) with opaque black box
                to make black stand out slightly more */
            #titleSpan {
                background-color:rgba(255,255,255,0.5);
                padding: 5px;
            }

            /* In addition to the css in main for jumbotronTitle */
            .jumbotronTitle {
                background: url("images/contact/contact-banner.jpg") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-position: 80% 120%;
            }

        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <!-- Lets not
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
            <!-- VARIABLE: <div class="container-fluid"> when less than 1200
                 or <div class="container">
             -->
            <div class="variable-fluid container-fluid">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <img class="img-responsive navbar-logo" src="images/cgcu_logo_small.jpg" alt="CGCU Logo" width="60">
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-hover">
                            <li><a href="../index.html">Home<span class="sr-only">(current)</span></a></li>
                            <li class="dropdown"> <!-- About the CGCU, History & Mascots -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">The CGCU<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="history.html">History</a></li>
                                    <li><a href="mascots.html">Mascots</a></li>
                                    <li><a href="committee.html">Committee</a></li>
                                </ul>
                            </li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="depsocs.html">DepSocs</a></li>
                            <li><a href="clubs.html">Clubs</a></li>
                            <li><a href="welfare.html">Welfare</a></li>
                            <li><a href="cgca.html">CGCA</a></li>
                            <li><a href="regalia.html">Regalia</a></li>
                            <li><a href="sponsors.html">Sponsors</a></li>
                            <li class="active"><a href="contact.php">Contact Us</a></li>

                        </ul>

                        <!-- Fixed right side of the navbar -->
                        <ul class="navbar-social-media nav navbar-nav navbar-right">
                            <!-- Facebook icon & link, with facebook blue color -->
                            <!-- target="_blank" opens in new tab
                                  and rel="noopener noreferrer" protects against _blank vunerability -->
                            <li><a target="_blank" rel="noopener noreferrer"
                                   href="http://www.facebook.com/IC.CGCU/">
                                <i class="fa fa-facebook-official fa-2x header-icon" style="color: #3B5998"></i>
                                <span id="facebook-navbar"></span>
                            </a></li>
                            <!-- Twitter icon & link, with facebook blue color -->
                            <li><a target="_blank" rel="noopener noreferrer"
                                   href="http://twitter.com/ic_cgcu/">
                                <i class="fa fa-twitter-square fa-2x header-icon" style="color: #55ACEE"></i>
                                <span id="twitter-navbar"></span>
                            </a></li>

                        </ul>


                        <!-- END Fixed right side of the navbar -->

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>
        </nav>
        <!-- END NAVBAR -->

    </head>

    <div class="jumbotron jumbotronTitle">
        <div class="container">
            <h2 class="page-title-invert">
                <span id="titleSpan">
                    Contact Us
                </span>
            </h2>
        </div>
    </div>


    <body>

        <div class="container well white-bkg">
            <p>
                Please use the contact form below, email us at guilds@imperial.ac.uk,
                or message us on <a href="http://www.facebook.com/IC.CGCU/">facebook</a>,
                and one of our committee will get back to you.
            </p>
        </div>

        <!-- CONTACT FORM -->

        <div class="container well white-bkg">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form class="form-horizontal" role="form" method="post" action="contact.php">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                                <?php echo "<p class='text-danger'>$errName</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@imperial.ac.uk" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                <?php echo "<p class='text-danger'>$errEmail</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                                <?php echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                                <?php echo "<p class='text-danger'>$errHuman</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <?php echo $result; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- END CONTACT FORM -->

        <!-- FOOTER -->
        <footer>
            <div class="container well white-bkg footer-container">
                <img class="img-responsive" src="images/footer.png" alt="Footer Divider" width="1253" height="232">

                <div class="text-center text-muted">
                    &copy; City and Guilds College Union 2016
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->

    </body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap: Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Main Javascript -->
    <script type="text/javascript" src="js/main.js"></script>

    <!-- Navbar JavaScript -->
    <script type="text/javascript" src="js/navbar.js"></script>

</html>