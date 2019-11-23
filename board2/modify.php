<?php
    require_once ("tools.php");
    require_once ("BoardDao.php");

    $num = requestValue("num");
    $page = requestValue("page");

    $writer = requestValue("writer");
    $title = requestValue("title");
    $content = requestValue("content");

    if($writer && $title && $content){
        $dao = new BoardDao();
        $dao->updateMsg($num,$writer,$title,$content);

        goNow(bdUrl("board.php",0,$page));
    }else{
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
    }
