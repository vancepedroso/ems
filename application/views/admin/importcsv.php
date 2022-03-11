  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee's Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">User Profile</li>
      </ol>
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
        <!-- column -->
  <div class="container">
    <div class="main-body">
    
    <div class="container">
    <h2>Import CSV File Data into MySQL Database using PHP</h2>
    <?php if(!empty($status)){
        echo '<div class="alert alert-danger">'.$status.'</div>';
    } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
            Members list
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Members</a>
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
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Created</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $this->db->query("SELECT * FROM staff_tbl ORDER BY name")->result();
                    if(count($query)>0){
                    foreach($query as $row){ ?>
                    <tr>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td><?php echo $row->phone; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td><?php echo ($row->status == '1')?'Active':'Inactive'; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div>
</div>

</div>
</section>

</div>
  <!-- /.content-wrapper -->