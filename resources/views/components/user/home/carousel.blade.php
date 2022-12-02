<div class="swiper mySwiper">
  <div class="swiper-logo">
    <div class="w-full justify-center items-center md:text-left">
      <img class="lg:transform lg:scale-125 w-48 md:w-48" src="{{ asset('storage/admin/school-images/school-logo.png') }}" />
    </div>
  </div>
    <div class="swiper-wrapper">
      <div class="swiper-slide h-96">
        <img
          class="object-cover block w-full lg:object-cover h-96 z-0 "
          src="{{ asset('storage/admin/school-images/school-pic1.jpg') }}"
          alt="apple watch photo"
        />
        <x-user.home.svg-wave></x-user.home.svg-wave>
      </div>
      <div class="swiper-slide h-96">
        <img
          class="object-cover block w-full lg:object-cover h-96 z-0"
          src="{{ asset('storage/admin/school-images/school-pic2.jpg') }}"
          alt="apple watch photo"
        />
        <x-user.home.svg-wave></x-user.home.svg-wave>
      </div>
      <div class="swiper-slide h-96">
        <img
          class="object-cover block w-full lg:object-cover h-96 z-0"
          src="{{ asset('storage/admin/school-images/school-pic3.jpg') }}"
          alt="apple watch photo"
        />
        <x-user.home.svg-wave></x-user.home.svg-wave>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
   
  </div>
  

  

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.mySwiper', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>