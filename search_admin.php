<!DOCTYPE html>
<head>
    <meta charset="uft-8">
    <title>PHP examples</title>
    <link rel="stylesheet" href="styles.css" media="screen"/>
    <!-- /* ways to use php*/ -->
    <style>
        .center{
                text-align: center;
        }
    </style>
</head>
<body>
        <?php
            session_start();
            include('connect.php');
            include('navigation3.php');
            if(isset($_POST['search']))
            {
                $q = $_POST['srch_query'];
        ?>
        <div class="center">
        <h2>Search Results</h2>
        <form method="post" action="search.php">
            <input type= "text" name= "srch_query" value= "<?php echo $q ?>" required />
            <input type= "button" name="search" value= "Search" />
        </form>
        <?php
            $search = $db->prepare("SELECT product_name, product_desc FROM products
                                   WHERE product_name LIKE '%$q%' OR
                                         product_desc LIKE '%$q%'");
            $search->execute();
            
                if($search->rowcount()==0)
                {
                    echo "No match found";
                }
                else
                {
                    echo "Search Result: <br/>";
        ?>
        <table align="center" border= "1" cellspacing= "0" cellpadding= "4">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($search as $s)
                    {
                ?>
                <tr class= "record">
                    <td><?php echo $s['product_name']; ?></td>
                    <td><?php echo $s['product_desc']; ?></td>
                    <td>
                        <a href="editform.php" >edit</a>
                    </td>
                </tr>
                        <?php
                    }
            }
        }
                ?>
            </tbody>
        </table><br/>
        </div>
</body>
</html>