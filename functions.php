<?php
session_start();

// DB에 연결
$mysqli = mysqli_connect("localhost", "root", "", "myUser");

// 변수 선언
$username = "";
$email = "";
$errors = array();

// register_btn 버튼이 클릭되면 register() 호출
if (isset($_POST['register_btn'])){
    register();
}

function register(){
  global $mysqli, $username, $email, $errors;
  $username = $_POST['username'];
  $password_1 = $_POST['password_1']; //비밀번호 암호화하여 DB에 저장
  $password_2 = $_POST['password_2'];
  $email = $_POST['email'];

  // 회원가입폼 유효성 검사
  if (empty($username)) {
    array_push($errors, "아이디를 입력해주세요.");
  }
  if (empty($email)) {
    array_push($errors, "이메일을 입력해주세요.");
  }
  if (empty($password_1)) {
    array_push($errors, "비밀번호를 입력해주세요.");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "비밀번호가 일치하지 않습니다.");
  }

  if (count($errors) == 0){
    $password = md5($password_1);  //에러가 발생하지 않을경우 비밀번호 암호화하여 DB에 저장

    // user_type을 입력받는 경우 admin user로 계정 생성
    if (isset($_POST['user_type'])) {
      $user_type = $_POST['user_type'];
      $query = "INSERT INTO user_info (username, email, user_type, password) VALUES('$username', '$email', '$user_type', '$password')";
      mysqli_query($mysqli, $query);
      $logged_in_user_id = mysqli_insert_id($mysqli);
      $_SESSION['user'] = getUserById($logged_in_user_id);
      $_SESSION['success'] = "회원가입이 완료되었습니다.";
      header('location: admin.php'); //쿠폰코드 생성 페이지로 이동
    }else{
      // user_type을 입력받지 않는 경우 일반user로 계정 생성
      $query = "INSERT INTO user_info (username, email, user_type, password) VALUES('$username', '$email', 'user', '$password')";

      mysqli_query($mysqli, $query);
      //생성된 유저의 id값 가져오기
      $logged_in_user_id = mysqli_insert_id($mysqli);
      $_SESSION['user'] = getUserById($logged_in_user_id);
      $_SESSION['success'] = "로그인 되었습니다.";
      header('location: index.php'); //쿠폰 사용 페이지로 이동
    }
  }
}

// 유저 아이디 값 가져오는 함수
function getUserById($id){
  global $mysqli;
    $query = "SELECT * FROM user_info WHERE id=" . $id;
    $result = mysqli_query($mysqli, $query);

  	$user = mysqli_fetch_assoc($result);
  	return $user;
}

//에러메세지 노출 함수
function display_error() {
  global $errors;

  if (count($errors) > 0){
			foreach ($errors as $error){
				echo $error .'<br>';
			}
	}
}

// 로그인버튼 누르면 로그인 함수가 호출
if (isset($_POST['login_btn'])) {
    login();
}

// 로그인 함수
function login() {
  global $mysqli, $username, $errors;

  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = md5($password);
  $query = "SELECT * FROM user_info WHERE username='$username' AND password='$password'";
  $results = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($results) == 1) {
    $logged_in_user = mysqli_fetch_assoc($results);
    // admin 유저일 경우 admin.php로 이동
    if ($logged_in_user['user_type'] == 'admin') {
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['success'] = "로그인 되었습니다.";
      header('location: admin/admin.php');
    }elseif ($logged_in_user['user_type'] == 'user') {
    // 일반 user일 경우 index.php로 이동
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['success'] = "로그인 되었습니다.";
      header('location: index.php');
    }
  }else{
    array_push($errors, "올바른 회원정보를 입력해주세요.");
  }
}

// logout클릭 시 세션 삭제 후 로그아웃
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: login.php");
}
