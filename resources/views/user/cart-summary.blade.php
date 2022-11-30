

<x-user.layout :studs="$students" :notifs="$notifications">

    <br>
    <x-user.cart-summary.cart-summary :anak="$anak"/>

</x-user.layout>

<script>
    
    //For add button
    $(document).on('click', 'button[id^="add"]',  function(e){
        e.preventDefault();

        var food_id = $(this).val();

        console.log(food_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-cart-add",
            data: {"food-id":food_id},
            success: function(response){
                //window.location.reload();
                $('.cartItems').load(location.href + " .cartItems");
                $('.cartsummary').load(location.href + " .cartsummary");
                $('.subtotal').load(location.href + " .subtotal");
            }
        })
    });

    //For minus button
    $(document).on('click', 'button[id^="minus"]',  function(e){
        e.preventDefault();

        var food_id = $(this).val();
        console.log(food_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-cart-minus",
            data: {"food-id":food_id},
            success: function(response){
                //window.location.reload();
                $('.cartItems').load(location.href + " .cartItems");
                $('.cartsummary').load(location.href + " .cartsummary");
                $('.subtotal').load(location.href + " .subtotal");

            }
        })
    });

    //For delete button
    $(document).on('click', 'button[id^="del"]',  function(e){
        e.preventDefault();

        var food_id = $(this).val();
        console.log(food_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-cart-delete",
            data: {"food-id":food_id},
            success: function(response){
                //window.location.reload();
                $('.cartItems').load(location.href + " .cartItems");
                $('.cartsummary').load(location.href + " .cartsummary");
                $('.subtotal').load(location.href + " .subtotal");

            }
        })
    });

</script>
    