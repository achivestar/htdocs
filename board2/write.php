<?php
    require_once ("tools.php");
    require_once ("BoardDao.php");

    //전달된 값 저장
    $writer = requestValue("writer");
    $title = requestValue("title");
    $content = requestValue("content");

    //빈칸 없이 모든 값이 전달 되었으면 insert
    if($writer && $title && $content){
        $dao =  new BoardDao();
        $dao->insertMsg($writer,$title,$content);

        //글 목록 페이지로 복귀
        goNow(bdUrl("board.php",0,0));
    }else{
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
    }
?>