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
 * Cross rate collection interface
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface CrossRateCollectionInterface extends \Iterator
{
    /**
     * Add cross rate model to storage
     *
     * @param CrossRateInterface $crossRate
     */
    public function add(CrossRateInterface $crossRate);

    /**
     * Get cross rate for currencies
     *
     * @param string|CurrencyInterface $source
     * @param string|CurrencyInterface $destination
     *
     * @return CrossRateInterface
     */
    public function get($source, $destination);

    /**
     * Has cross rate for currencies
     *
     * @param string|CurrencyInterface $source
     * @param string|CurrencyInterface $destination
     *
     * @return bool
     */
    public function has($source, $destination);
}
