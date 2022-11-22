<x-admin.layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Food Details</h2>
        {{-- <p class="mb-4">Edit: {{ $food->name }}</p> --}}

    </header>
    <form method="POST" action="/admin/foods/{{ $food->id }}" enctype="multipart/form-data">
        @csrf
        {{-- method="PUT" --}}
        @method('PUT')
        <div class="row">
            <div class="col-6">
                {{-- Name --}}
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        placeholder="Example: Senior Laravel Developer" value="{{ $food->name }}" />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Description --}}
                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">Description</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description"
                        placeholder="Example: Remote, Boston MA, etc" value="{{ $food->description }}" />

                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Type --}}
                <div class="mb-6">
                    <label for="type" class="inline-block text-lg mb-2">Type</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="type"
                        placeholder="Example: Senior Laravel Developer" value="{{ $food->type }}" />

                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Price --}}
                <div class="mb-6">
                    <label for="price" class="inline-block text-lg mb-2">Price</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price"
                        placeholder="Example: Senior Laravel Developer" value="{{ $food->price }}" />

                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Stock --}}
                <div class="mb-6">
                    <label for="stock" class="inline-block text-lg mb-2">Stock</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="stock"
                        placeholder="Example: Senior Laravel Developer" value="{{ $food->stock }}" />

                    @error('stock')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Image --}}
                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                    <img src="{{ $food->image ? asset('storage/' . $food->image) : asset('admin/assets/img/no-image.png') }}"
                        alt="" width="300px" height="300px" />
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="col-6">
                {{-- Serving Size --}}
                <div class="mb-6">
                    <label for="servingSize" class="inline-block text-lg mb-2">Serving Size</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="servingSize"
                        placeholder="In grams (g)" value="{{ $food->servingSize }}" />

                    @error('servingSize')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcKcal --}}
                <div class="mb-6">
                    <label for="calcKcal" class="inline-block text-lg mb-2">calcKcal</label>
                    <input id="calcKcal" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcKcal" placeholder="In grams (g)" value="{{ $food->calcKcal }}" />

                    @error('calcKcal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcTotFat --}}
                <div class="mb-6">
                    <label for="calcTotFat" class="inline-block text-lg mb-2">calcTotFat</label>
                    <input id="calcTotFat" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcTotFat" placeholder="In grams (g)" value="{{ $food->calcTotFat }}" />

                    @error('calcTotFat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcSatFat --}}
                <div class="mb-6">
                    <label for="calcSatFat" class="inline-block text-lg mb-2">calcSatFat</label>
                    <input id="calcSatFat" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcSatFat" placeholder="In grams (g)" value="{{ $food->calcSatFat }}" />

                    @error('calcSatFat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcSugar --}}
                <div class="mb-6">
                    <label for="calcSugar" class="inline-block text-lg mb-2">calcSugar</label>
                    <input id="calcSugar" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcSugar" placeholder="In grams (g)" value="{{ $food->calcSugar }}" />

                    @error('calcSugar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcSodium --}}
                <div class="mb-6">
                    <label for="calcSodium" class="inline-block text-lg mb-2">calcSodium</label>
                    <input id="calcSodium" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcSodium" placeholder="In grams (g)" value="{{ $food->calcSodium }}" />

                    @error('calcSodium')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- grade --}}
                <div class="mb-6">
                    <label for="grade" class="inline-block text-lg mb-2">grade</label>
                    <input id="grade" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="grade" placeholder="In grams (g)" value="{{ $food->grade }}" />

                    @error('grade')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Color --}}
                <div class="mb-6">
                    <label for="color" class="inline-block text-lg mb-2">color</label>
                    <input id="color" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="description" placeholder="Example: A violet, long, and delicious delicacy of Arsenio"
                        value="{{ old('color') }}" />

                    @error('color')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>



        {{-- Update and Back Button --}}
        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update Food Item
            </button>

            <a href="/admin/foods" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-admin.layout>
