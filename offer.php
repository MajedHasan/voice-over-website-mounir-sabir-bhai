<?php 
    $pageTitle = "Offer | #1 Voice Over Marketplace";
    $currentPage = "Offer";

    $pageStyleSheets = '';
    $pageScripts = '
                    <script src="./assets/js/offer-page.js"></script>
    ';

    $category = null;
    $page = 1;
    if(isset($_GET['category'])){
        $category = urldecode($_GET['category']);
    }
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }

    include("./includes/common/header.php");
?>


    <!-- ================================ Category Container ================================ -->
    <section id="offer" class="my-10">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden ">
            <h1 class="text-center italic font-bold xl:text-4xl text-2xl"><span class="text-[#df98e8]">O</span>ffer</h1>
            <input type="hidden" id="category" value="<?= $category ?>">
            <input type="hidden" id="page" value="<?= $page ?>">
            <div id="offer-container" class="flex flex-col gap-8 py-10">

            </div>
            <div class="md:max-w-[449px] max-w-full mx-auto rounded py-2 px-5 flex items-center gap-1 justify-between border-y-2 border-y-[#df98e8]" id="pagination">
                <!-- <a href="./offer.php?category=<?= $category ?>&page=<?= $page > 1 ? $page-1 : 1;?>" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">Prev</a>
                <a href="./offer.php?category=<?= $category ?>&page=1" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">1</a>
                <a href="./offer.php?category=<?= $category ?>&page=2" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">2</a>
                <a href="./offer.php?category=<?= $category ?>&page=3" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">3</a>
                <a href="./offer.php?category=<?= $category ?>&page=<?= $page < 10 ? $page+1 : 10;?>" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">Next</a> -->
            </div>
            <div class="lg:max-w-[700px] max-w-full mx-auto my-6">
                <p class="text-md italic text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus suscipit quae quam perferendis asperiores delectus consectetur modi odio recusandae, ducimus eos omnis expedita quo possimus eum repellendus! Inventore, atque dolores recusandae illum aut ut molestias!</p>
            </div>
            <div class="flex justify-center">
                <a href="./add-service.php" class="rounded py-2 px-12 bg-[#711b76] text-slate-50 text-xl italic hover:bg-[#df98e8] transition-all hover:text-slate-900">Add a service</a>
            </div>
        </div>
    </section>
    <!-- ============================##== Category Container ==##============================ -->


<?php include("./includes/common/footer.php") ?>