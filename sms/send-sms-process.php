<?php
require_once(dirname(__FILE__) . '/../config/session.php');
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../helpers/common-helper.php');
require_once(dirname(__FILE__) . '/../include/class.mailer.php');

$subject = $_REQUEST['subject'];									
$description = trim($_REQUEST['description']);
$temp_id = $_REQUEST['template'];											
$query_id = $_REQUEST['query_id']; 
echo $url= "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=385302&username=9920706289&password=SML2021@123&senderid=SML&To=91".$subject."&Text=Congratulations DURWANG UDAY SAWANT! Your loan has been disbursed by bank. Expect the amount in your account within 24 working hours. Any questions? Contact us at Bharat Bhushan. We'd love to hear about your experience! Share your thoughts/Experince at - https://www.switchmyloan.in/testimonials. Cheers to financial success.";
$response = curl_get_helper(trim($url));

print_r($response);
$qry = "INSERT INTO crm_communication_history SET query_id='".$query_id."',type = 2, communication_id = '".$subject."',response='".base64_encode($response)."',description = '".base64_encode($description)."'";
$insert_comm = mysqli_query($Conn1,$qry);
//echo '<script>window.location.href = "'.$head_url.'/query/";</script>';
        ?>       
 
        
                                         
	