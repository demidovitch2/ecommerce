<?php 

namespace util;

use Rain\Tpl;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * 
 */
class Mailer 
{

	const USERNAME = "hardevit2@gmail.com";
	const PASSWORD = "Substanci@11";
	const NAMEFROM = "Suporte HarDevIT";

	private $mail;
	
	public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
	{

		$config = array(
		    'base_url'      => null,
		    'checksum' 		=> array(),
		    'tpl_dir'       => $_SERVER['DOCUMENT_ROOT']."/views/admin/email/",
		    'cache_dir'     => $_SERVER['DOCUMENT_ROOT'].'/views-cache/',
		    'tpl_ext' 		=> 'html',
		    'debug'         => false
		);

		Tpl::configure( $config );


		$tpl = new Tpl();

	foreach ($data as $key => $value) {
		$tpl->assign($key, $value);
	}

	$html = $tpl->draw($tplName, true);
		
		$this ->mail = new PHPMailer(true);

		$this ->mail ->isSMTP();

		$this ->mail ->SMTPDebug = 0;

		$this ->mail ->Debugoutput = 'html';

		$this ->mail ->Host = 'smtp.gmail.com';

		$this ->mail ->port = 587;

		$this->mail->SMTPOptions = array(
	    	'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
	   		)
		);

		$this ->mail -> SMTPSecure = 'tls';

		$this ->mail  -> SMTPAuth = true;

		$this ->mail  -> Username = Mailer::USERNAME;

		$this ->mail  -> Password =Mailer::PASSWORD;

		$this ->mail -> SetFrom(Mailer::USERNAME, Mailer::NAMEFROM);

		$this ->mail  -> addAddress($toAddress, $toName);

		$this ->mail  -> Subject = $subject;

		$this ->mail  -> msgHTML($html);

		$this ->mail  -> AltBody = 'This is a plain-text message body';

	}

	public function send(){
		return $this->mail ->send();
		}
}