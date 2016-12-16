<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Api extends REST_Controller {

    protected $regdate;


    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->masterdb = MASTER;
        $this->slavedb  = SLAVE;
        $this->instances = INSTANCES;
        $this->regdate  = date("Y-m-d H:i:s");
    }

    public function index_post() {
        $regdate = $this->regdate;

        if($this->post()) {
            foreach($this->post() as $k => $v) {
                $data[$k]   = $v;
            }
        }

        // Duplicate Check.
        $dup = $this->index_get($this->masterdb, $data);

        $data["REGDATE"] = $regdate;
        $this->rest->db->insert($this->masterdb, $data);
        echo $this->rest->db->insert_id);
print_r($data);
            $this->set_response(null,REST_Controller::HTTP_OK);

        if($dup < 1) {
            $data["REGDATE"] = $regdate;
            $this->rest->db->insert($this->masterdb, $data);
            echo $this->rest->db->insert_id);
print_r($data);
            $this->set_response(null,REST_Controller::HTTP_OK);
        } else {
            $this->set_response(null,REST_Controller::HTTP_CONFLICT);
            echo "not input";
        }
    }
    public function complete_post() {
        if($this->post()) {
            foreach($this->post() as $k => $v) {
                $data[$k]   = $v;
            }
        }
        $condition = array("seq" => $this->post("seq"));

        $res = $this->rest->db->update($this->masterdb, $data, $condition);
        if($res) $this->set_response(null,REST_Controller::HTTP_OK);
        echo "dup";

    }
    public function index_get($tbl,$arr = false) {
        if($arr !== false) {
            $this->rest->db->select(" SEQ");
            foreach($arr as $k => $v) {
                $this->rest->db->where($k, $v);
            }
        }
        $query = $this->rest->db->get($tbl);
        // echo $this->rest->db->last_query();
        return $query->num_rows();
    }

    public function init_post() {
        if($this->post()) {
            foreach($this->post() as $k => $v) {
                $data[$k]   = $v;
            }
        }
        // Duplicate Check.
        $dup = $this->index_get($this->instances, $data);
        if($dup < 1) {
            $res = $this->rest->db->insert($this->instances, $data);
            $this->set_response(null,REST_Controller::HTTP_OK);
            echo "dup";
        } else {
            $this->set_response(null,REST_Controller::HTTP_CONFLICT);
            echo "not input";
        }
/*
        $res = $this->rest->db->insert($this->instances, $data);
        if($res) {
            $this->set_response($res,REST_Controller::HTTP_OK);
        } else {
            $this->set_response($res,REST_Controller::HTTP_CONFLICT);
        }*/
    }

    public function detail_post() {
        echo "ok";

        if($this->post()) {
            foreach($this->post() as $k => $v) { $data[$k]   = $v; }
        }

        $data["REGDATE"]    = $this->regdate;
        $res = $this->rest->db->insert($this->slavedb, $data);

        if($res) {
            $this->set_response($res, REST_Controller::HTTP_OK);
        } else {
            $this->set_response($res, REST_Controller::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function master_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retreival.
        // Usually a model is to be used for this.


        $query = $this->rest->db->query(" select * from BkpmonMaster $where ");


        $user = NULL;

        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $user = $value;
                }
            }
        }

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function users_post()
    {
        // $this->some_model->update_user( ... );
        $message = [
            'id' => 100, // Automatically generated by the model
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'Added a resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

}
