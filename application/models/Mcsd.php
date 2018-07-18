<?php
    class Mcsd extends CI_Model{
        public function luzon_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query=$this->db->query('SELECT * FROM current_system_demand WHERE sd_date='.$date.'');
            return $query->result_array();
            
        }
        public function vis_list(){

        }
        public function sys_list(){

        }
}
?>