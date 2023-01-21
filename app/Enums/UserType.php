<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
/**
 * @method static static Admin()
 * @method static static Biker()
 * @method static static Sender()
 */
final class UserType extends Enum
{
    const Admin = 1;
    const Biker = 2;
    const Sender = 3;
}
