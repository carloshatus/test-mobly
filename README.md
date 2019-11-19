# Teste Mobly

Cadastro de usuários com backend desenvolvido em **[Laravel](https://laravel.com/) ([PHP](https://www.php.net/))** [REST](https://www.w3.org/2001/sw/wiki/REST) e frontend **de exemplo** desenvolvido em **[VueJs](https://vuejs.org/)**.

## O desafio proposto
- [x] Montar uma api que importe uma lista de [usuários](http://jsonplaceholder.typicode.com/users) e [posts](http://jsonplaceholder.typicode.com/posts) em uma outra api fornecida e armazene em um banco de dados [MySql](https://www.mysql.com/) para consultas, edições e inserções através de uma api [REST](https://www.w3.org/2001/sw/wiki/REST).
- [x] Montar uma tela de exemplo que liste os usuários com opções de adicionar, editar, excluir e visualizar os posts do respectivo usuário.

## Estrutura do projeto entregue neste repositório
**[Docker compose](https://docs.docker.com/compose/)** contendo:
- servidor [nginx](https://www.nginx.com/) rodando nas portas **8080 (API)** e **9090 (frontend)**.
- [php-fpm](https://www.php.net/manual/en/install.fpm.php) v. `7.1.9` na porta **9000**.
- [mysql](https://www.mysql.com/) v. `5.6` na porta **3306**. Caso necessite alterar a porta ou configurações do banco de dados, altere [aqui](https://github.com/carloshatus/test-mobly/blob/master/.env) e [aqui](https://github.com/carloshatus/test-mobly/blob/master/htdocs/test-mobly-api/.env).

### Diretórios do projeto
- **[htdocs](https://github.com/carloshatus/test-mobly/tree/master/htdocs)**: arquivos do projeto.
  - **[test-mobly-api](https://github.com/carloshatus/test-mobly/tree/master/htdocs/test-mobly-api)**: projeto **Laravel (PHP)**.
  - **[test-mobly-web](https://github.com/carloshatus/test-mobly/tree/master/htdocs/test-mobly-web)** projeto **VueJs**.
- **[mysql](https://github.com/carloshatus/test-mobly/tree/master/mysql)**: arquivos de configurações do **MySql**.
- **[nginx](https://github.com/carloshatus/test-mobly/tree/master/nginx)**: arquivos de configurações do **nginx**.
- **[php-fpm](https://github.com/carloshatus/test-mobly/tree/master/php-fpm)**: arquivos de configurações do **PHP**.

## Como executar o projeto?

### Pré-requisitos para testes
* git
* docker-compose
* composer (para instalar dependências do Laravel)
* npm (para gerar build do VueJs **se necessário**)

Obs: O repositório já contém uma build gerada do projeto VueJs.

Obs 2: Os arquivos `.env` possuem apenas dados genéricos pertinentes exclusivamente a este projeto e foram mantidos apenas para facilitar o teste.

### Executando o projeto
Clone o prjeto:
```
git clone https://github.com/carloshatus/test-mobly.git
```

Vá até o diretório do projeto Laravel:
```
cd [diretório do projeto base]/htdocs/test-mobly-api/
```

Instale as dependências:
```
composer install
```

Realize a migração do banco de dados:
```
php artisan migrate
```

Atribua permissão de leitura e escrita a pasta `storage`:
```
chmod -R 777 /storage/
```

Retorne ao diretório base do projeto:
```
cd ..
cd ..
```

Prepare os containers do docker:
```
docker-compose build
```

Execute os containers do docker:
```
docker-compose up -d
```

### Para testar utilize
* API Laravel: [http://localhost:8080](http://localhost:8080/)
* Frontend VueJs: [http://localhost:9090](http://localhost:9090/)

#### Rotas solicitadas
* Todos os usuários: [http://localhost:8080/api/users](http://localhost:8080/api/users)
* Usuário específico: [http://localhost:8080/api/users/users/{id}](http://localhost:8080/api/users/1)
* Posts de um usuário: [http://localhost:8080/api/users/{id}/posts](http://localhost:8080/api/users/1/posts)

## Sobre o autor
> [Carlos Hatus](https://www.linkedin.com/in/carloshatus/)
> 
> [@carloshatus](https://github.com/carloshatus)
> 
> [carlos.hatus@hotmail.com](mailto:carlos.hatus@hotmail.com)
