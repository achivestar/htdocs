<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=phpdb","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $score = [

            [1,"홍길동",50,60,70],
            [2,"이순신",65,75,85],
            [3,"강감찬",60,80,70]
        ];

        for($i = 0; $i < count($score); $i++){
            $num =  $score[$i][0];
            $name =  $score[$i][1];
            $kor =  $score[$i][2];
            $eng =  $score[$i][3];
            $math =  $score[$i][4];

            $sql = "INSERT INTO score VALUES ($num,'$name',$kor,$eng,$math)";

            $db->exec($sql);
            echo "쿼리 실행 성공 : $sql <br>";
        }
    }catch(PDOException $e){
        exit($e->getMessage());
    }
?>