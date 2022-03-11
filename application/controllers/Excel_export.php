<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
 
 function index()
 {
  $this->load->model("excel_export_model");
  $data["staff_tbl_data"] = $this->excel_export_model->fetch_data();
  $this->load->view("admin/manage-staff", $data);
 }

 function action()
 {
  $this->load->model("excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("staff_name", "gender", "email", "mobile", "dob");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $staff_tbl_data = $this->excel_export_model->fetch_data();

  $excel_row = 2;

  foreach($staff_tbl_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->staff_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->gender);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->email);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->mobile);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->dob);

   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->doj);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->address);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->companyemail);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->fblink);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->country);

   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Employee Data.xls"');
  $object_writer->save('php://output');
 }
}