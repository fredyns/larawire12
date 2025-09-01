<?php

namespace App\Livewire\Sample\Records;

use App\Models\Sample\SampleRecord;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SampleRecordEdit extends Component
{
//    use ConvertEmptyStringsToNull;

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

    public function mount(SampleRecord $record): void
    {
        $this->record = $record;

        foreach ($this->record->getFillable() as $field) {
            if (!property_exists($this, $field)) continue;

            $this->{$field} = $this->record->getRawOriginal($field);
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->record->update($data);

        $this->redirectRoute('sample.records.show', $this->record);
    }

    public function render(): View
    {
        return view('livewire.sample.records.edit', [
            'users' => User::pluck('name', 'id'),
        ]);
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
}
