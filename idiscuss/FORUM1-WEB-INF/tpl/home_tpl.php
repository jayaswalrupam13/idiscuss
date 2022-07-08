<?php if(isset($_REQUEST['status'])){?>
<div class="container my-3 alert alert-<?php echo base64_decode($_REQUEST['status'])?>" role="alert"><?php echo base64_decode($_REQUEST['msg'])?></div>
<?php } ?>
  <!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $IMG_URL.'/carousel-1.jpg'?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $IMG_URL.'/carousel-2.jpg'?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $IMG_URL.'/carousel-11.jpg'?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"><?php echo $glb_arr_lang['previous']?></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container my-3">
	<h2 class="text-center" ><?php echo $SITE_NAME_STYLE?> - <?php echo $glb_arr_lang['browsecategories']?></h2>
	<div class="row" >
	
		<!-- card -->		
		<?php
		foreach($list as $val){
		?>
		<div class="col-md-4 my-2">		
		<div class="card" style="width: 18rem;">
		  <a href="threadlist?category_id=<?php echo $val['category_id']?>"><img src="<?php echo $IMG_URL.'/card-'.$val['category_name'].'.png'?>" class="card-img-top" alt="<?php echo $val['category_name']?>"></a>
		  <div class="card-body">
			<h5 class="card-title"><a href="threadlist?category_id=<?php echo $val['category_id']?>"><?php echo $val['category_name'] ?></a></h5>
			<p class="card-text"><?php echo $val['category_description'] ?></p>
			<a href="threadlist?category_id=<?php echo $val['category_id']?>" class="btn btn-primary"><?php echo $glb_arr_lang['viewthreads']?></a>
		  </div>
		</div>		
		</div>
		<?php } ?>
		<!-- card -->
		
	</div>
</div>

<?php include $TPL_PATH."/footer_tpl.php";?>