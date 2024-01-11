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
<body class="font-sans bg-gray-100">
    
    <div id="MenuDashbord" class="bg-black text-white h-screen w-64 fixed top-0 left-0 rounded-r-2xl">
        <div class="p-4">
            <h1 class="text-2xl font-serif font-semibold"><i class="fas fa-chart-bar"></i> Dashboard</h1>
        </div>
        <nav class="space-y-4 mt-5 flex flex-col ">
            <a href="dashboard.php" class="p-4 hover:bg-gray-700"><i class="fas fa-home"></i> Dashboard</a>
            <a href="catdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-th-large "></i> categories</a>
            <a href="tagdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-tags"></i>tags</a>
            <a href="feed.php" class="p-4 hover:bg-gray-700"><i class="fa-sharp fa-solid fa-newspaper"></i>articles</a>
                       
            <a href="logout.php" class="p-4 hover:bg-gray-700"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>
   
    <div class="ml-64 ">   
        <!-- <i onclick="OpenDashbordMenu()" class="fas fa-bars text-3xl text-black p-4 cursor-pointer"></i>    -->
        <div class=" text-center">           
        <h1 class="pt-8 text-4xl font-semibold mb-2 text-blue-600">Welcome back admin</h1>

        </div>
      
        <div class="p-8 grid grid-cols-3 gap-4">
           <div class="w-64 h-40 shadow-xl flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-users text-2xl"></i> Users</p>
                <p class="text-2xl font-semibold"><?php echo $countusers['count']; ?> </p>
           </div>
           <div class="w-64 h-40 shadow-xl  flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-file-alt text-2xl"></i> Wikis</p>
                <p class="text-2xl font-semibold"><?php echo $countwikis['count']; ?></p>
           </div>
           <div class="w-64 h-40 shadow-xl  flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-th-large text-2xl"></i> Categories</p>
                <p class="text-2xl font-semibold"><?php echo $countcategories['count']; ?></p>
           </div>
           <div class="w-64 h-40 shadow-xl  flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-tags text-2xl"></i> Tags</p>
                <p class="text-2xl font-semibold"><?php echo $counttags['count']; ?></p>
           </div>
          
           
        </div>
    </div>

</body>
</html>