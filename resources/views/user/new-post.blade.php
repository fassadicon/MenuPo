



<x-user.layout :studs="$students" :notifs="$notifications">
    <br><br><br>
    <br><br>
    
        <div class="sm:max-w-lg  border-2 border-solid rounded-lg w-full p-10 bg-white rounded-xl z-10 mx-auto">
            <div class="text-center">
                <h2 class="mt-5 text-3xl font-bold text-gray-900">
                    Create new post!
                </h2>
                <p class="mt-2 text-sm text-gray-400">Nuestra Seniora De Aranzazu Parochial School.</p>
            </div>
            <form class="mt-8 space-y-3" action="/newpost-store" method="POST">
                @csrf
                <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Title</label>
                        <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" placeholder="" name="title">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Description</label>    
                        <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="description" id="" cols="30" rows="10"></textarea>
                
                </div>
                <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Attach an image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" name="image" type="file" multiple>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                </div>
                       
                <div>
                    <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                    Post!
                </button>
                </div>
            </form>
        </div>
    {{-- </div> --}}

<style>
.has-mask {
    position: absolute;
    clip: rect(10px, 150px, 130px, 10px);
}
</style>
    <br><br>
</x-user.layout>