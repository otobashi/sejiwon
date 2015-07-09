<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
//  function __construct()
//  {
//    parent::__construct();
//  }

  function add($option)
  {
      $this->db->set('user_id' , $option['user_id']);
      $this->db->set('email'   , $option['email']);
      $this->db->set('name'    , $option['name']);
      $this->db->set('password', $option['password']);
      $this->db->set('auth'    , $option['auth']);
      $this->db->set('created' , 'NOW()',false);

      $this->db->insert('user');

      $result = $this->db->insert_id();
      return $result;
  }

  function user_get($option)
  {
      $result = $this->db->get_where('user', array('user_id'=>$option['user_id']))->row();
      return $result;
  }

  function user_list(){
      return $this->db->query("SELECT *
                               FROM   user
                               ORDER BY created desc
                               ")->result();
  }

  function user_upd($option)
  {
      $result = $this->db->query("update user
                                  set    auth     = '".$option['auth']."'
                                  where  id       = '".$option['id']."';  ");

      return $result;
  }

  function del($option)
  {
      $result = $this->db->query("delete from user
                                  where id = '".$option['id']."';  ");
      return $result;
  }

/*
  function getByEmail($option)
  {
      $result = $this->db->get_where('user', array('email'=>$option['email']))->row();
      return $result;
  }

  function getByAuth($option)
  {
      return $this->db->query("SELECT a.auth_level   AS auth
                               FROM   auth a
                               WHERE  a.email  = '".$option['email']."'
                               AND    a.auth   = 'BIZ'
                               limit 1
                               ")->row();
      return $result;
  }
*/

}

?>