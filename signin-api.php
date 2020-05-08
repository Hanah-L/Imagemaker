<?php
// ini_set('display_errors', 1);
include 'ChromePhp.php';
require __DIR__ . '/_connect_db.php';

$output = [
    'success' => false,
    'error' => '新增失敗，請重新確認帳號密碼',
    'code' => 0,
    'postData' => $_POST,
];
// ChromePhp::log("**********************************************123");
if (isset($_POST['email']) and isset($_POST['password'])) {
    // TODO: 欄位資料檢查

    // 檢查 Email 是否重複
    $e_sql = "SELECT 1 FROM member_list WHERE email=?";
    $e_stmt = $pdo->prepare($e_sql);
    $e_stmt->execute([$_POST['email']]);

    if ($e_stmt->rowCount()) {
        // $output['error'] = 'Email已註冊過';
        $output['success'] = true;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        // exit;
    }

    $sql = "INSERT INTO `member_list`(`email`,`password`) VALUES (?, SHA1(?))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['email'],
        $_POST['password']
    ]);

    if ($stmt->rowCount() ==1) {
        $output['success'] = true;
        $output['error'] = '';

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['sid'] = $pdo->lastInsertId();

    } else {
        $output['error'] = '新增失敗，請重新確認帳號密碼';
    }


    // if (isset($_POST['email']) and isset($_POST['password'])) {

    //     $email = isset($_POST['email']) ;
    //     $password = isset($_POST['password']);
    //     if (empty($email) or empty($password)) {
    //         echo json_encode($output);
    //         exit;
    //     }
}

header('Content-Type: application/json');
echo json_encode($output);
