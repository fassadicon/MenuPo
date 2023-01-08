
@props(['food'])
@props(['studs'])
@props(['restricts'])
@props(['anak'])
@props(['stock'])


  <div class="max-w-xs md:h-fit h-fit mx-1 mb-2 rounded-lg shadow-lg p-4">
    <div class="relative h-48 flex mb-2">
      <img class="w-full h-full" src="{{ $food->image ? asset($food->image) : asset('storage/admin/userNoImage.png') }}"
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

<div class="absolute justify-items-start md:space-x-2 md:p-2 inset-x-0 bottom-0">
  @php
      $contain = strpos($restricts, $food->id, 0)
  @endphp
  @if ($contain === false)
    <span class="px-4 py-2 w-full font-bold text-base text-primary bg-gray-50 rounded-full"><span>&#8369;</span>{{$food->price}}</span>
    <button class="button-sec bg-primary" type="submit" id="cart<%=count++%>" value="{{$food->id}}" name="addtocart">
      <i class="fa-solid fa-cart-plus fa-xl"></i>Add
    </button>
    

    {{-- Restrict Button --}}
    <input type="hidden" name="stud_id" id="anak-id" value="{{$anak->id}}">
    <button class="button-sec bg-blue-400" id="restrict<%=count++%>" type="submit" name="addtorestrict" value="{{$food->id}}" data-bs-toggle="tooltip" data-bs-placement="top">
      <i class="fa-solid fa-ban fa-xl"></i>
    </button>
   
  @else
    <span class="px-4 py-2 md:mb-6 w-full text-base text-blue-400 bg-gray-50 rounded-full"><i class="fa-solid fa-circle-info fa-lg"></i> This is restricted</span>
  @endif
  
  
</div>

    </div>

    <div class="md:px-6 md:py-2 h-32 px-4 py-0">
      <h4 class="mb-3 md:text-xl text-xl font-semibold tracking-tight text-primary uppercase">{{$food->name}}</h4>
      <p class="leading-normal md:text-base text-sm text-gray-700">{{$food->description}}</p>
      @if ($stock < 10)
          <span><i class="fa-solid text-red-500 fa-triangle-exclamation"></i></span>
          <span class="leading-normal text-red-500 md:text-base text-sm text-gray-700">Stock: {{$stock}}</span>
      @else
        <p class="leading-normal md:text-base text-sm text-gray-700">Stock: {{$stock}}</p>
      @endif
      
    </div>
  </div>




