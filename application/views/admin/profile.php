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
 <?php if(isset($content)): ?>
              <?php foreach($content as $cnt): ?>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
        <!-- column -->
  <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
        
          <!-- /Breadcrumb -->
      
                      <div class="panel panel-primary">
                <div class="panel-heading">Employee's Profile</div>
                <div class="panel-body">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

                    <img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" alt="Admin" class="rounded-circle" width="100">
                    <div class="mt-3">
                      <h4><?php echo $cnt['staff_name'] ?></h4>
                      <p class="text-secondary mb-1"><?php echo $cnt['position'] ?></p>
                      <p class="text-muted font-size-sm"><?php echo $cnt['address'] ?></p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <br>
        
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> Personal Email</h6>
                    <span class="text-secondary"><?php echo $cnt['companyemail'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> Company Email</h6>
                    <span class="text-secondary"><?php echo $cnt['email']; ?></span>
                  </li>
                   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> Facebook Link</h6>
                    <span class="text-secondary"><?php echo $cnt['fblink']; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i> Mobile</h6>
                    <span class="text-secondary"><?php echo $cnt['mobile'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> Status</h6>
                    <span class="text-secondary"><?php echo $cnt['status']; ?></span>
                  </li>
                   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i> CV/Resume</h6>
                    
                      <a href="<?php echo base_url(); ?>./uploads/cv/<?php echo $cnt['resume']; ?>" class="dwn">Download</a>

                    <span class="text-secondary"><?php echo $cnt['resume']; ?></span>
                  </li>
                
                </ul>
        
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                   <div class="row">
                    <div class="col-sm-3">
                
                    </div>
        
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Tenure</strong>
            
                    </div>
                    <div class="col-sm-9 text-secondary">
                   <?php echo $cnt['tenure']; ?>
                    </div>
                  </div>

                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Course</strong>
            
                    </div>
                    <div class="col-sm-9 text-secondary">
                   <?php echo $cnt['company']; ?>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Religion</strong>
            
                    </div>
                    <div class="col-sm-9 text-secondary">
                   <?php echo $cnt['religion']; ?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Date of Birth</strong>
            
                    </div>
                    <div class="col-sm-9 text-secondary">
                   <?php echo date('d-m-Y', strtotime($cnt['dob'])); ?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Date of Joined</strong>

                    </div>
                    <div class="col-sm-9 text-secondary">
                   <?php echo date('d-m-Y', strtotime($cnt['doj'])); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Marital</strong>

                    </div>
                    <div class="col-sm-9 text-secondary">
                  <?php echo $cnt['marital']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> PS Bank Account Number (2000-XXXX-XXXX)</strong>

                    </div>
                    <div class="col-sm-9 text-secondary">
                 <?php echo $cnt['psbank']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Social Security System Number (SSS #)</strong>
                    </div>
                    <div class="col-sm-9 text-secondary">
                 <?php echo $cnt['psbank']; ?>
                    </div>
                  </div>

                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> PhilHealth Number</strong>

                    </div>
                    <div class="col-sm-9 text-secondary">
                <?php echo $cnt['philhealth']; ?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Tax Identification Number (TIN #)</strong>

                    </div>
                    <div class="col-sm-9 text-secondary">
               <?php echo $cnt['tin']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Pag-ibig MID Number</strong>
 
                    </div>
                    <div class="col-sm-9 text-secondary">
              <?php echo $cnt['pagibig']; ?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Emergency Contact Person</strong>

                    </div>
                    <div class="col-sm-9 text-secondary">
           <?php echo $cnt['emergency']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Emergency Contact</strong>
  
                    </div>
                    <div class="col-sm-9 text-secondary">
             <?php echo $cnt['emergencycontact']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Emergency Contact Relationship</strong>
  
                    </div>
                    <div class="col-sm-9 text-secondary">
             <?php echo $cnt['emergecnyrelationship']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <strong><i class="far fa-file-alt mr-1"></i> Emergency Contact Address</strong>
      
                    </div>
                    <div class="col-sm-9 text-secondary">
            <?php echo $cnt['emergecnyaddress']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">

                      <a class="btn btn-info " target="__blank" href="<?php echo base_url(); ?>edit-staff/<?php echo $cnt['id']; ?>">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>

    </div>
  </div>
          <!-- general form elements -->
          <style type="text/css">
            body  
           {  
                margin:0; 
                padding:0;  
                background-color:#222d32;  
           }  

.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
          </style>

    <!-- /.content -->
  </div>
</div>
</div>
</section>
  <?php endforeach; ?>
            <?php endif; ?>
</div>
  <!-- /.content-wrapper -->