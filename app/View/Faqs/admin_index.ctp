<?php
$this->assign('title', $title);

$breadCrumb = array(
    array('name' => 'FAQ\'s Manager ', 'url' => array('controller' => 'faqs','action' => 'topic')),
    array('name' => $title, 'url' => null),
);

$this->set("breadcrumb", $breadCrumb);
//echo $this->element("breadcrumb", array('breadCrumb' => $breadCrumb));
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo __($title) ?></h3>
        <div class="box-tools pull-right">
            <a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'add', $topic_id)); ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> &nbsp Add
            </a>

            
        </div>
    </div>
    <div class="box-body">
        <table id="dataTableList" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th><?= __('Question'); ?></th>
                    <th><?= __('Answer'); ?></th>
                    <th><?= __('Action'); ?></th>
                </tr>
            </thead>
            
            <tfoot>
            <tr class="filter">
                    <th></th>    
                    <th><input class="search_init" type="text" value="" placeholder="Search By Question" name="question"></th>
                    <th><input class="search_init" type="text" value="" placeholder="Search By Answer" name="answer"></th>
                    <th></th>    
                </tr>
            </tfoot>
        </table>
    </div>

</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {

        table = $("#dataTableList").dataTable({
            "processing": true,
            "serverSide": true,
            "sDom": '<"top">rt<"bottom"ip><"clear">',
            "ajax": {
                "url": "<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'faq_data', $topic_id)); ?>",
                "type": "POST",
                "cache": false
            },
            "columns": [
                {
                    "name": "id",
                    "data": "sr_no"
                },
                {
                    "name": "Faq.question",
                    "data": "name"
                },
                {
                    "name": "Faq.answer",
                    "data": "manage"
                },
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 1, 3]
                },
                {
                    "render": function (data, type, row) {
                        var st = (row.status == '1') ? 'status-green' : 'status-red';
                        var dv = '<span class="tbl-row-actions">';
                        dv += '<i class="fa fa-circle change-status ' + st + '" data-rowid="' + row.id + '" data-rowstatus="' + row.status + '" " title="Show(Green) / Hide(Red) FAQ\'s content from main site."></i>';
                        dv += '<a href="<?= $this->Html->url(array('action' => 'edit')) ?>/' + row.id + '" title="Edit FAQ\'s Topic content"><i class="fa fa-pencil"></i></a>';
                        dv += '<i class="fa fa-trash" onclick="deleteTopic(' + row.id + ')" title="Delete FAQ\'s Topic content"></i>';
                        dv += '</span>';
                        return dv;                        
                    },
                    "targets": 3,
                }
            ]
        });

       $('input.search_init').on('keyup', function () {
            filterGlobal();
        });

        function filterGlobal() {
            var tbl = table.api();
            tbl.columns().eq(0).each(function (colIdx) {
                if ($('input,select', tbl.column(colIdx).footer().length)) {
                    tbl
                            .column(colIdx)
                            .search($('input,select', tbl.column(colIdx).footer()).val());
                }
            });
            tbl.draw();
        }
        
        // For width of search element according to bootstrap
        $('.search_init').addClass('form-control input-sm col-xs-12');
    
    });
    
    $('#dataTableList').on('click','.change-status',function(){
        var _this = $(this);
        var row_id = _this.data('rowid');
        var status = _this.data('rowstatus');
        
        URL = '<?php echo $this->Html->url(array("action" => "updateStatus")); ?>';

        $.ajax({
            url: URL,
            type: "POST",
            data: ({id: row_id, status: status}),
            success: function (data) {
                if (data == 1) {
                    _this.toggleClass('status-green');
                    _this.toggleClass('status-red');
                
                    $(this).data('rowstatus',(status == 1)?0:1);
                } else {
                    bootbox.alert("Error while changing the user status.", function () {
                    });
                }
            }
        });
    });
    
    function deleteTopic(id) {
        bootbox.confirm("Are you sure you want to delete selected Faq ?", function(r) {
			if (r == true) {
               	URL = '<?php echo $this->Html->url(array("controller" => "faqs", "action" => "delete")); ?>';
				$.ajax({
					url: URL,
					type: 'POST',
					data: ({id: id}),
					success: function(data) {
						if(data == '1'){
                            location.reload();
                        }
					}
				});
			}
		});
	} 
</script>