<?php


require_once('../controller/wikicontroller.php');
require_once "../controller/CategorieController.php";
require_once "../controller/TagController.php";
require_once "../controller/usercontroller.php";


$controller = new wikicontroller();

$recentwiki = $controller->getallwiki();
$controller->archivedwiki();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Document</title>
</head>
<body>
    


  <?php include "aside.php" ?>
  <div class="p-20 mb-14 sm:ml-60">
        <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-lg m-4 relative">
    <div class="border-b-p-4">
        <h2 class="text-xl text-center font-semibold">All wikis</h2>
    </div>

    <?php


foreach ($recentwiki as $wtest) :


        $wiW = $wtest['wiki'];
        $wC = $wtest['category'];
        $wU = $wtest['user'];
        $wT = $wtest['tagList'];
       
        



?>
        <div class="px-6 py-4">
            <div class="flex justify-between">
                <p class="text-lg "><?php echo ($wiW->gettitle()); ?></p>
                <span class="text-green-600 ml-5"><a href="wikicontroller.php?archivewiki&wikiID=<?php echo $wikiID; ?>">Archive</a></span>
            </div>
        </div>
        <div class="absolute inset-0 border border-blue-600 opacity-75 rounded-md shadow-4xl"></div>
    <?php endforeach; ?>

</div>

     <script type="text/javascript">
      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
    </script>
  </body>
    </html>