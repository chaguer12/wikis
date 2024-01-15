<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleNavbar() {
            var navbar = document.getElementById("navbarDefault");
            if (navbar.classList.contains("hidden")) {
                navbar.classList.remove("hidden");
                navbar.classList.add("flex", "flex-col");
            } else {
                navbar.classList.add("hidden");
                navbar.classList.remove("flex", "flex-col");
            }
        }
    </script>
</head>
<body>
    <header>
        <nav class="flex justify-between items-center">
            <div>
                <img src="image/logo.png" class="w-32">
            </div>
            
            <!-- Burger icon for small screens -->
            <button class="text-blue-600 lg:hidden" onclick="toggleNavbar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>

            <!-- Menu -->
            <div class="lg:flex gap-4 mb-8 " id="navbarDefault">
    <a href="index.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Home</a>
    <a href="feed.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Feed</a>
    <?php if (!isset($_SESSION['email'])): ?>
        <a href="login.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Log in</a>
        <a href="register.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Register</a>
    <?php else: ?>
        <button id="openModal" class="bg-green-500 rounded-lg px-2 text-white text-lg font-semibold">Add Article</button>
        <a href="logout.php" class="text-blue-600 text-lg font-semibold hover:text-green-500">Log out</a>
    <?php endif; ?>
</div>
        </nav>
    </header>
</body>
</html>
