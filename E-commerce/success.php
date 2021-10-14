<?php
require 'includes/common.php';
if(!isset($_SESSION["email"])){
    header("location: index.php");
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
        $user_id = $_SESSION["id"];
        $query = "SELECT item_id FROM users_items WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
            
        while($row = mysqli_fetch_array($result)){
            $item_id = $row["item_id"];
            $query1 = "UPDATE users_items SET status = 'Confirmed' WHERE item_id = '$item_id'";
            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
        }
        ?>
        <div class="container">
            <div class="row row-st">
                <div class="col-xs-offset-3 col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <p class="text-warning">Your order is confirmed. Thank you for shopping with us. <a href="products.php">​Click here</a>​ to purchase any other item.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>