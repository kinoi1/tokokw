

<div id="sidebar" class="w-64 bg-green-500 text-white min-h-screen transition-all duration-300">
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-lg font-semibold menuTitle">Menu</h2>
        <!-- Button to Minimize Sidebar -->
        <button id="toggleSidebar" class="text-white focus:outline-none">
            <span id="toggleIcon" class="fa fa-angle-left"></span>
        </button>
    </div>

    <ul id="menuItems">
        <li class="p-2 flex items-center sidebar">
            <i class="fas fa-tags mr-2"></i> 
            <a href="/product" class="block py-2 hover:bg-green-700"> <span class="menuTitle">Product</span></a>
        </li>
        <li class="p-2 flex items-center sidebar">
            <i class="fas fa-boxes mr-2"></i> 
            <a href="/category" class="block py-2 hover:bg-green-700"><span class="menuTitle">Category</span></a>
        </li>
        <li class="p-2 flex items-center sidebar">
            <i class="fas fa-users mr-2"></i> 
            <a href="/variant" class="block py-2 hover:bg-green-700"><span class="menuTitle">Variant</span></a>
        </li>
        <li class="p-2 flex items-center sidebar">
            <i class="fas fa-users mr-2"></i> 
            <a href="/user" class="block py-2 hover:bg-green-700"><span class="menuTitle">User</span></a>
        </li>
    </ul>
</div>

