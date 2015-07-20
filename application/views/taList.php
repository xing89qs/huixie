
<div id="container" >
	<h1> <?php echo $pageTitle;?> </h1>

	<div id="body">
		<table class="table" id="taList">
			<thead>
				<tr>
					<th>ID</th>
					<th>姓名</th>
					<th>邮箱</th>
					<th>技能</th>
					<th>评级</th>
					<th>每页收费（元）</th>
					<th>创建时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($taList))foreach ($taList as $ta):?>
				<tr>
					<td> <?php echo $ta->id;?> </td>
					<td> <?php echo $ta->name;?> </td>
					<td> <?php echo $ta->email;?> </td>
					<td> <?php echo $ta->skills;?> </td>
					<td> <?php echo $ta->star;?> </td>
					<td> <?php echo $ta->unitPrice;?> </td>
					<td> <?php echo $ta->createTime;?> </td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>

</div>

<script type="text/javascript">

	$(document).ready(function() {
 $("#taList").dataTable();
});
</script>