<?php

include "../controller/user.contr.php";

if (isset($_SESSION['role']) && isset($role) && $_SESSION['role'] === 'admin') {
    ?>
 <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="wiki" value="<?php echo $article['wiki_id'] ?>">
 <button type="submit" name="archive" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
 </svg>

 Archive
</button>
    
 </form>
<?php
}