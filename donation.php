<?php
if(empty($_POST)) {
    echo 'Error';
} else  {
    $url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=bhsasb@berkeley.net&item_name=Donation%20to%20the%20Berkeley%20High%20Jacket%20newspaper&currency_code=USD&amount=';
    $data = file_get_contents('donations.json');
    $data = json_decode($data, true);

    print_r($data);
    print_r($_POST);

    date_default_timezone_set('America/Los_Angeles');

    $data[] = array(
        'amount' => strip_tags($_POST['amount']),
        'date' => date('F j, Y g:i A'),
        'ip' => $_SERVER['REMOTE_ADDR'],
        'page' => strip_tags($_POST['page']),
    );

    $data = json_encode($data);
    file_put_contents('donations.json', $data);

    if($_POST['amount'] == 'Other') {
        header('Location: ' . $url);
    } else {
        header('Location: ' . $url . $_POST['amount']);
    }

}