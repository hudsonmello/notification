<?php

require __DIR__.'/lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendMail(
    "Assunto de teste",
    "<p>Esse é um e-mail de <b>teste do body</b></p>",
    "hudsonmello03@gmail.com",
    "Hudson Mello",
    "hudsonmello03@gmail.com",
    "Hudson da Silva"
);


var_dump($novoEmail);