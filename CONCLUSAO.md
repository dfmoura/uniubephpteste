# Conclusao (colar na resposta da ACQA)

https://github.com/dfmoura/uniubephpteste

Fiz um sistema de tarefas em PHP com MySQL. Basicamente o usuario se cadastra, faz login e depois consegue criar, editar, ver e apagar as tarefas dele.

Organizei em MVC como pediu na atividade. O index.php direciona as paginas pelo parametro p (login, dashboard, nova tarefa etc). Os controllers fazem a logica, as views sao o html e os models sao as classes Usuario e Tarefa.

Pra banco usei DAO no UsuarioDAO e TarefaDAO, e a conexao ficou na classe Conexao com Singleton.

A senha no cadastro grava com password_hash e no login comparo com password_verify. Tem o valida.php que bloqueia quem nao ta logado de entrar no dashboard.

Cada um so mexe nas proprias tarefas, filtro pelo id do usuario na sessao.
