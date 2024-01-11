
<?php
require_once('../controller/wikicontroller.php');

$wikicontroller = new WikiController();
// $totalWikis = $wikicontroller->showWikisCount();

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <title>Document</title>
</head>
<body>
    <!-- component -->
    <span class=" text-white text-4xl top-5 left-4 cursor-pointer" onclick="openSidebar()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-6 w-[300px] overflow-y-auto text-center bg-blue-200 ">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">

                <img src="../assets/images/logo.png" alt="" height="15px" width="50px">
                <!-- <i class="bi bi-x cursor-pointer ml-28 lg:hidden" onclick="openSidebar()"></i> -->
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-white-200 font-bold"> Dashboard</span>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <a href="wikisadmin.php">
                <i class="bi bi-bookmark-fill"></i>
                <span class="text-[15px] ml-4 text-white-200 font-bold">Wikis</span>
            </a>
        </div>
        <div class="my-4 bg-gray-600 h-[1px]"></div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="dropdown()">

            <i class="bi bi-chat-left-text-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-white-200 font-bold">Categories</span>
                <span class="text-sm rotate-180" id="arrow">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>

        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <span class="text-[15px] ml-4 text-white-200 font-bold">Tags</span>
        </div>

    </div>


 <div class="flex bg-gray-100 ml-12 ">
    
  <div class="container mx-auto ">
    <div class="w-64 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-gray-300 flex items-center justify-between">
        <p class="mr-0 text-white text-lg pl-5">BT SUBSCRIBERS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
        <p>TOTAL</p>
      </div>
      <!-- <p class="py-4 text-3xl ml-5"><?php echo $totalWikis; ?></p> -->
        
    </div>
  </div>
      

 

 



</body>
</html>