<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">
<br><br><br><br>

    <div class="h-screen">
        <div class="relative w-64 h-96 mx-auto md:w-80 overflow-visible shadow-lg rounded-md bg-zinc-50">
            <i class="absolute left-1 -top-1 text-green-500 text-4xl fa-solid fa-bookmark"></i></span>
            <div class="m-4 h-52 bg-red-500 rounded-md">
                <img class="h-full w-full" src="https://www.slimmingeats.com/blog/wp-content/uploads/2010/04/spaghetti-bolognese-36.jpg" alt="">
            </div>
            <div class="py-4 px-4">
              <h2 class="text-2xl font-bold leading-tight">Product title</h2>
              <p class="text-sm text-gray-700">Product description and details</p>
            </div>
            <div class="border-t p-4 flex justify-between items-center">
                <div>
                    <span class="text-2xl font-bold">$499.49</span>
                </div>
                <div class="flex">
                    <i class="fa-solid mx-4 text-yellow-500 text-3xl fa-cart-plus"></i>
                    <i class="fa-solid text-red-500 text-3xl fa-circle-xmark"></i>
                </div>
              
            </div>
        </div>
    </div>


</x-user.layout>