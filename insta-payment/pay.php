<?php 


$USD_inr_price =65;

$product_name = $_POST["product_name"];
$price = ($_POST["product_price"]*$USD_inr_price) + 3;
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];


include 'src/instamojo.php';

$api = new Instamojo\Instamojo('207d075aed461d596f38701c3ada953b', '48f3995440837cef36e043d91aefb950','https://www.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://www.photonion.in/insta_payment/thankyou.php",
        "webhook" => "https://www.photonion.in/insta_payment/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>
