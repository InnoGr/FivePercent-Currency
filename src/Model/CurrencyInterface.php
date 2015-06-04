<?php

/**
 * This file is part of the Currency package
 *
 * (c) InnovationGroup
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace FivePercent\Component\Currency\Model;

/**
 * All currencies should be implemented of this interface
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface CurrencyInterface
{
    /**
     * Get ISO-4217 code
     *
     * @return string
     */
    public function getCode();

    /**
     * Get USD rate
     *
     * @return float
     */
    public function getRate();
}
