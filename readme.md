# <img src="https://laravel.com/assets/img/components/logo-laravel.svg"> Регистрация по приглашению

## About
Регистрация пользователей происходит по ссылке из письма, высланного админом: 
- Администратор указывает e-mail пользователя в форме приглашения.
- На указанный адрес приходит письмо с ссылкой-токеном.
- По указанной ссылке пользователю становится доступна форма регистрации.
- После регистрации пользователя делается отметка в таблице *Invites*, чтобы исключить повторное использование данного токена.

## Использованы пакеты:
- [Laravel](https://github.com/laravel/laravel) - A PHP framework for web artisans
- [Laravel 5 IDE Helper Generator](https://github.com/barryvdh/laravel-ide-helper) - Complete phpDocs, directly from the source
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) - Laravel Debugbar (Integrates PHP Debug Bar)
- [SweetAlert2](https://github.com/sweetalert2/sweetalert2) - A beautiful, responsive, customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes. Zero dependencies.
- [SweetAlert 2](https://github.com/softon/sweetalert) - Laravel 5 Package for SweetAlert2. Use this package to easily show sweetalert2 prompts in your laravel app.

