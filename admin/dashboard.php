<?php
if(!defined("SECURITY")){
	die("Hành vi của bản không được chấp nhận!!!");
}
$sql = "SELECT * FROM ";
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Trang chủ quản trị</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Trang chủ quản trị</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?=mysqli_num_rows(mysqli_query($connect,$sql."product")) ?></div>
						<div class="text-muted">Sản Phẩm</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?=mysqli_num_rows(mysqli_query($connect,$sql."comment")) ?></div>
						<div class="text-muted">Bình Luận</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?=mysqli_num_rows(mysqli_query($connect,$sql."user")) ?></div>
						<div class="text-muted">Thành Viên</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?=mysqli_num_rows(mysqli_query($connect,$sql."category")) ?></div>
						<div class="text-muted">Danh mục</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->