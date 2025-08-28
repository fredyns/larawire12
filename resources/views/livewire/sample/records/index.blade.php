<?php
/**
 * @var $records \Illuminate\Pagination\LengthAwarePaginator | \App\Models\Sample\SampleRecord[]
 */
?>
<section>

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Sample Records') }}</flux:heading>
        <flux:separator variant="subtle"/>
    </div>

    <x-alerts.success/>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800"
            >
                <div class="flex justify-between">
                    <div class="flex items-center gap-4">
                        <flux:input
                            type="text"
                            wire:model.live.debounce.500ms="search"
                            icon="magnifying-glass"
                            placeholder="Search..."
                            clearable
                        />
                    </div>
                    <div>
{{--                        <flux:button--}}
{{--                            href="{{ route('sample.records.create') }}"--}}
{{--                            variant="primary"--}}
{{--                        >--}}
{{--                            {{ __('Add New Record') }}--}}
{{--                        </flux:button>--}}
                    </div>
                </div>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    String
                </th>
                <th scope="col" class="px-6 py-3">
                    Integer
                </th>
                <th scope="col" class="px-6 py-3">
                    Boolean
                </th>
                <th scope="col" class="px-6 py-3">
                    Enumerate
                </th>
                <th scope="col" class="px-6 py-3">
                    File
                </th>
                <th scope="col" class="px-6 py-3 text-center" width="150px">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr
                    wire:key="record-{{ $record->id }}"
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200"
                >
                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $record->string }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $record->integer }}
                    </td>
                    <td class="px-6 py-4">
                            <span @class([
                                'text-green-600' => $record->boolean,
                                'text-red-700' => ! $record->boolean,
                            ])>
                                {{ $record->boolean ? '✓' : '×' }}
                            </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($record->enumerate)
                            <span class="rounded-full bg-gray-200 px-2 py-1 text-xs">
                                {{ $record->enumerate->value }}
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($record->file)
                            <a href="{{ $record->file }}" target="_blank">
                                <img src="{{ $record->file }}" alt="{{ $record->string }}" class="w-8 h-8"/>
                            </a>
                        @endif
                    </td>
                    <td class="px-6 py-4 space-x-2 flex items-end justify-center">
                        <flux:button href="{{ route('sample.records.show', $record->id) }}" variant="filled">
                            <flux:icon.eye variant="mini"/>
                        </flux:button>
{{--                        <flux:button href="{{ route('sample.records.edit', $record) }}" variant="filled">--}}
{{--                            <flux:icon.pencil variant="mini"/>--}}
{{--                        </flux:button>--}}
                        <flux:button
                            wire:confirm="Are you sure?"
                            wire:click="delete('{{ $record->id }}')"
                            variant="danger" type="button"
                        >
                            <flux:icon.trash variant="mini"/>
                        </flux:button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if($records->hasPages())
        <div class="mt-5">
            {{ $records->links() }}
        </div>
    @endif
</section>
