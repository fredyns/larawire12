<?php

namespace App\Models\Sample;

use App\Enums\Sample\SampleRecordEnumerate;
use App\Helpers\JsonField;
use App\Models\Traits\CreatedBy;
use App\Models\Traits\Searchable;
use App\Models\Traits\UpdatedBy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "records".
 *
 * @property string $id
 * @property string $user_id
 * @property string $string
 * @property string $email
 * @property string $n_p_w_p
 * @property string $i_p_address
 * @property int $integer
 * @property float $decimal
 * @property Carbon $datetime
 * @property Carbon $date
 * @property Carbon $time
 * @property bool $boolean
 * @property string $enumerate
 * @property string $text
 * @property string $file
 * @property string $image
 * @property string $markdown_text
 * @property string $w_y_s_i_w_y_g
 * @property float $latitude
 * @property float $longitude
 * @property array $json
 * @property string $created_by
 * @property string $updated_by
 * @property string $upload_dir
 *
 * @property User $user
 *
 *
 *  Laravel Model API:
 * @method static create(array $data)
 * @method static paginate(int $int)
 * @method static array pluck(string $column, string $key, string $group = null)
 * @method static search(string $search)
 * @method static where(string $string, mixed $id)
 */
class SampleRecord extends Model
{
    use HasUuids;
    use CreatedBy;
    use HasFactory;
    use Searchable;
    use UpdatedBy;

    protected $fillable = [
        'user_id',
        'string',
        'email',
        'i_p_address',
        'integer',
        'decimal',
        'n_p_w_p',
        'datetime',
        'date',
        'time',
        'boolean',
        'enumerate',
        'text',
        'file',
        'image',
        'markdown_text',
        'w_y_s_i_w_y_g',
        'latitude',
        'longitude',
        'json',
        'created_by',
        'updated_by',
        'upload_dir',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datetime' => 'datetime',
        'date' => 'date',
        'time' => 'datetime:H:i:s',
        'boolean' => 'boolean',
        'json' => 'array',
        'enumerate' => SampleRecordEnumerate::class,
    ];

    public function json($key = null, $default = null)
    {
        return JsonField::getField($this, 'json', $key, $default);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
