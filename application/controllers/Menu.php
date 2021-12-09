<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // redirect('auth');
    $this->load->model('Menu_model', 'menu');
  }

  public function index()
  {
    $data['judul'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan menu baru</div>');
      redirect('menu');
    }
  }

  public function hapusMenu($id)
  {
    $this->db->delete('user_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil dihapus</div>');
    redirect('menu');
  }

  public function submenu()
  {
    $data['judul'] = 'Sub Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data = [
        'title' => $this->input->post('menu'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan sub menu baru</div>');
      redirect('menu/submenu');
    }
  }
}
