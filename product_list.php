<?php
include 'ChromePhp.php';
require __DIR__ . '/_connect_db.php';
$perPage = 16;
// 一頁顯示16筆，頁面要挖洞，下面要寫大於4個就換行

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 分類按鈕功能
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

// 分類及分頁
$pageBtnQS = [];

$where = ' WHERE 1 ';
if (!empty($cate)) {
    $where .= " AND product_num=$cate ";
    $pageBtnQS['cate'] = $cate;
}

// 總筆數
$t_sql = "SELECT COUNT(1) FROM product_list $where";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

$totalPages = ceil($totalRows / $perPage); // 總頁數
//如果$page小於1就讓它是1，如果$page大於$totalPages就讓它等於$totalPages
if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

$rows = [];
// 如果有資料，就把資料給$rows
if ($totalRows > 0) {
    $sql = sprintf("SELECT * FROM product_list $where LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}


// 商品分類:不另建資料表，直接取商品列表的欄位的值，用or判斷
// 比較容易，但效能比較差，商品多的時候影響較大
// 分類資料
// $c_sql = "SELECT * FROM categories WHERE parent_sid=0";

function filterByFrangranceAndGender($frg,$ged){
    global $pdo;
    $f_sql = "SELECT * FROM product_list WHERE `frangrance` LIKE '$frg' AND `gender` LIKE '$ged'";
    return $pdo->query($f_sql)->fetchAll();
}

$cates = filterByFrangranceAndGender("果香調","女香");
ChromePhp::log($cates);

?>
<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<!-- bootstrap切版 -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- 左側:分類選單 -->
<!-- 分類選單對應product_list:香調frangrance、品牌brand、類型gender -->
<!-- frangrance 6種: 花香調、果香調、綠葉調、木質調、海洋調、辛香調 -->
<!-- brand 6種: Clean Beauty(Classic)、Clean Beauty(Reserve)、Clean Beauty(Avant Garden)、Miller Harris、Maison Francis Kurkdjian、FlorisLondon -->
<!-- gender: 女香、男香、中性香 -->
            <div class="btn-group-vertical" style="width: 100%">
                <a type="button" href="?" class="btn <?= empty($cate) ? 'btn-primary' : 'btn-outline-primary' ?>">所有商品</a>
                <?php foreach ($cates as $c) : ?>
                    <a type="button" href="?cate=<?= $c['sid'] ?>" class="btn <?= $cate == $c['sid'] ? 'btn-primary' : 'btn-outline-primary' ?>"><?= $c['name'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-9">
            <!-- 右側上方:頁碼 -->
            <div class="row">
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?
                                <?php $pageBtnQS['page'] = $page - 1;
                                echo http_build_query($pageBtnQS)
                                ?>">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++) :
                                $pageBtnQS['page'] = $i;
                            ?>
                                <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                                    <a class="page-link" href="?<?= http_build_query($pageBtnQS) ?>">
                                        <?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?
                                <?php $pageBtnQS['page'] = $page + 1;
                                echo http_build_query($pageBtnQS)
                                ?>">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- 右側下方:商品列表內容 -->
            <!-- $cates $rows-->
            <div class="row">
                <?php foreach ($cates as $r) : ?>
                    <div class="col-md-3 product-unit" data-sid="<?= $r['sid'] ?>">
                        <div class="card">
                            <!-- 以照片檔名讀取對應資料 -->
                            <img style="width:200px" src="images/pic_id/<?= $r['product_num'] ?>-01.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title"><?= $r['brand'] ?></h6>
                                <p class="card-text"><i class="fas fa-user-edit"></i> <?= $r['product_name'] ?></p>
                                <p class="card-text"><i class="fas fa-dollar-sign"></i> NT$<?= $r['price'] ?></p>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/script.php'; ?>

<script>
    

    const btn = $('.add-to-cart-btn');

    btn.click(function(){
        const sid = $(this).closest('.product-unit').attr('data-sid');
        //const qty = $(this).prev().val();
        const qty = $(this).closest('.product-unit').find('.qty').val();

        //console.log({sid, qty});

        $.get('add-to-cart-api.php', {sid, qty}, function(data){
            // 因已在script.php裡設定切換每頁自動先執行計算，所以這裡只要呼叫countCartObj(data);即可
            // let total = 0;
            // for(let i in data){
            //     total += data[i];
            // }
            // $('.cart-count').text(total);
            countCartObj(data);
        }, 'json');
    });

</script>

<?php include __DIR__ . '/parts/footer.php'; ?>