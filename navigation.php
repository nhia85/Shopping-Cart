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
    <li><a class="active" href="home.php">Home</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="products.php">Product</a></li>
    <li><a href="login.php">Login</a></li>
	<li><a href="register.php">Register</a></li>
</ul>