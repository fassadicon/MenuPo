




@props(['food'])
@props(['studentID'])
@props(['student'])
@props(['stock'])


  <div class="max-w-xs md:h-fit h-72 mx-1 mb-2 rounded-lg shadow-lg p-4">
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
      $contain = strpos($student->restriction, $food->id, 0)
  @endphp
  @if ($contain === false)
    <span class="px-4 py-2 w-full font-bold text-base text-primary bg-gray-50 rounded-full"><span>&#8369;</span>{{$food->price}}</span>
    <button class="button-sec bg-primary" type="submit" id="cart<%=count++%>" value="{{$food->id}}" name="addtocart">
      <i class="fa-solid fa-cart-plus fa-xl"></i>Add
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




  
{{-- @props(['food'])
@props(['studentID'])
@props(['student'])
@props(['stock'])

<div class="max-w-xs w-52 h-80 mx-4 mb-2 rounded-lg shadow-lg">
    <div class="relative w-full flex mx-auto mb-2">
      <img class="w-full h-48 " src="{{ $food->image ? asset($food->image) : asset('storage/admin/userNoImage.png') }}""
      alt="Image" />

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
  <div class="h-10 md:px-6 md:py-2 px-4 py-0">
    <h4 class="md:text-xl text-base font-semibold tracking-tight text-primary uppercase">{{$food->name}}</h4>
  </div>
  @php
    $contain = strpos($student->restriction, $food->id, 0)
  @endphp
  @if ($contain === false)
    <div class="h-20 flex justify-items-start md:space-x-2 md:p-4">
      <button class="md:px-4 md:py-2 px-4 bg-primary hover:bg-primaryDark text-sm md:text-base text-green-50" type="submit" id="cart<%=count++%>" value="{{$food->id}}" name="addtocart">
        +
      </button>
      <span class="px-4 py-2 md:text-xl text-base text-primary"><span>&#8369;</span>{{$food->price}}</span>
      <p>Stock: {{$stock}}</p>
    </div>
  @else
    <div class="mt-3">
      <p class="text-red"> This is restricted</p>
    </div>
  @endif
</div> --}}