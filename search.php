<?php 

    $keyword = "";
    $searchType = "";
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    if(isset($_GET['searchType'])){
        $searchType = $_GET['searchType'];
    }

    $pageTitle = "$keyword | #1 Voice Over Marketplace";
    $currentPage = "Search";
    include("./includes/common/header.php");

    include("./includes/common/categoryMenu.php");
?>

<main class="bg-slate-100">
    <!-- ================================ Banner ================================ -->
    <section class="container mx-auto xl:max-w-[1240px] py-4">
        <h1 class="text-4xl font-bold italic">Search Results For "<span><?= $keyword ?></span>"</h1>
        <div class="flex items-center justify-between gap-10 border-b border-b-sky-700">
            <div class="flex items-center">
                <a href="<?= $server.$searchType ? : '&searchType=packages' ?>" class="border-b-2 border-b-sky-700 py-2 px-5 font-bold text-sky-700">Packages</a>
                <a href="<?= $server.'&searchType=talent' ?>" class="border-b border-b-gray-700 py-2 px-5">Talent</a>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-bold">Sort:</span>
                <select name="" id="" class="bg-transparent">
                    <option value="">Best Match</option>
                    <option value="">Rating</option>
                    <option value="">Reviews</option>
                </select>
            </div>
        </div>
    </section>
    <!-- ============================##== Banner ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->
</main>

<?php include("./includes/common/footer.php") ?>