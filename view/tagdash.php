<?php

include '../controller/tag.contr.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>tag dashboard</title>
</head>
<body>
<div id="MenuDashbord" class="bg-black text-white h-screen w-64 fixed top-0 left-0 rounded-r-2xl">
        <div class="p-4">
            <h1 class="text-2xl font-serif font-semibold"><i class="fas fa-chart-bar"></i> Dashboard</h1>
        </div>
        <nav class="space-y-4 mt-5 flex flex-col ">
            <a href="dashboard.php" class="p-4 hover:bg-gray-700"><i class="fas fa-home"></i> Dashboard</a>
            <a href="catdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-th-large "></i> categories</a>
            <a href="tagdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-tags"></i>tags</a>
                       
            <a href="logout.php" class="p-4 hover:bg-gray-700"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
</div>
<section class="ml-64 ">   
 
        <!-- <i onclick="OpenDashbordMenu()" class="fas fa-bars text-3xl text-black p-4 cursor-pointer"></i>    -->
        <div class=" text-center">           
        <h1 class="pt-8 text-4xl font-semibold mb-2 text-blue-600">Tags</h1>

        </div>
      
        <form action="../controller/tag.contr.php" method="post" class="p-8" enctype="multipart/form-data">
        <label for="categoryName" class="block mb-2 text-sm font-medium text-gray-600">New Tag Name:</label>
        <input type="text"  name="tagName" class="w-full px-4 py-2 border rounded-md">



        <button type="submit" name="add" class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add tag
        </button>
        </form>
          
          
            
            
          
           
</section>
<section class="ml-64">
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tag name
                </th>
               
                
                
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($tags as $tag){
        ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $tag['tag_name']; ?>
                </th>
             
              
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <?php
            }
            ?>
         
        </tbody>
    </table>
</div>

</section>
   
    
</body>
</html>