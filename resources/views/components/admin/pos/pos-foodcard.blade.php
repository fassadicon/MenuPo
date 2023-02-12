




@props(['food'])
@props(['studentID'])
@props(['student'])
@props(['stock'])


{{-- New  --}}

<div class="relative w-60 h-fit mx-auto md:w-64 overflow-visible shadow-lg rounded-md bg-zinc-50">
  {{-- For the bookmark color --}}
  @php
      if($food->grade > 0  && $food->grade < 6)
      {
        echo '<i class="absolute left-1 -top-1 text-green-500 text-4xl fa-solid fa-bookmark"></i></span>';
      }
      elseif($food->grade > 5  && $food->grade < 10)
      {
        echo '<i class="absolute left-1 -top-1 text-yellow-500 text-4xl fa-solid fa-bookmark"></i></span>';
      }
      else{
        echo '<i class="absolute left-1 -top-1 text-red-500 text-4xl fa-solid fa-bookmark"></i></span>';
      }
  @endphp
  
  <div class="m-4 h-52 bg-red-500 rounded-md">
    <img class="w-full h-full" src="{{ $food->image ? asset($food->image) : asset('storage/admin/userNoImage.png') }}"
    alt="Image" />
  </div>

  <div class="py-2 px-4 text-left">
    <h2 class="text-2xl font-bold leading-tight">{{$food->name}}</h2>
    <p class="text-red-600">Stock: {{$food->stock}}</p>
  </div>

  <div class="border-t py-2 px-4 flex justify-between items-center">
      <div>
          <span class="text-2xl font-bold">&#8369;{{$food->price}}</span>
      </div>
      {{-- For the restrict button --}}
      <div class="flex">
        @php
          $contain = strpos($student->restriction, $food->id, 0)
        @endphp

        @if ($contain === false)
          <button class="" type="submit" id="cart<%=count++%>" value="{{$food->id}}" name="addtocart">
            <i class="fa-solid mx-4 text-yellow-500 text-3xl fa-cart-plus"></i>
          </button>
        @else
          <span class="text-sm md:text-lg text-red-400 bg-gray-50 rounded-full"><i class="fa-solid fa-circle-info fa-lg"></i> This is restricted</span>
        @endif
      </div>
  </div>
</div>




