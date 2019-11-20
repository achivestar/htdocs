<?php
    define("MAIN_PAGE","login_main.php");
    define("MEMBER_PATH",".");

    function session_start_id_none(){
        if(session_status()==PHP_SESSION_NONE)
            session_start();
    }

    function requestValue($name){
        return isset($_REQUEST[$name])? $_REQUEST[$name] : "";
    }

    function sessionVar($name){
        return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
    }

    function goNow($url){
        header("Location:$url");
        exit();
    }

    function errorBack($msg){
 ?>
    <script>
        alert("<?=$msg?>");
        history.back();
    </script>
<?php
        exit();
    }
    function okGo($msg,$url){
 ?>
    <script>
        alert("<?=$msg?>");
        location.href="<?=$url?>";
    </script>
<?php
        exit();
}
?>