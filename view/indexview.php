<?php
require_once "../controller/wikicontroller.php";


$controller = new wikicontroller();
$controller->getwiki();


$wikis = $controller->Wiki;

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


    <!-- component -->
    <header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">
        <!-- logo -->
        <h1 class="w-3/12">
            <a href="">
                <img src="../assets/images/logo.png" alt="" width="50">
            </a>
        </h1>

        <!-- navigation -->
        <nav class="nav font-semibold text-lg">
            <ul class="flex items-center">
                <li class="p-4  cursor-pointer active">
                    <a href="">Home</a>
                </li>
               
                <li class="p-4">
                    <a href="wikisview.php">Wikis</a>
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


    </div>
    </div>
    <section>
    
        <div class="container  mt-14">
            <div class="flex justify-center items-center  ">
                <div class="md:w-1/2  ">
                    <h2 class="text-5xl text-blue-300   mb-3">All You Need is read </h2>
                    <p class="mt-12  " style="font-family:'Rubik'"> Nous nous engageons à fournir un espace où les passionnés de tous horizons peuvent partager leur expertise, collaborer à la création de contenus informatifs et participer à une communauté dynamique axée sur l'échange de connaissances. Notre objectif est de rendre l'apprentissage accessible, stimulant et inspirant pour tous.</p>
                   
                </div>
                <div class="md:w-1/3 ml-4">
                    <img class="w-full h-64 object-cover rounded-md " src="../assets/images/aboutwiki.jpg" alt="">
                </div>
            </div>
        </div>

    </section>
    <section>
    <h1 class="text-blue-300  text-4xl py-24 mt-12 ml-16">Recent Articles</h1>
        <?php
        foreach ($wikis as $wiki) {


        ?>
            
            <article class="max-w-2xl px-6  mx-auto space-y-12 dark:bg-gray-800 dark:text-gray-50">
                <div class="w-full mx-auto space-y-4 text-center">
                    <h3 class="py-5 "><?php echo $wiki['title']; ?></h3>
                    <p class="text-sm dark:text-gray-400">by
                        <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-400">
                            <span itemprop="name"><?php echo $wiki['fullname']; ?></span>
                        </a>on
                        <time datetime="2021-02-12 15:34:18-0200"><?php echo $wiki['creationDate']; ?></time>
                    </p>
                </div>
           
                <div class="pt-12 border-t dark:border-gray-700">
                    <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- <img src="https://source.unsplash.com/75x75/?portrait" alt="" class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start dark:bg-gray-500 dark:border-gray-700"> -->
                        <div class="flex flex-col">
                            <h4 class="text-lg font-semibold"></h4>
                            <p class="dark:text-gray-400"> <?php echo  substr($wiki['content'], 0, 350);  ?>...<a href="#" class="text-gray-500">View more</a></p>
                        </div>
                    </div>
                    <div class="flex justify-center pt-4 space-x-4 align-center">
                        <a rel="noopener noreferrer" href="#" aria-label="GitHub" class="p-2 rounded-md dark:text-gray-100 hover:dark:text-violet-400">
                            <svg viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current">
                                <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path>
                            </svg>
                        </a>
                        <a rel="noopener noreferrer" href="#" aria-label="Dribble" class="p-2 rounded-md dark:text-gray-100 hover:dark:text-violet-400">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current">
                                <path d="M256 8C119.252 8 8 119.252 8 256s111.252 248 248 248 248-111.252 248-248S392.748 8 256 8zm163.97 114.366c29.503 36.046 47.369 81.957 47.835 131.955-6.984-1.477-77.018-15.682-147.502-6.818-5.752-14.041-11.181-26.393-18.617-41.614 78.321-31.977 113.818-77.482 118.284-83.523zM396.421 97.87c-3.81 5.427-35.697 48.286-111.021 76.519-34.712-63.776-73.185-116.168-79.04-124.008 67.176-16.193 137.966 1.27 190.061 47.489zm-230.48-33.25c5.585 7.659 43.438 60.116 78.537 122.509-99.087 26.313-186.36 25.934-195.834 25.809C62.38 147.205 106.678 92.573 165.941 64.62zM44.17 256.323c0-2.166.043-4.322.108-6.473 9.268.19 111.92 1.513 217.706-30.146 6.064 11.868 11.857 23.915 17.174 35.949-76.599 21.575-146.194 83.527-180.531 142.306C64.794 360.405 44.17 310.73 44.17 256.323zm81.807 167.113c22.127-45.233 82.178-103.622 167.579-132.756 29.74 77.283 42.039 142.053 45.189 160.638-68.112 29.013-150.015 21.053-212.768-27.882zm248.38 8.489c-2.171-12.886-13.446-74.897-41.152-151.033 66.38-10.626 124.7 6.768 131.947 9.055-9.442 58.941-43.273 109.844-90.795 141.978z"></path>
                            </svg>
                        </a>
                        <a rel="noopener noreferrer" href="#" aria-label="Twitter" class="p-2 rounded-md dark:text-gray-100 hover:dark:text-violet-400">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current">
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                        </a>
                        <a rel="noopener noreferrer" href="#" aria-label="Email" class="p-2 rounded-md dark:text-gray-100 hover:dark:text-violet-400">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current">
                                <path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
                            </svg>
                        </a>
                    </div>
                <?php
            }
                ?>
                </div>
            </article>
    </section>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>