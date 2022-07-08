<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="<?php echo $BOOTSTRAP_CSS_URL?>" rel="stylesheet">
	 <link href="<?php echo $IMG_URL.'/favicon.ico'?>" rel="shortcut icon" type="image/x-icon" width="16px"/>
	 <script>
	 var HOSTNAME_URL = "<?php echo $HOSTNAME_URL; ?>";
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	 
    <title><?php echo $SITE_NAME_STYLE;?> Forum</title>
<style>#ques1{min-height: 330px;}.whatsapp_float{position:fixed;bottom:40px;right:20px}</style>	
  </head>
  <body>   
	<script type="text/javascript" src="<?php echo $HTDOCS_URL.'/jquery.js' ?>"></script>
     <script type="text/javascript" src="<?php echo $BOOTSTRAP_JS_URL ?>" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo '/'.$SITE_NAME?>"><?php echo $SITE_NAME_STYLE?></a>
    <a class="navbar-brand" href="<?php echo '/'.$SITE_NAME?>"><img src="<?php echo $IMG_URL.'/sitelogo-3.png'?>" width="60px"  height="50px" title="My Company"></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo '/'.$SITE_NAME?>"><?php echo $glb_arr_lang['home']?></a>
        </li>        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $glb_arr_lang['topcategories']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <?php foreach($list as $val){?>
            <li><a class="dropdown-item" href="<?php echo 'threadlist?category_id='.$val['category_id']?>"><?php echo $val['category_name'] ?></a></li>
		  <?php } ?>
          </ul>
        </li>        
		
		<li class="nav-item" >
		<select class="btn-group bootstrap-select countrypicker f16 open" data-width="fit"  style="border-radius: 3px" onchange="set_lang(this.value);">
			<?php foreach($LANG_LIST as $l => $v) { ?><option <?php if($v == $lang) { echo 'selected ';} ?>value="<?php echo $v; ?>"><?php echo $l; ?></option><?php } ?>
		</select>
		   </li>

      </ul>
	  <form class="d-flex my-2" method="get" action="search">
	  <input class="form-control me-2" type="search" placeholder="<?php echo $glb_arr_lang['search']?>" aria-label="Search" name="search">
	  <button class="btn btn-outline-success" type="submit"><?php echo $glb_arr_lang['search']?></button></form>
	  <?php
	  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>        
        <p class="text-light my-0 mx-2"><?php echo $glb_arr_lang['welcome']?> <?php echo $_SESSION['useremail']?></p>
      	  
	  <div class="mx-2">
		<a href="logout" class="btn btn-outline-success ml-2" ><?php echo $glb_arr_lang['logout']?></a>	
	  <?php } else {?>        
     	  
	  <div class="mx-2">
		<button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#loginModal"><?php echo $glb_arr_lang['login']?></button>
		<button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#signupModal"><?php echo $glb_arr_lang['signup']?></button>	
	  <?php } ?>
	  </div>
    </div>
  </div>
</nav><div class="whatsapp_float"><a target="_blank" href="https://wa.me/<?php echo $WHATSAPP_NUM; ?>"><img title="fake num for testing" src="<?php echo $IMG_URL.'/whatsapp-2.png'?>" width="50px" class="whatsapp_float_btn"></a></div>
<?php
include $TPL_PATH.'/login_tpl.php';
include $TPL_PATH.'/signup_tpl.php';
?>