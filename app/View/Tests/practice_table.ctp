<div class="box">
    <div class="box-header">
        <div class="box-title">Practice Table</div>
    </div>
    <div class="box-content">
        <?php
        $_testSession = $this->Session->read('Test');

        if (!empty($_testSession['practice_table']['start'])) {

            if ($_testSession['practice_table']['number'] == 0) {
                $a = rand(2, 20);
            } else {
                $a = $_testSession['practice_table']['number'];
            }

            $b = rand(1, 10);
            $_ans = $a * $b;

            echo $this->Form->create("TablePractice");
            echo $this->Form->hidden("tblsysans", array(
                'value' => $_ans
            ));
            echo $this->Form->input("tableans", array(
                'label' => $a . ' * ' . $b,
                'value' => "",
                'autocomplete' => 'off',
                'type' => 'number'
            ));
            echo $this->Form->submit("Test IT", array(
                'class' => 'btn btn-primary col-xs-12 m-top15',
            ));

            echo $this->Form->end();

            echo $this->Form->create("TablePracticeReset");
            echo $this->Form->hidden("resetVal", array(
                'value' => 1
            ));
            echo $this->Form->submit("Reset", array(
                'class' => 'btn btn-primary  col-xs-12  m-top15',
            ));
            echo $this->Form->end();
        } else {
            echo $this->Form->create("prepairTest");

            echo $this->Form->input("tblFor", array(
                'label' => 'Practice Table For',
                'value' => "",
                'autocomplete' => 'off',
                'type' => 'number',
                'required' => true
            ));
            
            echo "Put 0 for practice between 2 to 20";
            echo $this->Form->submit("Practice Now", array(
                'class' => 'btn btn-primary m-top15',
            ));

            echo $this->Form->end();
        }
        ?>
    </div>
</div>