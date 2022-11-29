/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            sm: "360px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
        extend: {
            colors: {
                primary: "hsl(46, 100%, 50%)",
                primaryLight: "hsl(46, 100%, 80%)",
                primaryDark: "hsl(46, 100%, 45%)",
                secondary: "hsl(219, 46%, 24%)", //#213559
                secondaryLight: "hsl(218, 31%, 31%)",
            },
        },
    },
    plugins: [],
};
