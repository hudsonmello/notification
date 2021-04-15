<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

    private $mail = \stdClass::class;

    /**
     * metodo responsavel por setar os parametros de configuração do e-mail
     */
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'localhost';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'hudsonmello03@gmail.com';                     //SMTP username
        $this->mail->Password   = 'Meusenhor.2';                               //SMTP password
        $this->mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom('hudsonmello03@gmail.com', 'Equipe DEV');
    }

    /**
     * metodo responsavel por configração parametros como assunto, destinario, remetente, e etc
     *
     * @return void
     */
    public function sendMail($subject, $body, $replayEMail, $replayName, $addressEmail, $addressName)
    {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replayEMail, $replayName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (\Exception $exception) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$exception->getMessage()}";
        }
    }
}
