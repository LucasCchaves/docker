# Criar a tabela `jogos`

O projeto não usa script de inicialização automática do banco (restrição do trabalho). Depois de subir os containers com `docker compose up -d`, crie a tabela manualmente:

1. Acesse o phpMyAdmin em `http://localhost:8081` (usuário `app`, senha `app`)
2. Selecione o banco `app` no menu à esquerda
3. Vá na aba **SQL** e cole o script abaixo

```sql
CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    ano_lancamento INT NOT NULL
);
```

4. Clique em **Executar**

Pronto, a aplicação em `http://localhost:8080` já vai listar (vazio) e permitir cadastrar jogos.
