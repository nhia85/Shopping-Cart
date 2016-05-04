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
            include('navigation2.php');
        ?>
        <h2>Orders Made by Customer</h2>
       <form method= "post" action= "search_orders.php">
                <input type= "text" name= "srch_query" placeholder= "Search here..." required />
                <input type= "submit" name= "search" value= "search" />
        </form>
        <br/>
        <table border="1" cellspacing="0" cellpadding="4">
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
            include('connect.php');
            $result = $db->prepare("SELECT * FROM orders");
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++)
            {
        ?>
        <tr class="record">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['payment']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['product']; ?></td>
        </tr>
        <?php } ?>
</body>
</html>