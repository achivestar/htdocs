<?php

    try {
        $db =  new PDO("mysql:host=localhost;dbname=phpdb","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $score = [
            [7,"안중근",50,60,90],
            [8,"김구",40,20,50],
            [9,"이성계",100,100,99]
        ];

        $query = $db->prepare("INSERT into score values (:num, :name, :kor, :eng, :math)");

        for($i = 0 ; $i < count($score); $i++){
            $num = $score[$i][0];
            $name = $score[$i][1];
            $kor = $score[$i][2];
            $eng = $score[$i][3];
            $math = $score[$i][4];


            $query->bindValue(":num",$num, PDO::PARAM_INT);
            $query->bindValue(":name",$name, PDO::PARAM_STR);
            $query->bindValue(":kor",$kor, PDO::PARAM_INT);
            $query->bindValue(":eng",$eng, PDO::PARAM_INT);
            $query->bindValue(":math",$math, PDO::PARAM_INT);

            $query->execute();
            echo $i+1," 번째 레코드 추가 성공<br>";
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }

?>