  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
      <h1>
        Staff Profile Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Management</a></li>
        <li class="active">Staff Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-md-3">


  <?php if(isset($content)): ?>
              <?php foreach($content as $cnt): ?>

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div class="d-flex flex-column align-items-center text-center">
              <img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center"><?php echo $cnt['staff_name'] ?></h3>

              <p class="text-muted text-center"><?php echo $cnt['position'] ?></p>

            
              <!--<a class="btn btn-info" target="__blank" href="#"><b>Edit</b></a>-->
              <a href="<?php echo base_url(); ?>edit-employee" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                <?php echo $cnt['education'] ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $cnt['address'] ?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>CV/Resume</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

     
        <div class="col-md-9">
           <div class="box box-primary">
        <div class="box-header with-border">
              
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               
                <!-- About Me Box -->

              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Department</strong>

              <p class="text-muted">
                <?php echo $cnt['department_name']; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Personal Email</strong>

              <p class="text-muted"><?php echo $cnt['companyemail'] ?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Company Email</strong>

              <p>
               <?php echo $cnt['email']; ?>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>Facebook Link</strong>

              <p><?php echo $cnt['fblink']; ?></p>

              <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Mobile</strong>

              <p><?php echo $cnt['mobile'] ?></p>


             <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Tenure</strong>

              <p><?php echo $cnt['status']; ?></p>

               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Course</strong>

              <p><?php echo $cnt['education']; ?></p>

               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Date of Birth</strong>

              <p><?php echo $cnt['dob']; ?></p>

               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Date of Joined</strong>

              <p><?php echo $cnt['doj']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Marital</strong>

              <p><?php echo $cnt['marital']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>PS Bank Account Number (2000-XXXX-XXXX)</strong>

              <p><?php echo $cnt['psbank']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Social Security System Number (SSS #)</strong>

              <p><?php echo $cnt['sss']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>PhilHealth Number</strong>

              <p><?php echo $cnt['philhealth']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Tax Identification Number (TIN #)</strong>

              <p><?php echo $cnt['tin']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Pag-ibig MID Number</strong>

              <p><?php echo $cnt['pagibig']; ?></p>
               <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Emergency Contact Person</strong>

              <p><?php echo $cnt['emergency']; ?></p>

              <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Emergency Contact</strong>

              <p><?php echo $cnt['emergencycontact']; ?></p>

              <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Emergency Contact Relationship</strong>

              <p><?php echo $cnt['emergecnyrelationship']; ?></p>

              <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i>Emergency Contact Address</strong>

              <p><?php echo $cnt['emergecnyaddress']; ?></p>

              <hr>
                 <!--<div class="row">
                    <div class="col-sm-12">

                      <a class="btn btn-info" target="__blank" href="<?php echo base_url(); ?>edit-employee"><b>Edit</b></a>

                      

                    </div>
                  </div>-->
              

            </div>
            <!-- /.box-body -->
       

         
             

              
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->

            <?php endforeach; ?>
            <?php endif; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
