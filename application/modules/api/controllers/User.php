<?php
class User extends Api_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->model('api/mdl_request', 'model');
	}

	function users_signup() {

		#User Signup
		#Submit First Name, Last Name, Email Address, Password, Role
		#If Email ID present, return to the Login Page
		#Else return the error message to the APP

		/**
		 * @api {post} /api/user/users_signup Signup
		 * @apiName signup
		 * @apiGroup User
		 * @apiVersion 1.0.0
		 * @apiParam {String} users_fname  Firstname
		 * @apiParam {String} users_lname Lastname.
		 * @apiParam {String} users_email_id Email Address.
		 * @apiParam {String} users_password Password.
		 * @apiParam {String} users_role Role
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 *@apiExample sample input:
		 *	{"users_fname":"John","users_lname":"Smith","users_email_id":"jhon@yahoo.in","users_password":"testuser@123","users_role":"admin"}
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			{
    "message": "You are successfully registered!!!",
    "error": "",
    "code": 200,
    "status": "Success",
    "data": {
        "request_id": 1616483325.261395
    }
}
			*/
 		
 		#collect required information
		$users_fname = trim(isset($this->input_data['users_fname'])?$this->input_data['users_fname']:'');
		$users_lname = trim(isset($this->input_data['users_lname'])?$this->input_data['users_lname']:'');
		$users_email_id = trim(isset($this->input_data['users_email_id'])?$this->input_data['users_email_id']:'');
		$users_password = trim(isset($this->input_data['users_password'])?$this->input_data['users_password']:'');
		$users_role = trim(isset($this->input_data['users_role'])?$this->input_data['users_role']:'');

		#check First Name exist or not		
		if(empty($users_fname)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter First Name.";
			$this->error = array('message'=>'Please Enter First Name.');
			$this->sendResponse();
			return;
		}

		#check Last Name exist or not	
		if(empty($users_lname)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter Last Name.";
			$this->error = array('message'=>'Please Enter Last Name.');
			$this->sendResponse();
			return;
		}

		#check Email id exists or not
		if(empty($users_email_id)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter Email Address";
			$this->error = array('message'=>'Please Enter Email Address');
			$this->sendResponse();
			return;
		}

		#check Password exists or not
		if(empty($users_password)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter Password";
			$this->error = array('message'=>'Please Enter Password');
			$this->sendResponse();
			return;
		}

		#check role exists or not
		if(empty($users_role)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Select Role";
			$this->error = array('message'=>'Please Select Role');
			$this->sendResponse();
			return;
		}

		#Check valid role
		if(!in_array(strtolower($users_role), ['admin','user'])){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Invalid Role";
			$this->error = array('message'=>'Invalid Role');
			$this->sendResponse();
			return;
		}

		#Check for Valid First  Name
		if(! preg_match('/^[a-zA-Z]+$/', $users_fname)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please enter valid first name";
			$this->error = array('message'=>'Please enter valid first name');
			$this->sendResponse();
			return;
		} 

		if(! preg_match('/^[a-zA-Z]+$/', $users_lname)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please enter valid last name";
			$this->error = array('message'=>'Please enter valid last name');
			$this->sendResponse();
			return;
		} 
			
		if (!filter_var($users_email_id, FILTER_VALIDATE_EMAIL)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please enter valid email address";
			$this->error = array('message'=>'Please enter valid email address');
			$this->sendResponse();
			return;

		}

		if(strlen($users_fname) > 50 || strlen($users_lname) > 50) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Maximum 50 characters are allow.";
			$this->error = array('message'=>'Maximum 50 characters are allow.');
			$this->sendResponse();
			return;
		}

		if(strlen($users_email_id) > 300) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Maximum 300 characters are allow.";
			$this->error = array('message'=>'Maximum 300 characters are allow.');
			$this->sendResponse();
			return;
		}

		if(strlen($users_password) > 15) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Maximum 15 characters are allow.";
			$this->error = array('message'=>'Maximum 15 characters are allow.');
			$this->sendResponse();
			return;
		}



		#check emailid exists for other users or not
		$is_email_exists = $this->model->get_records(['users_email_id' => $users_email_id], 'users', ['users_email_id'], 'users_id DESC', 1);

		#if email id exists the send error message
		if(count($is_email_exists)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "EmailId already exists.";
			$this->error = array('message'=>'EmailId already exists.');
			$this->sendResponse();
			return;			
		}

		#define insert array
		$insert_data = [];
		$insert_data['users_fname']		=	$users_fname;
		$insert_data['users_lname']		=	$users_lname;
		$insert_data['users_email_id']	=	$users_email_id;
		$insert_data['users_password']	=	$users_password;
		$insert_data['users_role']		=	$users_role;

		#insert Users Data
		$id = $this->model->_insert($insert_data, 'users');

		#check 
		if(!empty($id)) {
			$this->response['code'] = 200;
			$this->response['status'] = 'Success';
			$this->response['message'] = "You are successfully registered!!!";
			$this->response['data'] = [];
			$this->error = [];
			$this->sendResponse();
			return;
		} else {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "There might be an issue while register.";
			$this->error = array('message'=>'There might be an issue while register.');
			$this->sendResponse();
			return;
		}
	}

	function login() {

		#User Logging in to the system
		#Get Username , Password for Validating
		#If records are present, return the token to the APP
		#Else return the error message to the APP

		/**
		 * @api {post} /api/user/login Login
		 * @apiName login
		 * @apiGroup User
		 * @apiVersion 1.0.0
		 * @apiParam {String} username  Username
		 * @apiParam {String} password Password.
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Record Object With Token
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 *@apiExample sample input:
		 *	{"username":"jhon@yahoo.in","password":"testuser@123"}
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
*     	{
    "message": "User Information Retrive Successfully!!!",
    "error": "",
    "code": 200,
    "status": "Success",
    "data": {
        "token": "284dace48b41f81c4eb4b861cc505d026557ed84",
        "UserInfo": {
            "users_id": "1",
            "users_fname": "John",
            "users_lname": "Smith",
            "users_email_id": "jhon@yahoo.in",
            "users_password": "testuser@123",
            "users_role": "Admin",
            "insert_dt": "2021-03-23 12:25:08",
            "update_dt": "2021-03-23 12:25:08"
        },
        "request_id": 1616485496.935314
    }
}
			*/
 		
 		#collect required information
		$username = trim(isset($this->input_data['username'])?$this->input_data['username']:'');
		$password = trim(isset($this->input_data['password'])?$this->input_data['password']:'');
		
		#check username eits or not		
		if(empty($username)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Username is Mandatory";
			$this->error = array('message'=>'Username is Mandatory!');
			$this->sendResponse();
			return;
		}

		#check password exits or not
		if(empty($password)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Password is Mandatory";
			$this->error = array('message'=>'Password is Mandatory!');
			$this->sendResponse();
			return;
		}

		#get logged in user info
		$UserInfo = $this->model->get_records(['users_email_id' =>$username, 'users_password' => $password], 'users', [], 'users_id DESC', 1);

		#check userinfo avilable or not
		if(empty($UserInfo)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Authentication Failure!!";
			$this->error = array('message'=>'Authentication Failure!!');
			$this->sendResponse();
			return;
		} 

		#set users id and users type info
		$users_role	=	$UserInfo[0]->users_role;
		$users_id	=	$UserInfo[0]->users_id;

		#generate token
		$token = sha1(md5(microtime() . "" . $users_id));

		#prepare access token insert information
		$data = array(
			'users_id' 		=> $users_id,
			'access_token' 	=> $token,
			'users_role' 	=> $users_role
		);

		#Generate the Access Token	and make user login
		$access_token = $this->model->_insert($data,'access_token'); 

		#assign required info in response array
		$user_response				= array();
		$user_response['token']		= $token;
		$user_response['UserInfo']	= $UserInfo[0];
			
		#check userinfo exits or not
		if(!empty($UserInfo)) {
			$this->response['code'] = 200;
			$this->response['status'] = 'Success';
			$this->response['message'] = "User Information Retrive Successfully!!!";
			$this->response['data'] = $user_response;
			$this->error = [];
			$this->sendResponse();
			return;
		} else {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "User Information not available";
			$this->error = array('message'=>'User Information not available!!');
			$this->sendResponse();
			return;
		}
	}

	function edit_userinfo() {

		 /**
         * @api {post} /api/user/edit_userinfo Edit Userinfo
         * @apiName Edit Userinfo
         * @apiGroup User
         * @apiVersion 1.0.0
         * @apiParam {String} Token 
         * @apiParam {String} users_fname User Fname
         * @apiParam {String} users_lname User Lname
         *
         * @apiSuccess {Number} code HTTP Status Code.
         * @apiSuccess {String} message  Associated Message.
         * @apiSuccess {Object} error  Error if Any.
         *
         *@apiExample sample input:
         *  {"users_fname":"D001","users_lname":"Test"}
         *
         * @apiSuccessExample Success-Response:
            *     HTTP/1.1 200 OK
            * 
           {
    "message": "User data has been updated Successfully!!!",
    "error": "",
    "code": 200,
    "status": "Success",
    "data": {
        "request_id": 1616486681.460377
    }
}
        */
        #collect required information
        $users_fname = trim(isset($this->input_data['users_fname'])?$this->input_data['users_fname']:'');
        $users_lname = trim(isset($this->input_data['users_lname'])?$this->input_data['users_lname']:'');
        $users_id = $this->id;

        #Check users info exits or not base on token       
        $UsersInfo = $this->model->get_records(['users_id' => $users_id], 'users', ['users_id', 'users_role', 'users_fname', 'users_lname', 'users_email_id']);

        $users_role = $UsersInfo[0]->users_role;

        #If users info not exits then show error        
        if(!count($UsersInfo)) {
            $this->response['code'] = 400;
            $this->response['status'] = 'error';
            $this->response['message'] = "Usernames information no available";
            $this->error = array('message'=>'Usernames information no available');
            $this->sendResponse();
            return;
        } 

        #check First Name exist or not		
		if(empty($users_fname)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter First Name.";
			$this->error = array('message'=>'Please Enter First Name.');
			$this->sendResponse();
			return;
		}

		#check Last Name exist or not	
		if(empty($users_lname)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter Last Name.";
			$this->error = array('message'=>'Please Enter Last Name.');
			$this->sendResponse();
			return;
		}

		#Check valid role
		if(!in_array(strtolower($users_role), ['admin','user'])){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Invalid Role";
			$this->error = array('message'=>'Invalid Role');
			$this->sendResponse();
			return;
		}

		#Check for Valid First  Name
		if(! preg_match('/^[a-zA-Z]+$/', $users_fname)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please enter valid first name";
			$this->error = array('message'=>'Please enter valid first name');
			$this->sendResponse();
			return;
		} 

		if(! preg_match('/^[a-zA-Z]+$/', $users_lname)) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please enter valid last name";
			$this->error = array('message'=>'Please enter valid last name');
			$this->sendResponse();
			return;
		} 

		if(strlen($users_fname) > 50 || strlen($users_lname) > 50) {
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Maximum 50 characters are allow.";
			$this->error = array('message'=>'Maximum 50 characters are allow.');
			$this->sendResponse();
			return;
		}

		#update fname & lname
		$update_data	=	[];
		$update_data['users_fname']	=	$users_fname;
		$update_data['users_lname']	=	$users_lname;

		$ret = $this->model->_update(['users_id' => $users_id],	$update_data, 'users');

		if(!empty($ret)) {
			$this->response['code'] = 200;
            $this->response['status'] = 'Success';
            $this->response['message'] = "User data has been updated Successfully!!!";
            $this->response['data'] = [];
            $this->error = [];
            $this->sendResponse();
            return;
		} else {
			$this->response['code'] = 400;
            $this->response['status'] = 'error';
            $this->response['message'] = "Internal Server Error";
            $this->error = array('message'=>'Internal Server Error!!');
            $this->sendResponse();
            return;
		}

	}

	function add_ticket() {

		/**
         * @api {post} /api/user/add_ticket Add Ticket
         * @apiName Add Ticket
         * @apiGroup User
         * @apiVersion 1.0.0
         * @apiParam {String} Token 
         * @apiParam {String} message Message
         *
         * @apiSuccess {Number} code HTTP Status Code.
         * @apiSuccess {String} message  Associated Message.
        * @apiSuccess {Object} error  Error if Any.
         *
         *@apiExample sample input:
         *  {"message":"test message"}
         *
         * @apiSuccessExample Success-Response:
            *     HTTP/1.1 200 OK
            * 
           {
			    "message": "User data has been updated Successfully!!!",
			    "error": "",
			    "code": 200,
			    "status": "Success",
			    "data": {
			        "request_id": 1616486681.460377
			    }
			}

		**/

		 #collect required information
        $message = trim(isset($this->input_data['message'])?$this->input_data['message']:'');
        $users_id = $this->id;

        #Check users info exits or not base on token       
        $UsersInfo = $this->model->get_records(['users_id' => $users_id], 'users', ['users_id', 'users_role', 'users_fname', 'users_lname', 'users_email_id']);

        $users_role = $UsersInfo[0]->users_role;

        #If users info not exits then show error        
        if(!count($UsersInfo)) {
            $this->response['code'] = 400;
            $this->response['status'] = 'error';
            $this->response['message'] = "Usernames information no available";
            $this->error = array('message'=>'Usernames information no available');
            $this->sendResponse();
            return;
        } 

        if(strtolower($users_role) != 'user') {
        	$this->response['code'] = 401;
            $this->response['status'] = 'error';
            $this->response['message'] = "Invalid Authentication";
            $this->error = array('message'=>'Invalid Authentication');
            $this->sendResponse();
            return;	
        }

        #check message exists or not
		if(empty($message)){
			$this->response['code'] = 400;
			$this->response['status'] = 'error';
			$this->response['message'] = "Please Enter Message.";
			$this->error = array('message'=>'Please Enter Message.');
			$this->sendResponse();
			return;
		}

		#insert user message info
		$insert_data				=	[];
		$insert_data['users_id']	=	$users_id;
		$insert_data['message']		=	$message;

		$id = $this->model->_insert($insert_data, 'user_tickets');

		if(!empty($id)) {
			$this->response['code'] = 200;
            $this->response['status'] = 'Success';
            $this->response['message'] = "Message has been submitted Successfully!!!";
            $this->response['data'] = [];
            $this->error = [];
            $this->sendResponse();
            return;
		} else {
			$this->response['code'] = 400;
            $this->response['status'] = 'error';
            $this->response['message'] = "Internal Server Error";
            $this->error = array('message'=>'Internal Server Error!!');
            $this->sendResponse();
            return;
		}
	}

	function message_list() {
		/**
		 * @api {post} /api/user/message_list Ticket List
		 * @apiName Ticket List
		 * @apiGroup User
		 * @apiVersion 1.0.0
		 * @apiParam {String} users_id User Id
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Ticket Record Object With Token
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 *@apiExample sample input:
		 *	{}
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			* 
			{
    "message": "Users tickets information has been retrive Successfully!!!",
    "error": "",
    "code": 200,
    "status": "Success",
    "data": {
        "users_tickets": [
            {
                "users_id": "1",
                "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "users_fname": "Testtttt",
                "users_lname": "Test",
                "users_email_id": "jhon@yahoo.in"
            }
        ],
        "request_id": 1616491244.115002
    }
}
		**/

		#collect required information
		$users_id = $this->id;

        $UsersInfo = $this->model->get_records(['users_id' => $users_id], 'users', ['users_id', 'users_role', 'users_fname', 'users_lname', 'users_email_id']);

        if(!count($UsersInfo)) {
            $this->response['code'] = 400;
            $this->response['status'] = 'error';
            $this->response['message'] = "Usernames information no available";
            $this->error = array('message'=>'Usernames information no available');
            $this->sendResponse();
            return;
        }

        $users_role = $UsersInfo[0]->users_role;

        if(strtolower($users_role) != 'admin') {
        	$this->response['code'] = 401;
            $this->response['status'] = 'error';
            $this->response['message'] = "Invalid Authentication";
            $this->error = array('message'=>'Invalid Authentication');
            $this->sendResponse();
            return;
        }

        #get all the users messages
        $RsRecords = $this->model->get_usersrecords();

        $users_response = [];
        $users_response['users_tickets'] = $RsRecords;

        $this->response['code'] = 200;
        $this->response['status'] = 'Success';
        $this->response['message'] = "Users tickets information has been retrive Successfully!!!";
        $this->response['data'] = $users_response;
        $this->error = [];
        $this->sendResponse();
        return;
	}
}
