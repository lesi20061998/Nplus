<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestInformation extends Model
{
    protected $fillable = [
        'id',
        'organization_or_individual_name',
        'contact_person',
        'Birthday',
        'contact_address_city',
        'contact_address_district',
        'contact_address_ward',
        'contact_address_street',
        'city',
        'district',
        'ward',
        'street',
        'phone_number',
        'email',
        'CDCD',
        'DayCDCD',
        'NameCDCD',
        'DirecrtCDCD',
        'sheet_number',
        'plot_number',
        'area_size',
        'ImageUrl',
        'Reason',
        'infomation_Check',
        'requestinfomation_function',
        'coordinates'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
