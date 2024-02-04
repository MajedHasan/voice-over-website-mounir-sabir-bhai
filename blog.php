<?php 
    $pageTitle = "Blogs | #1 Voice Over Marketplace";
    $currentPage = "Blog";

    $pageStyleSheets = '';
    $pageScripts = '';

    include("./includes/common/header.php");

    $query = "SELECT b.*, mt.meta_name, m.url
            FROM blogs b
            LEFT JOIN media m ON m.id = b.media_id
            LEFT JOIN meta mt ON mt.id = b.category_id
            ";
    $result = $conn->query($query);

    echo "<pre>";
    // print_r($result->fetch_assoc());
    echo "</pre>";
    
?>


    <!-- ================================ Category Container ================================ -->
    <section id="offer" class="mb-10">
        <div style="background: url(./assets/img/category/audio-book.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="py-28 px-6 bg-slate-900/70">
                <h1 class="text-center italic font-bold xl:text-4xl text-2xl text-slate-50"><span class="text-[#df98e8]">B</span>logs</h1>
            </div>
        </div>
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8 mt-10">

            <?php 
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="shadow-lg rounded border-[4px] border-slate-300">
                                <img src="<?= $row['url'] ?>" alt="">
                                <div class="py-2 px-4">
                                    <h2 class="text-lg"><?= $row['title']; ?></h2>
                                    <div class="flex items-center justify-between gap-4 my-4">
                                        <div>
                                            <p class="text-sm">Category: <span class="italic"><?= $row['meta_name']; ?></span></p>
                                        </div>
                                        <div></div>
                                    </div>
                                    <a href="./post.php?id=<?= $row['id']; ?>" class="py-2 px-7 bg-violet-700 hover:bg-violet-300 text-white text-sm italic translate-all block text-center">Read More...</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else{
                    ?>
                        <div class="shadow-lg rounded border-[4px] border-slate-300 py-10 px-5 text-center col-span-3">
                            <p class="text-red-500 font-semibold text-3xl">No Blogs Found!!!</p>
                        </div>
                    <?php
                }
            ?>
            
        </div>
    </section>
    <!-- ============================##== Category Container ==##============================ -->


<?php include("./includes/common/footer.php") ?>