<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class System_Enterprise extends Model
{
    protected $table = 'System_Enterprise';//表名
    protected $primaryKey = "Id";//主键

    protected $fillable = ['ParentId', 'Name', 'ShortName', 'Logo', 'LegalPerson', 'FoundTime', 'Phone', 'Fax', 'Address', 'Slogan', 'Abstract'];

    public static $rules = [
        'Name' => 'required|alpha_num|min:2'
    ];
}
