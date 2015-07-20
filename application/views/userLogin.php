
<div id="container" >
	<h1>登陆</h1>

	<div id="body">
		<form action="<?php echo site_url('user/login');?>" method="post">
  			<div class="form-group">
    			<label for="exampleInputEmail1">用户名</label>
    			<input type="text" class="form-control" id="name" name="name" placeholder="" required="required">
  			</div>
  			<button type="submit" class="btn btn-default">submit</button>
		</form>
	</div>

</div>
