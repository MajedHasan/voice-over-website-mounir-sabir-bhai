<?php 
    $pageTitle = "Blogs | #1 Voice Over Marketplace";
    $currentPage = "Blog";

    $pageStyleSheets = '';
    $pageScripts = '';

    include("./includes/common/header.php");

    $postId = $_GET['id'];

    $query = "SELECT b.*, mt.meta_name, m.url
            FROM blogs b
            LEFT JOIN media m ON m.id = b.media_id
            LEFT JOIN meta mt ON mt.id = b.category_id
            WHERE b.id = '$postId'
            ";
    $result = $conn->query($query);

    echo "<pre>";
    // print_r($result->fetch_assoc());
    echo "</pre>";
    
?>


<?php 
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            ?>

    <!-- ================================ Category Container ================================ -->
    <section id="offer" class="mb-10">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden gap-8 mt-10 grid lg:grid-cols-4 grid-cols-1">
            <div class="shadow-lg rounded border-[1px] border-slate-300 col-span-3 p-3">
                <img src="<?= $row['url'] ?>" alt="" class="w-full">
                <h2 class="text-3xl mt-5 mb-3"><?= $row['title']; ?></h2>
                <div class="">
                    <p class="text-sm">Category: <span class="italic text-violet-400"><?= $row['meta_name']; ?></span></p>
                </div>
                <p class="text-md mt-5"><?=$row['description']?></p>
            </div>
            <div class="border-4 shadow rounded"></div>
        </div>
    </section>
    <!-- ============================##== Category Container ==##============================ -->

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


<?php include("./includes/common/footer.php") ?>