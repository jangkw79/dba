<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro extends CI_Controller {

	public function index()
	{
		$this->load->view('intro');
	}
}
