<div class="row">
    
	<div class="col-lg-8">
		<?php
		if (!empty($allQuestions))
		{
			foreach ($allQuestions as $questionData)
			{
				?>
				<div class="question_title">
					<?php
					echo "<span>#" . $questionData['Question']['id'] . "</span> " . $questionData['Question']['question'];
					?>
				</div>
				<div class="question_option">
					<?php
					foreach ($questionData['Answers'] as $optList)
					{
						//pr($optList);
                                                $_cls = ($optList['correct'] == 1)?"correct_ans":"";;
                                                
						echo "<div class='".$_cls."'>" . $optList['answer'] . "</div>";
					}
					?>
				</div>
				<?php
			}
		}
		?>
		<div class="row">
			<div class="col-lg-6">
				<?php echo $this->Paginator->counter(); ?>
			</div>
			<div class="col-lg-6">
				<div class=" pull-right">
					<?php
					echo $this->Paginator->numbers(array(
						'before' => '<ul class="pagination">',
						'separator' => '',
						'currentTag' => 'a',
						'currentClass' => 'active',
						'tag' => 'li',
						'after' => '</ul>'
					));
					?>
				</div>
			</div>
		</div>	
	</div>
</div>