# Formulario-producto
Es un formulario con PHP que envía a los valores una Base de datos Mysql
![image](https://github.com/user-attachments/assets/57c1d8c5-4dac-47a7-8ef1-66c99b68f463)


El modelo usa es un modelo MVC, con las siguientes tecnologias:
- PHP 8.1.10
- Mysql 8.0.30
- HTML 5
- AJAX 
- CSS

  La estructura de la BD es la siguiente:
  ![image](https://github.com/user-attachments/assets/981b5b43-7520-45f7-bd98-37b5b8007f98)

## Para poder hacer uso del proyecto 
- Primeramente clonar o descargar el proyecto del repositorio
- Luego importar la Base de datos
En los archivos hay un script en sql llamado Dump20241105.sql

Solo tienen que importarlo a través de Workbrench en la pestaña de Server/Data import

![image](https://github.com/user-attachments/assets/13d349e1-17fb-4310-a248-a4c9eeded3b9)

Posteriormente seleccionan "Import from Self-Contained File"
![image](https://github.com/user-attachments/assets/e60ba699-b4cd-447b-bc73-b707367f843a)
y comienzan la importación. 


El nombre de la BD se llama **formulario_productos**

La configuración de la conexión a la BD está en modelo/producto.modelo.php
![image](https://github.com/user-attachments/assets/517d09c1-bfdd-450b-9b56-ea37a5ed5fcc)



