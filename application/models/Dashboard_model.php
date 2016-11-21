<?php
class Dashboard_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->master = "BkpmonMaster";
        $this->slave  = "BkpmonSlave";
    }

    public function makeQry($tbl, $field)
    {
        return $this->db->get_where($tbl, $field);
    }
    public function get_maria()
    {
        $query = $this->makeQry($this->master, array("DBTYPE"=>"Maria"));
        return $query->result();
    }
    public function get_oracle()
    {
        $query = $this->makeQry($this->master, array("DBTYPE"=>"Oracle"));
        return $query->result();
    }
}