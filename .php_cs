<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$header = <<<EOF
Google Adsense Ads for Laravel

Package for easily including Google Adsense Ad units
in Laravel and Lumen.

@developer Martin Butt <https://www.martinbutt.com/>

@copyright Copyright (c) 2021 Martin Butt
@license   MIT

Copyright (c) 2016 Galen Han
Copyright (c) 2019 Crypto Technology srl
Copyright (c) 2021 Martin Butt

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
EOF;

$finder = Finder::create()
    ->in(__DIR__)
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->ignoreUnreadableDirs()
    ->files()
    ->name('*.php')
    //->exclude(['index.php']) //files
    ->exclude(['.idea', 'tests', 'vendor']); //dirs

$config = Config::create()
    ->setUsingCache(true)
    ->setCacheFile(__DIR__.'/.php_cs.cache')
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@PSR2' => true,
        'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'declare_strict_types' => true,
        'dir_constant' => true,
        'header_comment' => ['comment_type' => 'PHPDoc', 'header' => $header, 'location' => 'after_open', 'separate' => 'both'],
        'is_null' => true,
        'linebreak_after_opening_tag' => true,
        'logical_operators' => true,
        'mb_str_functions' => true,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'native_constant_invocation' => true,
        'native_function_invocation' => true,
        'no_php4_constructor' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_elseif' => true,
        'no_superfluous_phpdoc_tags' => false,
        'no_unneeded_curly_braces' => true,
        'no_unreachable_default_argument_value' => true,
        'no_unset_on_property' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'not_operator_with_space' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => ['sortAlgorithm' => 'alpha'],
        'php_unit_method_casing' => true,
        'php_unit_strict' => true,
        'php_unit_test_annotation' => ['style' => 'prefix'], // or 'annotation'
        'phpdoc_add_missing_param_annotation' => true, //['only_untyped' => false],
        'phpdoc_annotation_without_dot' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_order' => true,
        'phpdoc_to_comment' => false,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types_order' => ['sort_algorithm' => 'none'],
        'pow_to_exponentiation' => true,
        'psr4' => true,
        'random_api_migration' => true,
        'single_blank_line_at_eof' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'ternary_to_null_coalescing' => true,
        'whitespace_after_comma_in_array' => true,
    ]);

return $config;
