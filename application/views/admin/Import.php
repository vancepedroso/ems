 <style>
  .floatybox {
     display: inline-block;
     width: 123px;
}
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Management</a></li>
        <li class="active">Edit Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

         <section>
        <div class="col-md-12">
        <form action="<?php echo base_url();?>import/importFile" method="post" enctype="multipart/form-data">
          <br>
        Upload excel file : 
        <input type="file" name="uploadFile" value="" /><br><br>
        <input type="submit" name="submit" value="Upload" />
<br><br>
        </form>
      </div>

<style>
      input[type=submit] {
        padding: 5px 15px;
        background-color: #4CAF50;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        color: white;
        margin:0px
      width:30px;height:30px;
      display:inline-block;
      *display:inline;zoom:1;
      margin:0px;outline:none;
      vertical-align: top;
        
      }
      input[type=file] {
        /*
      margin:0px
      width:30px;height:30px;
      display:inline-block;
      *display:inline;zoom:1;
      margin:0px;outline:none;
      vertical-align: top;
        */
      }


    </style>


          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->