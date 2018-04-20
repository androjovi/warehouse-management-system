<?php
class User extends CI_Controller
{
  protected $table_p = 'tperusahaan';

  function __construct()
    {
      parent::__construct();

    }

  function index()
    {
      $this->load->view('manage_user/vw_adduser');
    }

  function add_user()
    {
      $this->form_validation->set_rules('id_perusahaan', 'ID Perusahaan', 'required|numeric|trim|is_unique[tperusahaan.id_perusahaan]');
      $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required|alpha_numeric');
      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|alpha_numeric');
      $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|trim');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required|numeric|trim');

        if ( $this->form_validation->run() == TRUE)
          {
            $arr = array(
              'id_perusahaan' => amankan('id_perusahaan'),
              'nama'          => amankan('nama_lengkap'),
              'username'      => amankan('username'),
              'password'      => encrypt($this->input->post('password')),
              'alamat'        => amankan('alamat'),
              'telepon'       => amankan('telepon'),
              'email'         => amankan('email'),
              'status'        => amankan('status'),
            );
              if ($this->m_master->add_data($arr, $this->table_p)){
                echo "Berhasil";
              }else{
                echo "Tidak berhasil";
              }
          }else{
            $this->load->view('manage_user/vw_adduser');
          }
    }

    function users_list()
      {
        $data['query'] = $this->m_master->get_data($this->table_p)->result();
        $this->load->view('manage_user/vw_userslist',$data);
      }
    function del_users($id)
    {
      if ($this->m_master->remove_data(array('id_perusahaan' => $id), $this->table_p)){
        echo "Berhasil";
      }else{
        echo "Tidak berhasil";
      }
    }

}
