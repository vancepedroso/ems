  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employees
        <small>Employee's List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Employee</li>
      </ol>
    </section>


 <style>  
           body  
           {  
                margin:0; 
                padding:0;  
                background-color:#222d32;  
           }  
           
      </style>  



 <div class="modal fade" id="modal-x2">
        <div class="modal-dialog modal-x2">
          <div class="modal-content ">


            <div class="modal-header">
             <h4 class="modal-title" id="exampleModalLabel1">Notice Board</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                                   
           
                    <div class="box-body">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Probitionary Date</label>
                          <input type="date" name="txtprob" value="" class="form-control" placeholder="DOB">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Regularization Date</label>
                          <input type="date" name="txtreg" value="" class="form-control" placeholder="DOJ">
                        </div>
                      </div>
                                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                  </form>

            
                                </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Employees Based on Tenurship</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <div class="panel-footer text-left">
            <!--<a href="<?php echo base_url(); ?>add-notice" class="btn btn-success">Add Reminder</a>-->
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-x2">Add New</button>
               
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Account/Position</th>
                  <th>Date Started</th>
                  <th>Probitionary Date</th>
                  <th>Reguralization Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                
                <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>

                <tr>
                  <td><a href="<?php echo base_url(); ?>profile/<?php echo $cnt['id']; ?>"><?php echo $cnt['staff_name']; ?></a></td>
                  <td><?php echo $cnt['position']; ?></td>
                   <td><?php echo date('d-m-Y', strtotime($cnt['doj'])); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($cnt['probdate'])); ?></td>
                     <td><?php echo date('d-m-Y', strtotime($cnt['regdate'])); ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>profile/<?php echo $cnt['id']; ?>" class="btn btn-info">View Profile</a>
                     <!-- <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-x2">Edit</button></a>-->
                       <a href="<?php echo base_url(); ?>edit-tenured/<?php echo $cnt['id']; ?>" class="btn btn-success">Edit</a>
                    <a href="<?php echo base_url(); ?>delete-staff/<?php echo $cnt['id']; ?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                 <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->