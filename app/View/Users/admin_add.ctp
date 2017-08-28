<?php
$this->assign('title', $title);

$breadCrumb = array(
    array('name' => 'Student (Individual) Manager', 'url' => array('controller' => 'users', 'action' => 'students')),
    array('name' => $title, 'url' => null),
);

$this->set("breadcrumb", $breadCrumb);
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo __($title) ?></h3>
        <div class="box-tools pull-right"></div>
    </div>
    <div class="box-body">
        <?php
        echo $this->Form->create('User', array('class' => 'form-horizontal'));
        ?>

        <?php 
        $this->set('formtype' , 'add');
        echo $this->render("_admin_basic_info", false); 
        ?>
        
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
                    'onclick' => 'goBack()'
                ));
                ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<?php echo $this->element("profile-image"); ?>

<script type="text/javascript">
    function goBack() {
        window.top.location = "<?php echo $this->Html->url(array('action' => 'students'), true); ?>";
    }
</script>