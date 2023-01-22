<x-admin.layout :notifs='$adminNotifs'>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create Student Account</h2>
    </header>
    <form method="POST" action="/admin/students/create/store" enctype="multipart/form-data">
        {{-- @csrf -> prevents scripting attacks --}}
        @csrf
        <div class="row">
            <div class="col-4">
                {{-- USER ACCOUNT --}}
                {{-- password --}}
                <div class="mb-6">
                    <label for="parent" class="inline-block text-lg mb-2">Parent</label>
                    <input id="parent" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="parent" value="{{ old('parent') }}" />

                    @error('parent')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- password --}}
                <div class="mb-6">
                    <label for="LRN" class="inline-block text-lg mb-2">LRN</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="LRN"
                        value="{{ old('LRN') }}" />

                    @error('LRN')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-5">
                        {{-- recoveryEmail --}}
                        <div class="mb-6">
                            <label for="grade" class="inline-block text-lg mb-2"> Grade</label>
                            <input type="number" class="border border-gray-200 rounded p-2 w-full" name="grade"
                                placeholder="Example: 1, 2, 3, 4, 5, 6" value="{{ old('grade') }}" />

                            @error('grade')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-6">
                            <label for="section" class="inline-block text-lg mb-2">Section</label>
                            <input type="text" id="section" class="border border-gray-200 rounded p-2 w-full" name="section"
                                placeholder="Example: Sampaguita, Rosas, etc." value="{{ old('section') }}" />

                            @error('section')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                {{-- Address --}}
                <div class="mb-6">
                    <label for="adviser" class="inline-block text-lg mb-2">Adviser</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="adviser"
                        placeholder="Example: Arsenio Ambayec" value="{{ old('adviser') }}" />

                    @error('adviser')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="col-4">
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
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="suffix"
                                placeholder="Jr, Sr, I, II, etc." value="{{ old('suffix') }}" />

                            @error('suffix')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-4">
                        {{-- Sex --}}
                        <div class="mb-6">
                            <label for="sex" class="inline-block text-lg mb-2">sex</label><br>
                            <input id="default-radio-1" type="radio" value="M"
                                @if (old('sex')) checked @endif name="sex"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                            <input id="default-radio-2" type="radio" value="F"
                                @if (old('sex')) checked @endif name="sex"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                            @error('sex')
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

                </div>


            </div>
            <div class="col-4">
                <div class="mb-6">
                    <label for="height" class="inline-block text-lg mb-2"> Height (cm)</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="height"
                        placeholder="Example: 175" step=".01" value="{{ old('height') }}" />

                    @error('height')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- recoveryEmail --}}
                <div class="mb-6">
                    <label for="weight" class="inline-block text-lg mb-2"> Weight (kg)</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="weight"
                        placeholder="Example: 63.5" step=".01" value="{{ old('weight') }}" />

                    @error('weight')
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
            <div class="d-flex justify-content-center col-12">
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Student Account
                    </button>

                    <a href="/admin/students" class="text-black ml-4"> Back </a>
                </div>
            </div>
        </div>
    </form>
    {{-- Typeahead Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src=""></script>
    <script type="text/javascript">
        $('document').ready(function() {
            var routeFindPhilFCT = "{{ url('/autocomplete-search-parents') }}";
            $('#parent').typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
                items: 5,
                source: function(query, process) {
                    return $.get(routeFindPhilFCT, {
                        query: query
                    }, function(data) {
                        console.log(data);
                        return process(data);
                    });
                },
            });

            var routeFindSection = "{{ url('/autocomplete-search-sections') }}";
            $('#section').typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
                items: 5,
                source: function(query, process) {
                    return $.get(routeFindSection, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                },
            });

            // var count = 0;
            // $('#parent').on('blur', function() {
            //     $.get("{{ url('admin/guardians/') }}" + '/' + $('#parent').val() + '/exists',
            //         function(data) {
            //             if ((data == '' || data == null) && count % 3 == 0) {
            //                 Swal.fire(
            //                     'Invalid Parent Name!'
            //                 );
            //                 count++;
            //             }
            //         });
            // })
        })
    </script>
</x-admin.layout>
