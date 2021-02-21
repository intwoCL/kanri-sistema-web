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



# Como iniciar el proyecto
```
php artisan migrate:fresh --seed


php artisan storage:link
php artisan migrate:refresh --seed

composer dump-autoload

php artisan cities:import
```

Usuarios
|U  | username o mail | pass | role |
|---|---|---|---|
|u1 | pablo.ignacio288@gmail.com | 123456| admin|
|u2 | benja.torres@hotmail.cl  | 12345678   | user|