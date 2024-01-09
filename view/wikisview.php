<?php
require_once "../controller/wikicontroller.php";


$controller = new wikicontroller();
$wikis = $controller->getallwiki();
$controller->deletewiki();





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

        </style>
<header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">
       
        <h1 class="w-3/12">
            <a href="">
                <img src="../assets/images/logo.png" alt="" width="50">
            </a>
        </h1>

        <nav class="nav font-semibold text-lg">
            <ul class="flex items-center">
                <li class="p-4  cursor-pointer active">
                    <a href="indexview.php">Home</a>
                </li>
               
                <li class="p-4">
                    <a href="">Wikis</a>
                </li>

            </ul>
        </nav>
        <div class="justify-evenly">

          
        </div>
        <div class="w-3/12 flex ">

            <a href="">
                      
            <svg class="h-8 p-1 " aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-9x"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
            </a>
            <a href="">
        <i class='bx bx-user-circle text-3xl'></i>
        </a>
        </div>
        <input type="text" id="search-input" class="absolute right-0 top-0 h-full border-none focus:outline-none" placeholder="Search...">
    </header>
<section class="text-gray-600 w-4/5 ml-16 body-font overflow-hidden">
<button id="openModal" class="ml-4 px-6 py-2 mt-5 bg-gray-300 text-white rounded-md hover:bg-blue-300 transition duration-300">+ New Wiki</button>
<?php
var_dump($wikis);
        foreach ($wikis as $wiki) {


        ?>
  <div class="container px-5 py-16 mx-auto">
    
    <div class="-my-8 divide-y-2 divide-gray-100">
        
      <div class="flex flex-wrap md:flex-nowrap">
    
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <span class="font-semibold title-font text-gray-700"><?php  $wiki->getcontent();?></span>
          <span class="mt-1 text-gray-500 text-sm"><?php echo $wiki['creationDate']; ?></span>
        </div>
        <div class="md:flex-grow">
          <h2 class="text-2xl font-medium text-gray-500 title-font mb-2"><?php echo $wiki['title']; ?></h2>
          <p class="text-black "> <?php echo  substr($wiki['content'], 0, 350);  ?>...<a href="#" class="text-blue-300">View more</a></p>
         
        </div>
        <span class="text-gray-500 cursor-pointer mr-4" title="Edit" onclick="openEditModal()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24"  height="24" viewBox="0 0 24 24" style="fill: rgb(59, 130, 246);"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
                        </span>
                        
    <span class="text-red-500 cursor-pointer" title="Delete">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </span>
</a>

        
      </div>
      
    </div>
    
  </div>
  <?php
            }
                ?>


   <div id="myModal" class="fixed inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-md max-w-md w-full">
            <button id="closeModal" class="float-right text-2xl cursor-pointer">&times;</button>
            
            <form>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="w-full mb-4 p-2 border border-gray-300 rounded-md">

                <label for="content">Content:</label>
                <textarea id="content" name="content" class="w-full mb-4 p-2 border border-gray-300 rounded-md" rows="4"></textarea>

                <label for="author">Author:</label>
                <input type="text" id="author" name="author" class="w-full mb-4 p-2 border border-gray-300 rounded-md">

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" class="w-full mb-4 p-2 border border-gray-300 rounded-md">

                <button type="submit" class="bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-300">Add Wiki</button>
            </form>
        </div>
    </div>
</div>
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 mx-4 rounded-md max-w-md w-full">
            <h2 class="text-2xl font-semibold mb-4">Modifier le Wiki</h2>
            <form>
                <label for="editTitle">Title:</label>
                <input type="text" id="editTitle" name="editTitle" class="w-full mb-2 p-2 border border-gray-300 rounded-md">

                <label for="editContent">Content:</label>
                <textarea id="editContent" name="editContent" class="w-full mb-2 p-2 border border-gray-300 rounded-md" rows="4"></textarea>

                <label for="editAuthor">Author:</label>
                <input type="text" id="editAuthor" name="editAuthor" class="w-full mb-2 p-2 border border-gray-300 rounded-md">

                <label for="editDate">Date:</label>
                <input type="date" id="editDate" name="editDate" class="w-full mb-4 p-2 border border-gray-300 rounded-md">

                <div class="flex justify-end">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-300 text-white px-4 py-2 rounded-md hover:bg-gray-400 transition duration-300">Fermer</button>
                    <button type="submit" class="ml-2 bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-300">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function confirmDelete() {
    return confirm("Êtes-vous sûr de vouloir supprimer ce wiki ?");
}
</script>


<script>
    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
<script>
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('myModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('myModal').classList.add('hidden');
    });
</script>
</section>
</body>
</html>