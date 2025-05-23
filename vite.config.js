import { defineConfig } from "vite";
import fullReload from "vite-plugin-full-reload";
import dotenv from "dotenv";

// Load .env variables
dotenv.config();

const isDev = process.env.VITE_ENV_MODE === "dev";
const isHost = process.env.VITE_ENV_MODE === "host";

export default defineConfig({
  // Set base path for built assets (used in production)
  base: isDev || isHost ? "" : "/build/bundle",

  server: {
    // Use local IP if host mode, else localhost
    host: isHost ? true : "localhost",
    origin: isHost
      ? `http://${process.env.VITE_LOCAL_IP}:3000`
      : "http://localhost:3000",
    port: 3000,
    hot: true,
    cors: "*",
  },

  build: {
    // Disable base64 inlining for assets like fonts
    assetsInlineLimit: 0,

    rollupOptions: {
      // Main JS entry point
      input: "./assets/js/main.js",

      output: {
        // Hashed output filenames
        entryFileNames: "[name]-[hash].js",
        assetFileNames: "[name]-[hash][extname]",
      },
    },

    manifest: true, // Generates manifest.json for PHP
    outDir: "./build/bundle", // Output folder for production build
    emptyOutDir: true, // Clean build folder before building
  },

  plugins: [fullReload(["**/*.php"])],
});
