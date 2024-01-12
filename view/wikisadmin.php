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
    


    <span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div
      class="sidebar fixed top-0 bottom-0 lg:left-0 p-6 w-[300px] overflow-y-auto text-center bg-blue-200 "
    >
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
        
    <img src="../assets/images/logo.png" alt="" height="15px" width="50px" >
          <!-- <i
            class="bi bi-x cursor-pointer ml-28 lg:hidden"
            onclick="openSidebar()"
          ></i> -->
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div>
     
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="bi bi-house-door-fill"></i>
        <span class="text-[15px] ml-4 text-white-200 font-bold"> Dashboard</span>
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="bi bi-bookmark-fill"></i>
        <span class="text-[15px] ml-4 text-white-200 font-bold">Wikis</span>
      </div>
      <div class="my-4 bg-gray-600 h-[1px]"></div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        onclick="dropdown()"
      >
        <i class="bi bi-chat-left-text-fill"></i>
        <div class="flex justify-between w-full items-center">
          <span class="text-[15px] ml-4 text-white-200 font-bold">Categories</span>
          <span class="text-sm rotate-180" id="arrow">
            <i class="bi bi-chevron-down"></i>
          </span>
        </div>
      
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="bi bi-bookmark-fill"></i>
        <span class="text-[15px] ml-4 text-white-200 font-bold">Tags</span>
      </div>
     
      </div>
     
        <i class="bi bi-box-arrow-in-right"></i>
        <span class="text-[15px] ml-4 text-white-200 font-bold">Logout</span>
        
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