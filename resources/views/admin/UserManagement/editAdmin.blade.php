<x-admin.layout :notifs='$adminNotifs'>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Admin Account Details</h2>
    </header>
    <form method="POST" action="/admin/admins/{{ $admin->id }}" enctype="multipart/form-data">
        {{-- @csrf -> prevents scripting attacks --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                 {{-- First Name --}}
                 <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">email</label>
                    {{-- Bring Step to 2 Decimal Places --}}
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                        value="{{ $admin->user->email }}" />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Last Name --}}
                <div class="mb-6">
                    <label for="recoveryEmail" class="inline-block text-lg mb-2">recoveryEmail</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="recoveryEmail"
                        value="{{ $admin->user->recoveryEmail }}" />

                    @error('recoveryEmail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- First Name --}}
                <div class="mb-6">
                    <label for="firstName" class="inline-block text-lg mb-2">First Name</label>
                    {{-- Bring Step to 2 Decimal Places --}}
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="firstName"
                        value="{{ $admin->firstName }}" />

                    @error('firstName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Last Name --}}
                <div class="mb-6">
                    <label for="lastName" class="inline-block text-lg mb-2">Last Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastName"
                        value="{{ $admin->lastName }}" />

                    @error('lastName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Middle Name --}}
                <div class="mb-6">
                    <label for="middleName" class="inline-block text-lg mb-2">middleName</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="middleName"
                        value="{{ $admin->middleName }}" />

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
                                placeholder="Jr, Sr, I, II, etc." value="{{ $admin->suffix }}" />

                            @error('suffix')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-4">
                        {{-- Sex --}}
                        <div class="mb-6">
                            <label for="sex" class="inline-block text-lg mb-2">sex</label><br>
                                <input id="default-radio-1" type="radio" value="M" @if($admin->sex == "M") checked @endif name="sex"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                                <input id="default-radio-2" type="radio" value="F" @if($admin->sex == "F") checked @endif
                                    name="sex"
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
                                value="{{ $admin->birthDate }}" />

                            @error('birthDate')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Sex --}}
                        
                    </div>

                </div>


            </div>
            <div class="col-6">
                {{-- Image --}}
                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                    <img src="{{ $admin->image ? asset('storage/' . $admin->image) : asset('storage/admin/userNoImage.png') }}"
                        alt="" width="300px" height="300px" />
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="address" class="inline-block text-lg mb-2">Address</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                        placeholder="Example: M, F" value="{{ $admin->address }}" />

                    @error('sex')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center col-12">
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Update Admin Account
                    </button>

                    <a href="/admin/admins" class="text-black ml-4"> Back </a>
                </div>
            </div>
        </div>
    </form>
</x-admin.layout>
