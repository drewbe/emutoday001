//browserify entrypoiny
var Vue = require('vue');

import Drew from './components/Drew.vue';


new Vue({
  el: '#app',

  components: { Drew },

  ready() {
      alert('Main Vue Ready!');
  }
});
