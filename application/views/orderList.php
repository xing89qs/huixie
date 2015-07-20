
<div id="container" >
	<h1> <?php echo $pageTitle;?> </h1>

	<div id="body">
		<table class="table" id="orderList">
			<thead>
				<tr>
					<th>id</th>
					<th>订单编号</th>
					<th>专业</th>
					<th>课程名称</th>
					<th>邮箱</th>
					<th>页数</th>
					<th>阅读材料</th>
					<th>截止日期</th>
					<th>额外需求</th>
					<th>用户编号</th>
					<th>TA编号</th>
					<th>价格</th>
					<th>是否付款</th>
					<th>是否接单</th>
					<th>是否结束</th>
					<th>创建时间</th>
					<th>付款时间</th>
					<th>接单时间</th>
					<th>结束时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($orderList))foreach ($orderList as $order):?>
				<tr>
					<td> <?php echo $order->id;?> </td>
					<td> <?php echo $order->orderNum;?> </td>
					<td> <?php echo $order->major;?> </td>
					<td> <?php echo $order->courseName;?> </td>
					<td> <?php echo $order->email;?> </td>
					<td> <?php echo $order->pageNum;?> </td>
					<td> <?php echo $order->refDoc;?> </td>
					<td> <?php echo $order->endTime;?> </td>
					<td> <?php echo $order->requirement;?> </td>
					<td> <?php echo $order->userId;?> </td>
					<td> <?php echo $order->taId;?> </td>
					<td> <?php echo $order->price;?> </td>
					<td> <?php echo $order->hasPaid;?> </td>
					<td> <?php echo $order->hasTaken;?> </td>
					<td> <?php echo $order->hasFinished;?> </td>
					<td> <?php echo $order->createTime;?> </td>
					<td> <?php echo $order->paidTime;?> </td>
					<td> <?php echo $order->takenTime;?> </td>
					<td> <?php echo $order->finishedTime;?> </td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>

</div>
<script type="text/javascript">

	$(document).ready(function() {
 $("#orderList").dataTable();
});
</script>
