<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function log_session_add($option)
	{
			$this->db->set('type',       $option['type']);
			$this->db->set('session_id', $option['session_id']);
			$this->db->set('ip_address', $option['ip_address']);
//			$this->db->set('ip_country', $option['ip_country']);
			$this->db->set('user_agent', $option['user_agent']);
			$this->db->set('robot',      $option['robot']);
			$this->db->set('mobile',     $option['mobile']);
			$this->db->set('platform',   $option['platform']);
			$this->db->set('user_id',    $option['user_id']);
			$this->db->set('auth',       $option['auth']);
			$this->db->set('created' , 'NOW()',false);

			$this->db->insert('log_session');
			
			$result = $this->db->insert_id();
			return $result;			
	}

	function log_email($option)
	{
			$this->db->set('from_email',$option['from_email']);
			$this->db->set('to_email',$option['to_email']);
			$this->db->set('subject',$option['subject']);
			$this->db->set('description',$option['description']);
			$this->db->set('created','NOW()',false);

			$this->db->insert('log_email');
			
			$result = $this->db->insert_id();
			return $result;			
	}

  function user_agent_list(){
      return $this->db->query("SELECT user_agent
                                     ,COUNT(*) AS cnt
                               FROM   log_session
                               GROUP BY user_agent
                              ")->result();
  }

  function robot_list(){
      return $this->db->query("SELECT robot
                                     ,COUNT(*) AS cnt
                               FROM   log_session
                               GROUP BY robot
                              ")->result();
  }

  function mobile_list(){
      return $this->db->query("SELECT mobile
                                     ,COUNT(*) AS cnt
                               FROM   log_session
                               GROUP BY mobile
                              ")->result();
  }

  function platform_list(){
      return $this->db->query("SELECT platform
                                     ,COUNT(*) AS cnt
                               FROM   log_session
                               GROUP BY platform
                              ")->result();
  }

  function session_list(){
      return $this->db->query("select *
                               from   log_session
                               where  created >= DATE_ADD(now(),INTERVAL -1 DAY);
                              ")->result();
  }

  function email_list(){
      return $this->db->query("select *
                               from   log_email
                               where  created >= DATE_ADD(now(),INTERVAL -1 DAY);
                              ")->result();
  }

}

?>
