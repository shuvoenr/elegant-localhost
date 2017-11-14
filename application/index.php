<?php
    /**
     *	Author	  :  Shuvankar Paul
     *	Email     :  shuvoenr@gmail.com
     *	Website :  https://www.equaltrue.com
     */

	$jsonString = file_get_contents('application.json');
	$data = json_decode($jsonString, true);
	$all_data = $data['application'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Application</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
	<link rel='stylesheet' type="text/css" href='assets/fonts/slabo27px/stylesheet.css' >
    <link rel="stylesheet"  type="text/css" href="assets/css/hover/hover.css">
	<style type="text/css">

		body {
		  font-family: 'slabo_27pxregular';
		  font-style: normal;
		  font-weight: 400;
		  font-size: 13px;  background: url(/../assets/images/backgroud.png);
		}
        .main-body{
			margin-top: 50px;
		}
		.header-select-left{
			padding-right: 20px;
		}
		.header-select-right{
			padding-left: 20px;
		}
		.col-centered{
			float: none;
			margin: auto;
		}

		h2{
			margin: 0;
			padding: 0;
		}
		.nopadding{
			padding: 0;
		}
		.nomargin{
			margin: 0;
		}

		.no-display{
			display: none;
		}
		.display{
			display: block;
		}

		.vmiddle{
			vertical-align: middle !important;
		}
		.pointer{
			cursor: pointer;
		}

        /*Tag List*/
        .tag-list ul {
            padding: 0;
        }
        .tag-list ul li {
            padding: 5px 10px;
            font-size: 16px;
            border: 1px solid #4caf50;
            margin-right: 15px;
            display: inline-block;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .tag-list ul li:hover {
            background: ;
        }

		.dataTables_info{
		    width: 50%;
		    float: left;
		    position: relative;
		}
		.dataTables_paginate{
		    width: 50%;
		    float: right;
		    position: relative;
		}

		.paginate_button.previous {
			font-weight: bold;
			margin-right: 10px;
		}
		
		.paginate_button.next {
			font-weight: bold;
			margin-left: 10px;
		}

		a.paginate_button{
		    margin: 0 3px;
		    border: 1px solid #ddd;
		    padding: 2px 10px;
		    cursor: pointer;
		    color: #333;
		}

		.paging_simple_numbers{
			padding-top: 10px;
		}

		.table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
			border-bottom: none;
		}

		.dataTables_length{
			width: 50%;
			float: left;
			position: relative;
			margin-bottom: 10px;
		}

		.dataTables_filter{
			width: 50%;
			float: right;
			position: relative;
			margin-bottom: 10px;
		}


		input, select {
		    display: block;
		    width: 100%;
		    height: 34px;
		    padding: 6px 12px;
		    font-size: 14px;
		    line-height: 1.42857143;
		    color: #555;
		    background-color: #fff;
		    background-image: none;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
		    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}


		table.dataTable thead .sorting_asc:after{
			color: #06a53e;
		}
		table.dataTable thead .sorting_desc:after{
			color: #06a53e;
		}
        .container.main-body {
            background: white;
            padding: 50px;
            width: 1000px;
            margin-top: 100px;
        }
        .modal-content {
            border-radius: 0;
        }
        .form-control {
            height: 30px;
            padding: 4px 12px;
            border-radius: 0;
        }
        input, select {
            height: 30px;
            padding: 4px 12px;
            border-radius: 0;
        }
        th {
            text-align: center;
        }
        .btn {
            border-radius: 0;
        }
        .happy-coading {
            position: absolute;
            width: 100px;
            top: 60px;
            left: 150px;
        }

	</style>
</head>
<body>


	  <!-- Add Company Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Add New Application</h4>
	        </div>
	        <div class="modal-body">
		        <div class="form-group">
		        	<input type="text" class="form-control" id="add_application_name" placeholder="Application Name" required>
		        </div>
		        <div class="alert no-display" id="add_application_name-warning">Warning</div>
		        <div class="form-group">
		        	<input type="text" class="form-control" id="add_category" placeholder="Category" required>
		        </div>
		        <div class="alert no-display" id="add_category-warning">Warning</div>
		        <div class="form-group">
		        	<input type="text" class="form-control" id="add_link" placeholder="Link" required>
		        </div>
		        <div class="alert no-display" id="add_link-warning">Warning</div>
		        <div class="row nomargin">
		        	<div class="form-group">
	          			<button name="form-submit" type="button" class="btn btn-primary pull-right" id="add_submit">Submit</button>
	            		</div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>



	  <!-- Edit Company Modal -->
	  <div class="modal fade" id="myModalEdit" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Edit Application</h4>
	        </div>
	        <div class="modal-body">
		        <div class="form-group">
		        	<input type="text" class="form-control" id="application_name_edit" placeholder="Page Name" required>
		        </div>
		        <div class="form-group">
		        	<input type="text" class="form-control" id="category_edit" placeholder="Page Link" required>
		        </div>
		        <div class="form-group">
		        	<input type="text" class="form-control" id="link_edit" placeholder="Application Link" required>
		        </div>
		        <div class="alert alert-danger no-display" id="no-company">Add Data Correctly</div>
		        <div class="alert alert-warning no-display" id="already-exist">Link  Already Exist</div>
		        <div class="row nomargin">
		        	<div class="form-group">
	          		<button name="form-submit" type="button" class="btn btn-primary pull-right" data-value="" id="edit_submit">Submit</button>
	            </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>


	<div class="container main-body">

		<div class="row" style="margin-bottom:20px;">
            <img class="happy-coading" src="../assets/images/Happy-Coding.png" alt="">
			<div class="col-md-6 nopadding"><h2 style="color: #4caf50;font-size: 18px;margin-left: 54px;text-decoration: underline;" class="pull-left">List of Applications : </h2></div>
			<div class="col-md-6 nopadding"><button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal">Add New Rule</button></div>
		</div>


        <!-- View All Tag -->
        <div class="row tag-list">
            <ul>
				<?php
					//-- Getting Only value from array
					$all_data_combine = array_column($all_data, 'category');
					//-- Shorting The Array
					asort($all_data_combine);
					//-- Remove Duplicate Value in array
					$all_data_combine = array_unique($all_data_combine);
					//var_dump($all_data_combine);
				?>
                <?php $counter = 0; ?>
                <?php foreach ($all_data_combine as $value): ?>
	                <?php $data_value = $value?>
	                <li class="hvr-grow-rotate category-filter" data-value="<?php echo $data_value; ?>"><?php echo $data_value; ?></li>
	                <?php $counter++; ?>
                <?php endforeach; ?>
            </ul>
        </div>

		<div class="row">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Application Name</th>
		                <th>Category</th>
		                <th>Link</th>
		                <th data-orderable="false"></th>
		                <th data-orderable="false"></th>
		            </tr>
		        </thead>

		        <tbody>
		        	<?php $counter = 0; ?>
			        <?php foreach ($all_data as $value): ?>
			            <tr>
			                <!-- Application Name -->
			                <td class="vmiddle text-center"><?php echo $value['application_name'] ?></td>
			            	<!-- Category Name -->
			                <td class="vmiddle text-center"><?php echo $value['category'] ?></td>
			               <!-- Link Address -->
			                <td class="vmiddle text-center pointer"><a target="_blank" href="<?php echo $value['link']  ?>"><?php echo $value['link'] ?></a></td>			               
			                <!-- Edit Action -->
			                <td id="edi<?php echo $counter; ?>" class="vmiddle text-center pointer" onclick="edit_action(<?php echo $counter;?>)"><i class="fa fa-pencil-square-o"></i></td>
			                <!-- Delete Action -->
			                <?php if($value['application_name'] == "Default"): ?>
			                		<td class="vmiddle text-center pointer">No Action</td>
	                			<?php else:?>
			                	<td id="del<?php echo $counter; ?>" class="vmiddle text-center pointer" onclick="delete_action(<?php echo $counter;?>)"><i class="fa fa-times"></i></td>
			            	<?php endif;?>
			            </tr>
			            <?php $counter++; ?>
			        <?php endforeach; ?>	
		        </tbody>
		    </table>
		</div>

	</div>

	<script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	
	<script>

	  	
	  	  // Edit Action
		function edit_action(x){

			$('#myModalEdit').modal('show');

			var application_name  = document.getElementById('edi'+x).parentElement.getElementsByTagName('td')[0].innerText;
				var category = document.getElementById('edi'+x).parentElement.getElementsByTagName('td')[1].innerText;
					var link = document.getElementById('edi'+x).parentElement.getElementsByTagName('td')[2].innerText;

            document.getElementById('application_name_edit').value = application_name;
            	document.getElementById('category_edit').value = category;
            		document.getElementById('link_edit').value = link;

            var edit_dom = document.getElementById('edit_submit');
            edit_dom.setAttribute('data-value', x);
		}

		// Edit Submit
		jQuery('#edit_submit').click(function () {

				var edit_id  = document.getElementById('edit_submit').getAttribute('data-value');
					var application_name_edit = document.getElementById('application_name_edit').value;
						var category_edit = document.getElementById('category_edit').value;
							var link_edit = document.getElementById('link_edit').value;

				var dataString = 'e_index='+edit_id+'&application_name_edit='+application_name_edit+'&category_edit='+category_edit+'&link_edit='+link_edit;
				$.ajax({
					url:"action.php",
					type: "POST",
					data: dataString,
					cache: false,
					success: function(result){
						location.reload();
					}
				});
				return false;
		});

		// -- Delete Action
		function delete_action(x){
			var dataString = 'd_index='+x;
			$.ajax({
				url:"action.php",
				type: "POST",
				data: dataString,
				cache: false,
				success: function(result){
				location.reload();
				}
			});
			return false;
		}

		// -- Add Action
		jQuery('#add_submit').click(function(){

		   //-- Get All Field Data
			var add_application_name = document.getElementById('add_application_name').value;
			var add_category           = document.getElementById('add_category').value;
			var add_link 		            = document.getElementById('add_link').value;

			//-- Empty Page Name
			if(add_application_name == "" || add_application_name == 'undefined'){
				jQuery('#add_application_name-warning').addClass('alert-danger display').removeClass('no-display')
				.text("Please Enter Application Name");
				return false;
			}else{
				jQuery('#add_application_name-warning').addClass('no-display').removeClass('display');
			}

			//-- Tracking Value
			if(add_category == '' || add_category == 'undefined'){
					jQuery('#add_category-warning').addClass('alert-danger display').removeClass('no-display')
					.text("Please Enter Category Value. Example :Server SSH");
					return false;
			}else{
					jQuery('#add_category-warning').addClass('no-display').removeClass('display');
			}

			//-- Regular Expression For URL
			var urlexp = new RegExp('(http)://[\\w-]+(\\.[\\w-]+)+([\\w-.,@?^=%&:/~+#-]*[\\w@?^=%&;/~+#-])?');

			//-- Empty page Link
			if(add_link == "" || add_link == 'undefined'){
					jQuery('#add_link-warning').addClass('alert-danger display').removeClass('no-display')
					.text("Link Does't Empty");
					return false;
			}else if(!urlexp.test(add_link)){
					/*
					jQuery('#add_link-warning').addClass('alert-danger display').removeClass('no-display')
					.text("Enter Valid Link.(http with www link) Ex: http://127.0.0.1/equaltrue/server/windows-linux-path-convert/");
					return false;
					*/
			}else{
					jQuery('#add_link-warning').addClass('no-display').removeClass('display');
			}

			var dataString = 'a_index=add'+'&add_application_name='+add_application_name+'&add_category='+add_category+'&add_link='+add_link;
			$.ajax({
				url:"action.php",
				type: "POST",
				data: dataString,
				cache: false,
				success: function(result){
					console.log(result);
					if(result == false){
						jQuery('#add_link-warning').addClass('alert-danger display').removeClass('no-display')
						.text("Link Already Exists. To Find The Type in Search Box");
					}else{
						jQuery('#add_link-warning').addClass('display alert-success').removeClass('no-display alert-danger')
						.text("New Record Added");
						location.reload();
					}
				}
			});
			return false;
		});

		jQuery(document).ready(function(){
			jQuery('#example').DataTable();
				//-- Filter Function Will Work Here
				jQuery(".category-filter").click(function () {
				var data_table = jQuery('#example').DataTable();
				var filter_value = jQuery(this).attr('data-value');
				data_table.search(filter_value).draw();
			})
		});

	</script>
</body>
</html>