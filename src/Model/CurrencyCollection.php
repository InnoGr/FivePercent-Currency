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

use FivePercent\Component\Currency\Exception\CurrencyNotFoundException;

/**
 * Base currency collection
 *
 * @author Vitaliy Zhuk <zhuk2205@gmail.com>
 */
class CurrencyCollection implements CurrencyCollectionInterface
{
    /**
     * @var array|CurrencyInterface[]
     */
    private $currencies = [];

    /**
     * {@inheritDoc}
     */
    public function add(CurrencyInterface $currency)
    {
        $this->currencies[$currency->getCode()] = $currency;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function get($code)
    {
        if ($code instanceof CurrencyInterface) {
            $code = $code->getCode();
        }

        if (isset($this->currencies[$code])) {
            return $this->currencies[$code];
        }

        throw new CurrencyNotFoundException(sprintf(
            'Not found currency with code "%s".',
            $code
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function has($code)
    {
        if ($code instanceof CurrencyInterface) {
            $code = $code->getCode();
        }

        return isset($this->currencies[$code]);
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return current($this->currencies);
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        return next($this->currencies);
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return key($this->currencies);
    }

    /**
     * {@inheritDoc}
     */
    public function valid()
    {
        return key($this->currencies) !== null;
    }

    /**
     * {@inheritDoc}
     */
    public function rewind()
    {
        return reset($this->currencies);
    }
}
