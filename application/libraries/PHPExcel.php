<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "third_party/Classes/PHPExcel.php";

class PHPExcel_lib extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}