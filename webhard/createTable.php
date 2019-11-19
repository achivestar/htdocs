<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=phpdb","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE table score2(
            num int primary key,
            name varchar(20),
            kor int,
            eng int,
            math int
            ) ENGINE = InnoDB default charset utf8 collate utf8_general_ci";

            $db->exec($sql);

            echo "성적 테이블 생성 성공";

    }catch(PDOException $e){
        exit($e->getMessage());
    }

?>