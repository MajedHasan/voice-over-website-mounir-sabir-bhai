
    <!-- ================================ Footer ================================ -->
    <footer id="footer" class="bg-[#711b76] py-14 lg:px-0 px-4">
        <div class="flex md:flex-row flex-col gap-10 container mx-auto xl:max-w-[1240px] mb-6">
            <div class="flex-1">
                <a href="/" class="text-4xl text-white font-bold italic mb-8 block">Voices</a>
                <p class="text-white text-md leading-5 italic block">Voices is the world’s #1 voice marketplace with over 4 million members. Since 2005, the biggest and most beloved brands have trusted Voices to help them find professional voice talent to bring their projects to life.</p>
            </div>
            <div class="flex-1">
                <h2 class="text-white text-2xl font-bold">Company</h2>
                <ul class="mt-8 flex flex-col gap-3">
                    <li>
                        <a href="/" class="text-white ">Home</a>
                    </li>
                    <li>
                        <a href="/contact.php" class="text-white ">Contact</a>
                    </li>
                    <li>
                        <a href="/contact.php" class="text-white ">Talent</a>
                    </li>
                    <li>
                        <a href="/contact.php" class="text-white ">Work</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <h2 class="text-white text-2xl font-bold">Company</h2>
            </div>
        </div>
        <div class="flex items-center justify-between flex-col md:flex-row container mx-auto xl:max-w-[1240px] py-5 border-y border-y-slate-50">
            <p class="text-white text-sm">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Voices.com Inc</p>
            <p class="text-white text-sm">Developed By <a href="https://madconsolution.com" target="_blank" class="font-bold italic text-teal-400">madconsolution</a></p>
        </div>
    </footer>
    <!-- ============================##== Footer ==##============================ -->


    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind CSS Not CDN -->
    <script src="/assets/js/tailwind.js"></script>

    <!-- Mobile Menu Script -->
    <script src="/assets/js/mobile-menu.js"></script>


    <!-- Swiper JS CDN -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Toastify JS CDN -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <?php

        if(isset($pageScripts) && $pageScripts != ""){
            echo $pageScripts;
        }
    
        if($currentPage = "Home"){
            echo "
                <script>
                    // Initialize Swiper
                    var mySwiper = new Swiper('.swiper-container', {
                        // Default configuration for larger screens
                        slidesPerView: 2,
                        spaceBetween: 8,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        // Responsive breakpoints
                        breakpoints: {
                            // When window width is <= 767px (mobile)
                            449: {
                                slidesPerView: 3,
                                spaceBetween: 10,
                                slidesPerGroup: 2,
                            },
                            // When window width is <= 767px (mobile)
                            549: {
                                slidesPerView: 4,
                                spaceBetween: 12,
                                slidesPerGroup: 2,
                            },
                            // When window width is <= 767px (mobile)
                            767: {
                                slidesPerView: 5,
                                spaceBetween: 15,
                                slidesPerGroup: 2,
                            },
                            // When window width is <= 767px (mobile)
                            991: {
                                slidesPerView: 6,
                                spaceBetween: 20,
                                slidesPerGroup: 2,
                            },
                            // When window width is <= 767px (mobile)
                            1024: {
                                slidesPerView: 7,
                                spaceBetween: 25,
                                slidesPerGroup: 2,
                            },
                            // When window width is <= 767px (mobile)
                            1240: {
                                slidesPerView: 8,
                                spaceBetween: 25,
                                slidesPerGroup: 2,
                            },
                            // When window width is <= 767px (mobile)
                            1440: {
                                slidesPerView: 8,
                                spaceBetween: 30,
                                slidesPerGroup: 2,
                            },
                        },
                        // Change slides per click
                        slidesPerGroup: 1,
                    });

                    // Initialize Swiper
                    var bannerSwiper = new Swiper('.banner-slider', {
                        // Default configuration for larger screens
                        slidesPerView: 1,
                        spaceBetween: 30,
                        autoplay: {
                            duration: 1000
                        },
                        navigation: {
                            nextEl: '.banner-slider-button-next',
                            prevEl: '.banner-slider-button-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true, // Enables clickable pagination bullets
                        },
                        slidesPerGroup: 1,
                    });

                    // Initialize Swiper
                    var trustUsSwiper = new Swiper('.trust-us-slider', {
                        // Default configuration for larger screens
                        slidesPerView: 1,
                        spaceBetween: 8,
                        loop: true,
                        autoplay: {
                            delay: 1000, // Set the delay in milliseconds
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        // Responsive breakpoints
                        breakpoints: {
                            // When window width is <= 767px (mobile)
                            449: {
                                slidesPerView: 2,
                                spaceBetween: 12,
                            },
                            // When window width is <= 767px (mobile)
                            549: {
                                slidesPerView: 3,
                                spaceBetween: 15,
                            },
                            // When window width is <= 767px (mobile)
                            767: {
                                slidesPerView: 4,
                                spaceBetween: 20,
                            },
                            // When window width is <= 767px (mobile)
                            991: {
                                slidesPerView: 5,
                                spaceBetween: 25,
                            },
                            // When window width is <= 767px (mobile)
                            1240: {
                                slidesPerView: 6,
                                spaceBetween: 30,
                            },
                        },
                    });

                </script>
            ";
        }

    ?>


    <!-- APP Scripts -->
    <script src="./assets/js/app.js"></script>


</body>
</html>