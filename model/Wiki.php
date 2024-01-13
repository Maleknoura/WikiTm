<?php
require_once "../model/Database.php";




class Wiki
{
    private $conn;
    private $wikiID;
    private $title;
    private $content;
    private $creationDate;

    private $categoryID; 
    private $iduser;

    // Constructor
    public function __construct()
    {
        $this->conn = Database::getDb()->getConn();
    }

    // Getters
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
        return $this->creationDate;
    }

    public function getidUser() 
    {
        return $this->iduser;
    }

    // Setters
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

    public function setCategoryId($categoryID) 
    {
        $this->categoryID = $categoryID;
    }

    public function setUserId($iduser) 
    {
        $this->iduser = $iduser;
    }

    public function addWikiTag($wikiID, $tagID)
    {
        $sql = "INSERT INTO wikitag (wikiID, tagID) VALUES (:wikiID, :tagID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID);
        $stmt->bindParam(':tagID', $tagID);
        return $stmt->execute();
    }

    // Add wikis
    public function addWiki()
    {
        $sql = "INSERT INTO wiki (title, content, iduser, categorieID) VALUES (:title, :content, :iduser, :categorieID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':iduser', $this->iduser);
        $stmt->bindParam(':categorieID', $this->categoryID); 

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
        $wikis = [];
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
        $query = "SELECT w.wikiID, w.title,w.content, w.creationDate,c.categorieID, c.nomCategorie, u.nom, u.prenom,t.tagID, GROUP_CONCAT(t.nomTag) as tagnames
        FROM wiki w
        LEFT JOIN categorie c ON w.categorieID = c.categorieID
        LEFT JOIN user u ON w.iduser = u.iduser
        LEFT JOIN wikitag wt ON w.wikiID = wt.wikiID
    LEFT JOIN tags t on t.tagID = wt.tagID
    WHERE isarchived IS NULL
    GROUP BY w.wikiID ORDER BY w.creationDate DESC;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $wik = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = [];
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
            $ta->setTag($w['tagnames']);


            $wikirows = [
                'wiki' => $wiki,
                'category' => $cat,
                'user' => $user,
                'tagnames' => $ta,
            ];

            $wikis[] = $wikirows;
        }
        return $wikis;
    }

    public function archivedWiki($wikiID)
    {
        $sql = "UPDATE wiki SET isarchived = 1 WHERE wikiID = :wikiID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID);
        return $stmt->execute();
    }



    public function deletewiki($wikiID)
    {
        $query = "DELETE FROM wiki WHERE wikiID = :wikiID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wikiID", $wikiID);
        return $stmt->execute();
        // $stmt->execute();
    }

    public function searchWiki($param)
    {
        $param = '%' . $param . '%';

        $query = "SELECT w.wikiID, w.title, w.content, w.creationDate, c.nomCategorie, u.nom, u.prenom, GROUP_CONCAT(t.nomTag) as tagnames
        FROM wiki w
        LEFT JOIN categorie c ON w.categorieID = c.categorieID
        LEFT JOIN user u ON w.iduser = u.iduser
        LEFT JOIN wikitag wt ON w.wikiID = wt.wikiID
        LEFT JOIN tags t ON t.tagID = wt.tagID
        WHERE isarchived IS NULL AND (w.title LIKE :param OR c.nomCategorie LIKE :param OR t.nomTag LIKE :param)
        GROUP BY w.wikiID
        ORDER BY w.creationDate DESC";


        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':param', $param, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getWikiStatistics()
    {
        $sql = "SELECT COUNT(*) AS totalWikis FROM wiki";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function detofwiki($wikiID)
    {
        $sql = "SELECT w.wikiID, w.title,w.content, w.creationDate, c.nomCategorie, u.nom, u.prenom, GROUP_CONCAT(t.nomTag) as tagnames
    FROM wiki w
    LEFT JOIN categorie c ON w.categorieID = c.categorieID
    LEFT JOIN user u ON w.iduser = u.iduser
    LEFT JOIN wikitag wt ON w.wikiID = wt.wikiID
    LEFT JOIN tags t on t.tagID = wt.tagID
    WHERE w.wikiID = :wikiID AND isarchived IS NULL";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID, PDO::PARAM_INT);
        $stmt->execute();

        $wikisData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $wikis = [];
        foreach ($wikisData as $wi) {
            $wiki = new Wiki();
            $wiki->setwikiID($wi['wikiID']);
            $wiki->settitle($wi['title']);
            $wiki->setContent($wi['content']);
            $wiki->setCreationDate($wi['creationDate']);
            $cat = new CategorieModel();
            $cat->setCategorie($wi['nomCategorie']);
            $user = new UserModel();
            $user->setNom($wi['nom']);
            $user->setPrenom($wi['prenom']);
            $tagNames = explode(',', $wi['tagnames']);
            $tags = array_map('trim', $tagNames);
            $tag = new tagModel();
            $tag->setTag($tags);
            $wikiData = [
                'wiki' => $wiki,
                'category' => $cat,
                'user' => $user,
                'tagnames' => $tag,
            ];

            $wikis[] = $wikiData;
        }

        return $wikis;
    }

   public function updateWikis($categorieID,$tagID)
{
    try {
        $this->conn->beginTransaction();

        // Update wiki
        $stmt = $this->conn->prepare("UPDATE wiki SET title = :title, content = :content, categorieID = :categorieID WHERE wikiID = :wikiID");
        $stmt->bindParam(':wikiID', $this->wikiID);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':categorieID', $categorieID);
        $stmt->execute();

        // Delete existing tags for the wiki
        $sqlDeleteTags = $this->conn->prepare("DELETE FROM wikitag WHERE wikiID = :wikiID");
        $sqlDeleteTags->bindParam(':wikiID', $this->wikiID);
        $sqlDeleteTags->execute();

        // Add new tags for the wiki
        if (!empty($tagID)) {
            foreach ($tagID as $tagID) {
                $sqlInsertTags = $this->conn->prepare("INSERT INTO wikitag (wikiID, tagID) VALUES (:wikiID, :tagID)");
                $sqlInsertTags->bindParam(':wikiID', $this->wikiID);
                $sqlInsertTags->bindParam(':tagID', $tagID);
                $sqlInsertTags->execute();
            }
        }

        $this->conn->commit();
    } catch (PDOException $e) {
        $this->conn->rollBack();
      
        echo "Error: " . $e->getMessage();
        return false;
    }

    return true;
}

    
}
