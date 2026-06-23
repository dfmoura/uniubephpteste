# Sistema de Tarefas

Projeto da ACQA em PHP com MySQL. É um sistema simples de lista de tarefas com cadastro e login.

## O que tem no sistema

- Cadastro e login de usuário (senha com bcrypt)
- Dashboard com as tarefas do usuário logado
- CRUD de tarefas (criar, editar, listar e excluir)

## Estrutura

```
controllers/   -> AuthController, DashboardController, TarefaController
models/        -> Usuario, Tarefa
dao/           -> UsuarioDAO, TarefaDAO
views/         -> telas HTML
config/        -> conexão com o banco
```

O `index.php` faz o roteamento pelas páginas (`?p=login`, `?p=dashboard`, etc).

## Padrões usados

- **MVC** – controllers, models e views separados
- **Singleton** – classe `Conexao` (uma instância só do banco)
- **DAO** – `UsuarioDAO` e `TarefaDAO` para acesso aos dados

## Como rodar

1. Importar o `database.sql` no MySQL (ou rodar o `instalar.php` no servidor)
2. Configurar `config/db.php` com host, usuário, senha e banco
3. Acessar `index.php` no navegador

Requisitos: PHP 7.4+ e MySQL.
