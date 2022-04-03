import ReportService from "@/services/report.service";

const state = {
  reports: null,
};
const getters = {
  getReports(state) {
    return state.reports;
  },
};
const actions = {
  async getReports({ commit }) {
    let response = await ReportService.getAll();
    await commit("setReports", response.data);
    return response.data;
  },
  async createReport({ dispatch }, report) {
    await ReportService.create(report);
    await dispatch("getReports");
  },
  async updateReport({ dispatch }, report) {
    await ReportService.update(report.id, {
      title: report.title,
      content: report.content,
      image: report.image,
    });
    await dispatch("getReports");
  },
  async deleteReport({ dispatch }, report) {
    await ReportService.delete(report.id);
    await dispatch("getReports");
  },
};
const mutations = {
  setReports(state, reports) {
    state.reports = reports;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
