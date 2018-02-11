<?php

function isRegisterRequestProper() {
	if(isset($_POST['email'],$_POST['pass'])) {
		return true;
	}
}

function isSessionSetFor($user_type) {

}

function config ($value = null) {
	if (!file_exists(ROOT.'/config.php')) {
		return false;
	} else {
		require_once ROOT.'/config.php';
	}
	if (!isset($value)) {
		$config = json_decode(CONFIG, true);
	} else {
		$config = $this->config();
		$values = explode('.', $value);
		for ($i=0; $i < count($values); $i++) { 
			$config = $config[$values[$i]];
		}
	}
	return $config;
}