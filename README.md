# CheckMe

Prova prática de web II - Sistema de monitoramento de saude

### Grupo:
- [Alisson Thiago](https://github.com/AlissonThyago)
- [Juciele Fernandes](https://github.com/jucielefernandes)
- [Filipe André](https://github.com/filipeandrev)
- [Morgana Fernandes](https://github.com/K0rgana)
- [Pérola Sanja](https://github.com/perolasanja)

# Rodando o projeto

clone do projeto:

**`git clone https://github.com/K0rgana/checkme`**

Entre no diretorio:

**`cd checkme/checkme/`**

Baixe as dependecias com o composer

**`composer install`**

crie o arquivo .env

 **`cp .env.example .env`**

Altere as seguintes informações do arquivo .env colocando o nome do seu banco, usuario e senha.

> DB_DATABASE=laravel

> DB_USERNAME=root

> DB_PASSWORD=

Crie as tabelas do banco com o seguinte comando:

 **`php artisan migrate`**

Gere uma chave com o comando:

 **`php artisan key:generate`**

Rode o servidor:

**`php artisan serve`**

Agora acesse o sistema no navegador pelo link `http://localhost:8000/`
