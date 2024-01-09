<?php
require_once('../controller/usercontroller.php');
require_once('../controller/CategorieController.php');



$cat = new categorieController();
$cat->AddCategories();
$cats = $cat->DisplayCategories();
$cat->EditCategories();
$cat->deleteCategorie();
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
      <div
        class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold"
        id="submenu"
      >
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Dashboard
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Wikis
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Categories
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Tags
        </h1>
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="bi bi-box-arrow-in-right"></i>
        <span class="text-[15px] ml-4 text-white-200 font-bold">Logout</span>
      </div>
    </div>
<div class="flex justify-end mr-12 mt-5  ">
    <button type="submit" name="addcat" id="openAddCategoryModalBtn" class="bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-300"> + New Category</button>
    </div>
<div class="flex min-h-screen items-center justify-center bg-white">
    
    <div class="p-6 overflow-scroll px-0">
  <table class="w-full  table-auto text-left">
    <thead>
      <tr>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Category</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Number of wikis</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Actions</p>
        </th>
        
      </tr>
    </thead>
    <tbody>
    <?php foreach ($cats as $c) : ?>
      <tr>
        <td class="p-4 border-b border-blue-gray-50">
          <div class="flex items-center gap-3">
            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold"><?php echo $c->getCategorie() ?></p>
          </div>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">2</p>
        </td>
        
        
          
        
        <td class="p-4 border-b border-blue-gray-50">
        <a href="#" title="Edit" class="editCategorieButton" data-categorie-id="<?php echo $c->getCategorieID(); ?>" data-categorie-name="<?php echo $c->getCategorie(); ?>">                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                                <path opacity="1" fill="#2766d3" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </a>
          </td>
         
          <td class="p-4 border-b border-blue-gray-50">
            
          <a title="delete" href="categorieview.php?deletecat&categorieID=<?php echo $c->getCategorieID() ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                                <path fill="#e6321e" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </a>
            <?php endforeach; ?>
          </button>
        </td>
       
      </tr>

          
             
        </div>

        </div>

     
        


       
        <div id="edit-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4"></h2>
            <form action="" method="post">
                <input type="hidden" name="categorieID" id="editCategorieId">
                <label for="editName" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                <input type="text" name="nomCategorie" id="editName" class="w-full border border-gray-300 p-2.5 rounded-md mb-4" placeholder="Type category name" required="">
                <button type="submit" name="editcat" class="bg-blue-500 text-white rounded-md p-2.5 hover:bg-blue-700">Update Category</button>
            </form>
            <button onclick="closeEditModal()" type="submit" name="addcat" class="bg-gray-300 text-gray-700 rounded-md p-2.5 ml-2 hover:bg-gray-400">Cancel</button>
        </div>
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



<script>
        document.querySelectorAll('.editCategorieButton').forEach(button => {
            button.addEventListener('click', function() {
                showEditModal(button);
            });
        });

        function showEditModal(button) {
            var editModal = document.getElementById('edit-modal');
            if (editModal) {
                editModal.querySelector('#editCategorieId').value = button.dataset.categorieId || '';
                editModal.querySelector('#editName').value = button.dataset.categorieName || '';
                editModal.classList.remove('hidden');
            }
        }

        function closeEditModal() {
            var editModal = document.getElementById('edit-modal');
            if (editModal) {
                editModal.classList.add('hidden');
            }
        }
    </script>


<div id="add-category-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">Add New Category</h2>
        <form action="" method="post">
            <label for="newCategory" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
            <input type="text" name="newCategory" id="newCategory" class="w-full border border-gray-300 p-2.5 rounded-md mb-4" placeholder="Type category name" required="">
            <button type="submit" name="addNewCategory" class="bg-blue-500 text-white rounded-md p-2.5 hover:bg-blue-700">Add Category</button>
        </form>
        <button onclick="closeAddCategoryModal()" class="bg-gray-300 text-gray-700 rounded-md p-2.5 ml-2 hover:bg-gray-400">Cancel</button>
    </div>
</div>

<script>
    // Fonction pour ouvrir le popup
    function openAddCategoryModal() {
        document.getElementById('add-category-modal').classList.remove('hidden');
    }

    // Fonction pour fermer le popup
    function closeAddCategoryModal() {
        document.getElementById('add-category-modal').classList.add('hidden');
    }

    // Ajoute un gestionnaire d'événements au bouton pour ouvrir le popup
    document.getElementById('openAddCategoryModalBtn').addEventListener('click', function() {
        openAddCategoryModal();
    });
</script>
</body>
</html>