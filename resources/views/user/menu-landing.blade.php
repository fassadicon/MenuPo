

<x-user.layout :studs="$students" :notifs="$notifications">

    <br>
    <br>
    <br>
    <br>
    <br>



    <div class="h-screen">
        <div class="text-center mb-8">
        <p class="text-xl font-bold">Choose anak: </p>
        </div>
        
        <x-user.menu-landing.anaks :students="$students" />

    </div>



        
</x-user.layout>