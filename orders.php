<?php 
    $pageTitle = "Orders | #1 Voice Over Marketplace";
    $currentPage = "Orders";

    $pageStyleSheets = '';
    $pageScripts = '';

    include("./includes/common/header.php");

    $uid = $loggedInUser['id'];
    $query = "SELECT o.*, s.name as service_name
          FROM orders o
          LEFT JOIN services s ON o.service_id = s.id
          WHERE o.uid = '$uid' ";
    $result = $conn->query($query);

?>


    <main class="flex w-full min-h-screen h-full">
        <!-- ================================ Banner ================================ -->
        <?php 
            include("./includes/common/dashboardSidebar.php");
        ?>
        <!-- ============================##== Banner ==##============================ -->

        <!-- ================================ Banner ================================ -->
        <div class="flex flex-1 flex-col p-3">
            <h1 class="text-center my-6 text-3xl italic font-semibold"><span class="text-violet-400">O</span>rders</h1>
            <div>

                <div class="overflow-x-auto">
                    <div class="min-w-[700px]">
                        <table class="table-auto w-full table-xs table-pin-rows table-pin-cols">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Service</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Whats App</th>
                                    <th>Message</th>
                                    <th>Payment Type</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th><?= $row['id'] ?></th> 
                                                <td><?= $row['service_name'] ?></td>
                                                <td><?= $row['name'] ?></td> 
                                                <td><?= $row['email'] ?></td> 
                                                <td><?= $row['whats_app'] ?></td> 
                                                <td><?= $row['message'] ?></td> 
                                                <td><?= $row['payment_type'] ?></td> 
                                                <td>$<span class="text-yellow-600 font-semibold text-xl"><?= $row['price'] ?></span>dh</td>
                                                <th class="text-teal-600"><?= $row['status'] ?></th> 
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <tr>
                                                <td colspan="9"><p class="text-center text-xl font-bold text-red-500">No Order Found!</p></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Service</th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>Last Login</th>
                                    <th>Favorite Color</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================##== Banner ==##============================ -->

    </main>


<?php include("./includes/common/footer.php") ?>