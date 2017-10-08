<div class="">

    <div class="row">

        <div class="col-md-3">
            <ul class="list-group"> 
                <li class="list-group-item active"> Manage Users <span class="badge">View All</span></li> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['pending']; ?></span> Pending Users </li> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['active']; ?></span> Active Users </li> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['inactive']; ?></span> Inactive Users </li> 

                <li class="list-group-item active"> Quick View</li> 
                <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')) ?>"><li class="list-group-item"> <span class="badge"><?php echo $user_statics['notes_pending']; ?></span> Pending Notes </li></a> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['question_pending']; ?></span> Pending Questions </li> 

                <li class="list-group-item"> 
                    <span class="badge"><?php echo $user_statics['newsletter_all']; ?></span> 
                    <a href="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'index')) ?>">NewsLetters</a>
                </li> 
            </ul>
        </div>


        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Comments </div>
                        <div class="panel-body">
                            <ul class="list-group"> 
                                <?php
                                if (!empty($_comment_list)) {
                                    foreach ($_comment_list as $comment) {
                                        //pr($comment);
                                        ?>
                                        <li class="list-group-item"><?php echo $comment['Comment']['comment']; ?>
                                            <span><?php echo $comment['Comment']['email']; ?></span>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> Last 5 Login </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //pr($lastlogin_list); 
                                    $_i = 1;
                                    foreach ($lastlogin_list as $login_list) {
                                        ?>
                                        <tr>
                                            <td><?php echo $_i; ?></td>
                                            <td><?php echo $login_list['User']['email']; ?></td>
                                            <td><?php echo $login_list['User']['last_login']; ?></td>
                                        </tr>
                                        <?php
                                        $_i++;
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> Last 5 Test given by </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //pr($lastlogin_list); 
                                    $_i = 1;
                                    foreach ($lastTest_list as $play_list) {
                                        ?>
                                        <tr>
                                            <td><?php echo $_i; ?></td>
                                            <td><?php echo $play_list['User']['email']; ?></td>
                                            <td><?php echo $play_list['Test']['created']; ?></td>
                                        </tr>
                                        <?php
                                        $_i++;
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</div>

</div>