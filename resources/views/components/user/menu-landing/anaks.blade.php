

@props(['students'])
<div>
    @foreach ($students as $stud)
        <a href="/user/menu/{{$stud->id}}">
            <div class="h-32 w-80 border-t-2 border-l-2 border-r-4 border-b-4 border-solid bg-gray-50 transform hover:translate-y-1 hover:shadow-xl transition duration-300 hover:bg-gradient-to-tl from-yellow-100 via-yellow-100 to-primaryLight border-gray-800 rounded-lg mx-auto mb-8">
                <div class="flex">
                    <img class="rounded-full w-24 h-24 m-4" src="https://i.pinimg.com/564x/34/0b/b2/340bb262b13956c7ed6d557c8d82f91f.jpg" alt="">
                    <div class="">
                        <p class="text-xl font-bold mt-8">{{$stud->firstName . ' ' . $stud->lastName}}</p>
                        <p class="text-lg font-bold">{{$stud->grade . '-' . $stud->section}}</p>
                    </div>
                    
                </div>
            </div>
        </a>
    @endforeach
</div>


