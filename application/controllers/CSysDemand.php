<?php
    class CSysDemand extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('Mcsd');
            $this->load->model('Mclwap'); 
            $this->load->model('Myadata');
        }
        public function index(){
            $this->load->view('vdashboard');
        }
        public function get_csd(){
            $luzon_data=$this->Mcsd->luzon_list();
            $vis_data=$this->Mcsd->vis_list();
            $sys_data=$this->Mcsd->sys_list();
            $curr_data=array_merge($luzon_data,$vis_data,$sys_data);
            //$fp = fopen('data.json', 'w');
            // fwrite($fp, json_encode($curr_data, JSON_PRETTY_PRINT));  
            // fclose($fp);
             echo json_encode($curr_data);
         
    }
    public function get_ysd(){
           $yluzon_data=$this->Mcsd->yluzon_list();
            $yvis_data=$this->Mcsd->yvis_list();
            $ysys_data=$this->Mcsd->ysys_list();
            $ycurr_data=array_merge($yluzon_data,$yvis_data,$ysys_data);
            //$fp = fopen('data.json', 'w');
            // fwrite($fp, json_encode($curr_data, JSON_PRETTY_PRINT));  
            // fclose($fp);
             echo json_encode($ycurr_data);
     
    }
    public function get_clwap(){
            $luzon_data=$this->Mclwap->luzon_list();
            $vis_data=$this->Mclwap->vis_list();
            $sys_data=$this->Mclwap->sys_list();
            $curr_data=array_merge($luzon_data,$vis_data,$sys_data);
            //$fp = fopen('data.json', 'w');
            // fwrite($fp, json_encode($curr_data, JSON_PRETTY_PRINT));  
            // fclose($fp);
             echo json_encode($curr_data);
         
    }
    public function get_ylwap(){
           $yluzon_data=$this->Mclwap->yluzon_list();
            $yvis_data=$this->Mclwap->yvis_list();
            $ysys_data=$this->Mclwap->ysys_list();
            $ycurr_data=array_merge($yluzon_data,$yvis_data,$ysys_data);
            //$fp = fopen('data.json', 'w');
            // fwrite($fp, json_encode($curr_data, JSON_PRETTY_PRINT));  
            // fclose($fp);
             echo json_encode($ycurr_data);
     
    }
    public function get_yalldata(){
            $dap_data=$this->Myadata->ydap_list();
            $amp_data=$this->Myadata->yamp_list();
            $yall_data=array_merge($dap_data,$amp_data);
             echo json_encode($yall_data);

    }
}
?>