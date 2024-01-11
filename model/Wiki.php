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
    private $user;
    
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
public function getcreationDate()
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




    


    public function addWikiTag($wikiID, $tagID)
    {
        $sql = "INSERT INTO wikitag (wikiID, tagID) VALUES (:wikiID, :tagID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID);
        $stmt->bindParam(':tagID', $tagID);
        return $stmt->execute();
    }
//    ajouter wikis//
    public function addWiki()
    {
        $sql = "INSERT INTO wiki (title, content, creationDate, iduser, categorieID) VALUES (:title, :content, :creationDate, :iduser, :categorieID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':creationDate', $this->creationDate);
     
    
        $result = $stmt->execute();
    
        $wikiID = $this->conn->lastInsertId();
    
        return $result ? $wikiID : false;
    }

    // afficher recent wikis//
    public function getwiki()
    {
        $query = "SELECT wiki.wikiID, wiki.title, wiki.content, wiki.creationDate,c.nomCategorie, user.prenom, user.nom
        FROM wiki
        JOIN user ON wiki.iduser = user.iduser
        JOIN categorie c ON c.categorieID = wiki.categorieID
        ORDER BY wiki.creationDate DESC
        LIMIT 2";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $wik = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis= [];
        foreach ($wik as $w) {
            $wiki = new Wiki();
            $wiki->setwikiID($w['wikiID']);
            $wiki->settitle($w['title']);
            $wiki->setCreationDate($w['creationDate']);
            $wiki->setcontent($w['content']);


            $cat = new CategorieModel();
            $cat->setCategorie($w['nomCategorie']);



            $user = new UserModel();
            $user->setNom($w['nom']);
            $user->setPrenom($w['prenom']);


            $wikirows = [
                'wiki' => $wiki,
                'category' => $cat,
                'user' => $user,
            ];

            $wikis[] = $wikirows;
       
        }
        return $wikis; 
    }

    
 //afficher tout les wikis//      
    
    public function getallwiki()
    {
        $query = "SELECT wiki.wikiID, wiki.title, wiki.content, wiki.creationDate, c.nomCategorie, user.prenom, user.nom, GROUP_CONCAT(tags.nomTag) as tagList
        FROM wiki
        JOIN user ON wiki.iduser = user.iduser
        JOIN categorie c ON c.categorieID = wiki.categorieID
        LEFT JOIN wikitag ON wikitag.wikiID = wiki.wikiID
        LEFT JOIN tags ON wikitag.tagID = tags.tagID
        GROUP BY wiki.wikiID, wiki.title, wiki.content, wiki.creationDate, c.nomCategorie, user.prenom, user.nom
        ORDER BY wiki.creationDate DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $wik = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis= [];
        foreach ($wik as $w) {
            $wiki = new Wiki();
            $wiki->setwikiID($w['wikiID']);
            $wiki->settitle($w['title']);
            $wiki->setCreationDate($w['creationDate']);
            $wiki->setcontent($w['content']);


            $cat = new CategorieModel();
            $cat->setCategorie($w['nomCategorie']);



            $user = new UserModel();
            $user->setNom($w['nom']);
            $user->setPrenom($w['prenom']);

            $ta = new tagModel();
            $ta->setTag($w['tagList']);


            $wikirows = [
                'wiki' => $wiki,
                'category' => $cat,
                'user' => $user,
                'tagList'=> $ta,
            ];

            $wikis[] = $wikirows;
       
        }
        return $wikis; 
    }
    
       
  


    public function deletewiki(){
        $query = "DELETE FROM `wiki` WHERE wikiID = :wikiID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wikiID", $this->wikiID);
        $stmt->execute();
    }



    // public function countWikis()
    // {
    //     $sql = "SELECT COUNT(*) as total FROM wiki";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(); 
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $result['total'];
    // }
    }

   
    
