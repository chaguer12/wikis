<?php
include 'includes/session.php';
include '../controller/user.contr.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Dashboard | Dashboard</title>
</head>
<body class=" bg-blueGray-50">
    <section>
        
<button id="sidebarToggle"  type="button" class="inline-flex items-center flex-end p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform transform translate-x-24 md:translate-x-0 md:transform-none" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Admin Dashboard</span>
            </a>
         </li>
         <li>
            <a href="dashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               
               <span class="flex-1 ms-3 whitespace-nowrap"><i class="fas fa-home"></i> Dashboard</span>
               
            </a>
         </li>
         <li>
            <a href="catdash.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               
               <span class="flex-1 ms-3 whitespace-nowrap"><i class="fas fa-th-large "></i> categories</span>
               
            </a>
         </li>
         <li>
            <a href="tagdash.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               
               <span class="flex-1 ms-3 whitespace-nowrap"><i class="fas fa-tags"></i>Tags</span>
            </a>
         </li>
         <li>
            <a href="feed.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               
               <span class="flex-1 ms-3 whitespace-nowrap"><i class="fas  fa-newspaper"></i>Articles</span>
            </a>
         </li>
         <li>
            <a href="logout.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               
               <span class="flex-1 ms-3 whitespace-nowrap"><i class="fas fa-sign-out-alt"></i> Logout</span>
            </a>
         </li>       
      </ul>
   </div>
</aside>
   </section>
      
   <div class="ml-0 md:ml-64 ">  
   
  
        <div class=" text-center">           
        <h1 class="pt-8 text-2xl md:text-4xl font-semibold mb-2 text-blue-600">Welcome back, admin</h1>

        </div>     
        <div class="grid md:grid-cols-2 gap-8  p-16  grid-cols-1 justify-items-center items-center">
            <div class="w-64 h-32 p-6 bg-blue-300 border border-gray-200 rounded-lg shadow text-white">
       
        
           
                <p class="text-3xl text-center text-white  font-semibold"><i class="fas fa-users text-2xl"></i> Users</p>
                    <p class="text-2xl text-center p-4 text-white font-semibold"><?php echo $countusers['count']; ?> </p>
        
        
        
                </div>
            <div class="w-64 h-32 p-6 bg-blue-300 border border-gray-200 rounded-lg shadow text-white">
       
        
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                <p class="text-3xl text-center text-white font-semibold"><i class="fas fa-th-large text-2xl"></i> Categories</p>
                    <p class="text-2xl text-center p-4 text-white font-semibold"><?php echo $countcategories['count']; ?></ </p></h5>
                </div>
            <div class="w-64 h-32 p-6 bg-blue-300 border border-gray-200 rounded-lg shadow text-white">        
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                <p class="text-3xl text-center text-white font-semibold"><i class="fas fa-file-alt text-2xl"></i> Wikis</p>
                    <p class="text-2xl text-center p-4 text-white font-semibold"><?php echo $countwikis['count']; ?> </p></h5>        
                </div>
            <div class="w-64 h-32 p-6 bg-blue-300 border border-gray-200 rounded-lg shadow text-white">        
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                <p class="text-3xl text-center text-white font-semibold"><i class="fas fa-tags text-2xl"></i> Tags</p>
                    <p class="text-2xl text-center p-4 text-white font-semibold"><?php echo $counttags['count']; ?> </p></h5>        
                </div>           
        </div>
    </div>
<script src="javascript/sidebar.js"></script>
</body>
</html>