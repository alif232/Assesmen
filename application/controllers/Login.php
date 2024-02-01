<?php
class Login extends CI_Controller {

	public function index()
	{
    if (isset($_SESSION['username']) == ""){
		  $this->load->view('login');
    } else { 
      redirect('Login/dashboard');
    }
	}

  function dashboard()
  {
    $this->load->view('dashboard');
  }

  /*
  Untuk melakukan validasi username dan password ke tabel user
  */
  public function validasi()
  {
    // load model user
    $this->load->model('MUser');

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $hasil = $this->MUser->get_validasi($username, $password);
    if ($hasil == true){
      // login sukses (username/password cocok dg tabel)
      //echo "Sukses";
      $user_data = $this->MUser->get_user_data($username);
      $this->session->set_userdata('username', $username);
      $this->session->set_userdata('nama', $user_data['nama']);
      // $_SESSION['username'] = $user;
      $this->load->view('dashboard');
    } else {
      // login gagal
      $this->session->set_flashdata('salah', true);
      redirect('Login');
    }
  }

  function logout()
  {
    session_destroy();
    redirect('Login');
  }

  
}
