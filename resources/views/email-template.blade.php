

<script src="https://cdn.tailwindcss.com"></script>

@component('mail::message')
    <p>OTP Request</p>
    <div class="text-center">
        <p class="text-xl">This is your OTP:</p>
        <p class="text-2xl font-bold">{{$otp}}</p>
        <a href="https://menu-po.com/user/otp-page">Click this to change your password.</a>
    </div>
@endcomponent

