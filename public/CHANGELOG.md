# Changelog
Все значимые изменения проекта будут задокументированы в этом файле.

Формат основан на [Keep a Changelog](http://keepachangelog.com/ru/1.0.0/)
и этот проект придерживается [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

### Changed

### Deprecated

### Removed

### Fixed

### Security



## [0.0.6] - 2018-09-24
### Changed
- При удалении приглашённого из таблицы *users*, он также удаляется из таблицы *invites*
- При удалении приглашавшего, поле *inviter_id* в таблице *invites* устанавливается в NULL для всех им приглашённых

## [0.0.5] - 2018-09-24
### Fixed
- При регистрации не сохранялись фамилия и отчество

## [0.0.4] - 2018-09-24
### Added
- Добавлен функционал регистрации по приглашению.

## [0.0.3] - 2018-09-24
### Added
- Установлен js-пакет [SweetAlert2](https://github.com/sweetalert2/sweetalert2)
- Установлен пакет-обёртка [SweetAlert 2](https://github.com/softon/sweetalert)

## [0.0.2] - 2018-09-24
### Added
- Установлен [Laravel 5 IDE Helper Generator](https://github.com/barryvdh/laravel-ide-helper)
    [Подсказки](https://evilinside.ru/kak-sozdat-novyj-proekt-na-laravel-5-6/)
- Установлен [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)

### Changed
- Настроена локализация шаблонов.
    + общие фразы, не зависящие от контента, вынесены в файл *ru.json*
    + фразы, связанные с контентом или содержащие замещения, сохраняются в файлах *lng.php* для каждой локализации

## [0.0.1] - 2018-09-24
### Added
- Установлен фреймворк [Laravel](https://github.com/laravel/laravel) + Auth
- Добавлен файл **CHANGELOG**