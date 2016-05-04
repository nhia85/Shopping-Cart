<!DOCTYPE html>
<head>
    <meta charset="uft-8">
    <title>PHP examples</title>
    <link rel="stylesheet" href="styles.css" media="screen"/>
    <!-- /* ways to use php*/ -->
    <style>
        
    </style>
</head>
<body>
        <?php
            session_start();
            include('connect.php');
            include('userlogin.php');
            include('navigation3.php');
            
            $grand_total = $_SESSION['total'];
            //$product_name = $_SESSION['name'];
            //$cart = $_SESSION['cart'];
        ?>
        <form method="post" action="">
            <h3>Checkout</h3>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Payment Total:</td>
                    <td><input type="text" name="payment" value="<?php echo $grand_total; ?>" readonly></td>
                </tr>
                <tr><?php echo $product_qty; ?>
                    <td>Amount:</td>
                    <td><input type="text" name="amount" value="<?php
                    foreach ($_SESSION["cart_products"] as $cart_itm)
                    {
                        $product_qty = $cart_itm["product_qty"];
                        $total += $product_qty;
                    }
                    echo $total;
                        ?>
                    " readonly></td>
                </tr>
                <tr>
                    <td>Products Name:</td>
                        <td>
                            <textarea name="textarea" type="text" rows="6" cols="60" readonly><?php
                                    foreach ($_SESSION["cart_products"] as $cart_itm)
                                        {
                                            $product_name = $cart_itm["product_name"];
                                            echo $product_name;
                                            echo ", ";
                                        }
                                ?>
                            </textarea>
                        </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="checkout" value="Checkout"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['checkout']))
            {
                try
                {
                    include('connect.php');
                    $stmt = $db->prepare("INSERT INTO orders(username, payment, amount, product) VALUES(:username,:payment,:amount,:textarea)");
                    $stmt->execute(array("username" => $_POST['username'], "payment" => $_POST['payment'], "amount" => $_POST['amount'], "textarea" => $_POST['textarea']));
                    echo "Your products will be looked at.";
                    session_destroy();
                }
                catch(PDOException $e)
                {
                    echo 'ERROR: '. $e -> getMessage();
                }
            }
        ?>
</body>
</html>