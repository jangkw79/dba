<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    protected $regdate;
    private $sql;

    public function __construct()
    {
        parent::__construct();

        $this->load->model("dashboard_model");
        $this->load->helper("url");

        $this->regdate  = date("Y-m-d");

        $this->sql = "select bi.* , bm.BACKUPSTATUS, bm.SEQ
                          ,(
                            select count(*)  from BkpmonInstancesInfo
                            where DBTYPE = 'Maria'
                          ) as maria
                          ,(
                            select count(*) from BkpmonInstancesInfo
                            where DBTYPE = 'Oracle'
                          ) as oracle
                          ,(
                            select count(*) from BkpmonInstancesInfo
                            where DBTYPE = 'Mssql'
                          ) as mssql
                          from BkpmonInstancesInfo as bi
                            left join (
                                  SELECT bm.HOSTNAME as host, bm.DBNAME as dname, bm.BACKUPSTATUS, bm.SEQ as seq
                                                                from BkpmonInstancesInfo as bi
                                  inner join BkpmonMaster AS bm
                                  ON bi.HOSTNAME = bm.HOSTNAME AND bi.DBNAME = bm.DBNAME
                                  WHERE date_format(bm.REGDATE, '%Y-%m-%d') = '".$this->regdate."'
                                      ) as bm
                              ON bi.HOSTNAME = bm.host AND bi.DBNAME = bm.dname order by bi.DBNAME, bm.BACKUPSTATUS asc";
    }

    public function index()
    {
        $data["instances"]   = $this->dashboard_model->query($this->sql)->result();

        foreach($data["instances"] as $k => $v) {
            switch($v->DBTYPE) {
                case "Maria"   : $data["maria"][]  = $v; break;
                case "Oracle"  : $data["oracle"][] = $v; break;
                case "Mssql"   : $data["mssql"][]  = $v; break;
            }
        }

        $data["item"] = $this->reordering($data["instances"]);

        $data["item"]["summary"]["instances"] = count($data["instances"]);


        $this->load->view('dashboard',$data);
    }

    public function reordering($arg) {
        $data["Maria"]["success"] = $data["Oracle"]["success"] = $data["Mssql"]["success"] = 0;
        $data["Maria"]["process"] = $data["Oracle"]["process"] = $data["Mssql"]["process"] = 0;
        $data["Maria"]["fail"] = $data["Oracle"]["fail"] = $data["Mssql"]["fail"] = 0;
        if(is_array($arg)) {
            foreach($arg as $k => $v) {
                switch($v->DBTYPE) {
                    case("Maria") :
                        $data["Maria"][] = $v;
                        if($v->BACKUPSTATUS == "S") { $data["Maria"]["success"]++; }
                        if($v->BACKUPSTATUS == "P") { $data["Maria"]["process"]++; }
                        if($v->BACKUPSTATUS == "F") { $data["Maria"]["fail"]++; }
                        break;
                    case("Oracle") :
                        $data["Oracle"][] = $v;
                        if($v->BACKUPSTATUS == "S") { $data["Oracle"]["success"]++; }
                        if($v->BACKUPSTATUS == "P") { $data["Oracle"]["process"]++; }
                        if($v->BACKUPSTATUS == "F") { $data["Oracle"]["fail"]++; }
                        break;
                    case("Mssql") :
                        $data["Mssql"][] = $v;
                        if($v->BACKUPSTATUS == "S") { $data["Mssql"]["success"]++; }
                        if($v->BACKUPSTATUS == "P") { $data["Mssql"]["process"]++; }
                        if($v->BACKUPSTATUS == "F") { $data["Mssql"]["fail"]++; }
                        break;
                }
            }
        }
        $data["summary"]["success"] = $data["Maria"]["success"] + $data["Oracle"]["success"] + $data["Mssql"]["success"];
        $data["summary"]["process"] = $data["Maria"]["process"] + $data["Oracle"]["process"] + $data["Mssql"]["process"];
        $data["summary"]["fail"] = $data["Maria"]["fail"] + $data["Oracle"]["fail"] + $data["Mssql"]["fail"];
        return $data;
    }
}
