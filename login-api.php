<?php
ini_set('display_errors', 1);
require __DIR__ . '/_connect_db.php';
$output = [
    'success' => false,
    'post' => $_POST,
];
// printf("here login api ...1");
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if (empty($email) or empty($password)) {
    echo json_encode($output);
    exit;
}

$sql = "SELECT * FROM `member_list` WHERE `email`=? AND `password`=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, sha1($password)]);
// if ($result) {

// } else {
//     ini_set('display_errors', 1);
// }

// printf("here login api ...2");
if ($stmt->rowCount()) {
    $row = $stmt->fetch();
    $_SESSION['loginUser'] = $row;
    $output['success'] = true;
    $output['data'] = $row;

    // setcookie('email', $email, time() + 1440);
    // setcookie('password', $password, time() + 1440);
}



// checkbox : 記住我的帳號密碼 方式一
//檢查使用者是否登入
// function checklogin()
// {
//     if (empty($_SESSION['user_info'])) {    //檢查一下session是不是為空 
//         if (empty($_COOKIE['username']) || empty($_COOKIE['password'])) {  //如果session為空，並且使用者沒有選擇記錄登入狀 
//             header("location:login.php?req_url=" . $_SERVER['REQUEST_URI']);  //轉到登入頁面，記錄請求的url，登入後跳轉過去，使用者體驗好。 
//         } else {   //使用者選擇了記住登入狀態 
//             $user = getUserInfo($_COOKIE['username'], $_COOKIE['password']);   //去取使用者的個人資料 
//             if (empty($user)) {    //使用者名稱密碼不對沒到取到資訊，轉到登入頁面 
//                 header("location:login.php?req_url=" . $_SERVER['REQUEST_URI']);
//             } else {
//                 $_SESSION['user_info'] = $user;   //使用者名稱和密碼對了，把使用者的個人資料放到session裡面 
//             }
//         }
//     }
// }

// checkbox : 記住我的帳號密碼 方式二
// $username = trim($_POST['username']);
//         $password = md5(trim($_POST['password']));
//         $ref_url = $_GET['req_url'];
//         $remember = $_POST['remember']; //是否自動登入標示
//         $err_msg ='';
//         if ($username == ''|| $password == '') {
//             $err_msg = "使用者名稱和密碼都不能為空";
//         } else {
//             $row = getUserInfo($username, $password);
//             if (empty($row)) {
//                 $err_msg = "使用者名稱和密碼都不正確";
//             } else {
//                 $_SESSION['user_info'] = $row;
//                 if (!empty($remember)) { 
//如果使用者選擇了，記錄登入狀態就把使用者名稱和加了密的密碼放到cookie裡面，之後一年都不用重新登入
//                     setcookie("username", $username, time() 3600 * 24 * 365);
//                     setcookie("password", $password, time() 3600 * 24 * 365);
//                 }
//                 if (strpos($ref_url, "login.php") === false) {
//                     header("location: ".$ref_url);
//                 } else {
//                     header("location: main_user.php");
//                 }
//             }
//         }

header('Content-Type: application/json');
echo json_encode($output);
