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
 * All currency collections should be implemented of this interface
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface CurrencyCollectionInterface extends \Iterator
{
    /**
     * Add currency to storage
     *
     * @param CurrencyInterface $currency
     */
    public function add(CurrencyInterface $currency);

    /**
     * Get currency
     *
     * @param string $code Currency code in ISO-4217
     *
     * @return CurrencyInterface
     */
    public function get($code);

    /**
     * Has currency
     *
     * @param string $code Currency code in ISO-4217
     *
     * @return CurrencyInterface
     */
    public function has($code);
}
