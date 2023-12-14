<?php

$template_body = '<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>List of Documents</title>
	
</head>
<body style="margin: auto;background: #fff8f3;font-family: Calibri, Helvetica, sans-serif;line-height: 25px;">
	<table align="center" width="100%" cellpadding="2" cellspacing="0" style="max-width: 690px; margin: 0 auto;line-height: 25px;">
		<tr>
			<td style="padding:20px 0px;font-family:Calibri, Helvetica, sans-serif; font-size:12px; color:#080808;" align="center"><td style="padding:20px 0px;font-family:Calibri, Helvetica, sans-serif; font-size:12px; color:#080808;" align="center">'.$loan_type_name.' Documents</td>	</td>		</tr>
	</table>
	<table cellpadding="0" cellspacing="0" style="border: 1px solid #000000;max-width: 690px;min-width:320px;text-align: center;margin: auto;background: #ffffff;border-spacing: 0px;line-height: 25px">
		<tr>
	        <td width="80%" style="width:80%; padding:15px 0 10px 20px;" align="left">
				<img src="https://dpja4fdtwlj2f.cloudfront.net/logo.png" border="0" width="185" alt="MyLoanCare.in" title="MyLoanCare.in"></td>
	        <td width="20%" style="width:20%; padding:15px 20px 10px 10px; text-align:right !important;" align="right"></td>
	      </tr>
	      
		<tr>
                            <td colspan="3" style="line-height: 0; border-top:1px solid #d8d8d8; font-size: 0;" bgcolor="#ffffff" height="1">&nbsp;</td>
                          </tr><tr>
                            <td colspan="3" style="line-height: 0; border-top:1px solid #d8d8d8; font-size: 0;" bgcolor="#ffffff" height="1">&nbsp;</td>
                          </tr>
		<tr>
                                  <td align="left" colspan="2" style="font-family:Calibri, Helvetica, sans-serif; font-size:19px; color:#002856;  padding: 0px 45px">
				<p><b>Dear '.ucwords(strtolower($salutn_name." ".$name)).',</b></p>
				<p style="font-size: 18px">Thank you for applying for a '.$loan_type_name.' through MyLoanCare.in. We require a few documents to process your '.$loan_type_name.' application. Please keep the documents ready till we fix an appointment with the bank.<br><br>
					<b>List of documents required for '.$loan_type_name.' are as follows:</b>
				</p>
			</td>
		</tr>';		
		if($loan_type_id == 56){ 
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Salaried Documents</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>PAN card copy & one photograph for all individuals joining the loan.</li>
													<li>Latest residence address proof (Passport copy/ Voter ID card/ Utility bill) for all individuals joining the loan.( Relationship proof along with declaration can be given for Co-applicants, not having separate address proof).</li>
													<li>Latest 3 months salary slip, increment letter (in case there is any in latest 3 months).</li>
													<li>Copy of Appointment letter, if recently joined in current organization (within 1 year).</li>
													<li>Latest 2 years Form-16 & ITR.</li>
													<li>Latest 6 months bank statement showing 6 salaries credited.</li>
													<li>Detail of all running loans with repayment track record & latest 6 months bank statement from where EMIs are being paid.</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		}		
		if($loan_type_id == 51 || $loan_type_id == 54) { 
			if($occup_id == 1){
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Salaried Documents</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>Loan application form with 3 passport size photographs for all individuals joining the loan.</li>
													<li>Identity proof such as PAN Card/ Passport copy/ Voter ID card/ Drivers License.</li>
													<li>Latest residence address proof (Passport copy/ Voter ID card/ Utility bill) for all individuals joining the loan.</li>
													<li>Latest 3 months salary slip, increment letter (in case there is any in latest 3 months).</li>
													<li>Latest 2 years Form-16 & ITR.</li>
													<li>Latest 6 months bank statement showing 6 salaries credited.</li>
													<li>Detail of all running loans with repayment track record & latest 6 months bank statement from where EMIs are being paid.</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} else {
			$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Self Employed Documents</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>Loan application form with 3 passport size photographs for all individuals joining the loan.</li>
													<li>Latest residence address proof (Passport copy/ Voter ID card/ Utility bill) for all individuals joining the loan.</li>
													<li>Detail of all running loans with repayment track record & latest 6 months bank statement from where EMIs are being paid.</li>
													<li>Latest 3 years ITR and 6 months bank statement.</li>
													<li>Balance Sheet & Profit & Loss account for last 3 years</li>
													<li>Business License Details (or equivalent)</li>
													<li>TDS Certificate (Form 16A, if applicable)</li>
													<li>Certificate of qualification (for C.A./ Doctor and other professionals)</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		}
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Property Documents</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>Permission for construction (where applicable)</li>
													<li>Registered Agreement for Sale (only for Maharashtra)/Allotment Letter/Stamped Agreement for Sale</li>
													<li>Occupancy Certificate (in case of ready to move property)</li>
													<li>Share Certificate (only for Maharashtra), Maintenance Bill, Electricity Bill, Property Tax Receipt</li>
													<li>Approved Plan copy (Xerox Blueprint) & Registered Development Agreement of the builder, Conveyance Deed (For New Property)</li>
													<li>Payment Receipts or bank A/C statement showing all the payments made to Builder/Seller</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} if($loan_type_id == 57){ if($occup_id == 2){
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">List of Documents for Self Employed Professionals</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>One passport size photo of applicant & co-applicant.</li>
													<li>Clear copy of PAN Card of applicant & co-applicant.</li>
													<li>Office and residence address proof.</li>
													<li>Registration of degree.</li>
													<li>Professional degree copy.</li>
													<li>Last 12 month current A/c, or CC A/c or saving A/c bank statement.</li>
													<li>Last 3 Yr complete Financial.</li>	
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} else {
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">List of Document for Proprietor</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>One Passport size photo of Applicant.</li>
													<li>Clear copy of PAN Card and Voter ID/Passport of Applicant & Co-applicant.</li>
													<li>Office and Residence Address Proof.</li>
													<li>Registration of firm.</li>
													<li>Last 6 Month Current A/c, CC A/c and Saving A/c Bank Statement.</li>
													<li>All Rent Agreement with 6 month rent credit in A/c.(if any).</li>
													<li>Last 3 year ITR with Complete Financial of Firm. (From 3cb, 3cd, Audit Report, P&L A/c, Balance Sheet, and All Annexure.</li>
													<li>All Running Loan Schedule/Sanction Latter.</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">List of Document for Partnership firm</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>One Passport size photo of Firm and All Partners.</li>
													<li>Clear copy of PAN Card and Voter ID/Passport of Firm and All Partners.</li>
													<li>Office and Residence Address Proof of Firm and All Partner.</li>
													<li>Registration of firm.</li>
													<li>Partnership Deed(All).</li>
													<li>List of Partners as on date with shareholding on latter head.</li>
													<li>Last 6 Month Current A/c, CC A/c and Saving A/c Bank Statement of Firm and All Partner.</li>
													<li>All Rent Agreement with 6 month rent credit in A/c.(if any).</li>
													<li>Last 3 year ITR with Complete Financial of Firm. (From 3cb, 3cd, Audit Report, P&L A/c, Balance Sheet, and All annexure of Firm and All Partner.</li>
													<li>All Running Loan Schedule./Sanction Latter of Firm and All Partner.</li>
													<li>Last 6 month Vat return.</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">List of Document for Pvt. Ltd.</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>One Passport size photo of Company and all Directors.</li>
													<li>Clear copy of Pan Card and Voter ID/Passport of Applicant & Co-applicant of Company and all Directors.</li>
													<li>Office and Residence Address Proof of Company and all Directors.</li>
													<li>Registration of Company.</li>
													<li>MOA.</li>
													<li>List of Directors Shareholding as on date on latter head.</li>
													<li>Last 6 Month Current A/c, CC A/c and Saving A/c Bank Statement of Company and all Directors.</li>
													<li>All Rent Agreement With 6 Month Rent Credit in A/c.(if any).</li>
													<li>Last 3 year ITR with Complete Financial of Company. (From 3cb, 3cd, Audit Report, P&L A/c, Balance Sheet, and All annexure of Company and all Directors.</li>
													<li>All Running Loan Schedule/Sanction Latter of Company and all Directors.</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">List of documents for Lendingkart</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>Business Registration Proof (GST/VAT/ TIN No.)</li>
													<li>1 Year bank statement of current account</li>
													<li>PAN Card</li>
													<li>1 Passport size photograph</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} } if($loan_type_id == 63){
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">List of Documents for Self Employed Professionals</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>One passport size photo of applicant & co-applicant.</li>
													<li>Clear copy of PAN Card of applicant & co-applicant.</li>
													<li>Office and residence address proof.</li>
													<li>Registration of degree.</li>
													<li>Professional degree copy.</li>
													<li>Last 12 month current A/c, or CC A/c or saving A/c bank statement.</li>
													<li>Last 3 Yr complete Financial.</li>	
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} if($loan_type_id == 60) {
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856"></td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>PAN card & 2 photographs.</li>
													<li>Current residence address proof (Passport copy/ Voter ID card/ Utility bill).</li>
													<li>Bank statement of 2 months.</li>
													<li>3 cancel cheques required if saving account is in different bank.</li>	
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} if($loan_type_id == 71){ if($occup_id == 1) {
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Salaried Customers</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>PAN card copy &amp; 2 photographs.</li>
													<li>Latest residence address proof (Rent Agreement/Passport Copy/ Voter ID Card/Postpaid Bill/Company letter head if company provided accommodation).</li>
													<li>Latest 3 months salary slip and bank statement.
</li>	
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		} else {
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Self Employed Customers</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>PAN card copy &amp; 2 photographs.</li>
													<li>Current residence address proof (Rent Agreement/Passport Copy/ Voter ID Card/Postpaid Bill).</li>
													<li>Current Assessment Year ITR.</li>
													<li>Latest 3 months bank statement.</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		}
		$template_body .= '<tr>
			<td colspan="2" style="padding: 10px 25px">
				<table cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr>
							<td align="center" style="font-family:Calibri, Helvetica, sans-serif; font-size: 22px; font-variant:all-petite-caps; padding:3px; padding-bottom: 6px; color:#fcfcfc;background-color:#002856">Existing Credit Card Holders</td>
						</tr>
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="middle" style="color: #002856; font-family: Calibri, Helvetica, sans-serif; font-size:15px; line-height:20px; font-weight: bold; padding:10px;letter-spacing:0.3px;">
												<ul style="background: #d6d6d6;padding: 15px;list-style: inside;margin: auto;">
													<li>PAN card copy &amp; 2 photographs.</li>
													<li>Latest residence address proof (Rent Agreement/Passport Copy/ Voter ID Card/Postpaid Bill/Company letter head if company provided accommodation).</li>
													<li>Front copy of existing credit card and latest statement of credit card.</li>
													<li>Pencil impression of existing credit card.</li>	
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>';
		}	
		$template_body .= '<tr>
        	<td colspan="3" style="line-height: 0; border-top:1px solid #d8d8d8; font-size: 0;" bgcolor="#ffffff" height="1">&nbsp;</td>
      	</tr>
      	<tr>
	       	<td colspan="3" style="line-height: 0; border-top:1px solid #d8d8d8; font-size: 0;" bgcolor="#ffffff" height="1">&nbsp;</td>
	    </tr>                    
        <tr>
           <td colspan="2">
              	<table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
	                     <td style="padding:0px 15px; ">
	                      	<table cellspacing="0" cellpadding="0">
		                         <tr>
		                            <td style="padding: 10px 15px;text-align: left;line-height: 20px">
			                            <b style="font-size: 15px;">Best Regards,</b><br>
			                            <b style="font-size: 15px;">MyLoanCare.in Team</b><br>
			                            <b style="font-size: 15px;">Advisor : </b><span>'.$user_name.'</span><br>
										<b style="font-size: 15px;">Contact No : </b><span>'.$contact_no.'</span><br>
			                         </td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- <tr>
			<td colspan="2"><img src="https://dpja4fdtwlj2f.cloudfront.net/mlc-mailer-compaign-footer.jpg" style="width:100%;display: block;" alt="MyLoanCare.in Assurance" title="MyLoanCare.in Assurance"></td>
		</tr> -->
	</table>
	<table align="center" width="100%" cellpadding="2" cellspacing="0" style="max-width: 650px; margin: 0 auto;">
        <tbody><tr>
          <td align="center" style="font-size:12px; font-family:Calibri, Helvetica, sans-serif; padding:9px; line-height:20px; color:#080808;">Please add this sender id to your address book to ensure delivery of your loan related mails to your inbox.<br>
MyLoanCare Ventures Pvt Ltd B-38, Sector - 32, Institutional Area, Gurgaon 122003 *T&C Apply<br>
         </td>
        </tr>
      </tbody></table>
</body>
</html>'; 
?>