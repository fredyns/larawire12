<?php
/**
 * @var $record App\Models\Sample\SampleRecord
 * todo: add var $users array<int, string>
 */
?>
<section id="records-edit">
    <div class="w-full max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="relative mb-6 w-full">
            <flux:heading size="xl" level="1">{{ __('Edit Record') }}</flux:heading>
            <flux:separator variant="subtle" class="my-6"/>
        </div>

        <div class="flex flex-grow gap-x-4 mb-10">
            <flux:button href="{{ route('sample.records.show',$record) }}"
                         variant="filled">{{ __('Cancel') }}</flux:button>
            <flux:button href="{{ route('sample.records.index') }}" variant="filled">{{ __('Index') }}</flux:button>
        </div>

        <div class="min-w-full align-middle">
            <form wire:submit="save" class="flex flex-col gap-6">

                @include('livewire.sample.records.form-inputs')

                <div class="flex justify-end">
                    <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
                </div>
            </form>
        </div>

    </div>
</section>
