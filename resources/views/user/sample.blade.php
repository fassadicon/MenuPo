<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">
<br><br><br><br>

    <div class="h-screen">
        <div class="relative mx-auto w-72 overflow-visible shadow-lg rounded-md bg-zinc-50">
            <i class="absolute -top-1 text-green-500 text-4xl fa-solid fa-bookmark"></i></span>
            <div class="m-4 h-40 bg-red-500 rounded-md"></div>
            <div class="py-4 px-4">
              <h2 class="text-xl font-bold leading-tight">Product title</h2>
              <p class="text-sm text-gray-700">Product description and details</p>
            </div>
            <div class="border-t p-4 flex justify-between items-center">
                <div>
                    <span class="text-xl font-bold">$499.49</span>
                </div>
                <div class="flex">
                    <i class="fa-solid mx-4 text-yellow-500 text-3xl fa-cart-plus"></i>
                    <i class="fa-solid text-red-500 text-3xl fa-circle-xmark"></i>
                </div>
              
            </div>
        </div>
    </div>


</x-user.layout>