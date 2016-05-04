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
            include('navigation2.php');
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
            $search = $db->prepare("SELECT * FROM orders
                                   WHERE username LIKE '%$q%' OR
                                         product LIKE '%$q%'");
            $search->execute();
            
                if($search->rowcount()==0)
                {
                    echo "No match found";
                }
                else
                {
                    echo "<br/> Search Result: <br/>";
        ?>
        <table align="center" border= "1" cellspacing= "0" cellpadding= "4">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Amount</th>
                    <th>Product Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($search as $s)
                    {
                ?>
                <tr class= "record">
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo $s['username']; ?></td>
                    <td><?php echo $s['payment']; ?></td>
                    <td><?php echo $s['amount']; ?></td>
                    <td><?php echo $s['product']; ?></td>
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