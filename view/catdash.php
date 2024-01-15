<?php
include 'includes/session.php';
include '../controller/category.contr.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Category Dashboard</title>
</head>
<body>
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

<section class="ml-0 md:ml-64">
    <div class="text-center">
        <h1 class="pt-8 text-4xl font-semibold mb-2 text-blue-600">Categories</h1>
    </div>

    <form action="../controller/category.contr.php" method="post" class="p-8" enctype="multipart/form-data">
        <label for="categoryName" class="block mb-2 text-sm font-medium text-gray-600">New Category Name:</label>
        <input type="text" id="categoryName" name="catName" class="w-full px-4 py-2 border rounded-md">
        <label for="categoryImage" class="block mb-2 text-sm font-medium text-gray-600">New Category Image:</label>
        <input type="file" id="categoryImage" name="catImg" class="w-full px-4 py-2 border rounded-md">

        <button type="submit" name="add" class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Category
        </button>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th scope="col" class="px-6 py-3 sm:py-2 md:py-1">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 sm:py-2 md:py-1">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 sm:py-2 md:py-1">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat) { ?>
                    <form action="../controller/category.contr.php" method="post" enctype="multipart/form-data">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <input type="hidden" name="cat_id" value="<?php echo $cat['cat_id']; ?>">

                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <input type="text" name="cat_name" value="<?php echo htmlspecialchars($cat['cat_name']); ?>" class="border">
                            </th>
                            <td class="px-6 py-4">
                                <img class="rounded-full h-16 w-16" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($cat['image']); ?>" alt="">
                                <input type="file" name="cat_image" id="categoryImage">
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button type="submit" name="update" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Save</button>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Cancel</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                
                            <form  action="../controller/category.contr.php" method="post">
                                <input type="hidden" name="cat_id" value="<?php echo $cat['cat_id']; ?>">
                                <button type="submit" name="delete" class="font-medium bg-red-600 p-2 rounded-lg text-white hover:underline">Delete</button>
                            </form>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function startEdit(categoryId) {
        // Toggle visibility for editing elements
        $('#catName_' + categoryId).addClass('hidden');
        $('#editCatName_' + categoryId).removeClass('hidden');
        $('#catImage_' + categoryId).addClass('hidden');
        $('#editCatImage_' + categoryId).removeClass('hidden');
        $('[onclick="startEdit(' + categoryId + ')"]').addClass('hidden');
        $('[onclick="saveEdit(' + categoryId + ')"]').removeClass('hidden');
        $('[onclick="cancelEdit(' + categoryId + ')"]').removeClass('hidden');
    }

    function saveEdit(categoryId) {
        var editedCatName = $('#editCatName_' + categoryId).val();
        var editedCatImage = $('#editCatImage_' + categoryId).val();

        // Perform AJAX request to update category details
        $.ajax({
            type: 'POST',
            url: '../controller/category.contr.php',
            data: {
                id: categoryId,
                cat_name: editedCatName,
                cat_image: editedCatImage
            },
            success: function (response) {
                // Update the UI with the edited details
                $('#catName_' + categoryId).text(editedCatName);
                $('#catImage_' + categoryId).attr('src', editedCatImage);

                // Reset UI elements
                $('#catName_' + categoryId).removeClass('hidden');
                $('#editCatName_' + categoryId).addClass('hidden');
                $('#catImage_' + categoryId).removeClass('hidden');
                $('#editCatImage_' + categoryId).addClass('hidden');
                $('[onclick="startEdit(' + categoryId + ')"]').removeClass('hidden');
                $('[onclick="saveEdit(' + categoryId + ')"]').addClass('hidden');
                $('[onclick="cancelEdit(' + categoryId + ')"]').addClass('hidden');
            },
            error: function (error) {
                console.error('Error updating category: ', error);
                // Handle error if needed
            }
        });
    }

    function cancelEdit(categoryId) {
        // Reset UI elements without saving changes
        $('#catName_' + categoryId).removeClass('hidden');
        $('#editCatName_' + categoryId).addClass('hidden');
        $('#catImage_' + categoryId).removeClass('hidden');
        $('#editCatImage_' + categoryId).addClass('hidden');
        $('[onclick="startEdit(' + categoryId + ')"]').removeClass('hidden');
        $('[onclick="saveEdit(' + categoryId + ')"]').addClass('hidden');
        $('[onclick="cancelEdit(' + categoryId + ')"]').addClass('hidden');
    }
</script>

<script src="javascript/sidebar.js"></script>
</body>
</html>