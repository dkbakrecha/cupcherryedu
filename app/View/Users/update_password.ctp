<div class="innerpagescover">
	<div class="innerpages-topmaintitle">
		<div class="container"><?php echo __($title) ?></div>
	</div>

	<div class="container">
		<div class="changepassword-cover">

			<div class="changepassword-maintitle">Please enter new password</div>

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Form->create('User'); ?>

			<div class="changepass-formgroup">
				<div class="changepass-formlable"><?php echo __("New Password") ?></div>
				<?php
				echo $this->Form->input('password', array(
					'label' => false,
					'required' => true,
					'class' => 'inputstyle',
					'placeholder' => 'Please enter new password',
					'div' => false,
				));
				?>
			</div>

			<div class="changepass-formgroup">
				<div class="changepass-formlable"><?php echo __("Confirm Password") ?></div>
				<?php
				echo $this->Form->input('confirm_password', array(
				'label' => false,
				'type' => 'password',
				'required' => true,
				'class' => 'inputstyle',
				'placeholder' => 'Please re-enter your password',
					'div' => false,
				));
				?>
			</div>

	        <div class="row">
	            <div class="col-xs-8">
	                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" class="btn">Back to login</a><br>
	            </div>
	            <div class="col-xs-4">
					<?php
					echo $this->Form->button(__('Submit'), array(
						'class' => 'contact-submitbtn',
						'type' => 'submit'
					));
					?>
	            </div>
	        </div>
			<?php echo $this->Form->end() ?>
	    </div>
	</div>
</div>