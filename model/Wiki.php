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
// getters//
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
public function setwikiId($wikiID)
{
    $this->wikiID = $wikiID;
}
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




    

    // set magic
    // public function __set($parametre, $value)
    // {
    //     $this->$parametre = $value;

    // }
    // // get magic
    // public function __get($parametre)
    // {
    //    return  $this->$parametre;
    // }
    public function addWikiTag($wikiID, $tagID)
    {
        $sql = "INSERT INTO wikitag (wikiID, tagID) VALUES (:wikiID, :tagID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID);
        $stmt->bindParam(':tagID', $tagID);
        return $stmt->execute();
    }

    public function addWiki($iduser, $categorieID)
    {
        $sql = "INSERT INTO wiki (title, content, creationDate, iduser, categorieID) VALUES (:title, :content, :creationDate, :iduser, :categorieID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':creationDate', $this->creationDate);
        $stmt->bindParam(':iduser', $iduser);
        $stmt->bindParam(':categorieID', $categorieID);
    
        $result = $stmt->execute();
    
        $wikiID = $this->conn->lastInsertId();
    
        return $result ? $wikiID : false;
    }
    public function getwiki()
    {
        $query = "SELECT wiki.title, wiki.content, wiki.creationDate, user.prenom, user.nom,CONCAT(user.prenom, ' ', user.nom) as fullname  
        FROM wiki
        JOIN user ON wiki.iduser = user.iduser
        ORDER BY wiki.creationDate DESC
        LIMIT 2";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getallwiki()
    {
        $query = "SELECT wiki.title, wiki.content, wiki.creationDate,categorie.nomCategorie, user.prenom, user.nom,CONCAT(user.prenom, ' ', user.nom) as fullname 
        FROM wiki
        JOIN user ON wiki.iduser = user.iduser
        JOIN categorie ON wiki.categorieID = categorie.categorieID";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $w = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $wikis = [];
        foreach ($w as $wi) {
            $wiki = new Wiki();
            $wiki->setwikiId($wi['wikiID']);
            $wiki->setcontent($wi['content']);
            $wiki->setcreationdate($wi['creationdate']);
            $wiki->settitle($wi['title']);
            
            $wikis[] = $wiki;
        }
        return $wikis;
    }
       




    public function deletewiki(){
        $query = "DELETE FROM `wiki` WHERE wikiID = :wikiID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wikiID", $this->wikiID);
        $stmt->execute();
    }
    }

   
    
