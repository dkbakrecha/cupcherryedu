<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="form-inline col-lg-5" >
                <?php
                echo $this->Form->create('Media', array("role" => "form", 'enctype' => 'multipart/form-data'));
                ?>  

                <div class="form-group">
                    <?php
                    echo $this->Form->input('title', array(
                        'class' => 'form-control',
                        'label' => 'MEDIA ',
                        'placeholder' => 'upload file',
                        'type' => 'file'
                    ));
                    ?>
                </div>

                <?php
                echo $this->Form->button(__('Upload'), array(
                    'class' => 'btn btn-default',
                    'type' => 'submit'
                ));
                ?>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>

    </div>
    <div class="panel-body">
        
        <div class="row">
            <?php
            foreach ($allMedia as $media) {
                //pr($media);
                if($media['Media']['type'] == 'image' ){
                    echo  "<div class='col-lg-2'>" . 
                            $this->Html->image('/files/images/' . $media['Media']['title'], array('class' => 'img-responsive'))
                        . "<div >". $media['Media']['title'] ."</div></div>";
                }
            }
            ?>
        </div>
    </div>
</div>