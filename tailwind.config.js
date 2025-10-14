/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
        extend: {
            fontFamily: {
                plusJakartaSans: ["Plus Jakarta Sans", "sans-serif"],
            },
            colors: {
                primary: "#3986a3",
                "blue-transparent": "rgba(16, 102, 129, 0.2)", // The 0.2 represents 20% opacity
            },
        },
    },
    safelist: [
        "bg-[#3fa2f6]",
        "bg-[#fbb03b]",
        "bg-[#406c9b]",
        "bg-[#6a3d00]",
        "bg-[#ef5350]",
        "bg-[#4caf50]",
        {
            pattern: /^col-span-(\d+)$/,
            variants: ["sm", "md", "lg", "xl"],
        },
    ],

  plugins: [],
}