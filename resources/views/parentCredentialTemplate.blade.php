

<script src="https://cdn.tailwindcss.com"></script>

@component('mail::message')
    <p>OTP Request</p>
    <div class="text-center">
        <h1>Good day parent! This is your account credentils for MenuPo. Order now!</h1>
        <p class="text-xl">Email:</p>
        <p class="text-2xl font-bold">{{$emailMail}}</p>
        <p class="text-xl">Password:</p>
        <p class="text-2xl font-bold">{{$passwordMail}}</p>
        <a href="https://menu-po.com/login">Click this to change your password.</a>
    </div>
@endcomponent

