
<div id="container" >
	<h1>添加用户</h1>

	<div id="body">
		<form action="<?php echo site_url('user/register');?>" method="post">
  			<div class="form-group">
    			<label for="name">姓名</label>
    			<input type="text" class="form-control" id="name" name="name" placeholder="" required="required">
  			</div>
  			<div class="form-group">
    			<label for="university">学校</label>
    			<input type="text" class="form-control" id="university" name="university" placeholder="">
  			</div>
  			<div class="form-group">
    			<label for="email">Email</label>
    			<input type="email" class="form-control" id="email" name="email" placeholder="">
  			</div>
  			<button type="submit" class="btn btn-default">submit</button>
		</form>
	</div>
</div>