<?php 




// 获取内容的第一张图片
function getImgs($content,$order='ALL'){
	$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
	preg_match_all($pattern,$content,$match);
	if(isset($match[1])&&!empty($match[1])){
		if($order==='ALL'){
			return $match[1];
		}
		if(is_numeric($order)&&isset($match[1][$order])){
			return $match[1][$order];
		}
	}
	return '';
}
	/**
 * 邮件发送函数
 */
   function send_mail($to, $name, $subject = '', $body = '', $attachment = null, $config = ''){
		$config = is_array($config) ? $config : C('SYSTEM_EMAIL');//这个是配置在conmmon下的config里面的配置
		Vendor('PHPMailer.PHPMailerAutoload');
		//在这个路径下有个php发送邮件的api，如果框架没有可以去下载一个
		$mail = new PHPMailer(); //PHPMailer对象

		$mail->CharSet = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
		$mail->IsSMTP(); // 设定使用SMTP服务
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0; // 关闭SMTP调试功能 1 = errors and messages2 = messages only
		$mail->SMTPAuth = true; // 启用 SMTP 验证功能
		if ($config['SMTP_PORT'] == 465)
		$mail->SMTPSecure = 'ssl'; // 使用安全协议
		$mail->Host = $config['SMTP_HOST']; // SMTP 服务器
		$mail->Port = $config['SMTP_PORT']; // SMTP服务器的端口号
		$mail->Username = $config['SMTP_USER']; // SMTP服务器用户名
		$mail->Password = $config['SMTP_PASS']; // SMTP服务器密码
		$mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
		$replyEmail = $config['REPLY_EMAIL'] ? $config['REPLY_EMAIL'] : $config['REPLY_EMAIL'];
		$replyName = $config['REPLY_NAME'] ? $config['REPLY_NAME'] : $config['REPLY_NAME'];
		$mail->AddReplyTo($replyEmail, $replyName);
		$mail->Subject = $subject;
		$mail->MsgHTML($body);
		$mail->AddAddress($to, $name);
		if (is_array($attachment)) { // 添加附件
		foreach ($attachment as $file) {
		if (is_array($file)) {
		is_file($file['path']) && $mail->AddAttachment($file['path'], $file['name']);
		} else {
		is_file($file) && $mail->AddAttachment($file);
		}
		}
		} else {
		is_file($attachment) && $mail->AddAttachment($attachment);
		}
		$result = $mail->Send();
		return $result ? true : $mail->ErrorInfo;
		}


		/**
 * 邮件发送函数
 */
    function sendMail($sendTo, $title, $content) {
        \vendor('PHPMailer.PHPMailerAutoload'); //使用thinkPHP引入第三方库
        $mail = new \PHPMailer();
        $mail->isSMTP(); //设置使用smtp协议发送邮件
        $mail->Host = \C('MAIL_HOST'); //设置smtp服务器
        $mail->SMTPAuth = \C('MAIL_SMTPAUTH'); //设置是否启用smtp认证
        if (\C('MAIL_SMTPAUTH')) {
            $mail->SMTPSecure = \C('MAIL_SECURE'); //设置加密方式
            $mail->Port = \C('SMTP_PORT'); //设置端口
            $mail->Username = \C('MAIL_USERNAME'); //设置登录用户名
            $mail->Password = \C('MAIL_PASSWORD'); //设置登录密码
        }
        $mail->From = \C('MAIL_FROM'); //设置发送人地址
        $mail->FromName = \C('MAIL_FROMNAME'); //设置发件人名称
        $mail->addAddress($sendTo); //设置收件人
        $mail->isHTML(\C('MAIL_ISHTML')); //设置是否使用html格式
        $mail->CharSet = \C('MAIL_CHARSET'); //设置字符编码
        $mail->Subject = $title; //设置标题
        $mail->Body = $content; //设置正文
//        print_r($mail);
        return $mail->send(); //发送
    }
   
 ?>