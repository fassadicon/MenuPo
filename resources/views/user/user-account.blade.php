




<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">

    <x-user.user-account.page-content :chart="$chart" :purchases="$purchases" :reqbutton="$reqbutton" :parent="$parent" :studs="$students"/>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

</x-user.layout>

<script>
    //Change pass request
  $(document).on('click', '.changepassreq',  function(e){
        e.preventDefault();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: 'change-pass-request',
            success: function(response){
              //window.location.reload();
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Request submitted. Please wait for the OTP that will be send to your email.',
                showConfirmButton: false,
                timer: 2000
              });
              $('.reqdiv').load(location.href + " .reqdiv");
              $('.homenotif').load(location.href + " .homenotif");
              
            }
        })
    });
</script>