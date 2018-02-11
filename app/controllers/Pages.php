<?php

/*
Project : Scholarly
*/

class Pages extends Controller {
	public function __construct() {
		
	}

	public function index() {
		$this->view('Student/index');
	}

	public function dashboard() {
		$data = [
			'name'=>"Debojyoti"
		];
		$this->view('Student/student_view',$data);
	}
}