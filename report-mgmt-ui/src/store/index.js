import Vue from "vue";
import Vuex from "vuex";
import report from "@/store/report";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    report: report,
  },
});
