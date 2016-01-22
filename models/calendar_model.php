<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : SantaClaus                                                                     */
/*                                                                                                */
/* 2.모       듈 : Model                                                                          */
/*                                                                                                */
/* 3.프로그램 ID : calendar_model.php                                                             */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                        */
/*                 add            - work Table Insert                                             */
/*                                                                                                */
/* 5.관련 Controllers   : par.php                                                                 */
/*                                                                                                */
/* 6.관련 Views  : work.php                                                                       */
/*                                                                                                */
/* 7.사용 테이블 : work                                                                           */
/*                                                                                                */
/* 8.변 경 이 력 :                                                                                */
/*  version  작성자  일      자                   내                 용                   요청자  */
/*  -------  ------  ----------  -------------------------------------------------------  ------  */
/*  1.0      이상훈  2014.05.12  최초작성                                                         */
/**************************************************************************************************/

class Calendar_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

//--------------------------------------------------------------------------------------------------
// Rate Calendar
//--------------------------------------------------------------------------------------------------
  function rate_calendar($option){
    return $this->db->query("
                              SELECT cal.ymd as ymd
                                    ,cal.day as day
                                    ,hol.description as memo
                                    ,cal.byday_sun as byday_sun
                                    ,case when nullif(hol.ymd,0) = 0 then 0
                                          else cal.byday_sun end as byday_memo
                              FROM   calendar cal
                                     left join
                                     pms_holiday hol
                                     on cal.ymd = hol.ymd
                              WHERE  cal.ymd like concat(date_format('".$option['ymd']."','%Y-%m'),'%')
                              ;
                            ")->result();
  }
  function month_status($option){
      return $this->db->query(" SELECT *
                                FROM   calendar a
                                      ,lunar_solar b
                                WHERE  a.ymd = b.solar_date
                                and    a.ymd like concat(substring('".$option['ymd']."',1,7),'%')
                                limit 0,31
                                ")->result();
  }

  function calendar($option){
      return $this->db->query("SELECT *
                               FROM   calendar a
                                     ,lunar_solar b
                               WHERE  a.ymd = b.solar_date
                               AND    a.ymd BETWEEN '".$option['from_date']."'
                               AND concat(DATE_FORMAT('".$option['from_date']."', '%y'),concat(DATE_FORMAT('".$option['from_date']."', '%m')+1,DATE_FORMAT('".$option['from_date']."', '%d')))
                               ")->result();
  }

  function sales_calendar($option){
      return $this->db->query("SELECT *
                               FROM   calendar a
                                     ,lunar_solar b
                               WHERE  a.ymd = b.solar_date
                               AND    a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                               ")->result();
  }

  function byday_calendar($option){
      return $this->db->query("SELECT DISTINCT
                                      a.byday_long as byday_long
                                     ,UPPER(a.byday_short) as byday_short
                               FROM   calendar a
                                     ,lunar_solar b
                               WHERE  a.ymd = b.solar_date
                               AND    a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                               ")->result();
  }

  // Rate Close Calendar Graph ○
  function rateclose_cal($option){
      return $this->db->query("SELECT a.ymd AS ymd
                                     ,a.byday AS byday
                                     ,a.memo AS holiday
                                     ,b.hotel
                                     ,CASE WHEN b.st_twin = 0   THEN 'Ⅹ' ELSE (CASE WHEN b.st_twin > 0 THEN 'O' ELSE '' END) END AS st_twin
                                     ,CASE WHEN b.st_double = 0 THEN 'Ⅹ' ELSE (CASE WHEN b.st_double > 0 THEN 'O' ELSE '' END) END AS st_double
                               FROM (
                                      SELECT a.ymd as ymd
                                            ,a.byday_short as byday
                                            ,b.memo
                                      FROM   calendar a
                                            ,lunar_solar b
                                      WHERE  a.ymd = b.solar_date
                                      AND    a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                                    ) a
                                    LEFT OUTER JOIN
                                    (
                                      SELECT a.ymd
                                            ,a.hotel
                                            ,SUM(a.st_twin)   AS st_twin
                                            ,SUM(a.st_double) AS st_double
                                      FROM
                                            (
                                              SELECT a.ymd as ymd
                                                    ,0 AS hotel
                                                    ,SUM(a.st_twin) as st_twin
                                                    ,SUM(a.st_double) as st_double
                                              FROM  hotel_last_price a
                                              WHERE a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                                              AND   a.hotel_id = '".$option['hotel_id']."'
                                              AND   a.ota = '".$option['ota']."'
                                              GROUP BY a.ymd
                                              UNION ALL
                                              SELECT a.ymd as ymd
                                                    ,b.id  AS hotel
                                                    ,SUM(a.st_twin) as st_twin
                                                    ,SUM(a.st_double) as st_double
                                              FROM  hotel_last_price a
                                                   ,hotel_compset b
                                              WHERE a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                                              AND   b.hotel_id = '".$option['hotel_id']."'
                                              AND   a.hotel_id = b.compset_hotel_id
                                              AND   a.ota = '".$option['ota']."'
                                              GROUP BY a.ymd, b.id
                                             ) a
                                      GROUP BY a.ymd, a.hotel
                                     ) b ON a.ymd = b.ymd
                                ORDER BY a.ymd, b.hotel
                              ")->result();
  }

}

?>

