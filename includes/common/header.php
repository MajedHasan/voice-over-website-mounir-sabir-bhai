<?php 
    require("./config/config.php");

    if($currentPage == "Add Service"){
        if(empty($_SESSION['loggedInUser'])){
            header("Location: /");
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $pageTitle; ?></title>

    <!-- Font Awesome Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <!-- Font Awesome Icon Not CDN -->
    <link rel="stylesheet" href="/assets/css/fontAwesome.css">

    <!-- Diasy UI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Diasy UI Not CDN -->
    <link rel="stylesheet" href="/assets/css/daisyUI.css">

    <!-- Swiper JS CDN -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Toastify CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


    <?php
    
        if(isset($pageStyleSheets) && $pageStyleSheets != ""){
            echo $pageStyleSheets;
        }
        if($currentPage == "Home"){
            echo '
                <link rel="stylesheet" href="./assets/css/categoryMenu.css">
                <link rel="stylesheet" href="./assets/css/bannerSlider.css" />
                ';
        }

    ?>

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Search Handler Scripts -->
    <!-- <script src="/assets/js/searchHandler.js"></script> -->


</head>
<body class="bg-[#fcf3ff]">

    <!-- ================================ Header ================================ -->
    <header id="header" class="border-b border-b-sky-800 sticky top-0 bg-white z-[999]">
        <div class="container mx-auto px-3 md:px-0 flex flex-row items-center justify-between py-3 gap-4 xl:max-w-[1240px]">
            <a href="/" class="text-[#711b76] text-3xl font-bold flex">
                V<span class="lg:flex hidden">oices</span>
            </a>
            <!-- <div class="relative flex-1 flex justify-center">
                <div class="flex items-center rounded-full py-2 px-4 bg-slate-200 md:w-[400px] w-full gap-3">
                    <i class="fa-solid fa-magnifying-glass text-xl text-gray-500"></i>
                    <input type="text" id="searchInput" class="outline-none flex-1 rounded bg-transparent text-gray-600 placeholder:text-gray-500" placeholder="Search for Talent or Packages...">
                    <i class="fa-solid fa-filter text-xl text-gray-500 cursor-pointer"></i>
                </div>
            </div> -->
            <div class="items-center gap-5 lg:flex hidden">
                <a href="/" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Home' ? 'font-semibold text-[#711b76]' : '' ?>">Home</a>
                <a href="/category.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Category' ? 'font-semibold text-[#711b76]' : '' ?>">Category</a>
                <a href="/offer.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Offer' ? 'font-semibold text-[#711b76]' : '' ?>">Offer</a>
                <a href="/workwithme.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Work With Me' ? 'font-semibold text-[#711b76]' : '' ?>">Work With Me</a>
                <a href="/blog.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Blog' ? 'font-semibold text-[#711b76]' : '' ?>">Blog</a>
                <a href="/contact.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Contact' ? 'font-semibold text-[#711b76]' : '' ?>">Contact</a>
            </div>
            <div class="lg:flex items-center gap-4 hidden">
                <?php 
                    if(!empty($loggedInUser)){
                        ?>
                            <div class="relative group">
                                <div class="rounded-full w-10 h-10 flex items-center justify-center bg-violet-100 cursor-pointer">
                                    M
                                </div>
                                <div class="absolute top-10 right-0 rounded shadow-xl bg-violet-50 py-2 px-5 w-52 flex flex-col gap-4 invisible group-hover:visible">
                                    <a href="./dashboard.php" class="border-b pb-2 hover:text-slate-400">Dashboard</a>
                                    <a href="./services.php" class="border-b pb-2 hover:text-slate-400">Services</a>
                                    <a href="./orders.php" class="border-b pb-2 hover:text-slate-400">Orders</a>
                                    <a href="./logout.php" class="px-3 py-1 rounded bg-red-600 text-slate-50 w-full">Log Out</a>
                                </div>
                            </div>
                        <?php
                    }
                    else{
                        ?>
                            <a href="./login.php" class="border border-[#711b76] py-1 px-4 rounded text-[#711b76] font-semibold hover:bg-[#711b76] hover:text-white transition-all">Log In</a>
                            <a href="./signup.php" class="bg-[#711b76] rounded py-1 px-4 text-white text-md font-semibold border-[#711b76] border hover:bg-gray-50 hover:text-[#711b76] transition-all">Sign Up</a>
                        <?php
                    }
                ?>
            </div>
            <button id="mobile-menu-open-btn" class="lg:hidden flex text-2xl cursor-pointer">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <div id="mobile-menu" class="fixed top-0 left-0 right-0  bottom-0 bg-slate-100/95 py-8 px-6 lg:invisible visible hidden transition-all z-[9999]">
            <div class="container mx-auto">
                <div class="flex items-center justify-between gap-4">
                    <a href="/" class="text-[#711b76] text-2xl font-bold">Voices</a>
                    <button id="mobile-menu-close-btn" class="text-2xl cursor-pointer">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="flex flex-col gap-2 mt-6">
                    <div class="flex items-center gap-1 flex-col mb-4">
                        <a href="/" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Home' ? 'font-semibold text-[#711b76]' : '' ?>">Home</a>
                        <a href="/category.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Category' ? 'font-semibold text-[#711b76]' : '' ?>">Category</a>
                        <a href="/offer.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Offer' ? 'font-semibold text-[#711b76]' : '' ?>">Offer</a>
                        <a href="/workwithme.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Work With Me' ? 'font-semibold text-[#711b76]' : '' ?>">Work With Me</a>
                        <a href="/blog.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Blog' ? 'font-semibold text-[#711b76]' : '' ?>">Blog</a>
                        <a href="/contact.php" class="text-md hover:text-[#df98e8] <?= $currentPage == 'Contact' ? 'font-semibold text-[#711b76]' : '' ?>">Contact</a>
                    </div>
                    <?php 
                        if(!empty($loggedInUser)){
                            ?>
                                <div class="flex rounded shadow-xl bg-violet-50 py-2 px-5 w-full flex flex-col gap-4">
                                    <a href="./dashboard.php" class="border-b pb-2 hover:text-slate-400">Dashboard</a>
                                    <a href="./services.php" class="border-b pb-2 hover:text-slate-400">Services</a>
                                    <a href="./orders.php" class="border-b pb-2 hover:text-slate-400">Orders</a>
                                    <a href="./logout.php" class="px-3 py-1 rounded bg-red-600 text-slate-50 w-full">Log Out</a>
                                </div>
                            <?php
                        }
                        else{
                            ?>
                                <a href="./login.php" class="border border-[#711b76] py-1 px-4 rounded text-[#711b76] font-semibold hover:bg-[#711b76] hover:text-white transition-all text-center">Log In</a>
                                <a href="./signup.php" class="bg-[#711b76] rounded py-1 px-4 text-white text-md font-semibold border-[#711b76] border hover:bg-gray-50 hover:text-[#711b76] transition-all text-center">Sign Up</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ============================##== Header ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->
