<?php
require 'includes/common.php';
if(isset($_SESSION["email"])){
    header("location: products.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lifestyle Store</title>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        <div class="container">
            <div class="row row-style">
                <div class="col-xs-offset-4 col-xs-4">
                    <div>
                        <h2>SIGN UP</h2>
                        <form method="POST" action="signup_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name"
                                placeholder="Name"
                                pattern="[A-Za-z-0-9]+\s[A-Za-z-'0-9]+" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" pattern=".{6,}" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="contact" placeholder="Contact" maxlength="10" size="10" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>