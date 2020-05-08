<?php
require __DIR__ . '/_connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dictionary

if (!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM product_list WHERE sid IN(%s)", implode(',', $pKeys));
    $rows = $pdo->query($sql)->fetchAll();

    foreach ($rows as $r) {
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
    }
}

?>
<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">

            <!-- <?php foreach ($_SESSION['cart'] as $sid => $qty) : ?>
            <p><?= $sid . ' - ' . $data_ar[$sid]['product_name'] ?></p>
            <p><?= $data_ar[$sid]['quantity'] ?></p>
            <hr>
        <?php endforeach; ?> -->

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        
                        <th scope="col">照片</th>
                        <th scope="col">商品名稱</th>
                        <th scope="col">容量</th>
                        <th scope="col">數量</th>
                        <th scope="col">單價</th>
                        <th scope="col">金額</th>
                        <th scope="col"><i class="fas fa-trash-alt"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $total = 0;  
                    // 購物車列表 前端處理(行48-)
                    foreach ($_SESSION['cart'] as $sid => $qty) :
                        $item = $data_ar[$sid];
                        // $total += $item['price'] * $item['quantity'];
                    ?>
                        <tr class="p-item" data-sid="<?= $sid ?>">
                            <td><a href="#" onclick="removeProductItem(event)"><i class="fas fa-trash-alt"></i></a></td>
                            <td><img src="images/pic_id/<?= $item['product_num'] ?>-01.jpg" alt=""></td>
                            <td><?= $item['product_name'] ?></td>
                            <td class="price" data-price="<?= $item['price'] ?>"></td>
                            <td>
                              
                                <select class="form-control quantity" data-qty="<?= $item['quantity'] ?>" onchange="changeQty(event)">
                                    <?php for ($i = 1; $i <= 20; $i++) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </td>
                            <td class="sub-total"><?= $item['price'] * $item['quantity'] ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="alert alert-primary" role="alert">
                總計: <span id="totalAmount"></span>
            </div>

            <!-- 老師省略輸入配送資料頁，需另外再加入配送資料的部分 -->
            <!-- 先判斷是否已登入，若已登入則顯示結帳按鈕，若無則顯示警示:請先登入再結帳 -->
            <?php if (isset($_SESSION['loginUser'])) : ?>
                <a href="save-orders.php" class="btn btn-success">結帳</a>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    請先登入會員再結帳
                </div>
            <?php endif; ?>

        </div>

    </div>
    <?php include __DIR__ . '/parts/script.php'; ?>

    <script>
        // 千位數加逗號標示
        const dallorCommas = function(n) {
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };

        function removeProductItem(event) {
            event.preventDefault(); // 避免 <a> 的連結
            const tr = $(event.target).closest('tr.p-item')
            const sid = tr.attr('data-sid');

            $.get('add-to-cart-api.php', {
                sid
            }, function(data) {
                //先移除navbar購物車的數量，只計算表格內的數量
                tr.remove();
                countCartObj(data);
                calPrices();
            }, 'json');
        }

        function changeQty(event) {
            let qty = $(event.target).val();
            let tr = $(event.target).closest('tr');
            let sid = tr.attr('data-sid');
            // let price = tr.find('.price').text();
            // tr.find('.sub-total').text(price*qty);
            // console.log({sid, qty, price});

            $.get('add-to-cart-api.php', {
                sid,
                qty
            }, function(data) {
                tr.find('.sub-total').text(price * qty);

                countCartObj(data);
                calPrices();
            }, 'json');
        }

        function calPrices() {
            const p_items = $('.p-item');
            let total = 0;

            // 如果navbar購物車內沒有商品，則點購物車時會停留在商品列表
            if (!p_items.length) {
                alert('購物車內目前沒有商品，即將回到商品列表頁 (請先將商品加入購物車)');  //老師用alert提醒購物車內無商品，但必須另外做更好的顯示方式
                location.href = 'product-list.php';
                return;
            }

            p_items.each(function(i, el) {
                // console.log($(this).attr('data-sid'));

                console.log($(el).attr('data-sid'));
                // let price = parseInt( $(el).find('.price').attr('data-price') );
                // let price = $(el).find('.price').attr('data-price') * 1;  可確保內容一定是數字而非字串

                const $price = $(el).find('.price'); // 價格的 <td>
                $price.text('$ ' + $price.attr('data-price'));

                const $qty = $(el).find('.quantity'); // <select> combo box

                // 如果有的話才設定，沒有則顯示空值
                if ($qty.attr('data-qty')) {
                    $qty.val($qty.attr('data-qty'));
                }
                $qty.removeAttr('data-qty'); // 設定完就移除

                const $sub_total = $(el).find('.sub-total');

                // $sub_total.text('$ ' + $price.attr('data-price') * $qty.val());
                // 千位數加逗號標示
                $sub_total.text('$ ' + dallorCommas($price.attr('data-price') * $qty.val()));
                total += $price.attr('data-price') * $qty.val();
            });

            // $('#totalAmount').text('$ ' + total);
            // 千位數加逗號標示
            $('#totalAmount').text('$ ' + dallorCommas(total));
        }
        calPrices();
    </script>
    <?php include __DIR__ . '/parts/footer.php'; ?>