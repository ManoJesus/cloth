<?php

class ConnectionManager
{
    public static function getConnection($db_name = "project_php_a3")
    {
        $host = "localhost";
        $username = "root";
        $password = "admin";

        return mysqli_connect($host,
            $username, $password, $db_name);
    }

    function __construct()
    {
        $sql_db = "CREATE DATABASE IF NOT EXISTS project_php_a3;";
        $sql_table_user = "CREATE TABLE IF NOT EXISTS `users` (
                          `first_name` varchar(15) NOT NULL,
                          `last_name` varchar(40) DEFAULT NULL,
                          `email` varchar(100) NOT NULL,
                          `password` varchar(32) NOT NULL,
                          PRIMARY KEY (`email`)
                        ) DEFAULT CHARSET=utf8";
        $sql_table_product = "CREATE TABLE IF NOT EXISTS  `product` (
                          `id` int NOT NULL,
                          `name` varchar(100) NOT NULL,
                          `price` double NOT NULL,
                          `quantity_available` int NOT NULL,
                          `brand` varchar(20) DEFAULT NULL,
                          `type_label` varchar(15) DEFAULT NULL,
                          `composition` varchar(30) DEFAULT NULL,
                          `gender` enum('m','f','k') DEFAULT NULL,
                          `color` varchar(10) DEFAULT NULL,
                          `made` varchar(15) DEFAULT NULL,
                          `age` int DEFAULT NULL,
                          `image_path` varchar(200) NOT NULL,
                          PRIMARY KEY (`name`),
                          UNIQUE KEY `id` (`id`)
                        ) DEFAULT CHARSET=utf8";
        $sql_table_order = 'create table if not exists `order`
(
    product_name varchar(100) not null,
    user_email   varchar(100) not null,
    quantity     int          not null,
    order_date   datetime     not null default now(), 
    constraint order_pk
        primary key (user_email, product_name, order_date),
    constraint table_name_product_name_fk
        foreign key (product_name) references product (name)
            on update cascade on delete cascade,
    constraint table_name_users_email_fk
        foreign key (user_email) references users (email)
) default charset = utf8;
';

        $sql_insert_into_product = "INSERT INTO `product` VALUES (16,'Bermuda chino reta',99.99,3,'Suncoast','Sem Estampa','100% Algodão','m','Cinza','Brasil',NULL,'product_images/bermuda_chino_reta.webp')
                           ,(32,'Bermuda com recortes',69.99,35,'Baby Club Mini','Sem Estampa','100% Poliéster','k','Azul','China',8,'product_images/bermuda_com_recortes.webp')
                           ,(15,'Bermuda esportiva ace',79.99,23,'ACE','Sem Estampa','92% Poliéster 8% Elastano','m','Azul','Brasil',NULL,'product_images/bermuda_esportiva_ace.webp')
                           ,(26,'Bermuda estampada tubaroes',59.99,2,'Suncoast','Mini Estampa','100% Algodão','k','Estampado','Brasil',10,'product_images/bermuda_estampada_tubaroes.webp')
                           ,(14,'Bermuda moletom esportivo',99.99,32,'ACE','Sem Estampa','95% Poliéster 5% Elastano','m','Cinza','china',NULL,'product_images/bermuda_moletom_esportivo.webp')
                           ,(18,'Bermuda relaxed moletom',119.99,52,'Basics','Sem Estampa','\n88% Algodão 12% Poliéster','m','Preto','Brasil',NULL,'product_images/bermuda_relaxed_moletom.webp')
                           ,(27,'Bermuda surf',59.99,23,'Palomino','Variados','100% Poliéster','k','Vermelho','China',12,'product_images/bermuda_surf.webp')
                           ,(9,'Blazer longo',229.99,20,'Clock House','Sem Estampa','92% Viscose 8% Poliéster','f','preto','China',NULL,'product_images/blazer_longo.webp')
                           ,(7,'Blusao de moletom rolling',119.99,0,'Universal','Personagens','80% Algodão 20% Poliéster','f','Estampado','Brasil',NULL,'product_images/blusao_de_moletom_rolling.webp')
                           ,(5,'Blusao polo',89.99,31,'Clock House','Localizada','100% algodao','f','branco','Brasil',NULL,'product_images/blusao_polo.webp')
                           ,(4,'Cardigan em trico cropped',89.99,1,'Clock House','Xadrez','100% acrilico','f','azul','Brasil',NULL,'product_images/cardigan_em_trico_cropped.webp')
                           ,(2,'Colete cropped de trico',89.99,8,'Clock House','listrado','100% acrilico','f','estampado','Brasil',NULL,'product_images/colete_cropped_de_trico.webp')
                           ,(11,'Colete de trico decote',79.99,22,'City','Sem Estampa','100% Acrílico','f','preto','Brasil',NULL,'product_images/colete_de_trico_decote.webp')
                           ,(10,'Colete de trico listrado',79.99,22,'Clock House','Listrado','100% Acrílico','f','estampado','Brasil',NULL,'product_images/colete_de_trico_listrado.webp')
                           ,(34,'Conjunto camiseta jardineira',119.99,23,'Baby Club Mini','Personagens','100% Algodão','k','Azul','China',-15,'product_images/conjunto_camiseta_jardineira.webp')
                           ,(3,'Jaqueta jeans',169.99,5,'Clock House','sem estampa','100% algodao','f','azul','Brasil',NULL,'product_images/jaqueta_jeans.webp')
                           ,(6,'Jaqueta jeans destroyed',169.99,8,'JeansWear','Sem Estampa','100% algodao','f','Azul','Brasil',NULL,'product_images/jaqueta_jeans_destroyed.webp')
                           ,(8,'Jaqueta shacket cropped',139.99,10,'JeansWear','Sem Estampa','100% Algodão','f','azul','Brasil',NULL,'product_images/jaqueta_shacket_cropped.webp')
                           ,(12,'Jaqueta trucker',169.99,22,'Clock House','Sem Estampa','100% Algodão','f','azul','Brasil',NULL,'product_images/jaqueta_trucker.webp')
                           ,(35,'Jardineira jeans',79.99,32,'Baby Club Mini','Sem Estampa','79% Algodão 21% Poliéster','k','Azul','Brasil',-15,'product_images/jardineira_jeans.webp')
                           ,(28,'Macacao de algodao',72.99,15,'Baby Club Mini','Mini Estampa','100% Algodão','k','Rosa','China',-13,'product_images/macacao_de_algodao.webp')
                           ,(31,'Macacao listrado',74.99,35,'Baby Club Mini','Listrado','100% Algodão','k','Azul','China',-24,'product_images/macacao_listrado.webp')
                           ,(29,'Macacao manga longa',69.99,215,'Disney','Personagens','100% Algodão','k','Branco','China',-24,'product_images/macacao_manga_longa.webp')
                           ,(30,'Macacao mickey',69.99,215,'Disney','Personagens','100% Algodão','k','Estampado','China',-24,'product_images/macacao_mickey.webp')
                           ,(21,'Regata basica bege',59.99,2,'Clock House','Sem Estampa','100% Algodão','m','Preto','Brasil',NULL,'product_images/regata_basica_bege.webp')
                           ,(19,'Regata basica neon',49.99,42,'Clock House','Sem Estampa','100% Algodão','m','Verde','Brasil',NULL,'product_images/regata_basica_neon.webp')
                           ,(24,'Regata bolso gola',39.99,2,'Suncoast','Sem Estampa','99% Algodão 1% Poliéster','m','Cinza','Brasil',NULL,'product_images/regata_bolso_gola.webp')
                           ,(20,'Regata canelada cavada',56.99,2,'Clock House','Sem Estampa','98% Algodão 2% Elastano','m','Preto','Brasil',NULL,'product_images/regata_canelada_cavada.webp')
                           ,(25,'Regata gola marinho',39.99,2,'Suncoast','Sem Estampa','99% Algodão 1% Poliéster','m','Azul','Brasil',NULL,'product_images/regata_gola_marinho.webp')
                           ,(23,'Regata listrada gola careca',39.99,2,'Suncoast','Listrado','99% Algodão 1% Poliéster','m','Preto','Brasil',NULL,'product_images/regata_listrada_gola_careca.webp')
                           ,(13,'Short bicolor cos',99.99,12,'ACE','Sem Estampa','92% Poliéster 8% Elastano','m','verde','china',NULL,'product_images/short_bicolor_cos.webp')
                           ,(17,'Short curto cordao',79.99,34,'Suncoast','Sem Estampa','100% Poliamida','m','Azul','Bangladesh',NULL,'product_images/short_curto_cordao.webp')
                           ,(1,'Sueter basico em trico',89.99,3,'city','sem estampa','','f','vermelho','china',NULL,'product_images/sueter_basico_em_trico.webp')
                           ,(33,'Vestido monica',34.99,23,'Baby Club Mini','Personagens','96% Algodão 4% Elastano','k','Rosa','Brasil',3,'product_images/vestido_monica.webp');
                ";

        $this->create_db($sql_db);
        $this->create_table($sql_table_user);
        $this->create_table($sql_table_product);
        $this->create_table($sql_table_order);

        $conn = self::getConnection();
        $sql = "select * from product";
        $result_set = $conn->query($sql);
        if(mysqli_num_rows($result_set)<=0){
            $this->insert_values($sql_insert_into_product);
        }
        $conn->close();

    }

    private function create_db(string $sql_db)
    {
        $conn = self::getConnection("");
        $conn->query($sql_db) or die("<p>ERROR CREATING DB</p>");
        $conn->close();
    }

    private function create_table(string $sql_table)
    {
        $conn = self::getConnection();
        $conn->query($sql_table) or die("<p>ERROR CREATING TABLE</p>");
        $conn->close();
    }


    private function insert_values(string $sql_insert_into)
    {
        $conn = self::getConnection();
        $conn->query($sql_insert_into) or die("<p>ERROR INSERTING DATA</p>");
        $conn->close();
    }
}
