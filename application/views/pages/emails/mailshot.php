<?php

$time = date("H");

if ($time < "12") {

	$greeting = 'Good Morning';

} else{

	$greeting = 'Good Afternoon';

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.=w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mploy</title>
	<style type="text/css">
		#outlook a{
			padding:0;
		}
		body{
			width:100% !important;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		body{
			-webkit-text-size-adjust:none;
		}
		body{
			margin:0;
			padding:0;
		}
		img{
			border:0;
			height:auto;
			line-height:100%;
			outline:none;
			text-decoration:none;
		}
		table td{
			border-collapse:collapse;
		}
		#backgroundTable{
			height:100% !important;
			margin:0;
			padding:0;
			width:100% !important;
		}
		body,#backgroundTable{
			background-color:#FAFAFA;
		}
		#templateContainer{
			border:1px solid #DDDDDD;
		}
		h1,.h1{
			color:#202020;
			display:block;
			font-family:Arial;
			font-size:34px;
			font-weight:bold;
			line-height:100%;
			margin-top:0;
			margin-right:0;
			margin-bottom:10px;
			margin-left:0;
			text-align:left;
		}
		h2,.h2{
			color:#202020;
			display:block;
			font-family:Arial;
			font-size:30px;
			font-weight:bold;
			line-height:100%;
			margin-top:0;
			margin-right:0;
			margin-bottom:10px;
			margin-left:0;
			text-align:left;
		}
		h3,.h3{
			color:#202020;
			display:block;
			font-family:Arial;
			font-size:26px;
			font-weight:bold;
			line-height:100%;
			margin-top:0;
			margin-right:0;
			margin-bottom:10px;
			margin-left:0;
			text-align:left;
		}
		h4,.h4{
			color:#202020;
			display:block;
			font-family:Arial;
			font-size:22px;
			font-weight:bold;
			line-height:100%;
			margin-top:0;
			margin-right:0;
			margin-bottom:10px;
			margin-left:0;
			text-align:left;
		}
		#templatePreheader{
			background-color:#FAFAFA;
		}
		.preheaderContent div{
			color:#505050;
			font-family:Arial;
			font-size:10px;
			line-height:100%;
			text-align:left;
		}
		#templateHeader{
			background-color:#FFFFFF;
			border-bottom:0;
		}
		.headerContent{
			color:#202020;
			font-family:Arial;
			font-size:34px;
			font-weight:bold;
			line-height:100%;
			padding:0;
			text-align:center;
			vertical-align:middle;
		}
		#headerImage{
			height:auto;
			max-width:600px !important;
		}
		#templateContainer,.bodyContent{
			background-color:#FFFFFF;
		}
		.bodyContent div{
			color:#505050;
			font-family:Arial;
			font-size:14px;
			line-height:150%;
			text-align:left;
		}
		.bodyContent img{
			display:inline;
			height:auto;
		}
		#templateFooter{
			background-color:#FFFFFF;
			border-top:0;
		}
		.footerContent div{
			color:#707070;
			font-family:Arial;
			font-size:12px;
			line-height:125%;
			text-align:left;
		}
		.footerContent img{
			display:inline;
		}
		#social{
			background-color:#FAFAFA;
			border:0;
		}
		#social div{
			text-align:center;
		}
		#utility{
			background-color:#FFFFFF;
			border:0;
		}
		#utility div{
			text-align:center;
		}
		#monkeyRewards img{
			max-width:190px;
		}
		li{
			list-style-type: none;
			margin-bottom: 15px;
		}
		li span{
			color: #46a300;
			font-weight: bold;
		}
		.colortext{
			color: #e87d1e;
			font-size: 24px;
		}
		.colourtextsmall{
			color: #e87d1e;
			font-size: 16px;
		}
		a{
			color: #888888;
			font-weight:normal;
			text-decoration:underline;
		}

		a:hover{
			color: #000000;
		}
		button a{
			color:white;

		}
		.yes{


			background-color: #4CAF50; /* Green */
			border: none;
			color: white !important;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;

		}
		.no {
			background-color: #f44336; /* red */
			border: none;
			color: #fff !important;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
	</style></head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="-webkit-text-size-adjust: none;margin: 0;padding: 0;background-color: #FAFAFA;width: 100% !important; padding-bottom: 50px;">
<center>
	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable" style="margin: 0;padding: 0;background-color: #FAFAFA;height: 100% !important;width: 100% !important;">
		<tr>
			<td align="center" valign="top" style="border-collapse: collapse;">
				<!-- // Begin Template Preheader \\ -->
				<table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader" style="background-color: #FAFAFA;">
					<tr>
						<td valign="top" class="preheaderContent" style="border-collapse: collapse;">
							<!-- // Begin Module: Standard Preheader -->
							<table border="0" cellpadding="10" cellspacing="0" width="100%">
								<tr>
									<td valign="top" style="border-collapse: collapse;">
										<div style="color: #505050;font-family: Arial;font-size: 10px;line-height: 100%;text-align: left;">Email notification from Mploy</div>
									</td>
									<td valign="top" width="190" style="border-collapse: collapse;">
										<!--<div style="color: #505050;font-family: Arial;font-size: 10px;line-height: 100%;text-align: left;">
                                            Is this email not displaying correctly?<br><a href="http://us1.campaign-archive2.com/?u=3D2a0df7a67=
b6d023fbcffbd0f7&amp;id=3Da062f54e1a&amp;e=3D" target="_blank" style="color: #336699;font-weight: normal;text-decoration: underline;">View it in your browser</a>.
                                        </div>-->
									</td>
								</tr>
							</table>
							<!-- // End Module: Standard Preheader \ -->
						</td>
					</tr>
				</table>
				<!-- // End Template Preheader \\ -->
				<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer" style="border: 1px solid #DDDDDD;background-color: #FFFFFF;">
					<tr>
						<td align="center" valign="top" style="border-collapse: collapse;">
							<!-- // Begin Template Header \\ -->
							<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader" style="background-color: #FFFFFF;border-bottom: 0;">
								<tr>
									<td class="headerContent" style="border-collapse: collapse;color: #202020;font-family: Arial;font-size: 34px;font-weight: bold;line-height: 100%;padding: 0;text-align: center;vertical-align: middle;">
										<!-- // Begin Module: Standard Header Image \\ -->
										<div style="text-align: left; background-color: #e87d1e; height: 70px;"><img src="<?php echo base_url()?>assets/images/logo_white.png" style="height:55px; margin: 8px;"></div>
										<!-- // End Module: Standard Header Image \\ -->

									</td>
								</tr>
							</table>
							<!-- // End Template Header \\ -->
						</td>
					</tr>
					<tr>
						<td align="center" valign="top" style="border-collapse: collapse;">
							<!-- // Begin Template Body \\ -->
							<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
								<tr>
									<td valign="top" class="bodyContent" style="border-collapse: collapse;background-color: #FFFFFF;">

										<!-- // Begin Module: Standard Content \\ -->
										<table border="0" cellpadding="20" cellspacing="0" width="100%">
											<tr>
												<td valign="top" style="border-collapse: collapse;">
												<div style="color: #505050;font-family: Arial;font-size: 14px;line-height: 150%;text-align: left;">

													<p><?php echo $greeting;?>,</p>

													<p>Mploy Solutions work with schools, colleges and other providers across the UK, coordinating Work Related Learning Programmes.</p>
													<p>We are currently working on behalf of <?php echo($name); ?> organising their Work Experience and I am emailing to see if you would consider offering any placements for the following dates:
													</p>
													<p> <strong> <?php echo date("d/m/Y", strtotime($campaign_place_start_date)) ." - ". date("d/m/Y", strtotime($campaign_place_end_date)); ?></strong></p>
													<p>Placements are a great opportunity for learners to gain an insight into the world of work, which is pivotal to their overall learning experience providing them with invaluable knowledge when considering their future career path.
													</p>


													<p>Work experience enables businesses to share important knowledge and expertise, nurture future talent and have a positive impact on local communities.
													</p>
													<p>Any placements you can offer will be matched to learners who have shown an interest in your industry/sector, with you also having the opportunity to meet them prior to starting,
													</p>
													<p>To register your interest, offer any opportunities or to simply find out more, please click the ‘Yes’ button below and a member of the Work Experience Team will be in touch shortly.</p>


													<button class="yes"><a href="<?php echo base_url()?>wex/reply?key=<?php echo $key; ?>&response=1">Yes</a></button>
													<button class="no"><a href="<?php echo base_url()?>wex/reply?key=<?php echo $key; ?>&response=4">No</a></button>
													<p>May I take this opportunity to thank you for considering work experience and we look forward to hearing from you soon.
													</p>

													<p>Kind regards</p>
													<p><?php echo $first_name?> </p>
													<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
														<tbody>
														<tr>
															<td style="padding:0cm 0cm 0cm 0cm">
																<p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#707074;mso-fareast-language:EN-GB"><o:p>&nbsp;</o:p></span></p>
																<p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#707074;mso-fareast-language:EN-GB">MPLOY Solutions Ltd<br>
9 Dalby Court, Gadbrook Park, Northwich, CW9 7TN<br>
Company Registration No 079696001<o:p></o:p></span></p>
																<p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#707074;mso-fareast-language:EN-GB"><o:p>&nbsp;</o:p></span></p>
																<p class="MsoNormal"><b><span style="mso-fareast-language:EN-GB"><a href="https://www.mploysolutions.com/privacy.php">See our revised Privacy Notices HERE</a><o:p></o:p></span></b></p>
																<p class="MsoNormal"><b><i><span style="font-size:12.0pt;color:#F79646;mso-fareast-language:EN-GB"><o:p>&nbsp;</o:p></span></i></b></p>
																<p class="MsoNormal"><b><i><span style="font-size:12.0pt;color:#F79646;mso-fareast-language:EN-GB">We can source the ‘right’ apprenticeship candidates for YOUR BUSINESS. Call: 01606 828382 Email:</span></i></b><u><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;color:blue;mso-fareast-language:EN-GB">
<a href="mailto:info@mployyouth.co.uk"><b><i><span style="font-family:&quot;Calibri&quot;,sans-serif">info@mployyouth.co.uk</span></i></b></a></span></u><i><span style="font-size:12.0pt;color:red;mso-fareast-language:EN-GB"><o:p></o:p></span></i></p>
																<p class="MsoNormal"><i><span style="font-size:12.0pt;color:red;mso-fareast-language:EN-GB"><o:p>&nbsp;</o:p></span></i></p>
																<p class="MsoNormal"><b><i><span style="font-size:12.0pt;color:#F79646;mso-fareast-language:EN-GB">Are you looking for an apprentice? We can SUPPORT YOU through the recruitment process. Call: 01606 828382<o:p></o:p></span></i></b></p>
																<p class="MsoNormal" align="center" style="text-align:center"><b><i><span style="font-size:12.0pt;color:#F79646;mso-fareast-language:EN-GB"><o:p>&nbsp;</o:p></span></i></b></p>
																<p class="MsoNormal"><b><i><span style="font-size:12.0pt;color:#F79646;mso-fareast-language:EN-GB">Work Experience &amp; Enterprise – Help young people DEVELOP THEIR SKILLS. Call: 01606 42823 Email:
</span></i></b><b><i><span style="font-size:12.0pt;color:red;mso-fareast-language:EN-GB"><a href="mailto:sales@mploysolutions.co.uk">sales@mploysolutions.co.uk</a></span></i></b><span style="font-size:9.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#707074;mso-fareast-language:EN-GB"><o:p></o:p></span></p>
															</td>
															<td width="57" style="width:42.75pt;padding:0cm 0cm 0cm 0cm"></td>
															<td width="42" style="width:31.5pt;padding:0cm 0cm 0cm 0cm">
															</td>
															<td width="43" style="width:32.25pt;padding:0cm 0cm 0cm 0cm">
															</td>
														</tr>
														</tbody>
													</table>
												</div>
												</td>
											</tr>
										</table>
										<!-- // End Module: Standard Content \\ -->

									</td>
								</tr>
							</table>
							<!-- // End Template Body \\ -->
						</td>
					</tr>
					<tr>
						<td align="center" valign="top" style="border-collapse: collapse;">
							<!-- // Begin Template Footer \\ -->
							<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter" style="background-color: #FFFFFF;border-top: 0;">
								<tr>
									<td valign="top" class="footerContent" style="border-collapse: collapse;">

										<!-- // Begin Module: Standard Footer \\ -->
										<table border="0" cellpadding="10" cellspacing="0" width="100%">
											<tr>
												<td colspan="2" valign="middle" id="social" style="border-collapse: collapse;background-color: #FAFAFA;border: 0;">
													<!--<div style="color: #707070;font-family: Arial;font-size: 12px;line-height: 125%;text-align: center;">&nbsp;<a href="http://www.bridgingloans.uk.net/policies/privacy-policy/">privacy policy</a>&nbsp;| <a href="http://www.bridgingloans.uk.net/policies/terms-and-conditions/">terms &amp; conditions</a>&nbsp; </div>-->
												</td>
											</tr>
										</table>
										<!-- // End Module: Standard Footer \\ -->

									</td>
								</tr>
							</table>
							<!-- // End Template Footer \\ -->
						</td>
					</tr>
				</table>
				<br>
			</td>
		</tr>
	</table>
</center>
<center>
	<br>
	<br>
</center></body>

</html>
