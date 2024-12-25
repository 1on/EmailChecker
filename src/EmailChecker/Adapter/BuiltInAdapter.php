<?php

/*
 * This file is part of the EmailChecker package.
 *
 * (c) Matthieu Moquet <matthieu@moquet.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EmailChecker\Adapter;

use EmailChecker\ThrowawayDomains;
use EmailChecker\ThrowawayDomainsRegex;

/**
 * Built-in adapter.
 *
 * This adapter provides a list of throwaway domains included in that library.
 * Initially, those domains come from FGRibreau/mailchecker library.
 *
 * @see https://github.com/FGRibreau/mailchecker/blob/master/list.json
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class BuiltInAdapter implements AdapterInterface
{
    protected $domains;
    protected $domainsRegex;

    public function isThrowawayDomain($domain)
    {
        $isThrowaway = in_array($domain, $this->getDomains());
        if ($isThrowaway) {
            return true;
        }
        foreach ($this->getDomainsRegex() as $domainRegex) {
            if (preg_match("/{$domainRegex}/", $domain)) {
                return true;
            }
        }

        return false;
    }

    private function getDomains()
    {
        if (null === $this->domains) {
            $this->domains = (new ThrowawayDomains())->toArray();
        }

        return $this->domains;
    }

    private function getDomainsRegex()
    {
        if (null === $this->domainsRegex) {
            $this->domainsRegex = (new ThrowawayDomainsRegex())->toArray();
        }

        return $this->domainsRegex;
    }
}
