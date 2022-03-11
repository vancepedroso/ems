  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Account</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

 
     <!-- Main content -->
    <section class="content">
      <div class="row">

 <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>
<div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
                    <i class="fa fa-key"></i> Change Password
                </div>
                <div class="container">
  <div class="col-md-2"></div>
     <div class="col-md-8" style="margin-top:20px">

    <form action="<?php echo base_url().'change/change'?>" method="post">
      <div class="errors">
      
     
      </div>
      <p><input type="password" name="old_password" placeholder="Current Password: " class="form-control" required></p><br />
      <p><input type="password" name="newpassword" placeholder="New Password: " class="form-control" required></p><br />
      <p><input type="password" name="re_password" placeholder="Retype New Password: " class="form-control" required></p><br />
      <div class="box-footer">
               <input type="submit" value="Change Password" class="btn btn-success" />
              </div>
    </form>
       </div>
     </section>
   </div>
</div>
</div>
</div></section>
</div>

        </section>
    </div>
