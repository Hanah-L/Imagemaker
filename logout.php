<?php
session_start();
unset($_SESSION['loginUser']);

header('Location: login.php');
?>

<div id="info-bar" class="alert alert-info" role="alert" style="display: none">
        123
    </div>
    
<script>
$('#info-bar').show().text('已成功登出');
</script>
