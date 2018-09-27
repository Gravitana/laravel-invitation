<?php

namespace App\Http\Controllers;

use App\Invite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Softon\SweetAlert\Facades\SWAL;

class InviteController extends Controller
{
    
    /**
     * Конструктор
     * Добавляет middleware, который позволяет ограничить доступ к созданию приглашения
     */
    public function __construct() {
        $this->middleware('admin');
    }
    
    //------------------------------------------------------------------------------------------------------------------
    
    /**
     * Возвращает view с формой создания приглашения
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.invite.create');
    }
    
    //------------------------------------------------------------------------------------------------------------------
    
    /**
     * Сохранение приглашения в БД и отправка на e-mail
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//dd($request->all(), __METHOD__);
        
        $this->validate($request, ['email' => 'required|email']);
//        $this->validate($request, ['email' => 'required|email|unique:invites,email|unique:users,email']);
        
        $email     = $request->get('email');
        $message   = $request->get('message');
        $user      = User::getUserByEmail($email);
        
        if ($user)
        {
            SWAL::message(__('Whoops!'),__('The user is already registered.'),'error',['timer'=>5000]);
            return redirect()->back();
        }
        
        $inviter = Auth::user();
        $invite  = Invite::getInviteByEmail($email); // проверим, есть ли такое приглашение
        
        $isNew = !$invite; // новое приглашение или нет?
        
        if ($isNew)
            $invite = new Invite(); // создадим новое приглашение, если в БД нет такого
        else
            $message .= ' ('. __('Re-sent') .')';
        
        // заполним поля
        $invite->inviter_id = $inviter->id;
        $invite->email      = $email;
        $invite->message    = trim($message);
        $invite->generateInviteToken();
        
        //--------------- TODO реализовать выбор: отправлять повторно или нет
        $confirm = true;
        $confirmMessage = ($isNew)
            ? ''
            : __('This e-mail address is already in the database.').' '.__('app.invite.send_again')
        ;
        if (!$confirm)
            return redirect()->back();
        //---------------
        
        $invite->sendInvitation()->save(); // отправим приглашение и сохраним в БД
        
        $title = ($isNew) ? __('OK') : __('Re-sent');
        
        SWAL::message($title, __('app.invite.created_and_sent_to', ['email'=>$email]),'success',['timer'=>3000]);
        
        return redirect()->back();
    }
    
    //------------------------------------------------------------------------------------------------------------------
    
}
