<?php
require_once "../model/Wiki.php";

class wikicontroller{

public $Wiki;

public function getwiki(){

    $wikimodel = new Wiki();
    $this->Wiki = $wikimodel->getwiki();
}

}




?>