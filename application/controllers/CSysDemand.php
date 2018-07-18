<?php
    class CSysDemand extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('Mcsd');
        }
        public function index(){
            $this->load->view('vdashboard');
        }
        public function get_csd(){
            $luzon_data=$this->Mcsd->luzon_list();
            $vis_data=$this->Mcsd->vis_list();
            $sys_data=$this->Mcsd->sys_list();
            $curr_data=array_merge($luzon_data,$vis_data,$sys_data);
            echo json_encode($curr_data);
        }
    }