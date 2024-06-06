<script>
    // Sidebar
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.querySelector(".bg-blue-500");
        var icon = document.getElementById("toggleIcon");
        var normalTitle = document.getElementById("normalTitle");
        var menu = document.getElementById("menu");
        var dropdown = document.querySelectorAll("#dropdown");
        var navTitles = document.querySelectorAll("#navTitle");

        // Function to open sidebar
        function openSidebar() {
            sidebar.classList.add("w-72");
            sidebar.classList.remove("w-20");
            document.getElementById("toggleButton").classList.remove("left-[0.85rem]");
            document.getElementById("toggleButton").classList.add("left-[16.5rem]");
            icon.classList.add("rotate-180");
            icon.classList.remove("fa-bars");
            icon.classList.add("fa-x");
            normalTitle.classList.remove("hidden");
            menu.classList.remove("flex");
            menu.classList.remove("justify-center");
            menu.classList.remove("items-center");
            dropdown.forEach(function(dropdown) {
                dropdown.classList.add("hidden");
            });
            navTitles.forEach(function(navTitle) {
                navTitle.classList.remove("hidden");
            });
        }

        // Function to close sidebar
        function closeSidebar() {
            sidebar.classList.remove("w-72");
            sidebar.classList.add("w-20");
            document.getElementById("toggleButton").classList.add("left-[0.85rem]");
            document.getElementById("toggleButton").classList.remove("left-[16.5rem]");
            icon.classList.remove("rotate-180");
            icon.classList.remove("fa-x");
            icon.classList.add("fa-bars");
            normalTitle.classList.add("hidden");
            menu.classList.add("flex");
            menu.classList.add("justify-center");
            menu.classList.add("items-center");
            dropdown.forEach(function(dropdown) {
                dropdown.classList.remove("hidden");
            });
            navTitles.forEach(function(navTitle) {
                navTitle.classList.add("hidden");
            });
        }

        // Initial state: open sidebar
        openSidebar();

        document.getElementById("toggleButton").addEventListener("click", function() {
            if (sidebar.classList.contains("w-72")) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });
    });
    // Sidebar
    // Obeject Load
    window.addEventListener('scroll', function() {
        var section = document.getElementById('.section');
        var button = document.getElementById('button');

        var sectionRect = section.getBoundingClientRect();

        if (sectionRect.top <= window.innerHeight) {
            button.classList.remove('hidden');
            button.classList.add('animate-slideInFromTop');
        } else {
            button.classList.add('hidden');
        }
    });
    // Obeject Load
</script>