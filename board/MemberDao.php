<?php


class MemberDao
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

    public function getMember($id){
        try {
            $query = $this->db->prepare("SELECT * FROM member WHERE id = :id");
            $query->bindValue(":id",$id,PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }

        return $result;
    }

    public function insertMember($id, $pw, $name){
        try {
            $query = $this->db->prepare("INSERT INTO member values (:id,:pw,:name)");
            $query->bindValue(":id",$id,PDO::PARAM_STR);
            $query->bindValue(":pw",$pw,PDO::PARAM_STR);
            $query->bindValue(":name",$name,PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }

    public function updateMember($id, $pw, $name){
        try {
            $query = $this->db->prepare("UPDATE member SET pw=:pw, name=:name WHERE id=:id");
            $query->bindValue(":id",$id,PDO::PARAM_STR);
            $query->bindValue(":pw",$pw,PDO::PARAM_STR);
            $query->bindValue(":name",$name,PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }
}