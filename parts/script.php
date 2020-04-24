 <!-- JS -->
 <script src="js/plugin/jquery-2.0.2.min.js"></script>
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