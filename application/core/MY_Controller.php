<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	protected $access = "*";

	public function __construct()
	{
		parent::__construct();

		$this->login_check();
	}

	public function login_check()
	{
		if ($this->access != "*") 
		{
			// here we check the role of the user
			if (! $this->permission_check()) {
				//die("<h4>Maaf Login Dulu</h4>");
				redirect('auth','refresh');
			} 

			if (! $this->session->userdata("logged_in")) {
				redirect("auth");
			}
		}
	}

	public function permission_check()
	{
		if ($this->access == "@") {
			return true;
		}
		else
		{
			$access = is_array($this->access) ? 
				$this->access :
				explode(",", $this->access);
			if (in_array($this->session->userdata("level"), array_map("trim", $access)) ) {
				return true;
			}

			return false;
		}
	}

}