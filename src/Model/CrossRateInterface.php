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
 * All cross-rate instances should be implemented of this interface
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface CrossRateInterface
{
    /**
     * Get source currency
     *
     * @return CurrencyInterface
     */
    public function getSource();

    /**
     * Get destination currency
     *
     * @return CurrencyInterface
     */
    public function getDestination();

    /**
     * Get rate
     *
     * @return float
     */
    public function getRate();
}
