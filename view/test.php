<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">

    <title>Document</title>
</head>
<body>
    
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40  bg-blue-500  w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50   bg-blue-200 ">
      <ul class="space-y-2 font-medium">
        <li>
        <img src="../assets/images/logo.png" alt="" height="25px" width="50px">

        </li>

         <li>
            <a href="#" class="flex items-center p-2 text-white font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2  text-white font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              
               <span class="flex-1 ms-3  whitespace-nowrap">Wikis</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-white font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              
               <span class="flex-1 ms-3 whitespace-nowrap">Tags</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-white font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              
               <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-white font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
             
               <span class="flex-1 ms-3 whitespace-nowrap">LogOut</span>
            </a>
         </li>
    
      </ul>
   </div>
</aside>
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