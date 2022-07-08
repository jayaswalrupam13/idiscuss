<?php if(isset($_REQUEST['status'])){?>
<div class="container my-3 alert alert-<?php echo base64_decode($_REQUEST['status'])?>" role="alert"><?php echo base64_decode($_REQUEST['msg'])?></div>
<?php } ?>

<!-- search results -->
<div class="container my-3">
<h1 class="py-3"><?php echo count($return['result']) ?> Search results for <em  style="color:green">"<?php echo $return['keyword']?>"</em></h1> 
<?php

if(!empty($return['result'])){
	foreach($return['result'] as $v){ ?>
<div class="result">
<h3><a class="text-dark" href="<?php echo 'threads?thread_id='.$v['thread_id']?>" role="button"><?php echo $v['thread_title']?></a></h3>
<p><?php $v['thread_desc']?></p>
</div>
	<?php } }else{ ?>	
	<div class="jumbotron" style="background-color: #D7DBDD;">
	  <h1 class="display-4">No results found</h1>
	  <p class="lead">Suggestions:<ul>

						<li>Make sure that all words are spelled correctly.</li>
						<li>Try different keywords.</li>
						<li>Try more general keywords.</li>
						<li>Try fewer keywords.</li></ul>
						</p>	  
	</div>	
	<?php } ?>
</div>