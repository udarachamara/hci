<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	function __construct() {
		parent::__construct();
    }

    public function sign_up_user(){
        $this->load->model('User_Model');
        $this->load->model('Login_Model');
    	$fname = $_POST['fname'];
    	$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = sha1($_POST['password']);
		$reg_status = $this->check_user_registration_status($email);
		$response = array();
		$user = array('first_name'=>$fname , 'last_name'=> $lname , 'email'=>$email , 'password'=> $password, 'gender'=>'O');
		if($reg_status){
			$response = array('code'=>1001 , 'status'=>false , 'msg'=> 'Email is Already Register..!');
		}else{
			$res = $this->User_Model->sign_up_user($user);
			if($res){
				$user = $this->Login_Model->get_auth_user($email , $password);
				$client = array();
				foreach ($user as $key) {
					$client['UID'] = $key['id'];
					$client['FNAME'] = $key['first_name'];
					$client['LNAME'] = $key['last_name'];
					$client['GENDER'] = $key['gender'];
				}
				$this->User_Model->save_new_client($client);
				$this->session->set_userdata('login_user' , $user);
				$response = array('code'=>1000 , 'status'=>true );
			}else{
				$response = array('code'=>1002 , 'status'=>false,'msg'=> 'Registration Faield..!' );
			}
		}

		echo json_encode($response);
	}
	

	public function check_user_registration_status($email){
        $this->load->model('User_Model');
		$res = $this->User_Model->check_user_email($email);
		$response = array();
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function update_profile(){

        $this->load->model('User_Model');
		$response = array();
		$file = '';
		$destination = '';

		if(isset($_FILES["PROF_IMG"])){
			$target_dir = "public/images/profile_image/";
			$file = 'prof_'.date('Ymdhms').'_'.$_FILES["PROF_IMG"]['name'];
			$target_file = $target_dir . $file;
			if (move_uploaded_file($_FILES["PROF_IMG"]["tmp_name"], $target_file)) {
        		
	    	} else {
	        	$response = array('code'=>1001 , 'status'=>'faild');
				echo json_encode($response);
				exit;
	    	}
		}
		
	    $uid = $this->session->userdata('login_user')[0]['id'];
	    $data = $_POST;
	    

	    $data['ASSETS'] = json_encode($_POST['ASSETS']);
	    $data['PROF_IMG'] = $file;
	    if(isset($data['FAMILY_DETAILS']))
	        $data['FAMILY_DETAILS'] = json_encode($data['FAMILY_DETAILS']);
	        
        $res = $this->User_Model->update_profile($uid , $data);
        $mail = true;
        
        if($res){
            $response = array('code'=>1000 , 'status'=>'success','data'=>$data);
        }else{
            $response = array('code'=>1001 , 'status'=>'faild');
        }
        
        echo json_encode($response);
	}

	public function delete_profile_image(){
        $this->load->model('User_Model');
		$uid = $_POST['uid'];
		$file_name = $_POST['filename'];
		$res = $this->User_Model->delete_profile_image($uid , $file_name);

		if($res){
            $response = array('code'=>1000 , 'status'=>'success','url'=>base_url('public/images/profile_image/').'default.jpg');
        }else{
            $response = array('code'=>1001 , 'status'=>'faild' , 'msg'=> 'Profile Image Delete Unccessfully..!');
        }
        
        echo json_encode($response);
	}

	public function forgot_password(){
        $this->load->model('User_Model');
		$email = $_POST['email'];
		$user = $this->User_Model->check_user_email($email);

		if($user){

		}else{
			$response = array('code'=>1001 , 'status'=>'faild' , 'msg'=> 'There is no record about email that you entered.<br>Please Re Check Your E-mail..!');
			echo json_encode($response);
			exit;
		}
		
		$link =  $this->link_generate(35);
		$res = $this->User_Model->insert_token($email , $link);
		$mail = false;
		if($res){
			$from = 'info@joblab.lk';
			$to = $email;
			$subject = 'Reinsurance Password Reset';
			$message = "<html>
							<head>
							<title>Reinsurance Password Reset</title>
							</head>
							<body>
								<div style='margin:10px;'>
									<h5>Hi User,</h5>

									<p>Your recently requested to reset your password for your account.<br> Click the link below to reset it.</p>
									<br>
									<div style='margin:auto'>
										<a style='padding: 5px;' href='".base_url()."reset-password?link=".$link."'>Click here to Reset Your Password</a>
									</div>
								</div>
							</body>
							</html>";

			$mail = $this->sendMail($from ,$to ,$subject , $message);
			
		}else{
		    $response = array('code'=>1001 , 'status'=>'faild' , 'msg'=> 'Somthing Went Wrong Please Try Again..!');
		    exit;
		}

		if($mail){
            $response = array('code'=>1000 , 'status'=>'success' , 'msg'=> 'Please Check Your Mail Inbox..');
        }else{
            $response = array('code'=>1001 , 'status'=>'faild' , 'msg'=> 'Please Try Again..!');
        }
        
        echo json_encode($response);
		
	}

	public function reset_new_password(){
        $this->load->model('User_Model');
		$email = $_POST['email'];
		$password = sha1($_POST['new_password']);
		$res = $this->User_Model->update_password($email , $password);

		if($res){
            $response = array('code'=>1000 , 'status'=>'success' , 'url'=> 'login');
        }else{
            $response = array('code'=>1001 , 'status'=>'faild');
        }
        
        echo json_encode($response);
	}
	
	public function sendMail($from='' ,$to='' ,$subject='' , $message=''){

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <info@joblab.lk>' . "\r\n";
        
        return mail($to,$subject,$message,$headers);
	}

	public function link_generate($length = ''){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomLink = '';
    	for ($i = 0; $i < $length; $i++) {
        	$randomLink .= $characters[rand(0, $charactersLength - 1)];
    	}
		return $randomLink;
	}

}
