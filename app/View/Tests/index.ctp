<div class="row">
    
    <div class="col-lg-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Exams<span class="">Test your skills</span></h3>
            </div>

            <div class="box-content">
        <?php
        //pr($testInfo);
        if (!empty($testInfo)) {

            $color = array('#4A647F', '#57CBC8', '#EB6161', '#C12F3C', '#F05D4B', '#343B4D', '#17A3C4', '#45BF55');

            foreach ($testInfo as $test) {
                $onecolor = array_rand($color, 1);
                ?>
                <div class="col-lg-4">
                    <div class="panel" >
                        <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'view', $test['TestType']['unique_id'])); ?>">
                            <div class="panel-heading" style="background-color: <?php echo $color[$onecolor]; ?>; color:#ffffff;">
                                <?php echo $test['TestType']['name']; ?>
                            </div>
                            <div class="panel-body">
                                Access hundreds of free podcasts
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
        }

        /*
          ?>
          <div class="row">
          <div class="col-lg-6">
          <?php echo $this->Paginator->counter(); ?>
          </div>
          <div class="col-lg-6">
          <div class=" pull-right">
          <?php
          echo $this->Paginator->numbers(array(
          'before' => '<ul class="pagination">',
          'separator' => '',
          'currentTag' => 'a',
          'currentClass' => 'active',
          'tag' => 'li',
          'after' => '</ul>'
          ));
          ?>
          </div>
          </div>
          </div>
         * 
         */
        ?>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <!--<div class="fb-page" data-href="https://www.facebook.com/cupcherry" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/cupcherry"><a href="https://www.facebook.com/cupcherry">Cupcherry</a></blockquote></div></div>-->
    </div>
</div>