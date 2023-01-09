
@props(['restrict'])
@props(['anak_id'])


<div class="w-80 h-80 mx-4 mb-2 rounded-lg shadow-lg">
    <div class="relative flex mb-2">
      <img class="w-full h-48" src="{{ $restrict->image ? asset($restrict->image) : asset('storage/admin/userNoImage.png') }}""
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
    <h4 class="md:text-xl text-base font-semibold tracking-tight text-primary uppercase">{{$restrict->name}}</h4>
  </div>
  <div class="flex justify-items-start md:space-x-4 p-4">
    <button type="submit" class="button-sec bg-primary w-full md:px-4 font-bold md:py-2 px-4 text-lg md:text-secondary" id="del<%=count++%>" value="{{$anak_id}},{{$restrict->id}}" name="rem-btn" >Unrestrict</button>
  </div>
</div>