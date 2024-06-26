window.axios = require('axios');

import Fuse from 'fuse.js';
import { createApp } from 'vue';
import Search from './components/Search.vue';
import hljs from 'highlight.js/lib/core';
import VueDisqus from 'vue-disqus';

window.Fuse = Fuse;

// Syntax highlighting
hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightElement(block);
});

const app = createApp({});

app.component('search', Search);
app.use(VueDisqus);
app.mount('#app');
