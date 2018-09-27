<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Invite extends Model
{
    protected $fillable = ['email', 'message'];
    
    //-----------------------------------------------------
    
    /**
     * Связываем модель приглашения с моделью пользователя, отправляющего приглашение
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inviter() {
        return $this->belongsTo('User', 'inviter_id');
    }
    
    /**
     * Связываем модель приглашения с моделью пользователя, получившего приглашение
     * Может пригодиться, если захотим показывать, кто кого пригласил
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invitee() {
        return $this->belongsTo('User', 'invitee_id');
    }
    
    //-----------------------------------------------------
    
    /**
     * Возвращает объект приглашения по коду и только если инвайт не использован
     *
     * @param $token
     * @return mixed
     */
    public static function getInviteByToken($token) {
        return Invite::where('invite_token', $token)->where('used_at', null)->first();
    }
    
    /**
     * Возвращает объект приглашения по адресу e-mal
     *
     * @param $email
     * @return mixed
     */
    public static function getInviteByEmail($email) {
        return Invite::where('email', $email)->first();
    }
    
    /**
     * Генератор кода приглашения
     */
    public function generateInviteToken() {
        $this->invite_token = md5(microtime());
    }
    
    /**
     * Отправка приглашения на e-mail
     *
     * @return $this
     */
    public function sendInvitation() {
        $inviter = User::find($this->inviter_id);
        $params = [
            'inviter'      => $inviter->getFio('i f'),
            'site'         => env('APP_NAME'),
            'message_text' => $this->message ?? '',
            'invite_token' => $this->invite_token,
        ];
//dd($params, __METHOD__);
        
        Mail::send('emails.invite', $params, function ($message) {
            $message->from(\Auth::user()->email)->to($this->email)->subject(__('app.invite_mail_subject'));
        });
        
        return $this;
    }
    
    
    
    
}
