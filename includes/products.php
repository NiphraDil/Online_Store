<?php

include("Product.php");

function get_list_view_html($product_id, $product) {
    //build HTML output
    $output = "";

    $output = $output . "<li>";
    $output = $output . '<a href="shirt.php?id='. $product_id . '">';
    $output = $output . '<a href="shirt.php?id='. $product_id . '">';
    $output = $output . '<img src="' . $product["img"] . '" alt="' . $product["name"] . '">';
    $output = $output . "<p>View Details</p>";
    $output = $output . "</a>";
    $output = $output . "</li>";

    return $output;
}

$products = array();

$products[101] = array(
    "name" => "Logo Shirt, Red",
    "price" => 18,
    "img" => "img/shirts/shirt-101.jpg",
    "paypal" => "94538DHK8AM4A",
    "sizes" => array("Small", "Medium", "Large", "X-Large")
);
$products[102] = array(
    "name" => "Mike the Frog Shirt, Black",
    "img" => "img/shirts/shirt-102.jpg",
    "price" => 20,
    "paypal" => "V25TX8LQP4V8E",
    "sizes" => array("Small", "Medium", "Large", "X-Large")

);
$products[103] = array(
    "name" => "Mike the Frog Shirt, Blue",
    "img" => "img/shirts/shirt-103.jpg",
    "price" => 20,
    "paypal" => "JSD22JTQRMXHN",
    "sizes" => array("Small", "Medium", "X-Large")

);
$products[104] = array(
    "name" => "Logo Shirt, Green",
    "img" => "img/shirts/shirt-104.jpg",
    "price" => 18,
    "paypal" => "7E94N9T5PMLT2",
    "sizes" => array("Small", "Medium", "Large")

);
$products[105] = array(
    "name" => "Mike the Frog Shirt, Yellow",
    "img" => "img/shirts/shirt-105.jpg",
    "price" => 25,
    "paypal" => "JKPBM4TKUZGCC",
    "sizes" => array("Small", "Medium", "Large", "X-Large")

);
$products[106] = array(
    "name" => "Logo Shirt, Gray",
    "img" => "img/shirts/shirt-106.jpg",
    "price" => 20,
    "paypal" => "W7QKSSUMHRF6A",
    "sizes" => array("Small", "Large", "X-Large")

);
$products[107] = array(
    "name" => "Logo Shirt, Turquoise",
    "img" => "img/shirts/shirt-107.jpg",
    "price" => 20,
    "paypal" => "6EVM9T7VNS96G",
    "sizes" => array("Small", "Medium", "Large", "X-Large")

);
$products[108] = array(
    "name" => "Logo Shirt, Orange",
    "img" => "img/shirts/shirt-108.jpg",
    "price" => 25,
    "paypal" => "HJ4U4PGP93JJW",
    "sizes" => array("Medium", "Large", "X-Large")
);

$objectProducts = [];

foreach ($products as $id => $arrayProduct) {
    $objectProduct = new Product();
    $objectProduct->setId($id);
    $objectProduct->setImage($arrayProduct["img"]);
    $objectProduct->setName($arrayProduct["name"]);
    $objectProduct->setPaypal($arrayProduct["paypal"]);
    $objectProduct->setPrice($arrayProduct["price"]);
    $objectProduct->setSize($arrayProduct["sizes"]);
    if (! $objectProduct->isExpensive()) {
        echo "Product is cheap:".$objectProduct->getName()."\n";
    }
}
var_dump($objectProducts);
