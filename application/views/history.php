
<h1 class="text-center">History of exchanges</h1>
<table class="table table-bordered">
	
	<thead class="thead-dark">
	<tr>
		<th>Id</th>
		<th>When</th>
		<th>What amount</th>
		<th>From what currency</th>
		<th>To what currency</th>
		<th>Result</th>
	</tr>

	<?foreach($data['history'] as $exchange):?>	
		<tr>
			<td><?=$exchange['id']?></td>
			<td><?=$exchange['created_at']?></td>
			<td><?=$exchange['value']?></td>
			<td><?=$exchange['from_currency']?></td>
			<td><?=$exchange['to_currency']?></td>
			<td><?=$exchange['final_amount']?></td>
		</tr>
	<?endforeach?>
	
</table>