<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Siswa_modelPengumuman extends CI_Model{

        public function getPengumumanSiswa()
        {
            $this->db->where('tampil_siswa', '1');
            return $this->db->get('pengumuman');
        }
        public function getDetailPengumuman($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('pengumuman');        
        }
    }
    ?>