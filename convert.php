<?php

function xml2array ( $xmlObject, $out = array () ) {
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

    return $out;
}

$input_xml = "shopify.xml";
$output_path = ".";

$input = simplexml_load_file($input_xml);
$array = xml2array($input);


$output_template = file_get_contents("woocommerce_template.xml");
$output_order_line_template = file_get_contents("woocommerce_order_line_template.xml");

$output_order_lines = "";

var_dump($array);


foreach ($array['line-items']['line-item'] as $lineItem) {
    var_dump($lineItem);

    $output_line_item = $output_order_line_template;

    $output_line_item = str_replace("%%SKU%%", $lineItem->sku, $output_line_item);
    

        /*
        object(SimpleXMLElement)#30 (22) {
        ["id"]=>
        string(10) "2293741187"
    ["variant-id"]=>
        string(10) "6287163587"
    ["title"]=>
        string(17) "Texas Ranger 6.6%"
    ["quantity"]=>
        string(1) "3"
    ["price"]=>
        string(4) "5.02"
    ["grams"]=>
        string(3) "500"
    ["sku"]=>
        string(8) "AR320001"
    ["variant-title"]=>
        object(SimpleXMLElement)#57 (0) {
        }
["vendor"]=>
        string(9) "Mikkeller"
["fulfillment-service"]=>
        string(6) "manual"
["product-id"]=>
        string(10) "2192149379"
["requires-shipping"]=>
        string(4) "true"
["taxable"]=>
        string(4) "true"
["gift-card"]=>
        string(5) "false"
["name"]=>
        string(17) "Texas Ranger 6.6%"
["variant-inventory-management"]=>
        object(SimpleXMLElement)#58 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["properties"]=>
        object(SimpleXMLElement)#59 (1) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
        }
        ["product-exists"]=>
        string(4) "true"
["fulfillable-quantity"]=>
        string(1) "3"
["total-discount"]=>
        string(4) "0.00"
["fulfillment-status"]=>
        object(SimpleXMLElement)#60 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["tax-lines"]=>
        object(SimpleXMLElement)#61 (2) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
          ["tax-line"]=>
          object(SimpleXMLElement)#62 (3) {
          ["title"]=>
            string(3) "VAT"
["price"]=>
            string(4) "3.61"
["rate"]=>
            string(4) "0.24"
          }
        }
      }*/
}


/*
array(58) {
    ["id"]=>
  string(10) "1202776003"
    ["email"]=>
  string(17) "sami@wannabes.net"
    ["closed-at"]=>
  array(1) {
        ["@attributes"]=>
    array(2) {
            ["type"]=>
      string(8) "dateTime"
            ["nil"]=>
      string(4) "true"
    }
  }
  ["created-at"]=>
  string(25) "2015-09-09T10:20:28+03:00"
    ["updated-at"]=>
  string(25) "2015-09-09T10:20:28+03:00"
    ["number"]=>
  string(1) "6"
    ["note"]=>
  array(0) {
    }
  ["token"]=>
  string(32) "47e96448b0f759fa467b6bb49e66edcc"
    ["gateway"]=>
  string(5) "bogus"
    ["test"]=>
  string(4) "true"
    ["total-price"]=>
  string(6) "122.00"
    ["subtotal-price"]=>
  string(5) "82.26"
    ["total-weight"]=>
  string(4) "6000"
    ["total-tax"]=>
  string(5) "19.74"
    ["taxes-included"]=>
  string(5) "false"
    ["currency"]=>
  string(3) "EUR"
    ["financial-status"]=>
  string(10) "authorized"
    ["confirmed"]=>
  string(4) "true"
    ["total-discounts"]=>
  string(4) "0.00"
    ["total-line-items-price"]=>
  string(5) "82.26"
    ["cart-token"]=>
  string(32) "063b7bf797788d7ec4802f9f1f47abef"
    ["buyer-accepts-marketing"]=>
  string(4) "true"
    ["name"]=>
  string(11) "HOP1006BEER"
    ["referring-site"]=>
  array(0) {
    }
  ["landing-site"]=>
  string(1) "/"
    ["cancelled-at"]=>
  array(1) {
        ["@attributes"]=>
    array(2) {
            ["type"]=>
      string(8) "dateTime"
            ["nil"]=>
      string(4) "true"
    }
  }
  ["cancel-reason"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["nil"]=>
      string(4) "true"
    }
  }
  ["total-price-usd"]=>
  string(6) "136.72"
    ["checkout-token"]=>
  string(32) "f4cf9b8850f72f35ed4d88298488536d"
    ["reference"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["nil"]=>
      string(4) "true"
    }
  }
  ["user-id"]=>
  array(1) {
        ["@attributes"]=>
    array(2) {
            ["type"]=>
      string(7) "integer"
            ["nil"]=>
      string(4) "true"
    }
  }
  ["location-id"]=>
  array(1) {
        ["@attributes"]=>
    array(2) {
            ["type"]=>
      string(7) "integer"
            ["nil"]=>
      string(4) "true"
    }
  }
  ["source-identifier"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["nil"]=>
      string(4) "true"
    }
  }
  ["source-url"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["nil"]=>
      string(4) "true"
    }
  }
  ["processed-at"]=>
  string(25) "2015-09-09T10:20:28+03:00"
    ["device-id"]=>
  array(1) {
        ["@attributes"]=>
    array(2) {
            ["type"]=>
      string(7) "integer"
            ["nil"]=>
      string(4) "true"
    }
  }
  ["browser-ip"]=>
  string(15) "188.238.117.153"
    ["landing-site-ref"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["nil"]=>
      string(4) "true"
    }
  }
  ["order-number"]=>
  string(4) "1006"
    ["discount-codes"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["type"]=>
      string(5) "array"
    }
  }
  ["note-attributes"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["type"]=>
      string(5) "array"
    }
  }
  ["payment-gateway-names"]=>
  array(2) {
        ["@attributes"]=>
    array(1) {
            ["type"]=>
      string(5) "array"
    }
    ["payment-gateway-name"]=>
    array(2) {
            [0]=>
      string(7) "paymill"
            [1]=>
      string(5) "bogus"
    }
  }
  ["processing-method"]=>
  string(6) "direct"
    ["source"]=>
  string(13) "checkout_next"
    ["checkout-id"]=>
  string(10) "2265422915"
    ["source-name"]=>
  string(3) "web"
    ["fulfillment-status"]=>
  array(1) {
        ["@attributes"]=>
    array(1) {
            ["nil"]=>
      string(4) "true"
    }
  }
  ["tax-lines"]=>
  array(2) {
        ["@attributes"]=>
    array(1) {
            ["type"]=>
      string(5) "array"
    }
    ["tax-line"]=>
    array(3) {
            ["title"]=>
      string(3) "VAT"
            ["price"]=>
      string(5) "19.74"
            ["rate"]=>
      string(4) "0.24"
    }
  }
  ["tags"]=>
  array(0) {
    }
  ["line-items"]=>
  array(2) {
        ["@attributes"]=>
    array(1) {
            ["type"]=>
      string(5) "array"
    }
    ["line-item"]=>
    array(5) {
            [0]=>
      object(SimpleXMLElement)#30 (22) {
      ["id"]=>
        string(10) "2293741187"
            ["variant-id"]=>
        string(10) "6287163587"
            ["title"]=>
        string(17) "Texas Ranger 6.6%"
            ["quantity"]=>
        string(1) "3"
            ["price"]=>
        string(4) "5.02"
            ["grams"]=>
        string(3) "500"
            ["sku"]=>
        string(8) "AR320001"
            ["variant-title"]=>
        object(SimpleXMLElement)#57 (0) {
        }
        ["vendor"]=>
        string(9) "Mikkeller"
        ["fulfillment-service"]=>
        string(6) "manual"
        ["product-id"]=>
        string(10) "2192149379"
        ["requires-shipping"]=>
        string(4) "true"
        ["taxable"]=>
        string(4) "true"
        ["gift-card"]=>
        string(5) "false"
        ["name"]=>
        string(17) "Texas Ranger 6.6%"
        ["variant-inventory-management"]=>
        object(SimpleXMLElement)#58 (1) {
        ["@attributes"]=>
          array(1) {
            ["nil"]=>
            string(4) "true"
          }
        }
        ["properties"]=>
        object(SimpleXMLElement)#59 (1) {
        ["@attributes"]=>
          array(1) {
        ["type"]=>
            string(5) "array"
          }
        }
        ["product-exists"]=>
        string(4) "true"
["fulfillable-quantity"]=>
        string(1) "3"
["total-discount"]=>
        string(4) "0.00"
["fulfillment-status"]=>
        object(SimpleXMLElement)#60 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["tax-lines"]=>
        object(SimpleXMLElement)#61 (2) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
          ["tax-line"]=>
          object(SimpleXMLElement)#62 (3) {
          ["title"]=>
            string(3) "VAT"
["price"]=>
            string(4) "3.61"
["rate"]=>
            string(4) "0.24"
          }
        }
      }
      [1]=>
      object(SimpleXMLElement)#31 (22) {
      ["id"]=>
        string(10) "2293741251"
["variant-id"]=>
        string(10) "6287170947"
["title"]=>
        string(16) "Ola Dubh 16 8.0%"
["quantity"]=>
        string(1) "3"
["price"]=>
        string(4) "6.54"
["grams"]=>
        string(3) "500"
["sku"]=>
        string(8) "AR320202"
["variant-title"]=>
        object(SimpleXMLElement)#61 (0) {
        }
        ["vendor"]=>
        string(11) "Harviestoun"
["fulfillment-service"]=>
        string(6) "manual"
["product-id"]=>
        string(10) "2192153539"
["requires-shipping"]=>
        string(4) "true"
["taxable"]=>
        string(4) "true"
["gift-card"]=>
        string(5) "false"
["name"]=>
        string(16) "Ola Dubh 16 8.0%"
["variant-inventory-management"]=>
        object(SimpleXMLElement)#60 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["properties"]=>
        object(SimpleXMLElement)#59 (1) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
        }
        ["product-exists"]=>
        string(4) "true"
["fulfillable-quantity"]=>
        string(1) "3"
["total-discount"]=>
        string(4) "0.00"
["fulfillment-status"]=>
        object(SimpleXMLElement)#58 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["tax-lines"]=>
        object(SimpleXMLElement)#57 (2) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
          ["tax-line"]=>
          object(SimpleXMLElement)#62 (3) {
          ["title"]=>
            string(3) "VAT"
["price"]=>
            string(4) "4.71"
["rate"]=>
            string(4) "0.24"
          }
        }
      }
      [2]=>
      object(SimpleXMLElement)#32 (22) {
      ["id"]=>
        string(10) "2293741315"
["variant-id"]=>
        string(10) "6287169859"
["title"]=>
        string(32) "Dangerously Close To Stupid 9.3%"
["quantity"]=>
        string(1) "3"
["price"]=>
        string(4) "5.18"
["grams"]=>
        string(3) "500"
["sku"]=>
        string(8) "AR320255"
["variant-title"]=>
        object(SimpleXMLElement)#57 (0) {
        }
        ["vendor"]=>
        string(6) "TO ÃL"
["fulfillment-service"]=>
        string(6) "manual"
["product-id"]=>
        string(10) "2192152451"
["requires-shipping"]=>
        string(4) "true"
["taxable"]=>
        string(4) "true"
["gift-card"]=>
        string(5) "false"
["name"]=>
        string(32) "Dangerously Close To Stupid 9.3%"
["variant-inventory-management"]=>
        object(SimpleXMLElement)#58 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["properties"]=>
        object(SimpleXMLElement)#59 (1) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
        }
        ["product-exists"]=>
        string(4) "true"
["fulfillable-quantity"]=>
        string(1) "3"
["total-discount"]=>
        string(4) "0.00"
["fulfillment-status"]=>
        object(SimpleXMLElement)#60 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["tax-lines"]=>
        object(SimpleXMLElement)#61 (2) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
          ["tax-line"]=>
          object(SimpleXMLElement)#62 (3) {
          ["title"]=>
            string(3) "VAT"
["price"]=>
            string(4) "3.73"
["rate"]=>
            string(4) "0.24"
          }
        }
      }
      [3]=>
      object(SimpleXMLElement)#33 (22) {
      ["id"]=>
        string(10) "2293741379"
["variant-id"]=>
        string(10) "6287164291"
["title"]=>
        string(21) "SfÃ¤Ã¤r Pale Ale 5.5%"
["quantity"]=>
        string(1) "3"
["price"]=>
        string(4) "4.42"
["grams"]=>
        string(3) "500"
["sku"]=>
        string(8) "AR320033"
["variant-title"]=>
        object(SimpleXMLElement)#61 (0) {
        }
        ["vendor"]=>
        string(9) "Mikkeller"
["fulfillment-service"]=>
        string(6) "manual"
["product-id"]=>
        string(10) "2192150083"
["requires-shipping"]=>
        string(4) "true"
["taxable"]=>
        string(4) "true"
["gift-card"]=>
        string(5) "false"
["name"]=>
        string(21) "SfÃ¤Ã¤r Pale Ale 5.5%"
["variant-inventory-management"]=>
        object(SimpleXMLElement)#60 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["properties"]=>
        object(SimpleXMLElement)#59 (1) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
        }
        ["product-exists"]=>
        string(4) "true"
["fulfillable-quantity"]=>
        string(1) "3"
["total-discount"]=>
        string(4) "0.00"
["fulfillment-status"]=>
        object(SimpleXMLElement)#58 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["tax-lines"]=>
        object(SimpleXMLElement)#57 (2) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
          ["tax-line"]=>
          object(SimpleXMLElement)#62 (3) {
          ["title"]=>
            string(3) "VAT"
["price"]=>
            string(4) "3.18"
["rate"]=>
            string(4) "0.24"
          }
        }
      }
      [4]=>
      object(SimpleXMLElement)#34 (22) {
      ["id"]=>
        string(10) "2293741443"
["variant-id"]=>
        string(10) "6287165635"
["title"]=>
        string(29) "Beer Geek Vanilla Shake 12.1%"
["quantity"]=>
        string(1) "3"
["price"]=>
        string(4) "6.26"
["grams"]=>
        string(1) "0"
["sku"]=>
        string(8) "AR320018"
["variant-title"]=>
        object(SimpleXMLElement)#57 (0) {
        }
        ["vendor"]=>
        string(9) "Mikkeller"
["fulfillment-service"]=>
        string(6) "manual"
["product-id"]=>
        string(10) "2192150979"
["requires-shipping"]=>
        string(4) "true"
["taxable"]=>
        string(4) "true"
["gift-card"]=>
        string(5) "false"
["name"]=>
        string(29) "Beer Geek Vanilla Shake 12.1%"
["variant-inventory-management"]=>
        object(SimpleXMLElement)#58 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["properties"]=>
        object(SimpleXMLElement)#59 (1) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
        }
        ["product-exists"]=>
        string(4) "true"
["fulfillable-quantity"]=>
        string(1) "3"
["total-discount"]=>
        string(4) "0.00"
["fulfillment-status"]=>
        object(SimpleXMLElement)#60 (1) {
        ["@attributes"]=>
          array(1) {
    ["nil"]=>
            string(4) "true"
          }
        }
        ["tax-lines"]=>
        object(SimpleXMLElement)#61 (2) {
        ["@attributes"]=>
          array(1) {
    ["type"]=>
            string(5) "array"
          }
          ["tax-line"]=>
          object(SimpleXMLElement)#62 (3) {
          ["title"]=>
            string(3) "VAT"
["price"]=>
            string(4) "4.51"
["rate"]=>
            string(4) "0.24"
          }
        }
      }
    }
  }
  ["shipping-lines"]=>
  array(2) {
    ["@attributes"]=>
    array(1) {
        ["type"]=>
      string(5) "array"
    }
    ["shipping-line"]=>
    array(5) {
        ["title"]=>
      string(20) "Heavy Goods Shipping"
        ["price"]=>
      string(5) "20.00"
        ["code"]=>
      string(20) "Heavy Goods Shipping"
        ["source"]=>
      string(7) "shopify"
        ["tax-lines"]=>
      array(1) {
            ["@attributes"]=>
        array(1) {
                ["type"]=>
          string(5) "array"
        }
      }
    }
  }
  ["billing-address"]=>
  array(16) {
    ["@attributes"]=>
    array(1) {
        ["type"]=>
      string(7) "Address"
    }
    ["first-name"]=>
    string(4) "Sami"
    ["address1"]=>
    string(14) "Sairionkatu 11"
    ["phone"]=>
    string(13) "+358400804812"
    ["city"]=>
    string(12) "HÃ¤meenlinna"
    ["zip"]=>
    string(5) "13220"
    ["province"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
    ["country"]=>
    string(7) "Finland"
    ["last-name"]=>
    string(9) "KeinÃ¤nen"
    ["address2"]=>
    array(0) {
    }
    ["company"]=>
    string(18) "Design & stuff ltd"
    ["latitude"]=>
    string(10) "61.0078881"
    ["longitude"]=>
    string(10) "24.4729758"
    ["name"]=>
    string(14) "Sami KeinÃ¤nen"
    ["country-code"]=>
    string(2) "FI"
    ["province-code"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
  }
  ["shipping-address"]=>
  array(16) {
    ["@attributes"]=>
    array(1) {
        ["type"]=>
      string(7) "Address"
    }
    ["first-name"]=>
    string(4) "Sami"
    ["address1"]=>
    string(14) "Sairionkatu 11"
    ["phone"]=>
    string(13) "+358400804812"
    ["city"]=>
    string(12) "HÃ¤meenlinna"
    ["zip"]=>
    string(5) "13220"
    ["province"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
    ["country"]=>
    string(7) "Finland"
    ["last-name"]=>
    string(9) "KeinÃ¤nen"
    ["address2"]=>
    array(0) {
    }
    ["company"]=>
    string(18) "Design & stuff ltd"
    ["latitude"]=>
    string(10) "61.0078881"
    ["longitude"]=>
    string(10) "24.4729758"
    ["name"]=>
    string(14) "Sami KeinÃ¤nen"
    ["country-code"]=>
    string(2) "FI"
    ["province-code"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
  }
  ["fulfillments"]=>
  array(1) {
    ["@attributes"]=>
    array(1) {
        ["type"]=>
      string(5) "array"
    }
  }
  ["client-details"]=>
  array(6) {
    ["browser-ip"]=>
    string(15) "188.238.117.153"
    ["accept-language"]=>
    string(5) "en-us"
    ["user-agent"]=>
    string(116) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/600.8.9 (KHTML, like Gecko) Version/8.0.8 Safari/600.8.9"
    ["session-hash"]=>
    string(64) "228115255208a436814f146aba1b2e225b3b56c1a8b1ac1fc0abb73b4bbbb156"
    ["browser-width"]=>
    string(4) "1266"
    ["browser-height"]=>
    string(3) "945"
  }
  ["refunds"]=>
  array(1) {
    ["@attributes"]=>
    array(1) {
        ["type"]=>
      string(5) "array"
    }
  }
  ["payment-details"]=>
  array(5) {
    ["credit-card-bin"]=>
    string(1) "1"
    ["avs-result-code"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
    ["cvv-result-code"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
    ["credit-card-number"]=>
    string(40) "â¢â¢â¢â¢ â¢â¢â¢â¢ â¢â¢â¢â¢ 1"
    ["credit-card-company"]=>
    string(5) "Bogus"
  }
  ["customer"]=>
  array(18) {
    ["id"]=>
    string(9) "660386307"
    ["email"]=>
    string(17) "sami@wannabes.net"
    ["accepts-marketing"]=>
    string(4) "true"
    ["created-at"]=>
    string(25) "2015-06-14T22:30:46+03:00"
    ["updated-at"]=>
    string(25) "2015-09-09T10:20:28+03:00"
    ["first-name"]=>
    string(4) "Sami"
    ["last-name"]=>
    string(9) "KeinÃ¤nen"
    ["orders-count"]=>
    string(1) "0"
    ["state"]=>
    string(7) "enabled"
    ["total-spent"]=>
    string(4) "0.00"
    ["last-order-id"]=>
    array(1) {
        ["@attributes"]=>
      array(2) {
            ["type"]=>
        string(7) "integer"
            ["nil"]=>
        string(4) "true"
      }
    }
    ["note"]=>
    string(13) "Staff account"
    ["verified-email"]=>
    string(4) "true"
    ["multipass-identifier"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
    ["tax-exempt"]=>
    string(5) "false"
    ["tags"]=>
    string(5) "staff"
    ["last-order-name"]=>
    array(1) {
        ["@attributes"]=>
      array(1) {
            ["nil"]=>
        string(4) "true"
      }
    }
    ["default-address"]=>
    array(16) {
        ["id"]=>
      array(1) {
            ["@attributes"]=>
        array(2) {
                ["type"]=>
          string(7) "integer"
                ["nil"]=>
          string(4) "true"
        }
      }
      ["first-name"]=>
      array(1) {
            ["@attributes"]=>
        array(1) {
                ["nil"]=>
          string(4) "true"
        }
      }
      ["last-name"]=>
      array(1) {
            ["@attributes"]=>
        array(1) {
                ["nil"]=>
          string(4) "true"
        }
      }
      ["company"]=>
      array(1) {
            ["@attributes"]=>
        array(1) {
                ["nil"]=>
          string(4) "true"
        }
      }
      ["address1"]=>
      string(14) "Sairionkatu 11"
        ["address2"]=>
      array(1) {
            ["@attributes"]=>
        array(1) {
                ["nil"]=>
          string(4) "true"
        }
      }
      ["city"]=>
      string(12) "HÃ¤meenlinna"
        ["province"]=>
      array(0) {
        }
      ["country"]=>
      string(7) "Finland"
        ["zip"]=>
      string(5) "13220"
        ["phone"]=>
      string(13) "+358400480812"
        ["name"]=>
      array(0) {
        }
      ["province-code"]=>
      array(0) {
        }
      ["country-code"]=>
      string(2) "FI"
        ["country-name"]=>
      string(7) "Finland"
        ["default"]=>
      string(4) "true"
    }
  }
}
object(SimpleXMLElement)#30 (22) {
["id"]=>
  string(10) "2293741187"
["variant-id"]=>
  string(10) "6287163587"
["title"]=>
  string(17) "Texas Ranger 6.6%"
["quantity"]=>
  string(1) "3"
["price"]=>
  string(4) "5.02"
["grams"]=>
  string(3) "500"
["sku"]=>
  string(8) "AR320001"
["variant-title"]=>
  object(SimpleXMLElement)#61 (0) {
  }
  ["vendor"]=>
  string(9) "Mikkeller"
["fulfillment-service"]=>
  string(6) "manual"
["product-id"]=>
  string(10) "2192149379"
["requires-shipping"]=>
  string(4) "true"
["taxable"]=>
  string(4) "true"
["gift-card"]=>
  string(5) "false"
["name"]=>
  string(17) "Texas Ranger 6.6%"
["variant-inventory-management"]=>
  object(SimpleXMLElement)#60 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["properties"]=>
  object(SimpleXMLElement)#59 (1) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
  }
  ["product-exists"]=>
  string(4) "true"
["fulfillable-quantity"]=>
  string(1) "3"
["total-discount"]=>
  string(4) "0.00"
["fulfillment-status"]=>
  object(SimpleXMLElement)#58 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["tax-lines"]=>
  object(SimpleXMLElement)#57 (2) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
    ["tax-line"]=>
    object(SimpleXMLElement)#62 (3) {
    ["title"]=>
      string(3) "VAT"
["price"]=>
      string(4) "3.61"
["rate"]=>
      string(4) "0.24"
    }
  }
}
object(SimpleXMLElement)#31 (22) {
["id"]=>
  string(10) "2293741251"
["variant-id"]=>
  string(10) "6287170947"
["title"]=>
  string(16) "Ola Dubh 16 8.0%"
["quantity"]=>
  string(1) "3"
["price"]=>
  string(4) "6.54"
["grams"]=>
  string(3) "500"
["sku"]=>
  string(8) "AR320202"
["variant-title"]=>
  object(SimpleXMLElement)#57 (0) {
  }
  ["vendor"]=>
  string(11) "Harviestoun"
["fulfillment-service"]=>
  string(6) "manual"
["product-id"]=>
  string(10) "2192153539"
["requires-shipping"]=>
  string(4) "true"
["taxable"]=>
  string(4) "true"
["gift-card"]=>
  string(5) "false"
["name"]=>
  string(16) "Ola Dubh 16 8.0%"
["variant-inventory-management"]=>
  object(SimpleXMLElement)#58 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["properties"]=>
  object(SimpleXMLElement)#59 (1) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
  }
  ["product-exists"]=>
  string(4) "true"
["fulfillable-quantity"]=>
  string(1) "3"
["total-discount"]=>
  string(4) "0.00"
["fulfillment-status"]=>
  object(SimpleXMLElement)#60 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["tax-lines"]=>
  object(SimpleXMLElement)#61 (2) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
    ["tax-line"]=>
    object(SimpleXMLElement)#62 (3) {
    ["title"]=>
      string(3) "VAT"
["price"]=>
      string(4) "4.71"
["rate"]=>
      string(4) "0.24"
    }
  }
}
object(SimpleXMLElement)#32 (22) {
["id"]=>
  string(10) "2293741315"
["variant-id"]=>
  string(10) "6287169859"
["title"]=>
  string(32) "Dangerously Close To Stupid 9.3%"
["quantity"]=>
  string(1) "3"
["price"]=>
  string(4) "5.18"
["grams"]=>
  string(3) "500"
["sku"]=>
  string(8) "AR320255"
["variant-title"]=>
  object(SimpleXMLElement)#61 (0) {
  }
  ["vendor"]=>
  string(6) "TO ÃL"
["fulfillment-service"]=>
  string(6) "manual"
["product-id"]=>
  string(10) "2192152451"
["requires-shipping"]=>
  string(4) "true"
["taxable"]=>
  string(4) "true"
["gift-card"]=>
  string(5) "false"
["name"]=>
  string(32) "Dangerously Close To Stupid 9.3%"
["variant-inventory-management"]=>
  object(SimpleXMLElement)#60 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["properties"]=>
  object(SimpleXMLElement)#59 (1) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
  }
  ["product-exists"]=>
  string(4) "true"
["fulfillable-quantity"]=>
  string(1) "3"
["total-discount"]=>
  string(4) "0.00"
["fulfillment-status"]=>
  object(SimpleXMLElement)#58 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["tax-lines"]=>
  object(SimpleXMLElement)#57 (2) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
    ["tax-line"]=>
    object(SimpleXMLElement)#62 (3) {
    ["title"]=>
      string(3) "VAT"
["price"]=>
      string(4) "3.73"
["rate"]=>
      string(4) "0.24"
    }
  }
}
object(SimpleXMLElement)#33 (22) {
["id"]=>
  string(10) "2293741379"
["variant-id"]=>
  string(10) "6287164291"
["title"]=>
  string(21) "SfÃ¤Ã¤r Pale Ale 5.5%"
["quantity"]=>
  string(1) "3"
["price"]=>
  string(4) "4.42"
["grams"]=>
  string(3) "500"
["sku"]=>
  string(8) "AR320033"
["variant-title"]=>
  object(SimpleXMLElement)#57 (0) {
  }
  ["vendor"]=>
  string(9) "Mikkeller"
["fulfillment-service"]=>
  string(6) "manual"
["product-id"]=>
  string(10) "2192150083"
["requires-shipping"]=>
  string(4) "true"
["taxable"]=>
  string(4) "true"
["gift-card"]=>
  string(5) "false"
["name"]=>
  string(21) "SfÃ¤Ã¤r Pale Ale 5.5%"
["variant-inventory-management"]=>
  object(SimpleXMLElement)#58 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["properties"]=>
  object(SimpleXMLElement)#59 (1) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
  }
  ["product-exists"]=>
  string(4) "true"
["fulfillable-quantity"]=>
  string(1) "3"
["total-discount"]=>
  string(4) "0.00"
["fulfillment-status"]=>
  object(SimpleXMLElement)#60 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["tax-lines"]=>
  object(SimpleXMLElement)#61 (2) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
    ["tax-line"]=>
    object(SimpleXMLElement)#62 (3) {
    ["title"]=>
      string(3) "VAT"
["price"]=>
      string(4) "3.18"
["rate"]=>
      string(4) "0.24"
    }
  }
}
object(SimpleXMLElement)#34 (22) {
["id"]=>
  string(10) "2293741443"
["variant-id"]=>
  string(10) "6287165635"
["title"]=>
  string(29) "Beer Geek Vanilla Shake 12.1%"
["quantity"]=>
  string(1) "3"
["price"]=>
  string(4) "6.26"
["grams"]=>
  string(1) "0"
["sku"]=>
  string(8) "AR320018"
["variant-title"]=>
  object(SimpleXMLElement)#61 (0) {
  }
  ["vendor"]=>
  string(9) "Mikkeller"
["fulfillment-service"]=>
  string(6) "manual"
["product-id"]=>
  string(10) "2192150979"
["requires-shipping"]=>
  string(4) "true"
["taxable"]=>
  string(4) "true"
["gift-card"]=>
  string(5) "false"
["name"]=>
  string(29) "Beer Geek Vanilla Shake 12.1%"
["variant-inventory-management"]=>
  object(SimpleXMLElement)#60 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["properties"]=>
  object(SimpleXMLElement)#59 (1) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
  }
  ["product-exists"]=>
  string(4) "true"
["fulfillable-quantity"]=>
  string(1) "3"
["total-discount"]=>
  string(4) "0.00"
["fulfillment-status"]=>
  object(SimpleXMLElement)#58 (1) {
  ["@attributes"]=>
    array(1) {
    ["nil"]=>
      string(4) "true"
    }
  }
  ["tax-lines"]=>
  object(SimpleXMLElement)#57 (2) {
  ["@attributes"]=>
    array(1) {
    ["type"]=>
      string(5) "array"
    }
    ["tax-line"]=>
    object(SimpleXMLElement)#62 (3) {
    ["title"]=>
      string(3) "VAT"
["price"]=>
      string(4) "4.51"
["rate"]=>
      string(4) "0.24"
    }
  }
}
*/