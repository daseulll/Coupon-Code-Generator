<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
  </head>
  <body>
    <form method="post" action="">
       <h1>회원 정보를 입력해주세요.</h1>
       <table>
         <?php echo display_error(); ?>
        <tr>
         <td>아이디(ID)</td>
         <td><input type="text" size="30" name="username" value="<?php echo $username; ?>"></td>
        </tr>
        <tr>
         <td>비밀번호</td>
         <td><input type="password" size="30" name="password_1"></td>
        </tr>
        <tr>
         <td>비밀번호 확인</td>
         <td><input type="password" size="30" name="password_2"></td>
        </tr>
        <tr>
         <td>e-mail</td>
         <td><input type="email" size="30" name="email" value="<?php echo $email; ?>"></td>
        </tr>
       </table>
       <input type="submit" value="회원가입" name="register_btn">
       <input type="reset" value="rewrite">
       <p>
         이미 회원이신가요? <a href="login.php">로그인</a>
       </p>
    </form>
  </body>
</html>
