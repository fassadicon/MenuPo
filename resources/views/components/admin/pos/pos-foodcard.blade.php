
@props(['food'])
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
</div>



