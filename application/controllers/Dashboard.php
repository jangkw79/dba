<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("dashboard_model");
    }

    public function index()
    {
        $this->load->view('dashboard');

        $data = $this->dashboard_model->get_maria();

        echo "<Pre>";
        print_r($data);
    }
}
