<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Test extends CI_Controller {

		public function __construct(){
			parent::__construct();
			//Do your magic here
		}
		
		public function index(){
			redirect('/con_consolidado/consolidado', 'refresh');
		}
	
	}
	
	/* End of file test.php */
	/* Location: ./application/controllers/test.php */	