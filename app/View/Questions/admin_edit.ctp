<div class="warper container-fluid">

	<div class="page-header"><h1>Question <small>User's Post Collections</small></h1></div>


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Question
			<a class='btn btn-purple btn-sm pull-right' href='<?php
			echo $this->Html->url(array('controller' => 'questions', 'action' => 'index',
				'admin' => true));
			?>'>Back</a>
		</div>
		<div class="panel-body">
			<div class="form-horizontal" >
				<?php
				echo $this->Form->create('Question', array("role" => "form"));
				echo $this->Form->hidden('id');
				echo $this->render("_adminquestionForm", false);
				echo $this->Form->end();
				?>
			</div>
		</div>

	</div>
	<!-- Warper Ends Here (working area) --> 