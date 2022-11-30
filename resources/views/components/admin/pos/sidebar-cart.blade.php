


<form class="w-1/3 h-screen mt-20 mr-4 border-2 border-solid rounded-xl shadow" action="{{ route('pos.order')}}" method="POST">
    @csrf
    <div class="p-4">
        <p class="text-xl font-bold">Cart Summary</p>
        <p class="text-lg">Items: {{Cart::count()}}</p>
    </div>

    <div class="sideBar h-80 overflow-y-scroll p-2">
        @php
            $item = Cart::content();
            
        @endphp

        @foreach ($item as $val)
            @php 
                $price = $val->price * $val->qty;
                $totalAmount = Cart::priceTotal();
            @endphp
            <div class="flex mt-3">
                <div class="w-48 flex mr-8 items-center">
                    <img src="https://i.pinimg.com/564x/80/78/e4/8078e4a7626f514eccbf8a82b361579e.jpg" width="60" class="rounded-full ">

                    <div class="flex flex-col ml-3">
                        <span class="md:text-md font-medium text-black">{{$val->name}}</span>
                        <span class="text-xs font-light text-gray-400">{{'#'.$val->id}}</span>  
                    </div>

                </div>

                <div class="flex justify-center items-center">
                    @if ($val->id != 13)
                        <div class="w-20 mr-4 flex ">
                            <button class="minusQty font-semibold " id="minus<%=count++%>" value="{{$val->id}}" name="{{$val->id}}" >-</button>
                            <span class="text-l text-black px-2 mx-2" >{{$val->qty}}</span>
                            <button class="addQty font-semibold" id="add<%=count++%>" value="{{$val->id}}" name="{{$val->id}}" >+</button>
                        </div>

                        <div class="pr-4 flex">
                            <span class="text-m font-medium text-black">{{'₱'.$price.'.00'}}</span>
                            {{-- @livewire('order-summ-price', ['food_id' => $val->id, 'price' => $price]); --}}
                        </div>

                        <div>
                            <button type="submit" class="font-semibold text-black" id="del<%=count++%>" value="{{$val->id}}" name="rem-btn" >&times;</button>
                        </div>
                    @endif
                </div>
            </div>  
        @endforeach
    </div>

    <div class="subTotal h-40 p-2">
        <div class="space-x-60">
            <span class="ml-4 text-lg font-bold text-blue-900">Discount:</span>
            <span class="text-lg font-bold text-blue-900">{{Cart::priceTotal()}}</span>
            {{-- <span class="text-lg font-bold text-blue-900 float-right">₱{{$totalAmount}}</span> --}}
        </div>
        <div class="space-x-60">
            <span class="ml-4 text-lg font-bold text-blue-900">Subtotal:</span>
            <span class="text-lg font-bold text-blue-900">{{Cart::priceTotal()}}</span>
            {{-- <span class="text-lg font-bold text-blue-900 float-right">₱{{$totalAmount}}</span> --}}
        </div>
        <div class="checkout text-center">
            @if(Cart::content()->count() != 0)           
                <button type="submit" class="h-12 w-80 bg-blue-900 rounded mt-3 focus:outline-none font-bold text-yellow-400 hover:bg-blue-600">Check Out</button>
            @endif
        </div>
    </div>
</form>