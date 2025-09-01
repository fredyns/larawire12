<?php

use App\Enums\Sample\SampleRecordEnumerate;

/**
 * @var $users array<int, string>
 * @var $record App\Models\Sample\SampleRecord
 */
?>
<div>
    <div class="flex-1 space-y-6">
        <flux:select
            wire:model="user_id"
            label="{{ __('User') }}"
            name="user_id"
        >
            <flux:select.option class="text-gray-400 dark:text-gray-600 italic">select user</flux:select.option>
            @foreach ($users as $userID=>$userName)
                <flux:select.option value="{{ $userID }}">{{ $userName }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:input
            wire:model="string"
            label="{{ __('String') }}"
            type="text"
            name="string"
            required
        />

        <flux:input
            wire:model="email"
            label="{{ __('Email') }}"
            type="email"
            name="email"
        />

        <flux:input
            wire:model="i_p_address"
            label="{{ __('IP Address') }}"
            type="text"
            name="i_p_address"
            x-mask="999.999.999.999"
            placeholder="999.999.999.999"
        />

        <flux:input
            wire:model="integer"
            label="{{ __('Integer') }}"
            type="number"
            name="integer"
            min="0"
            max="100"
        />

        <flux:input
            wire:model="decimal"
            label="{{ __('Decimal') }}"
            type="number"
            step="any"
            name="decimal"
        />

        <flux:input
            wire:model="n_p_w_p"
            label="{{ __('NPWP') }}"
            type="text"
            name="n_p_w_p"
            x-mask="99.999.999.9-999.999"
            placeholder="99.999.999.9-999.999"
        />

        <flux:input
            wire:model="datetime"
            label="{{ __('Datetime') }}"
            type="datetime-local"
            name="datetime"
            class="w-fit"
        />

        <flux:input
            wire:model="date"
            label="{{ __('Date') }}"
            type="date"
            name="date"
            class="w-fit"
        />

        <flux:input
            wire:model="time"
            label="{{ __('Time') }}"
            type="time"
            name="time"
            class:input="w-fit"
        />

        <flux:switch
            wire:model="boolean"
            label="{{ __('Boolean') }}"
            align="left"
        />

        <flux:radio.group
            wire:model="enumerate"
            label="{{ __('Enumerate') }}"
            name="enumerate"
            variant="segmented"
            class="w-fit"
        >
            @foreach (SampleRecordEnumerate::cases() as $enumerate)
                <flux:radio
                    value="{{ $enumerate->value }}"
                    label="{{ $enumerate->name }}"
                />
            @endforeach
        </flux:radio.group>

        <flux:textarea
            wire:model="text"
            label="{{ __('Text') }}"
            type="text"
            name="text"
        />

        <flux:input
            wire:model="file"
            label="{{ __('File') }}"
            type="file"
            name="file"
        />

    </div>
</div>
