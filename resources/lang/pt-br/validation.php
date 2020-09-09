<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'O :attribute deve ser uma data superior a :date.',
    'after_or_equal' => 'O :attribute deve ser uma data superior ou igual a :date.',
    'alpha' => 'O :attribute deve conter somente letras.',
    'alpha_dash' => 'O :attribute deve conter apenas letras, números, traços e underscores.',
    'alpha_num' => 'O :attribute deve conter apenas letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser uma data anterior a :date.',
    'before_or_equal' => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file' => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string' => 'O :attribute deve ser entre :min e :max caracteres.',
        'array' => 'O :attribute deve ser entre :min e :max items.',
    ],
    'boolean' => 'O :attribute deve ser Verdadeiro ou Falso.',
    'confirmed' => 'O :attribute confirmação não corresponde.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute não corresponde ao formato :format.',
    'different' => 'O :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ter :digits dígitos.',
    'digits_between' => 'O :attribute must be between :min and :max digits.',
    'dimensions' => 'O :attribute has invalid image dimensions.',
    'distinct' => 'O :attribute has a duplicate value.',
    'email' => 'O :attribute deve ser um endereço de e-mail válido .',
    'ends_with' => 'O :attribute must end with one of the following: :values',
    'exists' => 'O selected :attribute is invalid.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O :attribute must have a value.',
    'gt' => [
        'numeric' => 'O :attribute must be greater than :value.',
        'file' => 'O :attribute must be greater than :value kilobytes.',
        'string' => 'O :attribute must be greater than :value caracteres.',
        'array' => 'O :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'O :attribute must be greater than or equal :value.',
        'file' => 'O :attribute must be greater than or equal :value kilobytes.',
        'string' => 'O :attribute must be greater than or equal :value caracteres.',
        'array' => 'O :attribute must have :value items or more.',
    ],
    'image' => 'O :attribute must be an image.',
    'in' => 'O selected :attribute is invalid.',
    'in_array' => 'O :attribute does not exist in :other.',
    'integer' => 'O :attribute must be an integer.',
    'ip' => 'O :attribute must be a valid IP address.',
    'ipv4' => 'O :attribute must be a valid IPv4 address.',
    'ipv6' => 'O :attribute must be a valid IPv6 address.',
    'json' => 'O :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'O :attribute must be less than :value.',
        'file' => 'O :attribute must be less than :value kilobytes.',
        'string' => 'O :attribute must be less than :value caracteres.',
        'array' => 'O :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'O :attribute must be less than or equal :value.',
        'file' => 'O :attribute must be less than or equal :value kilobytes.',
        'string' => 'O :attribute must be less than or equal :value caracteres.',
        'array' => 'O :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file' => 'O :attribute não deve ser maior que :max kilobytes.',
        'string' => 'O :attribute não deve ser maior que :max caracteres.',
        'array' => 'O :attribute não deve ter mais que :max items.',
    ],
    'mimes' => 'O :attribute deve ser do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ter no minimo :min.',
        'file' => 'O :attribute deve ter no minimo :min kilobytes.',
        'string' => 'O :attribute deve ter no minimo :min caracteres.',
        'array' => 'O :attribute deve ter no minimo :min items.',
    ],
    'not_in' => 'O selected :attribute é invalido.',
    'not_regex' => 'O :attribute format é invalido.',
    'numeric' => 'O :attribute must be a number.',
    'password' => 'A senha está incorreta.',
    'present' => 'O :attribute must be present.',
    'regex' => 'O :attribute format é invalido.',
    'required' => 'O(A) :attribute é obrigatório.',
    'required_if' => 'O :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'O :attribute é obrigatório a menos que :other está em :values.',
    'required_with' => 'O :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'O :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O :attribute é obrigatório quando nenhum dos valores :values estão presentes.',
    'same' => 'O :attribute and :other must match.',
    'size' => [
        'numeric' => 'O :attribute must be :size.',
        'file' => 'O :attribute must be :size kilobytes.',
        'string' => 'O :attribute must be :size caracteres.',
        'array' => 'O :attribute must contain :size items.',
    ],
    'starts_with' => 'O :attribute must start with one of the following: :values',
    'string' => 'O :attribute must be a string.',
    'timezone' => 'O :attribute must be a valid zone.',
    'unique' => 'O :attribute já existe.',
    'uploaded' => 'O :attribute failed to upload.',
    'url' => 'O :attribute format is invalid.',
    'uuid' => 'O :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | O following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
