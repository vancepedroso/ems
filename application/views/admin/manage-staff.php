<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Employee Management</a></li>
        <li class="active">Manage Employee</li>
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
  

 <style>  
           body  
           {  
                margin:0; 
                padding:0;  
                background-color:#222d32;  
           }  
           
      </style>   
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

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
        <section>

          
    

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
      border: 1px solid #555555;
        
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



        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
  

            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Staff/insert');?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="txtname" class="form-control" placeholder="Full Name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Team</label>
                    <select class="form-control" name="slcdepartment">
                      <option value="">Select</option>
                      <?php
                      if(isset($department))
                      {
                        foreach($department as $cnt)
                        {
                          print "<option value='".$cnt['id']."'>".$cnt['department_name']."</option>";
                        }
                      } 
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="slcgender">
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
               <label>Mobile</label>
            <input type="text" name="txtmobile" class="form-control" placeholder="Mobile">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Email</label>
                    <input type="text" name="txtemail" class="form-control" placeholder="Personal Email">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="filephoto" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="txtdob" class="form-control" placeholder="DOB">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Joining</label>
                    <input type="date" name="txtdoj" class="form-control" placeholder="DOJ">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Personal Email Address</label>
                    <input type="text" name="txtperad" class="form-control" placeholder="Personal Email Address">
                  </div>
                </div>



                -----------------------------------------------------------------------ADDITIONAL INFORMATION------------------------------------------------------------------
                <center><p>You can leave this blank</p></center>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Facebook link/Username</label>
                    <input type="text" name="txtfbuser" class="form-control" placeholder="Facebook link/Username">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control" name="slccountry">
                      <option value="">Select</option>
                      <?php
                        if(isset($country))
                        {
                          foreach ($country as $cnt1)
                          {
                            print "<option value='".$cnt1['country_name']."'>".$cnt1['country_name']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="txtaddress"></textarea>
                  </div>
                </div>

     <div class="col-md-6">
                  <div class="form-group">
                    <label>Highest Educational Attainment</label>
                    <input type="text" name="txteducation" class="form-control" placeholder="Highest Educational Attainment">
                  </div>
                </div>

      <div class="col-md-6">
                  <div class="form-group">
                    <label>Course Taken/Finished</label>
                    <input type="text" name="txtcompany" class="form-control" placeholder="Course Taken/Finished">
                  </div>
                </div>

     <div class="col-md-6">
                  <div class="form-group">
                    <label>Citizenship</label>
                    <input type="text" name="txtcitizenship" class="form-control" placeholder="Citizenship">
                  </div>
                </div>
                
    <div class="col-md-6">
                  <div class="form-group">
                 <label>Marital Status</label>
                    <select class="form-control" name="slcmarital">
                      <option value="">Select</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Divorced">Divorced</option>
                    </select>
                  </div>
                </div>

     <div class="col-md-6">
                  <div class="form-group">
                    <label>Religion</label>
                    <input type="text" name="txtreligion" class="form-control" placeholder="Religion">
                  </div>
                </div>
                
    <div class="col-md-6">
                  <div class="form-group">
                    <label>Blood Type</label>
                    <input type="text" name="txtblood" class="form-control" placeholder="Blood Type">
                  </div>
                </div>
                
    <div class="col-md-6">
                  <div class="form-group">
                    <label>Any allergies/phobia that we should know?</label>
                    <input type="text" name="txtalergy" class="form-control" placeholder="Any allergies/phobia that we should know?">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                    <label>Any serious illness or medical problem?</label>
                    <input type="text" name="txtmed" class="form-control" placeholder="Any serious illness or medical problem?">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                  <label>Position / Job Description:</label>
              <input type="text" name="txtposition" class="form-control" placeholder="Position / Job Description:">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                  <label>Account / Campaign</label>
              <input type="text" name="txtcampaign" class="form-control" placeholder="Account / Campaign">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>PS Bank Account Number (2000-XXXX-XXXX)</label>
            <input type="text" name="txtpsbank" class="form-control" placeholder="PS Bank Account Number (2000-XXXX-XXXX)">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Social Security System Number (SSS #)</label>
            <input type="text" name="txtsss" class="form-control" placeholder="Social Security System Number (SSS #)">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Tax Identification Number (TIN #)</label>
            <input type="text" name="txttin" class="form-control" placeholder="Tax Identification Number (TIN #)">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>PhilHealth Number</label>
            <input type="text" name="txtphilhealth" class="form-control" placeholder="PhilHealth Number">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Pag-ibig MID Number</label>
            <input type="text" name="txtpagibig" class="form-control" placeholder="Pag-ibig MID Number">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Person to contact in case of emergency</label>
            <input type="text" name="txtemergency" class="form-control" placeholder="Person to contact in case of emergency">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Contact Number</label>
            <input type="text" name="txtemergencycontact" class="form-control" placeholder="Contact Number">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Relationship with the Contact Person:</label>
            <input type="text" name="txtemergecnyrelationship" class="form-control" placeholder="Relationship with the Contact Person">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Address of the Contact Person</label>
            <input type="text" name="txtemergecnyaddress" class="form-control" placeholder="Address of the Contact Person incase of emergency">
                  </div>
                </div>


    <div class="col-md-6">
                  <div class="form-group">
                    <label>CV/Resume</label>
                      <input type="file" name="resume" class="form-control"/>
                  </div>
                </div>

 <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="slcstatus">
                      <option value="">Select</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="Returnee">Returnee</option>
                      <option value="Awol">Awol</option>
                      <option value="Resigned">Resigned</option>
                      <option value="Terminated">Terminated</option>
                    </select>
                  </div>
                </div>

  <div class="col-md-6">
                  <div class="form-group">
                    <label>Tenure</label>
                    <select class="form-control" name="slctenure">
                      <option value="">Select</option>
                      <option value="Probitionary">Probitionary</option>
                      <option value="Regular">Regular</option>
                    </select>
                  </div>
                </div>


              </div>


    
   

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
              </div>

            
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
            </div>
            <!--<div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


 
  



<div class="col-xs-12">





  <div class="box box-danger">


            <div class="box-header with-border">
              <h3 class="box-title">Filter List</h3>
            </div>
            <div class="box-body">
              <div class="row">

                <div class="col-xs-3">
                   <form action="" id="frm_filters" name="frm_filters">
                  <p>Position</p>
                  <!--<input type="text" class="form-control">-->
                   <input type="text" name="filter_title1" id="filter_title1" maxlength="128" minlength="1"  class="form-control">
                </div>
               
                <div class="col-xs-3">
                   <p>Employee Name</p>
                  <!--<input type="text" class="form-control">-->
                  <input type="text" name="filter_title" id="filter_title" maxlength="128" minlength="1" class="form-control">
                </div>



                <!-- select -->

                 <div class="col-xs-3">
                  <p>Department</p>
                <div class="form-group">
                  <select class="form-control" placeholder=".col-xs-3">
                    <option value="" <?php if(empty($this->input->get('filter_departemen'))) print 'selected';?>>Show All data</option>
                                    <?php
                                    if(isset($department))
                                    {
                                    foreach($department as $cnt)
                                    {
                                        $selected = $this->input->get('filter_departemen')==$cnt['id'] ? 'selected':'';
                                       print "<option value='".$cnt['id']."'>".$cnt['department_name']."</option>";
                                    }
                                  }
                                    ?> 
                  </select>
                </div>
              </div>
 
 

 


              </div>
            </div>
             <div class="panel-footer text-right">

                <button type="submit" name="frm-filter-btn" id="frm-filter-btn" class="btn btn-primary">Search</button>
              </form>
                    <!--<button type="submit" id="generate" class="btn btn-primary">Generate</button>-->
                </div>
            <!-- /.box-body -->
          </div></div>



<style type="text/css"></style>
<style>

a {
    color: #f96332;
}
.m-t-5{
    margin-top: 5px;   
}
.card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    box-shadow: none;
}
.card .body {
    font-size: 14px;
    color: #424242;
    padding: 20px;
    font-weight: 400;
}
.profile-page .profile-header {
    position: relative
}

.profile-page .profile-header .profile-image img {
    border-radius: 50%;
    width: 140px;
    border: 3px solid #fff;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)
}

.profile-page .profile-header .social-icon a {
    margin: 0 5px
}

.profile-page .profile-sub-header {
    min-height: 60px;
    width: 100%
}

.profile-page .profile-sub-header ul.box-list {
    display: inline-table;
    table-layout: fixed;
    width: 100%;
    background: #eee
}

.profile-page .profile-sub-header ul.box-list li {
    border-right: 1px solid #e0e0e0;
    display: table-cell;
    list-style: none
}

.profile-page .profile-sub-header ul.box-list li:last-child {
    border-right: none
}

.profile-page .profile-sub-header ul.box-list li a {
    display: block;
    padding: 15px 0;
    color: #424242
}
  </style>


 <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Excel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="col-md-13" style="margin-top:20px">
     
      
     
        <div class="form-group">

             <div class="col-md-12">

        <form action="<?php echo base_url(); ?>importcsv" method="post" name="upload_excel" enctype="multipart/form-data">
     
          <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>

<br><br>
        </form>
      </div>

        </div>

    <div id="result"></div>
      
       
        </div>
            </div>




    <div class="modal-footer">
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  <div class="modal fade" id="modal-x2">
        <div class="modal-dialog modal-x2">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="col-md-13" style="margin-top:20px">
        <?php
           echo form_open('registration/index');
           echo validation_errors();
           if (isset($success))
           echo '<p>'.$success.'</p>';
        ?>

      
     
        <div class="form-group">

            <p><input type="text" id="username" name="username" placeholder="Email/Username: " value="" class="form-control" required></p><br />

      <p><input type="password" id="password" type="password" name="password" placeholder="Password: " class="form-control" required> 
            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span></p><br />
                 <label>User Type</label>
                    <select class="form-control" name="usertype">
                      <option value="">Select</option>
                      <option value="1">Admin</option>
                      <!--<option value="2">Employee</option>-->
                    </select>

        </div>


   <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
      
        <?php 
        echo form_close(); 
        ?>
        </div>
            </div>




    <div class="modal-footer">
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>
<script>
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>


    <!-- /.modal -->
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Manage Employee</h3>
            </div>
            <!-- /.box-header -->

               <div class="panel-footer text-left">
            <!-- <button type="button" name ="export" class="btn btn-success" value="Export"> -->
  <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import CSV</a>
       
            <form action="<?php echo site_url("welcome/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <button type="submit" class="btn btn-success" name="importSubmit" value="IMPORT">Import</button>
        </form>

            
              </div>
  
        

             <div class="panel-footer text-right">
             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Add New Employee
                </button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-x2">
                  Add New Admin
                </button>
              </div>

            <div class="box-body">
          
              <div class="table-responsive">
           
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
             
                  <tr>

                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Company Email</th>
                    <th>Date of Birth</th>
                    <th>Date of Joined</th>
                    <th>Address</th>
                    <th>Personal Email Address</th>
                    <th>Facebook link/Username</th>
                    <th>Country</th>
                    <th>Highest Educational Attainment</th>
                    <th>Course Taken/Finished</th>
                    <th>Marital</th>
                    <th>Religion</th>
                    <th>Blood</th>
                    <th>Alergy</th>
                    <th>Med</th>
                    <th>Position/Job Description</th>
                    <th>Account/Campaign</th>
                    <th>Citizenship</th>
                    <th>PS Bank Account Number</th>
                    <th>Social Security System Number (SSS #)</th>
                    <th>Tax Identification Number (TIN #)</th>
                    <th>PhilHealth Number</th>
                    <th>Pag-ibig MID Number</th>
                    <th>Person to contact in case of emergency</th>
                    <th>Person Contact No.</th>
                    <th>Relationship with the Contact Person</th>
                    <th>Address of the Contact Person</th>
                    <th>Status</th>
                    <th>Tenure</th>
                    <th>Probation Date</th>
                    <th>Reguralization Date</th>
                    <th>Actions</th>









                  </tr>
                  </thead> 

 <tbody>
                    <?php
                    //get rows query
                    $query = $this->db->query("SELECT * FROM staff_tbl ORDER BY id")->result();
                    if(count($query)>0){
                    $i=1; 

                    foreach($query as $row){ 
                        ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><a href="<?php echo base_url(); ?>profile/<?php echo $row->id; ?>"><?php echo $row->staff_name; ?></a></td>
                      <td><img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $row->pic; ?>" class="img-circle" width="50px" alt="User Image"></td>
                      <td><?php echo $row->department_id; ?></td>
                      <td><?php echo $row->gender; ?></td>
                      <td><?php echo $row->mobile; ?></td>
                      <td><?php echo $row->companyemail; ?></td>
                      <td><?php echo $row->dob; ?></td>
                      <td><?php echo $row->doj; ?></td>
                      <td><?php echo $row->address; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td><?php echo $row->fblink; ?></td>
                      <td><?php echo $row->country; ?></td>


                      <td><?php echo $row->education; ?></td>
                      <td><?php echo $row->company; ?></td>
                      <td><?php echo $row->marital; ?></td>
                      <td><?php echo $row->religion; ?></td>
                      <td><?php echo $row->blood; ?></td>
                      <td><?php echo $row->alergy; ?></td>
                      <td><?php echo $row->med; ?></td>
                      <td><?php echo $row->position; ?></td>
                      <td><?php echo $row->campaign; ?></td>
                      <td><?php echo $row->citizenship; ?></td>
                      <td><?php echo $row->psbank; ?></td>
                      <td><?php echo $row->sss; ?></td>
                      <td><?php echo $row->tin; ?></td>
                      <td><?php echo $row->philhealth; ?></td>
                      <td><?php echo $row->pagibig; ?></td>
                      <td><?php echo $row->emergency; ?></td>
                      <td><?php echo $row->emergencycontact; ?></td>
                      <td><?php echo $row->emergecnyrelationship; ?></td>
                      <td><?php echo $row->emergecnyaddress; ?></td>
                      <td><?php echo $row->status; ?></td>
                      <td><?php echo $row->tenure; ?></td>
                      <td><?php echo $row->probdate; ?></td>
                      <td><?php echo $row->regdate; ?></td>
                      <td>
                           <a href="<?php echo base_url(); ?>profile/<?php echo $row->id; ?>" class="btn btn-info">View Profile</a>
                          <a href="<?php echo base_url(); ?>edit-staff/<?php echo $row->id; ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-staff/<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>

                    <?php
                       $i++; 
                  } 
                }
                    else
                        { ?>
                    <tr><td colspan="5">No Record(s) found.....</td></tr>
                    <?php } ?>

            


                  
                  </tbody>
                </table>


              </div>
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

    