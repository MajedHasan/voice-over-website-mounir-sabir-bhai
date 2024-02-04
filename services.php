<?php 
    $pageTitle = "Services | #1 Voice Over Marketplace";
    $currentPage = "Services";

    $pageStyleSheets = '';
    $pageScripts = '
                <script src="./assets/js/users/services.js"></script>
    ';

    include("./includes/common/header.php");

?>


    <main class="flex w-full min-h-screen h-full">
        <!-- ================================ Banner ================================ -->
        <?php 
            include("./includes/common/dashboardSidebar.php");
        ?>
        <!-- ============================##== Banner ==##============================ -->

        <!-- ================================ Banner ================================ -->
        <div class="flex flex-1 flex-col p-3">
            <h1 class="text-center my-6 text-3xl italic font-semibold"><span class="text-violet-400">S</span>ervices</h1>
            <input type="hidden" name="page" id="page" value="1">
            <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-7 py-5 px-4" id="service-container">
                <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200 flex items-center justify-center">
                    <a href="./addservice.php" class="md:w-44 w-full md:h-44 w-full bg-teal-600 flex items-center justify-center cursor-pointer rounded-full">
                        <i class="fa-solid fa-plus md:text-7xl text-3xl text-slate-50"></i>
                    </a>
                </div>
                <!-- <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
                    <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="w-full max-h-[200px] object-cover">
                    <div class="py-2">
                        <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">Voice For Ummah</h2>
                        <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                        <div class="flex w-full items-center justify-between gap-3 md:flex-row flex-col">
                            <div class="flex-1 py-3">
                                <div>
                                    <p class="text-xs text-violet-400 border-b">Category:</p>
                                    <p class="italic text-sm">Audio</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div>
                                    <p class="text-sm text-violet-400 border-b">Language:</p>
                                    <p class="italic text-sm">Arabic</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">Majed Hasan</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">mdmajedhasan599@gmail.com</span></p>
                        </div>
                        <audio src="./assets/voices/demo/demo-1.mp3" controls class="bg-violet-500 p-2 rounded-3xl"></audio>
                    </div>
                </div>
                <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
                    <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="w-full max-h-[200px] object-cover">
                    <div class="py-2">
                        <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">Voice For Ummah</h2>
                        <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                        <div class="flex w-full items-center justify-between gap-3 md:flex-row flex-col">
                            <div class="flex-1 py-3">
                                <div>
                                    <p class="text-xs text-violet-400 border-b">Category:</p>
                                    <p class="italic text-sm">Audio</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div>
                                    <p class="text-sm text-violet-400 border-b">Language:</p>
                                    <p class="italic text-sm">Arabic</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">Majed Hasan</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">mdmajedhasan599@gmail.com</span></p>
                        </div>
                        <audio src="./assets/voices/demo/demo-1.mp3" controls class="bg-violet-500 p-2 rounded-3xl"></audio>
                    </div>
                </div>
                <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
                    <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="w-full max-h-[200px] object-cover">
                    <div class="py-2">
                        <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">Voice For Ummah</h2>
                        <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                        <div class="flex w-full items-center justify-between gap-3 md:flex-row flex-col">
                            <div class="flex-1 py-3">
                                <div>
                                    <p class="text-xs text-violet-400 border-b">Category:</p>
                                    <p class="italic text-sm">Audio</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div>
                                    <p class="text-sm text-violet-400 border-b">Language:</p>
                                    <p class="italic text-sm">Arabic</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">Majed Hasan</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">mdmajedhasan599@gmail.com</span></p>
                        </div>
                        <audio src="./assets/voices/demo/demo-1.mp3" controls class="bg-violet-500 p-2 rounded-3xl"></audio>
                    </div>
                </div>
                <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
                    <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="w-full max-h-[200px] object-cover">
                    <div class="py-2">
                        <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">Voice For Ummah</h2>
                        <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                        <div class="flex w-full items-center justify-between gap-3 md:flex-row flex-col">
                            <div class="flex-1 py-3">
                                <div>
                                    <p class="text-xs text-violet-400 border-b">Category:</p>
                                    <p class="italic text-sm">Audio</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div>
                                    <p class="text-sm text-violet-400 border-b">Language:</p>
                                    <p class="italic text-sm">Arabic</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">Majed Hasan</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">mdmajedhasan599@gmail.com</span></p>
                        </div>
                        <audio src="./assets/voices/demo/demo-1.mp3" controls class="bg-violet-500 p-2 rounded-3xl"></audio>
                    </div>
                </div>
                <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
                    <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="w-full max-h-[200px] object-cover">
                    <div class="py-2">
                        <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">Voice For Ummah</h2>
                        <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                        <div class="flex w-full items-center justify-between gap-3 md:flex-row flex-col">
                            <div class="flex-1 py-3">
                                <div>
                                    <p class="text-xs text-violet-400 border-b">Category:</p>
                                    <p class="italic text-sm">Audio</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div>
                                    <p class="text-sm text-violet-400 border-b">Language:</p>
                                    <p class="italic text-sm">Arabic</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">Majed Hasan</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">mdmajedhasan599@gmail.com</span></p>
                        </div>
                        <audio src="./assets/voices/demo/demo-1.mp3" controls class="bg-violet-500 p-2 rounded-3xl"></audio>
                    </div>
                </div>
                <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
                    <img src="./assets/img/dummy-profile-pic.jpeg" alt="" class="w-full max-h-[200px] object-cover">
                    <div class="py-2">
                        <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">Voice For Ummah</h2>
                        <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                        <div class="flex w-full items-center justify-between gap-3 md:flex-row flex-col">
                            <div class="flex-1 py-3">
                                <div>
                                    <p class="text-xs text-violet-400 border-b">Category:</p>
                                    <p class="italic text-sm">Audio</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div>
                                    <p class="text-sm text-violet-400 border-b">Language:</p>
                                    <p class="italic text-sm">Arabic</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">Majed Hasan</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">mdmajedhasan599@gmail.com</span></p>
                        </div>
                        <audio src="./assets/voices/demo/demo-1.mp3" controls class="bg-violet-500 p-2 rounded-3xl"></audio>
                    </div>
                </div> -->
            </div>
            <div id="pagination" class="flex items-center gap-4 mx-auto mt-7"></div>
        </div>
        <!-- ============================##== Banner ==##============================ -->

    </main>


<?php include("./includes/common/footer.php") ?>