<meta charset="utf-8" />
<style>
    table {
        width:400px;text-align:center;
    }
    th {background-color:cyan}
</style>
<body>
<table>
    <tr>
        <th>번호</th>
        <th>이름</th>
        <th>국어</th>
        <th>영어</th>
        <th>수학</th>
        <th>총점</th>
        <th>평균</th>
    </tr>
<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=phpdb","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $db->query("SELECT * FROM score");

        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>".$row["num"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["kor"]."</td>";
            echo "<td>".$row["eng"]."</td>";
            echo "<td>".$row["math"]."</td>";
            $sum = $row["kor"]+$row["eng"]+$row["math"];
            echo "<td>".$sum."</td>";
            echo "<td>".number_format($sum/3,2)."</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
       exit($e->getMessage());
    }
?>
</table>
</body>