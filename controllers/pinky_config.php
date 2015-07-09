<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : Pinky                                                                            */
/*                                                                                                */
/* 2.모       듈 : Controller                                                                      */
/*                                                                                                */
/* 3.프로그램 ID : pinky_config.php                                                                 */
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

class Pinky_config extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('log_model');
    $this->load->model('calendar_model');
    $this->load->model('pinky_config_model');
  }

//--------------------------------------------------------------------------------------------------
// config - Wallet Add
//--------------------------------------------------------------------------------------------------
  function wallet_add()
  {
    $this->form_validation->set_rules('wallet_nm', '지갑명을 입력하십시오.', 'required');

    if($this->form_validation->run() == true)
    {

      $result = $this->pinky_config_model->wallet_add(array(
                                                             'wallet_nm'   => $this->input->post('wallet_nm',true)
                                                            ,'use_flag'    => 'Y'
                                                            ,'ord_seq'     => 0
                                                           ));
    }

    // Redirect
    $this->cash_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Wallet Upd
//--------------------------------------------------------------------------------------------------
  function wallet_upd()
  {
    $this->form_validation->set_rules('wallet_nm', '지갑명을 입력하십시오.', 'required');

    if($this->form_validation->run() == true)
    {

      $result = $this->pinky_config_model->wallet_upd(array(
                                                             'wallet_id'   => $this->input->post('wallet_id', true)
                                                            ,'wallet_nm'   => $this->input->post('wallet_nm', true)
                                                            ,'use_flag'    => $this->input->post('use_flag',    true)
                                                            ,'ord_seq'     => $this->input->post('ord_seq',     true)
                                                           ));
    }

    // Redirect
    $this->cash_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Wallet Del
//--------------------------------------------------------------------------------------------------
  function wallet_del()
  {
    $result = $this->pinky_config_model->wallet_del(array( 'wallet_id'   => $this->input->post('wallet_id', true) ));

    // Redirect
    $this->cash_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Bank Add
//--------------------------------------------------------------------------------------------------
  function bank_add()
  {
    $this->form_validation->set_rules('acct_nm', '통장명을 입력하십시오.', 'required');

    if($this->form_validation->run() == true)
    {
      $result = $this->pinky_config_model->bank_add(array(
                                                           'acct_nm'   => $this->input->post('acct_nm',  true)
                                                          ,'bank_nm'   => $this->input->post('bank_nm',  true)
                                                          ,'acct_no'   => $this->input->post('acct_no',  true)
                                                          ,'use_flag'  => 'Y'
                                                          ,'ord_seq'   => 0
                                                          ));
    }

    // Redirect
    $this->cash_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Bank Upd
//--------------------------------------------------------------------------------------------------
  function bank_upd()
  {
    $this->form_validation->set_rules('acct_nm', '통장명을 입력하십시오.', 'required');

    if($this->form_validation->run() == true)
    {
      $result = $this->pinky_config_model->bank_upd(array(
                                                           'bank_id'   => $this->input->post('bank_id',  true)
                                                          ,'acct_nm'   => $this->input->post('acct_nm',  true)
                                                          ,'bank_nm'   => $this->input->post('bank_nm',  true)
                                                          ,'acct_no'   => $this->input->post('acct_no',  true)
                                                          ,'use_flag'  => $this->input->post('use_flag', true)
                                                          ,'ord_seq'   => $this->input->post('ord_seq',  true)
                                                         ) );
    }

    // Redirect
    $this->cash_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Bank Del
//--------------------------------------------------------------------------------------------------
  function bank_del()
  {
    $result = $this->pinky_config_model->bank_del(array( 'bank_id'   => $this->input->post('bank_id', true) ));

    // Redirect
    $this->cash_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Dtl Add
//--------------------------------------------------------------------------------------------------
  function acct_dtl_add()
  {

    $this->form_validation->set_rules('acct_mst_id', '대분류코드를 선택하십시오.', 'required');
    $this->form_validation->set_rules('acct_dtl_nm', '소분류코드를 입력하십시오.', 'required');
    $this->form_validation->set_rules('cd', '차대구분을 선택하십시오.', 'required');

    if($this->form_validation->run() == true)
    {
      $result = $this->pinky_config_model->acct_dtl_add(array(
                                                              'acct_mst_id'   => $this->input->post('acct_mst_id', true)
                                                             ,'acct_dtl_nm'   => $this->input->post('acct_dtl_nm', true)
                                                             ,'cd'            => $this->input->post('cd', true)
                                                             ,'use_flag'      => 'Y'
                                                             ,'ord_seq'       => 0
                                                            ));
    }

    // Redirect
    $this->acct_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Dtl Add
//--------------------------------------------------------------------------------------------------
  function acct_dtl_upd()
  {
    $this->form_validation->set_rules('acct_mst_id', '대분류코드를 선택하십시오.', 'required');
    $this->form_validation->set_rules('acct_dtl_nm', '소분류코드를 입력하십시오.', 'required');
    $this->form_validation->set_rules('cd', '차대구분을 선택하십시오.', 'required');

    if($this->form_validation->run() == true)
    {
      $result = $this->pinky_config_model->acct_dtl_upd(array(
                                                             'acct_dtl_id'   => $this->input->post('acct_dtl_id', true)
                                                            ,'acct_mst_id'   => $this->input->post('acct_mst_id', true)
                                                            ,'acct_dtl_nm'   => $this->input->post('acct_dtl_nm', true)
                                                            ,'cd'            => $this->input->post('cd', true)
                                                            ,'use_flag'      => $this->input->post('use_flag',    true)
                                                            ,'ord_seq'       => $this->input->post('ord_seq',     true)
                                                         ) );
    }

    // Redirect
    $this->acct_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Dtl Del
//--------------------------------------------------------------------------------------------------
  function acct_dtl_del()
  {
    $result = $this->pinky_config_model->acct_dtl_del(array( 'acct_dtl_id'   => $this->input->post('acct_dtl_id', true) ));

    // Redirect
    $this->acct_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Mst Add
//--------------------------------------------------------------------------------------------------
  function acct_mst_add()
  {
    $this->form_validation->set_rules('acct_mst_nm', '대분류코드를 입력하십시오.', 'required');

    if($this->form_validation->run() == true)
    {

      $result = $this->pinky_config_model->acct_mst_add(array(
                                                             'acct_mst_nm'   => $this->input->post('acct_mst_nm',true)
                                                            ,'use_flag'      => 'Y'
                                                            ,'ord_seq'       => 0
                                                           ));
    }

    // Redirect
    $this->acct_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Mst Upd
//--------------------------------------------------------------------------------------------------
  function acct_mst_upd()
  {
    $this->form_validation->set_rules('acct_mst_nm', '대분류코드를 입력하십시오.', 'required');

    if($this->form_validation->run() == true)
    {

      $result = $this->pinky_config_model->acct_mst_upd(array(
                                                             'acct_mst_id'   => $this->input->post('acct_mst_id', true)
                                                            ,'acct_mst_nm'   => $this->input->post('acct_mst_nm', true)
                                                            ,'use_flag'      => $this->input->post('use_flag',    true)
                                                            ,'ord_seq'       => $this->input->post('ord_seq',     true)
                                                           ));
    }

    // Redirect
    $this->acct_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Mst Del
//--------------------------------------------------------------------------------------------------
  function acct_mst_del()
  {
    $result = $this->pinky_config_model->acct_mst_del(array( 'acct_mst_id'   => $this->input->post('acct_mst_id', true) ));

    // Redirect
    $this->acct_code();
  }

//--------------------------------------------------------------------------------------------------
// config - Acct Code
//--------------------------------------------------------------------------------------------------
  function acct_code()
  {
    // Session Set
    $user_id     = $this->una_session->userdata('user_id');
    $auth        = $this->una_session->userdata('auth');

    $data_url = '/index.php/pinky_config/acct_code';
    $this->_header($data_url);

    if ($user_id){
        // Auth Check
        if($auth >= 10){

            // Form Validation
            // $this->form_validation->set_rules('ymd', 'Date', 'required');

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

            $acct_mst_list     = $this->pinky_config_model->total_acct_mst_list();
            $acct_mst_use_list = $this->pinky_config_model->acct_mst_use_list();
            $acct_dtl_list     = $this->pinky_config_model->total_acct_dtl_list();

            $this->load->view('/pinky/config/acct_code', array( 'status'                   => $status
                                                               ,'acct_mst_list'            => $acct_mst_list
                                                               ,'acct_mst_use_list'        => $acct_mst_use_list
                                                               ,'acct_dtl_list'            => $acct_dtl_list
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
// config - Cash Code
//--------------------------------------------------------------------------------------------------
  function cash_code()
  {
    // Session Set
    $user_id     = $this->una_session->userdata('user_id');
    $auth        = $this->una_session->userdata('auth');

    $data_url = '/index.php/pinky_config/cash_code';
    $this->_header($data_url);

    if ($user_id){
        // Auth Check
        if($auth >= 10){

            // Form Validation
            // $this->form_validation->set_rules('ymd', 'Date', 'required');

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

            $bank_list   = $this->pinky_config_model->bank_list();
            $wallet_list = $this->pinky_config_model->wallet_list();

            $this->load->view('/pinky/config/cash_code', array( 'status'         => $status
                                                               ,'bank_list'      => $bank_list
                                                               ,'wallet_list'    => $wallet_list
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
