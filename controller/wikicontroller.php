<?php
require_once "../model/Wiki.php";

class wikicontroller
{

    public $Wiki;
    private $wikiID;

    public function getwiki(){

        $wikimodel = new Wiki();
        $this->Wiki = $wikimodel->getwiki();
    }

    public function getallwiki()
    {

        $wikimodel = new Wiki();
        return $wikimodel->getallwiki();
        
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
}
