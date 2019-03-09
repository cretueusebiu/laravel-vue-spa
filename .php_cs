<?php

$finder = PhpCsFixer\Finder::create()
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->exclude([
        '.git',
        '.idea',
        'bower_components',
        'node_modules',
        'resources/lang',
        'storage',
        'bootstrap',
        'vendor'
    ]);

$fixers = [
    '@PSR2' => true,
    'align_multiline_comment' => [
        'comment_type' => 'phpdocs_only',
    ],
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'binary_operator_spaces' => [
        'align_equals'       => false,
        'align_double_arrow' => true,
    ],
    'blank_line_after_namespace'   => true,
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement'  => [
        'statements' => [
            'return',
            'throw',
            'try',
        ],
    ],
    'braces'           => true,
    'cast_spaces'      => true,
    'class_definition' => true,
    'concat_space'     => [
        'spacing' => 'none',
    ],
    'declare_equal_normalize'          => true,
    'elseif'                           => true,
    'encoding'                         => true,
    'full_opening_tag'                 => true,
    'function_declaration'             => true,
    'function_typehint_space'          => true,
    'general_phpdoc_annotation_remove' => [
        'access',
        'package',
        'subpackage',
    ],
    'hash_to_slash_comment'              => true,
    'heredoc_to_nowdoc'                  => true,
    'include'                            => true,
    'indentation_type'                   => true,
    'line_ending'                        => true,
    'lowercase_cast'                     => true,
    'lowercase_constants'                => true,
    'lowercase_keywords'                 => true,
    'magic_constant_casing'              => true,
    'method_argument_space'              => true,
    'method_separation'                  => true,
    'native_function_casing'             => true,
    'new_with_braces'                    => true,
    'no_alias_functions'                 => true,
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc'        => true,
    'no_closing_tag'                     => true,
    'no_empty_phpdoc'                    => true,
    'no_empty_statement'                 => true,
    'no_extra_consecutive_blank_lines'   => [
        'throw',
        'use',
        'useTrait',
        'extra',
    ],
    'no_leading_import_slash'         => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print'             => [
        'use' => 'echo',
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_multiline_whitespace_before_semicolons'   => true,
    'no_short_bool_cast'                          => true,
    'no_singleline_whitespace_before_semicolons'  => true,
    'no_spaces_after_function_name'               => true,
    'no_spaces_around_offset'                     => [
        'inside',
        'outside',
    ],
    'no_spaces_inside_parenthesis'          => true,
    'no_trailing_comma_in_list_call'        => true,
    'no_trailing_comma_in_singleline_array' => true,
    'no_trailing_whitespace'                => true,
    'no_trailing_whitespace_in_comment'     => true,
    'no_unneeded_control_parentheses'       => true,
    'no_unreachable_default_argument_value' => true,
    'no_unused_imports'                     => true,
    'no_useless_return'                     => true,
    'no_whitespace_before_comma_in_array'   => true,
    'no_whitespace_in_blank_line'           => true,
    'normalize_index_brace'                 => true,
    'object_operator_without_whitespace'    => true,
    'ordered_imports'                       => [
        'sortAlgorithm' => 'alpha',
    ],
    'phpdoc_align'        => true,
    'phpdoc_indent'       => true,
    'phpdoc_inline_tag'   => true,
    'phpdoc_no_alias_tag' => [
        'type' => 'var',
    ],
    'phpdoc_no_useless_inheritdoc'       => true,
    'phpdoc_order'                       => true,
    'phpdoc_scalar'                      => true,
    'phpdoc_separation'                  => true,
    'phpdoc_single_line_var_spacing'     => true,
    'phpdoc_summary'                     => true,
    'phpdoc_to_comment'                  => true,
    'phpdoc_trim'                        => true,
    'phpdoc_types'                       => true,
    'phpdoc_var_without_name'            => true,
    'psr4'                               => true,
    'self_accessor'                      => true,
    'short_scalar_cast'                  => true,
    'single_blank_line_at_eof'           => true,
    'single_blank_line_before_namespace' => true,
    'single_class_element_per_statement' => true,
    'single_import_per_statement'        => true,
    'single_line_after_imports'          => true,
    'single_quote'                       => true,
    'space_after_semicolon'              => true,
    'standardize_not_equals'             => true,
    'switch_case_semicolon_to_colon'     => true,
    'switch_case_space'                  => true,
    'ternary_operator_spaces'            => true,
    'trailing_comma_in_multiline_array'  => true,
    'trim_array_spaces'                  => true,
    'unary_operator_spaces'              => true,
    'visibility_required'                => [
        'method',
        'property',
    ],
    'whitespace_after_comma_in_array' => true
];

return PhpCsFixer\Config::create()
    ->setRules($fixers)
    ->setFinder($finder)
    ->setRiskyAllowed(true);