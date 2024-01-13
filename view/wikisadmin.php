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
        <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-lg border border-blue-600 opacity-75 rounded-md shadow-4xl m-4 relative">
    <div class="border-b-p-4">

        <h2 class="text-xl text-center font-semibold">All wikis</h2>
    </div>

    <?php


foreach ($recentwiki as $wtest) :


        $wiW = $wtest['wiki'];
        $wC = $wtest['category'];
        $wU = $wtest['user'];
        $wT = $wtest['tagnames'];
       
        



?>     
<div class="px-6 py-4">
    <div class="flex justify-between">
        <p class="text-lg text-bold"><?php echo ($wiW->gettitle()); ?></p>
        <span class="text-green-600 ml-5">
            <a href="wikisadmin.php?archivewiki&wikiID=<?php echo $wiW->getid(); ?>" title="Archive">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                </svg>
            </a>
        </span>
    </div>
</div>


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