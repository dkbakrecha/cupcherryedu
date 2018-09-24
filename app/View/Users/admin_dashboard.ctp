<div class="">

    <div class="row">

        <div class="col-md-3">
            <ul class="list-group"> 
                <li class="list-group-item active"> Manage Users <span class="badge">View All</span></li> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['pending']; ?></span> Pending Users </li> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['active']; ?></span> Active Users </li> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['inactive']; ?></span> Inactive Users </li> 

                <li class="list-group-item active"> Quick View</li> 
                <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')) ?>"><li class="list-group-item"> Pending Notes </li></a> 
                <li class="list-group-item"> <span class="badge"><?php echo $user_statics['question_pending']; ?></span> Pending Questions </li> 

                <li class="list-group-item"> 
                    <span class="badge"><?php echo $user_statics['newsletter_all']; ?></span> 
                    <a href="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'index')) ?>">NewsLetters</a>
                </li> 

                <li class="list-group-item"> <span class="badge">-</span> <a href="<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'index')) ?>">Practice Sets</a> </li> 
            </ul>
        </div>


        <div class="col-md-9">
            <div class="row">

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

                <div class="col-lg-6">

                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Comments </div>
                        <div class="panel-body">
                            <table class="table"> 
                                <tr>
                                    <th>ID</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                if (!empty($_comment_list)) {
                                    foreach ($_comment_list as $comment) {
                                        //pr($comment);
                                        ?>
                                        <tr>
                                            <td><?php echo $comment['Comment']['id']; ?></td>
                                            <td><?php echo $comment['Comment']['comment']; ?></td>
                                            <td><?php echo $comment['Comment']['email']; ?></td>
                                            <td><?php echo $comment['Comment']['created']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-default" title="Delete Comment" onclick="updateComment(<?php echo $comment['Comment']['id']; ?>, 2)"><i class="fa fa-trash-o"></i></a>
                                                <a href="#" class="btn btn-default" title="Approve Comment" onclick="updateComment(<?php echo $comment['Comment']['id']; ?>, 1)"><i class="fa fa-check"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="be-center">No Pending Comment</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>

<script type="text/javascript">
    function updateComment(id, status) {
        var r = confirm("Are you sure u want to change status comment");
        if (r == true) {
            URL = '<?php echo $this->Html->url(array("controller" => "comments", "action" => "updatestatus", "admin" => TRUE)); ?>';

            $.ajax({
                url: URL,
                type: 'POST',
                data: ({
                    id: id,
                    status: status
                }),
                success: function (data) {
                    if (data == 1) {
                        location.reload();
                    } else {
                        bootbox.alert("Error while deleting the user.", function () {
                        });
                    }
                }
            });
        }
    }
</script>