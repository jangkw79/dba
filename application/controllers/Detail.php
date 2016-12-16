<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model("dashboard_model");
        $this->load->helper("function");
        $this->regdate = date("Y-m-d");
    }

    public function index()
    {
        $cond = array("DBNAME"=>$this->input->get("dbname") );
        $data["instance"] = $this->dashboard_model->get_data(INSTANCES, $cond)->row();
        $data["item"] = $this->dashboard_model->get_row(SLAVE,$cond, array("REGDATE" => "desc") )->result();

        $this->load->view('detail',$data);
    }

}
