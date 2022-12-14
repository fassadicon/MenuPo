@include('sweetalert::alert')
@props(['items'])
@props(['paymentLink'])

<div class="h-screen w-screen justify-center align-center ">
    
    <div class="h-auto w-80 py-8 mx-auto border-solid border-4 border-primary rounded-lg">
        <div id="receipt" class="">
            <div class="mb-4">
                <h3 class="text-center text-2xl text-black font-bold">Receipt</h3>
                <p class="text-center text-gray-400">{{\Carbon\Carbon::now('Asia/Singapore')->toDateTimeString()}}</p>
            </div>
            
            <table class="w-full h-auto mx-auto">
                <thead class="text-center text-gray-500">
                    <th class="w-40">Name</th>
                    <th class="w-40">Qty</th>
                    <th class="w-40">Price</th>
                </thead>
                <tbody class="text-center">
                    @php
                        $total_price = 0;
                        foreach($items as $item){
                            $total_price += $item->qty * $item->price;
                            echo "<tr class='h-12'>
                                    <td class='w-20'>$item->name</td>
                                    <td class='w-20'>$item->qty</td>
                                    <td class='w-20'>$item->price</td>
                                </tr>";
                        }
                    @endphp

                    <tr class="h-12 text-xl border-t border-dashed">
                        <td class="w-20"></td>
                        <td class="w-20 text-black font-bold">Total:</td>
                        <td class="w-20 font-bold">{{$total_price}}</td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
        <div class="text-center">
            <button onclick="doCapture()" class=" bg-[#ffc300] hover:bg-blue-900 hover:text-white text-black font-bold py-2 px-4 rounded">Download Receipt</button>
            <a href="{{$paymentLink}}" onclick="myFunction()" target="_blank" class=" bg-blue-900 hover:bg-[#ffc300] hover:text-black text-white font-bold py-2 px-4 rounded">Payment</a>
        </div>
        <a id="home" class="text-center text-lg text-secondary font-bold mt-2" hidden href="/user/home"> <- Back to homepage</a>
    </div>
</div>

{{-- For download button --}}
<script>
    function doCapture(){
      var a = document.createElement('a');
      html2canvas(document.getElementById("receipt")).then(function(canvas){
        // console.log(canvas.toDataURL("image/jpeg", 0.9))
        a.href = canvas.toDataURL("image/jpeg", 1);
        a.download = "sample.jpeg";
        a.click();
  
      })
    }

    function myFunction() {
        document.getElementById("home").style.display = "block";
    }
    
</script>
