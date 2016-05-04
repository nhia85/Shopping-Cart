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
        <form method="post" action="add.php" enctype="multipart/form-data">
            <h3>Add a new poster</h3>
            <table>
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="iname" required></td>
                </tr>
                <tr>
                    <td>Product Description:</td>
                    <td><input type="text" name="description" required></td>
                </tr>
                <tr>
                    <td>Image Name:</td>
                    <td><input type="file" name="file" id="file"></td>
                </tr>
                <tr>
                    <td>Back up Name:</td>
                    <td><input type="text" name="bcname" required></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name="price" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="addbtn" value="Add Item"></td>
                </tr>
            </table>
        </form>
        <a href="adminproducts.php">View</a><br/>
        <?php
			if(isset($_REQUEST['addbtn']))
				{
					// open a new connection to the MySQL server.
					$con=mysqli_connect("localhost","root","password01","project"); 
					
					// Check connection
					if (mysqli_connect_errno()) //returns the error code 
					{
						//return the last error description 
						echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
					}
					
					$iname = $_POST['iname'];
					$file = $_FILES["file"]["name"];
					$size = $_FILES["file"]["size"];
					
					$description = $_POST['description'];
					$bcname = $_POST['bcname'];
					$price = $_POST['price'];
					
				//Checking if 'image name' entered and 'File attachment' has been done.
				if(empty($iname) || empty($file))
				{
					echo "<label class='err'>All field is required</label>";
				}
					
				// Checking the File Size. Maximum allowed size: 500,000 bytes (500 kb)	
				elseif($size >10000000)
				{
					echo "<label class='err'> Image size must not greater than 500kb </label>";
				}
				
				
					
				/* -- Few preparations for Checking 
						 the File Type (extension) -- */
				
				//Store the allowed extensions in an array	
				$allowedExts = array("gif", "jpeg", "jpg", "png"); 
				
				/* using explode() function, separate the 'File Name' 
				and its 'Extension' into individual elements of an array: $temp */
				$temp = explode(".", $_FILES["file"]["name"]); 
				
				/* The end() function returns the last element iof an array.
				As per array $temp, First element: File name 
									 Last element: Extension */	
				$extension = end($temp); 
				
				/* -- Checking the File Type (extension) -- */	
				if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/txt")
				|| ($_FILES["file"]["type"] == "image/png"))
				&& ($_FILES["file"]["size"] <= 500000)
				&& in_array($extension, $allowedExts)) 
				/* The in_array() searches for a specific value in an array.
				Here, searches for $extension value in $allowedExts array */
				{ 
				/*If file is of allowed extension type, then further 
				 validations for file are processed. */
					
					
					
				// Checks if any error
				if ($_FILES["file"]["error"] > 0) 
				  {
					echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
				  } 
				
				//Checks if the specific file already exists in the directory.		  
				elseif (file_exists("images/" . $_FILES["file"]["name"])) 
				  {
					echo $_FILES["file"]["name"] . "Image upload already exist. ";
				  } 
				
				/* On passing all validations, the file is moved from 
				temporary location to the directory. */
				else
				  {
					/* The move_uploaded_file() function moves an 
						uploaded file to a new location. */
					move_uploaded_file ( $_FILES["file"]["tmp_name"],
										 "images/" . $_FILES["file"]["name"] );
										 
					// Insert the 'Image name' and 'File Name' to the database					 
					mysqli_query($con,"INSERT INTO products (product_name, product_desc, product_img_name, product_img, price)
								 VALUES('$iname', '$description', '$file', '$bcname', '$price')");
									
				echo "Data Entered Successfully Saved!";
			   }
			}
			mysqli_close($con); //Close the Database Connection
			} 
        ?>
</body>
</html>