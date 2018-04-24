<?php
class Furniture extends CI_Controller
  {
    protected $table = 'tjenis_furniture';
    function __construct()
      {
        parent::__construct();
          $this->load->library('upload');
      }
    function index()
      {
        $data['query'] = $this->m_master->get_data($this->table)->result();
        $this->load->view('furniture/vw_furniturelists', $data);
      }
    function show($id)
      {
        $data = $this->m_master->get_from(array('id_furniture' => $id), $this->table);
          foreach($data->result() as $k):
            $arr = array(
              'deskripsi' => $k->deskripsi,
              'image'     => $k->image
            );
            echo json_encode($arr);
          endforeach;
      }
    function add_furniture()
      {
        $this->load->view('furniture/vw_addfurniture');
      }
    protected function upload_image()
      {
        $config['upload_path']    = './upload_';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size']       = 5000;
        $config['max_width']      = 3000;
        $config['max_height']      = 3000;

        $this->upload->initialize($config);

          if ($this->upload->do_upload('image_furniture')):
            return true;
          else:
            return false;
          endif;
      }
    function insert_furniture()
      {
        $this->form_validation->set_rules('id_furniture', 'ID Furniture', 'required');
        $this->form_validation->set_rules('nama_furniture', 'Nama furniture', 'required');
        $this->form_validation->set_rules('deskripsi_furniture', 'Deskripsi furniture', 'required');

          if ($this->form_validation->run() == TRUE):
            $data = array(
              'id_furniture'    => amankan('id_furniture'),
              'nama_furniture'  => amankan('nama_furniture'),
              'deskripsi'       => amankan('deskripsi_furniture')
            );
            if ($_FILES['image_furniture']['size'] !== 0):
              if ($this->upload_image()):
                $data['image'] = $this->upload->data('file_name');
                if ($this->m_master->add_data($data, $this->table)):
                  $this->session->set_flashdata('success', 'Data berhasil ditambah');
                  redirect('furniture');
                else:
                  $this->session->set_flashdata('error', 'GALAT ');
                  redirect('furniture');
                endif;
              else:
                $data['error'] = $this->upload->display_errors();
                $this->load->view('furniture/vw_addfurniture', $data);
              endif;
            else:
              if ($this->m_master->add_data($data, $this->table)):
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('furniture');
              else:
                $this->session->set_flashdata('error', 'GALAT ');
                redirect('furniture');
              endif;
            endif;
          else:
            $this->load->view('furniture/vw_addfurniture');
          endif;
      }

    function delete($id)
      {
        if($this->m_master->remove_data(array('id_furniture' => $id ), $this->table)):
          $this->session->set_flashdata('success', 'Data berhasil dihapus');
          redirect('furniture');
        else:
          $this->session->set_flashdata('error', 'Data tidak berhasil dihapus');
          redirect('furniture');
        endif;
      }
    function edit($id)
      {
        $data['query'] = $this->m_master->get_from(array('id_furniture' => $id), $this->table)->result();
        $this->load->view('furniture/vw_editfurniture', $data);
      }
    function update($id)
      {
        $this->form_validation->set_rules('nama_furniture', 'Nama furniture', 'required');
        $this->form_validation->set_rules('deskripsi_furniture', 'Deskripsi furniture', 'required');

          if ($this->form_validation->run() == TRUE):
            $data = array(
              'nama_furniture'  => amankan('nama_furniture'),
              'deskripsi'       => amankan('deskripsi_furniture')
            );
            if ($_FILES['image_furniture']['size'] !== 0):
              if ($this->upload_image()):
                $data['image'] = $this->upload->data('file_name');
                if ($this->m_master->edit_data($data, array('id_furniture' => $id), $this->table)):
                  $this->session->set_flashdata('success', 'Data berhasil diubah');
                  redirect('furniture');
                else:
                  $this->session->set_flashdata('error', 'GALAT');
                  redirect('furniture');
                endif;
              else:
                $data['error'] = $this->upload->display_errors();
                $this->load->view('furniture/vw_addfurniture', $data);
              endif;
            else:
              if ($this->m_master->edit_data($data, array('id_furniture' => $id), $this->table)):
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                redirect('furniture');
              else:
                $this->session->set_flashdata('error', 'GALAT');
                redirect('furniture');
              endif;
            endif;
          else:
            $this->load->view('furniture/vw_editfurniture'); // Gaga; validasi
          endif;
      }
  }
