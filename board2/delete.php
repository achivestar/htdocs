<?php
    require_once ("tools.php");
    require_once ("BoardDao.php");

    $num = requestValue("num");
    $page  = requestValue("page");

    $dao = new BoardDao();
    $dao->deleteMsg($num);

    goNow(bdUrl("board.php",0,$page));