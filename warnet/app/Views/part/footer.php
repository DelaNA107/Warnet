<footer class="p-5 md-p-l5 bg-indigo-lightest-10">
    <div class="flex flex-wrap">
        <div class="md-w-25pc mb-10">
            <img src="assets/images/logo.png" class="w-l5" alt="">
            <div class="white opacity-70 fs-s2 mt-4 md-pr-10">
                <p>Soluta voluptate et optio. Eos quasi impedit sapiente aliquid eius eligendi at. Necessitatibus
                    magni et sed quod quas minima.</p>
                <br>
                <p>Soluta voluptate et optio. Eos quasi impedit sapiente aliquid eius eligendi at. Necessitatibus
                    magni et sed quod quas minima.</p>
            </div>
        </div>
        <div class="w-100pc md-w-50pc">
            <div class="flex justify-around">
                <div class="w-33pc md-px-10 mb-10">
                    <h5 class="white">Company</h5>
                    <ul class="list-none mt-5 fs-s2">
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">About
                                Us</a></li>
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">Jobs</a>
                        </li>
                        <li class="my-3"><a href="#"
                                class="white opacity-70 no-underline hover-underline">Contact</a></li>
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">Media</a>
                        </li>
                    </ul>
                </div>
                <div class="w-33pc md-px-10 mb-10">
                    <h5 class="white">Product</h5>
                    <ul class="list-none mt-5 fs-s2">
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">About
                                Us</a></li>
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">Jobs</a>
                        </li>
                        <li class="my-3"><a href="#"
                                class="white opacity-70 no-underline hover-underline">Contact</a></li>
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">Media</a>
                        </li>
                    </ul>
                </div>
                <div class="w-33pc md-px-10 mb-10">
                    <h5 class="white">Support</h5>
                    <ul class="list-none mt-5 fs-s2">
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">About
                                Us</a></li>
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">Jobs</a>
                        </li>
                        <li class="my-3"><a href="#"
                                class="white opacity-70 no-underline hover-underline">Contact</a></li>
                        <li class="my-3"><a href="#" class="white opacity-70 no-underline hover-underline">Media</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100pc md-w-25pc">
            <div class="flex w-75pc md-w-100pc mx-auto">
                <input type="text"
                    class="input flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5 br-r-0"
                    placeholder="Email Address">
                <button class="button bg-indigo indigo-lightest fw-300 fs-s3 br-l-0">Start</button>
            </div>
            <div class="flex justify-around my-8">
                <a href="#" class="relative p-5 bg-indigo br-round white hover-scale-up-1 ease-400"><i
                        data-feather="twitter" class="absolute-center h-4"></i></a>
                <a href="#" class="relative p-5 bg-indigo br-round white hover-scale-up-1 ease-400"><i
                        data-feather="facebook" class="absolute-center h-4"></i></a>
                <a href="#" class="relative p-5 bg-indigo br-round white hover-scale-up-1 ease-400"><i
                        data-feather="instagram" class="absolute-center h-4"></i></a>
            </div>
        </div>
    </div>
</footer>
<a class="fixed top-50pc right-0 p-3 bg-indigo white hover-scale-up-1 ease-300 no-underline" href="https://gum.co/tifJM" target="_blank">
    <i class="w-4" data-feather="download"></i>
    </div>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- jQuery (Wajib untuk Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('success')) : ?>
                toastr.success("<?= session()->getFlashdata('success') ?>");
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                toastr.error("<?= session()->getFlashdata('error') ?>");
            <?php endif; ?>

            <?php if (session()->getFlashdata('warning')) : ?>
                toastr.warning("<?= session()->getFlashdata('warning') ?>");
            <?php endif; ?>
        });
    </script>

    <script src="<?= base_url('template/assets/js/script.js') ?>"></script>