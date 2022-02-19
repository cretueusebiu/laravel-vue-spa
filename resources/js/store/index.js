import Vue from "vue";
import Vuex from "vuex";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale/lang/en";
Vue.use(Vuex);
Vue.use(ElementUI, { locale });

// Load store modules dynamically.
const requireContext = require.context("./modules", false, /.*\.js$/);

const modules = requireContext
  .keys()
  .map(file => [file.replace(/(^.\/)|(\.js$)/g, ""), requireContext(file)])
  .reduce((modules, [name, module]) => {
    if (module.namespaced === undefined) {
      module.namespaced = true;
    }

    return { ...modules, [name]: module };
  }, {});

export default new Vuex.Store({
  modules,
  state: {}
});
