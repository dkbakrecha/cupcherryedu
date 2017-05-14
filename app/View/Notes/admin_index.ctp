<?php
echo $this->Html->script(array(
));
?>

<div class="warper container-fluid">

    <div class="page-header"><h1>Questions <small>Quiz's Question Collections</small></h1></div>


    <div class="panel panel-default">
        <div class="panel-heading">
            Notes List
            <a class='btn btn-purple btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add', 'admin' => true)); ?>'>Add Notes</a>
        </div>
        <div class="panel-body">

            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                    <thead>
                        <tr class="heading" >
                            <th>#ID</th>
                            <th>Note Title</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="filter">
                            <td></td>
                            <td>
                                <input class="search_init" type="text" value="" placeholder="Search Name" name="fname"></td>
                            <td valign="top">
                                <input type="button" id="search_button" class="btn btn-success btn-xs" value="Search">
                                <input type="button" id="reset_button" class="btn btn-danger btn-xs" value="Reset">
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <div class="col-lg-12">
                    <?php /*
                      <form method="post" id="sendMailFrom" action="<?php echo $this->Html->url(array('controller' => 'emails', 'action' => 'compose')); ?>">

                      <?php echo $this->Form->hidden('mailAddr',array('id' => 'mailAddr')); ?>
                      <?php echo $this->Form->hidden('ReqFrom',array('value' => 'user')); ?>
                      <?php echo $this->Form->button('Send Mail',array('type' => 'button' , 'class' => 'btn btn-primary','onCLick' => 'mailSend()')); ?>
                      </form>
                     */ ?>
                </div>
            </div> 
        </div>
    </div>	
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {

        table = $('#dataTables-users').DataTable({
            "processing": true,
            "serverSide": true,
            "lengthMenu": [10, 20, 50, 100], //[[2,3,10, 25, 50, -1], [2,3,10, 25, 50, "All"]],
            "pageLength": 10, ////echo $record_pr_pg;,
            //"filter":false,        
            "ajax": '<?php echo $this->Html->url(array("controller" => "notes", "action" => "noteGrid", "admin" => TRUE)); ?>',
            "columns": [
                {"name": "Note.id", "orderable": false, "searchable": false, 'width': '15%', 'sClass': 'text-center'},
                {"name": "Note.title", 'width': '50%'},
                {"name": "Note.user_id", 'width': '20%'},
                {"name": "Note.common", "orderable": false, "searchable": false, 'width': '20%', 'sClass': 'text-center'},
            ],
            "order": [
                [0, "desc"]//4 is here column name
            ],
            "language": {
                "sLengthMenu": "Shows _MENU_",
                "oPaginate":
                        {
                            "sNext": '>',
                            "sLast": '>>',
                            "sFirst": '<<',
                            "sPrevious": '<'
                        }
            }
        });

        // Apply the search
        $("#search_button").click(function () {
            table.columns().eq(0).each(function (colIdx) {
                if ($('input,select', table.column(colIdx).footer().length)) {
                    table
                            .column(colIdx)
                            .search($('input,select', table.column(colIdx).footer()).val());


                }
            });
            table.draw();
        });

        //reset search 
        $("#reset_button").click(function () {
            table.columns().eq(0).each(function (colIdx) {
                if ($('input', table.column(colIdx).footer().length)) {
                    $('.search_init', table.column(colIdx).footer()).val("");
                    table
                            .column(colIdx)
                            .search("");

                }
            });
            table.draw();
        });
        //to remove default filter
        $(".dataTables_filter").remove();

    });


        function changeNoteStatus(id, status) {

        URL = '<?php echo $this->Html->url(array("controller" => "notes", "action" => "change_status", "admin" => TRUE)); ?>';

        $.ajax({
            url: URL,
            type: "POST",
            data: ({id: id, status: status}),
            beforeSend: function (XMLHttpRequest) {
            },
            complete: function (XMLHttpRequest, textStatus) {
                $("#reset_button").click();
            },
            success: function (data) {
                if (data == 1) {
                    $("#list").trigger("reloadGrid");
                } else {
                    bootbox.alert("Error while changing the user status.", function () {
                    });
                }
            }
        });
    }

    function delete_question(id) {
        bootbox.confirm("Are you sure want to Delete selected Question ?", function (r) {
            if (r == true) {

                URL = '<?php echo $this->Html->url(array("controller" => "users", "action" => "deleteUser", "admin" => TRUE)); ?>';

                $.ajax({
                    url: URL,
                    type: 'POST',
                    data: ({id: id}),
                    success: function (data) {
                        if (data == 1) {
                            $("#reset_button").click();
                        } else {
                            bootbox.alert("Error while deleting the user.", function () {
                            });
                        }
                    }
                });
            }
        });
    }
</script>