<div class="home-text">
    <h3>Drop A <span>message</span></h3> 

    <div class="content-text">
        <div class="col-lg-7">
            <div class="row">
                <?php echo $this->Form->create('Contact', array('class' => 'box-form')); ?>
                <div class="col-lg-6"><?php echo $this->Form->input('first_name', array('label' => false, 'placeholder' => 'First Name', 'required' => true)); ?></div>
                <div class="col-lg-6"><?php echo $this->Form->input('last_name', array('label' => false, 'placeholder' => 'Last Name', 'required' => true)); ?></div>
                <div class="col-lg-6"><?php echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email Address', 'required' => true)); ?></div>
                <div class="col-lg-6"><?php echo $this->Form->input('phone_no', array('label' => false, 'placeholder' => 'Phone Number', 'required' => true)); ?></div>
                <div class="col-lg-12"><?php echo $this->Form->input('message', array('type' => 'textarea', 'label' => false, 'placeholder' => 'Message', 'required' => true)); ?></div>
                <div class="col-lg-6"><?php echo $this->Form->submit('Submit Now',array("class" => "btn btn-primary btn-lg")); ?></div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>    

        <div class="col-lg-4 col-lg-offset-1">
            <p class="b"><i class="fa fa-phone"></i> Phone:</p>
            <p>+91 94612 71720 (WhatApp Only)</p>
            <p class="b"><i class="fa fa-envelope"></i> Email:</p>
            <p>cupcherryeducation@gmail.com<br>
                contact@cupcherry.com</p>
            <p class="b"><i class="fa fa-map-marker"></i> Location:</p>
            <p>Jodhpur<br>Rajasthan INDIA - 342001</p>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#ContactContactForm').validate({
        messages: {
            'data[Contact][first_name]': {
                required: "Please enter your first name"
            },
            'data[Contact][last_name]': {
                required: "Please enter your last name"
            },
            'data[Contact][email]': {
                required: "Please enter your email here"
            },
            'data[Contact][phone_no]': {
                required: "Please enter your contact number"
            },
            'data[Contact][message]': {
                required: "Please enter your message here"
            }
        }
    });
</script>