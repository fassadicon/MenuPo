


<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">

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
          padding: 50px;
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
        #tsum-tabs #tab4:checked ~ #content4,
        #tsum-tabs #tab5:checked ~ #content5 {
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
          <div
            class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
            style="background-image: url('{{ asset('storage/admin/school-images/canteen-img.jpg') }}')">
           
          </div>
          <!-- End Main Menu Hero Content -->
          
          <section class="mt-8 bg-white">
            <div class="mt-4 text-center">
              <h3 class="text-2xl font-bold">NSDAPS Canteen</h3>
              <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-primaryDark">
                TODAY'S MENU</h2>
                {{-- @livewire('cart-counter', ['anak_id' => $anak->id]) --}}
                <a class="cart-counter" href="/user/cart-summary/{{$anak[0]->id}}" >
                  <button class="button-hero mt-2">
                    <span class=cart-title>My Cart</span>
                    @if (Cart::count() != 0)
                        <span class="bg-red-500 px-2 rounded-full ">
                            @php
                                echo Cart::count();
                            @endphp
                        </span>
                    @endif
                  </button>
                  
                </a>
            </div>
            
            
          </section>
          
          <div id="tsum-tabs" class="foods">
        
          <main>
            
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">Rice Meals</label>

            <input id="tab5" type="radio" name="tabs">
            <label for="tab5">Pasta & Porridge</label>
              
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
                      <x-user.cards.food-card :food="$food" :anak="$anak[0]" :studs="$students" :restricts="$restricts"/>   
                  @endif
              @endforeach
            </x-user.cards.card-tabs.card-tab-riceMeal>

            {{-- Pasta & Porridge Meals --}}
            <x-user.cards.card-tabs.card-tab-pasta>
              @foreach($foods as $food)
                  @if($food->type == 4)
                      <x-user.cards.food-card :food="$food" :anak="$anak[0]" :studs="$students" :restricts="$restricts"/>   
                  @endif
              @endforeach
            </x-user.cards.card-tabs.card-tab-pasta>

            <x-user.cards.card-tabs.card-tab-fried>
              @foreach($foods as $food)
                  @if($food->type == 2)
                      <x-user.cards.food-card :food="$food" :anak="$anak[0]" :studs="$students" :restricts="$restricts"/>  
                  @endif
              @endforeach
            </x-user.cards.card-tabs.card-tab-fried>

            <x-user.cards.card-tabs.card-tab-drinks>
              @foreach($foods as $food)
                  @if($food->type == 1)
                      <x-user.cards.food-card :food="$food" :anak="$anak[0]" :studs="$students" :restricts="$restricts"/>  
                  @endif
              @endforeach
            </x-user.cards.card-tabs.card-tab-drinks>
  
            <x-user.cards.card-tabs.card-tab-snacks>
              @foreach($foods as $food)
                  @if($food->type == 0)
                      <x-user.cards.food-card :food="$food" :anak="$anak[0]" :studs="$students" :restricts="$restricts"/>  
                  @endif
              @endforeach
            </x-user.cards.card-tabs.card-tab-snacks>

          </main>
          </div>
      
        
       
      
      
</x-user.layout>

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
            url: 'addtocart',
            data: {"food-id":food_id},
            success: function(response){
              //window.location.reload();
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Added to cart!',
                showConfirmButton: false,
                timer: 700
              });
              $('.cart-counter').load(location.href + " .cart-counter");
              
            }
        })
    });

  //For add to restrict
  $(document).on('click', 'button[id^="restrict"]',  function(e){
        e.preventDefault();

        var food_id = $(this).val();
        var stud_id = document.getElementById('anak-id').value;

        console.log(stud_id);
        console.log(food_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: 'addtorestrict',
            data: {"food-id":food_id, "anak-id":stud_id},
            success: function(response){
              //window.location.reload();
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Added to restrict!',
                showConfirmButton: false,
                timer: 700
              });
              $('.foods').load(location.href + " .foods");
              
            }
        })
    });
</script>