<?php defined('BASEPATH') OR exit('No redirect script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `sub_menu`.*, `menu_sidebar`.`menu`
                    FROM `sub_menu` JOIN `menu_sidebar`
                      ON `sub_menu`.`menu_id` = `menu_sidebar`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function get_menu_id($id)
    {
        $query = $this->db->get_where('menu_sidebar', array('id' => $id));
        return $query;
    }
    
    public function update($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    public function get_sub_id($id)
    {
        $query = $this->db->get_where('sub_menu', array('id' => $id));
        return $query;
    }
}