<?php

/*
 * This file is part of the EmailChecker package.
 *
 * (c) Matthieu Moquet <matthieu@moquet.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EmailChecker\Tests\Adpater;

use EmailChecker\Adapter\BuiltInAdapter;
use EmailChecker\Tests\TestCase;

class BuiltInAdapterTest extends TestCase
{
    protected $adapter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapter = new BuiltInAdapter();
    }

    /**
     * @dataProvider throwawayDomains
     */
    public function testThrowawayDomains($domain): void
    {
        $this->assertTrue($this->adapter->isThrowawayDomain($domain));
    }

    /**
     * @dataProvider notThrowawayDomains
     */
    public function testNotThrowawayDomains($domain): void
    {
        $this->assertFalse($this->adapter->isThrowawayDomain($domain));
    }

    public static function throwawayDomains()
    {
        // List of some of the built-in throwaway domains
        return [
            ['throwawayemailaddress.com'],
            ['tmail.com'],
            ['tmailinator.com'],
            ['tradermail.info'],
            ['trash-amil.com'],
            ['trash-mail.com'],
            ['trash-mail.de'],
            ['trash2009.com'],
            ['trashemail.de'],
            ['trashmail.at'],
            ['trashmail.com'],
            ['trashmail.net'],
            ['trashmail.ws'],
            ['trashmailer.com'],
            ['trashymail.com'],
            ['trashymail.net'],
            ['trillianpro.com'],
            ['turual.com'],
            ['tyldd.com'],
            ['uggsrock.com'],
            ['upliftnow.com'],
            ['uplipht.com'],
            ['veryrealemail.com'],
            ['viditag.com'],
            ['viewcastmedia.com'],
            ['viewcastmedia.net'],
            ['viewcastmedia.org'],
            ['webm4il.info'],
            ['wegwerfemail.de'],
            ['wetrainbayarea.com'],
            ['wetrainbayarea.org'],
            ['wh4f.org'],
            ['whyspam.me'],
            ['willselfdestruct.com'],
            ['wuzup.net'],
            ['wuzupmail.net'],
            ['xagloo.co'],
            ['xemaps.com'],
            ['xmail.com'],
            ['yopmail.com'],
            ['12gmail.com'],
            ['abagmail.com'],
            ['01cicloud.com'],
            ['66bhotmail.com'],
            ['gamail.com'],
            ['aamail.com'],
            ['amail.com'],
            ['gmaail.com'],
            ['gaaail.com'],
            ['gaail.com'],
            ['gmcil.com'],
            ['gmacil.com'],
            ['gmccil.com'],
            ['gmacl.com'],
            ['gmaicl.com'],
            ['gmaccl.com'],
            ['gmaic.com'],
            ['gmailc.com'],
            ['gmaicc.com'],
            ['bcloud.com'],
            ['ibcloud.com'],
            ['ibloud.com'],
            ['icbloud.com'],
            ['icboud.com'],
            ['iclboud.com'],
            ['iclbud.com'],
            ['iclobud.com'],
            ['iclobd.com'],
            ['icloubd.com'],
            ['icloub.com'],
            ['icloudb.com'],
        ];
    }

    public static function notThrowawayDomains()
    {
        return [
            ['gmail.com'],
            ['gmail.fr'],
            ['hotmail.com'],
            ['hotmail.fr'],
            ['icloud.com'],
            ['icloud.fr'],
        ];
    }
}
