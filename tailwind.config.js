import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/tallstackui/tallstackui/tailwind.config.js")],

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/tallstackui/tallstackui/src/**/*.php",
    ],

    // Palette color genarated from: https://www.hover.dev/css-color-palette-generator and https://www.tints.dev/
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#EDF5FD",
                    100: "#D7E7F9",
                    200: "#AACDF3",
                    300: "#6BA9EA",
                    400: "#1C71C9",
                    500: "#1A68BC",
                    600: "#185EAA",
                    700: "#14508F",
                    800: "#104174",
                    900: "#0C325A",
                    950: "#071B31",
                    content: "#E8F2FC",
                    dark: "#16589C",
                    light: "#358AE3",
                },
                secondary: {
                    50: "#FDF2FD",
                    100: "#FADBF9",
                    200: "#F5B7F4",
                    300: "#EC79EA",
                    400: "#C91CC7",
                    500: "#B71AB5",
                    600: "#AA18A8",
                    700: "#941592",
                    800: "#791177",
                    900: "#5A0C58",
                    950: "#310731",
                    content: "#FCE8FC",
                    light: "#E335E1",
                    dark: "#9C169B",
                },
                success: {
                    50: "#E9FCE9",
                    100: "#D2F9D2",
                    200: "#94F094",
                    300: "#3FE43F",
                    400: "#1CC91C",
                    500: "#1AB71A",
                    600: "#17A617",
                    700: "#159415",
                    800: "#117911",
                    900: "#0C550C",
                    950: "#094309",
                    content: "#000000",
                },
                warning: {
                    50: "#FAFADB",
                    100: "#F6F6BC",
                    200: "#EAEA67",
                    300: "#DBDB1F",
                    400: "#C9C91C",
                    500: "#B7B71A",
                    600: "#A6A617",
                    700: "#949415",
                    800: "#797911",
                    900: "#5A5A0C",
                    950: "#434309",
                    content: "#000000",
                },
                error: {
                    50: "#FDEDED",
                    100: "#FBE0E0",
                    200: "#F5B7B7",
                    300: "#EE8282",
                    400: "#C91C1C",
                    500: "#B71A1A",
                    600: "#A61717",
                    700: "#941515",
                    800: "#741010",
                    900: "#510B0B",
                    950: "#360707",
                    content: "#FCE8E8",
                },
                copy: {
                    default: "#232629",
                    light: "#5E666E",
                    lighter: "#848E95",
                },
                "copy-dark": {
                    default: "#FBFBFB",
                    light: "#D6D9DC",
                    lighter: "#9FA6AC",
                },
                foreground: {
                    default: "#FBFBFB",
                    dark: "#232629",
                },
                background: {
                    default: "#e8e8eb",
                    dark: "#18191B",
                },
                border: {
                    default: "#DDDFE2",
                    dark: "3B4045",
                },
            },
            flexBasis: {
                '1/7': '14.2857143%',
                '2/7': '28.5714286%',
                '3/7': '42.8571429%',
                '4/7': '57.1428571%',
                '5/7': '71.4285714%',
                '6/7': '85.7142857%',
              }
        },
    },

    plugins: [forms],
};
