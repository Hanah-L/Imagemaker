<?php
require __DIR__. '/_connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dictionary

// 有登入才能結帳 (若無登入則導回商品列表頁)
if(! isset($_SESSION['loginUser'])){
    header('Location: product_list.php');
    exit;
}

// 寫入訂單
if(!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM shop_list WHERE sid IN(%s)", implode(',', $pKeys));
    $rows = $pdo->query($sql)->fetchAll();
    $total = 0;
    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
        $total += $r['quantity'] * $r['price'];
    }
} else {
    header('Location: product_list.php');
    exit;
}

$o_sql = "INSERT INTO `shop_list`(`member_sid`, `amount`, `order_date`) VALUES (?, ?, NOW())";
$o_stmt = $pdo->prepare($o_sql);
$o_stmt->execute([
    $_SESSION['loginUser']['id'],
    $total,
]);

$order_sid = $pdo->lastInsertId(); // 最近新增資料的Primary key

//寫入訂單明細
$od_sql = "INSERT INTO `shop_detail`(`shop_num`, `product_num`, `quantity`, `amount`) VALUES (?, ?, ?, ?)";
$od_stmt = $pdo->prepare($od_sql);

foreach($_SESSION['cart'] as $p_sid=>$qty){
    $od_stmt->execute([
        $shop_num,
        $p_sid,
        $data_ar[$p_sid]['price'],
        $qty,
    ]);
}

unset($_SESSION['cart']); // 清除購物車內容

?>
<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <div class="alert alert-success" role="alert">
        <!-- $order_sid為訂單sid -->
        感謝訂購 (訂單序號 <?= $shop_num ?>)
    </div>

</div>
<?php include __DIR__ . '/parts/script.php'; ?>

<?php include __DIR__ . '/parts/footer.php'; ?> 