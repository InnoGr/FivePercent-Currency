<?php

/**
 * This file is part of the Currency package
 *
 * (c) InnovationGroup
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace FivePercent\Component\Currency\Loader;

/**
 * Cross rate loader
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface CrossRateLoaderInterface
{
    /**
     * Load cross rates
     *
     * @return \FivePercent\Component\Currency\Model\CrossRateCollectionInterface
     */
    public function loadCrossRates();
}
