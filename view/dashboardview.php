<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Document</title>
</head>
<body>
    
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
       
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-blue-600"
        >
          Loading.....
        </div>

        <div
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="-translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="-translate-x-full"
          class="fixed inset-y-0 z-10 flex w-80"
        >
         
          <svg
            class="absolute inset-0 w-full h-full text-white"
            style="filter: drop-shadow(10px 0 10px #00000030)"
            preserveAspectRatio="none"
            viewBox="0 0 309 800"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M268.487 0H0V800H247.32C207.957 725 207.975 492.294 268.487 367.647C329 243 314.906 53.4314 268.487 0Z"
            />
          </svg>
        
          <div class="z-10 flex flex-col flex-1">
            <div class="flex items-center justify-between flex-shrink-0 w-64 p-4">
           
           
                <img src="../assets/images/logo.png" alt="" width="50px" height="80px">
          
                <span class="sr-only">Close sidebar</span>
              </button>
            </div>
            <nav class="flex flex-col flex-1 w-64 p-6 mt-4">
            
                <span>Dashboard</span>
              
            </nav>
            <nav class="flex flex-col flex-1 w-64 p-6 ">
            <a href="wikisadmin.php">
            <span>Wikis</span>
            </a>
           

          
        </nav>
        <nav class="flex flex-col flex-1 w-64 p-6">
            
            <span>Categories</span>
            
          
        </nav>
        <nav class="flex flex-col flex-1 w-64 p-6">
            
            <span>Tag</span>
            
          
        </nav>
        <nav class="flex flex-col flex-1 w-64 p-6">
            <a href="wikisadmin.php">
            <span>Home</span>
            </a>
          
        </nav>
            <div class="flex-shrink-0 p-4">
              <button class="flex items-center space-x-2">
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                  />
                </svg>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
        <main class="flex flex-col items-center justify-center flex-1">
        <div id="wrapper" class="max-w-xl px-4 py-4 mx-auto">
    <div class="sm:grid sm:h-40 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
        <div id="jh-stats-positive" class="flex flex-col justify-center px-6 py-6 bg-white border border-gray-300 rounded">
            <div>
                <div>
                    <p class="flex items-center justify-end text-green-500 text-lg">
                       
                    </p>
                </div>
                <p class="text-4xl font-semibold text-center text-gray-800">5k</p>
                <p class="text-lg text-center text-gray-500">Wikis</p>
            </div>
        </div>

        <div id="jh-stats-negative" class="flex flex-col justify-center px-6 py-6 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
            <div>
                <div>
                    <p class="flex items-center justify-end text-red-500 text-lg">
                        <span class="font-bold"></span>
                    </p>
                </div>
                <p class="text-4xl font-semibold text-center text-gray-800">43</p>
                <p class="text-lg text-center text-gray-500">Auteurs</p>
            </div>
        </div>

        <div id="jh-stats-neutral" class="flex flex-col justify-center px-6 py-9 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
            <div>
                <div>
                 
                
                <p class="text-4xl font-semibold text-center text-gray-800">12</p>
                <p class="text-lg text-center text-gray-500">tags</p>
            </div>
            
        </div>
    </div>
</div>

      
         
        </main>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js"></script>
    <script>
        const setup = () => {
        return {
                isSidebarOpen: false,
            }
        }
    </script>
</body>
</html>


