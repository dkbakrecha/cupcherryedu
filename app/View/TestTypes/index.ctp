<div class="warper container-fluid">


	<?php
	if (!empty($testData))
	{
		?>
		<div class="">
			<?php
			$i = 1;
			foreach ($testData as $test)
			{
				//pr($test);
				?>
				<div class="col-lg-3">
					<div class="panel panel-info"> 
						<div class="panel-heading"> 
							<h3 class="panel-title"><?php echo $test['TestType']['name']; ?></h3> 
						</div> 

						<div class="panel-body"> 
							<p>
							<?php echo $test['TestType']['total_questions']; ?>
							<?php echo $test['TestType']['start_date']; ?>
							</p>
							
							<p style="text-align: center;">
							<a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'play', 'test_template' => $test['TestType']['id'])); ?>">PLAY</a>
							</p>
						</div> 
						
						<!-- Table -->
						<table class="table">
						  <tr> <th>#</th> <th>Username</th> </tr>
						  <tr> <td>1</td> <td>Dharmendra</td> </tr>
						  <tr> <td>2</td> <td>Dexter</td> </tr>
						</table>
					</div>
				</div>	
				<?php
				$i++;
			}
			?>
		</div>
		<?php
	}
	?>



</div>