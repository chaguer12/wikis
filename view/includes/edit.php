<?php

include "../controller/user.contr.php";





if (isset($_SESSION['user_id']) && isset($user['user_id']) && $_SESSION['user_id'] === $user['user_id']) {
    ?>
        
    <form action="../controller/wiki.contr.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id_wiki" hidden value="<?php echo $article['wiki_id'] ?>">
        <button type="submit" name="delete" class="bg-red-600 text-white rounded-lg py-1.5 px-2">delete</button>
    </form>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="wiki_id" hidden value="<?php echo $article['wiki_id'] ?>">
        <a href="editwiki.php?wiki_id=<?php echo $article['wiki_id'] ?>" class="bg-green-500 text-white rounded-lg py-1.5 px-2">edit</a>
    </form>
<?php
} 

