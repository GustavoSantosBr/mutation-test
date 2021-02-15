## Mutation Test

[![Minimum PHP Version](https://img.shields.io/badge/php-%5E7.3.6-blue)](https://php.net/)
[![Coverage](https://img.shields.io/badge/coverage-100%25-green)](https://github.com/GustavoSantosBr/mutation-test)

* [Introdução](#introduction)
* [Instalação](#installation)
* [Testes](#tests)
    - [Infection](#infection)
    - [Mutation Testing](#mutation_testing)
    - [Unit Testing](#unit_testing)

<div id='introduction'></div> 

## Introdução

O teste de mutação é um sistema usado para projetar novos testes de software e avaliar a qualidade dos testes de
software existentes. O teste de mutação envolve a modificação de um programa em pequenas maneiras. O conceito de teste
de mutação é bem simples, bugs/mutantes, são inseridos no código e os testes são executados em cima do código mutado. Se
pelo menos um dos testes quebrar ou tiver timeout, o mutante é considerado morto, e aquele trecho de código alterado é
considerado como coberto pelos testes.

<div id='installation'></div>

## Instalação

- Abra seu terminal, navegue até o diretório de sua preferência, e em seguida execute:
  ```bash
  > git clone https://github.com/GustavoSantosBr/mutation-test.git
  ```

- Navegue até a pasta do projeto utilizando:
  ```bash
  > cd mutation-test
  ```

- Em seguida, execute o comando abaixo para dar início ao contêiner do projeto:
  ```bash
  > docker-compose up -d
  ```

- Após o término da criação do contêiner, entre no bash executando:
  ```bash
  > docker exec -it mutation bash
  ```

- Instale as depêndencias do projeto com o seguinte comando:
  ```bash
  > composer install
  ```

<div id='tests'></div>

## Testes

<div id='infection'></div>

### Infection

Neste exemplo utilizarei o framework Infection. Infection é um framework de teste de mutação PHP baseado em mutações AST
(Abstract Syntax Tree). Ele funciona como uma ferramenta CLI e pode ser executado a partir da raiz do projeto. Mais
detalhes sobre o [Infection](https://infection.github.io/guide/index.html).

<div id='mutation_testing'></div>

### Mutation Testing

Para executar os testes de mutação, basta entrar no bash do contêiner e executar:

  ```bash
  > ./vendor/bin/infection
  ```

<div id='unit_testing'></div>

### Unit Testing

Para executar os testes unitários, basta entrar no bash do contêiner e executar:

  ```bash
  > ./vendor/bin/phpunit --coverage-html tests/coverage/
  ```