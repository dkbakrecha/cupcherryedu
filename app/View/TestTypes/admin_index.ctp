<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            asd
            <a class='btn btn-success btn-sm pull-right' href='<?php
            echo $this->Html->url(array('controller' => 'test_types', 'action' => 'create',
                'admin' => true));
            ?>'>Test create by Questions</a>
        </div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <?php
                if (!empty($testData)) {
                    ?>
                    <table class="table">	
                        <tr>
                            <td>S No</td>
                            <td>Test Title</td>
                            <td>Total Questions</td>
                            <td>Start Date</td>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($testData as $test) {
                            //pr($test);
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $test['TestType']['name']; ?></td>
                                <td><?php echo $test['TestType']['total_questions']; ?></td>
                                <td><?php echo $test['TestType']['start_date']; ?></td>
                            </tr>
        <?php
        $i++;
    }
    ?>
                    </table>
                        <?php
                    }
                    ?>

            </div>
        </div>
    </div>
</div>