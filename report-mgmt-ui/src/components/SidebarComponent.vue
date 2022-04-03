<template>
  <v-navigation-drawer permanent width="100%">
    <v-row class="fill-height" no-gutters>
      <v-navigation-drawer
        dark
        mini-variant
        mini-variant-width="60"
        permanent
        height="700"
      >
        <v-list-item class="primaryBgColor">
          <v-icon>mdi-lightning-bolt</v-icon>
        </v-list-item>

        <v-divider></v-divider>
        <p>{{ watch }}</p>
      </v-navigation-drawer>

      <v-list class="grow" max-width="300">
        <v-list-item v-for="report in reports" :key="report.id" link>
          <v-list-item-icon class="mr-2">
            <v-icon>mdi-lightning-bolt</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title
              v-show="!report.edit"
              v-text="report.title"
            ></v-list-item-title>
            <v-list-item-title v-show="report.edit">
              <v-text-field
                v-model="reportTitleForUpdate"
                placeholder="edit report"
                outlined
                dense
                @keydown.esc="setReportEdit(report, false)"
                @keydown.enter="updateReport(report)"
              ></v-text-field>
            </v-list-item-title>
          </v-list-item-content>
          <v-menu v-if="!report.edit">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="black" icon v-bind="attrs" v-on="on">
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item @click="setReportEdit(report, true)">
                <v-list-item-icon class="mr-2">
                  <v-icon> mdi-pencil-outline </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title> rename </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item @click="deleteReport(report)">
                <v-list-item-icon class="mr-2">
                  <v-icon> mdi-delete-outline </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title> delete </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-list-item>
        <v-list-item v-if="showAddReport">
          <v-list-item-content>
            <v-list-item-title>
              <v-text-field
                v-model="reportTitleForCreate"
                placeholder="new report"
                outlined
                dense
                @keydown.esc="setShowAddReport(false)"
                @keydown.enter="createReport"
              ></v-text-field>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="!loading" @click="setShowAddReport(true)">
          <v-list-item-icon class="mr-2">
            <v-icon color="#42b983">mdi-plus-circle-outline</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title class="primaryColor">
              Save Report
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-row>
  </v-navigation-drawer>
</template>

<script>
import store from "@/store";
export default {
  name: "SidebarComponent",
  data() {
    return {
      reports: [],
      loading: true,
      showAddReport: false,
      reportTitleForCreate: "",
      reportTitleForUpdate: "",
      watch: 1,
    };
  },
  async mounted() {
    this.loading = true;
    this.reports = await store.dispatch("getReports");
    this.reports.forEach((report) => {
      report.edit = false;
    });
    this.loading = false;
  },
  methods: {
    setShowAddReport(value) {
      this.reportTitleForCreate = "";
      this.showAddReport = value;
    },
    async createReport() {
      await store.dispatch("createReport", {
        title: this.reportTitleForCreate,
      });
      this.reports = store.getters.getReports;
      this.showAddReport = false;
    },
    setReportEdit(report, value) {
      this.reportTitleForUpdate = "";
      report.edit = value;
      this.watch++;
    },
    async updateReport(report) {
      await store.dispatch("updateReport", {
        id: report.id,
        title: this.reportTitleForUpdate,
      });
      report.edit = false;
      this.reports = store.getters.getReports;
      this.reportTitleForUpdate = "";
    },
    async deleteReport(report) {
      await store.dispatch("deleteReport", {
        id: report.id,
        title: this.reportTitleForUpdate,
      });
      this.reports = store.getters.getReports;
    },
  },
};
</script>

<style scoped></style>
