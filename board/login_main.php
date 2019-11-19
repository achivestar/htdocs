<?php
    require_once ("tools.php");

    session_start_id_none();
    $id = sessionVar("uid");
    $name = sessionVar("uname");
 ?>
<meta charset="utf-8"/>
<?php
    if($id) :
 ?>
<form action="<?=MEMBER_PATH?>/logout.php" method="post">
    <?=$name?>님 로그인
    <input type="submit" value="로그아웃" />
    <input type="button" value="회원정보 수정" onclick="location.href='<?=MEMBER_PATH?>/member_update_form.php'">
</form>
<?php else : ?>
<form action="<?=MEMBER_PATH?>/login.php" method="post">
    아이디 : <input type="text" name="id">&nbsp;&nbsp;
    비밀번호 : <input type="password" name="pw">
    <input type="submit" value="로그인">
    <input type="button" value="회원가입" onclick="location.href='<?=MEMBER_PATH?>/member_join_form.php'">
</form>
<?php endif ?>
