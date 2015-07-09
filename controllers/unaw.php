<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : SantaClaus                                                                     */
/*                                                                                                */
/* 2.모       듈 : Controller                                                                     */
/*                                                                                                */
/* 3.프로그램 ID : unaw.php                                                                       */
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
/*  1.0      이상훈  2014.07.30  최초작성                                                         */
/**************************************************************************************************/

class Unaw extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('acct_model');
    $this->load->model('calendar_model');
  }

/*************************************************************************************************/
/* Common Module                                                                                 */
/*************************************************************************************************/
  function index()
  {
    $this->acct_mgr();
  }

  function _information($option)
  {
      $this->load->view('/w/information', array('msg' => $option['msg']) );
      return;
  }

  function _error($option)
  {
      $this->load->view('/w/error', array('msg' => $option['msg']) );
      return;
  }

  function _header($data_url)
  {

      if(!$data_url){
        $data_url = '/index.php/unaw/index';
      }

      $this->load->view('/w/header',array(
                                        'data_url' => $data_url
                                     ) );

  }

  function _footer()
  {
      $this->load->view('/w/footer');
  }

/*************************************************************************************************/
/* Code Acct Mst                                                                                 */
/*************************************************************************************************/
  function acct_mst()
  {
    $data_url    = '/index.php/unaw/acct_mst';

    $this->_header($data_url);

    $acct_mst_list = $this->acct_model->total_acct_mst_list();

    $this->load->view('/w/acct_mst',array('acct_mst_list' => $acct_mst_list) );

    $this->_footer();
  }

  function acct_mst_add()
  {
    $acct_mst_nm = $this->input->post('acct_mst_nm',true);

    $result = $this->acct_model->acct_mst_add(array(
            'acct_mst_nm'   => $acct_mst_nm,
            'use_flag'      => 'Y',
            'ord_seq'       => 0
        ));
    // Redirect
    redirect('/unaw/acct_mst/' );
  }

  function acct_mst_upd()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->acct_mst_upd(array(
                                                    'acct_mst_id'   => $_POST['id'][$i]['acct_mst_id'],
                                                    'acct_mst_nm'   => $_POST['id'][$i]['acct_mst_nm'],
                                                    'use_flag'      => $_POST['id'][$i]['use_flag'],
                                                    'ord_seq'       => $_POST['id'][$i]['ord_seq']
                                                 ) );
          }
          //저장되었습니다.
      }
    // Redirect
    redirect('/unaw/acct_mst/' );
  }

  function acct_mst_upd_modal()
  {

    $result = $this->acct_model->acct_mst_upd(array(
                                            'acct_mst_id'   => $this->input->post('acct_mst_id', true),
                                            'acct_mst_nm'   => $this->input->post('acct_mst_nm', true),
                                            'use_flag'      => $this->input->post('use_flag',    true),
                                            'ord_seq'       => $this->input->post('ord_seq',     true)
                                         ) );

    // Redirect
    redirect('/unaw/acct_mst/' );
  }

/*************************************************************************************************/
/* Code Acct Dtl                                                                                 */
/*************************************************************************************************/

  function acct_dtl()
  {
    $data_url    = '/index.php/unaw/acct_dtl';

    $this->_header($data_url);

    $acct_mst_list = $this->acct_model->total_acct_mst_list( );
    $acct_dtl_list = $this->acct_model->total_acct_dtl_list( );

    $this->load->view('/w/acct_dtl',array('acct_mst_list' => $acct_mst_list, 'acct_dtl_list' => $acct_dtl_list) );
    $this->_footer();
  }

  function acct_dtl_add()
  {
    $acct_mst_id = $this->input->post('acct_mst_id',true);
    $acct_dtl_nm = $this->input->post('acct_dtl_nm',true);
    $cd          = $this->input->post('cd',true);

    $result = $this->acct_model->acct_dtl_add(array(
            'acct_mst_id'   => $acct_mst_id,
            'acct_dtl_nm'   => $acct_dtl_nm,
            'cd'            => $cd,
            'use_flag'      => 'Y',
            'ord_seq'       => 0
        ));
    // Redirect
    redirect('/unaw/acct_dtl/' );
  }

  function acct_dtl_upd()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {

          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->acct_dtl_upd(array(
                                                    'acct_dtl_id'   => $_POST['id'][$i]['acct_dtl_id'],
                                                    'acct_mst_id'   => $_POST['id'][$i]['acct_mst_id'],
                                                    'acct_dtl_nm'   => $_POST['id'][$i]['acct_dtl_nm'],
                                                    'cd'            => $_POST['id'][$i]['cd'],
                                                    'use_flag'      => $_POST['id'][$i]['use_flag'],
                                                    'ord_seq'       => $_POST['id'][$i]['ord_seq']
                                                 ) );
          }
          //저장되었습니다.
      }
    // Redirect
    redirect('/unaw/acct_dtl/' );
  }

  function acct_dtl_upd_modal()
  {

    $result = $this->acct_model->acct_dtl_upd(array(
                                            'acct_dtl_id'   => $this->input->post('acct_dtl_id', true),
                                            'acct_mst_id'   => $this->input->post('acct_mst_id', true),
                                            'acct_dtl_nm'   => $this->input->post('acct_dtl_nm', true),
                                            'cd'            => $this->input->post('cd', true),
                                            'use_flag'      => $this->input->post('use_flag',    true),
                                            'ord_seq'       => $this->input->post('ord_seq',     true)
                                         ) );

    // Redirect
    redirect('/unaw/acct_dtl/' );
  }

/*************************************************************************************************/
/* BANK Code                                                                                     */
/*************************************************************************************************/
  function bank()
  {
    $data_url    = '/index.php/unaw/bank';

    $this->_header($data_url);

    $bank_list = $this->acct_model->total_bank_list();

    $this->load->view('/w/bank',array('bank_list' => $bank_list) );

    $this->_footer();
  }

  function bank_add()
  {
    $acct_nm = $this->input->post('acct_nm',true);
    $bank_nm = $this->input->post('bank_nm',true);
    $acct_no = $this->input->post('acct_no',true);

    $result = $this->acct_model->bank_add(array(
            'acct_nm'   => $acct_nm,
            'bank_nm'   => $bank_nm,
            'acct_no'   => $acct_no,
            'use_flag'      => 'Y',
            'ord_seq'       => 0
        ));
    // Redirect
    redirect('/unaw/bank/' );
  }

  function bank_upd()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->bank_upd(array(
                                                    'bank_id'   => $_POST['id'][$i]['bank_id'],
                                                    'acct_nm'   => $_POST['id'][$i]['acct_nm'],
                                                    'bank_nm'   => $_POST['id'][$i]['bank_nm'],
                                                    'acct_no'   => $_POST['id'][$i]['acct_no'],
                                                    'use_flag'  => $_POST['id'][$i]['use_flag'],
                                                    'ord_seq'   => $_POST['id'][$i]['ord_seq']
                                                 ) );
          }
          //저장되었습니다.
      }
    // Redirect
    redirect('/unaw/bank/' );
  }

  function bank_upd_modal()
  {

    $result = $this->acct_model->bank_upd(array(
                                                    'bank_id'   => $this->input->post('bank_id' ,true),
                                                    'acct_nm'   => $this->input->post('acct_nm' ,true),
                                                    'bank_nm'   => $this->input->post('bank_nm' ,true),
                                                    'acct_no'   => $this->input->post('acct_no' ,true),
                                                    'use_flag'  => $this->input->post('use_flag',true),
                                                    'ord_seq'   => $this->input->post('ord_seq' ,true)
                                         ) );

    // Redirect
    redirect('/unaw/bank/' );
  }

/*************************************************************************************************/
/* Code Wallet                                                                                   */
/*************************************************************************************************/
  function wallet()
  {
    $data_url    = '/index.php/unaw/wallet';

    $this->_header($data_url);

    $wallet_list = $this->acct_model->total_wallet_list();

    $this->load->view('/w/wallet',array('wallet_list' => $wallet_list) );

    $this->_footer();
  }

  function wallet_add()
  {
    $wallet_nm = $this->input->post('wallet_nm',true);

    $result = $this->acct_model->wallet_add(array(
            'wallet_nm'   => $wallet_nm,
            'use_flag'      => 'Y',
            'ord_seq'       => 0
        ));
    // Redirect
    redirect('/unaw/wallet/' );
  }

  function wallet_upd()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->wallet_upd(array(
                                                    'wallet_id'   => $_POST['id'][$i]['wallet_id'],
                                                    'wallet_nm'   => $_POST['id'][$i]['wallet_nm'],
                                                    'use_flag'    => $_POST['id'][$i]['use_flag'],
                                                    'ord_seq'     => $_POST['id'][$i]['ord_seq']
                                                 ) );
          }
          //저장되었습니다.
      }
    // Redirect
    redirect('/unaw/wallet/' );
  }

  function wallet_upd_modal()
  {

    $result = $this->acct_model->wallet_upd(array(
                                                    'wallet_id'   => $this->input->post('wallet_id',true),
                                                    'wallet_nm'   => $this->input->post('wallet_nm',true),
                                                    'use_flag'    => $this->input->post('use_flag',true),
                                                    'ord_seq'     => $this->input->post('ord_seq' ,true)
                                         ) );

    // Redirect
    redirect('/unaw/wallet/' );
  }

/*************************************************************************************************/
/* 가계부 입력                                                                                   */
/*************************************************************************************************/

  function acct_mgr1()
  {
  	$this->load->view('/w/acct_mgr11');
/*
    $data_url    = '/index.php/unaw/acct_mgr1';
    $from_date   = $this->input->post('from_date',true);
    $to_date     = $this->input->post('to_date',true);

    $this->_header($data_url);

    $acct_list = $this->acct_model->acct_list( );
    $bank_list = $this->acct_model->bank_list( );
    $wallet_list = $this->acct_model->wallet_list( );
    $acct_mgr_list = $this->acct_model->acct_mgr_list( array('from_date' => $from_date, 'to_date' => $to_date) );

    $this->load->view('/w/acct_mgr11',array(
                                       'acct_list'     => $acct_list
                                      ,'bank_list'     => $bank_list
                                      ,'wallet_list'   => $wallet_list
                                      ,'acct_mgr_list' => $acct_mgr_list
                                      ,'from_date'     => $from_date
                                      ,'to_date'       => $to_date
                                      ) );
    $this->_footer();
*/
  }


  function acct_mgr()
  {
    $data_url    = '/index.php/unaw/acct_mgr';
    $from_date   = $this->input->post('from_date',true);
    $to_date     = $this->input->post('to_date',true);

    if(!$from_date){
	    $from_date  = $this->una_session->userdata('from_date');
	    $to_date    = $this->una_session->userdata('to_date');
    }
    else{
	    $this->una_session->set_userdata('from_date', $from_date);
	    $this->una_session->set_userdata('to_date', $to_date);
    }

    $this->_header($data_url);

    $acct_list = $this->acct_model->acct_list( );
    $bank_list = $this->acct_model->bank_list( );
    $wallet_list = $this->acct_model->wallet_list( );
    $acct_mgr_list = $this->acct_model->acct_mgr_list( array('from_date' => $from_date, 'to_date' => $to_date) );

    $this->load->view('/w/acct_mgr',array(
                                       'acct_list'     => $acct_list
                                      ,'bank_list'     => $bank_list
                                      ,'wallet_list'   => $wallet_list
                                      ,'acct_mgr_list' => $acct_mgr_list
                                      ,'from_date'     => $from_date
                                      ,'to_date'       => $to_date
                                      ) );
    $this->_footer();
  }

  function acct_mgr_add()
  {
    $ymd         = $this->input->post('ymd',true);
    $acct_dtl_id = $this->input->post('acct_dtl_id',true);
    $bank_id     = $this->input->post('bank_id',true);
    $wallet_id   = $this->input->post('wallet_id',true);
    $in_amt      = $this->input->post('in_amt',true);
    $out_amt     = $this->input->post('out_amt',true);
    $description = $this->input->post('description',true);

    $result = $this->acct_model->acct_mgr_insert(array(
                                            'ymd'           => $ymd,
                                            'in_amt'        => $in_amt,
                                            'out_amt'       => $out_amt,
                                            'acct_dtl_id'   => $acct_dtl_id,
                                            'bank_id'       => $bank_id,
                                            'wallet_id'     => $wallet_id,
                                            'description'   => $description
                                         ) );

    // Redirect
    redirect('/unaw/acct_mgr/' );
  }

  function acct_mgr_upd()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->acct_mgr_upd(array(
                                                    'id'            => $_POST['id'][$i]['id'],
                                                    'ymd'           => substr($_POST['id'][$i]['ymd'],0,10),
                                                    'in_amt'        => $_POST['id'][$i]['in_amt'],
                                                    'out_amt'       => $_POST['id'][$i]['out_amt'],
                                                    'acct_dtl_id'   => $_POST['id'][$i]['acct_dtl_id'],
                                                    'bank_id'       => $_POST['id'][$i]['bank_id'],
                                                    'wallet_id'     => $_POST['id'][$i]['wallet_id'],
                                                    'description'   => $_POST['id'][$i]['description']
                                                 ) );

          }
          //저장되었습니다.
      }
    // Redirect
    $this->acct_mgr();
  }

  function acct_mgr_upd_modal()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->acct_mgr_upd(array(
                                                    'id'            => $this->input->post('id',true),
                                                    'ymd'           => substr($this->input->post('ymd',true),0,10),
                                                    'in_amt'        => $this->input->post('in_amt',true),
                                                    'out_amt'       => $this->input->post('out_amt',true),
                                                    'acct_dtl_id'   => $this->input->post('acct_dtl_id',true),
                                                    'bank_id'       => $this->input->post('bank_id',true),
                                                    'wallet_id'     => $this->input->post('wallet_id',true),
                                                    'description'   => $this->input->post('description',true)
                                                 ) );

          }
          //저장되었습니다.
      }
    // Redirect
    $this->acct_mgr();
  }

  function acct_mgr_del($id)
  {
    $result = $this->acct_model->acct_mgr_del(array( 'id' => $id ) );
    // Redirect
    $this->acct_mgr();
  }


/*************************************************************************************************/
/* 예산 입력                                                                                   */
/*************************************************************************************************/

  function plan_mgr()
  {
    $data_url    = '/index.php/unaw/plan_mgr';
    $from_date   = $this->input->post('from_date',true);
    $to_date     = $this->input->post('to_date',true);

    $this->_header($data_url);

    $acct_list = $this->acct_model->acct_list( );
    $plan_mgr_list = $this->acct_model->plan_mgr_list( array('from_date' => $from_date, 'to_date' => $to_date) );

    $this->load->view('/w/plan_mgr',array(
                                       'acct_list'     => $acct_list
                                      ,'plan_mgr_list' => $plan_mgr_list
                                      ,'from_date'     => $from_date
                                      ,'to_date'       => $to_date
                                      ) );
    $this->_footer();
  }

  function plan_mgr_add()
  {
    $ymd         = $this->input->post('ymd',true);
    $acct_dtl_id = $this->input->post('acct_dtl_id',true);
    $in_amt      = $this->input->post('in_amt',true);
    $out_amt     = $this->input->post('out_amt',true);
    $description = $this->input->post('description',true);

    $result = $this->acct_model->plan_mgr_insert(array(
                                            'ymd'           => $ymd,
                                            'in_amt'        => $in_amt,
                                            'out_amt'       => $out_amt,
                                            'acct_dtl_id'   => $acct_dtl_id,
                                            'description'   => $description
                                         ) );

    // Redirect
    redirect('/unaw/plan_mgr/' );
  }

  function plan_mgr_upd()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->plan_mgr_upd(array(
                                                    'id'            => $_POST['id'][$i]['id'],
                                                    'ymd'           => substr($_POST['id'][$i]['ymd'],0,10),
                                                    'in_amt'        => $_POST['id'][$i]['in_amt'],
                                                    'out_amt'       => $_POST['id'][$i]['out_amt'],
                                                    'acct_dtl_id'   => $_POST['id'][$i]['acct_dtl_id'],
                                                    'description'   => $_POST['id'][$i]['description']
                                                 ) );

          }
          //저장되었습니다.
      }
    // Redirect
    $this->plan_mgr();
  }

  function plan_mgr_upd_modal()
  {
      if ( ! isset($_POST['id']))
      {
          $id = FALSE;
      }
      else
      {
          $rcnt = count($this->input->post('id',true));
          for ($i=0; $i<$rcnt; $i++)
          {

            $result = $this->acct_model->plan_mgr_upd(array(
                                                    'id'            => $this->input->post('id', true),  
                                                    'ymd'           => substr($this->input->post('ymd',true),0,10),
                                                    'in_amt'        => $this->input->post('in_amt',      true),
                                                    'out_amt'       => $this->input->post('out_amt',     true),
                                                    'acct_dtl_id'   => $this->input->post('acct_dtl_id', true),
                                                    'description'   => $this->input->post('description', true)
                                                 ) );

          }
          //저장되었습니다.
      }
    // Redirect
    $this->plan_mgr();
  }

  function plan_mgr_del($id)
  {
    $result = $this->acct_model->plan_mgr_del(array( 'id' => $id ) );
    // Redirect
    $this->plan_mgr();
  }

/*************************************************************************************************/
/* 가계부 결산                                                                                   */
/*************************************************************************************************/

  function set_year()
  {
    $data_url = '/index.php/unaw/set_year';
    $year     = $this->input->get_post('year',true);

    if(!$year){
	    $year      = '20'.(string)date('y');
	  }

    $from_date = $year.'-01-01';
    $to_date   = $year.'-12-31';

    $this->_header($data_url);

    $set_year = $this->acct_model->set_year( array('from_date' => $from_date, 'to_date' => $to_date) );

    $this->load->view('/w/set_year',array(
                                       'year'     => $year
                                      ,'set_year' => $set_year
                                      ) );
    $this->_footer();
  }

/*************************************************************************************************/
/* 무지출 캘린더                                                                                   */
/*************************************************************************************************/

  function zero_cal()
  {

    $data_url    = '/index.php/unaw/zero_cal/';

    $this->_header($data_url);
    
  	$year      = $this->input->post('year',true);
  	$month     = $this->input->post('month',true);
  	
  	if(!$year){
  		$year      = date('Y');
  		$month     = date('m');
  	}
  	
  	$from_date = $year.'-'.substr('0'.$month,-2).'-01';
  	$to_date   = $year.'-'.substr('0'.$month,-2).'-31';

    $sales_calendar    = $this->calendar_model->sales_calendar(array('from_date'=>$from_date, 'to_date' =>$to_date));
 		$zero_cal          = $this->acct_model->zero_cal(array('from_date'=>$from_date, 'to_date' =>$to_date));

    $this->load->view('/w/zero_cal',array(
                                        'year'              => $year
                                       ,'month'             => $month
                                       ,'sales_calendar'    => $sales_calendar
                                       ,'zero_cal'          => $zero_cal
                                      ) );

    $this->_footer();
  }
/*************************************************************************************************/
/* 그래프                                                                                        */
/*************************************************************************************************/

  function grp_year()
  {

    $data_url    = '/index.php/unaw/grp_year/';

    $this->_header($data_url);

		$year   = date('Y');

		$from01 = $year.'-01-01';
		$to01   = $year.'-01-31';

		$from02 = $year.'-02-01';
		$to02   = $year.'-02-31';

		$from03 = $year.'-03-01';
		$to03   = $year.'-03-31';

		$from04 = $year.'-04-01';
		$to04   = $year.'-04-31';

		$from05 = $year.'-05-01';
		$to05   = $year.'-05-31';
		
		$from06 = $year.'-06-01';
		$to06   = $year.'-06-31';
		
		$from07 = $year.'-07-01';
		$to07   = $year.'-07-31';
		
		$from08 = $year.'-08-01';
		$to08   = $year.'-08-31';
		
		$from09 = $year.'-09-01';
		$to09   = $year.'-09-31';
		
		$from10 = $year.'-10-01';
		$to10   = $year.'-10-31';
		
		$from11 = $year.'-11-01';
		$to11   = $year.'-11-31';
		
		$from12 = $year.'-12-01';
		$to12   = $year.'-12-31';
  	
 		$grp_year01   = $this->acct_model->grp_year(array('from_date'=>$from01, 'to_date' =>$to01));
 		$grp_year02   = $this->acct_model->grp_year(array('from_date'=>$from02, 'to_date' =>$to02));
 		$grp_year03   = $this->acct_model->grp_year(array('from_date'=>$from03, 'to_date' =>$to03));
 		$grp_year04   = $this->acct_model->grp_year(array('from_date'=>$from04, 'to_date' =>$to04));
 		$grp_year05   = $this->acct_model->grp_year(array('from_date'=>$from05, 'to_date' =>$to05));
 		$grp_year06   = $this->acct_model->grp_year(array('from_date'=>$from06, 'to_date' =>$to06));
 		$grp_year07   = $this->acct_model->grp_year(array('from_date'=>$from07, 'to_date' =>$to07));
 		$grp_year08   = $this->acct_model->grp_year(array('from_date'=>$from08, 'to_date' =>$to08));
 		$grp_year09   = $this->acct_model->grp_year(array('from_date'=>$from09, 'to_date' =>$to09));
 		$grp_year10   = $this->acct_model->grp_year(array('from_date'=>$from10, 'to_date' =>$to10));
 		$grp_year11   = $this->acct_model->grp_year(array('from_date'=>$from11, 'to_date' =>$to11));
 		$grp_year12   = $this->acct_model->grp_year(array('from_date'=>$from12, 'to_date' =>$to12));

 		$grp_column01 = $this->acct_model->grp_column(array('from_date'=>$from01, 'to_date' =>$to01));
 		$grp_column02 = $this->acct_model->grp_column(array('from_date'=>$from02, 'to_date' =>$to02));
 		$grp_column03 = $this->acct_model->grp_column(array('from_date'=>$from03, 'to_date' =>$to03));
 		$grp_column04 = $this->acct_model->grp_column(array('from_date'=>$from04, 'to_date' =>$to04));
 		$grp_column05 = $this->acct_model->grp_column(array('from_date'=>$from05, 'to_date' =>$to05));
 		$grp_column06 = $this->acct_model->grp_column(array('from_date'=>$from06, 'to_date' =>$to06));
 		$grp_column07 = $this->acct_model->grp_column(array('from_date'=>$from07, 'to_date' =>$to07));
 		$grp_column08 = $this->acct_model->grp_column(array('from_date'=>$from08, 'to_date' =>$to08));
 		$grp_column09 = $this->acct_model->grp_column(array('from_date'=>$from09, 'to_date' =>$to09));
 		$grp_column10 = $this->acct_model->grp_column(array('from_date'=>$from10, 'to_date' =>$to10));
 		$grp_column11 = $this->acct_model->grp_column(array('from_date'=>$from11, 'to_date' =>$to11));
 		$grp_column12 = $this->acct_model->grp_column(array('from_date'=>$from12, 'to_date' =>$to12));

    $this->load->view('/w/grp_year',array(
                                        'grp_year01'   => $grp_year01
                                       ,'grp_year02'   => $grp_year02
                                       ,'grp_year03'   => $grp_year03
                                       ,'grp_year04'   => $grp_year04
                                       ,'grp_year05'   => $grp_year05
                                       ,'grp_year06'   => $grp_year06
                                       ,'grp_year07'   => $grp_year07
                                       ,'grp_year08'   => $grp_year08
                                       ,'grp_year09'   => $grp_year09
                                       ,'grp_year10'   => $grp_year10
                                       ,'grp_year11'   => $grp_year11
                                       ,'grp_year12'   => $grp_year12
                                       ,'grp_column01' => $grp_column01
                                       ,'grp_column02' => $grp_column02
                                       ,'grp_column03' => $grp_column03
                                       ,'grp_column04' => $grp_column04
                                       ,'grp_column05' => $grp_column05
                                       ,'grp_column06' => $grp_column06
                                       ,'grp_column07' => $grp_column07
                                       ,'grp_column08' => $grp_column08
                                       ,'grp_column09' => $grp_column09
                                       ,'grp_column10' => $grp_column10
                                       ,'grp_column11' => $grp_column11
                                       ,'grp_column12' => $grp_column12

                                      ) );
//		$this->load->view('/w/grp_year');
				
    $this->_footer();
  }
}

?>
