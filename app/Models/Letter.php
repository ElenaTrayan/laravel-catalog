<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $table = 'letters';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'message',
        'name',
        'email',
        'phone_cell',
    ];
    /**
     * Тема письма(значение поля type)
     * 1 - Технический вопрос
     * 2 - Проблемы с заказом
     * 3 - Партнерское предложение
     * 4 - Другое
     */
    const SUBJECT_1 = 1;
    const SUBJECT_2 = 2;
    const SUBJECT_3 = 3;
    const SUBJECT_4 = 4;
    const SUBJECT_5 = 5;
    public static $subjects = [
        self::SUBJECT_1 => 'Технический вопрос',
        self::SUBJECT_2 => 'Проблемы с заказом',
        self::SUBJECT_3 => 'Партнерское предложение',
        self::SUBJECT_4 => 'Пожелание, предложение',
        self::SUBJECT_5 => 'Другое',
    ];
    /**
     * @var array Validation rules
     *
     */
    public static $rules = [
        'type' => 'required',
        'name' => 'required|max:50|regex:/^[A-Za-zА-Яа-яЁёЇїІіЄє \-\']+$/u',
        'email' => 'required|email|max:255',
        'message' => 'required|min:3',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($letter) {
            //
        });

        static::deleting(function($letter) {
            if(!$letter->deleted_at) {
                $letter->deleted_at = Carbon::now();
                $letter->save();
                return false;
            }
        });
    }
}
