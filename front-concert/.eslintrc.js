module.exports = {
  root: true,
  env: {
    browser: true,
    node: true
  },
  parserOptions: {
    parser: 'babel-eslint',
    ecmaFeatures: {
      legacyDecorators: true
    }
  },
  extends: [
    'plugin:vue/recommended',
    'airbnb-base'
  ],
  // add your custom rules here
  rules: {
  }
}
