<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>

        <?PHP
        /* <!--<link href='https://fonts.googleapis.com/css?family=Roboto:500,400' rel='stylesheet' type='text/css'>--> */
        echo $this->element('seo_title');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet"> 

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'fullcalendar.min',
            'fullcalendar.print',
            '/js/iCheck/all',
            'fontawesome/font-awesome.min',
            'site_ui',
            '/js/share/css/jquery.sharepage',
            'dataTable_custom',
            'some_admin',
        ));

        echo $this->Html->script(array(
            'moment',
            'jquery.min',
            'bootstrap.min',
            'jquery.form',
            'bootbox.min',
            'jquery.validate.min',
            'fullcalendar.min',
            'share/js/jquery.sharepage',
            'lib/jquery-ui.custom.min',
            'iCheck/icheck.min',
            'ckeditor5/ckeditor',
            'ckeditor5/ckeditor.js.map',
            'admin/jquery.dataTables.min',
            'admin/dataTables.bootstrap.min',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body class="admin">
        <?php
        echo $this->element('header_admin');
        ?>
        <div class="site-content" id="content">
            <div class="container">
                <div class="row">

                    <div class="row">
                        <?php
                        echo $this->Session->flash();
                        echo $this->fetch('content');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('admin/js'); ?>
    </body>
</html>
