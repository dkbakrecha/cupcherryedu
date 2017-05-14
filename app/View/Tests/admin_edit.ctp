<div class="box">
    <div class="box-header">
        <h3 class="box-title">Test Update
            <a class='btn btn-success btn-sm pull-right' href='<?php
            echo $this->Html->url(array('controller' => 'tests', 'action' => 'index',
                'admin' => true));
            ?>'>Back</a>
        </h3>
    </div>

    <div class="box-content">
        <div class="dataTable_wrapper">
            <div>
                <?php echo $this->Form->create('Test'); ?>
                
                <?php 
                echo $this->Form->input('name');
                echo $this->Form->input('description');
                echo $this->Form->input('total_time');
                echo $this->Form->input('neg_marks');
                
                
                ?>
                
                <?php echo $this->Form->end(); ?>
            </div>
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                <thead>
                    <tr class="heading" >
                        <th style="min-width: 22px;"><input name="checkall" type="checkbox" class="checkall" value="ON" /></th>
                        <th>Name</th>
                        <th>Total Questions</th>
                        <th>Start Date</th>
                        <th>End Date</th>                                
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="filter">
                        <td></td>
                        <td>
                            <input class="search_init" type="text" value="" placeholder="Search Name" name="fname"></td>
                        <td>
                            <input class="search_init" type="text" value="" placeholder="Search Name" name="lname"></td>
                        <td >
                            <input class="search_init" type="text" value="" placeholder="Search Email" name="email"></td>
                        <td >
                            <input class="search_init" type="text" value="" placeholder="Search Date" name="dob"></td>    
                        <td>
                            <select class="search_init" type="text" value="" placeholder="Select" name="status"> 
                                <option value="" selected="selected">Select</option>
                                <option value="1">Active</option>
                                <option value="0" >Inactive</option>
                            </select> 
                        </td>
                        <td valign="top">
                            <input type="button" id="search_button" class="btn btn-success btn-xs" value="Search">
                            <input type="button" id="reset_button" class="btn btn-danger btn-xs" value="Reset">
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
            "pageLength": 10,
            //"filter":false,        
            "ajax": '<?php echo $this->Html->url(array("controller" => "tests", "action" => "testGridData", "admin" => TRUE)); ?>',
            "columns": [
                {"name": "Test.id", "orderable": false, "searchable": false, 'width': '4%', 'sClass': 'text-center'},
                {"name": "Test.name", 'width': '12%'},
                {"name": "Test.total_questions", 'width': '12%'},
                {"name": "Test.start_date", 'width': '20%'},
                {"name": "Test.end_date", "orderable": true, "searchable": true, 'width': '12%'},
                {"name": "Test.status", "orderable": false, "searchable": true, 'width': '8%', 'sClass': 'text-center'},
                {"name": "Test.common", "orderable": false, "searchable": false, 'width': '10%', 'sClass': 'text-center'},
            ],
            "order": [
                [4, "desc"]//4 is here column name
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

    function changeUserStatus(id, status) {

        URL = '<?php echo $this->Html->url(array("controller" => "users", "action" => "change_status", "admin" => TRUE)); ?>';

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

</script>

<style>
    tfoot {
        display: table-header-group;
    }
</style>