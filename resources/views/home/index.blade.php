 <!DOCTYPE html>
 <html>
 <head>

 	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/dataTables.bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/responsive.dataTables.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/select.dataTables.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/awesome-bootstrap-checkbox.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/dataTables.checkboxes.css'); ?>">

 	<title>Laravel Data Table Pagination</title>
 </head>
 	<body>
 		
<style>
	.main-container{
		margin-top: 100px;
	}
</style>

<div class="container main-container">
	@csrf
	<div class="row">
		<div class="col-md-12">
		<div class="table-responsive">
			<table id="airplanes" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		       
		            	<th data-priority="1">ID</th>
		                <th>Manufacturer</th>
		                <th>Model</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		          
		         
		            	<th data-priority="1">ID</th>
		                <th>Manufacturer</th>
		                <th>Model</th>
		            </tr>
		        </tfoot>
	   		 </table>
   		</div>
		</div>
	</div>
</div>



<script src="<?php echo url('assets/js/jquery-3.3.1.js'); ?>"></script>
<script src="<?php echo url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo url('assets/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo url('assets/js/dataTables.select.min.js'); ?>"></script>
<script src="<?php echo url('assets/js/dataTables.checkboxes.min.js'); ?>"></script>

<script>
	
	var table = $('#airplanes').DataTable({

	 "responsive": true,

	  "columns": [
	  	 
     
       		{"data": 	"record_id"			},
       		{"data": 	"manufacturer_name"	},
        	{"data": 	"manufacturer_model"},
       ],

        "columnDefs": [
		 
       
         { className: 'control show-more', targets:1},
        
        ],
        responsive: {
            details: {
                type: 'column',
                target: 1
            }
        },
	    dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
       order: [[ 1, 'asc' ]],
 
        "searchDelay": 1500,
        "processing": true,
        "serverSide": true,
        "bPaginate": true,
        "pageLength": 10,
        oLanguage: {
        	sProcessing: "<i class='fa fa-spinner fa-spin fa-5x'></i>",
        	"oPaginate": {
        		"sPrevious": "<i class='fa fa-arrow-circle-left'></i>",
				"sNext": 	 "<i class='fa fa-arrow-circle-right'></i>"
			}
        },
        "ajax": {
            "url": "<?php echo url('fetch'); ?>",
            "type": 'POST',
            "data": function ( vars ) {
               vars._token = $("input[name='_token']").val()
            }
        }
	});

</script>

 	</body>
 </html>