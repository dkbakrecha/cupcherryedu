

<div class="box">
    <div class="box-content">
        <?php
        if ($_sysInfo['device'] == 'MOBILE') {
            ?>
            <a class="btn btn-primary info-box col-xs-12" href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice')); ?>"> 
                <i class="fa fa-wrench info-box-icon"></i>
                Practice Test HERE
            </a>

            <a class="btn btn-primary info-box col-xs-12" href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice_table')); ?>"> 
                <i class="fa fa-table info-box-icon"></i>
                Practice Table
            </a>
            <?php
        }
        ?>
    </div>
</div>





<script type="text/javascript">
    $(function () {
        $('#short').sortable();
    });
</script>