    <!--Replace with your tailwind.css once created-->
    <script src="https://kit.fontawesome.com/d00886c359.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
      />
      <meta name="csrf-token" content="{{ csrf_token() }}" /> 

    {{-- For google charts --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Html2Canvas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.tailwindcss.com"></script>
      <script>
        tailwind.config = {
            theme: {
                screens: {
                          sm: '360px',
                          md: '768px',
                          lg: '976px',
                          xl: '1440px',
                        },
                extend: {
                    colors: {
                    primary: 'hsl(46, 100%, 50%)', // #ffc300
                    primaryLight: 'hsl(46, 100%, 80%)', 	// #ffe799
                    primaryDark: 'hsl(46, 100%, 45%)', //	#e6b000
                    secondary: 'hsl(219, 46%, 24%)',  // #213559
                    secondaryLight:  'hsl(218, 31%, 31%)', // #374968
                            }
                        },
                    },
                 };
      </script>

<style>
    #tsum-tabs h1 {
      padding: 50px 0;
      font-weight: 400;
      text-align: center;
    }
    
    #tsum-tabs p {
      margin: 0 0 20px;
      line-height: 1.5;
    }
    
    #tsum-tabs main {
      padding: 30px;
      margin: 0 auto;
      background: #fff;
      text-align: center;
    }
    
    #tsum-tabs section {
      display: none;
      padding: 20px 0 0;
      border-top: 1px solid #ddd;
    }
    
    #tsum-tabs input {
      display: none;
    }
    
    #tsum-tabs label {
      display: inline-block;
      margin: 0 0 -1px;
      padding: 15px 25px;
      font-weight: 600;
      text-align: center;
      color: #bbb;
      border: 1px solid transparent;
    }
    
    #tsum-tabs label:before {
      font-family: fontawesome;
      font-weight: normal;
      margin-right: 10px;
    }
    
    #tsum-tabs label:hover {
      color: #888;
      cursor: pointer;
    }
    
    #tsum-tabs input:checked + label {
      color: #555;
      border: 1px solid #ddd;
      border-top: 2px solid #ffc300 ;
      border-bottom: 1px solid #fff;
    }
    
    #tsum-tabs #tab1:checked ~ #content1,
    #tsum-tabs #tab2:checked ~ #content2,
    #tsum-tabs #tab3:checked ~ #content3,
    #tsum-tabs #tab4:checked ~ #content4 {
      display: block;
    }
    
    @media screen and (max-width: 750px) {
      #tsum-tabs label {
        font-size: 15px;
        font-weight: 700;
      }
  
      #tsum-tabs main {
        margin-top: 20px;
        padding: 10px;
      }
      
      #tsum-tabs label:before {
        margin: 0;
        font-size: 18px;
      }
    }
    
    @media screen and (max-width: 480px) {
      #tsum-tabs main {
        margin-top: 20px;
        padding: 10px;
      }
      #tsum-tabs label {
        padding: 10px;
      }
    }
</style>

      <!-- Main Menu Hero Content -->
      {{-- <div
        class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
        style="background-image: url('{{ asset('images/canteen-img.jpg') }}')">
       
      </div> --}}
      <!-- End Main Menu Hero Content -->
      <br><br><br>
      
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold">NSDAPS Canteen</h3>
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-primaryDark">
            TODAY'S MENU</h2>
        </div>
    
    </section>
      
    <div id="tsum-tabs" class="flex flex-row">
    
      <main class="float left">
        
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1">Rice Meals</label>
          
        <input id="tab2" type="radio" name="tabs">
        <label for="tab2">Snacks</label>
          
        <input id="tab3" type="radio" name="tabs">
        <label for="tab3">Drinks</label>
          
        <input id="tab4" type="radio" name="tabs">
        <label for="tab4">Others</label>

        {{-- Rice Meals --}}
        <x-user.cards.card-tabs.card-tab-riceMeal>
            @foreach($foods as $food)
                @if($food->type == 3)
                    <x-user.pos.pos-foodcard :food="$food" />   
                @endif
            @endforeach
          </x-user.cards.card-tabs.card-tab-riceMeal>

          <x-user.cards.card-tabs.card-tab-fried>
            @foreach($foods as $food)
                @if($food->type == 2)
                    <x-user.pos.pos-foodcard :food="$food" />  
                @endif
            @endforeach
          </x-user.cards.card-tabs.card-tab-fried>

          <x-user.cards.card-tabs.card-tab-drinks>
            @foreach($foods as $food)
                @if($food->type == 1)
                    <x-user.pos.pos-foodcard :food="$food" />  
                @endif
            @endforeach
          </x-user.cards.card-tabs.card-tab-drinks>

          <x-user.cards.card-tabs.card-tab-snacks>
            @foreach($foods as $food)
                @if($food->type == 0)
                    <x-user.pos.pos-foodcard :food="$food" />  
                @endif
            @endforeach
          </x-user.cards.card-tabs.card-tab-snacks>
    
  
      </main>
      <x-user.pos.sidebar-cart />
    </div>

{{-- Sweet Alert Scripts --}}
<script>

    //Add to cart
    window.addEventListener('show-add2cart-success', event => {
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Added to cart!',
        showConfirmButton: false,
        timer: 700
        })
    });
</script>


<script>

  //For add to cart button
  $(document).on('click', 'button[id^="cart"]',  function(e){
        e.preventDefault();

        var food_id = $(this).val();

        console.log(food_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: 'add-to-cart',
            data: {"food-id":food_id},
            success: function(response){
                //window.location.reload();
                $('.sideBar').load(location.href + " .sideBar");
                $('.subTotal').load(location.href + " .subTotal");
                $('.checkout').load(location.href + " .checkout");
                

            }
        })
    });
    
  //For add button
  $(document).on('click', 'button[id^="add"]',  function(e){
      e.preventDefault();

      var food_id = $(this).val();

      console.log(food_id);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          method: "POST",
          url: "update-cart-add",
          data: {"food-id":food_id},
          success: function(response){
              //window.location.reload();
              $('.sideBar').load(location.href + " .sideBar");
              $('.subTotal').load(location.href + " .subTotal");
              $('.checkout').load(location.href + " .checkout");

          }
      })
  });

  //For minus button
  $(document).on('click', 'button[id^="minus"]',  function(e){
      e.preventDefault();

      var food_id = $(this).val();
      console.log(food_id);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          method: "POST",
          url: "update-cart-minus",
          data: {"food-id":food_id},
          success: function(response){
              //window.location.reload();
              $('.sideBar').load(location.href + " .sideBar");
              $('.subTotal').load(location.href + " .subTotal");
              $('.checkout').load(location.href + " .checkout");

          }
      })
  });

  //For delete button
  $(document).on('click', 'button[id^="del"]',  function(e){
      e.preventDefault();

      var food_id = $(this).val();
      console.log(food_id);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          method: "POST",
          url: "update-cart-delete",
          data: {"food-id":food_id},
          success: function(response){
              //window.location.reload();
              $('.sideBar').load(location.href + " .sideBar");
              $('.subTotal').load(location.href + " .subTotal");
              $('.checkout').load(location.href + " .checkout");

          }
      })
  });

</script>
  
    
