
<div id="container" >
	<h1> <?php echo $pageTitle;?> </h1>

	<div id="body">
		<form action="<?php echo site_url('ta/addTa');?>" method="post">
  			<div class="form-group">
    			<label for="name">姓名</label>
    			<input type="text" class="form-control" id="name" name="name" placeholder="" required="required">
  			</div>
  			<div class="form-group">
    			<label for="email">邮箱</label>
    			<input type="email" class="form-control" id="email" name="email" placeholder="" required="required">
  			</div>
  			<div class="form-group">
    			<label for="skills">技能</label>
    			<select class="form-control" name="skills" id="skills">
  					<option>天文</option>
  					<option>地理</option>
  					<option>历史</option>
  					<option>物理</option>
				</select>
  			</div>
  			<div class="form-group">
    			<label for="star">评级</label>
    			<!-- <input type="text" class="form-control" id="star" name="star" placeholder=""> -->

    			<input id="star" name="star" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs">

  			<!-- ÷</div> -->
  			<div class="form-group">
    			<label for="unitPrice">每页收价（元）</label>
    			<select class="form-control" name="unitPrice" id="unitPrice">
    			<?php for($i=10;$i<=100;$i+=10){ ?>
  					<option><?php echo $i; ?></option>
				<?php } ?>
				</select>
  			</div>
  			<button type="submit" class="btn btn-default">submit</button>
		</form>
	</div>

</div>

<script>
 jQuery(document).ready(function () {
        $(".rating-kv").rating();
    });
</script>
