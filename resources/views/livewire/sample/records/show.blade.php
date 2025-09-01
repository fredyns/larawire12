<?php
/**
 * @var $record SampleRecord
 */

use App\Models\Sample\SampleRecord;

?>

<section class="w-full max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('View Record') }}</flux:heading>
        <flux:separator variant="subtle"/>
    </div>

    <div class="flex flex-grow gap-x-4 mb-4 justify-end">
        <flux:button
            href="{{ route('sample.records.index') }}"
            variant="filled"
            icon="table-cells"
        >
            {{ __('Index') }}
        </flux:button>
        <flux:button
            href="{{ route('sample.records.edit', $record) }}"
            variant="filled"
            icon="pencil"
        >
            {{ __('Edit') }}
        </flux:button>
        <flux:button
            wire:confirm="Are you sure?"
            wire:click="delete()"
            variant="danger" type="button"
            icon="trash"
        >
            {{ __('Delete') }}
        </flux:button>
    </div>

    @include('livewire.sample.records.show-slim', ['record' => $record])

</section>
