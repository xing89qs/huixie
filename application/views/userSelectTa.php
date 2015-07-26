
<div id="container" >
	<h1> <?php echo $pageTitle;?> </h1>

	<form action="<?php echo site_url('user/selectTa');?>" method="post">

<?php if(!empty($taList))foreach ($taList as $ta):?>
	<div class="checkbox">
	<label>
    	<input type="checkbox" name="taIdList[]" value="<?php echo $ta['openid'];?>">
  		</label>
		<img src="http://wx.qlogo.cn/mmopen/Wia29mribmjBbicZoicnvXet5PichHW4GsiaRqWLtqRLeXqj3QpEfB4DAGLw34ajXSIGxGcRxlZddUvdxicojPUTjBGaA/0" alt="..." class="img-circle" style="width:120px;height:120px">
  		
  		<br>
  		<label>姓名：<?php echo $ta['name'];?></label>
  		<label>评级：<?php echo $ta['star'];?></label>
  		<label>单价：<?php echo $ta['unitPrice'];?></label>
  		
	</div>
<?php endforeach;?>
<div>
	<label>
	（可以多选或不选，系统会添加默认TA）
	</label>
</div>

<button type="submit" class="btn btn-default text-center">submit</button>
<a href="#" class="btn btn-default" role="button">back</a>
</form>

</div>

<script type="text/javascript">

	$(document).ready(function() {
 $("#taList").dataTable();
});
</script>