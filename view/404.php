<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Page not found</title>
</head>
<body>
<header>
        <nav class="flex justify-between">
            <div class="">
                <img src="image/logo.png" class="w-32">
            </div>

            
  
            <div class="p-4">
                <ul class="flex gap-4 mt-4">
                    <li><a href="../index.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Home</a></li>
                    <li><a href="" class="text-blue-600 text-lg font-semibold hover:text-green-500">Categories</a></li>
                    <li><a href="view/login.php" class="text-blue-600 text-lg font-semibold hover:text-green-500 underline decoration-green-500">Log in</a></li>
                    <li><a href="view/register.php" class="text-green-500 text-lg font-semibold hover:text-blue-600 underline decoration-blue-500">Register</a></li>
                </ul>
            </div>
        </nav>
        
    </header>
    <!-- component -->
<main class="h-screen w-full flex flex-col justify-center items-center bg-[#1A2238]">
	<h1 class="text-9xl font-extrabold text-white tracking-widest">404</h1>
	<div class="bg-blue-600 px-2 text-sm rounded rotate-12 absolute">
		Page Not Found
	</div>
	<button class="mt-5">
      <a
        class="relative inline-block text-sm font-medium text-[#FF6A3D] group active:text-orange-500 focus:outline-none focus:ring"
      >
        <span
          class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-[#FF6A3D] group-hover:translate-y-0 group-hover:translate-x-0"
        ></span>

        <span class="">
          <a class="relative block px-8 py-3 bg-[#1A2238] border border-current bg-[#1A2238] border border-current" href="../index.php">Go Home</a>
        </span>
      </a>
    </button>
</main>
    
</body>
</html>