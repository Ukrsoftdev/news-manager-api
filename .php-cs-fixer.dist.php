<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
    ->exclude('config')
    ->exclude('public')
    ->exclude('vendor')
    ->exclude('docs')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'declare_strict_types' => true,
        'ordered_imports' => false,
        'no_trailing_comma_in_singleline_array' => false,
        'trailing_comma_in_multiline' => false,
        'concat_space' => false,
        'cast_spaces' => false,
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
;
