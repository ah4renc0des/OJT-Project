<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Survey Feedbacks</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="25%">
					<col width="25%">
					<col width="30%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Feedback</th>
						<th>Date Created</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						// Use backticks to handle column names with spaces
						$qry = $conn->query("SELECT * FROM surveyfeedback ORDER BY abs(unix_timestamp(`date created`)) DESC");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo htmlspecialchars($row['name']); ?></td>
							<td><?php echo htmlspecialchars($row['email']); ?></td>
							<td><p class="truncate-1 mb-0"><?php echo htmlspecialchars($row['feedback']); ?></p></td>
							<td><?php echo date("Y-m-d H:i", strtotime($row['date created'])); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
</script>
