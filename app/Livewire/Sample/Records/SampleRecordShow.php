<?php

namespace App\Livewire\Sample\Records;

use App\Models\Sample\SampleRecord;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;

class SampleRecordShow extends Component
{
    public SampleRecord $record;

    public function mount(SampleRecord $record): void
    {
        $this->record = $record;
    }

    public function render(): View
    {
        return view('livewire.sample.records.show');
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(): void
    {
        $this->authorize('delete', $this->record);

        $uploadFields = ['file', 'image'];
        foreach ($uploadFields as $field) {
            if ($this->record->{$field}) {
                Storage::delete($this->record->{$field});
            }
        }

        $this->record->delete();
        session()->flash('message', 'Data deleted.');// todo: translate
        $this->redirectRoute('sample.records.index');
    }

}
