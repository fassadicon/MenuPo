

<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">

    <br><br><br>
    <br><br><br>
    <div class="h-screen py-20 px-3">
        <div class="container mx-auto">
            <div class="max-w-sm mx-auto md:max-w-lg">
                <div class="w-full">
                    <div class="bg-white h-64 py-3 rounded text-center">
                        <h1 class="text-3xl text-secondary font-bold">OTP Verification</h1>
                        <div class="flex flex-col mt-4">
                            <span>Enter the OTP you received at</span>
                            <span class="font-bold">{{auth()->user()->email}}</span>
                        </div>
                        <form action="/user/submit-otp" method="POST">   
                            @csrf
                            <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
                                <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="first" id="first" maxlength="1" /> 
                                <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="second" id="second" maxlength="1" /> 
                                <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="third" id="third" maxlength="1" /> 
                                <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="fourth" id="fourth" maxlength="1" />
                                <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="fifth" id="fifth" maxlength="1" /> 
                                <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="sixth" id="sixth" maxlength="1" />
                            </div>
                            @if(session()->has('message'))
                                <p class="text-red-500 text-lg font-bold">
                                    {{ session()->get('message') }}
                                </p>
                            @endif

                            <div class="w-40 mx-auto mb-2">
                                <button type="submit" class="h-10 w-full bg-primary rounded mt-3 text-lg focus:outline-none font-bold text-secondary hover:bg-secondary hover:text-primary ">Confirm</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user.layout>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
    function OTPInput() {
    const inputs = document.querySelectorAll('#otp > *[id]');
    for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput(); });

</script>