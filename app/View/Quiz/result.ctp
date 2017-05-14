<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<?php
		//pr($allQuiz);
		if(!empty($resultList))
		{ 
			?>
			<table class="table table-bordered">
				<tr>
					<th>S NO</th>
					<th>Quiz Name</th>
					<th>Questions</th>
					<th>Quiz Status</th>
					<th>Date</th>
				</tr>

				<?php
				$i = 1;
				foreach ($resultList as $log)
				{ //pr($quiz);
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $log['Quiz']['title']; ?></td>
						<td><?php echo $log['ResultLog']['currect_questions']; ?> Out of <?php echo $log['ResultLog']['total_questions']; ?></td>
						<td><?php echo ($log['ResultLog']['result_status'] = 'c')?"Complate":"Middle Reset"; ?></td>
						<td><?php echo date('d M Y',  strtotime($log['ResultLog']['created'])); ?></td>
					</tr>		
					<?php
					//pr($quiz);
					$i++;
				}
				?>
			</table>
			<?php
		}
		?>
	</div>
</div>