<?php
include('functions.php');
if (!isLoggedIn()) {
  	$_SESSION['msg'] = "로그인이 필요합니다.";
  	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body>
<h2>쿠폰 사용 페이지</h2>
  <!-- 알림 메세지 -->
	<?php if (isset($_SESSION['success'])) : ?>
		<h3>
			<?php
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			?>
		</h3>
	<?php endif ?>
	<!-- 로그인한 user 정보 -->
  <?php if (isset($_SESSION['user'])) : ?>
  	<strong><?php echo $_SESSION['user']['username']; ?></strong>

  	<small>
  		<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
  		<br>
  		<a href="index.php?logout='1'" style="color: red;">logout</a>
  	</small>

  <?php endif ?>
</body>
</html>
