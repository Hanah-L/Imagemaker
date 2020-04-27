 <!-- JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
    <script src="js/plugin/wow.min.js"></script>
    <!-- <script src="js/plugin/jquery.fancybox.js"></script> -->
    <!-- <script src="js/costum.js"></script> -->
    <script>
        $('.menu-bar').click(function() {
            $(this).toggleClass('visible')
            $('.popup-menu').toggleClass('visible')
        })
        $('.footer').find('i').click(function() {
            $(this).toggleClass('icon-down-open').toggleClass('icon-up-open')
            $('.popup-footer').toggleClass('visible')
        })
    </script>
</body>

</html>