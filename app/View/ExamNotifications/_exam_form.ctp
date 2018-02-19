<div class="form-group">
	<div class="col-sm-7">
		<?php
		echo $this->Form->input('title', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('title_slug', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('notification_board', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('qualification', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('notification_text', array(
			'class' => 'form-control',
			'placeholder' => 'Notification Text',
			'type' => 'textarea'
		));
		?>
	</div>

	<div class="col-sm-5">
		<div class="row">
			<div class="col-sm-4">
				<?php
				echo $this->Form->input('post_date', array(
					'class' => 'form-control form_datetime',
					'placeholder' => 'Post Date',
					'label' => 'Post Date',
					'type' => 'textbox',
					'data-date-format' => "dd-mm-yyyy"
				));
				?>
			</div>	
			<div class="col-sm-4">
				<?php
				echo $this->Form->input('lastapply_date', array(
					'class' => 'form-control form_datetime',
					'placeholder' => 'Last Apply Date',
					'label' => 'Last Apply Date',
					'type' => 'textbox'
				));
				?>
			</div>
			<div class="col-sm-4">
				<?php
				echo $this->Form->input('exam_date', array(
					'class' => 'form-control form_datetime',
					'placeholder' => 'Exam Date',
					'label' => 'Exam Date',
					'type' => 'textbox'
				));
				?>
			</div>
		</div>

		<?php
		echo $this->Form->input('source', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('syllabus_url', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('official_url', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>

		<?php
		echo $this->Form->input('remark', array(
			'class' => 'form-control',
			'placeholder' => 'Title',
			'type' => 'textbox'
		));
		?>


		<div class="row">
			<div class="col-sm-6">
				<?php
				echo $this->Form->input('state', array(
					'options' => $stateList,
					'class' => 'form-control',
					'empty' => 'Select State',
				));
				?>
			</div>
			<div class="col-sm-6">
				<?php
				/* echo $this->Form->input('city', array(
				  'class' => 'form-control',
				  'placeholder' => 'Title',
				  'type' => 'textbox'
				  )); */
				?>

				<?php
				echo $this->Form->input('status', array(
					'options' => array(
						"0" => "Inactive",
						"1" => "Active",
						"2" => "Delete",
						"3" => "Pending",
					),
					'class' => 'form-control',
				));
				?>
			</div>
		</div>
	</div>
</div>