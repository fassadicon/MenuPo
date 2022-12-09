
@props(['food'])
@props(['studs'])
@props(['restricts'])
@props(['anak'])


  <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
    <div class="relative flex mb-2">
      <img class="w-full h-48" src="{{ $food->image ? asset('storage/' . $food->image) : asset('storage/admin/userNoImage.png') }}""
      alt="Image" />

      {{-- <img src="{{ $admin->image ? asset('storage/' . $admin->image) : asset('storage/admin/userNoImage.png') }}"
                        alt="" width="300px" height="300px" /> --}}

      @php
        if($food->grade > 0  && $food->grade < 6)
        {
          echo '<span class="absolute px-4 py-0.5 text-sm bg-green-500 rounded-full text-red-50">Healthy</span>';
        }
        elseif($food->grade > 5  && $food->grade < 10)
        {
          echo '<span class="absolute px-4 py-0.5 text-sm bg-yellow-500 rounded-full text-red-50">Moderately Healthy</span>';
        }
        else{
          echo '<span class="absolute px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">Not healthy</span>';
        }
      @endphp

    </div>

    <div class="md:px-6 md:py-2 px-4 py-0">
      <h4 class="mb-3 md:text-xl text-base font-semibold tracking-tight text-primary uppercase">{{$food->name}}</h4>
      <p class="leading-normal md:text-base text-sm text-gray-700">{{$food->description}}</p>
    </div>

    <div class="flex justify-items-start md:space-x-2 md:p-2">
      @php
          $contain = strpos($restricts, $food->id, 0)
      @endphp
      @if ($contain === false)
        <button class="md:px-4 md:py-2 px-4 bg-primary text-sm md:text-base text-green-50" type="submit" id="cart<%=count++%>" value="{{$food->id}}" name="addtocart">
          Add to cart
        </button>

        {{-- Restrict Button --}}
        <input type="hidden" name="stud_id" id="anak-id" value="{{$anak->id}}">
        <button class="md:px-4 md:py-2 px-4 bg-primary text-sm md:text-base text-green-50" id="restrict<%=count++%>" type="submit" name="addtorestrict" value="{{$food->id}}" data-bs-toggle="tooltip" data-bs-placement="top">
          x
        </button>
       
      @else
        <p class="text-red"> This is restricted</p>
      @endif
      
      <span class="px-4 py-2 md:text-xl text-base text-primary"><span>&#8369;</span>{{$food->price}}</span>
    </div>
  </div>




