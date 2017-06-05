<?php
if (!empty($userData)) {
    $userInfo = json_decode($userData['UserSocial']['social_res']);
    $_name = $userInfo->name;
    //prd($userInfo);
    $parts = explode(" ", $_name);
    $this->request->data['User']['first_name'] = $parts[0];
    $this->request->data['User']['last_name'] = $parts[1];
}
?>

<div class="box login-box">
    <h3 class="be-center">Hello <?php echo $_name; ?></h3> 
    <span>Please fill following information to further process</span>

    <div class="col-lg-4 col-lg-offset-4">
        <div class="users box-form">
            <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <?php
                echo $this->Form->input('first_name', array('type' => 'hidden'));
                echo $this->Form->input('last_name', array('type' => 'hidden'));
                ?>
                <span>Please provide email to process. We only provide useful content as you profile settings to you, We heat spam too.</span>
                <?php
                echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email Address'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(__('Update Information')); ?>		
        </div>
    </div>

</div>