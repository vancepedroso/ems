  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->



<!--birthday notif -->
<div class="panel-body">



                    
                          <div class="alert alert-success alert-dismissible text-center mt-1" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                              <span class="glyphicon glyphicon-bell"></span> 

                           

 <?php

          $current_month_day=date("m-d");
          $current_year=date("Y");
          $query = $this->db->query("select * from staff_tbl where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}' and '{$current_year}'");
        //echo $query->num_rows();


        if($query->num_rows()>0)
        {
            $result=$query->result_array();




           foreach($result as $row) {

             //echo $row['staff_name'];

         echo "Wish " . $row["staff_name"]. " a happy Birthday today! ";

         // echo "Wish" $row['staff_name']; "a Happy Birthday Today!" // Print a single column data
          //echo print_r($row);       // Print the entire row data
           }
             //echo print_r($result);
        }
        else
        {
          echo "There is no Birthday Today!";
        }
    
         
?>
                            
                            </div>                
                     
                      
                
                </div>

<!-- //Birthday marque <h2> <marquee> Happy Birthday Vance Lief Pedroso! <i class="fa fa-birthday-cake" aria-hidden="true"> </i> Godbless and more birthdays to come - From Launchpad Family</marquee>
</h2> -->

<style>
h2 {
  
  color: #8ebf42;
  font-family: "Source Sans Pro";
  font-size: 3em;
  font-weight: 900;
  -webkit-user-select: none;
  user-select: none;
}
</style>
       <div class="callout callout-info">
          <h4>Employee Code Of Conduct</h4>

          <p>Employee COD Policy <a class="btn btn-default btn-sm" style="margin-bottom: 5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);" target="_blank" href="https://dtr.thelaunchpadteam.com/files/EMPLOYEE COC v2.pdf">Know More!</a></p>
        </div>

      <div class="callout callout-warning">
        <h4>EMS User Manual</h4>

        <p>Employee Management System Manual
          <a class="btn btn-default btn-sm" style="margin-bottom: 5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);" target="_blank" href="https://ems.thelaunchpadteam.com/upload/DTR USER MANUAL.pdf">Read More !</a></p>

      </div>

      <div class="row">


        <div class="col-lg-3 col-xs-6">


          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
          
         <h3><?php 
              if(isset($staff))
              {
                echo sizeof($staff);
              }
              else{
                echo 0;
              }
              ?></h3>
              <p>New employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url(); ?>manage-department" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php 
              if(isset($staff))
              {
                echo sizeof($staff);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Total Employees</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>
            <a href="<?php echo base_url(); ?>manage-staff" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- Main content -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE status='Resigned'");
          echo $query->num_rows();
          ?></h3>

              <p>Resigned</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">

              <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE status='Awol'");
          echo $query->num_rows();
          ?></h3>

              <p>Awol</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE status='Terminated'");
          echo $query->num_rows();
          ?></h3>
              <p>Terminated</p>
            </div>
            <div class="icon">
              <i class="ion-alert-circled"></i>
            </div>
            <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE status='Active'");
          echo $query->num_rows();
          ?></h3>

              <p>Active Employees</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

           <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
                <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE status='Inactive'");
          echo $query->num_rows();
          ?></h3>

              <p>Inactive</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
          <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE status='Returnee'");
          echo $query->num_rows();
          ?></h3>

              <p>Returnee</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
          <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE tenure='Regular'");
          echo $query->num_rows();
          ?></h3>

              <p>Regular Employees</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
          <h3><?php
          $query = $this->db->query("SELECT * FROM staff_tbl WHERE tenure='Probitionary'");
          echo $query->num_rows();
          ?></h3>

              <p>Iregular Employees</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>

            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

 
   <style>

 .col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }   

.accordion > .card {
  overflow: hidden;
}

.accordion > .card:not(:last-of-type) {
  border-bottom: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.accordion > .card:not(:first-of-type) {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.accordion > .card > .card-header {
  border-radius: 0;
  margin-bottom: 0;
}

.card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #ffffff;
  background-clip: border-box;
  border: 0 solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}

.card > hr {
  margin-right: 0;
  margin-left: 0;
}

.card > .list-group:first-child .list-group-item:first-child {
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.card > .list-group:last-child .list-group-item:last-child {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
}

.card-subtitle {
  margin-top: -0.375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link:hover {
  text-decoration: none;
}

.card-link + .card-link {
  margin-left: 1.25rem;
}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 0 solid rgba(0, 0, 0, 0.125);
}

.card-header:first-child {
  border-radius: calc(0.25rem - 0) calc(0.25rem - 0) 0 0;
}

.card-header + .list-group .list-group-item:first-child {
  border-top: 0;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 0 solid rgba(0, 0, 0, 0.125);
}

.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 0) calc(0.25rem - 0);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img,
.card-img-top,
.card-img-bottom {
  -ms-flex-negative: 0;
  flex-shrink: 0;
  width: 100%;
}

.card-img,
.card-img-top {
  border-top-left-radius: calc(0.25rem - 0);
  border-top-right-radius: calc(0.25rem - 0);
}

.card-img,
.card-img-bottom {
  border-bottom-right-radius: calc(0.25rem - 0);
  border-bottom-left-radius: calc(0.25rem - 0);
}

.card-deck .card {
  margin-bottom: 7.5px;
}

@media (min-width: 576px) {
  .card-deck {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
  }
  .card-deck .card {
    -ms-flex: 1 0 0%;
    flex: 1 0 0%;
    margin-right: 7.5px;
    margin-bottom: 0;
    margin-left: 7.5px;
  }
}

.card-group > .card {
  margin-bottom: 7.5px;
}

@media (min-width: 576px) {
  .card-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
  }
  .card-group > .card {
    -ms-flex: 1 0 0%;
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .card:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-top,
  .card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-bottom,
  .card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-top,
  .card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
  .card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}

.card-columns .card {
  margin-bottom: 0.75rem;
}

@media (min-width: 576px) {
  .card-columns {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
    -webkit-column-gap: 1.25rem;
    -moz-column-gap: 1.25rem;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}


  
body  
           {  
                margin:0; 
                padding:0;  
                background-color:#222d32;  
           }  
           
   
   </style>
        <!-- ./col -->
      </div>
      <!-- /.row -->



    </section>


 


 
  <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       


          <!-- small box -->
      
            <div class="inner">

              <div class="col-md-8">
                            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Reminders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
             <div class="card-body">
            <div class="table-responsive slimScrollDiv" style="height:600px;overflow-y:scroll">
                                    <table class="table table-hover table-bordered earning-box ">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($notice AS $value): ?>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td><?php echo $value->title ?></td>
                                                 
                                                <td><mark><a href="<?php echo base_url(); ?>uploads/img/reminders/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></mark>
                                                </td>
                                                <td style="width:100px"><?php echo $value->date ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
            <!-- /.box-body -->
          </div>
              </div>

    
            <div class="col-md-4">
              <!-- USERS LIST -->




              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>


                  <div class="box-tools pull-right">
                    <span class="label label-danger">

 <?php

          $current_month=date("m");
          $current_year=date("Y");
          $query = $this->db->query("select * from staff_tbl where DATE_FORMAT(DOJ, '%m')='{$current_month}' and '{$current_year}'");
        //echo $query->num_rows();


        if($query->num_rows()>0)
        {
            $result=$query->result_array();


           foreach($result as $row)
           {
       
              echo sizeof($result);
           }  
        }
      
       
?> New employees</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
          

    

        <?php
          if(isset($result)):
          $i=1; 
           foreach($result as $row):
          ?>
          
              <li>
           

                      <img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $row['pic'] ?>" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo $row['staff_name']; ?></a>
                      <span class="users-list-date">Today</span>
                    </li>
                    
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  </ul>
                  <!-- /.users-list -->
                 

        
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
            


            <!-- TABLE: Tenureship -->
              <div class="col-md-4">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tenureship</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">


                   <?php

          $current_month=date("m");
          $current_year=date("Y");
          $query = $this->db->query("select * from staff_tbl where DATE_FORMAT(probdate, '%m')='{$current_month}' and '{$current_year}'");
        //echo $query->num_rows();


        if($query->num_rows()>0)
        {
            $results=$query->result_array();


           foreach($results as $row)
           {
       
              echo sizeof($results);
           }  
        }
      
       
?>
                  <thead>

                  <tr>
                    <th>Name</th>
                    <th>Probitionary Date</th>
                    <th>Regularization Date</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                  
        <?php
          if(isset($result)):
          $i=1; 
           foreach($result as $rows):
          ?>

                <tr>
                  <td><?php echo $rows['staff_name']; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($rows['probdate'])); ?></td>
                   <td><?php echo date('d-m-Y', strtotime($rows['regdate'])); ?></td>
                </tr>
                 <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
              <a href="<?php echo base_url(); ?>tenured" class="btn btn-sm btn-default btn-flat pull-right">View All</a>
            </div>
            <!-- /.box-footer -->
          </div>
</div>


          </section>

            </div>
     
    


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
