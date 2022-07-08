<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for an <?php echo $SITE_NAME_STYLE ?> Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
		<form method="post" action="signup">
		  <div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Username</label>
			<input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		  </div>
		  <div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password">
		  </div>
		  <div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
			<input type="password" class="form-control" id="cpassword" name="cpassword">
		  </div>			  
		  
		   <div class="container-fluid"  style="border:dashed  #E8F0FE">
			<label for="captcha">Please Enter the Captcha Text</label>&nbsp;&nbsp;
			<img src="captcha" alt="CAPTCHA" class="captcha-image">
			<input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="refresh-captcha"><img  width="50px" src="<?php echo $IMG_URL.'/captcha-1.png'?>"></a>
		</div><br/>
		
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Signup</button>
		<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
		</form>		
		
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'captcha?' + Date.now();
}</script>