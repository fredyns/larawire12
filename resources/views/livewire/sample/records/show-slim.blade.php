<?php
/**
 * @var $record SampleRecord
 */

use App\Models\Sample\SampleRecord;

?>
<div class="mb-6 mt-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap mt-2 px-4">
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.user_id') }}
                </h5>
                <span>
                    {{ $record->user?->name ?? '-' }}
                </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.string') }}
                </h5>
                <span> {{ $record->string ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.email') }}
                </h5>
                <span> {{ $record->email ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.integer') }}
                </h5>
                <span> {{ $record->integer ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.decimal') }}
                </h5>
                <span> {{ $record->decimal ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.n_p_w_p') }}
                </h5>
                <span> {{ $record->n_p_w_p ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.datetime') }}
                </h5>
                <span>
                    {{ $record->datetime?->format('D, d M Y, H:i') }}
                </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.date') }}
                </h5>
                <span>
                    {{ $record->date?->format('l, d F Y') }}
                </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.time') }}
                </h5>
                <span>
                    {{ $record->time?->format('H:i') }}
                </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.i_p_address') }}
                </h5>
                <span> {{ $record->i_p_address ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.boolean') }}
                </h5>
                <span> {{ $record->boolean ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.enumerate') }}
                </h5>
                <span> {{ $record->enumerate ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.text') }}
                </h5>
                <span> {{ $record->text ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.file') }}
                </h5>
                @if($record->file)
                    <a
                        href="{{ Storage::url($record->file) }}"
                        target="blank"
                    >
                        <i class="mr-1 icon ion-md-download"></i>
                        Download
                    </a>
                @else
                    -
                @endif
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.image') }}
                </h5>
                {{--                    <x-partials.thumbnail--}}
                {{--                        src="{{ $record->image ? Storage::url($record->image) : '' }}"--}}
                {{--                        size="150"--}}
                {{--                    />--}}
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.markdown_text') }}
                </h5>
                <span> {{ $record->markdown_text ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.w_y_s_i_w_y_g') }}
                </h5>
                <span> {!! $record->w_y_s_i_w_y_g ?? '-' !!} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.latitude') }}
                </h5>
                <span> {{ $record->latitude ?? '-' }} </span>
            </div>
            <div class="mb-4 w-full">
                <h5 class="font-medium text-gray-700">
                    {{ __('apps/sample/records.fields.longitude') }}
                </h5>
                <span> {{ $record->longitude ?? '-' }} </span>
            </div>
        </div>
    </div>
</div>
