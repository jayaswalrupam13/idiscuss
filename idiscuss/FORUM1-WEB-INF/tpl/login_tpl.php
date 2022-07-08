<!-- Modal -->
<script src="<?php echo $G_CAPTCHA_JS?>" async defer></script>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to <?php echo $SITE_NAME_STYLE ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  
		 <form action="login" method="post">
		  <div class="mb-3">
			<label for="loginEmail" class="form-label">Username</label>
			<input type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		  </div>
		  <div class="mb-3">
			<label for="loginPass" class="form-label">Password</label>
			<input type="password" class="form-control" id="loginPass" name="loginPass">
		  </div>
		  <div class="mb-3">
			<div class="g-recaptcha" data-sitekey="<?php echo $G_CAPTCHA_CLIENT_KEY?>"></div>
		  </div>
		  <button type="submit" class="btn btn-primary"  name="submit" value="submit">Submit</button>
		</form>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>