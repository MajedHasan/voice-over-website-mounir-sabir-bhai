<?php 
    $pageTitle = "Contact | #1 Voice Over Marketplace";
    $currentPage = "Contact";

    $pageStyleSheets = '';
    $pageScripts = '
                <script src="./assets/js/contact.js"></script>    
    ';

    include("./includes/common/header.php");
    
?>


    <!-- ================================ Category Container ================================ -->
    <section id="offer" class="my-10">
        <div class="container mx-auto lg:px-0 px-2 xl:max-w-[1240px] overflow-hidden ">
            <h1 class="text-center italic font-bold xl:text-4xl text-2xl"><span class="text-[#df98e8]">C</span>ontact</h1>
            <div class="lg:max-w-[700px] mx-auto rounded bg-slate-100 py-8 px-7 my-8">
                <form action="" id="contactForm" class="flex w-full flex-col gap-4">
                    <input type="hidden" name="contactType" value="contact" >
                    <input type="text" name="name" class="w-full bg-slate-50 rounded outline-none p-2 border-[4px]" placeholder="Name">
                    <input type="email" name="email" class="w-full bg-slate-50 rounded outline-none p-2 border-[4px]" placeholder="Email">
                    <input type="number" name="number" class="w-full bg-slate-50 rounded outline-none p-2 border-[4px]" placeholder="Number">
                    <input type="text" name="subject" class="w-full bg-slate-50 rounded outline-none p-2 border-[4px]" placeholder="Subject">
                    <textarea name="message" id="" cols="30" rows="5" class="w-full bg-slate-50 rounded outline-none p-2 border-[4px]" placeholder="Message"></textarea>
                    <button type="submit" class="py-2 px-7 rounded bg-[#711b76] text-white text-lg italic">SUBMIT</button>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================##== Category Container ==##============================ -->


<?php include("./includes/common/footer.php") ?>