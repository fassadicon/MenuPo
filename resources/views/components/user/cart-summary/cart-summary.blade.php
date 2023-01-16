@props(['anak'])
@props(['parent'])

@php
    $items = Cart::content();
@endphp
    <div class="cartItems bg-zinc-50 h-screen mt-12">
        <div class="text-center mb-2">
            <p class="text-2xl pt-8 text-primary font-bold text-decoration-none">Cart Summary</p>
        </div>
        <a href="/user/menu/{{$anak->id}}" class=" block w-24 mx-auto mt-2 mb-4 md:my-4 text-sm text-secondary hover:text-primary"><i class="fa-solid fa-arrow-left fa-lg"></i> Go Back</a>
        <div class="w-10/12 h-3/4 mx-auto md:w-2/3 md:flex">
            <div class="h-3/4 justify-center bg-zinc-50 rounded-lg overflow-y-auto md:w-2/3 md:h-full">
                @foreach ($items as $val)
                    <div class="w-full flex shadow-lg bg-zinc-50 mb-2 rounded-lg">
                        <div class="w-full h-28 flex">
                            <img class="m-4 rounded-full w-20 h-20" src="{{ $val->options->image ? asset($val->options->image ) : asset('storage/admin/userNoImage.png') }}""
                            alt="Image">
                            <div class="">
                                <div class="">
                                    <p class="text-lg font-bold mt-2 break-words">{{$val->name}}</p>
                                    <p class="text-sm break-words">Qty: {{$val->qty}}</p>
                                </div>
                                <div>
                                    <p>Price: {{$val->price * $val->qty}}</p>
                                </div>
                            </div>
                           
                        </div>
                        <div class="w-12 h-28 text-center md:w-40">
                            
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
            <form class="relative h-1/4 bg-zinc-50 shadow bg-zinc-50 rounded-lg md:ml-4 md:h-80 md:w-1/3" action="/user/payment" method="POST">
                @csrf
                <div >
                    <div class="hidden md:block subtotal h-40 items-end w-full mt-2">
                        <span class="text-xl text-secondary font-bold p-4">Payment Details</span>
    
                        <div class="subtotal h-8 mt-8 items-end w-full p-4 ">
                            <span class="text-lg text-secondary font-semibold">Parent Name:</span>
                            <span class="text-lg font-bold float-right">{{$parent->firstName}} {{$parent->lastName}}</span>
                        </div>
    
                        <div class="subtotal h-8 items-end w-full p-4">
                            <span class="text-lg text-secondary font-semibold">Student Name: </span>
                            <span class="text-lg font-bold float-right">{{$anak->firstName.' '.$anak->lastName}}</span>
                            <input type="hidden" name="anak_id" id="anak_id" value="{{$anak->id}}">
                        </div>
                    </div>
                    <div class="subtotal h-8 items-end w-full p-4">
                        <span class="text-lg text-secondary font-semibold">Payment Option:</span>
                        <span class="text-lg font-bold float-right">GCash</span>
                    </div>
                    <div class="subtotal h-8 items-end w-full p-4">
                        <span class="text-lg text-secondary font-semibold">Total Amount:</span>
                        <span class="text-lg font-bold float-right">{{Cart::priceTotal()}}</span>
                    </div>
                    
                    <div class="absolute button w-full bottom-0 mx-auto text-center mb-2">
                        @php
                            if(Cart::count() != 0){
                                echo "<button type='submit' class='button-sec w-full md:w-40 text-xl bg-primary text-secondary font-bold'>Check Out</button>";
                            }
                        @endphp
                    </div>
                </div>
            </form>
        </div>
    </div>
