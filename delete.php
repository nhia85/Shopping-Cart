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
            include('connect.php');
            
            $id = $_GET['id'];
            $result = $db->prepare("DELETE FROM products WHERE id= :memid");
            $result->bindParam(':memid', $id);
            $result->execute();
            header("location: adminproducts.php");
        ?>
</body>
</html>