$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//slider component
function setSlider(){
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [amount1, amount2],
        slide: function (event, ui) {
            $("#amount").html("$" + ui.values[0] + " - $" + ui.values[1]);
            $("#amount1").val(ui.values[0]);
            $("#amount2").val(ui.values[1]);
        }
    });
    $("#amount").html("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
}
$(document).ready(function() {

    //pagination
    $('#per_page_select').change(function () {
        let items = $("#per_page_select option:selected").val();
        $.ajax({
            type: 'GET',
            url: '/products/' + items,
            dataType: 'html',
            success: function (data) {
                $('body').html(data);
            }
        });
    });

    //show add to cart popup
    $('.addToCartBtn').click(function(){
        let id = $(this).attr('id').split('-')[1];
        $('#product_id').val(id);
        $("#add_to_cart_popup").modal('show');

    });
    //hide addtocart popup
    $('.close-popup').click(function(){
        $("#add_to_cart_popup").modal('hide');
    });
    //set quantity in popup form
    $(".btn-submit").click(function(e){
        e.preventDefault();
        let id = $('#product_id').val();
        let quantity = $('#quantity').val();
        $.ajax({
            type:'POST',
            url:'/addToCart',
            data:{product_id:id, quantity:quantity},
            success:function(data){

            }

        });
    });

    setSlider();
});
