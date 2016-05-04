<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
	p.login {
		text-align: center;
	}
</style>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	include_once('navigation.php');
?>
<h1 align="center">Login</h1>
		<form method="post" action="authenticate.php">
            <table align="center">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="addbtn" value="Login"></td>
                </tr>
            </table>
        </form>

        <?php
		/*
            if(isset($_POST['addbtn']))
            {
                $username = $_POST['username'];
                $match_user = preg_match("/^[A-Za-z0-9_]{5,20}$/", $username) ? "True" : "False";
                $password = $_POST['password'];
                $match_pass = preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9!@#$%]{8,12}$/", $password) ? "True" : "False";
                if($match_user != "False")
                {
                    if($match_pass != "False")
                    {
                        try
                        {
                            include('connect.php');
                            $stmt = $db->prepare("SELECT username, password FROM addin WHERE username = ':Username' AND password = ':Password'");
                            $stmt->execute(array("Username" => $_POST['username'], "Password" => $_POST['password']));
                            echo '<p class="login">Login Successful</p>';
                        }
                        catch(PDOException $e)
                        {
                            echo 'ERROR: '. $e -> getMessage();
                        }
                    }
                    else
                    {
                        echo "Incorrect Password";
                    }
                }
                else
                {
                    echo "Incorrect Username";
                }
            }*/
        ?>
</body>
</html>