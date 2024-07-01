
---

## Documentação API - Autor

### Listar Autores

#### Endpoint

```
GET /api/autores
```

#### Descrição

Retorna uma lista de todos os autores cadastrados.

#### Exemplo de Requisição

```http
GET /api/autores
```

#### Exemplo de Resposta

```json
[
    {
        "id": 2,
        "nome": "eee",
        "profissao": "qqqeeee",
        "biografia": "eeee",
        "created_at": "2024-06-22T03:15:45.000000Z",
        "updated_at": "2024-06-22T03:21:47.000000Z"
    },
    {
        "id": 5,
        "nome": "Bill Gates",
        "profissao": "Empresario",
        "biografia": "aaaaa",
        "created_at": "2024-06-22T09:26:33.000000Z",
        "updated_at": "2024-06-22T09:26:33.000000Z"
    }
]
```

### Inserir um Novo Autor

#### Endpoint

```
POST /api/autores
```

#### Descrição

Cria um novo autor com base nos dados fornecidos.

#### Parâmetros do Corpo da Requisição

- **nome** (obrigatório): Nome do autor.
- **profissao** (obrigatório): Profissão do autor.
- **biografia** (obrigatório): Biografia do autor.

#### Exemplo de Requisição

```http
POST /api/autores
Content-Type: application/json

{
    "nome": "João Silva",
    "profissao": "Escritor",
    "biografia": "João Silva é um renomado escritor brasileiro..."
}
```

#### Exemplo de Resposta

```json
{
    "id": 1,
    "nome": "João Silva",
    "profissao": "Escritor",
    "biografia": "João Silva é um renomado escritor brasileiro...",
    "created_at": "2024-07-02T12:00:00Z",
    "updated_at": "2024-07-02T12:00:00Z"
}
```

### Ver Detalhes de um Autor

#### Endpoint

```
GET /api/autores/{id}
```

#### Descrição

Retorna os detalhes de um autor específico com base no ID fornecido.

#### Parâmetros de URL

- **id** (obrigatório): ID único do autor.

#### Exemplo de Requisição

```http
GET /api/autores/1
```

#### Exemplo de Resposta

```json
{
    "id": 1,
    "nome": "João Silva",
    "profissao": "Escritor",
    "biografia": "João Silva é um renomado escritor brasileiro...",
    "created_at": "2024-07-02T12:00:00Z",
    "updated_at": "2024-07-02T12:00:00Z"
}
```

### Atualizar Dados de um Autor

#### Endpoint

```
PUT /api/autores/{id}
```

#### Descrição

Atualiza os dados de um autor específico com base no ID fornecido.

#### Parâmetros de URL

- **id** (obrigatório): ID único do autor.

#### Parâmetros do Corpo da Requisição

- **nome** (obrigatório): Nome atualizado do autor.
- **profissao** (obrigatório): Profissão atualizada do autor.
- **biografia** (obrigatório): Biografia atualizada do autor.

#### Exemplo de Requisição

```http
PUT /api/autores/1
Content-Type: application/json

{
    "nome": "João Silva",
    "profissao": "Jornalista",
    "biografia": "João Silva é um renomado jornalista brasileiro..."
}
```

#### Exemplo de Resposta

```json
{
    "id": 1,
    "nome": "João Silva",
    "profissao": "Jornalista",
    "biografia": "João Silva é um renomado jornalista brasileiro...",
    "created_at": "2024-07-02T12:00:00Z",
    "updated_at": "2024-07-02T12:05:00Z"
}
```

### Remover um Autor

#### Endpoint

```
DELETE /api/autores/{id}
```

#### Descrição

Remove um autor específico com base no ID fornecido.

#### Parâmetros de URL

- **id** (obrigatório): ID único do autor.

#### Exemplo de Requisição

```http
DELETE /api/autores/1
```

#### Exemplo de Resposta

```http
HTTP/1.1 204 
```

---

Esta documentação fornece uma visão geral dos endpoints disponíveis, os métodos permitidos, os parâmetros necessários e os exemplos de como usar cada endpoint.