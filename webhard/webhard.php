<?php
    require("WebhardDao.php");
    $dao = new WebhardDao();

    $sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "fname";
    $dir = isset($_REQUEST["dir"]) ? $_REQUEST["dir"] : "asc";

    $result = $dao->getFileList($sort,$dir);

    ?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8" />
    <style>
        table{
            width:700px;
            text-align: center;
        }
        th {
            background: cyan;
        }
        .left{
            text-align: left;
        }
        .right {
            text-align: right;
        }

        a:link{
            text-decoration: none;
            color: blue;
        }

        a:hover{
            text-decoration: none;
            color: red;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="add_file.php?sort=<?=$sort?>&dir=<?=$dir?>" method="post" enctype="multipart/form-data">
        업로드 할 파일을 선택하세요.
        <br>
        <input type="file" name="upload"><br>
        <input type="submit" value="업로드"/>
    </form>
    <br>
    <table>
        <tr>
            <th>파일명
                <a href="?sort=fname&dir=asc">△</a>
                <a href="?sort=fname&dor=desc">▽</a>
            </th>
            <th>
                업로드
                <a href="?sort=ftime&dir=asc">△</a>
                <a href="?sort=ftime&dor=desc">▽</a>
            </th>
            <th>크기</th>
            <th>삭제</th>
        </tr>
        <?php
            if(!empty($result)) {
                foreach ($result as $row) :
                    ?>
                    <tr>
                        <td class="left"><a href="files/<?= $row["fname"] ?>"><?= $row["fname"] ?></a></td>
                        <td><?= $row["ftime"] ?></td>
                        <td class="right"><?= $row["fsize"] ?>&nbsp;&nbsp;</td>
                        <td><a href="del_file.php?num=<?= $row[">X</a></td>
                    </tr>
                <?php
                endforeach;
            }
        ?>
    </table>
</body>
</html>
