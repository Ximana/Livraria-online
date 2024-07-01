
# Livraria Online
Este projeto é uma livraria online em Laravel. Um sistema para a gestão de uma livraria online. Ele permite que clientes visualizem e comprem livros, que administradores gerenciem o estoque e os pedidos, e que a interação entre os diferentes componentes da livraria seja realizada de forma eficiente e organizada.

## Funcionalidades Principais
- Catálogo de Livros: Exibição de uma lista de livros disponíveis com detalhes como título, editora, ISBN, idioma, resumo, data de publicação, preço, quantidade em estoque e imagem da capa.
- Gestão de Categorias: Possibilidade de organizar livros em diferentes categorias e exibir livros por categoria.
- Gestão de Autores: Inclusão de informações sobre os autores dos livros e suas obras.
- Carrinho de Compras: Funcionalidade de adicionar livros ao carrinho de compras, visualizar o carrinho e finalizar pedidos.
- Gestão de Pedidos: Registro de pedidos feitos pelos clientes, incluindo status do pedido (pendente, feito, cancelado).
- Gestão de Clientes: Registro de clientes com informações de contato e histórico de compras.
- Gestão de Funcionários: Controle de funcionários que podem administrar o sistema.

## Estrutura da Base de Dados
### A base de dados é composta pelas seguintes tabelas:



## Tecnologias Utilizadas
- Backend: Laravel (PHP)
- Frontend: Blade templates, HTML, CSS, JavaScript

- Banco de Dados: MySQL
- Controle de Versão: Git

## Instalação e Configuração
Para instalar e configurar o projeto localmente, siga estas etapas:

1. Clone o repositório:

```bash
git clone https://github.com/Ximana/livraria-online.git
cd livraria-online
```

1.1 Abrir o directorio clonado
```bash
cd livraria-online
```

2. Instale as dependências do Composer:

```bash
composer install
```
Copie o arquivo .env.example para .env e configure as variáveis de ambiente, incluindo as credenciais do banco de dados.

```bash
cp .env.example .env
```

3. Gere a chave da aplicação:

```bash
php artisan key:generate
```

4. Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

5. Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

## Contribuição

- Contribuições são bem-vindas! Se você deseja contribuir com o projeto, por favor, siga as diretrizes de contribuição e envie um pull request.

## Licença
Este projeto está licenciado sob a MIT License.
