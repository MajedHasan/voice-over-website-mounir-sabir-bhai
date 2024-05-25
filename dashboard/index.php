<?php 

    $pageTitle = "Dashboard";
    $currentPage = "Dashboard";

    include("../includes/admin/header.php");

    $query = "SELECT * FROM orders ";
    $orders = $conn->query($query);
    $totalOrders = $orders->num_rows;

    $query = "SELECT * FROM services";
    $services = $conn->query($query);
    $totalServices = $services->num_rows;

    $query = "SELECT * FROM users";
    $users = $conn->query($query);
    $totalUsers = $users->num_rows;

    $query = "SELECT * FROM blogs";
    $blogs = $conn->query($query);
    $totalBlogs = $blogs->num_rows;

    $query = "SELECT * FROM contact WHERE contact_type = 'contact' ";
    $contact = $conn->query($query);
    $totalContact = $contact->num_rows;

    $query = "SELECT * FROM contact WHERE contact_type = 'work with me' ";    
    $workWithMe = $conn->query($query);
    $totalWorkWithMe = $workWithMe->num_rows;

?>

    <div class="flex-1 h-full flex justify-center items-center">
        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-10 justify-center">
            <div class="shadow-lg rounded py-4 px-6 bg-violet-200 md:w-72 w-full">
                <h2 class="text-2xl font-semibold">Total Orders</h2>
                <h1 class="text-7xl font-bold my-5"><?= $totalOrders;?></h1>
                <a href="./dashboard/orders.php" class="py-1 px-3 rounded bg-violet-700 text-slate-50 italic hover:bg-violet-500 transition-all">See All Orders</a>
            </div>
            <div class="shadow-lg rounded py-4 px-6 bg-teal-200 md:w-72 w-full">
                <h2 class="text-2xl font-semibold">Total Services</h2>
                <h1 class="text-7xl font-bold my-5"><?= $totalServices; ?></h1>
                <a href="./dashboard/services.php" class="py-1 px-3 rounded bg-teal-700 text-slate-50 italic hover:bg-teal-500 transition-all">See All Services</a>
            </div>
            <div class="shadow-lg rounded py-4 px-6 bg-pink-200 md:w-72 w-full">
                <h2 class="text-2xl font-semibold">Total Users</h2>
                <h1 class="text-7xl font-bold my-5"><?= $totalUsers;?></h1>
                <a href="./dashboard/orders.php" class="py-1 px-3 rounded bg-pink-700 text-slate-50 italic hover:bg-violet-500 transition-all">See All Users</a>
            </div>
            <div class="shadow-lg rounded py-4 px-6 bg-yellow-200 md:w-72 w-full">
                <h2 class="text-2xl font-semibold">Total Blogs</h2>
                <h1 class="text-7xl font-bold my-5"><?= $totalBlogs; ?></h1>
                <a href="./dashboard/blogs.php" class="py-1 px-3 rounded bg-yellow-700 text-slate-50 italic hover:bg-teal-500 transition-all">See All Blogs</a>
            </div>
            <div class="shadow-lg rounded py-4 px-6 bg-sky-200 md:w-72 w-full">
                <h2 class="text-2xl font-semibold">Total Contact</h2>
                <h1 class="text-7xl font-bold my-5"><?= $totalContact; ?></h1>
                <a href="./dashboard/blogs.php" class="py-1 px-3 rounded bg-sky-700 text-slate-50 italic hover:bg-teal-500 transition-all">See All Blogs</a>
            </div>
            <div class="shadow-lg rounded py-4 px-6 bg-indigo-200 md:w-72 w-full">
                <h2 class="text-2xl font-semibold">Total Work With Me</h2>
                <h1 class="text-7xl font-bold my-5"><?= $totalWorkWithMe; ?></h1>
                <a href="./dashboard/blogs.php" class="py-1 px-3 rounded bg-indigo-700 text-slate-50 italic hover:bg-teal-500 transition-all">See All Blogs</a>
            </div>
        </div>
    </div>

<?php 
    include("../includes/admin/footer.php");
?>