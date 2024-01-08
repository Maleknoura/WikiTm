<?php
require_once "../model/Database.php";


class Wiki
{
    private $conn;
    private $wikiID;
    private $title;
    private $content;
    private $creationDate;
    private $iduser;
    private $categoryID;

    // construct//
    public function __construct()
    {
        $this->conn = Database::getDb()->getConn();
    }
    //getters//
    public function getid()
    {
        return $this->wikiID;
    }
    public function gettitle()
    {
        return $this->title;
    }
    public function getcontent()
    {
        return $this->content;
    }
    public function creationDate()
    {
        return $this->title;
    }
    public function iduser()
    {
        return $this->iduser;
    }

    //setters//
    public function settitle($title)
    {
        $this->title = $title;
    }
    public function setcontent($content)
    {
        $this->content = $content;
    }
    public function setcreationdate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function addwiki()
    {
        $query = "INSERT INTO `wiki`(`title`, `content`, `creationDate`, `iduser`, `categorieID`) VALUES ( `:title`, `:content`, `:creationDate`, `:iduser`, `:categorieID)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":creationDate", $this->creationDate);
        $stmt->bindParam(":iduser", $this->iduser);
        $stmt->bindParam(":categorieID", $this->categoryID);

        $stmt->execute();
    }
    public function getwiki()
    {
        $query = "SELECT wiki.title, wiki.content, wiki.creationDate,  CONCAT(user.prenom, ' ', user.nom) as fullname  
        FROM wiki
       JOIN user ON wiki.iduser = user.iduser";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
