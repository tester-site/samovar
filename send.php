<?php

	header("Content-Type: text/html; charset=utf-8");
	
	if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest") {
	
		
	
		function send_form($message) {
	
			$mail_to = "МЫЛО@МЫЛО.РУ"; /*Ваш e-mail*/
			$subject = "Заказ"; 
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: Система уведомлений <no-reply@".$_SERVER['HTTP_HOST'].">\r\n";

			mail($mail_to, $subject, $message, $headers);
		
		}

		$name = strip_tags($_POST["name"]); 
		$tel = strip_tags($_POST["tel"]); 
		$cost = strip_tags($_POST["cost"]); 
		$displ = strip_tags($_POST["displ"]); 

		

		if($tel == "") { 

			echo "Не указан телефон.";

			die();

		}

		if($name == "") { 

			$name = "Не указано Имя";
            die();

		}

		$message = <<<HTML

			<b>Имя отправителя</b>: {$name}<br>
			<b>телефон</b>: {$email}<br><br>
			<b>стоимость</b>: {$cost}<br><br>
			<b>литраж</b>: {$displ}<br><br>

        HTML;

		send_form($message); 
		
		echo "Сообщение успешно отправлено!";

	} else {

		die();

	}

?>
