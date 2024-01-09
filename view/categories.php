<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Our categories</title>
</head>
<body class="bg-blueGray-50">
<header>
          <nav class="flex justify-between">
              <div class="">
                  <img src="image/logo.png" class="w-32">
              </div>

              
    
              <div class="p-4">
                  <ul class="flex gap-4 mt-4">
                      <li><a href="../index.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Home</a></li>
                      <li><a href="" class="text-green-500 text-lg font-semibold hover:text-blue-600">Categories</a></li>
                      <li><a href="login.php" class="text-blue-600 text-lg font-semibold hover:text-green-500 underline decoration-green-500">Log in</a></li>
                      <li><a href="register.php" class="text-blue-600 text-lg font-semibold hover:text-green-500 underline decoration-green-500">Register</a></li>
                      
                  </ul>
              </div>
          </nav>
          
      </header>
    
</body>

<section class="px-5 py-10 dark:bg-gray-800 dark:text-gray-100">
	
		<div class="hidden py-2 xl:col-span-3 lg:col-span-4 md:hidden lg:block">
			<div class="mb-8 space-x-5 border-b-2 border-opacity-10 dark:border-violet-400">
				<button type="button" class="pb-5 text-xs font-bold uppercase border-b-2 dark:border-violet-400">Latest</button>
				<button type="button" class="pb-5 text-xs font-bold uppercase border-b-2 dark:border-transparent dark:text-gray-400">Popular</button>
			</div>
			<div class="flex flex-col divide-y dark:divide-gray-700">
				<div class="flex px-1 py-4">
					<img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 dark:bg-gray-500" src="https://source.unsplash.com/random/244x324">
					<div class="flex flex-col flex-grow">
						<a rel="noopener noreferrer" href="#" class="font-serif hover:underline">Aenean ac tristique lorem, ut mollis dui.</a>
						<p class="mt-auto text-xs dark:text-gray-400">5 minutes ago
							<a rel="noopener noreferrer" href="#" class="block dark:text-blue-400 lg:ml-2 lg:inline hover:underline">Politics</a>
						</p>
					</div>
				</div>
				
				<div class="flex px-1 py-4">
					<img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 dark:bg-gray-500" src="https://source.unsplash.com/random/246x326">
					<div class="flex flex-col flex-grow">
						<a rel="noopener noreferrer" href="#" class="font-serif hover:underline">Vitae semper augue purus tincidunt libero.</a>
						<p class="mt-auto text-xs dark:text-gray-400">22 minutes ago
							<a rel="noopener noreferrer" href="#" class="block dark:text-blue-400 lg:ml-2 lg:inline hover:underline">World</a>
						</p>
					</div>
				</div>
				<div class="flex px-1 py-4">
					<img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 dark:bg-gray-500" src="https://source.unsplash.com/random/247x327">
					<div class="flex flex-col flex-grow">
						<a rel="noopener noreferrer" href="#" class="font-serif hover:underline">Suspendisse potenti.</a>
						<p class="mt-auto text-xs dark:text-gray-400">37 minutes ago
							<a rel="noopener noreferrer" href="#" class="block dark:text-blue-400 lg:ml-2 lg:inline hover:underline">Business</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	
</section>
</html>