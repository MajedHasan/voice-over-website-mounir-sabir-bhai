<?php 
    $pageTitle = "Add Service | #1 Voice Over Marketplace";
    $currentPage = "Add Service";

    $pageStyleSheets = '';
    $pageScripts = '
                <script src="./assets/js/users/addService.js"></script>
    ';


    include("./includes/common/header.php");

?>



    <!-- ================================ Demo ================================ -->
    <section id="demo" class="py-8">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden">
            <h1 class="text-center italic font-bold text-3xl"><span class="text-[#df98e8]">A</span>dd <span class="text-[#df98e8]">S</span>ervice</h1>
            <form action="" id="addServiceForm" class="grid xl:grid-cols-2 grid-cols-1 gap-10 mx-auto xl:max-w-[991px] max-w-full mt-4">
                <input type="hidden" name="uid" value="<?=$loggedInUser['id']?>">
                <div class="flex flex-col gap-1">
                    <label for="">Name</label>
                    <input type="text" name="name" class="flex-1 rounded border border-slate-500 py-2 pl-4">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Email</label>
                    <input type="email" name="email" class="flex-1 rounded border border-slate-500 py-2 pl-4">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Phone</label>
                    <input type="number" name="number" class="flex-1 rounded border border-slate-500 py-2 pl-4">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Price</label>
                    <input type="number" name="price" class="flex-1 rounded border border-slate-500 py-2 pl-4">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Categories</label>
                    <div class="flex gap-1 rounded bg-slate-50 p-4 shadow-lg flex-wrap" id="categories">
                        <div class="flex items-center gap-2 justify-between bg-slate-200 rounded-full py-1 px-3">
                            <select name="" id="categoriesInput" class="flex-1 bg-transparent" >
                                <option value="Arabic">Audio</option>
                                <option value="Franch">TV</option>
                            </select>
                            <button type="button" id="addCategoryButton" class="flex-1 bg-violet-500 rounded text-slate-50 px-4">Add</button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Languages</label>
                    <div class="flex flex-col gap-4 rounded bg-slate-50 p-4 shadow-lg" id="language">
                        <div class="flex items-center gap-2 justify-between bg-slate-200 rounded-full py-1 px-3">
                            <select name="" id="languageInput" class="flex-1 bg-transparent">
                                <option value="Arabic">Arabic</option>
                                <option value="Franch">Franch</option>
                            </select>
                            <input type="file" class="flex-4" id="voiceInput" placeholder="Add Voice" />
                            <button type="button" id="addLanguageButton" class="flex-1 bg-violet-500 rounded text-slate-50 px-4">Add</button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <button type="submit" class="text-xl py-2 px-7 rounded bg-[#711b76] text-slate-50">Add Service</button>
                </div>
            </form>
        </div>
    </section>
    <!-- ============================##== Demo ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->


<?php include("./includes/common/footer.php") ?>