<?php
/**
 * Created by PhpStorm.
 * User: sds
 * Date: 2019-11-20
 * Time: 오후 10:13
 */

class BoardDao
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=php_db","root","");
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->db->exec("set names utf8"); // 한글 깨짐 방지
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }


    // 게시팜의 전체 글 수(전체 레코드 수) 반환
    public function getNumMsgs(){
        try {
            $query = $this->db->prepare("SELECT COUNT(*) FROM board");
            $query->execute();

            $numMsgs = $query->fetchColumn();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }

        return $numMsgs;
    }

    //$num번 게시글의 데이터 반환
    public  function  getMsg($num){
        try {
            $query = $this->db->prepare("SELECT * FROM board WHERE num = :num");
            $query->bindValue(":num",$num,PDO::PARAM_INT);
            $query->execute();
            $msg = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }

        return $msg;
    }

    // $start번부터 $rows 개의 게시글 데이터 반환 (2차원배열)
    public function getManyMsgs($start, $rows){
        try {
            $query = $this->db->prepare("SELECT * FROM board order by num desc LIMIT :start. :rows");
            $query->bindValue(":start",$start,PDO::PARAM_INT);
            $query->bindValue(":rows",$rows,PDO::PARAM_INT);
            $query->execute();

            $msgs = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }

    // 새글을  DB에 추가
    public function insertMsg($writer, $title, $content){
        try {
            $query = $this->db->prepare("INSERT INTO board (writer,title,content,regtime,hits) VALUE (:writer, :title, :content, :regtime, 0)");
            $regtime = date("Y-m-d H:i:s");
            $query->bindValue(":writer",$writer,PDO::PARAM_STR);
            $query->bindValue(":title",$title,PDO::PARAM_STR);
            $query->bindValue(":content",$content,PDO::PARAM_STR);
            $query->bindValue(":regtime",$regtime,PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }

    //$num번째 게시글 업데이트
    public function updateMsg($num, $writer, $title, $content){
        try {
            $query = $this->db->prepare("UPDATE board SET writer= :writer, title=:title, content=:content, regtime=:regtime WHERE num=:num");
            $regtime = date("Y-m-d H:i:s");
            $query->bindValue(":writer".$writer,PDO::PARAM_STR);
            $query->bindValue(":title",$title,PDO::PARAM_STR);
            $query->bindValue(":content",$content,PDO::PARAM_STR);
            $query->bindValue(":regtime ",$regtime,PDO::PARAM_STR);
            $query->bindValue(":num".$num.PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }

    //$num 번째 글 삭제
    public function deleteMsg($num){
        try {
            $query = $this->db->prepare("DELETE FROM board WHERE num = :num");
            $query->bindValue(":num",$num.PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }

    //$num번 게시글의 조회수 증가
    public function increaseHits($num){
        try {
            $query = $this->db->prepare("UPDATE board SET hits=hits+1 WHERE num = :num");
            $query->bindValue(":num",$num,PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }

}