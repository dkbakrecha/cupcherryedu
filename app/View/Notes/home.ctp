<div class="box">

    <div class="box-header">
        <div class="col-lg-9"><h3 class="box-title">Notes List <small>My Notes Collections</small></h3></div>
        <div class="col-lg-3"><a class='btn btn-primary btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>'>Add Notes</a></div>
    </div>

    <div class="box-content">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                <thead>
                    <tr class="heading" >
                        <th>#ID</th>
                        <th>Note Title</th>
                        <th>Topic</th>
                        <th>Sub Topic</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="filter">
                        <td></td>
                        <td>
                            <input class="search_init" type="text" value="" placeholder="Search Name" name="fname">
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign="top">
                            <input type="button" id="search_button" class="btn btn-success btn-sm" value="Search">
                            <input type="button" id="reset_button" class="btn btn-danger btn-sm" value="Reset">
                        </td>
                    </tr>
                </tfoot>
            </table>
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
            "ajax": '<?php echo $this->Html->url(array("controller" => "notes", "action" => "noteGrid")); ?>',
            "columns": [
                {"name": "Note.id", "orderable": false, "searchable": false, 'width': '5%', 'sClass': 'text-center'},
                {"name": "Note.title", 'width': '45%'},
                {"name": "Note.catrgory_id", 'width': '15%'},
                {"name": "Note.sub_category_id", 'width': '15%'},
                {"name": "Note.notes_type", 'width': '5%'},
                {"name": "Note.common", "orderable": false, "searchable": false, 'width': '15%', 'sClass': 'text-center'},
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