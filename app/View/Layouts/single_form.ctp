<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>

        <?php
        echo $this->element('seo_title');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet"> 

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'fontawesome/font-awesome.min',
            'site_ui',
        ));

        echo $this->Html->script(array(
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

    <body class="site_single_form">
        <?php
        echo $this->element('header');
        ?>
        <div class="site-content <?php echo (!empty($content_class)) ? $content_class : ""; ?>" id="content">
            <div class="container">
                <?php
                echo $this->Session->flash();
                echo $this->fetch('content');
                ?>
            </div>
        </div>
        <?php
        if (!isset($this->request->params['admin'])) {
            //echo $this->element('_site_js');
        }
        ?>
    </body>
</html>
