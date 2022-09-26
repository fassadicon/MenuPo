<x-admin.layout>
  <header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Create a Food Item</h2>
  </header>
  <form method="POST" action="/admin/foods" enctype="multipart/form-data">
    {{-- @csrf -> prevents scripting attacks --}}
    @csrf
    {{-- Name --}}
    <div class="mb-6">
      <label for="name" class="inline-block text-lg mb-2">Name</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
        placeholder="Example: Eggplant" value="{{old('name')}}" />

      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    {{-- Description --}}
    <div class="mb-6">
      <label for="description" class="inline-block text-lg mb-2">Description</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description"
        placeholder="Example: A violet, long, and delicious delicacy of Arsenio" value="{{old('description')}}" />

      @error('description')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    {{-- Type --}}
    <div class="mb-6">
      <label for="type" class="inline-block text-lg mb-2">Type</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="type"
        placeholder="Example: Snacks, Beverages, Rice Meals, Others" value="{{old('type')}}" />

      @error('type')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    {{-- Image --}}
    {{-- <div class="mb-6">
      <label for="logo" class="inline-block text-lg mb-2">
        Image
      </label>
      <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

      @error('image')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div> --}}
    {{-- Price --}}
    <div class="mb-6">
      <label for="price" class="inline-block text-lg mb-2">Price</label>
      {{-- Bring Step to 2 Decimal Places --}}
      <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{old('price')}}" />

      @error('price')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    {{-- Stock --}}
    <div class="mb-6">
      <label for="stock" class="inline-block text-lg mb-2">Stock</label>
      <input type="number" class="border border-gray-200 rounded p-2 w-full" name="stock" value="{{old('stock')}}" />

      @error('stock')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    {{-- Menu Status --}}
    <div class="mb-6">
      <label for="menuStatus" class="inline-block text-lg mb-2">Menu Status</label>
      <input type="number" 
        class="border border-gray-200 rounded p-2 w-full" 
        name="menuStatus"
        placeholder="Example: 1 - In the Menu, 0 - Out of the Menu, 2 - Out of Stock" 
        value="{{old('menuStatus')}}" />

      @error('menuStatus')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    {{-- Serving Size --}}
    <div class="mb-6">
      <label for="servingSize" class="inline-block text-lg mb-2">Serving Size</label>
      <input type="number" class="border border-gray-200 rounded p-2 w-full" name="servingSize" placeholder="In grams (g)" value="{{old('servingSize')}}" />

      @error('servingSize')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>



    <div class="mb-6">
      <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
        Create Food Item
      </button>

      <a href="/admin/foods" class="text-black ml-4"> Back </a>
    </div>
  </form>
</x-admin.layout>