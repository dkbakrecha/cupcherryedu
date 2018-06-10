<div class="box login-box">
    <div class="col-lg-4">

    </div>

    <div class="col-lg-8">
        <h3 class="be-center">Hello <?php echo $LoggedinUser['name']; ?></h3> 
        <span>Please fill following information to further process</span>
        <div class="users box-form">
            <?php echo $this->Form->create('User'); ?>
                <?php
                $_qualification = array(
                   '1' => '5th Class',
                    '2' => 'Secondary',
                    '3' => 'Sr Secondary',
                    '4' => 'Diploma',
                    '5' => 'Degree',
                    '6' => 'PG',
                    );
                //prd($LoggedinUser);
                if (empty($LoggedinUser['qualification'] ) || $LoggedinUser['qualification'] == 0) {
    echo $this->Form->input('qualification',array('type'=>'select','options'=>$_qualification));
    echo $this->Form->input('name_of_exam', array( 'placeholder' => 'Detail qualification'));
    echo $this->Form->input('year_passout', array('placeholder' => 'Detail qualification', 'value' => '2000'));
}
               
                ?>
            <?php echo $this->Form->end(__('Update Information')); ?>		
        </div>
    </div>

</div>