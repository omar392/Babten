<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar','name_en','email','phone','facebook','twitter','linkedin','instagram','address_ar','address_en',
        'whatsapp',
        'mobile',
        'mail_transport',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from',
        //
        'brandtitle_ar',
        'brandtitle_en',
        'welcometext_ar',
        'welcometext_en',
        'msgtext_ar',
        'msgtext_en',
        'footer_ar',
        'footer_en',
        //
        'contact_mail',
        'job_mail',
        'offer_mail',
        'sub_mail',
];

    public function getFooterAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->footer_ar;
        }
        return $this->footer_en;
    }
    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        }
        return $this->name_en;
    }
    public function getAddressAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->address_ar;
        }
        return $this->address_en;
    }

    public function getMsgtextAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->msgtext_ar;
        }
        return $this->msgtext_en;
    }
    public function getWelcometextAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->welcometext_ar;
        }
        return $this->welcometext_en;
    }
    public function getBrandtitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->brandtitle_ar;
        }
        return $this->brandtitle_en;
    }

}