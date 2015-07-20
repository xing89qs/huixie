
<div id="container" >
	<h1> <?php echo $pageTitle;?> </h1>

	<h3>订单编号：<?php echo $order['orderNum'];?></h3>
	<div>
		<label>专业：<?php echo $order['orderNum'];?></label>
		<label>课程名：<?php echo $order['courseName'];?></label>
		<label>页数：<?php echo $order['pageNum'];?></label>
		<label>阅读材料页数：<?php echo $order['refDoc'];?></label>
		<label>截止日期：<?php echo $order['endTime'];?></label>
		<label>补充要求<?php echo $order['requirement'];?></label>
	</div>
	<div>
		<label>选择的TA姓名</label>
		<?php if(!empty($taList))foreach ($taList as $ta):?>
  		<label>姓名：<?php echo $ta->name;?></label>
  		<?php endforeach;?>
	</div>

	<div>
		价格区间（我们收取TA价格区间的最大值，交易成功后返回实际差额）
		<label>【 <?php echo $min;?> 元 --- <?php echo $max;?> 元 】</label>
		<br>
		实际收取金额：【<?php echo $max;?> 元】
	</div>

	<div>
		请选择付款方式：<br>
		<a href="<?php echo site_url("user/payOrder");?>">Paypal</a><br>
		<a link="">微信支付</a><br>
		<a link="">支付宝支付</a>
	</div>

</div>

<script type="text/javascript">

</script>