<?php

class Model_contact extends CI_Model {

	//guestbook creation
	public function __construct()
	{
		
		parent::__construct();
		



	}

	public function add_guest(){
		$data = array(
        'lastname' => $this->input->post('lastname'),
        'firstname' => $this->input->post('firstname'),
        'phonenumber' => $this->input->post('phone'),
        'emailaddress' => $this->input->post('emailaddress'),
        'homeaddress' => $this->input->post('home')
);

$this->db->insert('guestbook', $data);
redirect('contact/displayguest');
	}

	public function add_student($data){

		echo "data is here".$data;
		
		if ($this->session->has_userdata('identity') == true) {
			$details = $this->session->userdata('identity');
			echo "<br>"."User deatails";

			print_r($details);
		

		$mailsave =array( 
		'mailsave' =>   $this->input->post('emailaddress')
		);
		$this->session->set_userdata($mailsave);

		
				
		}/*
		if ($state == true) {
			$this->session->unset_userdata('identity');
			echo "I think I'm unset <br>";

			if ($this->session->has_userdata('identity') == true) {
				echo "I'm still there <br>";
			}else if ($this->session->has_userdata('identity') == false) {
				echo "Finally removed!";
			}
		}
		**/
		
		/*
		$f = $this->input->post('lastname');
		$g = $this->input->post('firstname');
		$h = $this->input->post('emailaddress');
		$i = $this->input->post('gender');
		$k = $this->input->post('campus');
		$r = $this->input->post('faculty');
		$u = $this->input->post('dept');
		echo $f."<br>".$g."<br>".$h."<br>".$i."<br>".$k."<br>".$r."<br>".$u."<br>";
		**/		

		$data = array(
		'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'), 
        'email' => $this->input->post('emailaddress'),
        'gender' => $this->input->post('gender'),
        'campusid' => $this->input->post('campus'),
        'relatedfacid' => $this->input->post('faculty'),
        'deptid' => $this->input->post('dept'),
        'randomid' => $details,
        'password' => md5($this->input->post('pass'))
        
);

 $this->db->insert('student', $data);
if($this->db->affected_rows() > 0){
	//save data in session to call on success page
	$fn = $this->input->post('firstname');
	$ln = $this->input->post('lastname');
	$mail2 = $this->input->post('email');
	$storedata = array(
		'first' => $fn,
		'last'  => $ln
	);
	$this->session->set_userdata($storedata);
	

redirect('contact/success');




}


	}

	public function get_guest(){
		$query = $this->db->get('guestbook');
		return $query->result_array();
	}

	public function get_guest_record($id){
		//
		//$this->db->select->('contact_id', 'lastname', 'firstname')
		$this->db->where('contact_id', $id);
		$query = $this->db->get('guestbook');
		return $query->row_array(); //returns just a record
	}

	//to update specific record based on id
	public function update_guest($id){

		$data = array(
        'lastname' => $this->input->post('lastname'),
        'firstname' => $this->input->post('firstname'),
        'phonenumber' => $this->input->post('phone'),
        'emailaddress' => $this->input->post('emailaddress'),
        'homeaddress' => $this->input->post('home')
);
$this->db->where('contact_id', $id); //very important else it will update everywhere
$this->db->update('guestbook', $data);
redirect('contact/displayguest');
	
	}

	public function delete_guest($id){
		$this->db->where('contact_id', $id);
		$this->db->delete('guestbook');
		redirect('contact/displayguest');
	}

	private function disable_guest($id){
		$num = 0;
		$this->db->set('disableuser', $num);
		$this->db->where('contact_id', $id);
		$this->db->update('guestbook');
		/* print disabled users
		$this->db->where('disableuser', '1');
		$query = $this->db->get('guestbook');
		return $query->result_array();
		**/
		
	}

	public function show_disabled_user($id){
		$this->disable_guest($id);
		$this->db->where('disableuser', '1');
		$query = $this->db->get('guestbook');
		//print_r($query->result_array());
		$newdata[]= $query->result_array();
		print_r($newdata);
		return $newdata;
		//$this->session->set_userdata()
		//return $query->result_array();	
		//redirect('contact/displayguest');
	}

	public function add_student_profile($photograph){
		$data = array(
        'lastname' => $this->input->post('lastname'),
        'firstname' => $this->input->post('firstname'),
        'photograph' => "uploads/".$photograph
        
);		
		$this->db->insert('studentprofile', $data);
	}

	public function get_student_info(){
		$query = $this->db->get('studentprofile');
		return $query->result_array();
	}

	public function get_institution(){
		$query = $this->db->get('campus');
		$campus = $query->result_array();
		
		return $campus;
	}

	public function get_faculty(){
		$query = $this->db->get('faculty');
		$faculty = $query->result_array();
		
		return $faculty;
	}

	public function get_department($id){
		
		
		$this->db->where('relatedfacultiesid', $id);
		$query = $this->db->get('department');
		$department = $query->result_array();
		
		return $department;

	}

	public function validate_signin(){
		$pwrd = md5($this->input->post('pwrd2'));
		$mail2 = $this->input->post('mail2');

		//add string functions
		 

		$this->db->where('email', strip_tags($mail2));
		$this->db->where('password', strip_tags($pwrd));
		$query = $this->db->get('student');
		$stuff = $query->row_array();
		if ($query->num_rows() > 0) {

			return $stuff;
		}
		else if ($this->session->has_userdata('online') == true) {
			return $stuff;
		}
		else{
			$this->session->set_userdata('signup','signedupcheck');
			redirect('contact/loginpage');
		}
		
		
	}

	public function success_profile($g){
		if ($this->session->has_userdata('success') == true) {

		
				$detailmail = $g;
				
		
		$this->db->where('email', $detailmail);
		
		$queryy = $this->db->get('student');
		$stufff = $queryy->row_array();
		if ($queryy->num_rows() > 0) {
			$this->session->unset_userdata('success');
			
			$this->session->unset_userdata($g);
			return $stufff;
			

		}
	
	}
	}

}
