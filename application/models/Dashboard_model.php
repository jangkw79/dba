<?php
class Dashboard_model extends CI_Model {

    public $num_row = 0;
    protected $query;

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->master = MASTER;
        $this->slave  = SLAVE;
        $this->instance = INSTANCES;
    }

    public function get($tbl=null) { return ($tbl === null) ? 0 : $this->db->get($tbl); }

    public function where($cond) {
        if(is_array($cond)) {
            foreach($cond as $k => $v) {
                $this->db->where($k, $v);
            }
        } else {
            $this->db->where($cond);
        }
    }
    public function query($sql) {
        return $this->db->query($sql);
    }
    public function get_data($tbl, $cond=null) {
        if($cond !== null) { $this->where($cond); }
        return $this->get($tbl);
    }

    public function queryRow() {
        return $this->db->get();
    }
    public function makeQry($tbl, $where)
    {
        return $this->db->get_where($tbl, $where);
    }
    public function get_maria()
    {
        $this->query = $this->makeQry($this->instance, array("DBTYPE"=>"Maria"));
        return $this->query->result();
    }
    public function get_oracle()
    {
        $this->query = $this->makeQry($this->instance, array("DBTYPE"=>"Oracle"));
        return $this->query->result();
    }
    public function get_mssql()
    {
        $this->query = $this->makeQry($this->instance, array("DBTYPE"=>"Mssql"));
        return $this->query->result();
    }
    public function get_num() {
        return $this->query->num_rows();
    }
    public function get_row($tbl="master", $cond=array(),$sort=array()) {
        $this->db->from($tbl);
        $this->db->where($cond);
        if(count($sort)>0) {
            foreach($sort as $k => $v) {
                $this->db->order_by($k,$v);
            }
        }
        return $this->queryRow();
    }
}