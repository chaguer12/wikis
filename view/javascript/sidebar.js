document.addEventListener("DOMContentLoaded", function() {
    var sidebar = document.getElementById("default-sidebar");
    var sidebarToggle = document.getElementById("sidebarToggle");
  
    sidebarToggle.addEventListener('click', function () {
        // Toggle the -translate-x-full class on the sidebar
        sidebar.classList.toggle('-translate-x-full');
        
        // Move the button along with the sidebar
        sidebarToggle.classList.toggle('ms-64'); // Adjust the value based on your sidebar width
    });
  });