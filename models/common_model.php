<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : SantaClaus                                                                     */
/*                                                                                                */
/* 2.모       듈 : Model                                                                          */
/*                                                                                                */
/* 3.프로그램 ID : common_model.php                                                               */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                        */
/*                                                                                                */
/* 5.관련 Controllers   :                                                                         */
/*                                                                                                */
/* 6.관련 Views  :                                                                                */
/*                                                                                                */
/* 7.사용 테이블 :                                                                                */
/*                                                                                                */
/* 8.변 경 이 력 :                                                                                */
/*  version   작성자   일      자                   내                 용                 요청자  */
/*  -------  ------  ----------  -------------------------------------------------------  ------  */
/*  1.0       이상훈   2015.07.16  최초작성                                                       */
/**************************************************************************************************/

class Common_model extends CI_Model {
  function __construct()
  {
    parent::__construct();
  }

//--------------------------------------------------------------------------------------------------
// Project Use List
//--------------------------------------------------------------------------------------------------
  function project_use_list($option)
  {
      return $this->db->query("
                                select p.project as project
                                      ,p.level   as level
                                      ,p.high_id as high_id
                                      ,p.id      as id
                                      ,p.auth_level as auth_level
                                      ,p.link       as link
                                from   user u
                                      ,user_group_has_user_has_project uupa
                                      ,project p
                                where  u.user_id = '".$option['user_id']."'
                                and    u.id = uupa.user_id
                                and    uupa.project_id = p.id
                                and    p.auth_level <= '".$option['auth_level']."'
                                and    p.use_flag = 'Y'
                              ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Menu Level Use List
//--------------------------------------------------------------------------------------------------
  function menu_use_list($option)
  {
      return $this->db->query("
                                select p.project as project
                                      ,p.level   as level
                                      ,p.high_id as high_id
                                      ,p.id      as id
                                      ,m.menu    as menu
                                      ,m.level   as menu_level
                                      ,m.high_id as menu_high_id
                                      ,m.id      as menu_id
                                      ,m.auth_level as auth_level
                                from   user u
                                      ,user_group_has_user_has_project uupa
                                      ,project p
                                      ,menu    m
                                where  u.user_id = '".$option['user_id']."'
                                and    u.id = uupa.user_id
                                and    uupa.project_id = p.id
                                and    p.id = m.project_id
                                and    m.level = '".$option['level']."'
                                and    m.auth_level <= '".$option['auth_level']."'
                                and    p.use_flag = 'Y'
                                and    m.use_flag = 'Y'
                                ;
                              ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Session Log
//--------------------------------------------------------------------------------------------------
  function log_session_add($option)
  {
      $this->db->set('user_id',          $option['user_id']);
      $this->db->set('type',             $option['type']);
      $this->db->set('session_id',       $option['session_id']);
      $this->db->set('ip_address',       $option['ip_address']);
//      $this->db->set('ip_country', $option['ip_country']);
      $this->db->set('user_agent',       $option['user_agent']);
      $this->db->set('robot',            $option['robot']);
      $this->db->set('mobile',           $option['mobile']);
      $this->db->set('platform',         $option['platform']);
      $this->db->set('created', 'NOW()',false);

      $this->db->insert('log_session');

      $result = $this->db->insert_id();
      return $result;
  }

//--------------------------------------------------------------------------------------------------
// E-mail Log
//--------------------------------------------------------------------------------------------------
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

//--------------------------------------------------------------------------------------------------
// Language Use List
//--------------------------------------------------------------------------------------------------
  function language_use_list()
  {
      return $this->db->query("select *
                               from   language
                               where  use_flag = 'Y'
                              ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Message Row Return
//--------------------------------------------------------------------------------------------------
  function get_message($option)
  {
    return $this->db->query("
                              SELECT *
                              FROM   message
                              WHERE  type = '".$option['type']."'
                              AND    id   = '".$option['id']."'
                              AND    language_id   = '".$option['language_id']."'
                              limit 1 ;
                            ")->row();
  }

//--------------------------------------------------------------------------------------------------
// User Add
//--------------------------------------------------------------------------------------------------
  function user_add($option)
  {
      $row_auth = $this->db->query( "
                                      SELECT *
                                      FROM   auth
                                      WHERE  level       = 10
                                      AND    language_id = '".$option['language_id']."'
                                      limit 1 ;
                                    ")->row();

      $this->db->set('auth_id',     $row_auth->id);
      $this->db->set('language_id', $option['language_id']);
      $this->db->set('user_id',     $option['user_id']);
      $this->db->set('name',        $option['name']);
      $this->db->set('email',       $option['email']);
      $this->db->set('password',    $option['password']);
      $this->db->set('use_flag',    'N');
      $this->db->set('ord_seq',     10000);
      $this->db->set('created',     'NOW()',false);
      $this->db->set('created_by',  $option['user_id']);
      $this->db->set('updated',     'NOW()',false);
      $this->db->set('updated_by',  $option['user_id']);

      $this->db->insert('user');

      $id = $this->db->insert_id();

      // 개인그룹에 포함시킴.
      $this->db->query("
                        INSERT INTO user_group_has_user
                        SELECT 1, id
                        FROM   user
                        WHERE  id = ".$id."
                        ;
                      ");
/*
      // 내정보 프로젝트에 포함시킴.
      $this->db->query("
                        INSERT INTO user_group_has_user_has_project
                        SELECT a.user_group_id, a.user_id, c.project_id, c.auth_id
                        FROM   user_group_has_user a,
                               user b,
                               project c
                        WHERE  b.id = ".$id."
                        AND    a.user_id = b.id
                        AND    b.auth_id = c.auth_id
                        ;
                      ");
*/
      return $id;
  }
//--------------------------------------------------------------------------------------------------
// User Mail Check
//--------------------------------------------------------------------------------------------------
  function user_mail_check($option)
  {
    return $this->db->query("
                              UPDATE user
                              SET    use_flag = 'Y'
                                    ,updated = now()
                                    ,updated_by = '".$option['user_id']."'
                              WHERE  user_id   = '".$option['user_id']."'
                              ;
                            ");
  }

//--------------------------------------------------------------------------------------------------
// Get User
//--------------------------------------------------------------------------------------------------
  function user_get($option)
  {
      $result = $this->db->query( "
                                    SELECT u.id as uid
                                          ,u.auth_id as auth_id
                                          ,u.language_id as language_id
                                          ,u.user_id as user_id
                                          ,u.name as name
                                          ,u.email as email
                                          ,u.password as password
                                          ,u.use_flag as use_flag
                                          ,u.ord_seq as ord_seq
                                          ,a.auth as auth_name
                                          ,a.level as level
                                    FROM   user u
                                          ,auth a
                                    WHERE  u.user_id     = '".$option['user_id']."'
                                    AND    u.auth_id     = a.id
                                    AND    u.language_id = a.language_id
                                    AND    a.use_flag    = 'Y'
                                    limit 1 ;
                                  ")->row();
//      $result = $this->db->get_where('user', array('user_id'=>$option['user_id']))->row();
      return $result;
  }

}

?>
