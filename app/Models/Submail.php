<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\SubMail;

class Submail extends Model
{
    use HasFactory;

    public $fillable = ['email'];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot()
    {

        parent::boot();

        static::created(function ($item) {

            $adminEmail = "ek.hassan.07@gmail.com";
            Mail::to($adminEmail)->send(new SubMail($item));
        });
    }
}