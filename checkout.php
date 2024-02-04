<?php 
    $pageTitle = "Checkout | #1 Voice Over Marketplace";
    $currentPage = "Checkout";

    $pageScripts = '
                <script src="./assets/js/checkout.js"></script>
    ';

    $service_id = $_GET['service_id'] ? $_GET['service_id'] : header("Location: /");

    include("./includes/common/header.php");
?>


    <!-- ================================ Banner ================================ -->
    <section id="signup" class="my-10">
        <div class="container mx-auto md:px-0 px-2">
            <h1 class="italic font-bold text-3xl text-center mb-4">Checkout</h1>
            <div class="flex xl:flex-row flex-col gap-x-6 gap-y-10 justify-between">
                <div id="serviceContainer" class="flex-1">

                </div>
                <form id="checkoutForm" class="flex-1 mx-auto bg-slate-200 rounded-lg shadow py-6 px-5 grid lg:grid-cols-2 grid-cols-1 gap-5">
                    <input type="hidden" name="uid" id="uid" value="<?= $loggedInUser['id']; ?>">
                    <input type="hidden" name="service_id" id="service_id" value="<?= $service_id; ?>">
                    <input type="hidden" name="price" id="price" value="<?= $service_id; ?>">
                    <div class="flex flex-col gap-1">
                        <label for="" class="text-sm">Name</label>
                        <input type="text" name="name" class="flex w-full rounded py-2 pl-2">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="" class="text-sm">Email</label>
                        <input type="text" name="email" class="flex w-full rounded py-2 pl-2">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="" class="text-sm">What's App</label>
                        <input type="text" name="whatsapp" class="flex w-full rounded py-2 pl-2">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="" class="text-sm">Language</label>
                        <select name="language" id="" class="flex w-full rounded py-2 px-2">
                            <option value="4">Arabic</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="" class="text-sm">Your text for recording</label>
                        <textarea name="textForRecording" id="" cols="30" rows="4" class="flex w-full rounded py-2 px-2"></textarea>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="" class="text-sm flex items-center justify-between"><span>Payment Type</span> <span class="text-xs text-[#711b76]">Get 10% Discount if you pay with card</span></label>
                        <div class="flex items-center gap-2 rounded border-2 border-[#711b76] justify-between">
                            <label for="cod" class="cursor-pointer flex-1 text-center py-2 font-semibold bg-[#711b76] text-slate-50" id="COD-btn">
                                COD
                                <input type="radio" name="payment_type" id="cod" value="COD" onclick="showContent('cod')" hidden checked>
                            </label>
                            <label for="card" class="cursor-pointer flex-1 text-center py-2 font-semibold" id="Card-btn">
                                Card
                                <input type="radio" name="payment_type" id="card" value="Card" onclick="showContent('card')" hidden>
                            </label>
                        </div>
                    </div>
                    <div class="col-span-2" id="paymentContent">
                    </div>
                    <button type="submit" class="py-2 px-5 rounded text-center w-full col-span-2 border border-[#711b76] bg-[#711b76] text-slate-50 hover:bg-[#df98e8]">Pay Now</button>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================##== Banner ==##============================ -->


    <!-- ================================ Header ================================ -->
    <!-- ============================##== Header ==##============================ -->

<?php include("./includes/common/footer.php") ?>