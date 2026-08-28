# Checklist do Trabalho (CRUD PHP + Docker Compose)

Prazo: 10/09. Atualizar este arquivo conforme formos avançando.

## 1. CRUD funcional (PHP + banco)
- [ ] Entidade escolhida (mínimo 3 campos além do id)
- [ ] Página de listagem
- [ ] Formulário de cadastro (POST)
- [ ] Formulário de edição (pré-carregado)
- [ ] Exclusão de registros

## 2. Infraestrutura (docker-compose.yaml)
- [x] Pelo menos 2 serviços (app = `php`, db = `mysql`)
- [x] Variáveis de conexão direto no compose, sem `.env` (`db_host`, `db_user`, `db_password`, `db_name` no serviço `php`)
- [x] Mapeamento de porta para acessar a aplicação (8080:80)
- [x] Volume persistente para o banco (`mysql_data`)
- [x] Rede bridge personalizada (`networks: rede`, driver bridge, os 3 serviços conectados)
- [ ] Padronizar caixa das variáveis de ambiente (mysql usa MAIÚSCULO, php usa minúsculo) — decidir um padrão

## 3. Comentários no docker-compose.yaml (item 3.3 do PDF)
- [x] Comentários em português explicando as diretivas (conceitos repetidos, como `networks: - rede`, `restart` e `depends_on` nos serviços seguintes, são explicados uma vez só, sem repetir a mesma frase)

## 4. Versionamento (GitHub)
- [ ] Repositório público criado
- [ ] Commits frequentes com mensagens claras (`feat:`, `fix:`)
- [ ] Branch principal `main` com versão final funcionando

## 5. README.md
- [ ] Título e descrição do projeto
- [ ] Pré-requisitos (Docker/Docker Compose)
- [ ] Passo a passo (clonar, `docker-compose up -d`, como a tabela é criada, acessar `localhost:8080`)
- [ ] Explicação detalhada do docker-compose.yaml (serviços, variáveis, rede)
- [ ] Mínimo 3 pontos interessantes/aprendizados da dupla
- [ ] Autores (nomes completos)

## 6. Restrições
- [x] Sem `.env`
- [x] Sem healthcheck / script de inicialização automática
- [ ] Testado numa máquina limpa (sem PHP/banco instalados localmente)

## 7. Entrega
- [ ] Link do repositório entregue até o início da aula do dia 10/09
