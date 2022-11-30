



<x-user.layout :studs="$students" :notifs="$notifications">

    <x-user.health-mod.health :anak="$anaks" :restricts="$restricts" :purchases="$purchases" :purchase_info="$purchase_info" :average_grade="$average_grade"/>

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
    });
</script>