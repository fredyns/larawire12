<?php

namespace App\Enums\Sample;

use App\Enums\EnumTrait;

enum SampleRecordEnumerate: string
{
    use EnumTrait;

    case Enabled = 'enabled';
    case Disabled = 'disabled';
}
