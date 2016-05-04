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
            
            $Code = $_POST['code'];
            $Backup = $_POST['bcname'];
            $Name = $_POST['name'];
            $Description = $_POST['description'];
            $Img_Name = $_POST['img_name'];
            $Price = $_POST['price'];
            $id = $_POST['id'];
            
            $sql = "UPDATE products set name=?, description=?, img_name=?, price=?, code=?, bcname=? WHERE id=?";
            
            $q = $db->prepare($sql);
            $q->execute(array($Name, $Description, $Img_Name, $Price, $Code, $Backup, $id));
            header("location: adminproducts.php");
        ?>
</body>
</html>