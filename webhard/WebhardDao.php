<?php
class WebhardDao
{
    private $db;

    // DB에 접속하고  PDO 객체를 저장하기 위한 프로퍼티
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=phpdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }

    // 모든 파일 정보 반환
    // $sort 필드 기준으로 정렬, $dir는 정렬방향 (asc/desc)
    public function getFileList($sort, $dir){
        $result = "";
        try{
            $query = $this->db->prepare("SELECT * FROM webhard order by $sort $dir");
            $query->execute();
             $result =  $query->fetchAll(PDO::FETCH_ASSOC);


        }catch (PDOException $exception) {
            $exception->getMessage();
        }

        return $result;
    }

    //새파일 정보를 DB에 저장

    public function addFileInfo($fname, $ftime, $fsize){
        try{
            $sql = "INSERT INTO webhard (fname, ftime, fsize) value (:fname, :ftime, :fsize)";
            $query = $this->db->prepare($sql);

            $query->bindValue(":fname",$fname, PDO::PARAM_STR);
            $query->bindValue(":ftime",$ftime, PDO::PARAM_STR);
            $query->bindValue(":fsize",$fsize, PDO::PARAM_INT);
            $query->execute();
        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    // $num번 파일 정보를  db에서 삭제하고 그 파일명을 반환
    public function deleteFileInfo($num){
        $result = "";
        try{
            // 삭제할 파일명을 $result에 담아둠
            $query = $this->db->prepare("SELECT fname FROM webhard where num = :num");
            $query->bindValue(":num","$num",PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetchColumn(); 
            // 특정한 칼럼값 하나만 반환 
            // 사용법은 fetchColumn(컬럼번호);
            // 컬럼 번호는 0부터 시작이고 컬럼 번호가 생략되면 0으로 간주

            //지정된 레코드 삭제
            $query =  $this->db->prepare("DELETE FROM webhard WHERE num = :num");
            $query ->bindValue(":num",$num,PDO::PARAM_INT);

            $query->execute();

        }catch (PDOException $exception){
            $exception->getMessage();
        }

        return $result;
    }

}