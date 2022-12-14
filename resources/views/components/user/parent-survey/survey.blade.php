
@props(['parent'])


<br><br>


<section class="pt-12 pb-12 landing-image">
  <div class="container flex items-center justify-center p-6 mx-auto bg-white shadow-lg sm:p-12 md:w-1/2">
    <div class="w-full">

      <h1
        class="mb-4 text-2xl py-4 font-bold text-center text-transparent bg-clip-text bg-primary">
        Recommendation Survey Form ({{\Carbon\Carbon::now('Asia/Singapore')->toDateString();}})
      </h1>
      <form action="/users/survey-submit" method="POST">
        @csrf
        <div class="gap-2 mb-8 lg:flex">
            <div class="w-full py-2">
            <label class="block text-base font-bold">
                Your Name 
            </label>
            <input type="text" readonly
                class="w-full px-4 py-2 text-base border rounded-md focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="" value="{{$parent->firstName}} {{$parent->middleName}} {{$parent->lastName}}" name="name" id="name"/>
            </div>
            <div class="w-full py-2">

            <label for="role" class="block text-base font-bold">
                Select your role in the school
            </label>
            <input class="w-full rounded-lg" type="text" disabled name="role" value="Parent">
            </div>
        </div>

        <div class="gap-2 mb-8 lg:flex">
            <p class="font-bold">In a rate of 1-5, how well is the current canteen menu? </p> <br>
            <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="rating" id="flexRadioDefault2" value="5" checked>
            <label class="form-check-label inline-block text-gray-800" for="5" value="5">
                5
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="rating" id="flexRadioDefault1" value="4">
            <label class="form-check-label inline-block text-gray-800" for="4" value="4">
                4
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="rating" id="flexRadioDefault1" value="3">
            <label class="form-check-label inline-block text-gray-800" for="3" value="3">
                3
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="rating" id="flexRadioDefault1" value="2">
            <label class="form-check-label inline-block text-gray-800" for="2" value="2">
                2
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="rating" id="flexRadioDefault1" value="1">
            <label class="form-check-label inline-block text-gray-800" for="1" value="1">
                1
            </label>
            </div>
            
        </div>

      
        <div class="gap-2 mb-8 lg:flex">
            <div class="w-full">
            <label class="block text-base font-bold">
                Any food-item or rice meal suggestions?
            </label>
            <input type="text"
                class="w-full px-4 py-2 text-base border rounded-md focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="Type here" name="meal_suggest"/>
            </div>
            
        </div>
        <div class="">
            <label class="block text-base font-bold">
            If you have any recommendations/comment, please type here
            </label>
            <textarea id="" rows="8" cols="30"
            class="w-full p-3 text-base border rounded-md focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
            placeholder="Type here" name="recommendation"></textarea>
        </div>
        {{-- <button type="submit" class="button-hero mt-4">
            <span>Submit</span>
        </button> --}}
        <button type="submit" class="h-10 w-full bg-primary rounded mt-3 text-lg focus:outline-none font-bold text-secondary hover:bg-secondary hover:text-primary ">Submit</button>
    </form>
    </div>
  </div>
</section>