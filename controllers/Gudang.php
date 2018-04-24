<?php
class Gudang extends CI_Controller
{
    protected $table = 'tpenyimpanan';
  function __construct()
    {
      parent::__construct();
    }
  function index()
    {
        $this->load->view('gudang/vw_addgudang');
    }
  function insert()
    {
      $this->form_validation->set_rules('id_penyimpanan', 'ID Penyimpanan','required|numeric|is_unique[tpenyimpanan.id_penyimpanan]');
      $this->form_validation->set_rules('id_perusahaan', 'ID Perusahaan', 'required|integer');
      $this->form_validation->set_rules('nama_gudang', 'Nama gudang', 'required');
      $this->form_validation->set_rules('id_furniture', 'ID Furniture', 'required|integer');
      $this->form_validation->set_rules('batas_max', 'Batas max', 'required');

        if ($this->form_validation->run() == TRUE):
          $data = array(
            'id_penyimpanan'    => amankan('id_penyimpanan'),
            'id_perusahaan'     => amankan('id_perusahaan'),
            'nama_penyimpanan'  => amankan('nama_gudang'),
            'id_furniture'      => amankan('id_furniture'),
            'batas_max'         => amankan('batas_max')
          );
            if ($this->m_master->add_data($data, $this->table)):

            else:
              echo "GGAL";
            endif;
        else:
          $this->load->view('gudang/vw_addgudang');
        endif;
    }
  function gudang_list()
    {
      $data['query'] = $this->m_master->get_data($this->table)->result();
      $this->load->view('gudang/vw_gudanglists', $data);
    }
  function edit($id)
    {
      $data['query'] = $this->m_master->get_from(array('id_penyimpanan' => $id), $this->table)->result();
      $this->load->view('gudang/vw_editgudang', $data);
    }
  function update($id)
    {
      $this->form_validation->set_rules('id_perusahaan', 'ID Perusahaan', 'required|integer');
      $this->form_validation->set_rules('nama_gudang', 'Nama gudang', 'required');
      $this->form_validation->set_rules('id_furniture', 'ID Furniture', 'required|integer');
      $this->form_validation->set_rules('batas_max', 'Batas max', 'required');

        if($this->form_validation->run() == TRUE):
          $data = array(
            'id_perusahaan'     => amankan('id_perusahaan'),
            'nama_penyimpanan'  => amankan('nama_gudang'),
            'id_furniture'      => amankan('id_furniture'),
            'batas_max'         => amankan('batas_max')
          );
            if ($this->m_master->edit_data($data, array('id_penyimpanan' => $id), $this->table)):
              $this->session->set_flashdata('success',' Data BERHASIL diubah');
              redirect('gudang/gudang_list');
            else:
              $this->session->set_flashdata('success',' GALAT');
              redirect('gudang/gudang_list');
            endif;
        else:
          redirect('gudang/edit/'. $id );
        endif;
    }
  function show($id)
    {

    }
  function delete($id)
    {
      if ($this->m_master->remove_data(array('id_penyimpanan' => $id), $this->table)):
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('gudang/gudang_list');
      else:
        $this->session->set_flashdata('error', 'GALAT Kode.error');
        redirect('gudang/gudang_list');
      endif;
    }
}
