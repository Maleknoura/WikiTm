<?php
session_start();
require_once "../controller/wikicontroller.php";
require_once "../controller/CategorieController.php";
require_once "../controller/TagController.php";
require_once "../controller/usercontroller.php";


$controller = new wikicontroller();
$cont = new usercontroller();
$cont->logout();
$recentwiki = $controller->getallwiki();
// if (isset($_SESSION['role'])) {
//     $controller->addWikis();
// } else {
//     header('location.loginview.php');
// }
$controller->addWikis();
$controller->updateWiki();
$controller->deletewiki();

$cat = new categorieController();
$cats = $cat->DisplayCategories();

$tag = new tagController();
$tags = $tag->DisplayTags();


$wikiDet = $controller->detofwikis();



$user = new usercontroller();
$m = $user->login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>

<body>

    <?php include "head.php";


    ?>


    <section class="text-gray-600 w-4/5 ml-16 body-font overflow-hidden">
        <div class="flex items-center justify-between mb-5">
            <div>
                <button id="openModal" name="addwiki" class="ml-4 px-6 py-2 mt-5 bg-gray-300 text-white rounded-md hover:bg-blue-300 transition duration-300">+ New Wiki</button>
            </div>
            <div>
                <input type="text" id="search" name="search" placeholder="Search..." class="p-2  mt-5  border border-gray-300 rounded-md">
                <button id="searchButton" class="ml-2  py-2 bg-gray-300 text-white rounded-md hover:bg-blue-400 transition duration-300">Search</button>
<!-- <?php echo $_SESSION['iduser'] ?>; -->
            </div>
        </div>
        <div class="newcontents">
            <?php


            foreach ($recentwiki as $wtest) :

                $wiW = $wtest['wiki'];
                $wC = $wtest['category'];
                $wU = $wtest['user'];
                $wT = $wtest['tagnames'];
                //var_dump($wU->getid());




            ?>

                <div class="container px-5 py-16 mx-auto">

                    <div class="-my-8 divide-y-2 divide-gray-100">

                        <div class="flex flex-wrap md:flex-nowrap">
                            <!-- `      <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col"> ${element.conten}` -->
                            <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                <span class="font-semibold title-font text-gray-700"><?php echo ($wC->getCategorie())  ?></span>
                                <span class="mt-1 text-gray-500 text-sm"><?php echo ($wT->getTag()); ?></span>
                            </div>
                            <div class="md:flex-grow">
                                <h2 class="text-2xl font-medium text-gray-500 title-font mb-2"><?php echo ($wiW->gettitle()); ?></h2>
                                <p class="text-black "> <?php echo substr($wiW->getcontent(), 0, 350); ?>...<a href="detailofwiki.php?detailofwiki&wikiID=<?php echo $wiW->getid(); ?>" class="text-blue-300">View more</a></p>

                            </div>
                            <!-- <span class="text-gray-500 cursor-pointer mr-4" title="Edit" name="update"  onclick="openEditModal() ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(59, 130, 246);">
                                    <path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path>
                                    <path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path>
                                </svg>
                            </span> -->
                            <?php
                            if (isset($_SESSION['iduser'])) {
                                // var_dump($_SESSION['iduser']);


                                if ($wiW->getidUser() == $_SESSION['iduser']) { ?>


                                    <span class="text-gray-500 cursor-pointer mr-4" title="Edit" name="update" onclick="openEditModal(<?php echo $wiW->getid() ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(59, 130, 246);">
                                            <path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path>
                                            <path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path>
                                        </svg>
                                    </span>



                                    <!-- <span class="text-red-500 cursor-pointer"  title="Delete"> -->
                                    <a title="delete" class="text-red-500 cursor-pointer" href="wikisview.php?deletewiki&wikiID=<?php echo $wiW->getid(); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </a>
                            <?php
                                }
                            }
                            ?>
                            <!-- </span> -->



                        </div>

                    </div>

                </div>

            <?php endforeach ?>
        </div>
        <div class="search-results flex flex-wrap mx-auto md:px-12 flex-grow"></div>


        <div id="myModal" class="fixed inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-8 rounded-md max-w-md w-full">
                    <button id="closeModal" class="float-right text-2xl cursor-pointer">&times;</button>

                    <form action="" method="post">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="w-full mb-4 p-2 border border-gray-300 rounded-md">

                        <label for="content">Content:</label>
                        <textarea id="content" name="content" class="w-full mb-4 p-2 border border-gray-300 rounded-md" rows="4"></textarea>



                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 text-black">Categorie</label>
                            <select id="category" name="categorieID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                <option selected disabled="">Select categorie</option>
                                <?php
                                foreach ($cats as $category) {
                                    echo "<option value='{$category->getCategorieID()}'>{$category->getCategorie()}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 text-black">Tags</label>
                            <select id="tags" name="tags[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" onchange="handleTagSelection(this)">
                                <option selected disabled="">Select tags</option>
                                <?php
                                foreach ($tags as $tag) {
                                    echo "<option value='{$tag->getTagID()}'>{$tag->getTag()}</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" id="selectedTagIdsInput" name="selectedTagIds" value="">
                            <div id="selectedTagsContainer" class="mt-2 flex flex-wrap space-x-2"></div>

                        </div>
                        <button type="submit" name="addwiki" class="bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-300">Add Wiki</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="editModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-6 mx-4 rounded-md max-w-md w-full">
                    <h2 class="text-2xl font-semibold mb-4">Edit Wiki</h2>
                    <?php

                    ?>
                    <form action="" method="post" id="updatForm">
                        <label for="editTitle">Title:</label>
                        <input type="text" id="editTitle" name="title" class="w-full mb-2 p-2 border border-gray-300 rounded-md">

                        <label for="editContent">Content:</label>
                        <textarea id="editContent" name="content" class="w-full mb-2 p-2 border border-gray-300 rounded-md" rows="4"></textarea>

                        <div class="col-span-2">
                            <label for="editCategory" class="block mb-2 text-sm font-medium text-gray-900 text-black">Category</label>
                            <select id="editCategory" name="categorieID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                <option selected disabled>Select category</option>
                                <?php
                                foreach ($cats as $category) {
                                    echo "<option value='{$category->getCategorieID()}'>{$category->getCategorie()}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="editTags" class="block mb-2 text-sm font-medium text-gray-900 text-black">Tags</label>
                            <select id="editTags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" onchange="handleEditTagSelection(this)">
                                <option selected disabled>Select tags</option>
                                <?php
                                foreach ($tags as $tag) {
                                    echo "<option value='{$tag->getTagID()}'>{$tag->getTag()}</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" id="selectedEditTagIdsInput" name="selectedTagIds" value="">
                            <div id="selectedEditTagsContainer" class="mt-2 flex flex-wrap space-x-2"></div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="closeEditModal()" class="bg-gray-300 text-white px-4 py-2 rounded-md hover:bg-gray-400 transition duration-300">Close</button>
                            <button type="submit" name="update" class="ml-2 bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-300">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- //search -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.querySelector('#search');
                const searchResultsContainer = document.querySelector('.search-results');
                const originalCardsContainer = document.getElementById('wikisContent');
                const newcontent = document.querySelector('.newcontents');

                searchInput.addEventListener('input', function() {
                    const param = encodeURIComponent(searchInput.value.trim());
                    console.log(param);



                    let xml = new XMLHttpRequest();

                    xml.onload = function() {
                        if (this.status == 200) {
                            var response = JSON.parse(this.responseText);
                            console.log(response);

                            newcontent.innerHTML = '';

                            var output = '';
                            response.forEach(element => {
                                output += `
                                <div class="container px-5 py-16 mx-auto">

                                <div class="-my-8 divide-y-2 divide-gray-100">

                                    <div class="flex flex-wrap md:flex-nowrap">
                                   
                                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                            <span class="font-semibold title-font text-gray-700">${element.nomCategorie}</span>
                                            <span class="mt-1 text-gray-500 text-sm">${element.tagnames}</span>
                                        </div>
                                        <div class="md:flex-grow">
                                            <h2 class="text-2xl font-medium text-gray-500 title-font mb-2">${element.title}</h2>
                                            <p class="text-black "> ${element.content.substring(0, 350)}...<a href="detailofwiki.php?detailofwiki&wikiID=<?php echo $wiW->getid(); ?>" class="text-blue-300">View more</a></p>

                                        </div>
                        
                                </div>
                            </div>
                            </div>


                        `;
                            });



                            newcontent.innerHTML = output;
                        }
                    };

                    xml.open('POST', '../controller/wikicontroller.php');
                    xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xml.send('param=' + param);

                });
            });
        </script>


        <script>
            // function openEditModal(wikiId) {
            //     document.getElementById('editModal').classList.remove('hidden');   
            // }
            function openEditModal(wikiId) {

                var editForm = document.getElementById('updatForm'); // Remplacez 'editForm' par l'ID réel de votre formulaire

                // Créer un nouvel élément input
                var newInput = document.createElement('input');

                // Définir les attributs du nouvel input
                newInput.type = 'hidden'; // ou 'hidden' selon vos besoins
                newInput.name = 'aaaaaaaaaaaa'; // Nom du champ d'entrée
                newInput.value = wikiId; // Assigner la valeur wikiId

                // Ajouter le nouvel input au formulaire
                editForm.appendChild(newInput);

                // Afficher le modal
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


        <script>
            function handleTagSelection(selectElement) {
                const selectedTagsContainer = document.getElementById('selectedTagsContainer');
                const selectedTagIdsInput = document.getElementById('selectedTagIdsInput');

                const selectedTagId = selectElement.value;
                const selectedTagName = selectElement.options[selectElement.selectedIndex].text;

                if (selectedTagId && !document.getElementById(`selectedTag_${selectedTagId}`)) {

                    const tagDiv = document.createElement('div');
                    tagDiv.id = `selectedTag_${selectedTagId}`;
                    tagDiv.className = 'flex items-center space-x-2 bg-blue-200 rounded-lg p-2 mb-2';

                    const tagText = document.createElement('span');
                    tagText.textContent = selectedTagName;

                    const removeIcon = document.createElement('i');
                    removeIcon.className = 'bx bx-x cursor-pointer';


                    removeIcon.addEventListener('click', function() {
                        selectedTagsContainer.removeChild(tagDiv);
                        updateHiddenInput();
                    });

                    tagDiv.appendChild(tagText);
                    tagDiv.appendChild(removeIcon);

                    selectedTagsContainer.appendChild(tagDiv);
                    updateHiddenInput();
                }


                selectElement.value = '';

                function updateHiddenInput() {

                    const selectedTagDivs = selectedTagsContainer.querySelectorAll('div');
                    const selectedTagIds = Array.from(selectedTagDivs).map((div) => div.id.replace('selectedTag_', ''));
                    selectedTagIdsInput.value = JSON.stringify(selectedTagIds);
                }
            }
        </script>
        <script>
            function handleEditTagSelection(selectElement) {
                const selectedEditTagsContainer = document.getElementById('selectedEditTagsContainer');
                const selectedEditTagIdsInput = document.getElementById('selectedEditTagIdsInput');

                const selectedTagId = selectElement.value;
                const selectedTagName = selectElement.options[selectElement.selectedIndex].text;

                if (selectedTagId && !document.getElementById(`selectedEditTag_${selectedTagId}`)) {

                    const tagDiv = document.createElement('div');
                    tagDiv.id = `selectedEditTag_${selectedTagId}`;
                    tagDiv.className = 'flex items-center space-x-2 bg-blue-200 rounded-lg p-2 mb-2';

                    const tagText = document.createElement('span');
                    tagText.textContent = selectedTagName;

                    const removeIcon = document.createElement('i');
                    removeIcon.className = 'bx bx-x cursor-pointer';

                    removeIcon.addEventListener('click', function() {
                        selectedEditTagsContainer.removeChild(tagDiv);
                        updateHiddenEditInput();
                    });

                    tagDiv.appendChild(tagText);
                    tagDiv.appendChild(removeIcon);

                    selectedEditTagsContainer.appendChild(tagDiv);
                    updateHiddenEditInput();
                }

                selectElement.value = '';

                function updateHiddenEditInput() {
                    const selectedEditTagDivs = selectedEditTagsContainer.querySelectorAll('div');
                    const selectedEditTagIds = Array.from(selectedEditTagDivs).map((div) => div.id.replace('selectedEditTag_', ''));
                    selectedEditTagIdsInput.value = JSON.stringify(selectedEditTagIds);
                }
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
            }
        </script>

    </section>
</body>

</html>