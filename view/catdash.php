<?php
include '../controller/category.contr.php';
include 'includes/session.php';
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
<div id="MenuDashboard" class="bg-black text-white h-screen w-64 fixed top-0 left-0 rounded-r-2xl">
        <div class="p-4">
            <h1 class="text-2xl font-serif font-semibold"><i class="fas fa-chart-bar"></i> Dashboard</h1>
        </div>
        <nav class="space-y-4 mt-5 flex flex-col ">
            <a href="dashboard.php" class="p-4 hover:bg-gray-700"><i class="fas fa-home"></i> Dashboard</a>
            <a href="catdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-th-large"></i> Categories</a>
            <a href="tagdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-tags"></i> Tags</a>
            <a href="logout.php" class="p-4 hover:bg-gray-700"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
</div>

<section class="ml-64">
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
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
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

 
</body>
</html>