



<x-user.layout :studs="$students" :notifs="$notifications" :isSurveyAvail="$isSurveyAvail">

    <x-user.health-mod.health :anak="$anaks" :bmi="$bmi" :parent="$parent" :restricts="$restricts" :purchases="$purchases"  :average_grade="$average_grade"/>

</x-user.layout>

<script>
    //For delete button
    $(document).on('click', 'button[id^="del"]',  function(e){
        e.preventDefault();

        var anak_id = $(this).val();

        console.log(anak_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
        title: 'Are you sure?',
        text: "You want to unrestrict this item? Unrestricting this item means the student can order this item in the canteen.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Unrestrict'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
            method: "POST",
            url: "remove-restrict",
            data: {"anak-id":anak_id},
            success: function(response){
                //window.location.reload();
             $('.restriction').load(location.href + " .restriction");
                // $('.cartsummary').load(location.href + " .cartsummary");

                }
            })
          }
        })

        
    });
</script>