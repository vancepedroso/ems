<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Import extends CI_Controller {
// construct
public function __construct() {
parent::__construct();
// load model

$this->load->model('Import_model', 'import');
$this->load->helper(array('url','html','form'));
}    

public function index() {
        $this->load->view('admin/header'); 
        $this->load->view('admin/manage-staff');
        $this->load->view('admin/footer');
}
public function importFile()
{
if ($this->input->post('submit'))
 {
$path = 'uploads/import/';
require_once APPPATH . "/third_party/PHPExcel.php";
$config['upload_path'] = $path;
$config['allowed_types'] = 'xlsx|xls|csv';
$config['remove_spaces'] = TRUE;
$this->load->library('upload', $config);
$this->upload->initialize($config);

if (!$this->upload->do_upload('uploadFile')) 
{
        //some error occured
$error = array('error' => $this->upload->display_errors());
} 
else 
{
        //upload succesfull
$data = array('upload_data' => $this->upload->data());
}

if(empty($error))
{
if (!empty($data['upload_data']['file_name'])) 
{
$import_xls_file = $data['upload_data']['file_name'];
} else {
$import_xls_file = 0;
}
$inputFileName = $path . $import_xls_file;
try {
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);
$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, true,true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true ,true);
$flag = true;
$i=0;
foreach ($allDataInSheet as $value) {
if($flag){
$flag =false;
continue;
}
$inserdata[$i]['staff_name'] = $value['A'];
$inserdata[$i]['gender'] = $value['B'];
$inserdata[$i]['email'] = $value['C'];
$inserdata[$i]['mobile'] = $value['D'];
$inserdata[$i]['dob'] = $value['E'];
$inserdata[$i]['doj'] = $value['F'];
$inserdata[$i]['address'] = $value['G'];
$inserdata[$i]['fblink'] = $value['H'];

$inserdata[$i]['companyemail'] = $value['I'];
$inserdata[$i]['country'] = $value['J'];
$inserdata[$i]['department_id'] = $value['K'];
$inserdata[$i]['education'] = $value['L'];
$inserdata[$i]['marital'] = $value['M'];
$inserdata[$i]['religion'] = $value['N'];
$inserdata[$i]['blood'] = $value['O'];
$inserdata[$i]['alergy'] = $value['P'];

$inserdata[$i]['med'] = $value['Q'];
$inserdata[$i]['company'] = $value['R'];
$inserdata[$i]['position'] = $value['S'];
$inserdata[$i]['campaign'] = $value['T'];
$inserdata[$i]['citizenship'] = $value['U'];
$inserdata[$i]['psbank'] = $value['V'];
$inserdata[$i]['sss'] = $value['W'];
$inserdata[$i]['tin'] = $value['X'];

$inserdata[$i]['philhealth'] = $value['Y'];
$inserdata[$i]['pagibig'] = $value['Z'];
$inserdata[$i]['emergency'] = $value['A'];
$inserdata[$i]['emergencycontact'] = $value['B'];
$inserdata[$i]['emergecnyrelationship'] = $value['C'];
$inserdata[$i]['emergecnyaddress'] = $value['C'];
$inserdata[$i]['status'] = $value['C'];
$inserdata[$i]['tenure'] = $value['C'];
$i++;
}

$result = $this->import->insert($inserdata);   
if($result){

        $this->session->set_flashdata('success', "New Staff Added Succesfully"); 
        redirect(base_url('manage-staff'));
        echo "Imported successfully";

}else{
echo "ERROR !";
}             
} catch (Exception $e) {
die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
. '": ' .$e->getMessage());
}
}else{
echo $error['error'];
}
}
       
}
}
?>