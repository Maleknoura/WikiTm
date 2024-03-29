<?php
require_once(__DIR__ . '/../model/CategorieModel.php');

class categorieController
{

    public function AddCategories()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addcat'])) {
            $categorie = new CategorieModel();
            $categorie->setCategorie($_POST['nomCategorie']);
            $currentDateTime = date('Y-m-d H:i');
            $categorie->setDateCategorie($currentDateTime);
            $categorie->addCategorie();
            header('Location: categorieview.php');
            exit;
        }
    }


    public function DisplayCategories()
    {
        $cat = new CategorieModel();
        return $cat->DisplayCategorie();
    }

    public function EditCategories()
    {
        $categorie = new CategorieModel();
        if (isset($_POST['editcat']) && isset($_POST['categorieID'])) {
            $idcat = $_POST['categorieID'];
            $categorie->setCategorie($_POST['nomCategorie']);
            $currentDateTime = date('Y-m-d H:i');
            $categorie->setDateCategorie($currentDateTime);
            $categorie->editCategorie($idcat);
            header("Location: categorieview.php");
            exit();
        }
    }

    public function deleteCategorie()
    {
        if (isset($_GET['deletecat']) && isset($_GET['categorieID']) ) {
            $categorieID = $_GET['categorieID'];
            $categorie = new CategorieModel();
            $categorie->deleteCategorie($categorieID);
            header('Location: categorieview.php');
            exit();
        }
    }

public function stacategorie(){

    $categoryModel = new CategorieModel();
   return $categoryStatistics = $categoryModel->getCategoryStatistics();
}
    
}