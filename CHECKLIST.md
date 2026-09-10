# Checklist do Trabalho (CRUD PHP + Docker Compose)

Prazo: 10/09. Atualizar este arquivo conforme formos avançando.

## 1. CRUD funcional (PHP + banco)
- [x] Entidade escolhida (`jogos`: nome, genero, ano_lancamento — 3 campos além do id)
- [x] Página de listagem (`index.php`)
- [x] Formulário de cadastro (POST) (`criar.php`)
- [x] Formulário de edição (pré-carregado) (`editar.php`)
- [x] Exclusão de registros (`excluir.php`)

## 2. Infraestrutura (docker-compose.yaml)
- [x] Pelo menos 2 serviços (app = `php`, db = `mysql`)
- [x] Variáveis de conexão direto no compose, sem `.env` (`db_host`, `db_user`, `db_password`, `db_name` no serviço `php`)
- [x] Mapeamento de porta para acessar a aplicação (8080:80)
- [x] Volume persistente para o banco (`mysql_data`)
- [x] Rede bridge personalizada (`networks: rede`, driver bridge, os 3 serviços conectados)
- [x] Padronizar caixa das variáveis de ambiente (todas em MAIÚSCULO: `DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME` no `php`)

## 3. Comentários no docker-compose.yaml (item 3.3 do PDF)
- [x] Comentários em português explicando as diretivas (conceitos repetidos, como `networks: - rede`, `restart` e `depends_on` nos serviços seguintes, são explicados uma vez só, sem repetir a mesma frase)

## 4. Versionamento (GitHub)
- [x] Repositório público criado
- [x] Commits frequentes com mensagens claras (`feat:`, "readme completo", merge de PR)
- [x] Branch principal `main` com versão final funcionando

## 5. README.md
- [x] Título e descrição do projeto
- [x] Pré-requisitos (Docker/Docker Compose)
- [x] Passo a passo (clonar, `docker compose up -d`, como a tabela é criada, acessar `localhost:8080`)
- [x] Explicação detalhada do docker-compose.yaml (serviços, variáveis, rede)
- [x] Mínimo 3 pontos interessantes/aprendizados da dupla
- [x] Autores (nomes completos)

## 6. Restrições
- [x] Sem `.env`
- [x] Sem healthcheck / script de inicialização automática do Docker (tabela `jogos` é criada por código PHP em `db.php` com `CREATE TABLE IF NOT EXISTS`, opção explicitamente permitida no PDF)
- [ ] Testado numa máquina limpa (sem PHP/banco instalados localmente)

## 7. Entrega
- [ ] Link do repositório entregue até o início da aula do dia 10/09
