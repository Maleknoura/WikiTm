<?php

require_once('../controller/TagController.php');

$tag = new tagController();
$tag->AddTags();
$tags = $tag->DisplayTags();
$tag->EditTags();
$tag->deletetag();
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
<div class="p-20 mb-14 sm:ml-64">
        <div class="flex justify-end mr-12 mt-5  ">
    <button type="submit" name="addtag" id="openAddCategoryModalBtn" class="bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-300"> + New Tag</button>
    </div>
<div class="flex min-h-screen items-center justify-center bg-white">
    
    <div class="p-6  px-0">
    <table class="w-full table-auto  text-left border border-blue-500 ">
    <thead>
      <tr>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 w-80 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Tags</p>
        </th>
        
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 w-80   p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Edit</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50    p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Delete</p>
        </th>
      </tr>
    </thead>

    <tbody>
    <?php foreach ($tags as $t) : ?>
      <tr>
        <td class="p-4 border-b border-blue-gray-50">
          <div class="flex items-center gap-3">
            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold"><?php echo $t->getTag(); ?></p>
          </div>
        </td>
       
        
          
        
        <td class="p-4 border-b border-blue-gray-50">
        <a href="#" type="submit" title="Edit" name="edittag" class="editTagButton" data-tag-id="<?php echo $t->getTagID(); ?>"data-tag-name="<?php echo $t->getTag(); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
        <path opacity="1" fill="#2766d3" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
    </svg>
</a>

          </td>
         
          <td class="p-4 border-b border-blue-gray-50">
            
          <a title="delete" href="tagview.php?deletetag&tagID=<?php echo $t->getTagID(); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                                <path fill="#e6321e" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                            </a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
        


       
        <div id="edit-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4"></h2>
                        <form action="" method="post">
                <input type="hidden" name="tagID" id="editTagId">
                <label for="editTagName" class="block mb-2 text-sm font-medium text-gray-900">Tag Name</label>
                <input type="text" name="nomTag" id="editTagName" class="w-full border border-gray-300 p-2.5 rounded-md mb-4" placeholder=" tag name" required="">
                <button type="submit" name="edittag" class="bg-blue-500 text-white rounded-md p-2.5 hover:bg-blue-700">Update Tag</button>
               
            </form>

            <button onclick="closeEditModal()"  class="bg-gray-300 text-gray-700 rounded-md p-2.5 ml-2 hover:bg-gray-400">Cancel</button>
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






<div id="add-category-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">Add New Tag</h2>
        <form action="" method="post">
            
            <input type="text" name="nomTag" id="newTag" class="w-full border border-gray-300 p-2.5 rounded-md mb-4" placeholder="Tag name" required="">
            <button type="submit" name="addtag" class="bg-blue-500 text-white rounded-md p-2.5 hover:bg-blue-700">Add Tag</button>
        </form>
        <button onclick="closeAddCategoryModal()" class="bg-gray-300 text-gray-700 rounded-md p-2.5 ml-2 hover:bg-gray-400">Cancel</button>
    </div>
</div>

<script>
 
    function openAddCategoryModal() {
        document.getElementById('add-category-modal').classList.remove('hidden');
    }

    
    function closeAddCategoryModal() {
        document.getElementById('add-category-modal').classList.add('hidden');
    }


    document.getElementById('openAddCategoryModalBtn').addEventListener('click', function() {
        openAddCategoryModal();
    });
</script>
       
<script>
        document.querySelectorAll('.editTagButton').forEach(button => {
            button.addEventListener('click', function() {
                showEditModal(button);
            });
        });
        function showEditModal(button) {
        var editTagForm = document.getElementById('edit-modal');
        if (editTagForm) {
            editTagForm.querySelector('#editTagId').value = button.dataset.tagId || '';
            editTagForm.querySelector('#editTagName').value = button.dataset.tagName || '';
           
            editTagForm.classList.remove('hidden');
        }
    }


        function closeEditModal() {
            var editModal = document.getElementById('edit-modal');
            if (editModal) {
                editModal.classList.add('hidden');
            }
        }
    </script>
  </body>
    </html>
