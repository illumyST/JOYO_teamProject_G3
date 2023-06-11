import { defineConfig } from 'vite-email';

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
  }
});