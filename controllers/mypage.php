<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : Pinky                                                                          */
/*                                                                                                */
/* 2.모       듈 : Controller                                                                     */
/*                                                                                                */
/* 3.프로그램 ID : sc.php                                                                         */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                        */
/*                 _head          - 모든 페이지에 공통 헤더                                       */
/*                 _footer        - 모든 페이지에 공통 푸터                                       */
/*                                                                                                */
/* 5.관련 View   : header_master, footer_master, site_intro                                       */
/*                                                                                                */
/* 6.사용 테이블 :                                                                                */
/*                                                                                                */
/* 7.변 경 이 력 :                                                                                */
/*  version  작성자  일      자                   내                 용                   요청자  */
/*  -------  ------  ----------  -------------------------------------------------------  ------  */
/*  1.0      이상훈  2015.07.19    최초작성                                                       */
/**************************************************************************************************/

class Mypage extends CI_Controller {
//--------------------------------------------------------------------------------------------------
// CONSTRUCT
//--------------------------------------------------------------------------------------------------
  function __construct()
  {
    parent::__construct();
    $this->load->library('Una_common');
  }

//--------------------------------------------------------------------------------------------------
// INDEX
//--------------------------------------------------------------------------------------------------
  function index()
  {
    // 사용언어
    $language_id = $this->una_session->userdata('language_id');
    if(!$language_id){
      $language_id = 61;
    }
    $auth      = $this->una_session->userdata('auth');
    $user_id   = $this->una_session->userdata('user_id');
    $name      = $this->una_session->userdata('name');
    $auth_name = $this->una_session->userdata('auth_name');

    $data_url = '/index.php/mypage';
    $this->una_common->_header($data_url);

    $this->load->view('/mypage/main' );

    $this->una_common->_footer();

  }
/*
//--------------------------------------------------------------------------------------------------
// 로그아웃
//--------------------------------------------------------------------------------------------------
  function logout()
  {
    $user_id          = $this->una_session->userdata('user_id');
    $session_id       = $this->una_session->userdata('session_id');
    $ip_address       = $this->una_session->userdata('ip_address');
    $user_agent       = $this->agent->browser();
    $platform         = $this->agent->platform();
    $robot            = $this->agent->robot();
    $mobile           = $this->agent->mobile();
    //      $ip_country = $this->agent->ip_country();

    $this->una_session->destroy();

    //LogOut Session
    $this->common_model->log_session_add( array(
                                              'user_id'          => $user_id
                                             ,'type'       => 'LOGOUT'
                                             ,'session_id' => $session_id
                                             ,'ip_address' => $ip_address
      //                                               ,'ip_country' => $ip_country
                                             ,'user_agent' => $user_agent
                                             ,'robot'      => $robot
                                             ,'mobile'     => $mobile
                                             ,'platform'   => $platform
                                             ) );

    $data_url    = '/index.php/common';
    $this->una_common->_header($data_url);
    $this->load->view('/common/main');
    $this->una_common->_footer();
  }

//--------------------------------------------------------------------------------------------------
// 로그인
//--------------------------------------------------------------------------------------------------
  function login()
  {
    // 사용언어
    $language_id = $this->una_session->userdata('language_id');
    if(!$language_id){
      $language_id = 61;
    }

    $id_info          = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  2, 'language_id' => $language_id )); // 아이디 안내 가져오기
    $password_info    = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  3, 'language_id' => $language_id )); // 비밀번호 안내 가져오기

    // Form Validation
    $this->form_validation->set_rules('user_id',  $id_info->message, 'required');
    $this->form_validation->set_rules('password', $password_info->message, 'required|min_length[6]|max_length[30]');

    if($this->form_validation->run() === false)
    {
      $data_url    = '/index.php/common';
      $this->una_common->_header($data_url);
      $this->load->view('/common/main');
      $this->una_common->_footer();
    }
    else
    {
        $user_id  = $this->input->post('user_id',true);
        $password = $this->input->post('password',true);

        $user = $this->common_model->user_get(array('user_id' => $user_id ));

        if( $user->use_flag == 'Y' ){  // 인증된 메일인지 체크

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
                $this->una_session->set_userdata('user_id',     $user->user_id);
                $this->una_session->set_userdata('email',       $user->email);
                $this->una_session->set_userdata('name',        $user->name);
                $this->una_session->set_userdata('auth',        $user->level);
                $this->una_session->set_userdata('auth_name',   $user->auth_name);
                $this->una_session->set_userdata('language_id', $user->language_id);

                //Login Session
                $this->common_model->log_session_add( array(
                                                          'type'       => 'LOGIN'
                                                         ,'session_id' => $session_id
                                                         ,'ip_address' => $ip_address
                                                         ,'user_agent' => $user_agent
                                                         ,'robot'      => $robot
                                                         ,'mobile'     => $mobile
                                                         ,'platform'   => $platform
                                                         ,'user_id'    => $user->user_id
                                                         ,'auth'       => $user->auth_id
                                                         ) );

                //화면이동
                $this->index();

            }
            else {
                $data_url    = '/index.php/common';
                $this->una_common->_header($data_url);
                $this->una_common->_error(array('msg' => '로그인에 실패하였습니다.<br>아이디와 비밀번호를 다시 한번 확인해 주십시오.'));
                $this->una_common->_footer();
            }

        }
        else{ // 인증되지 않은 경우

            $this->common_model->user_mail_check(array('user_id' => $user_id));
            $msg = $this->common_model->get_message(array( 'type' => 'D', 'id' =>  4, 'language_id' => $language_id )); // 사용자메일 확인안됨.

            $data_url    = '/index.php/common';
            $this->una_common->_header($data_url);
            $this->una_common->_information(array('msg' => $msg->message));
            $this->una_common->_footer();

        }
    }
  }

//--------------------------------------------------------------------------------------------------
// 회원가입 이메일체크
//--------------------------------------------------------------------------------------------------
  function user_mail_check($user_id)
  {
    // 사용언어
    $language_id = $this->una_session->userdata('language_id');
    if(!$language_id){
      $language_id = 61;
    }

    $this->common_model->user_mail_check(array('user_id' => $user_id));
    $msg = $this->common_model->get_message(array( 'type' => 'D', 'id' =>  3, 'language_id' => $language_id )); // 사용자메일 확인됨.

    $data_url    = '/index.php/common';
    $this->una_common->_header($data_url);
    $this->una_common->_information(array('msg' => $msg->message));
    $this->una_common->_footer();
  }

//--------------------------------------------------------------------------------------------------
// 회원가입
//--------------------------------------------------------------------------------------------------
  function register()
  {
    // 사용언어
    $language_id = $this->una_session->userdata('language_id');
    if(!$language_id){
      $language_id = 61;
    }

    // Get Message
    $reg_user_info    = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  4, 'language_id' => $language_id )); // 사용자등록 안내 가져오기
    $use_info         = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  5, 'language_id' => $language_id )); // 이용약관 안내 가져오기
    $language_info    = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  7, 'language_id' => $language_id )); // 사용언어 안내 가져오기
    $id_info          = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  2, 'language_id' => $language_id )); // 아이디 안내 가져오기
    $name_info        = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  9, 'language_id' => $language_id )); // 이름 안내 가져오기
    $email_info       = $this->common_model->get_message(array( 'type' => 'I', 'id' => 10, 'language_id' => $language_id )); // 이메일 안내 가져오기
    $password_info    = $this->common_model->get_message(array( 'type' => 'I', 'id' =>  3, 'language_id' => $language_id )); // 비밀번호 안내 가져오기
    $re_password_info = $this->common_model->get_message(array( 'type' => 'I', 'id' => 12, 'language_id' => $language_id )); // 비밀번호확인 안내 가져오기
    $agree_check      = $this->common_model->get_message(array( 'type' => 'C', 'id' =>  1, 'language_id' => $language_id )); // 동의합니다. 가져오기
    $reg_button       = $this->common_model->get_message(array( 'type' => 'B', 'id' =>  4, 'language_id' => $language_id )); // 동의합니다. 가져오기
    $use_desc         = $this->common_model->get_message(array( 'type' => 'D', 'id' =>  1, 'language_id' => $language_id )); // 동의합니다. 가져오기

    // Form Validation
    $this->form_validation->set_rules('language_id', $language_info->message, 'required');
    $this->form_validation->set_rules('user_id', $id_info->message, 'required|is_unique[user.user_id]');
    $this->form_validation->set_rules('email', $email_info->message, 'required|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('name', $name_info->message, 'required|min_length[1]|max_length[50]|is_unique[user.name]');
    $this->form_validation->set_rules('password', $password_info->message, 'required|min_length[6]|max_length[30]|matches[re_password]');
    $this->form_validation->set_rules('re_password', $re_password_info->message, 'required');
    $this->form_validation->set_rules('agree', $agree_check->message, 'required');

    if($this->form_validation->run() === false)
    {
        $status = date('Y-m-d');

        $data_url    = '/index.php/common/register';

        $this->una_common->_header($data_url);

        $language_use_list = $this->common_model->language_use_list();

        $result = $this->load->view('/common/register', array(
                                                                'status'            => $status
                                                               ,'reg_user_info'     => $reg_user_info->message
                                                               ,'use_info'          => $use_info->message
                                                               ,'use_desc'          => $use_desc->message
                                                               ,'language_info'     => $language_info->message
                                                               ,'id_info'           => $id_info->message
                                                               ,'email_info'        => $email_info->message
                                                               ,'name_info'         => $name_info->message
                                                               ,'password_info'     => $password_info->message
                                                               ,'re_password_info'  => $re_password_info->message
                                                               ,'agree_check'       => $agree_check->message
                                                               ,'reg_button'        => $reg_button->message
                                                               ,'language_use_list' => $language_use_list
                                                              ));
        $this->una_common->_footer();
    }
    else
    {
        //회원 데이타베이스에 등록
        if(!function_exists('password_hash'))
        {
            $this->load->helper('password'); //User Define
        }

        $hash = password_hash($this->input->post('password',true), PASSWORD_BCRYPT);

        $rtn_code = $this->common_model->user_add(array(
                                                         'language_id'  => $this->input->post('language_id',true)
                                                        ,'user_id'      => $this->input->post('user_id',true)
                                                        ,'name'         => $this->input->post('name',true)
                                                        ,'email'        => $this->input->post('email',true)
                                                        ,'password'     => $hash
                                                    ));

        $this->una_common->_email(array(
                             'from_email'   => 'admin@sejiwon.com'
                            ,'from_name'    => '관리자'
                            ,'to_email'     => $this->input->post('email',true)
                            ,'subject'      => '회원가입을 축하합니다.'
                            ,'description'  => '<html><head></head><body>회원가입을 축하합니다. <hr><a href="http://otobashi.ipdisk.co.kr:8000/index.php/common/user_mail_check/'.$this->input->post('user_id',true).'">메일인증</a>을 누르신 후 사용하시면 됩니다.<body></html>'
                           ));

        //화면이동
        $msg = $this->common_model->get_message(array( 'type' => 'D', 'id' =>  2, 'language_id' => $language_id )); // 사용자등록 완료

        $data_url    = '/index.php/common';
        $this->una_common->_header($data_url);
        $this->una_common->_information(array('msg' => $msg->message));
        $this->una_common->_footer();
    }

  }
*/
}

?>
