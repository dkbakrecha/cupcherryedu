<div class="row">
    <div class="col-lg-8">
        <?php
        //pr($allQuiz);
        if (!empty($allCategory)) {
            foreach ($allCategory as $p_category) {
                //pr($p_category);
                ?>
                <div class="panel">
                    <div class="panel-title">
<?php echo $p_category['Category']['title']; ?>
                    </div>
                    <div class="panel-body">
                        <?php if(!empty($p_category['Category']['SubCate'])){
                            ?>
                                            <table class="table table-bordered">
                <tr>
                    <th>Categories</th>
                    <th>Total Questions</th>
                    <th>Action</th>
                </tr>

    <?php
    foreach ($p_category['Category']['SubCate'] as $category) { //pr($quiz);
        ?>
                    <tr>
                        <td><?php echo $category['Category']['title']; ?></td>
                        <td><?php echo $category['Category']['questionsCount']; ?></td>
                        <td>
                            <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'play', 'subcate' => $category['Category']['id'])); ?>">Practice Test</a> 
                            <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'index', 'subcate' => $category['Category']['id'])); ?>">View All</a>
                        </td>
                    </tr>		
        <?php
        //pr($quiz);
    }
    ?>
            </table>
                                <?php
                        } ?>
                    </div>
                </div>
        <?php
    }
    ?>

                <?php
            }
            ?>
    </div>

    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading"><?php echo $cmsContent['CmsPage']['title']; ?></div>
            <div class="panel-body"><?php echo $cmsContent['CmsPage']['content']; ?></div>
        </div>
    </div>
</div>