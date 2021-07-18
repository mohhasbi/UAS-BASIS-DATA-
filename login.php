<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style_login.css">
    </head>
   
    <body>

    <?php
				require('config.php');
				session_start();
				// If form submitted, insert values into the database.
				if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($conn,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "
			<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to 
				<a href='login.php'>Login</a>
			</div>";
				}
    }else{
?>  
        <div class="form">
        <div class="container">
          <h1>Admin Login</h1>
            <form action="" method="post" name="login">
                <label>Username</label><br>
                <input type="text" name="username"><br>
                <label>Password</label><br>
                <input type="password" name="password"><br>
                <input type="submit" class="btn btn-primary" name="submit" value="LOGIN"/>
            </form>
    </div>    
        <?php } ?> 
    </body>
</html>