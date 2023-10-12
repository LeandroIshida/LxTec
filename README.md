# Sistema web de CRUD simples em PHP

## Introdução
O sistema cria uma lista de compra, onde será listado os produtos e a quantidade dos itens.

## Ferramentas utilizadas
- PHP Versão: 8.0.6
- XAMPP Versão: 8.0.6
- MySQL Versão: 10.4.19
- Bootstrap Versão: 5.5.0

## Estrutura das tabelas
- Database: lxtec_crud

```
CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR NOT NULL UNIQUE
);
CREATE TABLE item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES produto(id)
);
CREATE TABLE lista_compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    titulo VARCHAR NOT NULL,
    FOREIGN KEY (item_id) REFERENCES item(id)
);
```