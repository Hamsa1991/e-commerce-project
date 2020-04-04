<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/3/2020
 * Time: 12:21 AM
 */
?>

<script type="text/javascript">
    var amount1 = "<?php Print(isset($price1)?$price1:0); ?>";
    var amount2 = "<?php Print(isset($price2)?$price2:500); ?>";
</script>

    <p id="amount"></p>
    <div id="slider-range" class=""></div>

    <input type="hidden" id="amount1" name="amount1" value="{{isset($price1)?$price1:0}}">
    <input type="hidden" id="amount2" name="amount2" value="{{isset($price2)?$price2:500}}">

