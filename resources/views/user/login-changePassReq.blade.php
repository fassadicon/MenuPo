<x-user.layout2>
    <br><br><br>
    <br><br><br>
    <div class="h-screen">
        <form class="w-2/3 text-center h-80 mx-auto border border-2 border-solid" action="/send-otp-password">
            <div class="">
                <label class="font-bold text-lg" for="">Email: </label>
                <input class="text-lg rounded-lg" name="email" type="text">
            </div>
            <button type='submit' class='button-sec w-full md:w-40 mt-4 text-xl bg-primary text-secondary font-bold rounded-lg'>Send OTP</button>
            
        </form>
    </div>
    
</x-user.layout2>