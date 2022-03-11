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


<style>
  body  
           {  
                margin:0; 
                padding:0;  
                background-color:#222d32;  
           }  
</style>
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Staff</h3>
            </div>
            <!-- /.box-header -->

            <?php if(isset($content)): ?>
              <?php foreach($content as $cnt): ?>
                  <!-- form start -->
                  <?php echo form_open_multipart('Staff/update');?>
                    <div class="box-body">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="hidden" name="txtid" value="<?php echo $cnt['id'] ?>" class="form-control" placeholder="Full Name">
                          <input type="text" name="txtname" value="<?php echo $cnt['staff_name'] ?>" class="form-control" placeholder="Full Name">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Department</label>
                          <select class="form-control" name="slcdepartment">
                            <option value="">Select</option>
                            <?php
                            if(isset($department))
                            {
                              foreach($department as $cnt1)
                              {
                                if($cnt1['id']==$cnt['department_id'])
                                {
                                  print "<option value='".$cnt1['id']."' selected>".$cnt1['department_name']."</option>";
                                }
                                else{
                                  print "<option value='".$cnt1['id']."'>".$cnt1['department_name']."</option>";
                                }
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
                            <?php
                            if($cnt['gender']=='Male')
                            {
                              print '<option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>';
                            }
                            elseif($cnt['gender']=='Femle')
                            {
                              print '<option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                    <option value="Others">Others</option>';
                            }
                            elseif($cnt['gender']=='Others')
                            {
                              print '<option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others" selected>Others</option>';
                            }
                            else{
                              print '<option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Company Email</label>
                          <input type="text" name="txtemail" value="<?php echo $cnt['email'] ?>" class="form-control" placeholder="Email" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile</label>
                          <input type="text" name="txtmobile" value="<?php echo $cnt['mobile'] ?>" class="form-control" placeholder="Mobile" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Photo</label>
                          <input type="file" name="filephoto" value="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" name="txtdob" value="<?php echo $cnt['dob'] ?>" class="form-control" placeholder="DOB">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date of Joining</label>
                          <input type="date" name="txtdoj" value="<?php echo $cnt['doj'] ?>" class="form-control" placeholder="DOJ">
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Personal Email Address</label>
                          <input type="text" name="txtperad" value="<?php echo $cnt['companyemail'] ?>" class="form-control" placeholder="Personal Email Address">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Facebook link/Username</label>
                          <input type="text" name="txtfbuser" value="<?php echo $cnt['fblink'] ?>" class="form-control" placeholder="Facebook link/Username">
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
                                  if($cnt1['country_name']==$cnt['country'])
                                  {
                                    print "<option value='".$cnt1['country_name']."' selected>".$cnt1['country_name']."</option>";
                                  }
                                  else{
                                    print "<option value='".$cnt1['country_name']."'>".$cnt1['country_name']."</option>";
                                  }
                                  
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control" name="txtaddress"><?php echo $cnt['address'] ?></textarea>
                        </div>
                      </div>

<div class="col-md-6">
                  <div class="form-group">
                    <label>Highest Educational Attainment</label>
                    <input type="text" name="txteducation" value="<?php echo $cnt['education'] ?>" class="form-control" placeholder="Highest Educational Attainment">
                  </div>
                </div>

     <div class="col-md-6">
                  <div class="form-group">
                    <label>Citizenship</label>
                    <input type="text" name="txtcitizenship" value="<?php echo $cnt['citizenship'] ?>" class="form-control" placeholder="Citizenship">
                  </div>
                </div>
                
    <div class="col-md-6">
                  <div class="form-group">
                 <label>Marital Status</label>
                    <select class="form-control" name="slcmarital">
                       <?php
                            if($cnt['marital']=='Single')
                            {
                              print '<option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>';
                            }
                            elseif($cnt['marital']=='Married')
                            {
                              print '<option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>';
                            }
                            elseif($cnt['marital']=='Divorced')
                            {
                              print '<option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>';
                            }
                            else{
                              print '<option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>';
                            }
                            ?>
                       

                      
                    </select>
                  </div>
                </div>

     <div class="col-md-6">
                  <div class="form-group">
                    <label>Religion</label>
                    <input type="text" name="txtreligion" value="<?php echo $cnt['religion'] ?>" class="form-control" placeholder="Religion">
                  </div>
                </div>
                
    <div class="col-md-6">
                  <div class="form-group">
                    <label>Blood Type</label>
                    <input type="text" name="txtblood" value="<?php echo $cnt['blood'] ?>" class="form-control" placeholder="Blood Type">
                  </div>
                </div>
                
    <div class="col-md-6">
                  <div class="form-group">
                    <label>Any allergies/phobia that we should know?</label>
                    <input type="text" name="txtalergy" value="<?php echo $cnt['alergy'] ?>" class="form-control" placeholder="Any allergies/phobia that we should know?">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                    <label>Any serious illness or medical problem?</label>
                    <input type="text" name="txtmed" value="<?php echo $cnt['med'] ?>" class="form-control" placeholder="Any serious illness or medical problem?">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                    <label>Course Taken</label>
                    <input type="text" name="txtcompany" value="<?php echo $cnt['company'] ?>" class="form-control" placeholder="Course taken">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                  <label>Position / Job Description:</label>
              <input type="text" name="txtposition" value="<?php echo $cnt['position'] ?>" class="form-control" placeholder="Position / Job Description:">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
                  <label>Account / Campaign</label>
              <input type="text" name="txtcampaign" value="<?php echo $cnt['campaign'] ?>" class="form-control" placeholder="Account / Campaign">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>PS Bank Account Number (2000-XXXX-XXXX)</label>
            <input type="text" name="txtpsbank" value="<?php echo $cnt['psbank'] ?>" class="form-control" placeholder="PS Bank Account Number (2000-XXXX-XXXX)">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Social Security System Number (SSS #)</label>
            <input type="text" name="txtsss" value="<?php echo $cnt['sss'] ?>" class="form-control" placeholder="Social Security System Number (SSS #)">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Tax Identification Number (TIN #)</label>
            <input type="text" name="txttin" value="<?php echo $cnt['tin'] ?>" class="form-control" placeholder="Tax Identification Number (TIN #)">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>PhilHealth Number</label>
            <input type="text" name="txtphilhealth" value="<?php echo $cnt['philhealth'] ?>" class="form-control" placeholder="PhilHealth Number">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Pag-ibig MID Number</label>
            <input type="text" name="txtpagibig" value="<?php echo $cnt['pagibig'] ?>" class="form-control" placeholder="Pag-ibig MID Number">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Person to contact in case of emergency</label>
            <input type="text" name="txtemergency" value="<?php echo $cnt['emergency'] ?>" class="form-control" placeholder="Person to contact in case of emergency">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Contact Number</label>
            <input type="text" name="txtemergencycontact" value="<?php echo $cnt['emergencycontact'] ?>" class="form-control" placeholder="Contact Number">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Relationship with the Contact Person:</label>
            <input type="text" name="txtemergecnyrelationship" value="<?php echo $cnt['emergecnyrelationship'] ?>" class="form-control" placeholder="Relationship with the Contact Person">
                  </div>
                </div>

    <div class="col-md-6">
                  <div class="form-group">
               <label>Address of the Contact Person</label>
            <input type="text" name="txtemergecnyaddress" value="<?php echo $cnt['emergecnyaddress'] ?>" class="form-control" placeholder="Address of the Contact Person incase of emergency">
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


                       <?php
                            if($cnt['status']=='Active')
                            {
                              print '<option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Returnee">Returnee</option>
                                    <option value="Awol">Awol</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Terminated">Terminated</option>';
                            }
                            elseif($cnt['status']=='Inactive')
                            {
                              print '<option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                    <option value="Others">Others</option>';
                            }
                            elseif($cnt['status']=='Returnee')
                            {
                              print '<option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Returnee">Returnee</option>
                                    <option value="Awol">Awol</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Terminated">Terminated</option>';
                            }
                            elseif($cnt['status']=='Awol')
                            {
                            print '<option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Returnee">Returnee</option>
                                    <option value="Awol">Awol</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Terminated">Terminated</option>';
                            }
                            elseif($cnt['status']=='Resigned')
                            {
                              print '<option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Returnee">Returnee</option>
                                    <option value="Awol">Awol</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Terminated">Terminated</option>';
                            }
                            elseif($cnt['status']=='Terminated')
                            {
                              print '<option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Returnee">Returnee</option>
                                    <option value="Awol">Awol</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Terminated">Terminated</option>';
                            }
                            else{
                              print '<option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Returnee">Returnee</option>
                                    <option value="Awol">Awol</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Terminated">Terminated</option>';
                            }
                            ?>

 </select>
                  </div>
                </div>

              <div class="col-md-6">
                  <div class="form-group">
                    <label>Tenure</label>
                    <select class="form-control" name="slctenure">
                      <option value="">Select</option>

                      <?php
                            if($cnt['tenure']=='Probitionary')
                            {
                              print '<option value="Probitionary" selected>Probitionary</option>
                                    <option value="Regular">Regular</option>';
                            }
                            elseif($cnt['tenure']=='Regular')
                            {
                              print '<option value="Probitionary" selected>Probitionary</option>
                                    <option value="Regular">Regular</option>';
                            }
                            ?>
                     
                    </select>
                  </div>
                </div>


                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                  </form>
                <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->