<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'site_ui',
            'some_admin',
        ));

        echo $this->Html->script(array(
            'moment',
            'jquery.min',
            'bootstrap.min',
            'jquery.form',
            'bootbox.min',
            'jquery.validate.min',
            'lib/jquery-ui.custom.min',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body class="admin">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo $title_for_layout; ?></h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo $this->Session->flash();
                    echo $this->fetch('content');
                    //echo $this->element('admin/js');
                    ?>
                </div>
            </div>

        </div>

    </body>
</html>
