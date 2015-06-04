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

use FivePercent\Component\Currency\Loader\CurrencyLoaderInterface;
use FivePercent\Component\Money\Money;

/**
 * Base currency converter.
 * Attention: Logic converts - ( Source -> USD -> Destination )
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
class CurrencyConverter implements ConverterInterface
{
    /**
     * @var CurrencyLoaderInterface
     */
    private $currencyLoader;

    /**
     * Construct
     *
     * @param CurrencyLoaderInterface $currencyLoader
     */
    public function __construct(CurrencyLoaderInterface $currencyLoader)
    {
        $this->currencyLoader = $currencyLoader;
    }

    /**
     * {@inheritDoc}
     */
    public function getRate($source, $destination)
    {
        $currencies = $this->currencyLoader->loadCurrencies();

        $sourceCurrency = $currencies->get($source);
        $sourceRate = $sourceCurrency->getRate();

        $destinationCurrency = $currencies->get($destination);
        $destinationRate = $destinationCurrency->getRate();

        return (1 / $sourceRate) * $destinationRate;
    }

    /**
     * {@inheritDoc}
     */
    public function convert($source, $destination, Money $money)
    {
        $rate = $this->getRate($source, $destination);

        return $money->mul($rate);
    }
}
