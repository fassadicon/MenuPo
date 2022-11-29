<x-admin.layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create Admin Account</h2>
    </header>
    <form method="POST" action="/admin/admins/store" enctype="multipart/form-data">
        {{-- @csrf -> prevents scripting attacks --}}
        @csrf
        <div class="row">
            <div class="col-6">
                {{-- USER ACCOUNT --}}
                {{-- email --}}
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input id="email" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="email" placeholder="Example: JuanDelaCruz@gmail.com" value="{{ old('email') }}" />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- recoveryEmail --}}
                <div class="mb-6">
                    <label for="recoveryEmail" class="inline-block text-lg mb-2"> Recovery Email</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="recoveryEmail"
                        placeholder="Example: JDC123@outlook.com" value="{{ old('recoveryEmail') }}" />

                    @error('recoveryEmail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Address --}}
                <div class="mb-6">
                    <label for="address" class="inline-block text-lg mb-2">Address</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                        placeholder="Example: B2 L8 Buena Homes, subd., Malanday, San Mateo, Rizal" value="{{ old('address') }}" />

                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                 {{-- Image --}}
                 <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                {{-- First Name --}}
                <div class="mb-6">
                    <label for="firstName" class="inline-block text-lg mb-2">First Name</label>
                    {{-- Bring Step to 2 Decimal Places --}}
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="firstName"
                        value="{{ old('firstName') }}" />

                    @error('firstName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Last Name --}}
                <div class="mb-6">
                    <label for="lastName" class="inline-block text-lg mb-2">Last Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastName"
                        value="{{ old('lastName') }}" />

                    @error('lastName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Middle Name --}}
                <div class="mb-6">
                    <label for="middleName" class="inline-block text-lg mb-2">middleName</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="middleName"
                        value="{{ old('middleName') }}" />

                    @error('middleName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-4">
                        {{-- Suffix --}}
                        <div class="mb-5">
                            <label for="suffix" class="inline-block text-lg mb-2">suffix</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="suffix" placeholder="Jr, Sr, I, II, etc." value="{{ old('suffix') }}" />

                            @error('suffix')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-4">
                        {{-- birthDate --}}
                        <div class="mb-6">
                            <label for="birthDate" class="inline-block text-lg mb-2">Birth Date</label>
                            <input type="date" class="border border-gray-200 rounded p-2 w-full" name="birthDate"
                                value="{{ old('birthDate') }}" />

                            @error('birthDate')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        {{-- Sex --}}
                        <div class="mb-6">
                            <label for="sex" class="inline-block text-lg mb-2">sex</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="sex"
                                placeholder="Example: M, F" value="{{ old('sex') }}" />

                            @error('sex')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
               
            </div>
            <div class="d-flex justify-content-center col-12">
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Admin Account
                    </button>

                    <a href="/admin/admins" class="text-black ml-4"> Back </a>
                </div>
            </div>
        </div>
    </form>
    {{-- Typeahead Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src=""></script>
    <script type="text/javascript">
        var routeFindPhilFCT = "{{ url('/autocomplete-search') }}";
        $('#name').typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
            items: 5,
            source: function(query, process) {
                return $.get(routeFindPhilFCT, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            },
            // afterSelect: function(item) {
            //     computeGrade(item);
            //     $('body').on('keyup', '#servingSize', function() {
            //         var foodID = $('#name').data('name');
            //         $.get("{{ url('/checkPhilFCTitem') }}", function(data) {
            //             if (data != null) {
            //                 computeGrade(data);
            //             } else {
            //                 alert('Null!');
            //             }
            //         })
            //     });
            //     return item;
            // }
            // updater: function(item) {
            //     computeGrade(item);
            //     return item;
            // }
        });


    </script>
</x-admin.layout>
