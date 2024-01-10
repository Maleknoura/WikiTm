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

    <title>Document</title>
</head>
<body>
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
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center relative overflow-hidden sm:py-12">
  <div class="max-w-7xl mx-auto">
    <div class="relative group">
      <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
      <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
        <h3>technologie</h3>
        <div class="space-y-2">
          <p class="leading-6">L'intelligence artificielle (IA) représente l'avant-garde technologique du XXIe siècle, marquant une ère où les machines sont capables de simuler l'intelligence humaine. Ce domaine de la science informatique se consacre à développer des algorithmes et des modèles qui permettent aux machines d'apprendre, de raisonner et de prendre des décisions autonomes. L'IA est devenue omniprésente dans notre vie quotidienne, influençant des domaines allant de la santé à l'économie en passant par les loisirs.

Les fondements de l'IA remontent à l'Antiquité, mais c'est au cours des dernières décennies que les avancées technologiques ont permis des progrès significatifs. Les techniques d'apprentissage machine, en particulier l'apprentissage profond, ont propulsé l'IA vers de nouveaux sommets. Les réseaux de neurones artificiels, inspirés par le fonctionnement du cerveau humain, sont capables d'analyser d'énormes quantités de données pour extraire des modèles complexes.

Dans le domaine de la santé, l'IA révolutionne les diagnostics médicaux en analysant rapidement des données médicales complexes pour identifier des anomalies ou des maladies. Les chatbots alimentés par l'IA améliorent également l'accessibilité aux soins de santé en fournissant des informations médicales instantanées.

Sur le plan économique, l'IA est un moteur d'innovation majeur. Les entreprises utilisent des algorithmes prédictifs pour anticiper les tendances du marché, optimiser les chaînes d'approvisionnement et personnaliser les recommandations pour les clients. Ces applications transforment les modèles commerciaux traditionnels et ouvrent de nouvelles possibilités.

Dans le secteur des transports, les véhicules autonomes exploitent l'IA pour naviguer en toute sécurité dans des environnements complexes. Ces véhicules promettent de réduire les accidents de la route et d'améliorer l'efficacité des déplacements.

Cependant, l'IA soulève également des questions éthiques et sociales. Les préoccupations liées à la confidentialité des données, à la prise de décision autonome et à la substitution potentielle de l'emploi humain par des machines intelligentes sont autant de défis auxquels la société doit faire face.

En conclusion, l'intelligence artificielle est une force transformative qui redéfinit la manière dont nous interagissons avec le monde. Alors que ses avantages sont nombreux, il est impératif que nous abordions ses implications éthiques de manière réfléchie pour assurer un avenir où l'IA contribue au bien-être de l'humanité.</p>

          <a href="https://braydoncoyer.dev/blog/tailwind-gradients-how-to-make-a-glowing-gradient-background" class="block text-indigo-400 group-hover:text-slate-800 transition duration-200" target="_blank"></a>
          <h4 class="flex justify-end">by test test</h4><br>
      <h4 class="flex justify-end">cree le 05/09/2016</h4>
        </div>
      </div>
    
    </div>
  </div>
</div>
</body>
</html>