<h1 align="center">
    Sistema de Aeroporto ✈
</h1>

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
 <a href="#-funcionalidades">Funcionalidades</a> •
 <a href="#-como-executar-o-projeto">Como executar</a> • 
 <a href="#-autor">Autor</a> • 
 <a href="#user-content--licença">Licença</a>
</p>


## 💻 Sobre o projeto

✈ Aeroporto - A finalidade deste projeto é a elaboração de uma plataforma online que
possibilitará que empresas de viagens aéreas possam cadastrar seus voos e disponibilizar
passagens que usuários possam realizar a compra em uma quantidade limitada. Assim a
empresa terá um controle maior de seus passageiros, agendamento de voos e possíveis
vendas realizadas, e usuários também poderão ver e escolher qual empresa e voo lhe
servirá melhor.

---

## ⚙️ Funcionalidades

-  [x] Empresas e usuários podem se cadastrar e fazer login na plataforma:
  - [x] Usuários podem:
      - Cadastrar e deletar cartão de crédito/débito;
      - Editar seu perfil;
      - Comprar passage; 
      - Ver seu histórico de compras;
  - [x] Empresas podem:
      - Cadastrar aviões;
      - Cadastrar passagens;
      - Cadastrar voos;
---

## 🚀 Como executar o projeto


### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[PHP](https://www.php.net/downloads.php), [MySql](https://www.mysql.com/downloads/) ou o [Xampp](https://www.apachefriends.org/download.html) mais o [Composer](https://getcomposer.org/download/). 
Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)

## .ENV
Para executar o projeto é necessário configurar o arquivo .env, copie o arquivo .env.exemple e altere as credenciais de acordo com as suas.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aeroporto
DB_USERNAME=
DB_PASSWORD=

```

#### 🎲 Rodando projeto 

```bash

# Clone este repositório
$ git clone git@github.com:IgorVVieira/projeto_banco_de_dados.git

# Acesse a pasta do projeto no terminal/cmd
$ cd projeto_banco_de_dados

# Instale as dependências
$ composer install

# Atualize as dependências
$ composer update

# Execute a aplicação
$ php artisan serve

# O servidor inciará - acesse: http://127.0.0.1:8000

```
---

## 🦸 Autor

<a href="https://github.com/IgorVVieira">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/44008578?v=4" width="100px;" alt=""/>
 <br />
 <sub><b>Igor Vitor Vieira</b></sub></a> <a href="https://blog.rocketseat.com.br/author/thiago/" title="Rocketseat">🚀</a>
 <br />
---

## 📝 Licença

Este projeto esta sobe a licença [MIT](./LICENSE).

---
