<x-admin.layout :notifs='$adminNotifs'>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Student Account Details</h2>
    </header>
    <form method="POST" action="/admin/students/{{ $student->id }}" enctype="multipart/form-data">
        {{-- @csrf -> prevents scripting attacks --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4">
                {{-- USER ACCOUNT --}}
                {{-- password --}}
                <div class="mb-6">
                    <label for="parent" class="inline-block text-lg mb-2">Parent</label>
                    <input id="parent" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="parent"
                        value="{{ $student->guardian->firstName . ' ' . $student->guardian->middleName . ' ' . $student->guardian->lastName }}" />

                    @error('parent')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- password --}}
                <div class="mb-6">
                    <label for="LRN" class="inline-block text-lg mb-2">LRN</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="LRN"
                        value="{{ $student->LRN }}" />

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
                                placeholder="Example: 1, 2, 3, 4, 5, 6" value="{{ $student->grade }}" />

                            @error('grade')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-6">
                            <label for="section" class="inline-block text-lg mb-2">Section</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="section"
                                placeholder="Example: Sampaguita, Rosas, etc." value="{{ $student->section }}" />

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
                        placeholder="Example: Arsenio Ambayec" value="{{ $student->adviser }}" />

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
                        value="{{ $student->firstName }}" />

                    @error('firstName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Last Name --}}
                <div class="mb-6">
                    <label for="lastName" class="inline-block text-lg mb-2">Last Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastName"
                        value="{{ $student->lastName }}" />

                    @error('lastName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Middle Name --}}
                <div class="mb-6">
                    <label for="middleName" class="inline-block text-lg mb-2">middleName</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="middleName"
                        value="{{ $student->middleName }}" />

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
                                placeholder="Jr, Sr, I, II, etc." value="{{ $student->suffix }}" />

                            @error('suffix')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-4">
                        {{-- Sex --}}
                        <div class="mb-6">
                            <label for="sex" class="inline-block text-lg mb-2">sex</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="sex"
                                placeholder="Example: M, F" value="{{ $student->sex }}" />

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
                                value="{{ $student->birthDate }}" />

                            @error('birthDate')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-4">
                {{-- recoveryEmail --}}
                <div class="mb-6">
                    <label for="height" class="inline-block text-lg mb-2"> Height (cm)</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="height"
                        placeholder="Example: 175" value="{{ $student->bmi->Q1Height }}" />

                    @error('height')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- recoveryEmail --}}
                <div class="mb-6">
                    <label for="weight" class="inline-block text-lg mb-2"> Weight (kg)</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="weight"
                        placeholder="Example: 63.5" value="{{ $student->bmi->Q1Weight }}" />

                    @error('weight')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- recoveryEmail --}}
                <div class="mb-6">
                    <label for="BMI" class="inline-block text-lg mb-2"> BMI</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="BMI"
                        placeholder="" value="{{ $student->bmi->Q1BMI }}" />

                    @error('BMI')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Image --}}
                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                    <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('admin/assets/img/no-image.png') }}"
                        alt="" width="300px" height="300px" />
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center col-12">
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Update Student Account
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
            }
        });
    </script>
</x-admin.layout>
