<?php
require __DIR__ . '/vendor/autoload.php';
use Automattic\WooCommerce\Client;

class ConexaoWooCommerce
{
    private static $url;
    private static $consumer_key;
    private static $consumer_secret;
    private static $woocommerce;

    function __construct(string $url, string $consumer_key, string $consumer_secret)
    {
        self::$url = $url;
        self::$consumer_key = $consumer_key;
        self::$consumer_secret = $consumer_secret;
    }

    public function criarConexao()
    {
        self::$woocommerce = new Client(self::$url, self::$consumer_key, self::$consumer_secret);
    }

    public function pegarProdutos()
    {
        print_r(self::$woocommerce->get('products'));
    }

    public function enviarProduto($name, $preco, $descricao, $pequenaDescricao, $imagem1)
    {
        $data = [
            'name' => $name,
            'type' => 'simple',
            'regular_price' => $preco,
            'description' => $descricao,
            'short_description' => $pequenaDescricao,
            'categories' => [
                [
                    'id' => 9
                ],
                [
                    'id' => 14
                ]
            ],
            'images' => [
                [
                    'src' => $imagem1
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg'
                ]
            ]
        ];
        print_r(self::$woocommerce->post('products', $data));
    }
}

$primeiraConexao = new ConexaoWooCommerce(
    'http://plugloja.com.br/site1/',
    'ck_a41a6f84473279cab566c9607b0890a8f4beb92d',
    'cs_486988660da744885dd187eeb59738bc3330a828'
);
$primeiraConexao->criarConexao();
$primeiraConexao->pegarProdutos();
$primeiraConexao->enviarProduto(
    'Mateus la vai Teste',
    '22.88',
    'Mateus la vai teste 2',
    'Mateus la vai teste 3',
    'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
);
