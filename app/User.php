<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
//    use SoftDeletes;
    
    protected $guarded = [
        'ban',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    //==================================================================================================================
    
    /**
     * Проверка статуса "Админ"
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin == 1;
    }
    
    //==================================================================================================================
    
    /**
     * Возвращает ФИО пользователя в заданном порядке.
     * Точка сокращает слово до инициала. Например:
     * 'f i o'  -> 'Фамилия Имя Отчество'
     * 'i f'    -> 'Имя Фамилия'
     * 'i.o. f' -> 'И.О. Фамилия'
     * 'f.i.o.' -> 'Ф.И.О.'
     *
     * @param string $pattern
     * @return string
     */
    public function getFio(string $pattern = 'f i o') : string
    {
        $pattern = mb_strtolower($pattern);
        
        $name = [];
        $fio  = [
            'f' => $this->surname,
            'i' => $this->name,
            'o' => $this->patronymic,
        ];
        
        foreach (str_split($pattern) as $key => $item)
        {
            if ($key > 0 && $item == '.')
                $name[$key - 1] = str_limit($name[$key - 1], $limit = 1, '');
            
            // если символ не является паттерном, то возвращается как есть
            $name[$key] = (key_exists($item, $fio)) ? $fio[$item] : $item;
        }
        
        return trim(implode('', $name));
    }
    
    //==================================================================================================================
    
    /**
     * Возвращает пользователя(лей) по адресу e-mal
     *
     * @param      $email
     * @param bool $allOfThem
     * @return mixed
     */
    public static function getUserByEmail($email, $allOfThem = false)
    {
        $users = self::where('email', $email);
        
        return ($allOfThem) ? $users->get() : $users->first();
    }
    
    //==================================================================================================================
    
}
