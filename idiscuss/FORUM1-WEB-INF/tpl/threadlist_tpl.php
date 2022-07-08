<div class="container my-3">	
	 <!-- jumbotron -->
	<div class="jumbotron" style="background-color: #76D7C4;">
	<?php if(!empty($return['category'])){?>
	  <h1 class="display-4"><?php echo 'Welcome to '.$return['category']['category_name'].'  Forums'?></h1>
	  <p class="lead"><?php echo $return['category']['category_description']?></p>	
	  <hr class="my-4">
	  <p>This is Peer to Peer discussion to share knowledge on <?php echo $return['category']['category_name']?> </p>
	  <?php } else { ?>
	  <h1 class="display-4">This is non existent Threadlist</h1>
	  <p class="lead"></p>	
	  <hr class="my-4">
	  <p><?php echo $glb_arr_lang['peerdisc']?></p>
	  <?php } ?>
	</div>	
</div>

<!-- error/success msg -->
<?php if(isset($return['details']['status'])){?>
<div class="container my-3 alert alert-<?php echo $return['details']['status'] ?>" role="alert">
  <?php echo $return['details']['msg']?>
</div>
<?php } ?>

<!-- thread post form -->
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>
<div class="container my-3">
<h2><?php echo $glb_arr_lang['startdisc']?></h2>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><?php echo $glb_arr_lang['probtitle']?></label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"><?php echo $glb_arr_lang['probcrisp']?></div>
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label"><?php echo $glb_arr_lang['elabprob']?></label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
</form>
</div>
<?php }else{ ?>
<div class="container"><p><?php echo $glb_arr_lang['notlogin']. $glb_arr_lang['logintocomment']?></p></div>
<?php } ?>

<!-- Threads posted by users -  Modal Obj -->
<?php if(!empty($return['thread'])){?>
	<div class="container my-3" id="ques"><h2><?php echo $glb_arr_lang['browseques']?></h2>
	<?php global $NUM_THREAD_PER_PAGE;echo "Total ".$return['total_threads']." threads posted on ".$return['total_pages']." pages. ".$NUM_THREAD_PER_PAGE." threads on each page." ?></div>
<?php foreach($return['thread'] as $v){ ?>
<<div class="container mt-3">
<div class="d-flex border p-3">
    <img src="<?php echo $IMG_URL.'/userdefault-2.png' ?>" alt="John Doe" class="flex-shrink-0 me-3 mt-3 rounded-circle" style="width:60px;height:60px;">
    <div><p class="font-weight-bold my-0"><?php echo 'Asked by :  '.$v['user_email'].' at '. $v['timestamp']?></p>
        <h6 class="mt-0" ><a class="text-dark" href="threads?thread_id=<?php echo $v['thread_id']?>"><?php echo $v['thread_title']?></a></h6>
        <p><?php echo $v['thread_desc']?></p>
    </div>
</div>
</div>
<?php }} else{ ?>
<div class="container alert alert-danger" role="alert">  No Questions posted, Be the first one to do so!!!.</div>
<?php } ?>

<!-- Pagination -->
<div class="container my-3">
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php for($i=1;$i<=$return['total_pages'];$i++) { $class = '';
	if($i == $return['page'] ){$class = 'active';}?>
    <li class="page-item <?php echo $class?>"><a class="page-link" href="threadlist?category_id=<?php echo $return['details']['category_id']?>&page=<?php echo $i?>"><?php echo $i?></a></li>
	<?php } ?>
  </ul>
</nav>
</div>