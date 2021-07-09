<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list row">
        <?php
        $sql = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 6";
        $query = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_array($query)){
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?=$row['prd_id'] ?>"><img src="admin/img/products/<?=$row['prd_image'] ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?=$row['prd_id'] ?>"><?=$row['prd_name'] ?></a></h4>
                <p>Giá Bán: <span><?=number_format($row['prd_price'])." đ" ?></span></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>