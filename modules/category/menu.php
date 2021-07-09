<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
        <?php
        $sql = "SELECT * FROM category ORDER BY cat_id ASC";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
        ?>
            <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?=$row['cat_id'] ?>&cat_name=<?=$row['cat_name'] ?>"><?=$row['cat_name'] ?></a></li>
        <?php } ?>
        </ul>
    </div>
</nav>