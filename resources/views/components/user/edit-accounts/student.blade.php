
@props(['anak'])

<div class="form">
        
    <div class="text-center">
        <p class="text-2xl font-bold text-primary"><u>Edit student details</u></p>
    </div>
    <form class="mx-auto h-screen w-full md:w-1/3" action="/health/saveUpdate" method="POST">
        @csrf
        <div class="p-4 h-3/6">
            
            <input type="text" value="{{$anak->id}}" name="id" hidden>
            <label class="font-bold" for="">Given Name</label>
            @error('firstName')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input class="mb-2 w-full rounded-lg" value="{{$anak->firstName}}" type="text" name="firstName" id="firstName">


            <label class="font-bold" for="">Middle Name</label>
            @error('middleName')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input class="mb-2 w-full rounded-lg" value="{{$anak->middleName}}" type="text" name="middleName" id="middleName">
            

            <label class="font-bold" for="">Last Name</label>
            @error('lastName')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input class="mb-2 w-full rounded-lg" value="{{$anak->lastName}}" type="text" name="lastName" id="lastName">
            

            <div class="flex mb-2">
                <div class="mr-2">
                    <label class="font-bold" for="">Suffix</label>
                    <input class="w-full rounded-lg" value="{{$anak->suffix}}" type="text" name="suffix" id="suffix">
                    
                </div>
                <div>
                    <label for="gender" class="mb-2 font-bold">Gender</label>
                    @error('gender')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <select id="gender" name="gender" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="M">M</option>
                        <option value="F">F</option>
                        <option value="PNS">Prefer not to say</option>
                    </select>
                </div>
            </div>

            <label class="font-bold" for="">Birthday</label>
            @error('birthday')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input class="w-full rounded-lg" value="{{$anak->birthDate}}" type="date" name="birthday" id="birthday">
        
        </div>
        <button
            type = "submit"
            class="saveUpdate mt-8 block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Submit
        </button>
    </form>
    
</div>