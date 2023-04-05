<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Report_model extends CI_Model
{
    public function get_report()
    {
        return $this->db->query("SELECT * FROM report ORDER BY date_created DESC LIMIT 10")->result_array();
        // return $this->db->get('report')->result_array();
    }

    public function today_reports()
    {
        return $this->db->query("SELECT SUM(spending) as spending, SUM(income) as income, SUM(off_income) as off_income, SUM(on_income) as on_income, food, baverg FROM report ORDER BY date_created DESC LIMIT 1")->row_array();
    }

    public function get_reports($limit, $start)
    {
        $this->db->select("*");
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get('report', $limit, $start)->result_array();
    }

    public function fav_food()
    {
        return $this->db->query("SELECT COUNT(*) AS jml_food FROM report JOIN product ON `report`.`food` = `product`.`product_name` WHERE `report`.`food` = `product`.`product_name`")->result_array();
        // return $this->db->query("SELECT * from report")->result();
    }

    public function get_report_id($id)
    {
        $query = $this->db->get_where('report', array('report_id' => $id));
        return $query;
    }

    public function update($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($id)
    {
        $this->db->where('report_id', $id);
        $this->db->delete('report');
    }
}