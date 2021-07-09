<div id="cart" class="col-lg-3 col-md-3 col-sm-12">
    <a class="mt-4 mr-2" href="index.php?page_layout=cart">giỏ hàng</a><span class="mt-3">
        <?php
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['qtt'])){
                $cart = $_POST['qtt'];
            }
            else{
                $cart = $_SESSION['cart'];
            }
            $total=0;
            foreach($cart as $prd_id => $qtt){
                $total+=$qtt;
            }
            echo $total;
        }
        else{
            echo 0;
        }
        ?>
    </span>
</div>