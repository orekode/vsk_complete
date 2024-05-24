<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    // public $link_endpoint = 'http://localhost/rapids/backend';
    public $link_endpoint = 'https://vskuul.com';
    // public $frontend_endpoint = 'http://localhost:5173';
    // public $frontend_endpoint = 'http://localhost/rapids';
    public $frontend_endpoint = 'https://vskuul.com';
    public $image_endpoint = '';
    public $video_endpoint = '';
    public $docs_endpoint = '';

    public function __construct()
    {
        // parent::__construct();
        $this->image_endpoint = "{$this->link_endpoint}/school/images";
        $this->video_endpoint = "{$this->link_endpoint}/school/videos";
        $this->docs_endpoint = "{$this->link_endpoint}/school/documents";
    }

    public function sendEmail($recipient = 'adedavid.tech@gmail.com', $title = 'Hi buddy', $content = 'test me', $link = null, $buttonValue = null)
    {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // 0 for no debugging, 2 for detailed debugging
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'pedwuma@gmail.com'; // Your SMTP username
            $mail->Password = 'owiosxbkvgkmuykv'; // Your SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587; // TCP port to connect to

            // Sender info
            $mail->setFrom('vskuul@gmail.com', 'VSKUUL');

            // Recipient
            $mail->addAddress($recipient);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $title;

            // HTML content with basic styling
            $htmlContent = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }
                    .email-container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #f4f4f4;
                        text-align: center;
                    }
                    .title {
                        font-size: 24px;
                        font-weight: bold;
                        color: #333;
                    }
                    .content {
                        margin-top: 20px;
                        font-size: 16px;
                        color: #666;
                    }
                    .button {
                        margin-top: 20px;
                        text-align: center;
                    }
                    .button a {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #fff;
                        text-decoration: none;
                        border-radius: 5px;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <h1 class='title'>$title</h1>
                    <p class='content'>$content</p>
            ";

            if ($link && $buttonValue) {
                $htmlContent .= "<div class='button'><a href='$link'>$buttonValue</a></div>";
            }

            $htmlContent .= '
                </div>
            </body>
            </html>
            ';

            $mail->Body = $htmlContent;

            // Send the email
            $mail->send();

            return true;
        } catch (MailerException $e) {
            return false;
        }
    }
}