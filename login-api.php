<?php
require __DIR__. '/_connect_db.php';
$output = [
    'success' => false,
    'post' => $_POST,
];
printf("here login api ...1");
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if(empty($email) or empty($password)){
    echo json_encode($output);
    exit;
}

$sql = "SELECT * FROM member_list WHERE email=? AND password=SHA1(?)";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$email, $password]);
if ($result) {
    ini_set('display_errors111', 1);
} else {
    ini_set('display_errors222', 1);
}

printf("here login api ...2");
if($stmt->rowCount()){
    $row = $stmt->fetch();
    $_SESSION['loginUser'] = $row;
    $output['success'] = true;
    $output['data'] = $row;
}
header('Content-Type: application/json');
echo json_encode($output);