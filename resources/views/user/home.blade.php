
<x-user.layout :studs="$students" :notifs="$notifications">
    
        <x-user.home.carousel></x-test.user.home.carousel>

        <!-- Hero section starts -->
        <x-user.home.hero-section></x-test.user.home.hero-section>
        <x-user.home.gallery></x-test.user.home.gallery>
        <x-user.home.infographic-head :image="$image"></x-test.user.home.infographic-head>

</x-user.layout>

<script type="text/javascript">
    const mobile_icon = document.getElementById('mobile-icon');
    const mobile_menu = document.getElementById('mobile-menu');
    const hamburger_icon = document.querySelector("#mobile-icon i");

    function openCloseMenu() {
    mobile_menu.classList.toggle('block');
    mobile_menu.classList.toggle('active');
    }

    function changeIcon(icon) {
    icon.classList.toggle("fa-xmark");
    }

    mobile_icon.addEventListener('click', openCloseMenu);


</script>
<!-- change icon border -->
<script type="text/javascript">
  function changeMyColor() { 
  var button = document.getElementById('mobile-icon'); 
  button.classList.toggle('blueColor'); 
} 



</script>