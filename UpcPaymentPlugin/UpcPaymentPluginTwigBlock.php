<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\UpcPaymentPlugin;

use Eccube\Common\EccubeTwigBlock;

class UpcPaymentPluginTwigBlock implements EccubeTwigBlock
{
    /**
     * @return array
     */
    public static function getTwigBlock()
    {
        return [
            '@UpcPaymentPlugin/credit.twig',
            '@UpcPaymentPlugin/credit_confirm.twig',
        ];
    }
}