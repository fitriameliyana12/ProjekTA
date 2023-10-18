<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengumuman_model extends CI_Model{
        
    public function __construct()

        {

            parent::__construct();

        }

    public function getPengumuman()
    {
        return $this->db->get('pengumuman')->result();
    }
    public function getPengumumanById($id)
    {
        $this->db->where('IdPengumuman', $id);
        return $this->db->get('pengumuman')->result();
    }
}