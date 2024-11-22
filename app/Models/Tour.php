<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Tour extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function description() {
        //$store->description->name
        
        $locale = App::currentLocale();
        return $this->hasOne(TourDescription::class)->whereLanguageCode($locale);
    }
}
