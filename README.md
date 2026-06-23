# sistema de tarefas

trabalho da ACQA. fiz um sistema onde o usuario se cadastra, faz login e gerencia tarefas dele.

## funcionalidades

- cadastro e login (senha salva com password_hash/bcrypt)
- dashboard mostrando as tarefas do usuario logado
- criar, editar, listar e excluir tarefas

## como esta organizado

separei em pastas:

- controllers/ - logica (AuthController, DashboardController, TarefaController)
- models/ - classes Usuario e Tarefa
- dao/ - consultas no banco (UsuarioDAO e TarefaDAO)
- views/ - html das telas
- config/ - conexao com mysql

o index.php recebe ?p=login, ?p=dashboard, ?p=nova_tarefa etc e chama o controller certo.

## padroes

usei MVC pra separar as coisas.

tambem usei Singleton na classe Conexao (so abre uma conexao com o banco) e DAO nas classes UsuarioDAO e TarefaDAO pra nao misturar sql com o resto do codigo.

## rodar local

1. criar o banco e importar o database.sql
2. ajustar config/db.php com usuario e senha do mysql
3. abrir index.php no navegador

precisa de php e mysql rodando.
