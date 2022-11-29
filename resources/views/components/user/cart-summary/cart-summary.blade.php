@props(['anak'])

<div class="h-screen w-screen"> 
       
    <div class="h-screen cartsummary">
        <div class="py-12">
        
        <div class="max-w-md mx-auto bg-blue-900 mt-20 shadow-lg rounded-lg  md:max-w-5xl">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="md:grid md:grid-cols-3  ">
                        @php
                            $items = Cart::content();
    
                            $totalCal = 0;
                            $totalAmount = 0;
    
                        @endphp
    
                        @foreach ($items as $val)
                            @php
                                $price = $val->price * $val->qty;
                                $totalAmount = Cart::priceTotal();
                            @endphp
                        @endforeach
                        
                        <div class="col-span-2 p-5 cartdetails">
                            <h1 class="text-xl font-medium text-yellow-400 ">Shopping Cart</h1>
                        
                            <div class="flex justify-between items-center mt-3 text-white">
                                
                                    <span class="w-20 ml-20" >Item</span>
                                    <span class="ml-24">Quantity</span>
                                    <span class="mr-10">Price</span>
                            </div>
                            @php
                                $items = Cart::content();
                        
                                $totalCal = 0;
                                $totalAmount = 0;
                        
                            @endphp
                            <div class="h-60 overflow-y-scroll">
                                @foreach ($items as $val)
                                    @php
                                        $price = $val->price * $val->qty;
                                        $totalAmount = Cart::priceTotal();
                                    
                                    @endphp
                                    <div class=" flex justify-between items-center mt-3">
                                        <div class="flex items-center">
                                            <img src="https://i.pinimg.com/564x/80/78/e4/8078e4a7626f514eccbf8a82b361579e.jpg" width="60" class="rounded-full ">
                            
                                            <div class="flex flex-col ml-3">
                                                <span class="md:text-md font-medium text-white">{{$val->name}}</span>
                                                <span class="text-xs font-light text-gray-400">{{'#'.$val->id}}</span>  
                                            </div>
                            
                                        </div>
                            
                                        <div class="flex justify-center items-center">
                                            <div class="pr-10 flex ">
                                                @if ($val->id != 13)
                                                    <button class="minusQty font-semibold text-white" id="minus<%=count++%>" value="{{$val->id}}" name="{{$val->id}}" ><i class="fa-solid fa-circle-minus"></i></button>
                                                @endif
                                            
                                                <span class="text-l text-white px-2 mx-2" >{{$val->qty}}</span>
                                                
                                                @if ($val->id != 13)
                                                    <button class="addQty font-semibold text-white" id="add<%=count++%>" value="{{$val->id}}" name="{{$val->id}}" ><i class="fa-solid fa-circle-plus"></i></button>
                                                @endif
                                                
                                            </div>
                                            
                                            
                            
                                            <div class="pr-8 flex">
                                                <span class="text-m font-medium text-white">{{'₱'.$price.'.00'}}</span>
                                                {{-- @livewire('order-summ-price', ['food_id' => $val->id, 'price' => $price]); --}}
                                            </div>
                            
                                            <div>
                                                @if ($val->id != 13)
                                                    <button type="submit" class="font-semibold text-white" id="del<%=count++%>" value="{{$val->id}}" name="rem-btn" >&times;</button>
                                                @endif
                                            </div>
                            
                                        </div>
                            
                                    </div>
                                
                                @endforeach
                            </div>
                            
                        
                            <div class="flex justify-between items-center mt-6 pt-6 border-t"> 
                                <div class="flex items-center">
                                    <a href="/user/menu/{{$anak->id}}">
                                        <i class="fa fa-arrow-left text-sm pr-2 text-yellow-400"></i>
                                        <span class="text-md  font-medium text-yellow-400">Continue Shopping</span>
                                    </a>
                                    
                                </div>
                        
                                
                                
                            </div>  
                        </div>
                        
                        <form action="/user/payment" method="POST">
                            @csrf
                            <div class="h-full p-3 bg-yellow-400 rounded overflow-visible">
    
                                <div class="header-title items-end pb-3">
                                    <span class="text-lg font-bold text-blue-900">Order Summary</span>
                                </div>
    
                                <div class="subtotal items-end">
                                    <span class="text-lg font-bold text-blue-900">Payment Option:</span>
                                    <span class="text-lg font-bold text-blue-900 float-right">GCash</span>
                                    
                                </div>
                                <div class="subtotal items-end">
                                    <span class="text-lg font-bold text-blue-900">Anak: </span>
                                    <span class="text-lg font-bold text-blue-900 float-right">{{$anak->stud_FN.' '.$anak->stud_LN}}</span>
                                    <input type="hidden" name="anak_id" id="anak_id" value="{{$anak->id}}">
                                    
                                </div>
    
                                <div class="subtotal items-end mt-52">
                                    <span class="text-lg font-bold text-blue-900">Subtotal:</span>
                                    {{-- @livewire('order-summ-sub-total', ['total_amount' => $totalAmount]) --}}
                                    <span class="subtotal text-lg font-bold text-blue-900 float-right">₱{{$totalAmount}}</span>
                                </div>
    
                            
                                @if(Cart::content()->count() != 0)
                                
                                    <div class="button">
                                        <button type="submit" class="h-12 w-full bg-blue-900 rounded mt-3  focus:outline-none font-bold text-yellow-400 hover:bg-blue-600">Check Out</button>
                                    </div>
                                
                                @endif
                                
                            </div>   
                        </form>    
                    </div>~
                    
                   
               </div>
            </div>
        </div>
        </div>
    </div> 
   
</div>