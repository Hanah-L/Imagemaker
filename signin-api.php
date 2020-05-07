<?php
ini_set('display_errors', 1);
require __DIR__ . '/_connect_db.php';
$output = [
    'success' => false,
    'post' => $_POST,
];

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if (empty($email) or empty($password)) {
    echo json_encode($output);
    exit;
}

$sql = "INSERT INTO `member_list`(`email`,`password`) VALUES ('','')";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, sha1($password)]);

if ($stmt->rowCount()) {
    $row = $stmt->fetch();
    $_SESSION['loginUser'] = $row;
    $output['success'] = true;
    $output['data'] = $row;

}


header('Content-Type: application/json');
echo json_encode($output);
