  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reminders
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard Management</a></li>
        <li class="active">Reminders</li>
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
                                    <form role="form" method="post" action="Published_Notice" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Notice Title</label>
                                                <textarea class="form-control" name="title" id="message-text1" required minlength="25" maxlength="150"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Document</label>
                                                <label for="recipient-name1" class="control-label">Title</label>
                                                <input type="file" name="file_url" class="form-control" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Published Date</label>
                                                <input type="date" name="nodate" class="form-control" id="recipient-name1" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
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
              <h3 class="box-title">Reminders</h3>
            </div>
            <!-- /.box-header -->
             <div class="panel-footer text-left">
            <!--<a href="<?php echo base_url(); ?>add-notice" class="btn btn-success">Add Reminder</a>-->
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-x2">Add New</button>
               
              </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>File</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                  <tbody>
                                           <?php foreach($notice as $value): ?>
                                            <tr>
                                                <td><?php echo $value->id; ?></td>
                                                <td><?php echo $value->title; ?></td>
                                                <td><mark><a href="<?php echo base_url(); ?>uploads/img/reminders/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></mark>
                                                </td>
                                                <td><?php echo $value->date; ?></td>
                                                <td> <a href="<?php echo base_url(); ?>edit-staff" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-notice" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            <?php endforeach; ?>
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