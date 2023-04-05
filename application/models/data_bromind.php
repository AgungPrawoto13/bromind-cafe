<?php
class data_bromind extends CI_Model
{

	public function get_where($table = null, $where = null, $data = null)
	{
		return $this->db->get_where($table, array($where => $data))->result();
	}

	public function get_cart($table = null, $where = null, $data = null )
	{
		return $this->db->get_where($table, $where)->result();
	}

	public function get($table = null)
	{
		return $this->db->get($table)->result();
	}

	public function save($table = null, $data = null)
	{
		$this->db->insert($table, $data);
	}

	public function update($table = null, $data = null, $where = null, $id = null)
	{
		return $this->db->update($table, $data, array($where => $id));
	}

	public function update_cart($table = null, $data = null, $where = null)
	{
		return $this->db->update($table, $data, $where);
	}

	public function delete($table = null, $where = null, $data = null)
	{
		return $this->db->delete($table, array($where => $data));
	}

	public function new_product()
	{
		return $this->db->query("SELECT * FROM product ORDER BY product_id desc limit 3")->result();
	}

	public function cart($kd_user = null)
	{
		return $this->db->query("SELECT * FROM `cart` join product on cart.product_id = product.product_id join user on cart.kd_user = user.kd_user where cart.kd_user ='$kd_user'")->result();
	}

	public function total_cart($kd_user)
	{
		$this->db->select('sum(price * qty) AS total');
		$this->db->from('cart');
		$this->db->join('product','cart.product_id = product.product_id');
		$this->db->where('kd_user',$kd_user);
		$sql = $this->db->get();
		return $sql->row();
	}
}