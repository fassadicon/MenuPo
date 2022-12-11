

<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">

    <div class="h-screen">
        <br><br><br>
        <br><br><br>

        <form class="w-5/6 mx-auto md:w-1/6" action="/user/submit-password" method="POST">
            @csrf
            
            <div>
                <label class="font-bold" for="">New password</label>
                @error('newpass')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <input class="mb-2 w-full rounded-lg" type="password" name="newpass" id="newpass">
            </div>

            <div>
                <label class="font-bold" for="">Confirm Password</label>
                <input class="target mb-2 w-full rounded-lg" type="password" name="confirmpass" id="confirmpass">
            </div>
            <p class="text-green-500 font-bold" id="status"></p>
            <div class="w-full mx-auto mb-2">
                <button type="submit" id="submit-btn" class="h-10 w-full bg-primary rounded mt-3 text-lg focus:outline-none font-bold text-secondary">Confirm</button>
            </div>
        </form>
    </div>

</x-user.layout>

<script>
    $( ".target" ).change(function() {
        var newpass = document.getElementById('newpass').value;
        var confirmpass = document.getElementById('confirmpass').value;

        if(newpass == confirmpass){
            document.getElementById('status').innerHTML = 'Password matched!';
            document.getElementById('status').style.color = 'green';
            document.getElementById("submit-btn").disabled = false;
            document.getElementById('submit-btn').style.backgroundColor = '#ffc300';
        }
        else{
            document.getElementById('status').innerHTML = 'Password does not match!';
            document.getElementById('status').style.color = 'red';
            document.getElementById("submit-btn").disabled = true;
            document.getElementById('submit-btn').style.backgroundColor = 'gray';
        }
    });
</script>