<?php 
    class Mclwap extends CI_Model{
        public function luzon_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query=$this->db->query('SELECT * FROM lwap_archive WHERE lw_date='.$date.' AND lw_region IN ("LUZON")');
            return $query->result_array();
            
        }
        public function vis_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query1=$this->db->query('SELECT * FROM lwap_archive WHERE lw_date='.$date.' AND lw_region IN ("VISAYAS")');
            return $query1->result_array();
        }
        public function sys_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $query2=$this->db->query('SELECT * FROM lwap_archive WHERE lw_date='.$date.' AND lw_region IN ("SYSTEM")');
            

            return $query2->result_array();
        }
        public function yluzon_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $date1='20180101';
            $year=date("Y");
            $query2=$this->db->query('SELECT * FROM lwap_archive WHERE lw_date<='.$date.' AND lw_date>='.$date1.' AND lw_region IN ("LUZON")');            
            return $query2->result_array();
            

        }
         public function yvis_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $date1='20180101';
            $year=date("Y");
            $query2=$this->db->query('SELECT * FROM lwap_archive WHERE lw_date<='.$date.' AND lw_date>='.$date1.' AND lw_region IN ("VISAYAS")');            
            return $query2->result_array();
            

        }
         public function ysys_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $date1='20180101';
            $year=date("Y");
            $query2=$this->db->query('SELECT * FROM lwap_archive WHERE lw_date<='.$date.' AND lw_date>='.$date1.' AND lw_region IN ("SYSTEM")');            
            return $query2->result_array();
            

        }
}
?>