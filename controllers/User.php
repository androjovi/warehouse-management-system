<?php
class User extends CI_Controller
{
  protected $table_p = 'tperusahaan';
  protected $table_t = 'ttoko';

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
                $this->session->set_flashdata('success', 'Data BERHASIL ditambah');
                redirect('user');
              }else{
                $this->session->set_flashdata('error', 'Data GAGAL ditambah');
                redirect('user/users_list');
              }
          }else{
            $this->session->set_flashdata('er_cus','per');
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
        $this->session->set_flashdata('success', 'Data BERHASIL dihapus');
        redirect('user/users_list');
      }else{
        $this->session->set_flashdata('error', 'Data GAGAL dihapus');
        redirect('user/users_list');
      }
    }
    function edit($id)
      {
        $data['query'] = $this->m_master->get_from(array('id_perusahaan' => $id), $this->table_p)->result();
        $this->load->view('manage_user/vw_edituser', $data);
      }
    function update($id)
      {
        $this->form_validation->set_rules('id_perusahaan', 'ID Perusahaan', 'required|numeric|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required|alpha_numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|alpha_numeric');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|trim');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|numeric|trim');

        if ($this->form_validation->run() == TRUE):
          $arr = array(
            'id_perusahaan' => amankan('id_perusahaan'),
            'nama'          => amankan('nama_lengkap'),
            'alamat'        => amankan('alamat'),
            'telepon'       => amankan('telepon'),
            'email'         => amankan('email'),
            'status'        => amankan('status'),
          );
              if ($this->m_master->edit_data($arr, array('id_perusahaan' => $id), $this->table_p)):
                  $this->session->set_flashdata('success', 'Data BERHASIL diupdate');
                  redirect('user/users_list');
              else:
                $this->session->set_flashdata('error', 'GALAT');
                redirect('user/edit/'. $id);
              endif;
        else:
            $this->load->view('manage_user/vw_edituser');
        endif;
      }
    function show($id)
    {
        $data = $this->m_master->get_from(array('id_perusahaan' => $id), 'tperusahaan')->result();

          foreach ($data as $k):
              $arr = array(
                'username' => $k->username,
                'nama'     => $k->nama,
                'alamat'   => $k->alamat,
                'telepon'  => $k->telepon,
                'email'    => $k->email
              );
              echo json_encode($arr);
          endforeach;
    }
    function add_data_toko()
      {
        $this->form_validation->set_rules('id_toko', 'ID Toko', 'required|is_unique[ttoko.id_toko]');
        $this->form_validation->set_rules('nama_toko', 'Nama toko', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat_toko', 'Alamat toko', 'required');
        $this->form_validation->set_rules('telepon_toko', 'Telepon toko', 'required');
        $this->form_validation->set_rules('email_toko', 'Email toko', 'required');

          if ($this->form_validation->run() == TRUE):
            $data = array(
              'id_toko'       => amankan('id_toko'),
              'nama_toko'     => amankan('nama_toko'),
              'user_toko'      => amankan('username'),
              'password'      => encrypt($this->input->post('password')),
              'alamat_toko'   => amankan('alamat_toko'),
              'telepon_toko'  => amankan('telepon_toko'),
              'email_toko'    => amankan('email_toko')
            );
              if ($this->m_master->add_data($data, $this->table_t)):
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('user/users_list_toko');
              else:
                $this->session->set_flashdata('error', 'Data tidak berhasil ditamabah');
                redirect('user/users_list_toko');
              endif;
          else:
            $this->session->set_flashdata('er_cus','tok');
            $this->load->view('manage_user/vw_adduser');
          endif;
      }
    function users_list_toko()
      {
        $data['query'] = $this->m_master->get_data($this->table_t)->result();
        $this->load->view('manage_user/vw_userlisttoko', $data);
      }
    function del_user_toko($id)
      {
        if ($this->m_master->remove_data(array('id_toko' => $id), $this->table_t)):
          $this->session->set_flashdata('success',' Berhasil menghapus data');
          redirect('user/users_list_toko');
        else:
          $this->session->set_flashdata('error','GALAT');
          redirect('user/users_list_toko');
        endif;
      }
    function edit_toko($id)
      {
        $data['query'] = $this->m_master->get_from(array('id_toko' => $id), $this->table_t)->result();
        $this->load->view('manage_user/vw_editusertoko', $data);
      }
    function update_toko($id)
      {
        $this->form_validation->set_rules('nama_toko', 'Nama toko', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat_toko', 'Alamat toko', 'required');
        $this->form_validation->set_rules('telepon_toko', 'Telepon toko', 'required');
        $this->form_validation->set_rules('email_toko', 'Email toko', 'required');

          if ($this->form_validation->run() == TRUE):
            $data = array(
              'nama_toko'     => amankan('nama_toko'),
              'user_toko'      => amankan('username'),
              'password'      => encrypt($this->input->post('password')),
              'alamat_toko'   => amankan('alamat_toko'),
              'telepon_toko'  => amankan('telepon_toko'),
              'email_toko'    => amankan('email_toko')
            );
            if ($this->m_master->edit_data($data, array('id_toko' => $id) , $this->table_t)):
              $this->session->set_flashdata('success', 'Data berhasil diubah');
              redirect('user/users_list_toko');
            else:
              $this->session->set_flashdata('error', 'GALAT');
              redirect('user/users_list_toko');
            endif;
          else:

          endif;
      }
}
