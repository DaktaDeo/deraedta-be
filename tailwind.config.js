const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    darkMode: 'class',
    corePlugins: {
        preflight: true,
    },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
    theme: {
        extend: {
            aspectRatio: {
                auto: 'auto',
                square: '1 / 1',
                video: '16 / 9',
                1: '1',
                2: '2',
                3: '3',
                4: '4',
                5: '5',
                6: '6',
                7: '7',
                8: '8',
                9: '9',
                10: '10',
                11: '11',
                12: '12',
                13: '13',
                14: '14',
                15: '15',
                16: '16',
            },
            typography: (theme) => ({
                light: {
                    // you can have a 'dark' key here instead (eg: dark:prose-dark), just need to update the color values below
                    css: [
                        {
                            color: theme('colors.gray.400'),
                            '[class~="lead"]': {
                                color: theme('colors.gray.300'),
                            },
                            a: {
                                color: theme('colors.gray.200'),
                            },
                            strong: {
                                color: theme('colors.gray.100'),
                            },
                            'ol > li::before': {
                                color: theme('colors.gray.400'),
                            },
                            'ul > li::before': {
                                backgroundColor: theme('colors.gray.600'),
                            },
                            hr: {
                                borderColor: theme('colors.gray.200'),
                            },
                            blockquote: {
                                color: theme('colors.gray.200'),
                                borderLeftColor: theme('colors.gray.600'),
                            },
                            h1: {
                                color: theme('colors.gray.200'),
                            },
                            h2: {
                                color: theme('colors.gray.200'),
                            },
                            h3: {
                                color: theme('colors.gray.200'),
                            },
                            h4: {
                                color: theme('colors.gray.200'),
                            },
                            'figure figcaption': {
                                color: theme('colors.gray.400'),
                            },
                            code: {
                                color: theme('colors.white'),
                            },
                            'a code': {
                                color: theme('colors.gray.200'),
                            },
                            pre: {
                                color: theme('colors.gray.200'),
                                backgroundColor: theme('colors.gray.800'),
                            },
                            thead: {
                                color: theme('colors.gray.200'),
                                borderBottomColor: theme('colors.gray.400'),
                            },
                            'tbody tr': {
                                borderBottomColor: theme('colors.gray.600'),
                            },
                        },
                    ],
                },
            }),
        },
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'dark'],
        textColor: ['responsive', 'hover', 'focus', 'dark'],
        borderColor: ['responsive', 'hover', 'focus', 'dark'],
        borderWidth: ['responsive', 'first', 'last'],
        extend: {
            typography: ['responsive', 'dark'],
        },
    },
};
