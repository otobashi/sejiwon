<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : Pinky                                                                            */
/*                                                                                                */
/* 2.모       듈 : Controller                                                                      */
/*                                                                                                */
/* 3.프로그램 ID : sc.php                                                                           */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                            */
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
/**************************************************************************************************/

class Common extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('log_model');
  }

  function index()
  {

  	$data_url = '/index.php/common';
  	$this->_header($data_url);

  	$this->load->view('/common/main' );

  	$this->_footer();

  }

/**************************************************************************************************/
/* Common User                                                                                    */
/**************************************************************************************************/

  function logout()
  {
	$session_id = $this->una_session->userdata('session_id');
	$ip_address = $this->una_session->userdata('ip_address');
	$user_id    = $this->una_session->userdata('user_id');
	$auth       = $this->una_session->userdata('auth');
	$user_agent = $this->agent->browser();
	$platform   = $this->agent->platform();
	$robot      = $this->agent->robot();
	$mobile     = $this->agent->mobile();
	//      $ip_country = $this->agent->ip_country();

	$this->una_session->destroy();

	//LogOut Session
	$this->log_model->log_session_add( array(
	                                        'type'       => 'LOGOUT'
	                                       ,'session_id' => $session_id
	                                       ,'ip_address' => $ip_address
	//                                               ,'ip_country' => $ip_country
	                                       ,'user_agent' => $user_agent
	                                       ,'robot'      => $robot
	                                       ,'mobile'     => $mobile
	                                       ,'platform'   => $platform
	                                       ,'user_id'    => $user_id
	                                       ,'auth'       => $auth
	                                       ) );

	$data_url    = '/index.php/common';
	$this->_header($data_url);
	$this->load->view('/common/main');
	$this->_footer();
  }

  function login()
  {
    // Form Validation
    $this->form_validation->set_rules('user_id', 'USER ID', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]');

    if($this->form_validation->run() === false)
    {
      $data_url    = '/index.php/common';
      $this->_header($data_url);
      $this->load->view('/common/main');
      $this->_footer();
    }
    else
    {
        $user_id  = $this->input->post('user_id',true);
        $password = $this->input->post('password',true);

        $user = $this->user_model->user_get(array('user_id' => $user_id ));

        if(!function_exists('password_hash')){
            $this->load->helper('password');
        }

        if( $user_id == $user->user_id &&
            password_verify($password, $user->password) )
        {
            //로그인정보 생성
            $session_id = $this->una_session->userdata('session_id');
            $user_agent = $this->agent->browser();
            $platform   = $this->agent->platform();
            $robot      = $this->agent->robot();
            $mobile     = $this->agent->mobile();
            $ip_address = $this->una_session->userdata('ip_address');

            //쿠키로 생성
            $this->una_session->set_userdata('user_id', $user->user_id);
            $this->una_session->set_userdata('email', $user->email);
            $this->una_session->set_userdata('name', $user->name);
            $this->una_session->set_userdata('auth', $user->auth);

            $this->una_session->set_userdata('logo', 'Pinky');

            //Login Session
            $this->log_model->log_session_add( array(
                                                      'type'       => 'LOGIN'
                                                     ,'session_id' => $session_id
                                                     ,'ip_address' => $ip_address
                                                     ,'user_agent' => $user_agent
                                                     ,'robot'      => $robot
                                                     ,'mobile'     => $mobile
                                                     ,'platform'   => $platform
                                                     ,'user_id'    => $user->user_id
                                                     ,'auth'       => $user->auth
                                                     ) );

            //화면이동
            $this->index();

        }
        else {
            $data_url    = '/index.php/common';
            $this->_header($data_url);
            $this->_error(array('msg' => '로그인에 실패하였습니다.<br>아이디와 비밀번호를 다시 한번 확인해 주십시오.'));
            $this->_footer();
        }
    }
  }

  function register()
  {
   
    // Form Validation
    $this->form_validation->set_rules('user_id', 'USER ID', 'required|is_unique[user.user_id]');
    $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[50]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|matches[re_password]');
    $this->form_validation->set_rules('re_password', 'Password Confirm', 'required');
    $this->form_validation->set_rules('agree', 'Agree', 'required');

    if($this->form_validation->run() === false)
    {
        $status = date('Y-m-d');

        $data_url    = '/index.php/common/register';
        $this->_header($data_url);
        $this->load->view('/common/register', array('status' => $status));
        $this->_footer();
    }
    else
    {
        //회원 데이타베이스에 등록
        if(!function_exists('password_hash'))
        {
            $this->load->helper('password'); //User Define
        }

        $hash = password_hash($this->input->post('password',true), PASSWORD_BCRYPT);

        $rtn_code = $this->user_model->add(array(
                        'user_id'  => $this->input->post('user_id',true),
                        'email'    => $this->input->post('email',true),
                        'password' => $hash,
                        'name'     => $this->input->post('name',true),
                        'auth'     => $this->input->post('auth',true)
                    ));

        //화면이동
        $msg = 'User 등록되었습니다.';

        $data_url    = '/index.php/common';
        $this->_header($data_url);
        $this->_information(array('msg' => $msg));
        $this->_footer();
    }

  }

//--------------------------------------------------------------------------------------------------
// Common
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

  function _email($option)
  {
	$this->load->library('email');

	$this->email->from($option['from_email'], $option['from_name']);
	$this->email->to($option['to_email']);

	$this->email->subject($option['subject']);
	$this->email->message($option['description']);

	$this->email->send();

	$result = $this->log_model->log_email(array(
	                                          'from_email'  => $option['from_name']
	                                         ,'to_email'    => $option['to_email']
	                                         ,'subject'     => $option['subject']
	                                         ,'description' => $option['description']
	                                     ) );

	return;
  }

  function _header($data_url)
  {
	$logo     = $this->una_session->userdata('logo');
	$auth     = $this->una_session->userdata('auth');
	$user_id  = $this->una_session->userdata('user_id');
	$name     = $this->una_session->userdata('name');
	$hotel_id = $this->una_session->userdata('hotel_id');
	if(!$hotel_id){
	$hotel_id = '1';
	}

	if(!$logo){
	$logo = 'Pinky';
	}

	if(!$data_url){
	$data_url = '/';
	}

	$this->load->view('/common/header',array(
	                                'data_url' => $data_url
	                               ,'logo'     => $logo
	                               ,'auth'     => $auth
	                               ,'user_id'  => $user_id
	                               ,'name' => $name
	                               ,'hotel_id' => $hotel_id
	                             ) );

  }

  function _footer()
  {
	$this->load->view('/common/footer');
  }

}

?>
