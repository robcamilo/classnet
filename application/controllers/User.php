<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('User_model');
		
	}
	
	
	public function index() {
		$this->load->view('index');
	}
	public function work() {
		$this->load->view('work');
	}
	public function about() {
		$this->load->view('about');
	}
	public function services() {
		$this->load->view('services');
	}
	public function contact() {
		$this->load->view('contact');
	}
	public function reglog() {
		$this->load->view('reglog');
	}
	public function loginreg() {
		$this->load->view('loginreg');
	}
	
	public function conexionprof() {
		$this->load->view('user/conect/conexionprof');

	////parte admin	
	}
	public function blank_page() {
		$this->load->view('admin/blank_page');
	}
	public function charts() {
		$this->load->view('admin/charts');
	}
	public function compose() {
		$this->load->view('admin/compose');
	}
	public function forms() {
		$this->load->view('admin/forms');
	}
	public function general() {
		$this->load->view('admin/general');
	}
	public function grids() {
		$this->load->view('admin/grids');
	}
	public function inbox() {
		$this->load->view('admin/inbox');
	}
	public function indexadmin() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('admin/login');
	}
	public function media() {
		$this->load->view('admin/media');
	}
	public function signup() {
		$this->load->view('admin/signup');
	}
	public function tables() {
		$this->load->view('admin/tables');
	}
	public function typography() {
		$this->load->view('admin/typography');
	}
	public function validation() {
		$this->load->view('admin/validation');
	}
	public function widgets() {
		$this->load->view('admin/widgets');
	}
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function registerprof() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[10]|is_unique[registro_profesor.email]', array('is_unique' => 'This email already exists. Please choose another one.'));
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('sex', 'Sex', 'trim|required|min_length[1]|max_length[8]');
		$this->form_validation->set_rules('adress', 'Adress', 'trim|required|min_length[7]|max_length[20]');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[registro_profesor.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			
			$this->load->view('user/register/registerprof', $data);
			
		} else {
			
			// set variables from the form
			$name = $this->input->post('name');
			$lastname = $this->input->post('lastname');
			$sex = $this->input->post('sex');
			$adress = $this->input->post('adress');
			$phone = $this->input->post('phone');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->User_model->create_user($name, $lastname, $sex, $adress, $phone, $email, $password)) {
				
				// user creation ok
				
				$this->load->view('user/register/register_success', $data);
				
				
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'Tuvimos un problema creando tu cuenta. Por favor intenta de nuevo!';
				
				// send error to the view
				
				$this->load->view('user/register/registerprof', $data);
				
				
			}
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function loginprof() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			
			$this->load->view('user/login/loginprof');
			
			
		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->User_model->resolve_user_login($email, $password)) {
				
				$user_id = $this->User_model->get_user_id_from_email($email);
				$user    = $this->User_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id_profesor;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
				
				$this->load->view('user/login/login_success', $data);
				
				
			} else {
				
				// login failed
				$data->error = 'Incorrecto email o contraseña.';
				
				// send error to the view
				
				$this->load->view('user/login/loginprof', $data);
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('user/logout/logout_success', $data);
			
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}

	/////////////////////////////////////////////////////aqui va la parte de registro y login de estuiante

	public function registerestu() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[registro_profesor.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[10]|is_unique[registro_profesor.email]', array('is_unique' => 'This email already exists. Please choose another one.'));
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('adress', 'Adress', 'trim|required|min_length[7]|max_length[20]');
		

		$this->form_validation->set_rules('card_credit', 'Card Credit', 'trim|required|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('ccv', 'CCV', 'trim|required|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('month', 'Month', 'trim|required|min_length[2]|max_length[2]');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('cod_postal', 'Code Postal', 'trim|required|min_length[6]|max_length[6]');
		
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			
			$this->load->view('user/register/registerestu', $data);
			
		} else {
			
			// set variables from the form
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$name = $this->input->post('name');
			$lastname = $this->input->post('lastname');
			$adress = $this->input->post('adress');
			$phone = $this->input->post('phone');

			$card_credit = $this->input->post('card_credit');
			$ccv    = $this->input->post('ccv');
			$month = $this->input->post('month');
			$year    = $this->input->post('year');
			$cod_postal = $this->input->post('cod_postal');


			
			
			if ($this->User_model->create_user_estu($email, $password, $name, $lastname, $phone, $adress, $card_credit, $ccv, $month, $year, $cod_postal)) {
				
				// user creation ok
				
				$this->load->view('user/register/register_success_estu', $data);
				
				
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'Tuvimos un problema creando tu cuenta. Por favor intenta de nuevo!';
				
				// send error to the view
				
				$this->load->view('user/register/registerestu', $data);
				
				
			}
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function loginestu() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			
			$this->load->view('user/login/loginestu');
			
			
		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->User_model->resolve_user_login_estu($email, $password)) {
				
				$user_id = $this->User_model->get_user_id_from_email_estu($email);
				$user    = $this->User_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id_estudiante;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
				
				$this->load->view('user/login/login_success_estu', $data);
				
				
			} else {
				
				// login failed
				$data->error = 'Incorrecto email o contraseña.';
				
				// send error to the view
				
				$this->load->view('user/login/loginestu', $data);
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logoutestu() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('user/logout/logout_success_estu', $data);
			
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
}
