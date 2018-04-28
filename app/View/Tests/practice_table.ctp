<div class="box">
    <div class="box-header">
        <div class="box-title">Practice Table</div>
    </div>
    <div class="box-content">
        <?php
        $a = rand(2, 20);
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
        ?>
    </div>
</div>