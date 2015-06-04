<?php

/**
 * This file is part of the Currency package
 *
 * (c) InnovationGroup
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace FivePercent\Component\Currency\Converter;

use FivePercent\Component\Currency\Model\CurrencyInterface;
use FivePercent\Component\Money\Money;

/**
 * All currency converters should be implemented of this interface
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface ConverterInterface
{
    /**
     * Get rate for currencies
     *
     * @param string|CurrencyInterface $source
     * @param string|CurrencyInterface $destination
     *
     * @return float
     */
    public function getRate($source, $destination);

    /**
     * Convert number
     *
     * @param string|CurrencyInterface $source
     * @param string|CurrencyInterface $destination
     * @param Money                    $money
     *
     * @return Money
     */
    public function convert($source, $destination, Money $money);
}
