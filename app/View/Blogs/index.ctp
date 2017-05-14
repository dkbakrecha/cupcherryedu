<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<?php
		//pr($allQuiz);
		if(!empty($allQuiz))
		{ 
			?>
			<table class="table table-bordered">
				<tr>
					<th>S NO</th>
					<th>Quiz Name</th>
					<th>Total Questions</th>
					<th>Action</th>
				</tr>

				<?php
				foreach ($allQuiz as $quiz)
				{ //pr($quiz);
					?>
					<tr>
						<td><?php echo $quiz['Quiz']['id']; ?></td>
						<td><?php echo $quiz['Quiz']['title']; ?></td>
						<td><?php echo $quiz[0]['TOT']; ?></td>
						<td><a href="<?php echo $this->Html->url(array('controller' => 'quiz', 'action' => 'play', $quiz['Quiz']['id'])); ?>">PLAY</a></td>
					</tr>		
					<?php
					//pr($quiz);
				}
				?>
			</table>
			<?php
		}
		?>
	</div>
</div>