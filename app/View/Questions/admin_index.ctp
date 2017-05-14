<div class="box">
	<div class="box-header">
	<div class="panel-heading">
	<h1>Question List</h1>
			<a class='btn btn-purple btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add','admin' => true));?>'>Add New Post</a>
		</div>
		</div>

	<div class="box-content">
		<div class="panel-body">
			<div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                        <thead>
                            <tr class="heading" >
								<th style="min-width: 22px;">#ID</th>
                                <th>Question</th>
								<th>Category</th>
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
            "pageLength": 10,////echo $record_pr_pg;,
            //"filter":false,        
            "ajax": '<?php echo $this->Html->url(array("controller" => "questions", "action" => "questionGrid", "admin" => TRUE));?>',
            "columns": [
                {"name": "Question.id", "orderable": false, "searchable": false, 'width': '10%', 'sClass': 'text-center'},
                {"name": "Question.question", 'width': '65%'},
				{"name": "Question.category_id", 'width': '15%'},
                {"name": "Question.common", "orderable": false, "searchable": false, 'width': '10%', 'sClass': 'text-center'},
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
<!-- Warper Ends Here (working area) -->    

