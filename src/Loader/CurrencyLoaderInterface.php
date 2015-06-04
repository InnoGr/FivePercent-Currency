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
 * All currency loaders should be implemented of this interface
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
interface CurrencyLoaderInterface
{
    /**
     * Load currencies
     *
     * @return \FivePercent\Component\Currency\Model\CurrencyCollectionInterface
     */
    public function loadCurrencies();
}
