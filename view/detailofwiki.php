<?php
require_once "../controller/wikicontroller.php";
$controller = new wikicontroller();
$wikis = $controller->getallwiki();
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
    <?php include "head.php"?>
    <div class="min-h-screen container flex flex-col justify-center overflow-hidden sm:py-12">
        <div class="max-w-5xl mx-auto">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex flex-col sm:flex-row items-top justify-start space-x-6">

                    <h3 class="text-2xl sm:text-xl lg:text-xl xl:text-xl">technologie</h3>

                    <div class="space-y-2">
                        <h2 class="font-bold text-lg sm:text-xl lg:text-2xl xl:text-3xl">titlehfdiéu"hoéh"oifhoéi</h2>
                        <p class="leading-6 text-sm sm:text-base lg:text-lg xl:text-xl">L'intelligence artificielle (IA) représente l'avant-garde technologique du XXIe siècle, marquant une ère où les machines sont capables de simuler l'intelligence humaine. Ce domaine de la science informatique se consacre à développer des algorithmes et des modèles qui permettent aux machines d'apprendre, de raisonner et de prendre des décisions autonomes. L'IA est devenue omniprésente dans notre vie quotidienne, influençant des domaines allant de la santé à l'économie en passant par les loisirs.</p>

                        <a href="https://braydoncoyer.dev/blog/tailwind-gradients-how-to-make-a-glowing-gradient-background" class="block text-indigo-400 group-hover:text-slate-800 transition duration-200" target="_blank"></a>

                        <h4 class="flex justify-end text-sm sm:text-base lg:text-lg xl:text-xl">by test test</h4><br>
                        <h4 class="flex justify-end text-sm sm:text-base lg:text-lg xl:text-xl">cree le 05/09/2016</h4>
                        <div class="flex justify-center sm:justify-end gap-2 sm:gap-9 align-center text-sm sm:text-base lg:text-lg xl:text-xl">
                            <p>tag1</p>
                            <p>tag1</p>
                            <p>tag1</p>
                            <p>tag1</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
