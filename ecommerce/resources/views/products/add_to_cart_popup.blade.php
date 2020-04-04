<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/1/2020
 * Time: 4:24 PM
 */
?>
<!-- Modal -->
<div class="modal fade" id="add_to_cart_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="add_to_cart_form" action="/addToCart" method="post">
                    {{csrf_field()}}
                    <input name="product_id" type="hidden" id="product_id">
                    <input name="quantity" type="number" min="1" value="1" class="input-group" id="quantity">
                    <div class="modal-footer">
                        {{--data-dismiss="modal"--}}
                        <button type="submit" class="btn btn-secondary close-popup btn-submit">Add</button>
                        {{--<button type="submit" id="goToShoppingCart" class="btn btn-primary btn-submit">Go to shopping cart</button>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
