module.exports = {
    root: true,
    env: {
        browser: true,
        es6: true,
        node: true,
    },
    extends: [
        'airbnb-base',
        'prettier',
        'plugin:prettier/recommended',
        'plugin:lodash/recommended',
        'plugin:tailwindcss/recommended',
    ],
    globals: {
        Atomics: 'readonly',
        SharedArrayBuffer: 'readonly',
        _: true,
        Popper: false,
        axios: false,
        Stripe: false,
        $: false,
        utils: true,
        __: true,
        RRule: false,
    },
    parserOptions: {
        sourceType: 'module',
        ecmaVersion: 2018,
        ecmaFeatures: {
            globalReturn: false,
            impliedStrict: false,
            jsx: false,
        },
    },
    plugins: ['prettier', 'lodash'],
    rules: {
        'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,
        'no-param-reassign': 'off',
        'no-unused-vars': 'off',
        'no-plusplus': 'off',
        'global-require': 'off',
        'no-bitwise': 'off',
        'lodash/prefer-noop': 'off',
        'import/no-extraneous-dependencies': 'off',
        'import/no-unresolved': 'off',
        'tailwindcss/no-custom-classname': 'off',
        'lodash/prefer-constant': 'off',
        'import/prefer-default-export': 'off',
        'import/extensions': 'off',
    },
    settings: {
        lodash: {
            pragma: '_',
        },
        'import/resolver': {
            alias: {
                map: [
                    ['~', './resources/js'],
                    ['@', './resources/js/Components'],
                ],
                extensions: ['.ts', '.js', '.tsx', '.json'],
            },
        },
    },
}
