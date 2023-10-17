<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestInformation extends Model
{
    protected $fillable = [
        'organization_or_individual_name',
        'contact_person',
        'contact_address_street',
        'contact_address_ward',
        'contact_address_district',
        'phone_number',
        'email',
        'CDCD',
        'DayCDCD',
        'NameCDCD',
        'DirecrtCDCD',
        'address',
        'ward',
        'district',
        'sheet_number',
        'plot_number',
        'boundary_scope',
        'area_size',
        'coordinate_x',
        'coordinate_y',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
