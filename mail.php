<?php
// Configuration
// ============================================================
// Take this token from slack's webhook integration settings
$slack_token = "dBIjSkUALhMMgrx0TzfmNmis";
// The slack user who wrote the post (comes from Slack)
$slack_user = $_POST["user_name"];
// The text of the posted message (comes from Slack)
$slack_msg = $_POST["text"];
// Recipient of the emails
$to = "sumeetsharma@tk20.com";
// From-header in the emails
$from = $slack_user." via Slack r--d-group.slack.com";
// Reply-to address in the emails
$reply_to = $from;
// Subject of the emails
$subject = "@".$slack_user." wrote";
// ============================================================
// Setting up headers
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=utf8";
$headers[] = "From: ".$from;
$headers[] = "Reply-To: ".$reply_to;
$headers[] = "X-Mailer: PHP/".phpversion();
// Send!
if ($_POST["token"] == $slack_token)
{
	if (!mail($to, $subject, $slack_msg, implode("\r\n", $headers)))
	{
		echo "failed to send!";
	}
}
?>
