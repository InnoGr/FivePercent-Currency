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

use FivePercent\Component\Currency\Exception\CrossRateNotFoundException;

/**
 * Cross rate collection
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
class CrossRateCollection implements CrossRateCollectionInterface
{
    /**
     * @var array|CrossRateInterface[]
     */
    private $crossRates = [];

    /**
     * {@inheritDoc}
     */
    public function add(CrossRateInterface $crossRate)
    {
        $hash = $this->createHash($crossRate->getSource(), $crossRate->getDestination());

        $this->crossRates[$hash] = $crossRate;
    }

    /**
     * {@inheritDoc}
     */
    public function get($source, $destination)
    {
        $hash = $this->createHash($source, $destination);

        if (isset($this->crossRates[$hash])) {
            return $this->crossRates[$hash];
        }

        throw new CrossRateNotFoundException(sprintf(
            'Not found cross rate for currencies "%s -> %s".',
            $source,
            $destination
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function has($source, $destination)
    {
        $hash = $this->createHash($source, $destination);

        return isset($this->crossRates[$hash]);
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return current($this->crossRates);
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        return next($this->crossRates);
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return key($this->crossRates);
    }

    /**
     * {@inheritDoc}
     */
    public function valid()
    {
        return key($this->crossRates) !== null;
    }

    /**
     * {@inheritDoc}
     */
    public function rewind()
    {
        return reset($this->crossRates);
    }

    /**
     * Create hash for currencies
     *
     * @param string|CurrencyInterface $source
     * @param string|CurrencyInterface $destination
     *
     * @return string
     */
    private function createHash($source, $destination)
    {
        if ($source instanceof CurrencyInterface) {
            $source = $source->getCode();
        }

        if ($destination instanceof CurrencyInterface) {
            $destination = $destination->getCode();
        }

        return $source . ':' . $destination;
    }
}
