
### API de Usuário

A API de usuário permite gerenciar operações relacionadas aos usuários do sistema.

#### Endpoints Disponíveis

- **Cadastro de Usuário**
  - **Método:** POST
  - **URL:** `/api/usuarios/cadastrar`
  - **Descrição:** Cria um novo usuário no sistema.
  - **Parâmetros do Corpo (JSON):**
    - `name` (string, obrigatório): Nome completo do usuário.
    - `email` (string, obrigatório): Endereço de e-mail único do usuário.
    - `password` (string, obrigatório): Senha do usuário (mínimo de 8 caracteres).
    - `nacionalidade` (string, opcional): Nacionalidade do usuário.
    - `profissao` (string, opcional): Profissão do usuário.
    - `numero_bi` (string, opcional): Número do Bilhete de Identidade do usuário.
    - `morada` (string, opcional): Morada do usuário.
    - `telefone` (string, opcional): Número de telefone do usuário.
  - **Respostas:**
    - **Sucesso (201 Created):** Usuário cadastrado com sucesso.
      ```json
      {
        "message": "Usuário cadastrado com sucesso"
      }
      ```
    - **Erro (422 Unprocessable Entity):** Erros de validação nos campos fornecidos.
      ```json
      {
        "message": "Os dados fornecidos são inválidos",
        "errors": {
          "campo": [
            "mensagem de erro"
          ]
        }
      }
      ```

- **Login de Usuário**
  - **Método:** POST
  - **URL:** `/api/usuarios/login`
  - **Descrição:** Autentica o usuário e fornece um token de acesso para sessões subsequentes.
  - **Parâmetros do Corpo (JSON):**
    - `email` (string, obrigatório): Endereço de e-mail registrado do usuário.
    - `password` (string, obrigatório): Senha do usuário.
  - **Respostas:**
    - **Sucesso (200 OK):** Login bem-sucedido.
      ```json
      {
        "access_token": "token_de_acesso",
        "token_type": "Bearer",
        "user": {
          "id": 1,
          "name": "Nome do Usuário",
          "email": "usuario@example.com",
          "created_at": "2024-07-04T12:00:00Z",
          "updated_at": "2024-07-04T12:00:00Z"
        }
      }
      ```
    - **Erro (401 Unauthorized):** Credenciais inválidas.
      ```json
      {
        "error": "Credenciais inválidas"
      }
      ```

- **Logout de Usuário**
  - **Método:** POST
  - **URL:** `/api/usuarios/logout`
  - **Descrição:** Encerra a sessão do usuário e invalida o token de acesso.
  - **Cabeçalhos Requeridos:**
    - `Authorization: Bearer {token_de_acesso}`
  - **Respostas:**
    - **Sucesso (200 OK):** Logout bem-sucedido.
      ```json
      {
        "message": "Sessão terminada com sucesso"
      }
      ```

#### Exemplos de Uso no Postman

- **Cadastro de Usuário**
  - **Método:** POST
  - **URL:** `http://localhost:8000/api/usuarios/cadastrar`
  - **Corpo (JSON):**
    ```json
    {
      "name": "Usuário Exemplo",
      "email": "exemplo@example.com",
      "password": "senha123",
      "nacionalidade": "Brasileiro",
      "profissao": "Desenvolvedor",
      "numero_bi": "123456789",
      "morada": "Rua Exemplo, 123",
      "telefone": "+55 11 98765-4321"
    }
    ```
- **Login de Usuário**
  - **Método:** POST
  - **URL:** `http://localhost:8000/api/usuarios/login`
  - **Corpo (JSON):**
    ```json
    {
      "email": "exemplo@example.com",
      "password": "senha123"
    }
    ```
- **Logout de Usuário**
  - **Método:** POST
  - **URL:** `http://localhost:8000/api/usuarios/logout`
  - **Cabeçalho:**
    - `Authorization: Bearer {token_de_acesso}`

