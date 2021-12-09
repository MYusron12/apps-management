<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // menghapus data session di keyword
    $this->session->unset_userdata('keyword');

    $data['judul'] = "Master";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Master_model', 'master');

    // load library
    $this->load->library('pagination');

    // ambil search
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    //config
    // $base  = "http://" . $_SERVER['HTTP_HOST'];
    // $base .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    // $config['base_url'] = $base . "master/index";
    $config['base_url'] = 'http://localhost/apps-management/master/index';

    $this->db->like('name', $data['keyword']);
    $this->db->or_like('phone', $data['keyword']);
    $this->db->or_like('email', $data['keyword']);
    $this->db->or_like('address', $data['keyword']);
    $this->db->from('contact');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 5;

    // initialize
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['master'] = $this->master->getDataMaster($config['per_page'], $data['start'], $data['keyword']);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('master/index', $data);
    $this->load->view('templates/footer');
  }

  public function mastertambah()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');

    if ($this->form_validation->run() == false) {
      $this->index();
    } else {
      $email = $this->input->post('email');
      $sql = $this->db->get_where('contact', ['email' => $email]);
      $cek = $sql->row_array();

      if ($cek['email'] == $email) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
         Warning!!!...The contact <b>' . $id . '</b> have been entered in database already!
         </div>');
        redirect('master');
      } else {
        $data = [
          'name' => $this->input->post('name'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'address' => $this->input->post('address'),
          'id' => $this->session->userdata('id')
        ];

        $this->db->insert('contact', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         New Contact Added
         </div>');
        $this->session->unset_userdata('keyword');
        redirect('master');
      }
    }
  }

  public function getchangedcruda()
  {
    $id = $this->input->post('id');

    $this->load->model('Cruda_model', 'cruda');

    echo json_encode($data['cruda'] = $this->cruda->getchangeCrudaById($id));
  }

  public function getchangingcruda()
  {
    $id = $this->input->post('id');
    $accountno = $this->input->post('accountno');
    $name = $this->input->post('name');
    $iduser = $this->session->userdata('id');


    if ($id > 0) {

      $data = [

        'account' => $accountno,
        'nama' => $name,
        'id_user' => $this->session->userdata('iduser')


      ];

      $this->db->where('id_coa_ec', $id);
      $this->db->update('coa_ec', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         The account success to be changed!.
         </div>');
      redirect('master');
    } else {

      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
         The account fail to be changed!.
         </div>');
      redirect('master');
    }
  }

  public function deletecruda($id)
  {
    $this->db->delete('coa_ec', ['id_coa_ec' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       The account has been deleted!.
         </div>');
    redirect('master');
  }
}
