$(document).ready(function() {
    $('#toggleSidebar').click(function() {
        const sidebar    = $('#sidebar');
        const toggleIcon = $('#toggleIcon');
        const menuTitle  = $('#menuTitle');
        const menuItems  = $('#menuItems span');
        const menuSpan   = $('.menuTitle');

        // Toggle Sidebar width and hide/show menu items
        sidebar.toggleClass('w-64 w-16');

        // Toggle visibility of menu items and title
        menuTitle.toggleClass('hidden');
        menuItems.toggleClass('hidden');
        menuSpan.toggleClass('hidden');

        // Change the toggle icon to hamburger or arrow
        if (sidebar.hasClass('w-16')) {
            toggleIcon.removeClass('fa-bars').addClass('fa-bars'); // Keeps the hamburger icon
            $(".menuTitle").hide();
        } else {
            toggleIcon.removeClass('fa-bars').addClass('fa-bars'); // Still keeps the hamburger icon for toggling
            $(".menuTitle").show();
        }
    });
});