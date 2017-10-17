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

	}


	public function index() {



	}

	/**
	 * register function.
	 *
	 * @access public
	 * @return void
	 */
	public function register() {

		// create the data object
		$data = new stdClass();

		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[users.email]', array('is_unique' => 'This email already registered.', 'valid_email' => 'The email your entered is invalid'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|xss_clean|min_length[6]|matches[password]');

		if ($this->form_validation->run() === false) {
			$data->captchagetWidget = $this->recaptcha->getWidget();
			$data->captchagetScriptTag = $this->recaptcha->getScriptTag();
			// validation not ok, send validation errors to the view
			$this->load->view('user/header');
			$this->load->view('user/register/register', $data);
			$this->load->view('user/footer');

		} else {

			// set variables from the form
			$username = addslashes($this->input->post('username'));
			$email    = addslashes($this->input->post('email'));
			$password = addslashes($this->input->post('password'));
			// Recaptcha variables
			$recaptcha = $this->input->post('g-recaptcha-response');
			$response = $this->recaptcha->verifyResponse($recaptcha);

			if (isset($response['success']) AND $response['success'] === true) {
				if ($this->user_model->create_user($username, $email, $password)) {

				  // user creation ok
				  if($this->user_model->sendEmail($email)){
						$data->captchagetWidget = $this->recaptcha->getWidget();
					  $data->captchagetScriptTag = $this->recaptcha->getScriptTag();
				    $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');
				    $this->load->view('user/header');
				    $this->load->view('user/register/register', $data);
				    $this->load->view('user/footer');
				  } else {
						$data->captchagetWidget = $this->recaptcha->getWidget();
					  $data->captchagetScriptTag = $this->recaptcha->getScriptTag();
				    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
				    $this->load->view('user/header');
				    $this->load->view('user/register/register', $data);
				    $this->load->view('user/footer');
				  }

				} else {
				  $data->captchagetWidget = $this->recaptcha->getWidget();
				  $data->captchagetScriptTag = $this->recaptcha->getScriptTag();
				  // user creation failed, this should never happen
				  $data->error = 'There was a problem creating your new account. Please try again.';

				  // send error to the view
				  $this->load->view('user/header');
				  $this->load->view('user/register/register', $data);
				  $this->load->view('user/footer');

				}
			} else {
				$data->captchagetWidget = $this->recaptcha->getWidget();
				$data->captchagetScriptTag = $this->recaptcha->getScriptTag();
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please check your captcha.';

				// send error to the view
				$this->load->view('user/header');
				$this->load->view('user/register/register', $data);
				$this->load->view('user/footer');
			}

		}

	}

	function confirmEmail($hashcode){
    	if($this->user_model->verifyEmail($hashcode)){
        $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
        redirect('login', 'refresh');
      } else {
        $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
        redirect('login', 'refresh');
      }
  }

	/**
	 * login function.
	 *
	 * @access public
	 * @return void
	 */
	public function login() {
		// check session
		if($this->session->userdata('logged_in') === true AND $this->session->userdata('is_confirmed') === 1 AND $this->session->userdata('status') === 0 AND $this->session->userdata('role') === 1){
			redirect(base_url("admin"), 'refresh');
		} elseif ($this->session->userdata('logged_in') === true AND $this->session->userdata('is_confirmed') === 1 AND $this->session->userdata('status') === 0 AND $this->session->userdata('role') === 0) {
			redirect(base_url("member"), 'refresh');
		}

		// create the data object
		$data = new stdClass();

		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == false) {
			$data->captchagetWidget = $this->recaptcha->getWidget();
			$data->captchagetScriptTag = $this->recaptcha->getScriptTag();
			// validation not ok, send validation errors to the view
			$this->load->view('user/header');
			$this->load->view('user/login/login', $data);
			$this->load->view('user/footer');

		} else {

			// set variables from the form
			$username = addslashes($this->input->post('username'));
			$password = addslashes($this->input->post('password'));
			// Recaptcha variables
			$recaptcha = $this->input->post('g-recaptcha-response');
			$response = $this->recaptcha->verifyResponse($recaptcha);

			if (isset($response['success']) AND $response['success'] === true) {
				if ($this->user_model->resolve_user_login($username, $password)) {

				  $user_id = $this->user_model->get_user_id_from_username($username);
				  $user    = $this->user_model->get_user($user_id);

				  // set session user datas
				  $data_session = array(
				    'user_id' => intval($user->id),
				    'nama' => $user->username,
				    'is_confirmed' => intval($user->is_confirmed),
				    'role' => intval($user->is_admin),
				    'status' => intval($user->is_deleted),
				    'logged_in' => true
				  );
				  $this->session->set_userdata($data_session);

				  // check role for redirect
				  if ($user->is_admin == 0) {
				    redirect(base_url('member'), 'refresh');
				  } else {
				    redirect(base_url('admin'), 'refresh');
				  }

				} else {
				  $data->captchagetWidget = $this->recaptcha->getWidget();
				  $data->captchagetScriptTag = $this->recaptcha->getScriptTag();
				  // login failed
				  $data->error = 'Wrong username or password.';

				  // send error to the view
				  $this->load->view('user/header');
				  $this->load->view('user/login/login', $data);
				  $this->load->view('user/footer');

				}
			} else {
				$data->captchagetWidget = $this->recaptcha->getWidget();
				$data->captchagetScriptTag = $this->recaptcha->getScriptTag();
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please check your captcha.';

				// send error to the view
				$this->load->view('user/header');
				$this->load->view('user/login/login', $data);
				$this->load->view('user/footer');
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
			redirect(base_url('login'), 'refresh');

		} else {

			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');

		}

	}

}
