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
            include('adminlogin.php');
            $id = $_GET['id'];
            
            $result = $db->prepare("SELECT product_name, product_desc, product_img_name, product_img, price FROM products WHERE id = :imgid");
            $result->bindParam(':imgid',$id);
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++)
            {
        ?>
        <form action="" method="post">
            <input type="hidden" name="memids" value="<?php echo $id; ?>" />
            
            Product Name:
            <input type="text" name="name" value="<?php echo $row['product_name']; ?>" /><br/>
            
            Product Description:
            <input type="text" name="description" value="<?php echo $row['product_desc']; ?>" /><br/>
            
            Image Name:
            <input type="text" name="img_name" value="<?php echo $row['product_img_name']; ?>" /><br/>
            
            Back up Name:
            <input type="text" name="bcname" value="<?php echo $row['product_img']; ?>" /><br/>
            
            Price:
            <input type="text" name="price" value="<?php echo $row['price']; ?>" /><br/>
            
            <input type="submit" value="Save" name="submit" />
            <a href="adminproducts.php" >Admin Products</a>
            <br/>
        </form>
        <?php
            }
            if(isset($_POST['submit']))
			{
				try
				{
					include('connect.php');
					$work = $db->prepare("UPDATE products SET product_name = :name, product_desc = :description, product_img_name = :image,
                                         product_img = :bcname, price = :price WHERE id = :memids");
					$work->execute(array(":name" => $_POST['name'], ":description" => $_POST['description'],
                                         ":image" => $_POST['img_name'], ":bcname" => $_POST['bcname'],":price" => $_POST['price'], ":memids" => $_POST['memids']));
                    echo "It works";
				}
				catch(PDOException $e)
				{
					echo 'ERROR: '. $e -> getMessage();
				}
			}
        ?>
</body>
</html>