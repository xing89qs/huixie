
<div id="container" >
	<h1>下订单(<font color='red'>*</font>为必填)</h1>

	<div id="body">
		<form action="<?php echo site_url('user/addOrder');?>" method="post">
  			<div class="form-group">
    			<label for="major">专业<font color='red'>*</font></label>
    			<select class="form-control" name="major" id="major">
  					<option>天文</option>
  					<option>地理</option>
  					<option>历史</option>
  					<option>物理</option>
				</select>
  			</div>
  			<div class="form-group">
    			<label for="courseName">课程名<font color='red'>*</font></label>
    			<input type="text" class="form-control" id="courseName" name="courseName" placeholder="" required="required">
  			</div>
  			<div class="form-group">
    			<label for="email">Email<font color='red'>*</font></label>
    			<input type="email" class="form-control" id="email" name="email" placeholder="" required="required">
  			</div>
  			<div class="form-group">
    			<label for="pageNum">页数<font color='red'>*</font></label>
    			<select class="form-control" name="pageNum" id="pageNum">
    			<?php for($i=1;$i<=100;$i++){ ?>
  					<option><?php echo $i; ?></option>
				<?php } ?>
				</select>
    		</div>
  			<div class="form-group">
    			<label for="refDoc">阅读材料页数<font color='red'>*</font></label>
    			<select class="form-control" name="refDoc" id="refDoc">
    			<?php for($i=0;$i<=100;$i++){ ?>
  					<option><?php echo $i; ?></option>
				<?php } ?>
				</select>
  			</div>
  			<div class="form-group">
    			<label for="endTime">截止日期<font color='red'>*</font></label>
          <input type="date" class="form-control" id="endTime" name="endTime" required="required">
    			<!-- <input type="time" class="form-control" id="endTime" name="endTime" required="required"> -->
  			</div>
  			<div class="form-group">
    			<label for="requirement">补充要求</label>
    			<textarea rows="5" class="form-control" id="requirement" name="requirement" placeholder=""></textarea>
  			</div>
			<div class="form-group text-center">
    			<a link="">保密政策</a>
  			</div>
  			<button type="submit" class="btn btn-default text-center">submit</button>
		</form>
	</div>

</div>

