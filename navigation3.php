<head>
	<style>
	ul.navi {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}
	
	li {
		float: left;
	}
	
	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	
	a:hover:not(.active) {
		background-color: #111;
	}
	
	.active {
		background-color:#4CAF50;
	}
	</style>
</head>
<ul class="navi">
    <li><a class="active" href="userhome.php">Home</a></li>
    <li><a href="userabout.php">About Us</a></li>
    <li><a href="userproducts.php">Product</a></li>
    <li><a href="userview_cart.php">Cart</a></li>
	<li><a href="checkout.php" >Checkout</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>