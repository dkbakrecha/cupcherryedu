<div class="row note_list cardbox">
    <div class="col-xs-12 col-lg-8">
        <div class="box ">
            <div class="box-header dark-blue">
                <div class="box-title">
                    <h3>Exam Alerts</h3>
                    <div class="toptext">
                        Stay informed about the latest job openings in various government sectors. Get detailed information regarding important dates.                               
                    </div>
                    <i class="fa fa-shield pull-right cms-header-icon"></i>
                </div>
            </div>
        </div>
        <?php echo $this->element('post_tile'); ?>

    </div>

    <?php
    if (empty($LoggedinUser)) {
        ?>
        <div class="col-xs-12 col-sm-4">
            <?php echo $this->element('ask_question'); ?>
        </div>
    <?php } ?>
</div>