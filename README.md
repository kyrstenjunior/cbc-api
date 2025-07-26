# API CBC

## Instalação do PHP 8.4

Para rodar o projeto, realizar a instalação do PHP na **versão 8.4** em:
https://windows.php.net/download#php-8.4

![alt text](/assets/images/readme/image-php.png)


Após fazer o download, criar uma pasta com o nome php no disco *C:/* e descompactar os arquivos do download feito acima dentro da pasta php criada;


Depois, realizar o download e instalação do **Microsoft Visual C++** na mesma página onde foi feito o download do PHP:

![alt text](/assets/images/readme/image-php.png)


Após isso, acessar o arquivo **php.ini-development** no caminho *C:/php/php.ini-development* e renomeá-lo para **php.ini**. Abra o arquivo **php.ini** que acabou de renomear com *Administrador* e utilizando o comando *ctrl + f*, encontre o seguinte termo: *"on windows:"*. Ao encontrar, verificar se a linha abaixo tem o seguinte valor: *'; extension_dir = "ext"'*, caso sim, remova o ponto e vírgula do inicio do texto.

Após remover o ponto e vírgula, utilize o mesmo comando de busca e encontre o seguinte texto: *"; extension=pdo_mysql"*. Caso encontre, faça o mesmo removendo o ponto e vírgula. Salve o arquivo e feche;


Agora, é necessário criar uma **variável de ambiente** com o caminho da pasta php que acabamos de criar no disco C:/

![alt text](/assets/images/readme/variavel-de-ambiente.png)


Após criar a variável de ambiente, acesse o arquivo **host** no seguinte caminho: C:\Windows\System32\drivers\etc. Verifique se existe a linha com o valor 127.0.0.1 localhost da seguinte forma:

![alt text](/assets/images/readme/image-arquivo-host.png)


Após todos esses procedimentos, para rodar o projeto localmente, acessar a raiz deste projeto e executar o comando:
~~~php
php -S localhost:8080
~~~