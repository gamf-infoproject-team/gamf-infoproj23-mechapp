<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicleId', 'customerId', 'createdBy', 'updatedBy', 'description', 'state', 'finalizeDate'
       ];

    public function vehicle()
    {
       return $this->belongsTo(Vehicle::class, 'id');
    }
    public function customer()
    {
       return $this->belongsTo(Customer::class, 'id');
    }
    public function job()
    {
        return $this->hasMany(Job::class, 'quotationId', 'id');
    }

    public function worksheet()
    {
        return $this->hasOne(Worksheet::class, 'quotationId', 'id');
    }
}
