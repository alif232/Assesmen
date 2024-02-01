<?php
class Menu extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->load->model('MMenu');
      $this->load->library('form_validation');
  }

	public function index()
	{
    $data['list_menu'] = $this->MMenu->get_all();
		$this->load->view('menu_list', $data);
	}

  public function tambah()
  {
      $data = array(
          'action' => site_url('Menu/tambah_action'),
          'nama' => set_value('nama'),
          'harga' => set_value('harga'),
          'kategori' => set_value('kategori')
      );
      $this->load->view('tambah_form', $data); 
  }

  public function tambah_action()
  {
      $nama = $this->input->post('nama', TRUE);
      $harga = $this->input->post('harga', TRUE);
      $kategori = $this->input->post('kategori', TRUE);

      if (!empty($_FILES['gambar']['tmp_name'])) {
          $image = $_FILES['gambar']['tmp_name'];

          $path = 'gambar/';
          $gambarPath = $path . $nama . "_menu.png";
          move_uploaded_file($image, $gambarPath);

          $gambarUrl = base_url() . $gambarPath;
      } else {
          $gambarUrl = null;
      }

      $data = array(
          'nama' => $nama,
          'harga' => $harga,
          'kategori' => $kategori,
          'gambar' => $gambarUrl,
      );

      $this->MMenu->insert($data);

      $this->session->set_flashdata('message', 'Tambah Berhasil');
      redirect(site_url('Menu'));
  }

  // Update
  public function update($id_menu) 
  {
    $row = $this->MMenu->get_by_id($id_menu);
    if ($row) {
      $data = array(
        'action' => site_url('Menu/update_action'),
        'id_menu' => set_value('id_menu', $row->id_menu),
        'nama' => set_value('nama', $row->nama),
        'harga' => set_value('harga', $row->harga),
        'kategori' => set_value('kategori', $row->kategori),
        'gambar' => set_value('gambar', $row->gambar),
      );
      $this->load->view('menu_form', $data);
    }
  }

  public function update_action()
{
    $id_menu = $this->input->post('id_menu', TRUE);
    $nama = $this->input->post('nama', TRUE);
    $harga = $this->input->post('harga', TRUE);
    $kategori = $this->input->post('kategori', TRUE);
    $gambarUrl = $this->input->post('gambar', TRUE);

    if ($this->input->post('keepImage') == 'yes') {
        $existing_data = $this->MMenu->get_by_id($id_menu);
        if ($existing_data) {
            $gambarUrl = $existing_data->gambar;
        }
    } else {
        if (!empty($_FILES['gambar']['tmp_name'])) {
            $image = $_FILES['gambar']['tmp_name'];

            $path = 'gambar/';
            $gambarPath = $path . $nama . "_menu.png";
            move_uploaded_file($image, $gambarPath);

            $gambarUrl = base_url() . $gambarPath;
        } else {
            $gambarUrl = null;
        }
    }

    $data = array(
        'nama' => $nama,
        'harga' => $harga,
        'kategori' => $kategori,
        'gambar' => $gambarUrl,
    );

    $this->MMenu->update($id_menu, $data);
    $this->session->set_flashdata('message', 'Update Berhasil');
    redirect(site_url('Menu'));
}
  // Delete
  public function delete($id_menu) 
  {
    $this->MMenu->delete($id_menu);
    $this->session->set_flashdata('message', 'Delete Berhasil');
    redirect(site_url('Menu'));
  }  

}
