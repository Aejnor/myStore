# myStore
#### Instalacion del proyecto

- Despues de clonar el repositorio, ejecutamos el comando `composer install`

- Ahora tendremos que modificar el archivo Homestead.yaml dentro de la carpeta 
donde tengamos instalado el Homestead, añadir la ruta del proyecto y la base
de datos llamada myStore.

- En Mac/linux ir a la ruta /etc/hosts, y añadirle `192.168.10.10 myStore.test`

- En el proyecto clonado, tenemos un archivo que se llama `.env.example` 
```dotenv
    - DB_HOST=192.168.10.10
    - APP_URL=http://myStore.test
    - DB_DATABASE=myStore    
```
- Despues de editar el archivo `.env.example` lo refactorizamos a `.env`

- Ejecutamos el comando `php artisan migrate --seed`

- Y los datos de inicio de sesion los cogemos directamente de la base de datos,
en este caso todos los usuarios de pruebas que se crean con el seed, tienen la
***pass* ``secret``**

------------
 ```
 Todo lo relacionado con pedido, factura y reviews; No funciona, esta pendiente de programar
 ```
 
 
 #Parte Cliente/Interfaz
 - Componentes no utilizados en el proyecto
 
    - Carousel: No lo he visto necesario.
    - Breadcrumb: No me gusta.
    - Collapse: No he visto el sitio donde ponerlo
    - Popover: No me gusta el estilo.
    - Modal: No he tenido la oportunidad de incorporarlo.
    - Progress: No era necesario.
    
