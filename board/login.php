<?php
    require_once ("tools.php");
    require_once ("MemberDao.php");

    $id = requestValue("id");
    $pw = requestValue("pw");

    $mdao = new MemberDao();
    $member = $mdao->getMember($id);

    if ($member && $member["pw"]==$pw){
        session_start_id_none();
        $_SESSION["uid"] = $id;
        $_SESSION["uname"] = $member["name"];

        goNow(MAIN_PAGE);
        //
    }else{
        errorBack("아이디 또는 비밀번호가 잘못 입력 되었습니다.");
    }