<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $name
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */

	

	public function create_user($name, $lastname, $sex, $adress, $phone, $email, $password) {
		
		$data = array(
			'name'   => $name,
			'lastname' => $lastname,
			'sex' => $sex,
			'adress' => $adress,
			'phone' => $phone,
			'email' => $email,
			'password' => $this->hash_password($password),
			'created_at_prof' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('registro_profesor', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('registro_profesor');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $email
	 * @return int the user id
	 */
	public function get_user_id_from_email($email) {
		
		$this->db->select('id_profesor');
		$this->db->from('registro_profesor');
		$this->db->where('email', $email);

		return $this->db->get()->row('id_profesor');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('registro_profesor');
		$this->db->where('id_profesor', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}


	////////////////////////////////esta parte es para el registro de estudiante y login de estudiante
	public function create_user_estu($email, $password, $name, $lastname, $phone, $adress, $card_credit, $ccv, $month, $year, $cod_postal) {
		
		$data = array(
			'email' => $email,
			'password' => $this->hash_password_estu($password),
			'name'   => $name,
			'lastname' => $lastname,
			'phone' => $phone,
			'adress' => $adress,
			'card_credit' => $card_credit,
			'ccv' => $ccv,
			'month' => $month,
			'year' => $year,
			'cod_postal' => $cod_postal,
			'created_at_estu' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('registro_estudiante', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login_estu($email, $password) {
		
		$this->db->select('password');
		$this->db->from('registro_estudiante');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash_estu($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $email
	 * @return int the user id
	 */
	public function get_user_id_from_email_estu($email) {
		
		$this->db->select('id_estudiante');
		$this->db->from('registro_estudiante');
		$this->db->where('email', $email);

		return $this->db->get()->row('id_estudiante');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user_estu($user_id) {
		
		$this->db->from('registro_estudiante');
		$this->db->where('id_estudiante', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password_estu($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash_estu($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
}
