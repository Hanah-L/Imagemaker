<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'testanswer';
?>


<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/SVG/ImageMaker_logo.svg" />
    <title>Image Maker</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/baseAdd.css">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/test.css">
</head>

<body>
    <section class="testanswer">
        <div class="bg">
        </div>

        <div class="answerTilte">
            <h1 class="font-primary Qtilte">花香調佳人</h1>
            <div class="text">
                <h3>質感不敗．引領流行．散發自信．引人注目</h3>
                <h4>
                    你與人相處時有許多面向，有時嬌媚得像是嬌嫩欲滴的鮮花，可愛得想讓人把你收到口袋裡好好呵護；有時又能散發出最完美的自信，帶領潮流讓大家都想模仿你。因為喜歡沉浸在自己的主觀世界中，你很了解自己的感覺，透過做到自己喜歡的事情而得到成就感，對於外界的批評不會有太大的情緒反應。<BR>

                    你非常容易吸引別人注意，因為做自己的態度總讓人覺得你過得很有自己的價值，而自身的價值是遠超過於任何形式的物質價值。通常基本經典的款式非常適合你，但因為你與生俱來的藝術天賦，會讓你在巧妙的搭配後撞擊出更令人驚豔的火花，對你來說，活得有質感是一輩子要去追求的事。
                </h4>
            </div>
        </div>
        <div class="perfumeTest d-flex justify-content-between">
            <div class="lable-btn ">
                <h4 class="clip-rd">你是哪種香調佳人？</h4>
            </div>
            <div class="lable-btn ">
                <a class="clip-ld">重新測驗</a>
            </div>

        </div>

    </section>
    <aside class="aside-recommend">
        <div class="lable-btn">
            <a class="clip-ld" href="">代表香水</a>
        </div>
    </aside>

</body>

<?php include __DIR__ . '/parts/script.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    var Tilteheight = $('.answerTilte').height()
    console.log(Tilteheight);
    $(window).resize(function() {

        if ($(window).width() < 768) {
            $('.testanswer').find('.bg').css('height', Tilteheight)
        } else {
            $('.testanswer').find('.bg').css('height', '100vh')
        }
    })
    // let answer = [];
    let answer = [{
            t: "花香調佳人",
            s: "質感不敗．引領流行．散發自信．引人注目",
            c: "與人相處時有許多面向，有時嬌媚得像是嬌嫩欲滴的鮮花，可愛得想讓人把你收到口袋裡好好呵護；有時又能散發出最完美的自信，帶領潮流讓大家都想模仿你。因為喜歡沉浸在自己的主觀世界中，你很了解自己的感覺，透過做到自己喜歡的事情而得到成就感，對於外界的批評不會有太大的情緒反應。你非常吸引別人注意，因為做自己的態度總讓人覺得你過得很有自己的價值，而自身的價值是遠超過於任何形式的物質價值。通常基本經典的款式非常適合你，但因為你與生俱來的藝術天賦，會讓你在巧妙的搭配後撞擊出更令人驚豔的火花，對你來說，活得有質感是一輩子要去追求的事。"
        },
        {
            t: "果香調佳人",
            s: "柔情似水．給人溫暖．溫和同理．熱愛付出",
            c: "總能給人溫暖親切的感覺，願意把別人的事情當做自己的事情，無論對任何人都是將心比心去應對與照顧，因為天生情感豐富的關係，加上你有時對自己沒有太多的自信，害怕碰上釘子，所以不敢太主動去跟別人相處，內心累積了很多情緒需要抒發，常常你也在等別人來主動關懷你。但要記住，你是個擁有溫暖特質的人，只要願意發揮同理心，就會知道可以怎麼為別人的生命加油打氣，也不會發生別人不領情的狀況。在人際關係上，要學習多表達自己的想法，透過自己的力量去幫助別人，就會讓你在跟別人有良好互動的時候，得到大家的支持與贊同。"
        },
        {
            t: "綠葉調佳人",
            s: "外向率真．善於人際．適應力強．責任感強",
            c: "在人際關係上，你是大家非常信任的對象，什麼問題都難不倒你，因為你的頭腦清晰，了解每件事情的來龍去脈，不會故意去偏袒某一方，但也不會因為別人犯錯，就揪著別人的罪惡感無限上綱，是個有原則並且非常講義氣的人。無論再沮喪，都有讓自己站起來的辦法，不會亂找自己麻煩，相信自己也願意信任別人。在玩樂時會不小心尋求過度的享樂跟刺激，有打破規則的危險。只不過因為重義氣的關係，沒有人會真的想跟你產生心結，識大體的你也總能不留痕跡的化解所有的問題，加上你的責任感很重，不隨便推卸的態度，也讓大家對你十分疼愛喔！"
        },
        {
            t: "海洋調美人",
            s: "浪漫流露．善於表達．感性活力．雙雙兼備",
            c: "生活多采多姿，因為你對每件事情都充滿無限的好奇與幻想，對所有的人事物都充滿著興趣，不僅可以很專注地去完成自己的想法，更能積極行動去達成自己的目標。對你的朋友來說，要抓住你是很難的一件事情，因為你的思緒跳來跳去，但這也是你迷人可愛的地方，你不會去強迫別人接受你的喜好。你本身的批判能力也很犀利，很了解可以怎麼做會讓自己的生活變得更好，也願意在自己身上下工夫，在愛情的選擇上，要注意自己真實在意的是什麼，就不會有白忙一場的感受，也會得到你想要的幸福。"
        },
        {
            t: "辛香調美人",
            s: "性感動人．不拘小節．真誠自然．不須矯飾",
            c: "對你來說，世界是一個好玩的場所，最喜歡在生活中挖掘出更多的可能性與新鮮感。跟別人相處的時候，你也是一個不拘小節、真誠自然的人，而且你們在發現新奇事物的敏銳度非常高，喜歡不斷的汰舊換新保持新鮮感。當你遇到愛情時，你的性感度很高，不吝於讓心儀的人知道自己的想法，而且通常都是想到就做到的狀況，要注意有的時候對方會被你過於主動的舉動給嚇到，但也不表示他不喜歡你主動，只要好好運用自己的力量，在相處中多增加一點情感上的交流，你的感情與人際關係都能得到很好的成長。"
        },
        {
            t: "木質調美人",
            s: "高貴優雅．謙和堅定．才華洋溢．理性稱道",
            c: "凡事都能反求諸己的特質，讓你跟人相處時自然就會產生神秘距離感，透過靈敏的思考能力讓大家對你在專業上的表現是讚譽有加。知書達禮是你給人的第一個印象，但誰都無法想到的是，你本身的興趣非常廣泛，對於研究自己有興趣的科目願意花上許多時間努力，所有的小成果都會讓你充滿成就與幸福感，這時候的你特別迷人。天生有就有一股清秀高潔的特質讓別人只要一靠近你，就能感受到你的莊重氣質，出眾的表達能力更讓人對你讚賞不已，領導力超群，建議多運用理性特質，幫助你在工作上得到亮眼的成績。"
        },
    ]
</script>

</html>

<?php include __DIR__ . '/parts/footer.php'; ?>