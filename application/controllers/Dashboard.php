<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    protected $regdate;

    public function __construct()
    {
        parent::__construct();

        $this->load->model("dashboard_model");
        $this->load->helper("date");

        $this->regdate  = date("Y-m-d");
    }

    public function index()
    {
        $data["instances"]   = $this->dashboard_model->get(INSTANCES)->result();

        foreach($data["instances"] as $k => $v) {
            foreach($v as $key => $val) {
                switch($val) {
                    case "Maria"   : $maria[]  = $v; break;
                    case "Oracle"  : $oracle[] = $v; break;
                    case "Mssql"   : $mssql[]  = $v; break;
                }
            }
        }

        $data["type"]["maria"] = $this->dashboard_model->get_data(MASTER, array("DBTYPE"=>"Maria"))->result();
        $data["type"]["oracle"] = $this->dashboard_model->get_data(MASTER, array("DBTYPE"=>"Oracle"))->result();
        $data["type"]["mssql"] = $this->dashboard_model->get_data(MASTER, array("DBTYPE"=>"Mssql"))->result();

        // $data["type"]["maria"]["success"] = $data["type"]["oracle"]["success"] = $data["type"]["mssql"]["success"] = 0;
        echo "<pre>";
        foreach($data["type"] as $val) {
            foreach($val as $arr) {
                if($arr->DBTYPE == "Maria") {

                }

            }
            echo "<br>";



             //   $data["maria"]["success"] += count(element("BACKUPSTATUS", $v));

            exit;
        }
echo $data["type"]["maria"]["success"];

        exit;
        echo "<pre>";print_r($oracle->result());
         // $maria = $this->dashboard_model->


        $cond = array("BACKUPSTATUS"=>"S", "DATE(REGDATE)" => $this->regdate);

        $data["s_status"] = $this->dashboard_model->get_status("master",$cond);


        echo $this->db->last_query();
        $this->load->view('dashboard',$data);

    }
}
