<x-admin.layout :notifs="$adminNotifs">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    
    <p>Dashboard</p>

    {{-- CLOCK --}}
    
    <div class='clock-container'>
        <div class='clock'>
          <div class='date'></div>
          <div class='hr'></div>
          <div class='colon'>:</div>
          <div class='min'></div>
          <div class='colon'>:</div>
          <div class='sec'></div>
        </div>
      </div>
      
      <div ALIGN="center">
        <div style="color:red;font-size: 30px; " id="closed"> Canteen is Closed</div>
        <div style="color:green; font-size: 30px;" id="open">Canteen is Open</div>
        
    </div> 
    
    
    {{-- CARDS --}}
    <div class="container mx-auto">
        <div class="flex flex-col w-full">
          <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 my-2 w-full">
            <div class="shadow-lg metric-card bg-white dark:bg-green-900 border border-green-200 dark:border-green-800 rounded-lg p-4 max-w-72 w-full" style="cursor: auto;">
                <div class="flex items-center text-xl dark:text-black-100">
                    <div class="text-xl font-semibold text-gray-400">Orders Completed Today
                        <div class="mt-2 text-4xl font-extrabold spacing-sm text-black dark:text-white" style="cursor: auto;">5,412 </div>
            </div>
            <div class="text-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 ml-96">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
            </div>
        </div> 

        <div class="shadow-lg metric-card bg-white dark:bg-green-900 border border-green-200 dark:border-green-800 rounded-lg p-4 max-w-72 w-full" style="cursor: auto;">
            <div class="flex items-center text-xl dark:text-black-100">
                <div class="text-xl font-semibold text-gray-400">Pending Pre-Orders Today
                    <div class="mt-2 text-4xl font-extrabold spacing-sm text-black dark:text-white" style="cursor: auto;">5,412 </div>
        </div>
        <div class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 ml-96">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
              </svg>
              
            </div>
        </div>
    </div>

    <div class="shadow-lg metric-card bg-white dark:bg-green-900 border border-green-200 dark:border-green-800 rounded-lg p-4 max-w-72 w-full" style="cursor: auto;">
        <div class="flex items-center text-xl dark:text-black-100">
            <div class="text-xl font-semibold text-gray-400">Food Items in the Menu Today
                <div class="mt-2 text-4xl font-extrabold spacing-sm text-black dark:text-white" style="cursor: auto;">5,412 </div>
    </div>
    <div class="text-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 ml-96">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
          </svg>
          
        </div>
    </div>
</div>

<div class="shadow-lg metric-card bg-white dark:bg-green-900 border border-green-200 dark:border-green-800 rounded-lg p-4 max-w-72 w-full" style="cursor: auto;">
    <div class="flex items-center text-xl dark:text-black-100">
        <div class="text-xl font-semibold text-gray-400">Canteen Sales for Today
            <div class="mt-2 text-4xl font-extrabold spacing-sm text-black dark:text-white" style="cursor: auto;">5,412 </div>
</div>
<div class="text-green-500">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 ml-96">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      
      
    </div>
</div>
</div>
              
            
          </div>
        </div>
    </div>
    {{-- End of CARDS --}}


</x-admin.layout>
