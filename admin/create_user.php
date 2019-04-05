<?php
include('../functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "로그인이 필요합니다.";
	header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin user creation</title>
</head>
<body>
	<h2>Admin - create user</h2>
	<form method="post" action="create_user.php">
		<?php echo display_error(); ?>
    <div>
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div>
    	<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div>
    	<label>User_type</label>
    	<select name="user_type" id="user_type" > <!-- user_type 선택 -->
				<option value=""></option>
				<option value="admin">admin</option>
				<option value="user">user</option>
			</select>
    </div>
    <div>
			<label>Password</label>
			<input type="password" name="password_1">
    </div>
    <div>
			<label>Confirm password</label>
			<input type="password" name="password_2">
			<button type="submit" class="btn" name="register_btn">Create user</button>
    </div>
	</form>
</body>
</html>
