<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'test';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="./css/baseAdd.css">

    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/test.css">
    <style>
        /* .qblock{
            padding: 10px 0;
            border-bottom:1px solid #ccc;
            display: none;
        }
        .qblock:nth-child(1){
            display: block;
        } */
    </style>
</head>

<body>

    <section class="testquestion">

        <div id="list">

        </div>
        <!-- <div class="bg">
            <div class="questionTilte d-flex align-items-center ">
                <div class="Qtilte font-primary ">Q1</div>
                <div>
                    <h3>今天你拿著時尚派對的邀請函，正要走入會場……</h3>
                    <h4 id="questions">第一次來到這樣盛大陌生的聚會場合時，你的反應是：</h4>
                </div>

            </div>
        </div>
        <div class="option" id="ansSelect">
            <div class="lable-btn" id="ans1">
                <button type="button" class="clip-ld ansBtn"  data-target="2">主動搭話</button>
            </div>
            <div class="lable-btn" id="ans2">
                <button type="button" class="clip-ld ansBtn" data-target="3">等待搭訕</button>
            </div>
        </div>
        <div class="perfumeTest d-flex justify-content-between">
            <div class="lable-btn ">
                <h4 class="clip-rd">你是哪種香調佳人？</h4>
            </div>
            <div class="lable-btn ">
                <a class="clip-ld">重新測驗</a>
            </div>

        </div> -->
    </section>
    <!-- <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script> -->

    <?php include __DIR__ . '/parts/script.php'; ?>

    <script>

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


        let questions = [{
                q: "第一次來到這樣盛大陌生的聚會場合時，你的反應是：",
                a: [{
                        content: "主動搭話",
                        chooese: 1

                    },
                    {
                        content: "等待搭訕",
                        chooese: 2
                    },
                ]
            },
            {
                q: "發現別人在注視自己時，你內心的感覺是：",
                a: [{
                        content: "我哪裡不對勁了嗎",
                        chooese: 3
                    },
                    {
                        content: "他可能對我有意思",
                        chooese: 6
                    },
                ]
            },
            {
                q: "別人主動向你搭話，你的反應是：",
                a: [{
                        content: "急忙介紹自己",
                        chooese: 5
                    },
                    {
                        content: "從容的與對方互動",
                        chooese: 4
                    },
                ]
            },
            {
                q: "看到不錯的對象你首先會注意到",
                a: [{
                        content: "對方的長相",
                        chooese: 6
                    },
                    {
                        content: "身上的行頭",
                        chooese: 12
                    },
                ]
            },
            {
                q: "面對眼前可口的派對小甜點你會選擇：",
                a: [{
                        content: "可愛馬卡龍",
                        chooese: 7
                    },
                    {
                        content: "法式鹹派",
                        chooese: 11
                    },
                ]
            },
            {
                q: "口渴時你會選擇：",
                a: [{
                        content: "高級果汁",
                        chooese: 10
                    },
                    {
                        content: "香檳",
                        chooese: 13
                    },
                ]
            },
            {
                q: "平時你會選擇站在人群中玩樂，還是坐在旁邊的椅子聊天？",
                a: [{
                        content: "站在人群中玩樂",
                        chooese: 11
                    },
                    {
                        content: "坐在旁邊的椅子聊天",
                        chooese: 10
                    },
                ]
            },
            {
                q: "遊戲玩樂的時候，你會選擇跟別人跳舞，還是玩牌桌遊戲？",
                a: [{
                        content: "跟別人跳舞",
                        chooese: 8
                    },
                    {
                        content: "玩牌桌遊戲",
                        chooese: 9
                    },
                ]
            },
            {
                q: "跳舞時你會選擇：",
                a: [{
                        content: "快歌",
                        chooese: 10
                    },
                    {
                        content: "慢歌",
                        chooese: 13
                    },
                ]
            },
            {
                q: "選擇牌桌遊戲時你喜歡：",
                a: [{
                        content: "由荷官為你服務的 21 點",
                        chooese: 15
                    },
                    {
                        content: "吃餃子老虎機",
                        chooese: 12
                    },
                ]
            },
            {
                q: "當你發現精心準備的衣服跟別人撞衫時，你的反應是：",
                a: [{
                        content: "我最美不用怕",
                        chooese: 11
                    },
                    {
                        content: "盡量避開他",
                        chooese: 14
                    },
                ]
            },
            {
                q: "當你跟別人談笑風生之際，你美麗的鞋根斷掉了，你會：",
                a: [{
                        content: "先糗自己，當沒事繼續跟大家互動",
                        chooese: 16
                    },
                    {
                        content: "懊惱不已，等待同伴協助",
                        chooese: 17
                    },
                ]
            },
            {
                q: "當你跟大家都熟識過後，你會選擇：",
                a: [{
                        content: "參與派對流程活動",
                        chooese: 14
                    },
                    {
                        content: "依照內心狀況行事",
                        chooese: 13
                    },
                ]
            },
            {
                q: "當大家把你跟不欣賞的對象湊作堆時：",
                a: [{
                        content: "直接明白說出你的感覺",
                        chooese: 18
                    },
                    {
                        content: "從對方身上找優點陪他度過一晚",
                        chooese: 17
                    },
                ]
            },
            {
                q: "當你走進會場時你覺得現場的布置是什麼色系？",
                a: [{
                        content: "粉紅色",
                        chooese: 19
                    },
                    {
                        content: "金色",
                        chooese: 17
                    },
                ]
            },
            {
                q: "你跟心儀的對象交談時，朋友發生了狀況，你會：",
                a: [{
                        content: "禮貌的岔開話題，先去幫忙朋友展現你溫柔賢淑的一面",
                        chooese: 19
                    },
                    {
                        content: "了解朋友的困難後，替他找到最好的辦法",
                        chooese: 17
                    },
                ]
            },
            {
                q: "當你吃到好吃的甜點時，你會：",
                a: [{
                        content: "主動介紹別人與你同樂",
                        chooese: 18
                    },
                    {
                        content: "細細品嘗好滋味",
                        chooese: 17
                    },
                ]
            },
            {
                q: "活動中有一次西洋塔羅占卜的機會，你會想問哪方面的問題？",
                a: [{
                        content: "工作",
                        chooese: answer[2].t
                    },
                    {
                        content: "感情",
                        chooese: answer[1].t
                    },
                ]
            },
            {
                q: "派對結束後發送兩種紀念品你會選擇：",
                a: [{
                        content: "香港東京購物之旅",
                        chooese: answer[4].t
                    },
                    {
                        content: "巴塞隆納感性之旅",
                        chooese: answer[0].t
                    },
                ]
            },
            {
                q: "派對活動結束之後，你會跟有點進展的對象：",
                a: [{
                        content: "繼續進行約會",
                        chooese: answer[3].t
                    },
                    {
                        content: "按照原訂計畫回家",
                        chooese: answer[5].t
                    },
                ]
            },
        ]

        

        console.log("count" + questions.length);

        // questions.some(function(question){
        //     // console.log(question)
        //     let qBlock="";
        //     let qContent="";
        //     // console.log(question.q)
        //     let qData=question.a;
        //     qData.forEach(function(item){
        //         // console.log(item)
        //         qContent+=`<li data-target="${item.chooese}">${item.content}</li>`
        //     })
        //     // console.log(qContent);
        //     qBlock=`
        //     <div class="qblock">
        //     <h3>${question.q}</h3>
        //     <ul class="">${qContent}</ul>
        //     </div>`

        //     $("#list").append(qBlock);
        //     return true
        // })
        buildQuestionHtmlByIndex(0);
            /////
        function buildQuestionHtmlByIndex(index) {

            if (isInt(index)) {
                let qBlock = "";
                let qContent = "";
                let question = questions[index]
                let qData = question.a;
                qData.forEach(function(item) {
                    qContent += `<li data-target="${item.chooese}">${item.content}</li>`
                })
                    qBlock = `
                <div class="qblock">
                <h3>${question.q}</h3>
                <ul class="">${qContent}</ul>
                </div>`

                $("#list").empty().append(qBlock);

                $("#list .qblock li").click(function() {
                    let target = $(this).data("target")
                    // console.log("*************************************");
                    console.log(target)
                    buildQuestionHtmlByIndex(target);
                })
            } else {
                answer.some(function(ans) {
                    if (ans.t == index) {
                        qBlock = `
                        <div class="qblock">
                            <h3>${ans.t}</h3>
                            <ul class="">${ans.s}</ul>
                            <ul class="">${ans.c}</ul>
                        </div>`

                        $("#list").empty().append(qBlock);
                        return true
                    }
                })
            }


        }

        function isInt(value) {
            return !isNaN(value) &&
                parseInt(Number(value)) == value &&
                !isNaN(parseInt(value, 10));
        }





        $("#ansSelect").on("click", ".ansBtn", function() {
            let target = $(this).data("target")
            // console.log(questions[target]);
            $("#questions").text(questions[target].q);
            $("#ans1").empty().append(`
        <button type="button" class="clip-ld ansBtn"  data-target="${questions[target]["a"][0]["chooese"]}">${questions[target]["a"][0]["content"]}</button>
        `);
            $("#ans2").empty().append(`
        <button type="button" class="clip-ld ansBtn"  data-target="${questions[target]["a"][1]["chooese"]}">${questions[target]["a"][1]["content"]}</button>
        `);
        })
        // 如果最後choose結果不是數字，要給新的UI用URL做連結
    </script>
</body>

</html>