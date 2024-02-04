<?php 
    $pageTitle = "Home | #1 Voice Over Marketplace";
    $currentPage = "Home";

    $pageStyleSheets = '
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
                        <link rel"stylesheet" href="./assets/css/bannerSlider.css" />
                        ';
    $pageScripts = '
                    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                    <script src="./assets/js/home-page-filter-form.js"></script>
                    ';

    include("./includes/common/header.php");

    // include("./includes/common/categoryMenu.php");

    $query = "SELECT * FROM meta WHERE meta_type = 'category' ";
    $categories = $conn->query($query);
    $query = "SELECT * FROM meta WHERE meta_type = 'language' ";
    $languages = $conn->query($query);

?>


    <!-- ================================ Banner ================================ -->
    <!-- <section id="banner" class="bg-gradient-to-r from-[#711b76] to-[#df98e8] pt-40 pb-60">
        <div class="container mx-auto xl:px-0 px-3 flex items-center justify-between md:flex-row flex-col gap-12 xl:max-w-[1240px]">
            <div class="flex-1">
                <h1 class="md:text-5xl text-3xl font-bold text-white md:text-left text-center">#1 Marketplace For Voice Over</h1>
                <p class="md:text-2xl text-md text-white mt-6 md:text-left text-center">Sign up in seconds. Post a job for free. It's quick and easy to hire professional and global voice actors for any creative project.</p>
                <div class="flex items-center gap-4 mt-4 md:justify-start justify-center">
                    <a href="#" class="rounded bg-white py-2 px-6 text-black border transition-all text-lg font-semibold hover:bg-sky-700 hover:border-white hover:text-white">
                        Find Talent
                    </a>
                    <a href="#" class="rounded bg-white py-2 px-6 text-black border transition-all text-lg font-semibold hover:bg-sky-700 hover:border-white hover:text-white">
                        Find Work
                    </a>
                </div>
            </div>
            <div class="flex-1"></div>
        </div>
    </section> -->
    <!-- ============================##== Banner ==##============================ -->


    <!-- ================================ Slider ================================ -->
    <?php 
        include("./includes/home/bannerSlider.php")
    ?>
    <!-- ============================##== Slider ==##============================ -->


    <!-- ================================ Demo ================================ -->
    <section id="demo" class="py-20">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden">
            <div class="flex md:flex-row flex-col gap-x-10 gap-y-2 items-center border-y-2 py-2">
                <p class="font-semibold italic text-lg">Filter</p>
                <form action="" class="flex-1 flex sm:flex-row flex-col gap-x-10 gap-y-2 items-center" id="filter-form">
                    <select name="language" id="" class="py-1 px-7 text-lg font-light rounded border border-violet-600 outline-none">
                        <option value="" selected disabled>Language</option>
                        <option value="All">All</option>
                        <?php 
                            while($row = $languages->fetch_assoc()){
                                ?>
                                <option value="<?=$row['meta_name']?>"><?=$row['meta_name']?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <select name="category" id="" class="py-1 px-7 text-lg font-light rounded border border-violet-600 outline-none">
                        <option value="" selected disabled>Category</option>
                        <option value="All">All</option>
                        <?php 
                            while($row = $categories->fetch_assoc()){
                                ?>
                                <option value="<?=$row['meta_name']?>"><?=$row['meta_name']?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <button class="bg-[#711b76] py-1 px-7 rounded text-slate-50" type="submit">SUBMIT</button>
                </form>
            </div>
            <div class="flex flex-col gap-10 pt-8" id="filter-results">
                <!-- <div class="rounded lg:py-6 py-2 lg:px-10 px-5 shadow-lg bg-violet-100 flex items-center justify-between gap-7">
                    <div class="flex flex-col items-center">
                        <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="border-4 rounded-full max-w-24 w-full">
                        <p class="text-xl font-bold text-slate-500">Name</p>
                    </div>
                    <div class="flex items-center gap-5"> 
                        <div class="rounded border border-[#711b76] p-1 px-2 text-sm">
                            <p class="border-b border-b-[#711b76] italic text-xs">Languages</p>
                            <p>-- Arabic</p>
                            <p>-- Franch</p>
                            <p>-- Italic</p>
                        </div>
                        <div class="rounded border border-[#711b76] p-1 px-2 text-sm">
                            <p class="border-b border-b-[#711b76] italic text-xs">Categories</p>
                            <p>-- Radio</p>
                            <p>-- Social Media</p>
                            <p>-- Ebook</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 items-center">
                        <audio src="./assets/voices/demo/demo-1.mp3" controls></audio>
                        <p class="text-lg">Start From <span class="text-2xl font-semibold italic text-yellow-600">$200</span> dh</p>
                    </div>
                    <div>
                        <a href="./checkout.php?service_id=1" class="py-2 px-8 rounded text-slate-50 bg-[#711b76] text-lg">Choose Me</a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- ============================##== Demo ==##============================ -->


    <!-- ================================ Trust US ================================ -->
    <?php 
        include("./includes/home/trustUs.php")
    ?>
    <!-- ============================##== Trust US ==##============================ -->

    
    <!-- ================================ Why US ================================ -->
    <?php 
        include("./includes/home/whyUs.php");
    ?>
    <!-- ============================##== Why US ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->


<?php include("./includes/common/footer.php") ?>