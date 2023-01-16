@props(['studentID']);


<form class="w-1/3 h-2/3 mt-20 mr-4 bg-gradient-to-tl from-yellow-100 via-yellow-300 to-yellow-500 border-2 border-solid rounded-xl shadow"
    action="/admin/pos/payment/{{ $studentID }}" method="POST">
    @csrf
    <div class="p-4">
        <p class="text-xl mb-0 font-bold">Cart Summary</p>
        <p class="itemCount mb-0 text-lg">Items: {{ Cart::count() }}</p>
    </div>

    <div class="sideBar h-96 overflow-y-auto p-2">
        @php
            $item = Cart::content();
        @endphp

        @foreach ($item as $val)
            @php
                $price = $val->price * $val->qty;
                $totalAmount = Cart::priceTotal();
            @endphp
            <div class="flex shadow-lg bg-zinc-50 mb-2 border-t-2 border-l-2 border-r-4 border-b-4 border-solid border-gray-800 rounded-lg">
                <div class="w-full h-28 flex">
                    <img class="m-4 rounded-full" src="{{ $val->options->image ? asset($val->options->image ) : asset('storage/admin/userNoImage.png') }}""
                    alt="Image">
                    <div class="">
                        <p class="text-lg mb-0 font-bold break-words">{{$val->name}}</p>
                        <p class="text-sm mb-0 break-words">Qty: {{$val->qty}}</p>
                        <p>Price: {{$val->price * $val->qty}}</p>
                    </div>
                   
                </div>
                <div class="w-12 h-28 text-center md:w-20">
                    
                    @if ($val->id != 2)
                        <button class="w-full h-8 mt-1" id="del<%=count++%>" value="{{$val->id}}"><i class="fa-solid fa-xmark text-gray-400"></i></button>
                        <button class="w-full h-8 mt-1" id="minus<%=count++%>" value="{{$val->id}}"><i class="fa-solid fa-minus rounded-full p-1 bg-red-400 text-gray-50 "></i></button>
                        <button class="w-full h-8 mt-1" id="add<%=count++%>" value="{{$val->id}}"><i class="fa-solid fa-plus rounded-full p-1 bg-yellow-400 text-gray-50 "></i></button>
                    @else
                        <button class="w-full h-8 mt-1"></button>
                        <button class="w-full h-8 mt-1"></button>
                        <button class="w-full h-8 mt-1"></button>
                    @endif
                   
                </div>
            </div>
        @endforeach
    </div>

    <div class="subTotal h-40 p-2">
        <div class="space-x-60">
            <span class="ml-4 text-lg font-bold text-blue-900">Discount:</span>
            <span class="text-lg font-bold text-blue-900">{{ Cart::priceTotal() }}</span>
            {{-- <span class="text-lg font-bold text-blue-900 float-right">₱{{$totalAmount}}</span> --}}
        </div>
        <div class="space-x-60">
            <span class="ml-4 text-lg font-bold text-blue-900">Subtotal:</span>
            <span class="text-lg font-bold text-blue-900">{{ Cart::priceTotal() }}</span>
            {{-- <span class="text-lg font-bold text-blue-900 float-right">₱{{$totalAmount}}</span> --}}
        </div>
        <div class="checkout text-center">
            @if (Cart::content()->count() != 0)
                <button type="submit"
                    class="h-12 w-80 bg-blue-900 rounded mt-3 focus:outline-none font-bold text-yellow-400 hover:bg-blue-600">Check
                    Out</button>
            @endif
        </div>
    </div>
</form>
