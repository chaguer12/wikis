<?php
session_start();
?>
<header>
          <nav class="flex justify-between">
              <div class="">
                  <img src="image/logo.png" class="w-32">
              </div>

              <div class="p-4">
                  <ul class="flex gap-4 mt-4">
                      <li><a href="index.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Home</a></li>
                      <li><a href="feed.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Feed</a></li>

                      <?php
if (!isset($_SESSION['email'])) {


                      ?>
                      <li><a href="login.php" class="text-blue-600 text-lg font-semibold hover:text-green-500 underline decoration-green-500">Log in</a></li>
                      <li><a href="register.php" class="text-blue-600 text-lg font-semibold hover:text-green-500 underline decoration-green-500">Register</a></li>
                      <?php
                      }else{
                        ?>
                        <li class="bg-green-500 rounded-lg px-2"><button id="openModal" type="button"  class="text-white   text-lg font-semibold">add article</button></li>
                        <li><a href="logout.php" class="text-blue-600 text-lg font-semibold hover:text-green-500 underline decoration-green-500">Log out</a></li>
                        

                        <?php
                      }
                      ?>
                  </ul>
              </div>
    
              
          </nav>

          
</header>