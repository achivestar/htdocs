<?php

//게시판 모듈의URL을 반환하는 함수

function bdUrl($file,$num,$page){
    $join = "?";
    if($num){
        $file.=$join."num=$num";
        $join = "&";
    }
    if($page){
        $file.=$join."page=$page";
    }

    return $file;
}

//세션이 시작되지 않았으면 시작
function session_start_if_none(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
}

// GET/POST 로 전달된 값 읽기
function requestValue($name){
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : "";
}

//세션변수 값 읽기
function sessionVar($name){
    return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
}

//지시된  URL 로 이동 이 함수 호출 뒤에 있는 코드는 실행안됨
function goNow($url){
    header("Location:$url");
    exit();
}

function errorBack($msg)
{
?>
    <script>
        alert("<?=$msg?>");
        history.back();
    </script>
    <?php
    exit();
}

    function okGo($msg,$url)
    {
 ?>
        <script>
            alert("<?=$msg?>");
            location.href = '<?=$url?>';
        </script>

 <?php
        exit();
    }
 ?>