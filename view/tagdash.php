<?php
include '../controller/tag.contr.php';
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Tag Dashboard</title>
</head>
<body>
    <div id="MenuDashboard" class="bg-black text-white h-screen w-64 fixed top-0 left-0 rounded-r-2xl">
        <div class="p-4">
            <h1 class="text-2xl font-serif font-semibold"><i class="fas fa-chart-bar"></i> Dashboard</h1>
        </div>
        <nav class="space-y-4 mt-5 flex flex-col ">
            <a href="dashboard.php" class="p-4 hover:bg-gray-700"><i class="fas fa-home"></i> Dashboard</a>
            <a href="catdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-th-large "></i> Categories</a>
            <a href="tagdash.php" class="p-4 hover:bg-gray-700"><i class="fas fa-tags"></i> Tags</a>
            <a href="logout.php" class="p-4 hover:bg-gray-700"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>
    
    <section class="ml-64">
        <div class="text-center">
            <h1 class="pt-8 text-4xl font-semibold mb-2 text-blue-600">Tags</h1>
        </div>
        <form action="../controller/tag.contr.php" method="post" class="p-8" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label for="tagName" class="block mb-2 text-sm font-medium text-gray-600">New Tag Name:</label>
                <input type="text" id="tagName" name="tagName" class="w-full px-4 py-2 border rounded-md">
                <button type="submit" name="add" class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add tag
                </button>
        </form>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tag Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tags as $tag) { ?>
                    <form action="../controller/tag.contr.php" method="post">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <input type="hidden" name="tag_id" value="<?php echo $tag['tag_id']; ?>">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p id="tagParagraph_<?php echo $tag['tag_id']; ?>" class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $tag['tag_name']; ?></p>
                                <input type="text" name="tag_name" value="<?php echo htmlspecialchars($tag['tag_name']); ?>" class="border hidden" id="editTagName_<?php echo $tag['tag_id']; ?>">
                            </th>
                            <td class="px-6 py-4 text-right">
                                <button type="button" name="edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="startEdit(<?php echo $tag['tag_id']; ?>)">Edit</button>
                                <button type="submit" name="update" class="hidden font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="saveEdit(<?php echo $tag['tag_id']; ?>)">Save</button>
                                <button type="button" name="cancel" class="hidden font-medium text-red-600 dark:text-red-500 hover:underline" onclick="cancelEdit(<?php echo $tag['tag_id']; ?>)">Cancel</button>
                                <button type="submit" name="delete" class="hidden font-medium bg-red-600 p-2 rounded-lg text-white hover:underline" onclick="deleteTag(<?php echo $tag['tag_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </section>
    <script src="javascript/regex.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function startEdit(tagId) {
            $('#tagParagraph_' + tagId).addClass('hidden');
            $('#editTagName_' + tagId).removeClass('hidden');
            $('[onclick="startEdit(' + tagId + ')"]').addClass('hidden');
            $('[onclick="saveEdit(' + tagId + ')"]').removeClass('hidden');
            $('[onclick="cancelEdit(' + tagId + ')"]').removeClass('hidden');
            $('[name="delete"][onclick="deleteTag(' + tagId + ')"]').addClass('hidden');
        }

        function saveEdit(tagId) {
            var editedTagName = $('#editTagName_' + tagId).val();

            $.ajax({
                type: 'POST',
                url: '../controller/tag.contr.php',
                data: {
                    id: tagId,
                    tag_name: editedTagName
                },
                success: function (response) {
                    $('#tagParagraph_' + tagId).text(editedTagName);

                    $('#tagParagraph_' + tagId).removeClass('hidden');
                    $('#editTagName_' + tagId).addClass('hidden');
                    $('[onclick="startEdit(' + tagId + ')"]').removeClass('hidden');
                    $('[onclick="saveEdit(' + tagId + ')"]').addClass('hidden');
                    $('[onclick="cancelEdit(' + tagId + ')"]').addClass('hidden');
                    $('[name="delete"][onclick="deleteTag(' + tagId + ')"]').removeClass('hidden');
                },
                error: function (error) {
                    console.error('Error updating tag: ', error);
                    // Handle error if needed
                }
            });
        }

        function cancelEdit(tagId) {
            $('#tagParagraph_' + tagId).removeClass('hidden');
            $('#editTagName_' + tagId).addClass('hidden');
            $('[onclick="startEdit(' + tagId + ')"]').removeClass('hidden');
            $('[onclick="saveEdit(' + tagId + ')"]').addClass('hidden');
            $('[onclick="cancelEdit(' + tagId + ')"]').addClass('hidden');
            $('[name="delete"][onclick="deleteTag(' + tagId + ')"]').removeClass('hidden');
        }

        function deleteTag(tagId) {
            // Add logic for delete action
            console.log('Deleting tag with ID ' + tagId);
        }
    </script>
</body>
</html>
