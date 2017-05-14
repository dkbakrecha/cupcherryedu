<div class="row">
	<div class="col-lg-8 col-lg-offset-2 question_wrapper">
		<?php
		//pr($question); 
		//$sessionUser = $this->Session->read('Auth.User'); 
		//pr($sessionUser);
		?>

		<div class="quiz_title">
			<h2><?php //echo $question['Quiz']['title']; ?></h2>
		</div>

		<?php
		if (!empty($question))
		{
			echo $this->Form->create('Quiz');
			echo $this->Form->hidden('question_id', array('value' => $question['Question']['id']));
			?>

			<h3 class="title"><?php echo $question['Question']['question']; ?></h3>

			<?php
			foreach ($question['Answers'] as $answer)
			{
				//pr($answer);
				$options[$answer['id']] = $answer['answer'];
			}

			$attributes = array(
				'legend' => false,
				'div' => 'ans_wrap',
				'separator' => '<br/>',
				'class' => 'r-green',
				'required' => true
			);
			echo $this->Form->radio('answers', $options, $attributes);
			echo $this->Form->submit("NEXT");
			echo $this->Form->end();
		}
		else
		{
			//pr($quiz_result);
			//pr($totalQuestion);
				?>
				<div class="" style="text-align: center; padding-top: 50px;">
					<h4>Result: <?php echo $quiz_result['correct']; ?> out of <?php echo $quiz_result['total_question']; ?></center></h4>
					<div>
						<?php $quiz_pres = ($quiz_result['correct'] / $quiz_result['total_question']) * 100; ?>
						<?php echo $quiz_pres; ?> %
						<br>
						<?php 
						if($quiz_pres == 100){
							echo "Prefect";
						}else if($quiz_pres > 80){
							echo "Doing Good";
						}else if($quiz_pres > 50){
							echo "Doing Good";
						}else{
							echo "Need more pretice !!";
						}
						?>
					</div>
					
					<div class="col-lg-6 col-lg-offset-3" style="margin-top: 50px;">
						<!--<button class="btn btn-green pull-left"> Check Your Answers </button>-->
						<a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'reset',$quiz_result['test_id'])); ?>" class="btn btn-success"> Try Again </a>
					</div>
				</div>	
				<?php
		}
		?>
	</div>
</div>