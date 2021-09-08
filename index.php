<?php

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

class teste
{
    public $url = 'http://plugloja.com.br/site1/';
    public $consumer_key = 'ck_32633dec0c416eca54beaeed87e9c644b4e9b986';
    public $consumer_secret = 'cs_69d9803a224a050d7db94b23f3fadcb7ec020adf';
    public $options = ['version' => 'wc/v3'];

    public function criarConexao($url, $consumer_key, $consumer_secret, $options)
    {
        return $woocommerce = new Client($url, $consumer_key, $consumer_secret, $options);
    }

    public function pegarProdutos()
    {
        print_r($woocommerce->get('products'));
    }
}

$url = 'http://plugloja.com.br/site1/';
$consumer_key = 'ck_32633dec0c416eca54beaeed87e9c644b4e9b986';
$consumer_secret = 'cs_69d9803a224a050d7db94b23f3fadcb7ec020adf';
$options = ['version' => 'wc/v3'];
teste::criarConexao($url, $consumer_key, $consumer_secret, $options);
