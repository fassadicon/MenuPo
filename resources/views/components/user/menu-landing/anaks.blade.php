

@props(['students'])
<div>
    @foreach ($students as $stud)
        <a href="/user/menu/{{$stud->id}}">
            <div class="h-32 w-80 border border-2 border-solid rounded-lg mx-auto mb-8 bg-blue-900 text-[#ffc300] hover:text-black hover:bg-[#ffc300]">
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


