<?php

use App\Enums\Sample\SampleRecordEnumerate;

return [
    SampleRecordEnumerate::Enabled->value => [
        'label' => 'Enabled',
        'description' => 'This item is currently enabled',
    ],
    SampleRecordEnumerate::Disabled->value => [
        'label' => 'Disabled',
        'description' => 'This item is currently disabled',
    ],
];
