<?php
if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Login extends CI_Model
{

  function GET_LOGIN($user,$pass)
  {
      $row = $this->db->query("SELECT * FROM tbl_login WHERE user ='$user' AND pass = '$pass'");
      return $row;
  }

  function get_user()
   {
     $get_user = $this->db->get('tbl_login');
     return $get_user->result_array();
   }

  function insertTable($table_name,$data)
  {
   $tambah = $this->db->insert($table_name,$data);
   return $tambah;
  }

}
?>
