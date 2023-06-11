import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import path from "path";
import AutoImport from "unplugin-auto-import/vite";
import Components from "unplugin-vue-components/vite";
import { ElementPlusResolver } from 'unplugin-vue-components/resolvers';

// https://vitejs.dev/config/
export default defineConfig({
  email: {
    host: 'smtp.gmail.com',
    secure: true,
    auth: {
      user: 'joyogamethd101@gmail.com',
      pass: 'catobidshquojtxy',  // vmail will prompt if pass is empty
    },
    frontmatter: {
      // receiver({ name }) {
      //   return `${name} hihihi`
      // },
      today: new Date().toLocaleDateString(),
      author: 'XLor'
    }
  },
  
  base: './',

  plugins: [
    vue(),
    AutoImport({
      include: [/\.vue$/, /\.vue\?vue/],
      imports: ["vue", "vue-router"],
      dirs: ["./src/**"],
      dts: "./auto-imports.d.ts",
      vueTemplate: true,
      injectAtEnd: true,
    }),
    Components({
      // 從 `./src/components/` 路徑查找
      resolvers: [ElementPlusResolver()],
      extensions: ["vue"],
      include: [/\.vue$/, /\.vue\?vue/],
      dts: "src/auto-components.js",
      deep: true, //搜尋子目錄
      dirs: ['./src'],
    }),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "@/assets/scss/global.scss";`,
      },
    },
  },

  // publicPath: '/api',

  server: {
    port: '5173',
    proxy: {
      '/api': {
        target: 'http://localhost:80',
        changeOrigin: true,
        rewrite: path => path.replace(/^\/api/, '/teamProject_G3/joyo-vite/PDO'),
      },
    }
  },
});
