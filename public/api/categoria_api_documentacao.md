
---

# Documentação da API - Categorias

Esta API permite gerenciar categorias de livros.

## Endpoints Disponíveis

### Listar Categorias

Endpoint para listar todas as categorias existentes.

- **URL**
  ```
  GET /api/categorias
  ```

- **Parâmetros de Resposta**
  - **200 OK** - Retorna um array JSON contendo todas as categorias.
  - Exemplo de resposta:
    ```json
    [
        {
            "id": 1,
            "categoria": "Ficção Científica",
            "descricao": "Livros de ficção científica e futurismo."
        },
        {
            "id": 2,
            "categoria": "Romance",
            "descricao": "Livros de romance e drama."
        }
    ]
    ```

### Criar Nova Categoria

Endpoint para criar uma nova categoria.

- **URL**
  ```
  POST /api/categorias
  ```

- **Corpo da Requisição**
  - **categoria** (string, obrigatório): Nome da categoria.
  - **descricao** (string, opcional): Descrição da categoria.

- **Parâmetros de Resposta**
  - **201 Created** - Retorna a categoria criada em JSON.
  - Exemplo de requisição:
    ```json
    {
        "categoria": "Suspense",
        "descricao": "Livros de suspense e mistério."
    }
    ```
  - Exemplo de resposta:
    ```json
    {
        "id": 3,
        "categoria": "Suspense",
        "descricao": "Livros de suspense e mistério."
    }
    ```

### Detalhar Categoria

Endpoint para obter detalhes de uma categoria específica.

- **URL**
  ```
  GET /api/categorias/{id}
  ```

- **Parâmetros de Resposta**
  - **200 OK** - Retorna os detalhes da categoria especificada em JSON.
  - Exemplo de resposta:
    ```json
    {
        "id": 1,
        "categoria": "Ficção Científica",
        "descricao": "Livros de ficção científica e futurismo."
    }
    ```

### Atualizar Categoria

Endpoint para atualizar uma categoria existente.

- **URL**
  ```
  PUT /api/categorias/{id}
  ```

- **Corpo da Requisição**
  - **categoria** (string, obrigatório): Novo nome da categoria.
  - **descricao** (string, opcional): Nova descrição da categoria.

- **Parâmetros de Resposta**
  - **200 OK** - Retorna a categoria atualizada em JSON.
  - Exemplo de requisição:
    ```json
    {
        "categoria": "Ficção Científica e Fantasia",
        "descricao": "Livros de ficção científica e fantasia."
    }
    ```
  - Exemplo de resposta:
    ```json
    {
        "id": 1,
        "categoria": "Ficção Científica e Fantasia",
        "descricao": "Livros de ficção científica e fantasia."
    }
    ```

### Remover Categoria

Endpoint para remover uma categoria existente.

- **URL**
  ```
  DELETE /api/categorias/{id}
  ```

- **Parâmetros de Resposta**
  - **204 No Content** - Retorna uma resposta vazia indicando que a categoria foi removida com sucesso.

---

Esta documentação descreve os endpoints disponíveis para interação com a API de Categorias. Certifique-se de ajustar os detalhes conforme necessário para refletir o comportamento específico da sua aplicação e as necessidades de segurança, validação e tratamento de erros adequados.