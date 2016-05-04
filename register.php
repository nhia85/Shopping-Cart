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
	
	$select = array("Admin",
					"User",
					"Business");
?>
<h1 align="center">Register</h1>
		<form method="post" action="">
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
                    <td>Confirm Password:</td>
                    <td><input type="password" name="cpass" required></td>
                </tr>
				<tr>
					<td>Role:</td>
					<td>
						<select name="role">
						<?php
							for($i = 0; $i < 3; ++$i)
							{
						?>
							<option value="<?php echo $select[$i]; ?>"><?php echo $select[$i]; ?></option>
						<?php
							}
						?>
						</select>
					</td>
				</tr>
                <tr>
                    <td>Security Question:</td>
                    <td><input type="text" name="answerquest" ></td>
                </tr>
                <tr>
                    <td>Security Answer:</td>
                    <td><input type="text" name="answer" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="addbtn" value="Register"></td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['addbtn']))
            {
                $username = $_POST['username'];
                $match_user = preg_match("/^[A-Za-z0-9_]{5,20}$/", $username) ? "True" : "False";
                $password = $_POST['password'];
                $match_pass = preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9!@#$%]{8,12}$/", $password) ? "True" : "False";
                $cpass = $_POST['cpass'];
                $answer = $_POST['answer'];
                if($match_user != "False")
                {
                    if($match_pass != "False")
                    {
                        if($password == $cpass)
                        {
                            try
                            {
                                include('connect.php');
                                $stmt = $db->prepare("INSERT INTO addin(username, password, security, security_ans, role) VALUES(:Username,:Password,:Security,:Security_ans, :Role)");
                                $stmt->execute(array("Username" => $_POST['username'], "Password" => $_POST['password'], "Security" => $_POST['answerquest'], "Security_ans" => $_POST['answer'], "Role" => $_POST['role']));
                                echo '<p class="login">Registration Successful</p>';
                            }
                            catch(PDOException $e)
                            {
                                echo 'ERROR: '. $e -> getMessage();
                            }
                        }
                        else
                        {
                            echo "Password is Incorrect";
                        }
                    }
                    else
                    {
                        echo "Password is False";
                    }
                }
                else
                {
                    echo "Username doesn't work";
                }
            }
        ?>
</body>
</html>