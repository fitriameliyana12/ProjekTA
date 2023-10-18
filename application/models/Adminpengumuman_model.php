<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Adminpengumuman_model extends CI_Model{
        
        public function __construct()

        {

            parent::__construct();

        }

    public function getPengumuman()
    {
        return $this->db->get('pengumuman')->result();
    }

    public function insertPengumuman()
    {
        $data = array(
            'IdPengumuman' => $this->input->post('IdPengumuman'), 
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
            );

        $this->db->insert('pengumuman', $data);

    }
    public function getPengumumanById($id)
    {
        $this->db->where('IdPengumuman', $id);
        return $this->db->get('pengumuman')->result();
    }

    public function editPengumuman($id)
    {
        $data = array(
            'IdPengumuman' => $this->input->post('IdPengumuman'), 
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
            );

        $this->db->where('IdPengumuman', $id);
        $this->db->update('pengumuman', $data);
    }

    public function hapusPengumuman($id)
    {
        $this->db->where('IdPengumuman', $id);
        $this->db->delete('pengumuman');    
    }
    }
?>