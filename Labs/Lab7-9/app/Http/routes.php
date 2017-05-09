<?php

class Mailer
{

}


class RegistersUsers
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

//App::bind('foo', function () {
//    return new RegistersUsers(new Mailer);
//});
//App::bind();

//=======================================================

Route::get('/', function (RegistersUsers $registration) {
   var_dump($registration);
    return view('welcome');
});


//=======================================================

//Lab7-8
Route::get('cards', 'CardsController@index');
Route::get('cards/{card}', 'CardsController@show');
Route::post('cards/{card}/notes', 'NotesController@store');
Route::get('notes/{note}/edit', 'NotesController@edit');
Route::patch('notes/{note}', 'NotesController@update');

//Lab9
Route::auth();
Route::get('/dashboard', 'HomeController@index');//->middleware('auth');

Route::get('begin', function () {

    flash('You are now signed in!');

    return redirect('/');
    //return Redirect::to('/');
});

//Route::get('/', function () {
//    return view('welcome');
//});