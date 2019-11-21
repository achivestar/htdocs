<?php
    require_once ("tools.php");
    $page = requestValue("page");
?>
<meta charset="utf-8">
<link rel="stylesheet" href="board.css" type="text/css"/>
<body>
<div class="container">
    <form method="post" action="write.php">
        <table>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" maxlength="80" class="msg-text"></td>
            </tr>
            <tr>
                <th class="msg-header">작성자</th>
                <td><input type="text" name="writer" maxlength="20" class="msg-text"></td>
            </tr>
            <tr>
                <th>내용</th>
                <td>
                    <textarea name="content" wrap="virtual" rows="10" class="msg-text"></textarea>
                </td>
            </tr>
        </table>
        <br>
        <div class="left">
            <input type="submit" value="글쓰기">
            <input type="button" value="목록보기" onclick="location.href='<?=bdUrl("board.php",0,$page)?>'">
        </div>
    </form>
</div>
</body>
