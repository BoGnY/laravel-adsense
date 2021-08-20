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

namespace MartinButt\Laravel\Adsense;

class AdsenseBuilder
{
    public function ads($unit)
    {
        return view('adsense::ads')->with([
            'ad_client' => config('adsense.client_id'),
            'ad_style' => config("adsense.ads.$unit.ad_style", 'display:block;'),
            'ad_slot' => config("adsense.ads.$unit.ad_slot"),
            'ad_format' => config("adsense.ads.$unit.ad_format"),
            'ad_full_width_responsive' => config("adsense.ads.$unit.ad_full_width_responsive"),
        ]);
    }

    public function javascript()
    {
        return view('adsense::javascript', ['client_id' => config('adsense.client_id')]);
    }
}
