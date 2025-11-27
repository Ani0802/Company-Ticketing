<body class=" font-inter dashcode-app" id="body_class">
    <main class="app-wrapper">
        
        <!-- BEGIN: Sidebar -->
        <div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
            <div id="bodyOverlay"
                class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
            <div class="logo-segment">
                <a class="flex items-center" href="<?= $base_url ?>">
                    <img src="./../assets/images/logo/logo-c.svg" class="black_logo" alt="logo">
                    <img src="./../assets/images/logo/logo-c-white.svg" class="white_logo" alt="logo">
                    <span
                        class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Support System</span>
                </a>

            </div>
            <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
            <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-title">Home</li>

                    <li class="">
                        <a href="#" class="navItem">
                            <span class="flex items-center">
                                <iconify-icon class=" nav-icon" icon="heroicons:user"></iconify-icon>
                                <span>My Profile</span>
                            </span>
                            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="#">Change Password</a>
                            </li>
                        </ul>
                    </li>
                   <li class="">
                        <a href="#" class="navItem">
                            <span class="flex items-center">
                                <iconify-icon class=" nav-icon" icon="heroicons:user"></iconify-icon>
                                <span>Add Member</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>