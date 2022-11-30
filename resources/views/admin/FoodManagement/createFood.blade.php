<x-admin.layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create a Food Item</h2>
    </header>
    <form method="POST" action="/admin/foods" enctype="multipart/form-data">
        {{-- @csrf -> prevents scripting attacks --}}
        @csrf
        {{-- Name --}}
        <div class="row">
            <div class="col-6">
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Name</label>
                    <input id="name" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="name" placeholder="Example: Eggplant" value="{{ old('name') }}" />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Description --}}
                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">Description</label>
                    <input id="description" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="description" placeholder=""
                        value="{{ old('description') }}" />

                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Type --}}
                <div class="mb-6">
                    <label for="type" class="inline-block text-lg mb-2">Type</label>
                    <input id="type" type="text" class="border border-gray-200 rounded p-2 w-full"
                        name="type" placeholder="Example: Snacks, Beverages, Rice Meals, Others"
                        value="{{ old('type') }}" />

                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Price --}}
                <div class="mb-6">
                    <label for="price" class="inline-block text-lg mb-2">Price</label>
                    {{-- Bring Step to 2 Decimal Places --}}
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price"
                        value="{{ old('price') }}" />

                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Stock --}}
                <div class="mb-6">
                    <label for="stock" class="inline-block text-lg mb-2">Stock</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="stock"
                        value="{{ old('stock') }}" />

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

                    @error('image')
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
            <div class="col-6">
                {{-- Serving Size --}}
                <div class="mb-6">
                    <label for="servingSize" class="inline-block text-lg mb-2">Serving Size</label>
                    <input id="servingSize" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="servingSize" placeholder="In grams (g)" value="100" />

                    @error('servingSize')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcKcal --}}
                <div class="mb-6">
                    <label for="calcKcal" class="inline-block text-lg mb-2">calcKcal</label>
                    <input id="calcKcal" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcKcal" placeholder="In grams (g)" value="{{ old('calcKcal') }}"/>

                    @error('calcKcal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcTotFat --}}
                <div class="mb-6">
                    <label for="calcTotFat" class="inline-block text-lg mb-2">calcTotFat</label>
                    <input id="calcTotFat" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcTotFat" placeholder="In grams (g)" value="{{ old('calcTotFat') }}"/>

                    @error('calcTotFat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcSatFat --}}
                <div class="mb-6">
                    <label for="calcSatFat" class="inline-block text-lg mb-2">calcSatFat</label>
                    <input id="calcSatFat" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcSatFat" placeholder="In grams (g)" value="{{ old('calcSatFat') }}"/>

                    @error('calcSatFat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcSugar --}}
                <div class="mb-6">
                    <label for="calcSugar" class="inline-block text-lg mb-2">calcSugar</label>
                    <input id="calcSugar" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcSugar" placeholder="In grams (g)" value="{{ old('calcSugar') }}"/>

                    @error('calcSugar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- calcSodium --}}
                <div class="mb-6">
                    <label for="calcSodium" class="inline-block text-lg mb-2">calcSodium</label>
                    <input id="calcSodium" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="calcSodium" placeholder="In grams (g)" value="{{ old('calcSodium') }}"/>

                    @error('calcSodium')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- grade --}}
                <div class="mb-6">
                    <label for="grade" class="inline-block text-lg mb-2">grade</label>
                    <input id="grade" type="number" class="border border-gray-200 rounded p-2 w-full"
                        name="grade" placeholder="In grams (g)" value="{{ old('grade') }}"/>

                    @error('grade')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="d-flex justify-content-center col-12">
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Food Item
                    </button>

                    <a href="/admin/foods" class="text-black ml-4"> Back </a>
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
                    console.log(data)
                    return process(data);
                });
            },
            afterSelect: function(item) {
                let servingSize = $('#servingSize').val();
                computeGrade(item, servingSize);
                return item;
            }
            // updater: function(item) {
            //     computeGrade(item);
            //     return item;
            // }
        });

        $('body').on('change', '#servingSize', function() {
            var name = $('#name').val();
            $.get("{{ url('getPhilFCTFood/') }}" + '/' + name + '/view', function(data) {
                let servingSize = $('#servingSize').val();
                computeGrade(data.food, servingSize);
            })
        });


        function computeGrade(result, servingSize) {
            // Getting Base Nutritional Details per 100 g 
            var type = $('#type').val();

            if (type == 1) {
                alert("Gawin mo ako!");
            } else {
                // Base Nutritional Data
                var baseServingSize = 100;
                var baseKcal = result.kcal;
                var baseTotFat = result.totFat;
                var baseSatFat = result.satFat;
                var baseSugar = result.sugar;
                var baseSodium = result.sodium;

                // Computation based on specific serving size
                var servingSize = servingSize;
                // var servingSize = $('#servingSize').val();
                var computeSize = servingSize / baseServingSize;

                // Calculated Nutrient Data
                var calcKcal = (computeSize * baseKcal);
                var calcTotFat = (computeSize * baseTotFat);
                var calcSatFat = (computeSize * baseSatFat);
                var calcSugar = (computeSize * baseSugar);
                var calcSodium = (computeSize * baseSodium);

                // Base Criteria
                var greenTotFat = computeSize * 3;
                var greenSatFat = computeSize * 1.5;
                var greenSugar = computeSize * 5;
                var greenSodium = computeSize * 120;
                var amberTotFat = computeSize * 17.5;
                var amberSatFat = computeSize * 5;
                var amberSugar = computeSize * 22.5;
                var amberSodium = computeSize * 600;
                var redTotFat = computeSize * 21;
                var redSatFat = computeSize * 6;
                var redSugar = computeSize * 27;
                var redSodium = computeSize * 720;

                // Point System
                var green = 1,
                    amber = 2,
                    red = 3;

                // Food Grade Evaluation
                var pointsTotFat = 0,
                    pointsSatFat = 0,
                    pointsSugar = 0,
                    pointsSodium = 0;
                // Calculated Total Fat Evaluation
                if (calcTotFat <= greenTotFat) {
                    pointsTotFat += green;
                } else if (calcTotFat <= amberTotFat) {
                    pointsTotFat += amber;
                } else if (calcTotFat <= redTotFat) {
                    pointsTotFat += red;
                } else {
                    pointsTotFat += 0;
                }
                // Calculated Saturated Fat Evaluation
                if (calcSatFat <= greenSatFat) {
                    pointsSatFat += green;
                } else if (calcSatFat <= amberSatFat) {
                    pointsSatFat += amber;
                } else if (calcSatFat <= redSatFat) {
                    pointsSatFat += red;
                } else {
                    pointsSatFat += 0;
                }
                // Calculated Sugar Evaluation
                if (calcSugar <= greenSugar) {
                    pointsSugar += green;
                } else if (calcSugar <= amberSugar) {
                    pointsSugar += amber;
                } else if (calcSugar <= redSugar) {
                    pointsSugar += red;
                } else {
                    pointsSugar += 0;
                }
                // Calculated Sodium Evaluation
                if (calcSodium <= greenSodium) {
                    pointsSodium += green;
                } else if (calcSodium <= amberSodium) {
                    pointsSodium += amber;
                } else if (calcSodium <= redSodium) {
                    pointsSodium += red;
                } else {
                    pointsSodium += 0;
                }
                // alert("Total Fat: " + pointsTotFat + "\n" + "Sat Fat: " + pointsSatFat + "\n" + "Sugar: " + pointsSugar +
                //     "\n" + "Sodium: " + pointsSodium);
                // Food Color Evaluation
                var totalPoints = pointsTotFat + pointsSatFat + pointsSugar + pointsSodium;
                var color = null;
                if (totalPoints <= 0) {
                    color = 'gray';
                } else if (totalPoints <= 6) {
                    color = 'green';
                } else if (totalPoints <= 9) {
                    color = 'amber';
                } else if (totalPoints <= 12) {
                    color = 'red';
                } else {
                    color = null;
                }

                // Display Results
                $('#calcKcal').val(calcKcal);
                $('#calcTotFat').val(calcTotFat);
                $('#calcSatFat').val(calcSatFat);
                $('#calcSugar').val(calcSugar);
                $('#calcSodium').val(calcSodium);
                $('#grade').val(totalPoints);
                $('#color').val(color);
            }
        }
    </script>
</x-admin.layout>
