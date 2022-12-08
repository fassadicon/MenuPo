
<x-user.layout2 :studs="$students" :adminNotifs="$adminNotifs">
    <br><br><br>
    <br><br>
    <div class="form">
        
        <div class="text-center">
            <p class="text-2xl font-bold text-primary"><u>Edit account details</u></p>
        </div>
        <form class="mx-auto h-auto w-full md:w-1/3" action="/saveUpdate" method="POST">
            @csrf
            <div class="p-4 h-full">
                
                <label class="font-bold" for="">Given Name</label>
                @error('firstName')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="text" name="firstName" id="firstName">


                <label class="font-bold" for="">Middle Name</label>
                @error('middleName')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="text" name="middleName" id="middleName">
                

                <label class="font-bold" for="">Last Name</label>
                @error('lastName')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="text" name="lastName" id="lastName">
                

                <div class="flex mb-2">
                    <div class="mr-2">
                        <label class="font-bold" for="">Suffix</label>
                        @error('suffix')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                        <input class="w-full rounded-lg" type="text" name="suffix" id="suffix">
                        
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
                
                <label class="font-bold" for="">Contact No</label>
                @error('contact')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="text" name="contact" id="contact">
                

                <label class="font-bold" for="">Current Address</label>
                @error('address')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="text" name="address" id="address">
                

                <label class="font-bold" for="">Email</label>
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="text" name="email" id="email">
                

                <label class="font-bold" for="">Birthday</label>
                @error('birthday')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="w-full rounded-lg" type="date" name="birthday" id="birthday">
                

            </div>
            <button
                type = "submit"
                class="saveUpdate mt-8 block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                Submit
            </button>
        </form>
        
    </div>

</x-user.layout2>

<script>
      //For saving the update
//   $(document).on('click', '.saveUpdate',  function(e){
//         e.preventDefault();

//         var firstName = document.getElementById('firstName').value;
//         var middleName = document.getElementById('middleName').value;
//         var lastName = document.getElementById('lastName').value;
//         var suffix = document.getElementById('suffix').value;
//         var gender = document.getElementById('gender').value;
//         var contact = document.getElementById('contact').value;
//         var address = document.getElementById('address').value;
//         var email = document.getElementById('email').value;
//         var birthday = document.getElementById('birthday').value;

//         console.log(firstName);

//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             method: "POST",
//             url: 'saveUpdate',
//             data: {
//                 "firstName":firstName, 
//                 "middleName":middleName, 
//                 "lastName":lastName, 
//                 "suffix":suffix, 
//                 "gender":gender, 
//                 "contact":contact, 
//                 "address":address, 
//                 "email":email, 
//                 "birthday":birthday, },
        
//             success:function(data){
//                 $('.form').load(location.href + " .form");
                
//             }
//         })
//     });

</script>