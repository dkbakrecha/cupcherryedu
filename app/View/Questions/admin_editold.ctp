<div class="warper container-fluid">

	<div class="page-header"><h1>Question <small>User's Post Collections</small></h1></div>


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Question
			<a class='btn btn-purple btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'index','admin' => true)); ?>'>Back</a>
		</div>
		<div class="panel-body">
			<div class="form-horizontal" >
<?php 
echo $this->Form->create('Question', array("role" => "form"));
echo $this->Form->hidden('id');
?>  
				<div class="form-group">
					<label class="col-sm-2 control-label">Quiz</label>
					<div class="col-sm-7">
						<?php
						echo $this->Form->input('quiz_id', array(
							'options' => $quizList, 
							'class' => 'form-control',
							'placeholder' => 'Description',
							'label' => false,
							'placeholder' => 'Post Title'
						));
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Title</label>
					<div class="col-sm-7">
						<?php
						echo $this->Form->input('question', array(
							'class' => 'form-control',
							'placeholder' => 'Description',
							'label' => false,
							'placeholder' => 'Post Title'
						));
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Description</label>
					<div class="col-sm-7">
						<?php
						echo $this->Form->input('description', array(
							'class' => 'form-control',
							'placeholder' => 'Description',
							'label' => false,
							'placeholder' => 'Post Title'
						));
						?>
					</div>
				</div>

				<hr class="dotted">


				<div id="question_box">


					<div class="form-group">
						<div class="col-md-2 col-sm-4 col-xs-12 control-label">
							<span><?php echo __("Options") ?></span>
						</div>
						<div class="col-md-5 col-sm-6 col-xs-12">
							<input id="option1" type="radio" value="1" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" checked="checked" required="required">
							<?php
							echo $this->Form->input('Answer.option1', array(
								'label' => false,
								'placeholder' => 'Option 1',
								'class' => 'form-control',
								'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0'),
								'required' => true
							));
							?>
						</div>
					</div>
					<hr class="dotted">
					<div class="form-group">
						<div class="col-md-2 col-sm-4 col-xs-12 control-label">&nbsp;</div>
						<div class="col-md-5 col-sm-6 col-xs-12">
							<input id="option2" type="radio" value="2" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" required="required">
							<?php
							echo $this->Form->input('Answer.option2', array(
								'label' => false,
								'placeholder' => 'Option 2',
								'class' => 'form-control',
								'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0'),
								'required' => true
							));
							?>
						</div>
					</div>
					<hr class="dotted">
					<div class="form-group">
						<div class="col-md-2 col-sm-4 col-xs-12 control-label">&nbsp;</div>
						<div class="col-md-5 col-sm-6 col-xs-12">
							<input id="option3" type="radio" value="3" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
							<?php
							echo $this->Form->input('Answer.option3', array(
								'label' => false,
								'placeholder' => 'Option 3',
								'class' => 'form-control',
								'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0')
							));
							?>
						</div>
					</div>
					<hr class="dotted">
					<div class="form-group">
						<div class="col-md-2 col-sm-4 col-xs-12 control-label">&nbsp;</div>
						<div class="col-md-5 col-sm-6 col-xs-12">
							<input id="option4" type="radio" value="4" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
							<?php
							echo $this->Form->input('Answer.option4', array(
								'label' => false,
								'placeholder' => 'Option 4',
								'class' => 'form-control',
								'div' => array('class' => 'col-md-11 col-sm-10 col-xs-10 pull-right padd0')
							));
							?>
						</div>
					</div>
				</div>
				<hr class="dotted">
				<div class="form-group">
					<div class="col-md-2 col-sm-4 col-xs-12 control-label">
						<span></span>
					</div>
					<div class="col-md-5 col-sm-6 col-xs-12">
						<?=
						$this->Form->button(__('Save'), array(
							'class' => 'btn btn-primary btn-flat',
							'type' => 'submit'
						));
						?>
						&nbsp;
						<?=
						$this->Form->button(__('Cancel'), array(
							'class' => 'btn btn-default btn-flat',
							'type' => 'button',
							'onclick' => 'goBack()',
						));
						?>
					</div>
				</div>


<?php echo $this->Form->end(); ?>
			</div>
		</div>

	</div>
	<!-- Warper Ends Here (working area) -->    