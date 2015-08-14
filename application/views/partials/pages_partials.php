<div id="page-div">
	<?php if(isset($count)){
	$count = ceil($count/10);
     for($i=1;$i<=$count;$i++){?>
	<span class="fake-link" id="fake-link-1"><?= $i ?></span>
	<?php } }?>
</div>
<div id="table-div">
	<table>
		<tr>
			<th>leads_id</th>
			<th>first name</th>
			<th>last name</th>
			<th>date</th>
			<th>email</th>
		</tr>
		<?php foreach($records as $value){?>
		<tr>
			<td><?=$value['leads_id']?></td>
			<td><?=$value['first_name']?></td>
			<td><?=$value['last_name']?></td>
			<td><?=$value['registered_datetime']?></td>
			<td><?=$value['email']?></td>
		</tr>
		<?php }?>
	</table>
</div>