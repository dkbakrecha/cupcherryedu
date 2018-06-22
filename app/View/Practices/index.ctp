<div class="row">
    <div class="col-xs-12 col-lg-10 col-lg-offset-1 mobNoMargin">
        <div class="box practice-set-index">
            <div class="box-header dark-blue">
                <div class="box-title">
                    <h3>Practice Sets</h3>
                    <div class="toptext">
                        Free Questions practice sets for studnet for practice on various topics
                    </div>
                    <i class="fa fa-shield pull-right cms-header-icon"></i>
                </div>
            </div>
            <div class="box-content">
                <div class="list-group">
                    <?php
                    foreach ($practiceList as $practice) {
                        $_slug = $practice['Practice']['slug'];
                        ?>
                        <a href="<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'view', $_slug)); ?>" class="list-group-item">
                            <?php echo $practice['Practice']['title']; ?> 
                            <span class="pull-right">List Date :
                                <?php
                                echo date('d-M-Y', strtotime($practice['Practice']['created']));
                                ?> 
                            </span>
                        </a>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>