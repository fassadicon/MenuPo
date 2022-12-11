

<script src="https://cdn.tailwindcss.com"></script>

@component('mail::message')
    <p>OTP Request</p>
    <div class="text-center">
        <p class="text-xl">This is your OTP:</p>
        <p class="text-2xl font-bold">{{$otp}}</p>
        <a href="http://127.0.0.1:8000/user/otp-page">Click this to change your password.</a>
    </div>
@endcomponent

