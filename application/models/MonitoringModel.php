<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MonitoringModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDataSensor()
    {
        $this->db->select('*');
        $this->db->from('tb_sensor');
        $this->db->order_by("id", 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function UpdateData($DataUpdate)
    {
        $this->db->update('tb_sensor', $DataUpdate);
    }
}
