<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function bank() 
    {
        return $this->hasOne(Bank::class);
    }

    public function certification()
    {
        return $this->hasOne(Certification::class);
    }

    public function collection_model()
    {
        return $this->hasOne(CollectionModel::class);
    }

    public function commercial_agent()
    {
        return $this->hasOne(CommercialAgent::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currencies()
    {
        return $this->belongsToMany(Currency::class);
    }

    public function devolution()
    {
        return $this->belongsTo(Devolution::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function payment_methods()
    {
        return $this->belongsToMany(PaymentMethod::class);
    }

    public function programming_language()
    {
        return $this->hasOne(ProgrammingLanguage::class);
    }

    public function sites()
    {
        return $this->hasOne(Site::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
