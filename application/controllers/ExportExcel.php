<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportExcel extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->database();
 }
 

 public function exportExcelData($records)
 {
  $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
 }

 public function fetchDataFromTable()
 {
  $query =$this->db->get('staff_tbl'); // fetch Data from table
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
   $arrangeData['Staff Name'] = $data['staff_name'];
   $arrangeData['Gender'] = $data['gender'];
   $arrangeData['Company Email'] = $data['email'];
   $arrangeData['Mobile'] = $data['mobile'];
   $arrangeData['Date of birth'] = $data['dob'];
   $arrangeData['Date of join'] = $data['doj'];
   $arrangeData['Address'] = $data['address'];
   $arrangeData['Personal Email'] = $data['companyemail'];
   $arrangeData['Fb Link'] = $data['fblink'];
   $arrangeData['Country'] = $data['country'];
   $arrangeData['Department'] = $data['department_id'];
   $arrangeData['Education'] = $data['education'];
   $arrangeData['Marital'] = $data['marital'];
   $arrangeData['Religion'] = $data['religion'];
   $arrangeData['Blood'] = $data['blood'];
   $arrangeData['Religion'] = $data['religion'];
   $arrangeData['Alergy'] = $data['alergy'];
   $arrangeData['Medical'] = $data['med'];
   $arrangeData['Course'] = $data['company'];
   $arrangeData['Position'] = $data['position'];
   $arrangeData['Campaign'] = $data['campaign'];
   $arrangeData['Citenzhip'] = $data['citizenship'];
   $arrangeData['PS Bank number'] = $data['psbank'];
   $arrangeData['SSS number'] = $data['sss'];
   $arrangeData['Tin number'] = $data['tin'];
   $arrangeData['Philhealth number'] = $data['philhealth'];
   $arrangeData['Pag-ibig number'] = $data['pagibig'];
   $arrangeData['Person contact in case of Emergency'] = $data['emergency'];
   $arrangeData['Person Contact number'] = $data['emergencycontact'];
   $arrangeData['Relationship to the person'] = $data['emergecnyrelationship'];
   $arrangeData['Person Contact Address'] = $data['emergecnyaddress'];
   $arrangeData['Status'] = $data['status'];
   $arrangeData['Tenure'] = $data['tenure'];
   $arrangeData['Probitionary Date'] = $data['probdate'];
   $arrangeData['Reguralization Date'] = $data['regdate'];
   $dataToExports[] = $arrangeData;
  }
  // set header
  $filename = "EmployeeRecords.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
}
