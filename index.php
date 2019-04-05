<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
    
