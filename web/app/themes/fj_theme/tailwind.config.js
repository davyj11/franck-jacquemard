module.exports = {
    content: [
        "./views/**/*.html.twig",
        "./assets/**/*.js",
        "./assets/**/*.pcss",
    ],
    darkMode: 'class',
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2.5rem',
                md: '2.25rem',
                lg: '2.75rem',
                xl: '2.5rem',
                '2xl': '3rem',
            },
        },
        fontSize: {
            '6xl-lg': '4rem',
            '6xl-md': '3rem',
            '6xl-xs': '2.25rem',
            '5xl-lg': '3rem',
            '5xl-md': '2.25rem',
            '5xl-xs': '1.875rem',
            '4xl-lg': '2.25rem',
            '4xl-md': '1.875rem',
            '4xl-xs': '1.5rem',
            '3xl-lg': '1.875rem',
            '3xl-md': '1.5rem',
            '3xl-xs': '1.25rem',
            '2xl-lg': '1.5rem',
            '2xl-md': '1.25rem',
            '2xl-xs': '1.1825rem',
            'xl': '1.5rem',
            'lg': '1.375rem',
            'md': '1.125rem',
            'base': '1rem',
            'xs': '0.75rem',
            'icon-xl': '2.5rem',
            'icon-lg': '2rem',
            'icon-md': '1.5rem',
            'icon-sm': '1rem',
        },
        colors: {
            transparent: "transparent",
            white: "#FFFFFF",
            black: "#000000",
            'primary': '#13385C',
            'primary-10': '#E6EEF9',
            'primary-light': '#446289',
            'primary-dark': '#001232',
            'primary-black': '#000025',
            'primary-white': '#FAFAFA',
            'secondary': '#C77114',
            'secondary-light': '#FFA047',
            'secondary-dark': '#914500',
            gray: {
                '01': "#18181b",
                '02': "#27272a",
                '03': "#3f3f46",
                '04': "#52525b",
                '05': "#71717a",
                '06': "#a1a1aa",
                '07': "#d4d4d8",
                '08': "#e4e4e7",
                '09': "#f4f4f5",

            },
            alert: {
                success: "#2CB753",
                warning: "#FBAA30",
                danger: "#ED4B46",
            }
        },
        fontFamily: {
            'head': "'Merriweather'",
            'text': "'Nunito'",
        },
        boxShadow: {
            sm: '0px 10px 20px -8px rgba(37, 36, 40, 0.25)',
            md: '0px 18px 30px -12px rgba(37, 36, 40, 0.25)',
            lg: '0px 28px 46px -16px rgba(37, 36, 40, 0.25)',
            none: 'none'
        },
        extend: {
            screens: {
                'max-sm': {'max': '639px'},
                'max-md': {'max': '767px'},
                'max-lg': {'max': '1023px'},
                'max-xl': {'max': '1279px'},
                'max-2xl': {'max': '1535px'},
                'bw-sm-md': {'min': '640px', 'max': '767px'},
                'bw-md-lg': {'min': '768px', 'max': '1023px'},
                'bw-lg-xl': {'min': '1024px', 'max': '1279px'},
                'bw-xl-2xl': {'min': '1280px', 'max': '1535px'},
            },
            display: [ "group-hover" ],

        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
}
