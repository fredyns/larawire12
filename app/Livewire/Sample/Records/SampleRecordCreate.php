<?php

namespace App\Livewire\Sample\Records;

use App\Models\Sample\SampleRecord;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SampleRecordCreate extends Component
{
    #[Validate('nullable|uuid|exists:users,id')]
    public ?string $user_id = null;

    #[Validate('required|string|min:3|max:255')]
    public string $string = '';

    #[Validate('nullable|email|max:255')]
    public ?string $email = null;

    #[Validate('nullable|ip')]
    public ?string $i_p_address = null;

    #[Validate('nullable|integer|min:0|max:100')]
    public ?int $integer = null;

    #[Validate('nullable|numeric|min:0|between:0,999999.99')]
    public ?float $decimal = null;

    #[Validate('nullable|string|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{3}-\d{2}$/')]
    public ?string $n_p_w_p = null;

    #[Validate('nullable|date_format:Y-m-d H:i:s')]
    public ?string $datetime = null;

    #[Validate('nullable|date_format:Y-m-d')]
    public ?string $date = null;

    #[Validate('nullable|date_format:H:i')]
    public ?string $time = null;

    #[Validate('nullable|boolean')]
    public ?bool $boolean = false;

    //todo: validate
    #[Validate('nullable|string|in:enabled,disabled')]
    public ?string $enumerate = null;

    #[Validate('nullable|string|max:65535')]
    public ?string $text = null;

    #[Validate('nullable|string|max:65535')]
    public ?string $markdown_text = null;

    #[Validate('nullable|string|max:65535')]
    public ?string $w_y_s_i_w_y_g = null;

    #[Validate('nullable|numeric|between:-90,90')]
    public ?float $latitude = null;

    #[Validate('nullable|numeric|between:-180,180')]
    public ?float $longitude = null;

    public SampleRecord $record;

    public function mount(Request $request): void
    {
        $this->record = new SampleRecord([
            // took default values from GET request
            'user_id' => (string)$request->get('user_id'),
            'string' => (string)$request->get('string'),
            'email' => (string)$request->get('email'),
            'i_p_address' => (string)$request->get('i_p_address'),
            'integer' => (int)$request->get('integer'),
            'decimal' => (float)$request->get('decimal'),
            'n_p_w_p' => (string)$request->get('n_p_w_p'),
            'datetime' => (string)$request->get('datetime'),
            'date' => (string)$request->get('date'),
            'time' => (string)$request->get('time'),
            'boolean' => (bool)$request->get('boolean'),
            'enumerate' => (string)$request->get('enumerate', 'enabled'),
            'latitude' => (float)$request->get('latitude'),
            'longitude' => (float)$request->get('longitude'),
            'created_by' => Auth::id(),
            'upload_dir' => (string)old('upload_dir', date('Y/m/d') . '/' . Str::orderedUuid()),
        ]);
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->record->fill($data);
        $this->record->save();

        $this->redirectRoute('sample.records.show', ['record' => $this->record]);
    }

//    public function validate($rules = null, $messages = [], $attributes = []): array
//    {
//        $data = parent::validate($rules, $messages, $attributes);
//
//        // convert empty strings to null
//        foreach ($data as $key => $value) {
//            if ($value === '') {
//                $data[$key] = null;
//            }
//        }
//
//        return $data;
//    }

    /**
     * @throws AuthorizationException
     */
    public function render(): View
    {
        $this->authorize('create', SampleRecord::class);

        return view('livewire.sample.records.create', [
            'users' => User::pluck('name', 'id'),
        ]);
    }
}
