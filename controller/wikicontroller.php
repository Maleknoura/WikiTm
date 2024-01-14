<?php
require_once "../model/Wiki.php";

class wikicontroller
{

    public $Wiki;
    private $wikiID;

    public function getwikis()
    {

        $wikimodel = new Wiki();
        return $wikimodel->getwiki();
    }

    public function getallwiki()
    {

        $wikimodel = new Wiki();
        return $wikimodel->getallwiki();
    }

    public function statiwikis()
    {
        $wikiModel = new Wiki();
        return $statiwikis = $wikiModel->getWikiStatistics();
    }


    public function addWikis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addwiki'])) {
            $wiki = new Wiki();

            $categoryID = (int)$_POST['categorieID'];
            $iduser = $_SESSION['iduser'];

            $wiki->settitle($_POST['title']);
            $wiki->setcontent($_POST['content']);
            $wiki->setCategoryId($categoryID);
            $wiki->setUserId($iduser); 

            $wikiID = $wiki->addWiki();
            if ($wikiID !== false) {
                if (!empty($_POST['selectedTagIds'])) {
                    $tagIDs = json_decode($_POST['selectedTagIds'], true);

                    foreach ($tagIDs as $tagID) {
                        $wiki->addWikiTag($wikiID, $tagID);
                    }
                }

                header('Location: wikisview.php');
                exit;
            } else {
                echo "Failed to add a new wiki.";
            }
        }
    }




    public function deletewiki()
    {



        if (isset($_GET['deletewiki']) && isset($_GET['wikiID'])) {
            $wikiID = $_GET['wikiID'];
            $wiki = new Wiki();
            $wiki->deletewiki($wikiID);
            // var_dump($wikiID);
            // die("cc");
            header("Location: wikisview.php");
            exit();
        }
    }
    public function archivedwiki()
    {
        if (isset($_GET['archivewiki']) && isset($_GET['wikiID'])) {
            $wikiID = $_GET['wikiID'];
            // var_dump($wikiID);
            // die("cc");
            $wiki = new Wiki();
            $wiki->archivedWiki($wikiID);
            header('Location: wikisadmin.php');
            exit();
        }
    }


    public function detofwikis()
    {

        if (isset($_GET['detailofwiki']) && isset($_GET['wikiID'])) {
            $wikiID = $_GET['wikiID'];

            $wiki = new Wiki();
            return $wiki->detofwiki($wikiID);
        }
    }
    // public function updateWiki()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    //         if (isset($_POST['newInput'])) {
                
    //             $wikiID = $_POST['newInput'];
               
              
    //             if (!$this->Wiki) {
    //                 $this->Wiki = new Wiki();
    //             }
    
               
    //             $this->Wiki->setwikiId($wikiID);
    //             $this->Wiki->settitle($_POST['title']);
    //             $this->Wiki->setCategoryId($_POST['categorieID']);
    //             $tagID=$_POST['selectedTagIds'];
    //             $this->Wiki->setcontent($_POST['content']);
    
    //             if ($this->Wiki->updateWikis($tagID)) {
    //                 header('location: wikisview.php');
    //                 exit();
    //             }else{
    //                 die('noura');
    //             }
    //         }else {
    //             var_dump($wikiID);
    //           die('gbhjklm');
    //         }
    //     }
    // }


    public function updateWiki()
{
    $wikiID = null; // Déclaration préalable de $wikiID

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        if (isset($_POST['aaaaaaaaaaaa'])) {
            $wikiID = $_POST['aaaaaaaaaaaa'];
            $categorieID = $_POST['categorieID'];


                $Wiki = new Wiki();
            

            $Wiki->setwikiId($wikiID);
            $Wiki->settitle($_POST['title']);
            $Wiki->setCategoryId($_POST['categorieID']);
            $tagsID = json_decode($_POST['selectedTagIds'],true);
            var_dump($tagsID);
            $Wiki->setcontent($_POST['content']);
          $Wiki->updateWikis($wikiID,$categorieID);

          foreach($tagsID as $tagID){
           $res = $Wiki->addWikiTag($wikiID,$tagID);
          }
          
            if ($res) {

                header('location: wikisview.php');
                exit();
            } else {
                die('noura');
            }
        } else {
            var_dump($wikiID);
            die('gbhjklm');
        }
    }
}

    
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['param'])) {
    $param = $_POST['param'];

    $wiki = new Wiki();
    $searchResults = $wiki->searchWiki($param);

    header('Content-Type: application/json');
    echo json_encode($searchResults);
}
