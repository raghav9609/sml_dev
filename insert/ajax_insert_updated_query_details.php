<?php
require_once "../config/config.php";
require_once "../include/helper.functions.php";
require_once "../include/display-name-functions.php";

/* if($user == '173'){
echo "select * from tbl_updated_query_details where query_id='".$qryyy_id."'";
} */
$qryyy_id = $_REQUEST['query_id'];
$return_html = "";

$qry_get_data = "select * from crm_raw_data as raw_data left join crm_query as qry on raw_data.id = qry.crm_raw_data_id where qry.id = '".$qryyy_id."'";
$res = mysqli_query($Conn1, $qry_get_data);
$recordcount = mysqli_num_rows($res);
if($recordcount > 0) {
    $res_data = mysqli_fetch_array($res);
   
    $company_nm = "";
    // $cust_id = $res_data['cust_id'];
    // if($res_data['company'] != '0') {
    //     $company_nm = get_display_name('comp_name',$res_data['company']); 
//     // }
//    if ($res_data['company'] == '38665') {
//         $company_nm = $company_nm." - ".get_display_name('sub_employer', $res_data['sub_employer_type']);
//     }
    $net_incm = ($res_data['net_income'] > 0) ? custom_money_format($res_data['net_income']) : "--";

    // $pan_card_get = trim($res_data['pan_card']);
    // if(trim($res_data['pan_card']) == '' || strlen(trim($res_data['pan_card'])) != '10'){
    //     $get_pan_card_qry = mysqli_query($Conn1,"select pan_card from tbl_customer_detail_history where cust_id = ".$cust_id." and pan_card != '' order by history_id DESC limit 1");
    // $result_pan_card_qry = mysqli_fetch_assoc($get_pan_card_qry);
    // $pan_card_get = $result_pan_card_qry['pan_card'];
    // }
    // $pan_card = ($pan_card_get != "") ? $pan_card_get : "--";
    // $comp_name_other = (trim($res_data['comp_name_other']) != "") ? $res_data['comp_name_other'] : "--";
    // $salary_pay_id = (!empty($res_data['sal_pay_id'])) ? $res_data['sal_pay_id'] : "";

    // $salry_py_mod = "--";
    // if(!empty($salary_pay_id)) {
    //     $salry_py_mod = get_display_name('salary_method',$salary_pay_id);
    // }

    // $city_nm = "--";
    // if(!empty($res_data['city'])) {
    //     $city_nm = get_display_name('city_name',$res_data['city']); 
    // }

    // $lead_score     =  round($res_data['lead_score'], 2);
    // $lead_rank      =  $res_data['lead_rank'];
    // $lead_costing   =  round($res_data['lead_costing'], 2);

    // $bus_anl_turn   = ($res_data['bus_anl_turn'] != "") ? $res_data['bus_anl_turn'] : "--";
    // $bus_ext_yr     = ($res_data['bus_ext_yr'] != "") ? $res_data['bus_ext_yr'] : "--";
    // $bus_exst_num   = ($res_data['bus_exst_num'] != "" && $res_data['bus_exst_num'] > 0) ? $res_data['bus_exst_num'] : "--";
    // $ann_turn_num   = ($res_data['ann_turn_num'] != "" && $res_data['ann_turn_num'] > 0) ? custom_money_format($res_data['ann_turn_num']) : "--";

    // if(($net_incm != '0' && $net_incm != '') || ($res_data['pan_card'] != '0' && $pan_card != '') || $city_nm != '' || $company_nm != '' || $comp_name_other != '' || ($salary_pay_id != '0' && $salary_pay_id != '')) {
?>
<?php 
    // $return_html .= "<table class='gridtable table_set' border='1' style=''><tr class='font-weight-bold'><th>Net Monthly Income</th><th>Company</th><th>Salary Payment Mode</th><th>PAN Card</th><th>City</th><th>Pin Code</th><th>Lead Rank</th><th>Lead Score</th><th>Lead Costing</th>"; 
    // $return_html .= "<th>Business Existing</th><th>Turnover</th>";
    // $return_html .= "</tr>";
    // echo $return_html;
    $return_html .= "<table class='gridtable table_set' border='1'><tr class='font-weight-bold'><th>Net Monthly Income</th><th>Company</th><th>Salary Payment Mode</th><th>PAN Card</th><th>City</th><th>Pin Code</th><th>Lead Rank</th><th>Lead Score</th><th>Lead Costing</th><th>Business Existing</th><th>Turnover</th></tr>";

?>
<?php
    $pincode = ($res_data['pincode'] > 0) ? $res_data['pincode'] : "--";
    // $return_html .= "<tr class='center-align'><td>".$net_incm."</td><td>".$company_nm."".$comp_name_other."</td><td>".$salry_py_mod."</td><td>".$pan_card."</td><td>".$city_nm."</td><td>".$pincode."</td><td>".$lead_rank."</td><td>".$lead_score."</td><td>".$lead_costing."</td>";
    // $return_html .= "<td>".$bus_ext_yr." (".$bus_exst_num.")</td><td>".$bus_anl_turn." (".$ann_turn_num.")</td>";
    // $return_html .= "</tr></table>";
    $return_html .= "<tr class='center-align'><td>".$net_incm."</td><td>".$company_nm."".$comp_name_other."</td><td>".$salry_py_mod."</td><td>".$pan_card."</td><td>".$city_nm."</td><td>".$pincode."</td><td>".$lead_rank."</td><td>".$lead_score."</td><td>".$lead_costing."</td><td>".$bus_ext_yr." (".$bus_exst_num.")</td><td>".$bus_anl_turn." (".$ann_turn_num.")</td></tr>";
    $return_html .= "</table>";
    echo $return_html; 


?>
<?php
    }
//}
// echo $return_html;
?>