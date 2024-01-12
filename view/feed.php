<?php
include '../controller/category.contr.php';
include '../controller/wiki.contr.php';
include '../controller/tag.contr.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Feed</title>
</head>
<?php include 'includes/nav.php'; ?>
<body class="bg-blueGray-50">

    <section class="flex justify-center">
            <form action="" enctype="" method="">
        <div class="flex items-center p-6 space-x-6   rounded-xl">              
        <input class="bg-gray-100 outline-none" type="text" placeholder="Article name or keyword..." />
        
        <div class="flex w-32 rounded-lg text-gray-500 font-semibold cursor-pointer">
        <select class="w-full" name="category" id="">
          <?php foreach($categories as $categorie){ ?>
            <option value="<?php echo $categorie['cat_id']; ?>"><?php echo $categorie['cat_name']; ?></option>
            <?php } ?>
            <option selected value="*">ALL</option>
        </select>
        </div>
        <div class="bg-green-400 py-3 px-5 text-white font-semibold rounded-lg hover:shadow-lg transition duration-3000 cursor-pointer">
        <button>Search</button>
        </form>
        </div>
    </div>
        
    </section>
    <section class="flex flex-row flex-wrap mx-auto">
     
<div class="container mx-auto text-center p-8">
            <h1 class="text-4xl font-semibold mb-2 text-blue-600">Explore latest articles</h1>
            <p class="text-lg text-gray-400 mb-8">we are bringing you the latest articles</p>
        </div>
  <!-- Single Card Component -->
  <?php
          $wikiOBJ = new WikiDAO();
          $result = $wikiOBJ->getWikis();
          foreach($result as $article){
      ?>
  <div
    class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3"
  >
    <div
      class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl"
    >
      <div class="md:flex-shrink-0">
        <img
        src="data:image/jpg;charset=utf8;base64,<?= base64_encode($article['image']); ?>"
          alt="Blog Cover"
          class="object-fill w-full rounded-lg rounded-b-none md:h-56"
        />
      </div>
      <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
        <span class="text-xs font-medium text-blue-600 uppercase">
        <?php echo $article['cat_name']; ?>
        </span>
        
      </div>
      <hr class="border-gray-300" />
      <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
        <a href="#" class="hover:underline">
          <h2 class="text-2xl font-bold tracking-normal text-gray-800">
          <?php echo $article['titre']; ?>
          </h2>
        </a>
      </div>
      <hr class="border-gray-300" />
      <p
        class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700"
      >
      <?php echo $article['contenu']; ?>
      </p>
      <hr class="border-gray-300" />
      <section class="px-4 py-2 mt-2">
        <div class="flex items-center justify-between">
          <div class="flex justify-between flex-1">
            
            <form action="">
              <input type="text" hidden value="<?php echo $article['wiki_id'] ?>">
            <button type="submit" class="bg-red-600 text-white rounded-lg py-1.5 px-2">delete</button>
            </form>
            <button class="bg-green-500 text-white rounded-lg py-1.5 px-2">edit</button>
          </div>
          
        </div>
      </section>
    </div>
  </div>
  
  
  </div>
  <?php
 }
  ?>
</section>
<footer>
  <div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex justify-center text-teal-600">
      <img src="view/image/logo.png" class="w-32" alt="">
    </div>

    <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt consequuntur amet culpa cum
      itaque neque.
    </p>

    

    <ul class="mt-12 flex justify-center gap-6 md:gap-8">
      <li>
        <a
          href="#"
          rel="noreferrer"
          target="_blank"
          class="text-gray-700 transition hover:text-gray-700/75"
        >
          <span class="sr-only">Facebook</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path
              fill-rule="evenodd"
              d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>

      <li>
        <a
          href="#"
          rel="noreferrer"
          target="_blank"
          class="text-gray-700 transition hover:text-gray-700/75"
        >
          <span class="sr-only">Instagram</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path
              fill-rule="evenodd"
              d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>

      <li>
        <a
          href="#"
          rel="noreferrer"
          target="_blank"
          class="text-gray-700 transition hover:text-gray-700/75"
        >
          <span class="sr-only">Twitter</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path
              d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
            />
          </svg>
        </a>
      </li>

      <li>
        <a
          href="#"
          rel="noreferrer"
          target="_blank"
          class="text-gray-700 transition hover:text-gray-700/75"
        >
          <span class="sr-only">GitHub</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path
              fill-rule="evenodd"
              d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>

      <li>
        <a
          href="#"
          rel="noreferrer"
          target="_blank"
          class="text-gray-700 transition hover:text-gray-700/75"
        >
          <span class="sr-only">Dribbble</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path
              fill-rule="evenodd"
              d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>
    </ul>
  </div>
</footer>
<div id="modal" class="flex justify-center  fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen">
    <div class="relative bg-white w-3/4 p-6 rounded shadow-lg">
      <!-- Modal Close Button -->
      <button
        id="closeModal"
        class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 hover:text-gray-700 cursor-pointer"
        onclick="closeModal()"
      >
        &times;
      </button>

      <!-- Modal Content - Form -->
      <form class="space-y-4" enctype="multipart/form-data" method="post" action="../controller/wiki.contr.php">
        <!-- Form Fields -->
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input
            type="text"
            id="title"
            name="title"
            class="mt-1 p-2 w-full border rounded-md"
            placeholder="Enter the title"
          />
        </div>

        <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
          <textarea
            id="content"
            name="content"
            class="mt-1 p-2 w-full border rounded-md"
            placeholder="Enter the content"
          ></textarea>
        </div>
        <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700">Category</label>
          <select class="w-full" name="category" id="">
          <?php foreach($categories as $categorie){ ?>
            <option value="<?php echo $categorie['cat_id']; ?>"><?php echo $categorie['cat_name']; ?></option>
            <?php } ?>
            
        </select>
        </div>
        <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700">Tags</label>
          <div class="grid grid-cols-4 gap-2 bg-blue-100 text-blue-800 text-xs rounded ">
          <?php foreach ($tags as $tag) {
            ?>
          <div class="p-2">
            <input type="checkbox" class="h-4 " name="tags[]">
          <p  class=""><?php echo $tag['tag_name']; ?></p>
          </div>
          <?php
          }
          ?>
          </div>
        </div>

        <!-- Image Input Field -->
        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
          <input
            type="file"
            id="image"
            name="image"
            accept="image/*"
            class="mt-1 p-2 w-full border rounded-md"
          />
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
          name="add"
        >
          Submit
        </button>
      </form>
    </div>
  </div>
</div>

<script src="javascript/main.js"></script>
</body>

</html>
