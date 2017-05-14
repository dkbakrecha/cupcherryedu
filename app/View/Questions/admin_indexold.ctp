<?php
echo $this->Html->script(array(
	
));
?>

<div class="warper container-fluid">

	<div class="page-header"><h1>Questions <small>Quiz's Question Collections</small></h1></div>


	<div class="panel panel-default">
		<div class="panel-heading">
			Question List
			<a class='btn btn-purple btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add','admin' => true));?>'>Add New Post</a>
		</div>
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
<?php /*
			<div class="dataTables_wrapper form-horizontal dt-bootstrap no-footer" id="basic-datatable_wrapper"><div class="row"><div class="col-sm-6"><div id="basic-datatable_length" class="dataTables_length form-group"><label class="col-sm-3 control-label" style="text-align:left;">Show  entries</label><div class="col-sm-2"><select class="form-control input-sm" aria-controls="basic-datatable" name="basic-datatable_length"><option selected="selected" value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></div></div></div><div class="col-sm-6"><div class="dataTables_filter form-group" id="basic-datatable_filter"><label class="col-sm-7 control-label">Search:</label><div class="col-sm-5"><input aria-controls="basic-datatable" placeholder="" class="form-control input-sm" type="search"></div></div></div></div><div class="row"><div class="col-sm-12 table-responsive"><table aria-describedby="basic-datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer" id="basic-datatable" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr role="row">
									<th style="width: 5%;" colspan="1" rowspan="1" aria-controls="basic-datatable" tabindex="0" class="sorting_asc">ID</th>
									<th style="" colspan="1" rowspan="1" aria-controls="basic-datatable" tabindex="0" class="sorting">Question Title</th>
									<th style="width: 20%;" colspan="1" rowspan="1" aria-controls="basic-datatable" tabindex="0" class="sorting">Quiz Title</th>
									<th style="width: 15%;" colspan="1" rowspan="1" aria-controls="basic-datatable" tabindex="0" class="sorting">Action</th>
								</tr>
                            </thead>
                            <tbody>
								<?php
								foreach ($questionList as $question)
								{
									//pr($question);
									?>
									<tr role="row" class="gradeA odd">
										<td class="sorting_1"><?php echo $question['Question']['id']; ?></td>
										<td><?php echo $question['Question']['question']; ?></td>
										<td><?php echo $question['Quiz']['title']; ?></td>
										<td class="center">View | <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'edit', $question['Question']['id'])); ?>">Edit</a> | Delete</td>
									</tr>
									<?php
								}
								?>
							</tbody>
                        </table>
					</div>
				</div>

			</div>
 */ ?>
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
                [1, "asc"]//4 is here column name
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

