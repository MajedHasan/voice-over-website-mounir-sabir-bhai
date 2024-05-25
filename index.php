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
        include("./includes/home/banner.php")
    ?>
    <!-- ============================##== Slider ==##============================ -->


    <!-- ================================ Demo ================================ -->
    <section id="demo" class="py-20">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden">
            <!-- <audio src="./assets/voices/demo/demo-1.mp3" controls></audio> -->
            <div>
                <!-- <div class="lg:py-6 py-2 lg:px-10 px-5">

                    <div class="flex items-center justify-between gap-7 pb-4 bg-[#fdf9ff] rounded-full">
                        <div class="flex flex-col items-center">
                            <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="border-r-4 border-[#c989d6] rounded-full max-w-24 w-full">
                        </div>
                        <div class="flex flex-col justify-start flex-1 gap-1">
                            <h3 class="text-xl font-bold text-[#d39fde]">Yeasin Boukhssimi</h3>
                            <p class="text-slate-600">Event Planning Radio Commercial</p>
                            <div>
                                <audio src="./assets/voices/demo/demo-1.mp3" controls></audio>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <i class="fa fa-heart text-[#d39fde]"></i>
                                    <span class="text-[#d39fde]">7K</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa fa-comment text-[#d39fde]"></i>
                                    <span class="text-[#d39fde]">56</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:text-left text-center">
                        <a href="./checkout.php?service_id=1" class="py-1 px-5 rounded-xl text-slate-50 bg-[#ecd5f1] text-lg w-fit md:ml-28">Choose Me</a>
                    </div>

                </div> -->
            </div>

            <div class="flex md:flex-row flex-col gap-x-10 gap-y-2 items-center py-2 justify-center">
                <!-- <p class="font-semibold italic text-lg">Filter</p> -->
                <form action="" class="flex-1 flex sm:flex-row flex-col gap-x-10 gap-y-2 items-center  justify-center" id="filter-form">
                    <select name="language" id="" class="py-1 px-7 text-lg font-light rounded outline-none">
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
                    <select name="category" id="" class="py-1 px-7 text-lg font-light rounded outline-none">
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
            <div class="flex flex-col gap-3 pt-8 bg-slate-50 items-center" id="filter-results">
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
                <div class="lg:py-6 py-2 lg:px-10 px-5">

                    <div class="flex items-center justify-between gap-7 pb-4 bg-[#fdf9ff] rounded-full">
                        <div class="flex flex-col items-center">
                            <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="border-r-4 border-[#c989d6] rounded-full max-w-24 w-full">
                        </div>
                        <div class="flex flex-col justify-start flex-1 gap-1">
                            <h3 class="text-xl font-bold text-[#d39fde]">Yeasin Boukhssimi</h3>
                            <p class="text-slate-600">Event Planning Radio Commercial</p>
                            <div>
                                <audio src="./assets/voices/demo/demo-1.mp3" controls></audio>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-heart text-[#d39fde]"></i>
                                    <span class="text-[#d39fde]">7K</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-comment text-[#d39fde]"></i>
                                    <span class="text-[#d39fde]">56</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:text-left text-center">
                        <a href="./checkout.php?service_id=1" class="py-1 px-5 rounded-xl text-slate-50 bg-[#ecd5f1] text-lg w-fit md:ml-28">Choose Me</a>
                    </div>

                </div>
                <div class="lg:py-6 py-2 lg:px-10 px-5">

                    <div class="flex items-center justify-between gap-7 pb-4 bg-[#fdf9ff] rounded-full">
                        <div class="flex flex-col items-center">
                            <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="border-r-4 border-[#c989d6] rounded-full max-w-24 w-full">
                        </div>
                        <div class="flex flex-col justify-start flex-1 gap-1">
                            <h3 class="text-xl font-bold text-[#d39fde]">Yeasin Boukhssimi</h3>
                            <p class="text-slate-600">Event Planning Radio Commercial</p>
                            <div>
                                <audio src="./assets/voices/demo/demo-1.mp3" controls></audio>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-heart text-[#d39fde]"></i>
                                    <span class="text-[#d39fde]">7K</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-comment text-[#d39fde]"></i>
                                    <span class="text-[#d39fde]">56</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:text-left text-center">
                        <a href="./checkout.php?service_id=1" class="py-1 px-5 rounded-xl text-slate-50 bg-[#ecd5f1] text-lg w-fit md:ml-28">Choose Me</a>
                    </div>

                </div>
            </div>

            <div class="text-center mt-5">
                <a href="./checkout.php?service_id=1" class="py-1 px-5 rounded-xl text-slate-50 bg-[#d39fde] font-semibold text-lg inline-block">Publier Tasks</a>
            </div>

        </div>
    </section>
    <!-- ============================##== Demo ==##============================ -->


    <!-- ================================ ================================ -->
    <section class="mx-auto container mt-5 max-w-[1240px] px-3">
        <div class="flex justify-between">
            <div class="flex-1 text-center">
                <i class="fa fa-earth text-[#c785d3] text-4xl"></i>
                <h3 class="text-lg font-semibold text-[#c785d3] mt-5">4 Million Talent</h3>
                <p class="text-sm text-[#c785d3]">Across the globe</p>
            </div>
            <div class="h-auto w-[2px] bg-[#932ca8]"></div>
            <div class="flex-1 text-center">
                <i class="fa fa-language text-[#c785d3] text-4xl"></i>
                <h3 class="text-lg font-semibold text-[#c785d3] mt-5">10+ Languages</h3>
                <p class="text-sm text-[#c785d3]">any accent & dialect</p>
            </div>
            <div class="h-auto w-[2px] bg-[#932ca8]"></div>
            <div class="flex-1 text-center">
                <i class="fa fa-clock text-[#c785d3] text-4xl"></i>
                <h3 class="text-lg font-semibold text-[#c785d3] mt-5">24 Hours</h3>
                <p class="text-sm text-[#c785d3]">to complete a project</p>
            </div>
        </div>

        <div class="w-full max-w-md text-center mx-auto mt-14">
            <p class="text-md text-[#c785d3]">Creatives, marketers, producers, and instructors from the world's biggest brands and agencies <span class="font-semibold">trust Voices.</span></p>
        </div>

        <div class="flex items-center justify-between gap-5 mt-14">
            <img src="./assets/img/brands/shopify.png" alt="" class="w-full max-w-[100px]">
            <img src="./assets/img/brands/holy.png" alt="" class="w-full max-w-[100px]">
            <img src="./assets/img/brands/discovery.png" alt="" class="w-full max-w-[100px]">
            <img src="./assets/img/brands/microsoft.png" alt="" class="w-full max-w-[100px]">
        </div>

        <div class="w-full max-w-sm text-center mx-auto mt-14">
            <h2 class="text-xl font-bold text-[#c785d3]">Your Go-to Source for All Professional Voice Over Needs</h2>
        </div>

        <div class="grid md:grid-cols-4 grid-cols-2 gap-5 pb-10 mt-12">
            <div class="bg-slate-50 rounded py-4 px-2 text-center">
                <h3 class="text-lg font-semibold text-[#c785d3]">Find the Perfect Voice for Your Project</h3>
                <p class="text-sm text-[#c785d3] mt-4">Access our diverse talent pool of over 4,000,000 voice actors across 160 countries. <br/> <span class="font-semibold">Browse Talent</span> </p>
            </div>
            <div class="bg-slate-50 rounded py-4 px-2 text-center">
                <h3 class="text-lg font-semibold text-[#c785d3]">Get Project Done Faster When Hiring Direct</h3>
                <p class="text-sm text-[#c785d3] mt-4">Our marketplace lets you directly hire talent and receive final files, often in as little as a day. <span class="font-semibold">Learn how it works.</span> </p>
            </div>
            <div class="bg-slate-50 rounded py-4 px-2 text-center">
                <h3 class="text-lg font-semibold text-[#c785d3]">High Quality Voice Over, Competitive Rates</h3>
                <p class="text-sm text-[#c785d3] mt-4">Receive quotes and auditions for free so you can choose the best voice actor for your project. <span class="font-semibold">Learn about pricing</span> </p>
            </div>
            <div class="bg-slate-50 rounded py-4 px-2 text-center">
                <h3 class="text-lg font-semibold text-[#c785d3]">Ready-to-Use, Broadcast Quality Files</h3>
                <p class="text-sm text-[#c785d3] mt-4">Our voice actors are invested in their careers, with Professional audio Equipment and Software. </p>
            </div>
        </div>

    </section>
    <!-- ============================##== ==##============================ -->


    <!-- ================================ Trust US ================================ -->
    <?php 
        // include("./includes/home/trustUs.php")
    ?>
    <!-- ============================##== Trust US ==##============================ -->

    
    <!-- ================================ Why US ================================ -->
    <?php 
        // include("./includes/home/whyUs.php");
    ?>
    <!-- ============================##== Why US ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->


<?php include("./includes/common/footer.php") ?>