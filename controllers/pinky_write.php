<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : Pinky                                                                            */
/*                                                                                                */
/* 2.모       듈 : Controller                                                                      */
/*                                                                                                */
/* 3.프로그램 ID : pinky_write.php                                                                  */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                            */
/*                 _head          - 모든 페이지에 공통 헤더                                             */
/*                 _footer        - 모든 페이지에 공통 푸터                                             */
/*                                                                                                */
/* 5.관련 View   : header_master, footer_master, site_intro                                        */
/*                                                                                                */
/* 6.사용 테이블 :                                                                                   */
/*                                                                                                */
/* 7.변 경 이 력 :                                                                                  */
/*  version  작성자    일      자                   내                 용                     요청자    */
/*  -------  ------  ----------  -------------------------------------------------------  ------  */
/*  1.0      이상훈    2015.07.04  최초작성                                                           */
/**************************************************************************************************/

class Pinky_write extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('log_model');
    $this->load->model('calendar_model');
    $this->load->model('pinky_acct_model');
    $this->load->model('pinky_config_model');
  }

//--------------------------------------------------------------------------------------------------
// Write - Acct Write
//--------------------------------------------------------------------------------------------------
  function write_cal()
  {
    // Session Set
    $user_id     = $this->una_session->userdata('user_id');
    $auth        = $this->una_session->userdata('auth');

    $data_url = '/index.php/pinky_write/write_cal';
    $this->_header($data_url);

    if ($user_id){
        // Auth Check
        if($auth >= 10){

            // Form Validation
            $this->form_validation->set_rules('ymd', 'Date', 'required');

            if($this->form_validation->run() === false)
            {
              // Fail
              $status = date('Y-m-d');
              $ymd = date('Y-m-d');
            }
            else {
              // Success
              $status = date('Y-m-d');

              $ymd = $this->input->post('ymd',true);
            }

            $month_status = $this->calendar_model->month_status(array( 'ymd'  => $ymd ));              
            $month_status_acct = $this->pinky_acct_model->month_status_acct(array( 'ymd'  => $ymd ));              
            $week_total_acct   = $this->pinky_acct_model->week_total_acct(array( 'ymd'  => $ymd ));              
            $month_total_acct  = $this->pinky_acct_model->month_total_acct(array( 'ymd'  => $ymd ));              

            $this->load->view('/pinky/write/write_cal', array( 'status'                   => $status
                                                              ,'ymd'                      => $ymd
                                                              ,'month_status'             => $month_status
                                                              ,'month_status_acct'        => $month_status_acct
                                                              ,'week_total_acct'          => $week_total_acct
                                                              ,'month_total_acct'         => $month_total_acct
                                                             ) );
        }
        else{
            $msg = '권한이 없습니다.';
            $this->_error(array('msg' => $msg));
        }
    }
    else{
        $msg = "로그인이 필요한 화면입니다.";
        $this->_information(array('msg' => $msg));
    }

    $this->_footer();
  }

//--------------------------------------------------------------------------------------------------
// Write - Acct Add
//--------------------------------------------------------------------------------------------------
  function acct_mgr_add()
  {
    // Form Validation
    $this->form_validation->set_rules('ymd', '일자를 입력하십시오.', 'required');
    $this->form_validation->set_rules('acct_dtl_id', '분류를 입력하십시오.', 'required');
    $this->form_validation->set_rules('bank_id', '통장코드로 선택하십시오.', 'numeric');
    $this->form_validation->set_rules('wallet_id', '지갑코드로 선택하십시오.', 'numeric');
    $this->form_validation->set_rules('in_amt', '입금은 숫자로 입력하십시오.', 'numeric');
    $this->form_validation->set_rules('out_amt', '출금은 숫자로 입력하십시오.', 'numeric');
    $this->form_validation->set_rules('description', '비고', 'max_length[1000]');

    $ymd         = $this->input->post('ymd',true);
    $acct_dtl_id = $this->input->post('acct_dtl_id',true);
    $bank_id     = $this->input->post('bank_id',true);
    $wallet_id   = $this->input->post('wallet_id',true);
    $in_amt      = $this->input->post('in_amt',true);
    $out_amt     = $this->input->post('out_amt',true);
    $description = $this->input->post('description',true);

    if($this->form_validation->run() == false)
    {
      // Fail
    }
    else {
      // Success
      $result = $this->pinky_acct_model->acct_mgr_insert(array(
                                                                'ymd'           => $ymd,
                                                                'in_amt'        => $in_amt,
                                                                'out_amt'       => $out_amt,
                                                                'acct_dtl_id'   => $acct_dtl_id,
                                                                'bank_id'       => $bank_id,
                                                                'wallet_id'     => $wallet_id,
                                                                'description'   => $description
                                                              ) );
    }

    // Redirect
    $this->acct_mgr($ymd);
//    redirect('/pinky_write/acct_mgr/'.$ymd );
  }

//--------------------------------------------------------------------------------------------------
// Write - Acct Upd
//--------------------------------------------------------------------------------------------------
  function acct_mgr_upd()
  {
    // Form Validation
    $this->form_validation->set_rules('ymd', '일자를 입력하십시오.', 'required');
    $this->form_validation->set_rules('acct_dtl_id', '분류를 입력하십시오.', 'required');
    $this->form_validation->set_rules('bank_id', '통장코드로 선택하십시오.', 'numeric');
    $this->form_validation->set_rules('wallet_id', '지갑코드로 선택하십시오.', 'numeric');
    $this->form_validation->set_rules('in_amt', '입금은 숫자로 입력하십시오.', 'numeric');
    $this->form_validation->set_rules('out_amt', '출금은 숫자로 입력하십시오.', 'numeric');
    $this->form_validation->set_rules('description', '비고', 'max_length[1000]');

    $id          = $this->input->post('id',true);
    $ymd         = $this->input->post('ymd',true);
    $acct_dtl_id = $this->input->post('acct_dtl_id',true);
    $bank_id     = $this->input->post('bank_id',true);
    $wallet_id   = $this->input->post('wallet_id',true);
    $in_amt      = $this->input->post('in_amt',true);
    $out_amt     = $this->input->post('out_amt',true);
    $description = $this->input->post('description',true);

    if($this->form_validation->run() == false)
    {
      // Fail
    }
    else {
      // Success
      $result = $this->pinky_acct_model->acct_mgr_update(array(
                                                                'id'            => $id,
                                                                'ymd'           => $ymd,
                                                                'in_amt'        => $in_amt,
                                                                'out_amt'       => $out_amt,
                                                                'acct_dtl_id'   => $acct_dtl_id,
                                                                'bank_id'       => $bank_id,
                                                                'wallet_id'     => $wallet_id,
                                                                'description'   => $description
                                                              ) );
    }

    // Redirect
    $this->acct_mgr($ymd);
  }

//--------------------------------------------------------------------------------------------------
// Write - Acct Del
//--------------------------------------------------------------------------------------------------
  function acct_mgr_del($id, $ymd)
  {
    $result = $this->pinky_acct_model->acct_mgr_delete(array( 'id' => $id ) );
    // Redirect
    $this->acct_mgr($ymd);
  }

//--------------------------------------------------------------------------------------------------
// Write - Acct Write
//--------------------------------------------------------------------------------------------------
  function acct_mgr($cal_ymd)
  {
    // Session Set
    $user_id     = $this->una_session->userdata('user_id');
    $auth        = $this->una_session->userdata('auth');

    $data_url = '/index.php/pinky_write/acct_mgr';
    $this->_header($data_url);

    if ($user_id){
        // Auth Check
        if($auth >= 10){

            // Form Validation
            $this->form_validation->set_rules('ymd', '일자를 입력하십시오.', 'required');

            if($this->form_validation->run() === false)
            {
              // Fail
              $status = date('Y-m-d');
              $ymd    = $cal_ymd;
            }
            else {
              // Success
              $status = 'Success';
              $ymd         = $this->input->post('ymd',true);
            }

            $month_status  = $this->calendar_model->month_status(array( 'ymd'  => $ymd ));              
            $acct_mgr_list = $this->pinky_acct_model->acct_mgr_list(array( 'ymd'  => $ymd ));               
            $acct_list     = $this->pinky_acct_model->acct_list( );
            $bank_list     = $this->pinky_config_model->bank_list( );
            $wallet_list   = $this->pinky_config_model->wallet_list( );

            $this->load->view('/pinky/write/acct_mgr', array( 'status'        => $status
                                                             ,'ymd'           => $ymd
                                                             ,'month_status'  => $month_status
                                                             ,'accr_mgr_list' => $acct_mgr_list
                                                             ,'acct_list'     => $acct_list
                                                             ,'bank_list'     => $bank_list
                                                             ,'wallet_list'   => $wallet_list
                                                             ,'acct_del_list' => $acct_mgr_list
                                                             ,'acct_upd_list' => $acct_mgr_list
                                                            ) );
        }
        else{
            $msg = '권한이 없습니다.';
            $this->_error(array('msg' => $msg));
        }
    }
    else{
        $msg = "로그인이 필요한 화면입니다.";
        $this->_information(array('msg' => $msg));
    }

    $this->_footer();
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
	$data_url = '/index.php/index';
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
