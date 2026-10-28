## Executando o CRUD com acesso externo

**Ambiente:** Ubuntu + Docker Compose.

**Subir o projeto:**

```bash
git clone https://github.com/LucasCchaves/docker.git
cd docker
docker compose up -d
```

**Descobrir o IP da máquina:**

```bash
hostname -I
```

**Acessar pelo navegador (IP:PORTA):**

- CRUD: `http://IP:8080`
- phpMyAdmin: `http://IP:8081` (usuário `app`, senha `app`)

Exemplo: `http://192.168.5.36:8080`

**Extra:** configurei um runner self-hosted do GitHub Actions na VM (workflow em `.github/workflows/teste.yml`).
