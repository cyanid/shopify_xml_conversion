<?php
function xml2array ( $xmlObject, $out = array () ) {
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

    return $out;
}



$input_xml = "shopify.xml"; //sisääntuleva xml-tiedosto
$output_path = "./"; //mihin hakemistoon tallennetaan output xml-tiedosto

$input = simplexml_load_file($input_xml);
$array = xml2array($input);

$output_template = file_get_contents("woocommerce_template.xml");
$output_order_line_template = file_get_contents("woocommerce_order_line_template.xml");

$output_order_lines = "";
$output_xml = $output_template;

//käsitellään tilausrivit
foreach ($array['line-items']['line-item'] as $lineItem) {
    $output_line_item = $output_order_line_template;

    $output_line_item = str_replace("%%SKU%%", $lineItem->sku, $output_line_item);
    $output_line_item = str_replace("%%ITEM_NAME%%", $lineItem->title, $output_line_item);
    $output_line_item = str_replace("%%QUANTITY%%", $lineItem->quantity, $output_line_item);
    $output_line_item = str_replace("%%PRICE%%", $lineItem->price, $output_line_item);

    $output_line_item = str_replace("%%LINE_TOTAL%%", 0, $output_line_item);
    $output_line_item = str_replace("%%PRICE_INCL_TAX%%", 0, $output_line_item);
    $output_line_item = str_replace("%%LINE_TOTAL_INCL_TAX%%", 0, $output_line_item);

    $output_order_lines .= $output_line_item;
}

//käsitellyt tilausrivit mukaan templateen
$output_xml = str_replace("%%ORDER_LINE_ITEMS%%", $output_order_lines, $output_xml);

//tilauksen perustiedot
$output_xml = str_replace("%%ORDER_ID%%", $input->id, $output_xml);
$output_xml = str_replace("%%ORDER_NUMBER%%", $input->number, $output_xml);
$output_xml = str_replace("%%ORDER_DATE%%", $input->{'created-at'}, $output_xml);
$output_xml = str_replace("%%ORDER_STATUS%%", "", $output_xml); //mikä arvo?

//laskutustiedot
$output_xml = str_replace("%%BILLING_FIRST_NAME%%", $input->{'billing-address'}->{'first-name'}, $output_xml);
$output_xml = str_replace("%%BILLING_LAST_NAME%%", $input->{'billing-address'}->{'last-name'}, $output_xml);
$output_xml = str_replace("%%BILLING_FULL_NAME%%", $input->{'billing-address'}->{'name'}, $output_xml);
$output_xml = str_replace("%%BILLING_COMPANY%%", $input->{'billing-address'}->{'company'}, $output_xml);
$output_xml = str_replace("%%BILLING_ADDRESS_1%%", $input->{'billing-address'}->{'address1'}, $output_xml);
$output_xml = str_replace("%%BILLING_ADDRESS_2%%", $input->{'billing-address'}->{'address2'}, $output_xml);
$output_xml = str_replace("%%BILLING_CITY%%", $input->{'billing-address'}->{'city'}, $output_xml);
$output_xml = str_replace("%%BILLING_STATE%%", $input->{'billing-address'}->{'province'}, $output_xml);
$output_xml = str_replace("%%BILLING_POST_CODE%%", $input->{'billing-address'}->{'zip'}, $output_xml);
$output_xml = str_replace("%%BILLING_COUNTRY%%", $input->{'billing-address'}->{'country'}, $output_xml);
$output_xml = str_replace("%%BILLING_PHONE%%", $input->{'billing-address'}->{'phone'}, $output_xml);
$output_xml = str_replace("%%BILLING_EMAIL%%", $input->{'email'}, $output_xml);

//toimitusosoite
$output_xml = str_replace("%%SHIPPING_FIRST_NAME%%", $input->{'shipping-address'}->{'first-name'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_LAST_NAME%%", $input->{'shipping-address'}->{'last-name'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_FULL_NAME%%", $input->{'shipping-address'}->{'name'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_COMPANY%%", $input->{'shipping-address'}->{'company'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_ADDRESS_1%%", $input->{'shipping-address'}->{'address1'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_ADDRESS_2%%", $input->{'shipping-address'}->{'address2'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_CITY%%", $input->{'shipping-address'}->{'city'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_STATE%%", $input->{'shipping-address'}->{'province'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_POST_CODE%%", $input->{'shipping-address'}->{'zip'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_COUNTRY%%", $input->{'shipping-address'}->{'country'}, $output_xml);

$output_xml = str_replace("%%SHIPPING_METHOD_ID%%", "", $output_xml);
$output_xml = str_replace("%%SHIPPING_METHOD%%", "fulfillment-service", $output_xml);

$output_xml = str_replace("%%PAYMENT_METHOD_ID%%", "", $output_xml);
$output_xml = str_replace("%%PAYMENT_METHOD%%", "gateway", $output_xml);

//hinta-arvot
$output_xml = str_replace("%%DISCOUNT_TOTAL%%", $input->{'total-discounts'}, $output_xml);
$output_xml = str_replace("%%SHIPPING_TOTAL%%", $input->{'shipping-lines'}->{'shipping-line'}->price, $output_xml);
$output_xml = str_replace("%%SHIPPING_TAX_TOTAL%%", "", $output_xml); //mikä arvo?
$output_xml = str_replace("%%ORDER_TOTAL%%", $input->{'total-price'}, $output_xml);
$output_xml = str_replace("%%FEE_TOTAL%%", "", $output_xml); //mikä arvo?
$output_xml = str_replace("%%TAX_TOTAL%%", $input->{'total-tax'}, $output_xml);

$output_xml = str_replace("%%COMPLETED_DATE%%", $input->{'closed-at'}, $output_xml);

$output_xml = str_replace("%%CUSTOMER_NOTE%%", $input->customer->note, $output_xml);
$output_xml = str_replace("%%CUSTOMER_ID%%", $input->customer->id, $output_xml);

//kirjoita xml-tiedosto, tiedoston nimi order_xml_<tilaus ID>.xml.
file_put_contents($output_path . "order_xml_" . (string) $input->id . ".xml", $output_xml);
