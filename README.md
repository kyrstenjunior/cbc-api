# API CBC

## Inicialização do projeto

Para iniciar o projeto de forma local, é necessário ter instalado em sua máquina o banco de dados **MySQL** na versão **8.0** e o PHP na versão **8.4**.

Após ter realizado a instalação das tecnologias acima, copiar o código do arquivo ***extras/db.sql** e colar no banco de dados para criação das tabelas para este projeto.

Em seguida, faça uma cópia do arquivo **env.sample.ini**, altere seu nome para **env.ini** e insira os valores das variáveis para rodar o projeto.

Após todos esses procedimentos, para rodar o projeto localmente, acessar a raiz deste projeto via terminal e execute o comando:
~~~php
php -S localhost:8080
~~~

Ao rodar o projeto, utilizar o Postman ou qualquer outro software ou serviço para testar os end-points da aplicação.

Adicionar novo clube:
POST -> [endpoint](http://localhost:8080/clube/create)
Passe no body os valores -> "clube" e "saldo_disponivel";

Listar todos os clubes cadastrados:
GET -> [endpoint](http://localhost:8080/clubes)

Procurar por um clube:
GET -> [endpoint](http://localhost:8080/clube/1)
Passe o id do clube que deseja encontrar na url;

Editar um clube:
PUT -> [endpoint](http://localhost:8080/clube/1/update)
Passe no body os valores -> "clube" e/ou "saldo_disponivel" e utilize o id do clube que deseja editar na url;

Remover clube:
DELETE -> [endpoint](http://localhost:8080/clube/2/delete)
Passe o id do clube que deseja remover na url;
