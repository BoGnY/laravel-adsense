<?php

/**
 * Google Adsense Ads for Laravel.
 *
 * Package for easily including Google Adsense Ad units
 * in Laravel and Lumen.
 *
 * @developer Martin Butt <https://www.martinbutt.com/>
 *
 * @copyright Copyright (c) 2021 Martin Butt
 * @license   MIT
 *
 * Copyright (c) 2016 Galen Han
 * Copyright (c) 2019 Crypto Technology srl
 * Copyright (c) 2021 Martin Butt
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

declare(strict_types=1);

namespace MartinButt\Laravel\Adsense\Tests;

use MartinButt\Laravel\Adsense\Facades\AdsenseFacade;
use Illuminate\View\View;

/**
 * Class AdsenseTest.
 */
class AdsenseTest extends TestCase
{
    /** @var \MartinButt\Laravel\Adsense\AdsenseBuilder $adsense */
    protected $adsense;

    public function setUp(): void
    {
        parent::setUp();
        $this->adsense = $this->app->make('adsense');
    }

    public function testAdsenseInstance()
    {
        $this->assertInstanceOf(View::class, $this->adsense->javascript());
    }

    public function testAdsenseView()
    {
        $return = $this->app->view->make('adsense::javascript')->render();
        $this->assertSame('<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-123" crossorigin="anonymous"></script>', $return);
    }

    public function testAdsenseFacade()
    {
        $this->assertIsObject(AdsenseFacade::javascript());
    }
}
