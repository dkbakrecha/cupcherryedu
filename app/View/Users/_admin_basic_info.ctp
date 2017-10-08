<?php
$rq = true;
if ($formtype == "edit")
{
	$rq = false;
}
else
{
	$rq = true;
}

$_passwordShow = true;

$_rd_only = false;

if ($formtype == "signup")
{
	/* Check social data and auto fill that */
	$_signData = $this->Session->read('socialLogin_info');
	if (!empty($_signData))
	{
		$this->request->data['User']['first_name'] = $_signData['firstName'];
		$this->request->data['User']['last_name'] = $_signData['lastName'];
		$this->request->data['User']['email'] = $_signData['emailAddress'];
		$_rd_only = true;
		$_passwordShow = false;
	}
}

if(!empty($_User)){
	$_passwordShow = false;
}
?>
<h4><?php echo __('Basic Details'); ?></h4>

<?php
$userData = $this->request->data;
if (!empty($userData['User']['id']))
{
	$role = $userData['User']['role'];
	?>
	<div class="form-group">
		<div class="col-md-2 col-sm-4 col-xs-12 control-label">
			<span>
				<?php
				if ($role == '4')
				{
					echo __("Instructor Id");
				}
				else if ($role == '5')
				{
					echo __("Practitioner Id");
				}
				else
				{
					echo __("Student Id");
				}
				?>
			</span>
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12">
			<?php
			//pr($this->request);
			echo $this->Form->input('user_uniqueid', array(
				'label' => false,
				'required' => true,
				'class' => 'form-control',
				'placeholder' => __('Student Id'),
				'type' => 'text',
				'readonly' => true,
			));
			?>
		</div>
	</div>
<?php } ?>

<div class="form-group">
	<div class="col-md-2 col-sm-4 col-xs-12 control-label">
		<span><?php echo __("First Name") ?></span>
	</div>
	<div class="col-md-5 col-sm-6 col-xs-12">
		<?php
		echo $this->Form->input('first_name', array(
			'label' => false,
			'required' => true,
			'class' => 'form-control',
			'placeholder' => __('First Name'),
			'type' => 'text'
		));
		?>
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-sm-4 col-xs-12 control-label">
		<span><?php echo __("Last Name") ?></span>
	</div>
	<div class="col-md-5 col-sm-6 col-xs-12">
		<?php
		echo $this->Form->input('last_name', array(
			'label' => false,
			'required' => true,
			'class' => 'form-control',
			'placeholder' => __('Last Name'),
			'type' => 'text'
		));
		?>
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-sm-4 col-xs-12 control-label">
		<span><?php echo __("Email Address") ?></span>
	</div>
	<div class="col-md-5 col-sm-6 col-xs-12">
		<?php
		echo $this->Form->input('email', array(
			'label' => false,
			'required' => true,
			'readonly' => $_rd_only,
			'class' => 'form-control',
			'placeholder' => __('Email Address'),
			'type' => 'text'
		));
		?>
	</div>
</div>

<?php
if ($_passwordShow)
{
	?>
	<div class="form-group">
		<div class="col-md-2 col-sm-4 col-xs-12 control-label">
			<span><?php echo __("Password") ?></span>
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12">
			<?php
			echo $this->Form->input('password', array(
				'label' => false,
				'required' => $rq,
				'class' => 'form-control',
				'placeholder' => __('Password'),
				'type' => 'password',
				'value' => ''
			));
			?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-2 col-sm-4 col-xs-12 control-label">
			<span><?php echo __("Confirm Password") ?></span>
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12">
			<?php
			echo $this->Form->input('confirm_password', array(
				'label' => false,
				'required' => $rq,
				'class' => 'form-control',
				'placeholder' => __('Confirm Password'),
				'type' => 'password'
			));
			?>
		</div>
	</div>

	<?php
}
?>


<div class="form-group">
	<div class="col-md-2 col-sm-4 col-xs-12 control-label">
		<span><?php echo __("Image") ?></span>
	</div>
	<div class="col-md-5 col-sm-6 col-xs-12 ImagePreviewBox">


		<?php
		$imgPathBig = $this->webroot . "img/no_user.jpg";
		echo $this->Form->hidden('image');
		if (isset($this->request->data["User"]["image"]) && !empty($this->request->data["User"]["image"]))
		{
			$imgPathBig = $this->webroot . "files/profile/" . $this->request->data["User"]["image"] . "?t=" . time();
		}

		//echo $this->Html->image('picture.png', array('width' => '100'));
		?>

		<img src="<?php echo $imgPathBig; ?>" alt="Responsive image" width="100px;" />
		<span class="btn btn-primary btn-flat profile-pic" id="UserImages">Change</span>
	</div>
</div>   


<div class="form-group">
	<div class="col-md-2 col-sm-4 col-xs-12 control-label">
		<span><?php echo __("Role") ?></span>
	</div>
	<div class="col-md-5 col-sm-6 col-xs-12">
		<?php
		echo $this->Form->input('role', array(
			'label' => false,
			'required' => true,
			'class' => 'form-control',
			'options' => array(
                            '2' => 'Student',
                            '3' => 'Teacher'
                        )
		));
		?>
	</div>
</div>