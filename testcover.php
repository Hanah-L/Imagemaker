<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'testcover';
?>


<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<!-- CSS link -->
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/component.css">
<link rel="stylesheet" href="css/test.css">



<body>
    <section class="test">
        <div class="">
            <div class="bg">
                <div class="testTitle">
                    <h1 class="font-white">你是哪種香調佳人？</h1>
                    <p class="font-white">買香水時，常因為太多香調，而不知道如何挑選。這時，可以做測驗，快速找到適合自己的味道喔！</p>
                    <a class="icongo" href="test.php">
                        <i class="icon icon-right-open font-white"></i>
                        <i class="icon icon-right-open font-white"></i>
                        <i class="icon icon-right-open font-white"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>


</body>

<?php include __DIR__ . '/parts/script.php'; ?>

<?php include __DIR__ . '/parts/footer.php'; ?>