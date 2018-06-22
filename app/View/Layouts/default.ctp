<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>

        <?PHP
        /* <!--<link href='https://fonts.googleapis.com/css?family=Roboto:500,400' rel='stylesheet' type='text/css'>--> */
        echo $this->element('seo_title');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#337ab7">
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
            'site_ui.css?var=20180623',
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
            'admin/jquery.dataTables.min',
            'admin/dataTables.bootstrap.min',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <?php
    if ($LoggedinUser['role'] == 3) {
        $_body_class .= " teacherlogin";
        //pr($LoggedinUser);  
    }
    ?>
    <body class=" <?php echo $_body_class; ?> ">
        <?php
        if ($_SERVER['HTTP_HOST'] == "cupcherry.com") {
            ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T37L75D"
                              height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <?php
        }
        ?>


        <?php
        if (isset($this->request->params['admin'])) {
            echo $this->element('header_admin');
        } else {
            echo $this->element('header');
            echo $this->element('shortcut-menu');
            if (empty($removeBreadcrumb)) {
                //echo $this->element('breadcrumb');
            }
        }
//pr($_body_class);
        if ($_body_class == 'notes-index' AND empty($LoggedinUser)) {
            echo $this->element('search-notes');
        }
        if ($_body_class == "users-profile") {
            echo $this->element('profile-top');
        }


        if (!empty($LoggedinUser)) {
            ?>
            <div class="site-content <?php echo (!empty($content_class)) ? $content_class : ""; ?>" id="content">
                <div class="container">
                    <div class="row">
                        <?php
                        //pr($_sysInfo);
                        if ($_sysInfo['device'] != 'MOBILE') {
                            ?>
                            <div class="col-lg-3 ">
                                <?php echo $this->element("sidebar/dashboard_left"); ?>
                            </div>

                            <div class="col-lg-6">
                                <?php
                            }
                            ?>

                            <div class="row">
                                <?php
                                echo $this->Session->flash();
                                echo $this->fetch('content');
                                ?>
                            </div>

                            <?php
                            if ($_sysInfo['device'] != 'MOBILE') {
                                ?>
                            </div>
                            <div class="col-lg-3">
                                <?php echo $this->element("sidebar/dashboard_right"); ?>


                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        } else {
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
        }
        ?>



        <?php
        if (!isset($this->request->params['admin'])) {
            //if (empty($LoggedinUser) && $_act != "login") {
            //    echo $this->element("_calltologin");
            // }
            //echo $this->element('social');

            if (!empty($LoggedinUser)) {
                
            } else {
                echo $this->element('footer');
            }

            echo $this->element('_site_js');
        }
//echo $this->element('sql_dump');
        ?>
    </body>
</html>
