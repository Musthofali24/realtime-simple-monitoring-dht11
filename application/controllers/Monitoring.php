<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MonitoringModel');
    }

    public function index()
    {
        $this->load->view('MonitoringView');
    }

    public function getTemperature()
    {
        $recordSensor = $this->MonitoringModel->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        $this->load->view('temp', $data);
    }

    public function getHumidity()
    {
        $recordSensor = $this->MonitoringModel->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        $this->load->view('hum', $data);
    }

    public function sendData()
    {
        $DataUpdate = array(
            'temperature' => $this->uri->segment(3),
            'humidity' => $this->uri->segment(4),
        );

        $this->MonitoringModel->UpdateData($DataUpdate);
    }
}
