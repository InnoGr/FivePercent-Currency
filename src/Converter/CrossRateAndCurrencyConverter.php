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

use FivePercent\Component\Currency\Exception\CrossRateNotFoundException;
use FivePercent\Component\Money\Money;
use Psr\Log\LoggerInterface;

/**
 * Cross rate and currency converter.
 * Try convert with cross rate, and if cross rate not found,
 * try convert with simple currency ( Source -> USD -> Destination )
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
class CrossRateAndCurrencyConverter implements ConverterInterface
{
    /**
     * @var CrossRateConverter
     */
    private $crossRateConverter;

    /**
     * @var CurrencyConverter
     */
    private $currencyConverter;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Construct
     *
     * @param CrossRateConverter $crossRateConverter
     * @param CurrencyConverter  $currencyConverter
     * @param LoggerInterface    $logger
     */
    public function __construct(
        CrossRateConverter $crossRateConverter,
        CurrencyConverter $currencyConverter,
        LoggerInterface $logger = null
    ) {
        $this->currencyConverter = $currencyConverter;
        $this->crossRateConverter = $crossRateConverter;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function getRate($source, $destination)
    {
        try {
            return $this->crossRateConverter->getRate($source, $destination);
        } catch (CrossRateNotFoundException $e) {
            if ($this->logger) {
                $this->logger->warning(sprintf(
                    'Can not get rate. Message: "%s". Try get rate via simple currency.',
                    rtrim($e->getMessage(), '.')
                ));
            }

            return $this->currencyConverter->getRate($source, $destination);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function convert($source, $destination, Money $money)
    {
        try {
            return $this->crossRateConverter->convert($source, $destination, $money);
        } catch (CrossRateNotFoundException $e) {
            if ($this->logger) {
                $this->logger->warning(sprintf(
                    'Can not convert amount. Message: "%s". Try convert via simple currency.',
                    rtrim($e->getMessage(), '.')
                ));
            }

            return $this->currencyConverter->convert($source, $destination, $money);
        }
    }
}
