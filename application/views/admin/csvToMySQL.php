  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Import CSV
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Import CSV</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->

    <section class="content">
      <div class="row">
 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <style>  
           body  
           {  
                margin:0; 
                padding:0;  
                background-color:#222d32;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>  





  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>




<div class="container">
   

    <?php if(!empty($status)){
        echo '<div class="alert alert-danger">'.$status.'</div>';
    } ?>

    <form method="post" action="<?php echo base_url(); ?>ExportExcel/fetchDataFromTable">
              <button type="submit" name="export" class="btn btn-success" value="Export" />
             Export Excel
      </button>
</form>
<br>

   <div class="panel-footer text-right">
<form action="<?php echo site_url('search/search_keyword');?>" method = "post">
<input type="text" name = "keyword" />
<input type="submit" value = "Search" />
</form>
</div>
    <div class="panel panel-default">
    	<div class="panel-heading">
            Employee's List
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import CSV</a>

        </div>
        <div class="panel-body">
            <form action="<?php echo site_url("welcome/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Date of Birth</th>
                      <th>Date of Join</th>
                      <th>Address</th>
                      <th>Company Email</th>
                      <th>Fb link</th>
                       <th>Education</th>
                      <th>Marital</th>
                      <th>Actions</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $this->db->query("SELECT * FROM staff_tbl ORDER BY id")->result();
                    if(count($query)>0){
                    foreach($query as $row){ 
                        ?>
                    <tr>
                       <td><a href="<?php echo base_url(); ?>profile/<?php echo $row->id; ?>"><?php echo $row->staff_name; ?></a></td>
                      <td><img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $row->pic; ?>" class="img-circle" width="50px" alt="User Image"></td>
                      <td><?php echo $row->gender; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td><?php echo $row->dob; ?></td>
                      <td><?php echo $row->doj; ?></td>
                      <td><?php echo $row->address; ?></td>
                      <td><?php echo $row->companyemail; ?></td>
                      <td><?php echo $row->fblink; ?></td>
                      <td><?php echo $row->education; ?></td>
                      <td><?php echo $row->marital; ?></td>
                      <td>
                           <a href="<?php echo base_url(); ?>profile/<?php echo $row->id; ?>" class="btn btn-info">View Profile</a>
                          <a href="<?php echo base_url(); ?>edit-staff/<?php echo $row->id; ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-staff/<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No Record(s) found.....</td></tr>
                    <?php } ?>

                      
                    
                </tbody>
            </table>  

     


        </div>
    </div>



</div>
</body>
</div>
</section>
</div>
</table>
</div>
</div>
</div>
</div>
</section>
</div>
