<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model{

    function __construct() {
        parent::__construct();
		$this->licencedb = $this->load->database('licencedb', TRUE);
		if(!$this->session->userdata('CompanyDbName')){
			redirect('login');
		}
        $sessiondbName = $this->session->userdata('CompanyDbName');
        $sessiondbUserName = $this->session->userdata('CompanyDbUsername');
        $sessiondbPassword = $this->session->userdata('CompanyDbPassword');
        $db['companydb'] = array(
            'dsn'   => '',
            'hostname' => 'localhost',
            'username' => $sessiondbUserName,
            'password' => $sessiondbPassword,
            'database' => $sessiondbName,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        );
        
    }

    function check_user_email($email){
        $this->licencedb->select('*');
        $this->licencedb->from('user');
        $this->licencedb->where('EMAIL',$email);
        return $this->licencedb->get()->result_array();
    }

    function sign_up_user($user){
        return $this->licencedb->insert('user',$user);
    }

    function save_new_client($party){
        $this->companydb = $this->load->database($db['companydb'], TRUE);
        return $this->companydb->insert('party',$party);
    }

    function update_profile($uid , $data){
        $this->companydb = $this->load->database($db['companydb'], TRUE);
        $this->companydb->select('IMAGE');
        $this->companydb->from('party');
        $this->companydb->where('ID',$uid);
        $prof_img = $this->companydb->get()->result_array();

        if($prof_img){
            if($data['IMAGE'] != ''){
                $file = $prof_img[0]['IMAGE'];
                $path = 'public/images/profile_image/';
                unlink($path.$file);
            }
        }

        $user['first_name'] = $data['FNAME'];
        $user['last_name'] = $data['LNAME'];
        $user['gender'] = $data['GENDER'];
        $this->licencedb->where('ID',$uid);
        $this->licencedb->update('user',$user);

        $this->companydb->where('ID',$uid);
        return $this->companydb->update('party',$data);
    }

    function delete_profile_image($uid , $file_name){
        $this->companydb = $this->load->database($db['companydb'], TRUE);
        if($file_name != '' && $uid != ''){
            $path = 'public/images/profile_image/';
            unlink($path.$file_name);
            $this->companydb->where('ID',$uid);
            return $this->companydb->update('party',array('IMAGE'=>''));
        }
    }

    function insert_token($email , $token){
        $time = date('Y-m-d h:m:s');
        $expired = strtotime("+1 day", strtotime($time));
        $expired =  date("Y-m-d h:m:s", $expired);
        $this->licencedb->where('EMAIL',$email);
        return $this->licencedb->update('user',array('TOKEN'=>$token , 'TOKEN_EXPIRED'=>$expired));
    }

    function get_token_user($token){

        $time = date('Y-m-d h:m:s');

        $this->licencedb->select('EMAIL');
        $this->licencedb->from('user');
        $this->licencedb->where('TOKEN',$token);
        $this->licencedb->where('TOKEN_EXPIRED >=',$time);
        $res = $this->licencedb->get()->result_array();

        if($res){
            foreach ($res as $key) {
                return $key['EMAIL'];
            }
        }else{
            return false;
        }
    }

    function update_password($email , $password){
        $this->licencedb->where('EMAIL',$email);
        return $this->licencedb->update('user',array('PASSWORD'=>$password , 'TOKEN'=>'' , 'TOKEN_EXPIRED'=>''));
    }

}
