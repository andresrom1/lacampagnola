# LA CAMPAGNOLA

Sitio institucional de LA CAMPAGNOLA

#### Ambientes

DEV - https://dev-lacampagnola.avatarla.xyz/


## Consideraciones generales

El repositorio contiene 3 branches principales:

- DEV (deploy automático) a https://dev-lacampagnola.avatarla.xyz/
- LIVE --> (deploy manual) a https://www.lacampagnola.com/
- DOCKER --> Es utilizado para generar el stack de docker para ser utilizado de forma local o productiva.

Los merges a cada uno de esos branches generará un proceso automático de deploy al ambiente correspondiente. Para actualizar el entorno de desarrollo (DEV) bastará con realizar un merge al branch DEV y esperar a que el proceso de deploy haya finalizado. Los cambios se verán reflejados en : [https://dev-lacampagnola.avatarla.xyz/](https://dev-lacampagnola.avatarla.xyz/)

\* **Es importante tener en cuenta que para la realización de cambios, se deberá crear un 'feature branch' a partir del branch principal (actualmente DEV) para luego realizar los merges correspondientes a cada ambiente**



## Deploy con Docker

### Requisitos previos

- Docker
- Docker-Compose
- Nginx (reverse proxy)

**1. Clonar el branch 'docker' del repositorio que contiene el código ya compilado:**

```python
git clone -b docker git@bitbucket.org:avatarlax/builds-lacampagnola.com.git

```
**2. Ejecutar el comando setup.sh con permisos de administrador.**

```python
sudo ./setup.sh 

```

**3. Ingresar los datos necesarios para la creación del ambiente.**

Ejemplo: 

*Enter the selected domain: **campagnola.local***

*Enter Database Name: **my_new_database_name***

*Enter Database Username: **my_new_database_user***

*Enter Database Password: **my_new_database_password***

**4. Chequear contenedores y puertos**



*0.0.0.0:***8999**->80/tcp*

**5. Igresar a la url creada** *(Ej campagnola.local)*

[http://campagnola.local:8999](http://campagnola.local)

**6. Configurar Reverse proxy (agregar vhost)**


```httpd
server {

    listen      80;
    server_name campagnola.local;
    add_header X-Frame-Options SAMEORIGIN;
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options nosniff;

    error_log  /var/log/nginx/lacampagnola.com.error_node.log;
    access_log /var/log/nginx/lacampagnola.com.access_node.log;

    gzip            on;
    gzip_types      text/plain application/xml text/css application/javascript;
    gzip_min_length 1000;


     location / {

        proxy_redirect                      off;
        proxy_set_header Host               $host;
        proxy_set_header X-Real-IP          $remote_addr;
        proxy_set_header X-Forwarded-For    $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto  $scheme;
        proxy_read_timeout          1m;
        proxy_connect_timeout       1m;
        proxy_pass                          http://localhost:8999;
    }
}

```

**6. Igresar a la url creada** *(Ej campagnola.local)*

[http://campagnola.local](http://campagnola.local)