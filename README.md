# Lista de Jogos — CRUD em PHP + MySQL + Docker Compose

Aplicação web simples de CRUD (Create, Read, Update, Delete) para gerenciar uma coleção de jogos. Permite listar, cadastrar, editar e excluir registros. A entidade `jogos` possui os campos `nome`, `genero` e `ano_lancamento`, além do `id`.

Todo o ambiente é orquestrado com Docker Compose, com três serviços: aplicação PHP, banco de dados MySQL e phpMyAdmin para administração visual do banco.

## Pré-requisitos

- [Docker](https://www.docker.com/) instalado
- [Docker Compose](https://docs.docker.com/compose/) instalado (já incluso no Docker Desktop)

## Como executar

1. Clone o repositório:
```bash
   git clone https://github.com/LucasCchaves/docker.git
   cd docker
```

2. Suba os containers:
```bash
   docker compose up -d
```

3. Crie a tabela do banco de dados. Este projeto não usa script de inicialização automática, então a tabela precisa ser criada manualmente:
   - Acesse o phpMyAdmin em `http://localhost:8081` (usuário `app`, senha `app`)
   - Selecione o banco `app` no menu à esquerda
   - Vá na aba **SQL** e execute:
```sql
     CREATE TABLE jogos (
         id INT AUTO_INCREMENT PRIMARY KEY,
         nome VARCHAR(100) NOT NULL,
         genero VARCHAR(50) NOT NULL,
         ano_lancamento INT NOT NULL
     );
```

4. Acesse a aplicação em `http://localhost:8080`

## Explicação do docker-compose.yaml

O arquivo define três serviços conectados por uma rede bridge personalizada chamada `rede`, o que permite que eles se enxerguem entre si pelo nome do container em vez de precisar de IPs fixos.

- **`php`**: roda a aplicação com a imagem `php:8.3-apache`, que já vem com PHP e Apache configurados juntos. A pasta local `./src` é montada como a raiz do site dentro do container (`/var/www/html`), e a porta 8080 do host é mapeada para a porta 80 do Apache. Como a imagem base não vem com suporte a MySQL, o comando de inicialização instala as extensões `mysqli`, `pdo` e `pdo_mysql` antes de subir o Apache. As variáveis `DB_HOST`, `DB_USER`, `DB_PASSWORD` e `DB_NAME` são lidas pelo código PHP (`db.php`) via `getenv()` para montar a conexão com o banco.
- **`mysql`**: roda o banco de dados com a imagem oficial `mysql:8.4`. As variáveis de ambiente `MYSQL_DATABASE`, `MYSQL_USER` e `MYSQL_PASSWORD` fazem a própria imagem criar o banco `app` e o usuário `app` automaticamente na primeira inicialização. Um volume nomeado (`mysql_data`) garante que os dados não se percam ao reiniciar os containers.
- **`phpmyadmin`**: interface visual para administrar o banco sem precisar digitar SQL na linha de comando, acessível em `http://localhost:8081`. Aponta para o serviço `mysql` através das variáveis `PMA_HOST` e `PMA_PORT`.

## Pontos interessantes observados pela dupla

- Usar as variáveis de ambiente diretamente no `docker-compose.yaml` (em vez de um `.env`, que é proibido neste trabalho) deixou a configuração da conexão totalmente visível e fácil de auditar em um único arquivo.
- O volume nomeado `mysql_data` foi essencial para garantir persistência: sem ele, qualquer `docker compose down` apagaria todos os dados cadastrados.
- Criar uma rede bridge personalizada (`rede`) em vez de depender da rede padrão do Compose deixou explícito quais serviços podem se comunicar entre si, o que ajuda a entender a topologia só de olhar o arquivo.

## Autores

- [Kauã A. Matos]
- [Nikolas Keiji]
- [Lucas Chaves]