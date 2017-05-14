<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<h4>Blog Content Add</h4>
		<div>
			<?php 
			echo $this->Form->create('Blog');
			
			echo $this->Form->input('title');
			echo $this->Form->input('content');
			
			
			
			echo $this->Form->submit('INSERT');
			echo $this->Form->end();
			?>
		</div>
	</div>
</div>