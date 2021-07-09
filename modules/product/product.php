<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id='$prd_id'";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($query);
?>

<!--	List Product	-->
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/img/products/<?=$row['prd_image'] ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?=$row['prd_name'] ?></h1>
            <ul>
                <li><span>Bảo hành:</span> <?=$row['prd_warranty'] ?></li>
                <li><span>Đi kèm:</span> <?=$row['prd_accessories'] ?></li>
                <li><span>Tình trạng:</span> <?=$row['prd_new'] ?></li>
                <li><span>Khuyến Mại:</span> <?=$row['prd_promotion'] ?></li>
                <li id="price">Giá bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?=number_format($row['prd_price']) ?>đ</li>
                <?php
                    if($row['prd_status']==1) echo '<li id="status"> Còn hàng</li>';
                    else echo '<li class="text-danger" id="status"> Hết hàng</li>';
                ?>
            </ul>
            <div id="add-cart"><a href="modules/cart/cart_add.php?prd_id=<?=$row['prd_id'] ?>">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?=$row['prd_name'] ?></h3>
            <p>
                <?=$row['prd_details'] ?>
            </p>
            
        </div>
    </div>

    <!--	Comment	-->
    <?php
    if(isset($_POST['sbm'])){
        $comm_name = $_POST['comm_name'];
        $comm_mail = $_POST['comm_mail'];
        date_default_timezone_set("Asian/Bangkok");
        $comm_date = date("Y-m-d H:i:s");
        $comm_details = $_POST['comm_details'];

        $sql = "INSERT INTO comment (prd_id, comm_name, comm_mail, comm_date, comm_details) VALUE ($prd_id, '$comm_name', '$comm_mail', '$comm_date', '$comm_details')";
        mysqli_query($connect,$sql);
    }
    ?>
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page=1;
        }
        $row_per_page = 5;
        $per_rows = ($page * $row_per_page) - $row_per_page;
        $total_rows = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM comment WHERE prd_id = '$prd_id'"));
        $total_page = ceil($total_rows/$row_per_page);
        
        $list_page = '';
        //preview
        $page_prev = $page-1;
        if($page_prev<=0) $page_prev=1;
        $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id='.$prd_id.'&page='.$page_prev.'">Trang trước</a></li>';
        
        //tinh toan so trang
        for($i=1; $i<=$total_page;$i++){
            if($i==$page) $active ='active';
            else $active = '';
            $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=product&prd_id='.$prd_id.'&page='.$i.'">'.$i.'</a></li>';
        }
        
        //next
        $page_next = $page + 1;
        if($page_next>$total_page) $page_next=$total_page;
        $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id='.$prd_id.'&page='.$page_next.'">Trang trước</a></li>';
        
        //khong hien thi khi khong qua 1 trang
        if ($total_page<=1) $list_page='';
        
        $sql_comm = "SELECT * FROM comment WHERE prd_id='$prd_id' ORDER BY comm_id DESC LIMIT $per_rows, $row_per_page";
        $query_comm = mysqli_query($connect,$sql_comm);
        while($row_comm = mysqli_fetch_array($query_comm)){
        ?>
            <div class="comment-item">
                <ul>
                    <li><b><?=$row_comm['comm_name'] ?></b></li>
                    <li><?=$row_comm['comm_date'] ?></li>
                    <li>
                        <p><?=$row_comm['comm_details'] ?></p>
                    </li>
                </ul>
            </div>
        <?php } ?>
        </div>
    </div>
    <!--	End Comments List	-->
</div>
<!--	End Product	-->
<div id="pagination">
    <ul class="pagination">
        <?= $list_page ?>
        <!-- <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li> -->
    </ul>
</div>