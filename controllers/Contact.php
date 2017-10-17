<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();

		$this->load->model('model_contact');
	}

	//guestbook creation
	public function index()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[3]|max_length[15]|strip_tags|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname|alpha', 'trim|required|min_length[3]|max_length[15]|strip_tags|alpha_numeric');
        $this->form_validation->set_rules('emailaddress', 'Email', 'trim|required|is_unique[student.email]|strip_tags');

        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|max_length[15]|strip_tags');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('campus', 'Campus', 'required');
        $this->form_validation->set_rules('faculty', 'Faculty', 'required');
        $this->form_validation->set_rules('dept', 'Dept', 'required');
		
		if ($this->form_validation->run() == FALSE)
                {
                        $this->displayinstitution();
                }               
                
                else
                {
                        $this->sendrandomid();
                }

		
              //  $this->model_contact->add_student();

	}

	public function sendrandomid(){
		$data = $this->randomnumbers();
		$this->model_contact->add_student($data);

	}

	private function randomnumbers(){
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('firstname');
		$kampus = $this->input->post('campus');

		$uni='';
		if ($kampus == 1) {
			$uni = "ABU";
			
		}elseif ($kampus == 2) {
			$uni = "UI";
		}elseif ($kampus == 3) {
			$uni = "UNILAG";
		}elseif ($kampus == 4) {
			$uni = "UNN";
		}
		echo $uni."<br>";
		$randm = mt_rand(100000,999999);

		$fn =substr($firstname, 0,3);
		$ln = substr($lastname, 1,2);

		$unique = uniqid();


		$num = $uni.$unique.$ln.$randm.$fn;
		echo $num;
		echo "<br>";
		$store = array(
			'identity'=> "$num"
		);
		$this->session->set_userdata($store);
		return $num;
	}

	public function success(){
		$this->load->view('successpage');
	}

	public function displayguest(){
		$data['guestinfo'] = $this->model_contact->get_guest();
		$this->load->view('displayguest', $data);
	}

	public function displayinstitution(){
		$data['instinfo'] = $this->model_contact->get_institution();
		$this->load->view('home', $data);
	}

	public function editguest($id){
		$data['guestrecord'] = $this->model_contact->get_guest_record($id);

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('lastname', 'Last name', 'required|trim');
		$this->form_validation->set_rules('firstname', 'First name', 'required|trim|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('emailaddress', 'Email Address', 'required|trim');
	//$this->form_validation->set_message('is_unique', 'The Email Address does not exist!');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('editguestbook', $data);
		}
		else
		{
                	//call database
			$this->model_contact->update_guest($id);
		}
	}

	public function deleteguest($id){
		//call model function to delete database
		$this->model_contact->delete_guest($id);
	}

	public function facultyload(){
		$data['facultyinfo'] = $this->model_contact->get_faculty();
		$this->load->view('faculty', $data);
	}

	public function departmentload($id){
		
		$data['departmentinfo'] = $this->model_contact->get_department($id);
		$this->load->view('department', $data);
	}

	public function disableguest($id){
		//call model function to delete database

		$data['usersdisabled'] = $this->model_contact->show_disabled_user($id);
		echo  "<br><br>";
		echo "<pre>";
		print_r($data['usersdisabled']);
		echo "</pre>";
		$this->load->view('pausedusers', $data);
	}

	public function loginpage(){
		$this->load->view('loginpage');
	}
	public function redirect(){
		if ($this->session->has_userdata('mailsave') == true) {
			$g = $this->session->userdata('mailsave');
			
			$data['user'] = $this->model_contact->success_profile($g);
			if (($this->session->has_userdata('individual') == true) || (($this->session->has_userdata('usertemporarilyin') == true))) {

				$this->session->unset_userdata('usertemporarilyin');
				$this->load->view('profile', $data);
			}else{
				$this->load->view('nodata');
			}
		
		}else if ($this->session->has_userdata('mailsave') == false) {
		
			$this->load->view('nodata');
		
		}
		
	}

	public function signin(){
		
		
		$data['user'] = $this->model_contact->validate_signin();
		$this->load->view('profile', $data);
	    
	}

	public function logout(){
		
			$this->session->unset_userdata('identity');
			$this->session->unset_userdata('first');
			$this->session->unset_userdata('last');
			//unset free access to profile
			$this->session->unset_userdata('online');
			$this->session->unset_userdata('individual');

			//set session to alert user of logout
			$this->session->set_userdata('logged','out');
			redirect( base_url());
	}
}
