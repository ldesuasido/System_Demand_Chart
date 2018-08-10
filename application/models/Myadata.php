<?php
        class Myadata extends CI_Model{
            public function ydap_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $date1='20180101';
            $year=date("Y");
            $query2=$this->db->query('SELECT * FROM dap WHERE dap_partid IN ("APRI", "EAUC","TLI","TMO","CPPC","PEC") AND dap_deldate<='.$date.' AND dap_deldate>='.$date1.'');            
            return $query2->result_array();
            

        }
         public function yamp_list(){
            date_default_timezone_set("Asia/Manila");
            $date=date("Ymd");
            $date1='20180101';
            $year=date("Y");
            $query2=$this->db->query('SELECT * FROM amp WHERE amp_partid IN ("APRI","EAUC","TLI","TMO","CPPC","PEC") AND amp_deldate<='.$date.' AND amp_deldate>='.$date1.'');            
            return $query2->result_array();
         }

        }
          
    ?>
