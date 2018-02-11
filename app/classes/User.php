<?php

namespace Scholarly;

use dsahapersonal\pdoconnect\Handler;

require "private/bootstrap.php";



class User
{

	public $uid;
	public $name;
	public $mobile;
	public $email;
	public $address;
	public $status;
	public $password;

	protected $all_data;
	// protected $type;
	protected $db;

	public $counter=1;

	function __construct()
	{
		$this->db = new Handler();
	}

	public function setData($id,$pass)
	{
		$this->uid = $id;
		$this->password = $pass;
	}

	abstract public function login(); 
	/*public function isValid()
	{
		//	fetch result from
		

		//	getData($tname, array $data, array $result_format = null)

	

		if(!isset($_POST["email"], $_POST["password"])) 
		{     

			// $email = $_POST["email"]; 
			// $password = $_POST["password"]; 

			$where = [
					"Email"=>$this->user
				];
			$fetch = ["Status"];

		 $data = $this->db->getData("user",$where,$fetch);
		// $jsondata = json_decode( json_encode($data,true),true);
		 print_r($data);
		}*/
	//$_SESSION['EMAIL']=$_POST['EMAIL']; 	}
	
	public function register($email,$pass)
	{
		if($this->exists())
		{
			return false;
		}
		$this->setData($email,$pass)
		$this->create();
	}

	protected function create()
	{
		//	Database entry
		return $this->db->insertData(config('mysql.tables.students'),['email'=>$this->email,'pass'=>$this->pass]);
	}

	protected function exists($table_name)
	{
		$this->all_data = $this->fetchData($table_name);
		//print_r($this->all_data);
		$s=json_encode($this->all_data);
		// echo $s;
		if($this->all_data)
			return true;
	}	

	protected function passMatches()
	{
		//if($_POST['Password']==$this->pass)
		if($this->all_data['Password'] == $this->password)
			return true;
	}

	protected function fetchData($table_name)
	{
		$data = $this->db->getData($table_name,['id'=>$this->uid]);
		if(count($data))
		{
			//print_r( $data['0']);
			return $data['0'];
		}
	}
	protected function assignProperties()
	{
		$this->uid = $this->all_data['uid'];
		$this->name = $this->all_data['name'];
		$this->mobile = $this->all_data['mobile'];
		$this->address = $this->all_data['address'];
		$this->email = $this->all_data['email'];
		$this->status = $this->all_data['status'];
		$this->pass = $this->all_data['password'];
	}

	protected function create()
	{
		$set = ['uid'=> $this->uid,
				'email'=>$_POST['Email'],
				'password'=>$_POST['Password'],
				'mobile'=>$_POST['Phone_Number'],
				'name'=>$_POST['Name'],
				'address'=>$_POST['Address'],
				'status'=>$_POST['Status']];
		$this->db->insert('user',$set);
	}

	abstract public function setUID()
	{}

	abstract public function getJSON_data($dept)
	{}

 }
