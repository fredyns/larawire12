<?php

namespace App\Livewire\Sample\Records;

use App\Models\Sample\SampleRecord;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SampleRecordIndex extends Component
{
    use WithPagination;

    public string $search = '';

    public function resetSearch(): void
    {
        $this->search = '';
    }

    public function updatingSearch(): void
    {
        $this->resetPage();            // jump back to page 1 on the new search
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(SampleRecord $record): void
    {
        $this->authorize('delete', $record);

        if ($record->file) {
            Storage::delete($record->file);
        }

        if ($record->image) {
            Storage::delete($record->image);
        }

        $record->delete();
        session()->flash('message', 'Data deleted.');// todo: translate
    }

    /**
     * @throws AuthorizationException
     */
    public function render(): View
    {
        $this->authorize('index', SampleRecord::class);

        if (!$this->search or $this->search == 'null') {
            $this->search = '';
        }

        $search = strlen($this->search) > 2 ? $this->search : '';
        $records = SampleRecord::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('livewire.sample.records.index', [
            'records' => $records,
        ]);
    }
}
