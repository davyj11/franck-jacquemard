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
            'xs': '0.75rem',
            'normal': '0.875rem',
            'md': '1rem',
            'lg': '1.25rem',
            'xlg': '1.5rem',
        },
        colors: {
            transparent: "transparent",
            white: "#FFFFFF",
            primary: {
                black: "#171E2B",
            },
            secondary: {
                '01': "#C1002A",
                '01-20': "#F3CCD4",
                '01-10': "#FFE3E9",
                '02': "#3AAFBB",
                '02-30': "#C4E7EB",


                '03': "#9A0022",
                '04': "#3C424D",
                '04-50': "#B7BABE",
            },
            gray: {
                '01': "#6C7277",
                '02': "#ADB1B4",
                '03': "#D8DDE0",
                '04': "#E0E4E7",
                '05': "#F0F2F4",

            },
            alert: {
                success: "#2CB753",
                warning: "#FBAA30",
                danger: "#ED4B46",
            }
        },
        fontFamily: {
            'highlight': "'Caveat'",
            'text': "'Inter'",
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
