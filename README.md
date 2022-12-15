
## Punto de venta

Sistema para la gestión de ventas desarrollado con Laravel y Livewire


## Feartures

- Agregar productos a la venta, a traves de codigo de barras
- Modulo de Usuarios
- Modulo de Productos
- Modulo Categorias
- Modulo Monedas
- Modulo Roles y permisos
- Modulo Corte de caja
- Reportes ventas por día y entre fechas (PDF y Excel)


## Installación

Puedes seguir estos pasos para la instalación:

* Clonar desde github (usar github desktop)
```bash
  git clone https://github.com/dandev453/ryalgit.git
```
* Vaya a la carpeta del proyecto
```bash
  cd ryalgit
```
* Instalar dependencias con composer desde consola
```bash
  composer install
```

* Instalar dependencias node
```bash
  npm install
```

* Instalar dependencias node
```bash
  npm install
```

## Variables de entorno

Para ejecutar este proyecto, Necesitarás añadir las siguientes variables de entorno en **.env file**

`DB_DATABASE=your-database`

`DB_USERNAME=your-username`

`DB_PASSWORD=your-password`

`APP_KEY=base64:APP_KEY` (**)

** para generar el APP_KEY, se necesita ejecutar el siguiente comando:

```bash
  php artisan key:generate
```
## Ejecutar Localmente

Ejecutar las migraciones y datos de prueba

```bash
  php artisan migrate:fresh --seed
```
Habilitar el storage para que se pueda subir archivos

```bash
  php artisan storage:link
```

Iniciar el server

```bash
  php artisan serve
```
##### ** te recomiendo usar laragon o Sail **


#
Ir a

http://localhost:8000 (tu localhost)

utilizar usuario para prueba:
```bash
    user: example@admin.com
    pass: password
```


## Screenshots
![X-printer](https://lh3.googleusercontent.com/drive-viewer/AFDK6gOBnhkxMyfkpM_B-RaQpNbQk_K8SIh53gGXaNVNpG4W7PDhu4YHf5SBEqu6BFcsz3heOPZ63FXgmZOXFendFdNwsP444A=w1001-h637)

![Barcode-Scanner](https://th.bing.com/th/id/OIP.6YsqX3Tu5USPakt-pEKA6wAAAA?pid=ImgDet&w=224&h=224&rs=1)
#### Crear productos

## Feedback

Si tienes algun Feedback, por favor hazme saber dkinslert@gmail.com