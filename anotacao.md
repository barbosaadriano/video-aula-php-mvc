#Implementação
- Criar um cadastro de Empresa
```
--definição do banco de dados
create table if not exists empresa (
    id integer not null primary key auto_increment,
    nome varchar(45),
    situacao varchar(10)
)
```
## Roteiro
- Criar model
- Criar Dao
- Criar Controller
- Criar view
-- Listagem
-- inserção/edição
-- confirmação

# Criando um menu
Criar um controller
Criar uma view
Configurar para direcionar para a tela principal
adicionar no layout uma rota para a tela principal
