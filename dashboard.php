<?php 
    $pageTitle = "Dashboard | #1 Voice Over Marketplace";
    $currentPage = "Dashboard";

    $pageStyleSheets = '';
    $pageScripts = '';

    include("./includes/common/header.php");

    // include("./includes/common/categoryMenu.php");

    $uid = $loggedInUser['id'];
    $query = "SELECT * FROM orders WHERE uid = '$uid' ";
    $orders = $conn->query($query);
    $totalOrders = $orders->num_rows;

    $query = "SELECT * FROM services WHERE uid = '$uid' ";
    $services = $conn->query($query);
    $totalServices = $orders->num_rows;

?>


    <main class="flex w-full min-h-screen h-full">
        <!-- ================================ Banner ================================ -->
        <?php 
            include("./includes/common/dashboardSidebar.php");
        ?>
        <!-- ============================##== Banner ==##============================ -->

        <!-- ================================ Banner ================================ -->
        <div class="flex flex-1 flex-col p-3">
            <h1 class="text-center my-6 text-3xl italic font-semibold">Dashboard</h1>
            <div class="flex-1 flex items-center justify-center h-full">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-10">
                    <div class="shadow-lg rounded py-4 px-6 bg-violet-200 md:w-72 w-full">
                        <h2 class="text-2xl font-semibold">Total Orders</h2>
                        <h1 class="text-7xl font-bold my-5"><?= $totalOrders;?></h1>
                        <a href="./orders.php" class="py-1 px-3 rounded bg-violet-700 text-slate-50 italic hover:bg-violet-500 transition-all">See All Orders</a>
                    </div>
                    <div class="shadow-lg rounded py-4 px-6 bg-teal-200 md:w-72 w-full">
                        <h2 class="text-2xl font-semibold">Total Services</h2>
                        <h1 class="text-7xl font-bold my-5"><?= $totalServices; ?></h1>
                        <a href="./services.php" class="py-1 px-3 rounded bg-teal-700 text-slate-50 italic hover:bg-teal-500 transition-all">See All Services</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================##== Banner ==##============================ -->

    </main>


<?php include("./includes/common/footer.php") ?>