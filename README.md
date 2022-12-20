# portal-phytoplankton

A fazer:
 - revisar htacess
 - melhorar para mobile
 - cadastrar dados
 - captcha
 - 2FA (email e senha)
 - mover arquivo de configrações do phinx para a pasta config
 - testes automatizados

## Pré-instalação
### Desenvolvimento
O projeto foi desenvolvido utilizando a Devilbox como plataforma de desenvolvimento LAMP (Linux, Apache, MySQL e PHP). A vantagem de usar a Devilbox é que ele se baseia no Docker, o que permite a facilidade e simplicidade da replicação do ambiente de desenvolvimento (mesmo em sistemas operacionais diferentes, como Windows, MacOS ou sistemas UNIX), o que é vantajoso para estabilidade de testes. Apesar do projeto funcionar independentemente da plataforma.
https://devilbox.readthedocs.io/en/latest/read-first.html

para iniciar:

```
docker-compose up -d
```

# Instalação

Crie uma nova pasta em seu servidor (provavelmente dentro da pasta 'www' ou 'htdocs'), em seguida, clone o projeto com o código abaixo no terminal.

Usamos o "**.**" no final do comando para ser clonado na pasta atual.

```c
git clone https://github.com/Mateus-Ryu/portal-phytoplankton .
```

Após colar o projeto, será necessário instalar as dependências do Composer, execute o comando abaixo no terminal.

```php
composer update
```
