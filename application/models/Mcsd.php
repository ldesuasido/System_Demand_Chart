<?php
    class Mcsd extends CI_Model{
        public function luzon_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query=$this->db->query('SELECT * FROM current_system_demand WHERE sd_date='.$date.' AND sd_region IN ("LUZON")');
            return $query->result_array();
            
        }
        public function vis_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query1=$this->db->query('SELECT * FROM current_system_demand WHERE sd_date='.$date.' AND sd_region IN ("VISAYAS")');
            return $query1->result_array();
        }
        public function sys_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query2=$this->db->query('SELECT * FROM current_system_demand WHERE sd_date='.$date.' AND sd_region IN ("SYSTEM")');
            

            return $query2->result_array();
        }
}
?>