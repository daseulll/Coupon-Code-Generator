<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>login</title>
  </head>
  <body>
    <form method='post' action=''>
      <?php echo display_error(); ?>
      <table>
      <tr>
      	<td>아이디</td>
      	<td><input type='text' name='username' /></td>
      </tr>
      <tr>
      	<td>비밀번호</td>
      	<td><input type='password' name='password' /></td>
        <td><input type='submit' value='로그인' name="login_btn" style='height:50px'/></td>
      </tr>
      </table>
      <p>
  			<a href="register.php">회원가입</a>
  		</p>
    </form>
  </body>
</html>
