

<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">
<div class="h-screen flex justify-center md:pt-48 pt-32 landing-image">
    <div class="menu-landing bg-gradient-to-tl from-yellow-100 via-yellow-300 to-yellow-500 h-fit p-6 rounded-lg shadow-lg my-4">
        <div class="text-center mb-8">
        <p class="text-xl font-bold p-4">Choose anak: </p>
        </div>
        
        <x-user.menu-landing.anaks :students="$students" />
        <div class="flex justify-center">
            <button class="button-sec"><a href="/user/home">Go Back</a></button>
        </div>
    </div>
</div>   
</x-user.layout>