<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name == "" OR $email == "" OR $message == "") {
        echo "You must specify all your name, e-mail and message";
        exit;
    }

    foreach( $_POST as $value) {
        if(stripos($value, 'Content-Type:') !== FALSE){
            echo "There was a problem with the information you entered.";
            exit;
        }
    }
    // Checking for spam bots and stopping the process if found
    if ($_POST["address"] != "") {
        echo "Your form submission has an error";
        exit;
    }

    require_once("includes/phpmailer/class.phpmailer.php")
    $email_body = "";
    $email_body = $email_body . "Name: " . $name . "\n";
    $email_body = $email_body . "E-mail: " . $email . "\n";
    $email_body = $email_body . "Message: " . $message;


    header("Location: contact.php?status=thanks");
    exit;
}

$pageTitle = "Contact Mike";
$section = "contact";
include("includes/header.php");?>

    <div class="section page">

        <div class="wrapper">

            <h1>Contact</h1>

            <?php if (isset($_GET["status"]) AND ($_GET["status"] == "thanks")) {
                ?><p>Thanks for the E-mail..! I&rsquo;ll be in touch ASAP.</p>

            <?php } else { ?>

                <p>I&rsquo;d love to hear from you! Complete the form to send me an email</p>

                <form method="post" action="contact.php">

                    <table>
                        <tr>
                            <th>
                                <label for="name">Name</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="email">E-Mail</label>
                            </th>
                            <td>
                                <input type="text" name="email" id="email">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="message">Message</label>
                            </th>
                            <td>
                                <textarea name="message" id="message"></textarea>
                            </td>
                        </tr>
                        //Checking for spam bots
                        <tr style="display: none;">
                            <th>
                                <label for="address">Address</label>
                            </th>
                            <td>
                                <input type="text" name="address" id="address">
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Send">

                </form>
    <?php } ?>

        </div>

    </div>

<?php include('includes/footer.php'); ?>