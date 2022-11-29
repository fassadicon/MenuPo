
@props(['restrict'])
@props(['anak_id'])


<div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
    <div class="relative flex mb-2">
      <img class="w-full h-48" src="{{$restrict->image}}"
    alt="Image" />

    @php
        if($restrict->grade > 0  && $restrict->grade < 6)
        {
        echo '<span class="absolute px-4 py-0.5 text-sm bg-green-500 rounded-full text-red-50">Healthy</span>';
        }
        elseif($restrict->grade > 5  && $restrict->grade < 10)
        {
        echo '<span class="absolute px-4 py-0.5 text-sm bg-yellow-500 rounded-full text-red-50">Moderately Healthy</span>';
        }
        else{
        echo '<span class="absolute px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">Not healthy</span>';
        }
    @endphp

    </div>
  <div class="md:px-6 md:py-2 px-4 py-0">
    <h4 class="mb-3 md:text-xl text-base font-semibold tracking-tight text-primary uppercase">{{$restrict->name}}</h4>
    <p class="leading-normal md:text-base md:mb-1 mb-4 text-sm text-gray-700">Date Added: DATE</p>
  </div>
  <div class="flex justify-items-start md:space-x-4 md:p-4">
    <button type="submit" class="font-semibold text-black" id="del<%=count++%>" value="{{$anak_id}},{{$restrict->id}}" name="rem-btn" >&times;</button>
    <button title="See in menu" class="md:px-4 md:py-2 px-4 border-l-2 border-white bg-primary hover:bg-indigo-600 text-sm md:text-base text-green-50"><i class="fa-solid fa-eye"></i></button>
    <span class="px-4 py-2 md:text-xl text-base text-primary"><span>&#8369;</span>20.0</span>
  </div>
</div>