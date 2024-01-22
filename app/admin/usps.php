<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>

<?php
$r_text = '';



if (isset($_POST['connect_usps'])) {
    $suite = $_POST['suite'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip5 = $_POST['zip5'];










    $request_doc_template = <<<EOT
<?xml version="1.0"?>
<AddressValidateRequest USERID="2PRVAU087C905">
	<Revision>1</Revision>
	<Address ID="0">
		<Address1>$suite</Address1>
		<Address2>$address2</Address2>
		<City>$city</City>
		<State>$state</State>
		<Zip5>$zip5</Zip5>
		<Zip4/>
	</Address>
</AddressValidateRequest>
EOT;

    // prepare xml doc for query string
    $doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
    $doc_string = urlencode($doc_string);

    $url = "http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=" . $doc_string;
    // echo $url . "\n\n";

    // perform the get
    $response = file_get_contents($url);

    $xml = simplexml_load_string($response) or die("Error: Cannot create object");
    // echo '<pre>';
    // var_dump($xml);
    // echo '</pre>';

    // print_r($xml);

    // echo "Address1: " . $xml->Address->Address1 . "\n";
    // echo "Address2: " . $xml->Address->Address2 . "\n";
    // echo "City: " . $xml->Address->City . "\n";
    // echo "State: " . $xml->Address->State . "\n";
    // echo "Zip5: " . $xml->Address->Zip5 . "\n";
    $r_address1 = $xml->Address->Address1;
    $r_address2 = $xml->Address->Address2;
    $r_city = $xml->Address->City;
    $r_state = $xml->Address->State;
    $r_zip5 = $xml->Address->Zip5;
    $r_zip4 = $xml->Address->Zip4;
    $r_business = $xml->Address->Business;
    $r_text = $xml->Address->ReturnText;
}
?>
<div id="layoutSidenav_content">
    <main>
        <div style="padding-top:20px;" class="container-fluid px-4">
            <!-- Page Heading -->
            <h1 class="text-center">USPS Address Verification</h1>
            <hr class="border border-primary border-3 opacity-75">
            <?php if ($r_text) {
                echo '<h3 style="color:red" class="text-center">' . $r_text . '</h3>';
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div div class="mb-3">
                    <label for="address2" class="form-label">Address</label>
                    <input type="text" value="<?php if (isset($r_address2)) {
                                                    echo $r_address2;
                                                }  ?>" class="form-control" name="address2">
                </div>
                <div div class="mb-3">
                    <label for="suite" class="form-label">Apt/Suite/Other</label>
                    <input type="text" value="<?php if (isset($r_address1)) {
                                                    echo $r_address1;
                                                } ?>" class="form-control" name="suite">
                </div>
                <div div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" value="<?php if (isset($r_city)) {
                                                    echo $r_city;
                                                } ?>" class="form-control" name="city">
                </div>
                <div div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" value="<?php if (isset($r_state)) {
                                                    echo $r_state;
                                                }  ?>" class="form-control" name="state">
                </div>
                <div div class="mb-3">
                    <label for="zip5" class="form-label">5 Digit Zip Code</label>
                    <input type="text" value="<?php if (isset($r_zip5)) {
                                                    echo $r_zip5;
                                                }?>" class="form-control" name="zip5">
                </div>
                <div div class="mb-3">
                    <label for="zip5" class="form-label">Extra 4 Digit Zip Code</label>
                    <input type="text" value="<?php if (isset($r_zip4)) {
                                                    echo $r_zip4;
                                                } ?>" class="form-control" name="zip5">
                </div>
                <div div class="mb-3">
                    <label for="zip5" class="form-label">Business Address Y/N</label>
                    <input type="text" value="<?php if (isset($r_business)) {
                                                    echo $r_business;
                                                } ?>" class="form-control" name="business">
                </div>
                <hr class="border border-primary border-3 opacity-75">
                <div div class="text-center mb-3">
                    <input class="btn btn-primary button_width" type="submit" name="connect_usps" value="Verify Address">
                </div>
            </form>
        </div>
    </main>
    <?php //var_dump($xml)  
    ?>
    <?php include "includes/admin_footer.php"; ?>