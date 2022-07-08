<!-- breadcrumb -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#" style="color:black">Home</a></li>
	<li class="breadcrumb-item"><a href="threadlist?category_id=4&page=2" style="color:black"><?php echo $return['thread']['thread_title']?></a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

<div class="container my-4">	
	 <!-- jumbotron -->
	<div class="jumbotron" style="background-color: #76D7C4;">
	<?php if(!empty($return['thread'])){?>
	  <h1 class="display-4"><?php echo $return['thread']['thread_title']?></h1>
	  <p class="lead"><?php echo $return['thread']['thread_desc']?></p>
	  <hr class="my-4">
	  <p>This is Peer to Peer discussion to share knowledge on <?php echo $return['thread']['thread_title']?> </p>
	  <div class="alert alert-success" role="alert">
		Posted By <em><?php echo $return['thread']['user_email']?></em>
	 </div>
	 <?php } else { ?>
	 <h1 class="display-4">This is non existent Thread</h1>
	  <p class="lead">Please choose correct one!!</p>
	  <hr class="my-4">
	  <p>This is Peer to Peer discussion to share knowledge on Technical Topics</p>
	  <?php } ?>
	</div>	
</div>

<!-- error/success msg -->
<?php if(isset($return['details']['status'])){?>
<div class="container my-3 alert alert-<?php echo $return['details']['status'] ?>" role="alert">
  <?php echo $return['details']['msg']?>
</div>
<?php } ?>

<!-- comment post form -->
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>
<div class="container">
<h2><?php echo $glb_arr_lang['postcomment']?></h2>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">  
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-success" name="submit" value="submit"><?php echo $glb_arr_lang['postcomment']?></button>
</form>
</div>
<?php }else{ ?>
<div class="container"><p><?php echo $glb_arr_lang['notlogin']. $glb_arr_lang['logintopost']?></p></div>
<?php } ?>

<!-- Modal Obj Comments -->
<?php if(!empty($return['comments'])){?>
	<div class="container my-3" id="ques"><h2>Discussions</h2></div>
<?php foreach($return['comments'] as $v){ ?>
<div class="container mt-3">
<div class="d-flex border p-3">
    <img src="<?php echo $IMG_URL.'/userdefault-1.png' ?>" alt="John Doe" class="flex-shrink-0 me-3 mt-3 rounded-circle" style="width:60px;height:60px;">
    <div>
        <p class="font-weight-bold my-0"><?php echo 'Comment by '.$v['user_email'].' at '. $v['comment_time']?></p>
        <p><?php echo $v['comment_content']?></p>
    </div>
</div>
</div>
<?php }} else{ ?>
<div class="container my-3"  id="ques"><h2>No Comments posted, Be the first one to do so!!!</h2></div>
<?php } ?>