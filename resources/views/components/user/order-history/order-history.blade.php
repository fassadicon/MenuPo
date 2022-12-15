


<tr class="h-8">
    <td>#{{$purchase->id}}</td>
    <td><a href="/user/receipt/{{$purchase->id}}"><i class="fa-solid fa-receipt"></i></a></td>
    <td>{{$purchase->totalAmount}}</td>
    @if ($purchase->payment->paymentStatus == 'unpaid')
        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> Pending </span> </td>
    @elseif($purchase->payment->paymentStatus == 'paid')
        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
    @else
        <td class="px-6 py-4 text-center"> <span class="text-black text-sm w-1/3 pb-1 bg-zinc-200 font-semibold px-2 rounded-full"> Test </span> </td>
    @endif
    <td>{{$purchase->created_at}}</td>
</tr>






{{-- <td class="px-6 py-4">
    <div class="flex items-center space-x-3">
        <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset('user/assets/img/avatar/user-dp.png') }}' /> </div>
        <div>
            <p> Order to: Student Name</p>
            <p class="text-gray-500 text-sm font-semibold tracking-wide"> Spaghetti </p>
        </div>
    </div>
</td> --}}
