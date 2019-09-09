# Actualizar la Base de Datos
------------

# Modificaciones necesarias para la última versión:

##### Para exponer y recibir correctamente datos en los servicios POST, GET, PUT en Codeigniter, se debe hacer el siguiente ajuste en el apache:

**- cd /etc/apache2/mods-enabled/**
 - locate mod_rewrite

**- /usr/lib/apache2/modules/mod_rewrite.so**
 - touch rewrite.load
 - nano rewrite.load
 

------------

# Ciclomontaña
Prueba para FrePort Store.

## Instalación

 - Preparar el ambiente
	 - Se recomienda usar **MAMP** o **XAMPP** para ejecutar el proyecto de forma sencilla.
	 - Iniciar los servicios **Apache** y **MySql**.
 - Clonar el repositorio (en *htdocs*).
 - Crear la Base de Datos "**ciclomontana**".
 - Importar el archivo "**ciclomontana_db.sql**" en la Base de Datos creada.
 - Editar el archivo "*carpeta_proyecto*/application/config/**database.php**" con los datos del usuario de la Base de Datos, Host y Base de Datos (si fue cambiada).
 - Situarse en la "*carpeta_proyecto*" por consola y ejecutar "**composer install**".
 - El proyecto debe estar ejecutándose en una ruta igual o parecida a "[**http://localhost/*carpeta_proyecto*/public**](http://localhost/carpeta_proyecto/public)" (validar los puertos).

## Datos de acceso

 - **Email**: johnwainer@gmail.com
 - **Contraseña**: 12345

## Recorrido breve

 - Al ingresar se llega a los reportes solicitados
	 - En gráfica de "**Pie**" se encuentra la distribución de **Visitas a Clientes por Ciudad**.
	 - En la gráfica de "**barras**" se encuentra en movimiento del **Saldo del Cupo de los clientes por fechas** (Esta gráfica es dinámica y se refresca dependiendo del cliente que se tenga seleccionado en la lista sobre esta).
 - En el menú superior se encuentran los links a **clientes** y **vistas**, allí se verán los listados de estos, se pueden *crear*, *editar* y *eliminar*.

## Consideraciones técnicas

En general el sistema funciona con **MVC**, se utilizó **ajax** para agregar dinamismo en el cálculo del "*Valor visita*" y en la generación de reportes gráficos en el escritorio.

 - **Framework**: Codeigniter 3.1 (composer install)
 - **Css Framework**: Bootstrap 4
 - **Librería javascript**: jQuery
 - **Gráficas reporte**: jquery.canvasjs.min.js
 - **Base de Datos**: MySql
 - **Modelo de datos**:
![enter image description here](http://johnwainer.com/bd.png)

## Restricciones del sistema

 - Todas las URLs y Servicios creados están protegidos por un validador de sesión desde el constructor de cada controlador.
 - Se agregaron las llaves foráneas necesarias y borrado en cascada en cada una de ellas.
	 - Por ejemplo si se borra un cliente, se borrarán las visitas asociadas a este.
 - Cuando se **agrega** o **elimina** una visita, se actualiza el "***Saldo cupo***" en el cliente.
 - Cuando se **edita** un **cliente**, **NO** se permite cambiar "*NIT*" (se solicitó guardar encriptado), "*Cupo*" o "*Porcentaje visitas*", para garantizar la integridad de los datos y no hacer más extenso el proceso de actualización de "*Saldo cupo*".
 - Cuando se **edita** una **visita**, **NO** se permite cambiar "*Cliente*", "*Valor neto*" o "*Valor visita*", para garantizar la integridad de los datos y no hacer más extenso el proceso de actualización de "*Saldo cupo*".
