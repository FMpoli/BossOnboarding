import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'resources/dist',
    rollupOptions: {
      input: {
        app: 'resources/css/app.css',
      },
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          return 'js/[name][extname]';
        },
      },
    },
  },
}); 