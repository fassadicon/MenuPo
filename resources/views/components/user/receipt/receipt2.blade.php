
@props(['items'])
@props(['item_array'])

<div class="h-screen w-screen justify-center align-center ">
    
    <div class="h-auto w-80 py-8 mx-auto border-solid border-4 border-primary rounded-lg">
        <div id="receipt" class="">
            <div class="mb-4">
                <h3 class="text-center text-2xl text-black font-bold">Receipt</h3>
                <p class="text-center text-gray-400">{{\Carbon\Carbon::now('Asia/Singapore')->toDateTimeString()}}</p>
            </div>
            
            <table class="w-full h-80 mx-auto">
                <thead class="text-center text-primary">
                    <th class="w-40">Name</th>
                    <th class="w-40">Qty</th>
                    <th class="w-40">Price</th>
                </thead>
                <tbody class="text-center">
                    @php
                        $total_price = 0;
                        $size = sizeOf($items);
                        for( $i=0; $i< $size; $i++){
                            $total_price += $items[$i]->quantity * $items[$i]->amount;
                            $price = $items[$i]->amount * $items[$i]->quantity;
                            echo "<tr class='h-4'>
                                    <td class='w-20'>{$item_array[$i]->name}</td>
                                    <td class='w-20'>{$items[$i]->quantity}</td>
                                    <td class='w-20'>$price</td>
                                </tr>";
                        }
                    @endphp
                    
                    
                    <tr  class="h-20 text-xl">
                        <td class="w-20"></td>
                        <td class="w-20 text-primary"><b>Total:</b></td>
                        <td class="w-20">{{$total_price}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <button onclick="doCapture()" class=" bg-[#ffc300] hover:bg-blue-900 hover:text-white text-black font-bold py-2 px-4 rounded">Download Receipt</button>
            <a href="/user/user-account" class=" bg-blue-900 hover:bg-[#ffc300] hover:text-black text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
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
</script>
  