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


    public function addWikis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addwiki'])) {
            $wiki = new Wiki();
    
            $categoryID = (int)$_POST['categorieID'];
            // $iduser = $_SESSION['iduser'];
    
            $wiki->settitle($_POST['title']);
            $wiki->setcontent($_POST['content']); 
            $wiki->setCategoryId($categoryID); 
            // $wiki->setUserId($iduser); 
    
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

        if (isset($_GET['wikiID'])) {
            $wikiID = $_GET['wikiID'];
            if (isset($_GET['deletewiki']) && isset($_GET['wikiID'])) {

                $wiki = new Wiki();
                $wiki->deletewiki($wikiID);
                header("Location: wikisview.php?deletewiki&wikiID=$wikiID");
                exit();
            }
        }
    }

    public function archivedwiki()
    {
        if (isset($_GET['archivewiki']) && isset($_GET['wikiID'])) {
            $wikiID = $_GET['wikiID'];

            $wiki = new Wiki();
            $wiki->archivedWiki($wikiID);
            header('Location: wikisadmin.php');
            exit();
        }
    }


    // public function showWikisCount()
    // {
    //     $wikiModel = new Wiki();
    //     $totalWikis = $wikiModel->countWikis();

    // }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['param'])) {
    $param = $_POST['param'];

    $wiki = new Wiki();
    $searchResults = $wiki->searchWiki($param);

    header('Content-Type: application/json');
    echo json_encode($searchResults);
}
