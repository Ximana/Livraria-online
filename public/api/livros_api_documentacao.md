# Documentação da API - Livro

Esta API permite gerenciar informações sobre livros, autores e categorias.

## Endpoints Disponíveis

### 1. Listar Todos os Livros

Retorna uma lista de todos os livros cadastrados, incluindo detalhes de autores e categorias.

- **URL**
  ```
  GET /api/livros
  ```

- **Resposta de Sucesso**
  - Código: 200 OK
  - Conteúdo:
    ```json
    [
        {
            "id": 1,
            "titulo": "Livro Exemplo 1",
            "editora": "Editora A",
            "isbn": "978-3-16-148410-0",
            "idioma": "Português",
            "resumo": "Lorem ipsum...",
            "data_publicacao": "2023-01-15",
            "preco": 35.5,
            "quantidade": 50,
            "autores": [
                {
                    "id": 1,
                    "nome": "Autor A"
                }
            ],
            "categorias": [
                {
                    "id": 1,
                    "nome": "Ficção"
                }
            ]
        },
        {
            "id": 2,
            "titulo": "Livro Exemplo 2",
            "editora": "Editora B",
            "isbn": "978-3-16-148410-1",
            "idioma": "Inglês",
            "resumo": "Lorem ipsum...",
            "data_publicacao": "2024-05-20",
            "preco": 29.9,
            "quantidade": 30,
            "autores": [
                {
                    "id": 2,
                    "nome": "Autor B"
                }
            ],
            "categorias": [
                {
                    "id": 2,
                    "nome": "Não Ficção"
                }
            ]
        }
    ]
    ```

### 2. Cadastrar um Novo Livro

Adiciona um novo livro ao sistema.

- **URL**
  ```
  POST /api/livros
  ```

- **Corpo da Requisição**
  ```json
  {
      "titulo": "Novo Livro",
      "editora": "Editora C",
      "isbn": "978-3-16-148410-2",
      "idioma": "Português",
      "resumo": "Descrição do livro...",
      "data_publicacao": "2024-06-30",
      "preco": 25.0,
      "quantidade": 20,
      "autores": [1, 2],
      "categorias": [1]
  }
  ```

- **Resposta de Sucesso**
  - Código: 201 Created
  - Conteúdo:
    ```json
    {
        "id": 3,
        "titulo": "Novo Livro",
        "editora": "Editora C",
        "isbn": "978-3-16-148410-2",
        "idioma": "Português",
        "resumo": "Descrição do livro...",
        "data_publicacao": "2024-06-30",
        "preco": 25.0,
        "quantidade": 20,
        "autores": [
            {
                "id": 1,
                "nome": "Autor A"
            },
            {
                "id": 2,
                "nome": "Autor B"
            }
        ],
        "categorias": [
            {
                "id": 1,
                "nome": "Ficção"
            }
        ]
    }
    ```

### 3. Detalhes de um Livro Específico

Retorna detalhes de um livro com base no ID.

- **URL**
  ```
  GET /api/livros/{id}
  ```

- **Parâmetros de URL**
  - `id`: ID do livro a ser consultado.

- **Resposta de Sucesso**
  - Código: 200 OK
  - Conteúdo:
    ```json
    {
        "id": 1,
        "titulo": "Livro Exemplo 1",
        "editora": "Editora A",
        "isbn": "978-3-16-148410-0",
        "idioma": "Português",
        "resumo": "Lorem ipsum...",
        "data_publicacao": "2023-01-15",
        "preco": 35.5,
        "quantidade": 50,
        "autores": [
            {
                "id": 1,
                "nome": "Autor A"
            }
        ],
        "categorias": [
            {
                "id": 1,
                "nome": "Ficção"
            }
        ]
    }
    ```

### 4. Atualizar um Livro

Atualiza informações de um livro existente.

- **URL**
  ```
  PUT /api/livros/{id}
  ```

- **Parâmetros de URL**
  - `id`: ID do livro a ser atualizado.

- **Corpo da Requisição**
  ```json
  {
      "titulo": "Livro Atualizado",
      "editora": "Nova Editora",
      "idioma": "Inglês",
      "resumo": "Descrição atualizada...",
      "preco": 30.0,
      "quantidade": 25,
      "autores": [2],
      "categorias": [2]
  }
  ```

- **Resposta de Sucesso**
  - Código: 200 OK
  - Conteúdo:
    ```json
    {
        "id": 1,
        "titulo": "Livro Atualizado",
        "editora": "Nova Editora",
        "isbn": "978-3-16-148410-0",
        "idioma": "Inglês",
        "resumo": "Descrição atualizada...",
        "data_publicacao": "2023-01-15",
        "preco": 30.0,
        "quantidade": 25,
        "autores": [
            {
                "id": 2,
                "nome": "Autor B"
            }
        ],
        "categorias": [
            {
                "id": 2,
                "nome": "Não Ficção"
            }
        ]
    }
    ```

### 5. Deletar um Livro

Remove um livro do sistema.

- **URL**
  ```
  DELETE /api/livros/{id}
  ```

- **Parâmetros de URL**
  - `id`: ID do livro a ser deletado.

- **Resposta de Sucesso**
  - Código: 204 No Content

### 6. Pesquisar Livros

Busca livros por título, ISBN ou nome do autor.

- **URL**
  ```
  GET /api/livros/pesquisar?termo={termo_pesquisa}
  ```

- **Parâmetros de URL**
  - `termo_pesquisa`: Termo a ser pesquisado nos campos de título, ISBN e nome do autor.

- **Resposta de Sucesso**
  - Código: 200 OK
  - Conteúdo:
    ```json
    {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "titulo": "Livro Exemplo 1",
                "editora": "Editora A",
                "isbn": "978-3-16-148410-0",
                "idioma": "Português",
                "resumo": "Lorem ipsum...",
                "data_publicacao": "2023-01-15",
                "preco": 35.5,
                "quantidade": 50,
                "autores": [
                    {
                        "id": 1,
                        "nome": "Autor A"
                    }
                ],
                "categorias": [
                    {
                        "id": 1,
                        "nome": "Ficção"
                    }
                ]
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/livros/pesquisar?termo=exemplo&page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/livros/pesquisar?termo=exemplo&page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/livros/pesquisar",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
    ```


### 7. Listar Livros por Categoria

Retorna uma lista de livros pertencentes a uma categoria específica.

- **URL**
   ```
  GET /api/livros/categoria/{id_categoria}
  ```

- **Parâmetros de URL**
  - `id_categoria`: ID da categoria dos livros a serem listados.

- **Resposta de Sucesso**
  - Código: 200 OK
  - Conteúdo:
    ```json
    [
    {
        "id": 1,
        "titulo": "Livro Exemplo 1",
        "editora": "Editora A",
        "isbn": "978-3-16-148410-0",
        "idioma": "Português",
        "resumo": "Lorem ipsum...",
        "data_publicacao": "2023-01-15",
        "preco": 35.5,
        "quantidade": 50,
        "autores": [
            {
                "id": 1,
                "nome": "Autor A"
            }
        ],
        "categorias": [
            {
                "id": 1,
                "nome": "Ficção"
            }
        ]
    }
    ```

## Tratamento de Erros

A API retorna os seguintes códigos de status em caso de erro:

- 400 Bad Request: Dados de entrada inválidos ou ausentes.
- 404 Not Found: Livro não encontrado com o ID especificado.
- 500 Internal Server Error: Erro interno no servidor.

---

Esta documentação fornece uma visão geral dos endpoints disponíveis, seus parâmetros e exemplos de respostas esperadas. Certifique-se de ajustar as URLs base (`http://127.0.0.1:8000`) conforme necessário para refletir o ambiente de sua aplicação.