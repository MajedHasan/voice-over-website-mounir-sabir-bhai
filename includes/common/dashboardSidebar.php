
<div class="w-full lg:max-w-[200px] max-w-[150px] bg-slate-50 flex flex-col gap-2 items-center py-6 px-3 border-r">
    <a href="./dashboard.php" class="py-2 border-b w-full text-center <?= $currentPage == "Dashboard" ? 'bg-violet-500 text-slate-50' : '' ?>">Dashboard</a>
    <a href="./services.php" class="py-2 border-b w-full text-center <?= $currentPage == "Services" ? 'bg-violet-500 text-slate-50' : '' ?>">Services</a>
    <a href="./orders.php" class="py-2 border-b w-full text-center <?= $currentPage == "Orders" ? 'bg-violet-500 text-slate-50' : '' ?>">Orders</a>
</div>