 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

     <div class="container">
         <div class="row gy-4">
             <div class="col-lg-5 col-md-12 footer-info">
                 <a href="index.html" class="logo d-flex align-items-center">
                     <span>Logis</span>
                 </a>
                 <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
                     darta donna mare fermentum iaculis eu non diam phasellus.</p>

                 <?php
                 $getdata = \App\Models\Socialmedia::where('status', 1)->get();
                 ?>

                 <div class="social-links d-flex mt-4">

                     @if (isset($getdata) && !$getdata->isEmpty())

                         @foreach ($getdata as $key => $v)
                             <a href="{{ $v->link }}" target="_blank" class="{{ $v->title }}"><i
                                     class="{{ $v->icon }}"></i></a>
                         @endforeach

                     @endif
                 </div>

             </div>

             <div class="col-lg-2 col-6 footer-links">
                 <h4>Useful Links</h4>
                 <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About us</a></li>
                     <li><a href="#">Services</a></li>
                     <li><a href="#">Terms of service</a></li>
                     <li><a href="#">Privacy policy</a></li>
                 </ul>
             </div>

             <div class="col-lg-2 col-6 footer-links">
                 <h4>Our Services</h4>
                 <ul>
                     <li><a href="#">Web Design</a></li>
                     <li><a href="#">Web Development</a></li>
                     <li><a href="#">Product Management</a></li>
                     <li><a href="#">Marketing</a></li>
                     <li><a href="#">Graphic Design</a></li>
                 </ul>
             </div>

             <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                 <h4>Contact Us</h4>
                 <p>
                     A108 Adam Street <br>
                     New York, NY 535022<br>
                     United States <br><br>
                     <strong>Phone:</strong> +1 5589 55488 55<br>
                     <strong>Email:</strong> info@example.com<br>
                 </p>

             </div>

         </div>
     </div>

     <div class="container mt-4">
         <div class="copyright">
             <?php
             $getsetting = \App\Models\Setting::first();
             ?>

             @if (isset($getsetting))
                 {{ $getsetting->copyright }}
             @endif

         </div>
     </div>

 </footer><!-- End Footer -->
 <!-- End Footer -->

 <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
         class="bi bi-arrow-up-short"></i></a>

 <div id="preloader"></div>

 <!-- Vendor JS Files -->
 <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
 <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
 <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
 <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>

 <!-- Template Main JS File -->
 <script src="{{ asset('front/assets/js/main.js') }}"></script>

 </body>

 </html>
