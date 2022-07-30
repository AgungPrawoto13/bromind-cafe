<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function get_employee()
    {
        $this->db->where('role_id !=', 1);
        $employe = $this->db->get('user')->result_array();
        return $employe;
    }

    public function del_user($id)
    {
        $this->db->where('kd_user', $id);
        $this->db->delete('user');
    }

    public function get_leaderaccount()
    {
        $leader = $this->db->query('SELECT * FROM user WHERE role_id!=2 AND email!="ardhiansyahmalik1200@gmail.com"')->result_array();
        return $leader;
    }

    public function update($table = null, $data = null, $where = null, $id = null)
    {
        return $this->db->update($table, $data, array($where => $id));
    }
}