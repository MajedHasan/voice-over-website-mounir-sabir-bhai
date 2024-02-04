<?php 
    $pageTitle = "LogIn | #1 Voice Over Marketplace";
    $currentPage = "Login";

    $pageScripts = '
                <script src="./assets/js/login.js"></script>
    ';

    include("./includes/common/header.php");
?>


    <!-- ================================ Banner ================================ -->
    <section id="signup" class="my-24">
        <div class="container mx-auto md:px-0 px-2">
            <div class="max-w-[500px] w-full mx-auto bg-gradient-to-r from-sky-100 via-purple-100 to-teal-100 rounded-lg shadow py-6 px-5">
                <form action="" id="loginForm">
                    <h1 class="text-3xl font-bold italic uppercase text-center text-sky-700">Log In</h1>
                    <div class="group w-full  relative mt-5">
                        <label for="" class="text-slate-500">Email</label>
                        <input type="text" name="email" class="w-full bg-transparent outline-none border-2 border-sky-600 py-2 px-3 rounded">
                    </div>
                    <div class="group w-full  relative mt-5">
                        <label for="" class="text-slate-500">Password</label>
                        <input type="text" name="password" class="w-full bg-transparent outline-none border-2 border-sky-600 py-2 px-3 rounded">
                    </div>
                    <div class="group w-full  relative mt-5">
                        <button type="submit" class="w-full border-2 border-sky-700 bg-sky-700 text-white hover:bg-slate-100 hover:text-sky-700 font-bold text-lg rounded py-2 px-5">LOG IN</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================##== Banner ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->

<?php include("./includes/common/footer.php") ?>