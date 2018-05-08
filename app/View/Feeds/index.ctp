<div class="box no-height m-bottom5">
    <div class="box-content feed-form">
        <?php
        echo $this->Form->create("Contact", array(
            'id' => 'feedsAdd'
        ));
        ?>
        <div id="FeedFormOuter">
            <div class="tab-content">
                <div id="feed-update" class="tab-pane fade in active">
                    <?php
                    echo $this->Form->hidden("feed_type", array(
                        'value' => 1,
                    ));

                    echo $this->Form->input("message", array(
                        'label' => false,
                        'type' => 'textarea',
                        'rows' => 3,
                        'placeholder' => 'Write something ...'
                    ));
                    ?>
                </div>
                <div id="feed-notes" class="tab-pane fade">
                    <?php
                    echo $this->Form->input("notes_detail", array(
                        'label' => false,
                        'type' => 'textarea',
                        'rows' => 3,
                        'placeholder' => 'Write Notes ...'
                    ));
                    ?>
                </div>
                <div id="feed-question" class="tab-pane fade">
                    <?php
                    echo $this->Form->input("question", array(
                        'label' => false,
                        'type' => 'textarea',
                        'rows' => 3,
                        'placeholder' => 'Write Question ...'
                    ));
                    ?>
                </div>
            </div>
        </div>
        <ul class="nav nav-pills">
            <li class="active">
                <a data-toggle="pill" href="#feed-update">
                    <i class="fa fa-pencil"></i> <span>Update</span>
                </a>
            </li>
            <li>
                <a data-toggle="pill" href="#feed-notes">
                    <i class="fa fa-book"></i> <span>Note</span>
                </a>
            </li>
            <li>
                <a data-toggle="pill" href="#feed-question">
                    <i class="fa fa-list-ul"></i> <span>Question</span>
                </a>
            </li>
            <li class="pull-right">
                <?php
                echo $this->Form->submit("Save", array(
                    'class' => 'btn btn-primary ',
                    'div' => false
                ));
                ?>
            </li>
        </ul>

        <?php
        $this->Form->end();
        ?>

    </div>
</div>

<div class="box">
    <div class="box-content">
        <?php pr($feedsList); ?>
    </div>
</div>


<script type="text/javascript">
    $(function () {
           $(".box-content").on("submit", "#feedsAdd", function (e) {
            e.preventDefault();
            //var _formData = $("#QuizViewForm").serialize();
            $(this).ajaxSubmit({
                url: "<?php echo $this->Html->url(array('controller' => 'feeds', 'action' => 'add')) ?>",
                type: "POST",
                //data: {'formData': _formData},
                success: function (rd) {
                    $('#questionContent').html(rd);
                    if (rd != 0) {
                        var obj = jQuery.parseJSON(rd);

                        $.each(obj, function (key, value) {
                            $('#' + key).val(value);
                        });
                    }
                },
                error: function (xhr) {
                }
            });
        });
    });
</script>