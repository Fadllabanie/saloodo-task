<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
/**
 * @method static static New()
 * @method static static Processing()
 * @method static static Fulfilling()
 */
final class ParcelStatus extends Enum
{
    const New = 1;
    const Processing = 2;
    const Fulfilling = 3;
}
