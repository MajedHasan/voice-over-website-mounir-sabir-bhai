
<div class="w-[200px] border-r border-r-2 h-full flex flex-col gap-3 py-5 px-3">
    <a href="/dashboard" class="py-3 border-b pl-5 <?= $currentPage == 'Dashboard' ? 'bg-violet-500 text-slate-50' : '' ?>">Dashboard</a>
    <a href="/dashboard/services.php" class="py-3 border-b pl-5 <?= $currentPage == 'Services' ? 'bg-violet-500 text-slate-50' : '' ?>">Services</a>
    <a href="/dashboard/orders.php" class="py-3 border-b pl-5 <?= $currentPage == 'Orders' ? 'bg-violet-500 text-slate-50' : '' ?>">Orders</a>
    <a href="/dashboard/blogs.php" class="py-3 border-b pl-5 <?= $currentPage == 'Blogs' ? 'bg-violet-500 text-slate-50' : '' ?>">Blogs</a>
    <a href="/dashboard/contact.php" class="py-3 border-b pl-5 <?= $currentPage == 'Contact' ? 'bg-violet-500 text-slate-50' : '' ?>">Contact</a>
</div>