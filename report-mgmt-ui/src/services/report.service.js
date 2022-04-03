import axios from "axios";

const headers = {
  "Content-Type": "application/json",
};

class ReportService {
  async getAll() {
    let response = await axios.get(process.env.VUE_APP_API_URL + "report", {
      headers: headers,
    });
    return response.data;
  }
  async getOne(id) {
    let response = await axios.get(
      process.env.VUE_APP_API_URL + "report/" + id,
      {
        headers: headers,
      }
    );
    return response.data;
  }
  async create(report) {
    return await axios.post(
      process.env.VUE_APP_API_URL + "report",
      {
        title: report.title,
      },
      { headers: headers }
    );
  }
  async update(id, report) {
    return await axios.patch(
      process.env.VUE_APP_API_URL + "report/" + id,
      {
        title: report.title,
      },
      { headers: headers }
    );
  }
  async delete(id) {
    return await axios.delete(process.env.VUE_APP_API_URL + "report/" + id, {
      headers: headers,
    });
  }
}

export default new ReportService();
