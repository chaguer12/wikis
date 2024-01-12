<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Our categories</title>
</head>
<body class="bg-blueGray-50">
<?php include 'includes/nav.php'; ?>
<section class="relative pt-16 bg-blueGray-50">
    <div class="container mx-auto text-center">
            <h1 class="text-4xl font-semibold mb-2 text-blue-600">Welcome to our categories</h1>
            <p class="text-lg text-gray-400 mb-8">Our top categories</p>
        </div>
<div class="container mx-auto">
  
<div class="grid grid-cols-2 gap-16">
<?php
include_once '../controller/category.contr.php';
foreach($categories as $cat){?>
    <a href="categories.php?cat_id=<?php echo $cat['cat_id']; ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-48 md:h-96 md:w-48 md:rounded-none md:rounded-s-lg" src="data:image/jpg;charset=utf8;base64,<?=  base64_encode($cat['image']); ?>" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $cat['cat_name']; ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        </div>
    </a>
<?php
}
?>



</div>

</div>

</section>
    
</body>
</html>