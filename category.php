<?php 
    $pageTitle = "Category | #1 Voice Over Marketplace";
    $currentPage = "Category";

    $pageStyleSheets = '';
    $pageScripts = '
                    <script src="./assets/js/category-page.js"></script>
    ';

    include("./includes/common/header.php");
?>


    <!-- ================================ Category Container ================================ -->
    <section id="category" class="my-10">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden ">
            <h1 class="text-center italic font-bold xl:text-4xl text-2xl"><span class="text-[#df98e8]">A</span>ll <span class="text-[#df98e8]">C</span>ategory</h1>
            <div id="category-container" class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-14 py-10">

            </div>
        </div>
    </section>
    <!-- ============================##== Category Container ==##============================ -->


<?php include("./includes/common/footer.php") ?>