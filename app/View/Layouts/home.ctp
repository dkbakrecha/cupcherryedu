<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $this->fetch('title'); ?>
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet"> 
        <?php
        echo $this->element('seo_title');
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'fullcalendar.min',
            'fullcalendar.print',
            '/js/iCheck/all',
            'fontawesome/font-awesome.min',
            'site_ui',
            'some_admin',
        ));

        echo $this->Html->script(array(
            'moment',
            'jquery.min',
            'bootstrap.min',
            'jquery.form',
            'fullcalendar.min',
            'lib/jquery-ui.custom.min',
            'iCheck/icheck.min',
            'admin/jquery.dataTables.min',
            'admin/dataTables.bootstrap.min',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>

        <?php
        echo $this->element('header');
        echo $this->element('shortcut-menu');
        ?>


        <?php
        echo $this->Session->flash();
        echo $this->fetch('content');

        if (!isset($this->request->params['admin'])) {
            echo $this->element('social');
            echo $this->element('footer');
            echo $this->element('_site_js');
        }
        //echo $this->element('sql_dump');
        ?>
    </body>
</html>
