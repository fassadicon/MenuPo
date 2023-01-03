@props(['image'])
<style>
    .gradient2 {
  background-image: linear-gradient(
    to bottom,
    rgba(243, 244, 246, 0.1),
    rgba(0, 0, 0, 0.7)
  );
}

.group:hover .group-hover\:translate-y-0 {
  transform: translateY(0);
}


</style>

     <section class="px-2 pb-2 bg-white md:px-0">
        <div class="container items-center max-w-screen-xl px-8 mx-auto xl:px-5">
          <div class="flex flex-wrap items-center sm:-mx-3">
            <div class="flex w-full md:px-3">
                <h3 class="text-xl font-bold text-gray-800">HEALTH INFOGRAPHICS
                </h3>
                
            </div>
            
          </div>
        </div>
       
      </section>
      {{-- infographic --}}
      <div class="bg-secondary h-full md:py-12">
        <div class="max-w-screen-xl mx-auto px-4 pt-16 pb-4">
          <div class="flex flex-col flex-wrap md:flex-row md:-mx-2">
            {{-- item 1 --}}
            <div class="w-full md:w-1/2 lg:w-1/4 mb-4 lg:mb-0">
              <a href="https://i.fnri.dost.gov.ph/fct/library" target=”_blank” class="h-72 md:h-96 block group relative mx-2 overflow-hidden shadow-lg">
                <img src="{{ asset('images/user-home/infographic-img-1.jpg') }}" class="absolute z-0 object-cover w-full h-72 md:h-96 transform group-hover:scale-150">
                <div class="absolute gradient2 transition duration-300 group-hover:bg-black group-hover:opacity-90 w-full h-72 md:h-96 z-10"></div>
                <div class="absolute left-0 right-0 bottom-0 p-6 z-30 transform translate-y-1/2 transition duration-300 h-full group-hover:translate-y-0 delay-100">
                  <div class="h-1/2 relative">
                    <div class="absolute bottom-0">
                      <h2 class="font-bold text-white leading-tight transition duration-300 text-xl pb-6 group-hover:underline">DOST-FNRI Philippine Food Composition Table</h2>
                    </div>
                  </div>
                  <div class="h-1/2">
                    <p class="text-white pb-4 opacity-0 transition duration-300 group-hover:opacity-100">See and explore the Philippine Food Composition Table library, the basis of nutritional information provided in the menu.</p>
                    <form action="{{ url('philfct') }}">
                      <button class="button-sec px-3 py-1 font-semibold opacity-0 transition duration-300 group-hover:opacity-100">Read More</button>
                    </form>
                  </div>
                </div>
              </a>
            </div>
            {{-- item 2 --}}
            <div class="h-72 md:h-96 w-full md:w-1/2 lg:w-1/4 mb-4 lg:mb-0">
              <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC5452210/#:~:text=Foods%20were%20classified%20as%20%E2%80%9CRed,of%20Health%20traffic%20light%20criteria." target=”_blank” class="h-72 md:h-96 block group relative mx-2 overflow-hidden shadow-lg">
                <img src="{{ asset('images/user-home/infographic-img-2.jpg') }}" class="absolute z-0 object-cover w-full h-72 md:h-96 transform group-hover:scale-150">
                <div class="absolute gradient2 transition duration-300 group-hover:bg-black group-hover:opacity-90 w-full h-72 md:h-96 z-100"></div>
                <div class="absolute left-0 right-0 bottom-0 p-6 z-30 transform translate-y-1/2 transition duration-300 h-full group-hover:translate-y-0 delay-100">
                  <div class="h-1/2 relative">
                    <div class="absolute bottom-0">
                      <h2 class="font-bold text-white leading-tight transition duration-300 text-xl pb-6 group-hover:underline">Food Nutritional Color Traffic Light System</h2>
                    </div>
                  </div>
                  <div class="h-1/2">
                    <p class="text-white pb-4 opacity-0 transition duration-300 group-hover:opacity-100">Learn more about the UK Food Traffic Light System that determines the nutritional value of a food item</p>
                    <button class="button-sec px-3 py-1 font-semibold opacity-0 transition duration-300 group-hover:opacity-100">Read More</button>
                  </div>
                </div>
              </a>
            </div>
            {{-- item 3 --}}
            <div class="h-72 md:h-96 w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
              <a href="https://www.deped.gov.ph/2017/03/14/do-13-s-2017-policy-and-guidelines-on-healthy-food-and-beverage-choices-in-schools-and-in-deped-offices/" target=”_blank” class="h-72 md:h-96 block group relative mx-2 overflow-hidden shadow-lg">
                <img src="{{ asset('images/user-home/infographic-img-3.jpg') }}" class="absolute z-0 object-cover w-full h-72 md:h-96 transform group-hover:scale-150">
                <div class="absolute gradient2 transition duration-300 group-hover:bg-black group-hover:opacity-90 w-full h-72 md:h-96 z-10"></div>
                <div class="absolute left-0 right-0 bottom-0 p-6 z-30 transform translate-y-1/2 transition duration-300 h-full group-hover:translate-y-0 delay-100">
                  <div class="h-1/2 relative">
                    <div class="absolute bottom-0">
                      <h2 class="font-bold text-white leading-tight transition duration-300 text-xl pb-6 group-hover:underline">DepEd Policy and Guidelines on Healthy Food and Beverage Choices</h2>
                    </div>
                  </div>
                  <div class="h-1/2">
                    <p class="text-white pb-4 opacity-0 transition duration-300 group-hover:opacity-100">Explore more about the DepEd Order No. 13, s.2017 that aims to improve nutritional intervention in schools</p>
                    <button class="button-sec px-3 py-1 font-semibold opacity-0 transition duration-300 group-hover:opacity-100">Read More</button>
                  </div>
                </div>
              </a>
            </div>
            {{-- item 4 --}}
            <div class="h-72 md:h-96 w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
              <a href="#" target=”_blank” class="h-72 md:h-96 block group relative mx-2 overflow-hidden shadow-lg">
                <img src="{{ asset('images/user-home/infographic-img-4.jpg') }}" class="absolute z-0 object-cover w-full h-72 md:h-96 transform group-hover:scale-150">
                <div class="absolute gradient2 transition duration-300 group-hover:bg-black group-hover:opacity-90 w-full h-72 md:h-96 z-10"></div>
                <div class="absolute left-0 right-0 bottom-0 p-6 z-30 transform translate-y-1/2 transition duration-300 h-full group-hover:translate-y-0 delay-100">
                  <div class="h-1/2 relative">
                    <div class="absolute bottom-0">
                      <h2 class="font-bold text-white leading-tight transition duration-300 text-xl pb-6 group-hover:underline">Learn More About Healthy Parenting in Nutrition of your Children</h2>
                    </div>
                  </div>
                  <div class="h-1/2">
                    <p class="text-white pb-4 opacity-0 transition duration-300 group-hover:opacity-100">See more about how to be a good parent in guiding your child to a healthier diet.</p>
                    <button class="button-sec px-3 py-1 font-semibold opacity-0 transition duration-300 group-hover:opacity-100">Read More</button>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
     
     
     
     
    
