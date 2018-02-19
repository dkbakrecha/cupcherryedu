<?php 
$this->assign('title', $title);

$breadCrumb = array(
    array('name' => 'FAQ\'s Manager', 'url' => array('controller' => 'faqs', 'action' => 'topic')),
	array('name' => 'Manage FAQ\'s', 'url' => array('controller' => 'faqs', 'action' => 'index',$faqData['Faq']['faq_topic_id'])),
    array('name' => 'Edit Question', 'url' => null),
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
        echo $this->Form->create('Faq', array('class' => 'form-horizontal')); 
        echo $this->Form->hidden('id',array('value' => $faqData['Faq']['id']));
        echo $this->Form->hidden('faq_topic_id',array('value' => $faqData['Faq']['faq_topic_id']));
        ?>
        <div class="form-group">
            <div class="col-md-2 col-sm-4 col-xs-12 control-label">
                <span><?php echo __("Question") ?></span>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <?php 
                echo $this->Form->input('question', array(
                    'label' => false,
                    'required' => true,
                    'class' => 'form-control',
                    'placeholder' => __('Question'),
                    'type' => 'text'
                ))
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-2 col-sm-4 col-xs-12 control-label">
                <span><?php echo __("Answer") ?></span>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <?php 
                echo $this->Form->input('answer', array(
                    'label' => false,
                    'required' => true,
                    'class' => 'form-control',
                    'placeholder' => __('Answer')
                ))
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-2 col-sm-4 col-xs-12 control-label">
                <span></span>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <?=
                $this->Form->button(__('Update'), array(
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

<script type="text/javascript">
    $(document).ready(function () {
        $('textarea#FaqAnswer').ckeditor();
    });
    
    function goBack() {
        window.top.location = "<?php echo $this->Html->url(array('action' => 'index',$faqData['Faq']['faq_topic_id']), true); ?>";
    }
</script>