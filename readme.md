# Teste - Desenvolvedor Full Stack | Laravel + Vue 

## Folders
- Back end(Laravel)
- Front end(Vue.js)

## Como iniciar o projeto

```sh
chmod +x start.sh
./start.sh
```

## Como parar o projeto

```sh
chmod +x stop.sh
./stop.sh
```

> Ambiente que usei para criar o projeto foi Linux(Ubuntu), é onde fico mais a vontade para trabalhar.
> No backend usei Docker Compose, mas com laravel sail(mysql, php), e no frontend usei tambem Docker Compose.

## front se precisar fazer novo build.

`docker exec -i vuejs-app npm run build`

## Back End caso nao rodar de imediato as migrations via sail e outros.
```
    ./vendor/bin/sail artisan migrate --seed
    ./vendor/bin/sail artisan passport:install
    ./vendor/bin/sail artisan key:generate
    ./vendor/bin/sail artisan config:cache
```

## Caso voce use windows, alguns links abaixo de como instalar docker.
# Installing on Windows
- Docker Toolbox (Windows): https://docs.docker.com/toolbox/toolbox_install_windows/
choco install docker-toolbox
- Docker-for-Windows: https://docs.docker.com/docker-for-windows
choco install docker-for-windows
- Docker Compose: https://docs.docker.com/compose/
choco install docker-compose

## Docker Desktop no Windows rodando com WSL 2
- https://www.treinaweb.com.br/blog/docker-desktop-no-windows-rodando-com-wsl-2?gclid=Cj0KCQjw4NujBhC5ARIsAF4Iv6cKpdSxMVev4xaqGbjuLT9FlvdfOeJlV0dWPUSQxuhEKaPnZv-c91AaAkPiEALw_wcB