<?php
require_once(dirname(__FILE__) . '/../config/session.php');
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../helpers/common-helper.php');


$subject = $_REQUEST['subject'];									
$description = str_replace(array("\r", "\n"), '', $_REQUEST['description']);
$temp_id = $_REQUEST['template'];											
$query_id = $_REQUEST['query_id']; 

$header = array('content-type:application/x-www-form-urlencoded');
$url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi";
$content = "async=1&feedid=385302&username=9920706289&password=SML2021@123&senderid=SML&To=91".$subject."&Text=".str_replace(' ','+',$description);
$response = curl_helper($url,$header,$content);

$qry = "INSERT INTO crm_communication_history SET query_id='".$query_id."',type = 2, communication_id = '".$subject."',response='".base64_encode($response)."',description = '".base64_encode($description)."'";
$insert_comm = mysqli_query($Conn1,$qry);
echo '<script>window.location.href = "'.$head_url.'/query/";</script>';
?>       
 
        
                                         
	