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
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $email, $password) {

		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);

		return $this->db->insert('users', $data);

	}

	//send confirm mail
  public function sendEmail($receiver){
      $from = "noreply@joorx.com"; // free setting
      $subject = 'Verify account JoorxCMS'; // change this subject
			// Warning , for you can change this message body
			$message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\''.base_url('confirmEmail/').''.md5($receiver).'\'>'.base_url('confirmEmail/').''. md5($receiver) .'</a><br><br>Thanks';

	/*
	* If your setting smtp with gmail
	* Read https://support.google.com/accounts/answer/6010255?hl=en
	*/
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.googlemail.com';
      $config['smtp_port'] = 465;
      $config['smtp_user'] = 'your_username@gmail.com'; // insert your email account gmail
      $config['smtp_pass'] = 'your_password_email'; // insert your password email account gmail
      $config['mailtype'] = 'html';
      $config['charset'] = 'iso-8859-1';
      $config['wordwrap'] = 'TRUE';
      $config['newline'] = "\r\n";

			$this->email->initialize($config);

      //send email
      $this->email->from($from);
      $this->email->to($receiver);
      $this->email->subject($subject);
      $this->email->message($message);

      if($this->email->send()){
        return true;
      } else {
        return false;
      }

  }

  // activate account
  function verifyEmail($hashcode){
      $data = array('is_confirmed' => 1);
      $this->db->where('md5(email)', $hashcode);

      return $this->db->update('users', $data);    //update status as 1 to make active user
  }

	/**
	 * resolve_user_login function.
	 *
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {

		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');

		return $this->verify_password_hash($password, $hash);

	}

	/**
	 * get_user_id_from_username function.
	 *
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {

		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');

	}

	/**
	 * get_user function.
	 *
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {

		$this->db->from('users');
		$this->db->where('id', $user_id);
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

}
