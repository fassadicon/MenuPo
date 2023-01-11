
@props(['restrict'])
@props(['anak_id'])


<div class="w-64 h-full mx-4 mb-2 rounded-lg shadow-lg">
    <div class="relative flex mb-2">
      <img class="w-full h-48 p-4" src="{{ $restrict->image ? asset($restrict->image) : asset('storage/admin/userNoImage.png') }}""
      alt="Image" />
      @php
        if($restrict->grade > 0  && $restrict->grade < 6)
        {
          echo '<i class="absolute left-1 -top-1 text-green-500 text-4xl fa-solid fa-bookmark"></i></span>';
        }
        elseif($restrict->grade > 5  && $restrict->grade < 10)
        {
          echo '<i class="absolute left-1 -top-1 text-yellow-500 text-4xl fa-solid fa-bookmark"></i></span>';
        }
        else{
          echo '<i class="absolute left-1 -top-1 text-red-500 text-4xl fa-solid fa-bookmark"></i></span>';
        }
      @endphp
    </div>
  <div class="md:px-6 md:py-2 px-4 py-0">
    <h4 class="md:text-xl text-sm font-semibold tracking-tight text-primary uppercase">{{$restrict->name}}</h4>
  </div>
  <div class="flex justify-items-start md:space-x-4 p-4">
    <button type="submit" class="button-sec bg-primary w-full py-0 md:px-4 font-bold md:py-2 px-4 text-lg md:text-secondary" id="del<%=count++%>" value="{{$anak_id}},{{$restrict->id}}" name="rem-btn" >Unrestrict</button>
  </div>
</div>