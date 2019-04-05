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
	<title>Admin - 쿠폰 코드 발행 페이지</title>
</head>
<body>
	<h2>Admin - 쿠폰 코드 발행 페이지</h2>
	<!-- 알림 메세지 -->
	<?php if (isset($_SESSION['success'])) : ?>
		<h3>
			<?php
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			?>
		</h3>
	<?php endif ?>

	<!-- admin user 정보 -->
	<?php  if (isset($_SESSION['user'])) : ?>
		<strong><?php echo $_SESSION['user']['username']; ?></strong>

		<small>
			<i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
			<br>
			<a href="admin.php?logout='1'" style="color: red;">logout</a>
      <a href="create_user.php"> add user</a>
		</small>

	<?php endif ?>

  <h3 style="color: #479daa;">쿠폰 코드 발행</h3>
  <button type="submit" class="coupon_btn" name="coupon_btn">쿠폰코드발행</button>
  <?php
    echo generateCouponCode();
    echo $coupon;
   ?>

</body>
</html>
