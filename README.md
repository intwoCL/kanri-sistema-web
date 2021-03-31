## Kanri sistema

Es un proyecto de gestion para empresas y negocios locales

Creado por (Justice2197)[https://github.com/Justice2197]

# Modulos
- Productos
  - Mantendor, manejo de stock
- Usuarios
  - Mantendor
- Roles [Administrador, Usuario]
-Presupuesto
  - Mantenedor



# Instalar paquetes del proyecto

composer install
(si da problemas de instalación de "composer", borrar el archivo "composer.lock", reiniciar laragon y reintentar la instalación)

npm install


# Como iniciar el proyecto
```
alternativo -> php artisan migrate --seed

php artisan migrate:fresh --seed


php artisan storage:link
php artisan migrate:refresh --seed

composer dump-autoload

php artisan cities:import

npm run dev

alternativa-> npm run watch
```

Usuarios
|U  | username o mail | pass | role |
|---|---|---|---|
|u1 | pablo.ignacio288@gmail.com | 123456| admin|
|u2 | benja.torres@hotmail.cl  | 12345678   | user|