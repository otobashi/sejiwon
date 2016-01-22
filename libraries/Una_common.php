<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : Pinky                                                                          */
/*                                                                                                */
/* 2.모       듈 : Controller                                                                     */
/*                                                                                                */
/* 3.프로그램 ID : sc.php                                                                         */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                        */
/*                 _head          - 모든 페이지에 공통 헤더                                             */
/*                 _footer        - 모든 페이지에 공통 푸터                                             */
/*                                                                                                */
/* 5.관련 View   : header_master, footer_master, site_intro                                        */
/*                                                                                                */
/* 6.사용 테이블 :                                                                                   */
/*                                                                                                */
/* 7.변 경 이 력 :                                                                                   */
/*  version  작성자  일      자                   내                 용                        요청자   */
/*  -------  ------  ----------  -------------------------------------------------------  ------  */
/*  1.0      이상훈  2014.11.04    최초작성                                                           */
/*  1.1      이상훈  2015.07.04    register Status 추가                                              */
/*  1.2      이상훈  2015.07.16    회원가입 변경 및 언어변경대입                                           */
/**************************************************************************************************/

class Una_common extends CI_Controller {
  function __construct()
  {
    parent::__construct();
  }
  
//--------------------------------------------------------------------------------------------------
// Common
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// 메세지 박스
//--------------------------------------------------------------------------------------------------
  function _information($option)
  {
  	$this->load->view('/common/information', array('msg' => $option['msg']) );
  	return;
  }

  function _error($option)
  {
  	$this->load->view('/common/error', array('msg' => $option['msg']) );
  	return;
  }

//--------------------------------------------------------------------------------------------------
// E-Mail 보내기
//--------------------------------------------------------------------------------------------------
  function _email($option)
  {
    $this->load->library('email');

    $config['protocol']     = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'otobashi@gmail.com';
    $config['smtp_pass']    = 'sk*sh1120';
    $config['charset']      = 'utf-8';
    $config['newline']      = "\r\n";
    $config['mailtype']     = 'html'; // or html
    $config['validation']   = TRUE; // bool whether to validate email or not      

    $this->email->initialize($config);
    
  	$this->email->from($option['from_email'], $option['from_name']);
  	$this->email->to($option['to_email']);
  //  $this->email->cc('another@example.com');
  //  $this->email->bcc('and@another.com');

  	$this->email->subject($option['subject']);
  	$this->email->message($option['description']);

  	$this->email->send();

  	$result = $this->common_model->log_email(array(
        	                                          'from_email'  => $option['from_name']
        	                                         ,'to_email'    => $option['to_email']
        	                                         ,'subject'     => $option['subject']
        	                                         ,'description' => $option['description']
            	                                   ));

  	return;
  }

//--------------------------------------------------------------------------------------------------
// 각 페이지 헤더
//--------------------------------------------------------------------------------------------------
  function _header($data_url)
  {

    // 사용언어
    $language_id = $this->una_session->userdata('language_id');
    if(!$language_id){
      $language_id = 61;
    }

    $logo            = $this->common_model->get_message(array( 'type' => 'L', 'id' => 1, 'language_id' => $language_id )); // 로고 가져오기
    $login_info      = $this->common_model->get_message(array( 'type' => 'I', 'id' => 1, 'language_id' => $language_id )); // 로그인 안내 가져오기
    $id_info         = $this->common_model->get_message(array( 'type' => 'I', 'id' => 2, 'language_id' => $language_id )); // 아이디 안내 가져오기
    $password_info   = $this->common_model->get_message(array( 'type' => 'I', 'id' => 3, 'language_id' => $language_id )); // 비밀번호 안내 가져오기
    $login_button    = $this->common_model->get_message(array( 'type' => 'B', 'id' => 1, 'language_id' => $language_id )); // 로그인 버튼 가져오기
    $logout_button   = $this->common_model->get_message(array( 'type' => 'B', 'id' => 3, 'language_id' => $language_id )); // 로그아웃 버튼 가져오기
    $register_button = $this->common_model->get_message(array( 'type' => 'B', 'id' => 2, 'language_id' => $language_id )); // 회원가입 버튼 가져오기

  	$auth      = $this->una_session->userdata('auth');
  	$user_id   = $this->una_session->userdata('user_id');
  	$name      = $this->una_session->userdata('name');
    $auth_name = $this->una_session->userdata('auth_name');

    $project_use_list = $this->common_model->project_use_list(array( 'user_id' => $user_id, 'auth_level' => $auth )); // 프로젝트 사용리스트 가져오기
    $menu1_use_list   = $this->common_model->menu_use_list(array( 'user_id' => $user_id,  'level' => 1, 'auth_level' => $auth )); // 메뉴레벨1 사용리스트 가져오기
    $menu2_use_list   = $this->common_model->menu_use_list(array( 'user_id' => $user_id,  'level' => 2, 'auth_level' => $auth )); // 메뉴레벨1 사용리스트 가져오기
    $menu3_use_list   = $this->common_model->menu_use_list(array( 'user_id' => $user_id,  'level' => 3, 'auth_level' => $auth)); // 메뉴레벨1 사용리스트 가져오기

  	if(!$data_url){
    	$data_url = '/';
  	}

  	$this->load->view('/common/header',array(
            	                                'data_url'         => $data_url
            	                               ,'logo'             => $logo->message
                                             ,'login_info'       => $login_info->message
                                             ,'id_info'          => $id_info->message
                                             ,'password_info'    => $password_info->message
                                             ,'login_button'     => $login_button->message
                                             ,'logout_button'    => $logout_button->message
                                             ,'register_button'  => $register_button->message
            	                               ,'auth'             => $auth
            	                               ,'user_id'          => $user_id
            	                               ,'name'             => $name
                                             ,'auth_name'        => $auth_name
                                             ,'project_use_list' => $project_use_list
                                             ,'menu1_use_list'   => $menu1_use_list
                                             ,'menu2_use_list'   => $menu2_use_list
                                             ,'menu3_use_list'   => $menu3_use_list
            	                              ) );

  }

//--------------------------------------------------------------------------------------------------
// 각 페이지 푸터
//--------------------------------------------------------------------------------------------------
  function _footer()
  {
  	$this->load->view('/common/footer');
  }

}

?>
