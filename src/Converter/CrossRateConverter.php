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

use FivePercent\Component\Currency\Loader\CrossRateLoaderInterface;
use FivePercent\Component\Money\Money;

/**
 * Cross rate converter
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
class CrossRateConverter implements ConverterInterface
{
    /**
     * @var CrossRateLoaderInterface
     */
    private $crossRateLoader;

    /**
     * Construct
     *
     * @param CrossRateLoaderInterface $loader
     */
    public function __construct(CrossRateLoaderInterface $loader)
    {
        $this->crossRateLoader = $loader;
    }

    /**
     * {@inheritDoc}
     */
    public function getRate($source, $destination)
    {
        $crossRates = $this->crossRateLoader->loadCrossRates();
        $crossRate = $crossRates->get($source, $destination);

        return $crossRate->getRate();
    }

    /**
     * {@inheritDoc}
     */
    public function convert($source, $destination, Money $money)
    {
        $crossRates = $this->crossRateLoader->loadCrossRates();
        $crossRate = $crossRates->get($source, $destination);

        return $money->mul($crossRate->getRate());
    }
}
