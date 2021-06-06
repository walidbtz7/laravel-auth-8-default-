<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-warning text-center">
                  <i class="ti-reload"></i>
                </div>
              </div>

              <div class="col-xs-7">
                <div class="numbers">{{ countProd }}</div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats"><i class="ti-package"></i> Produit</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-success text-center">
                  <i class="ti-medall-alt"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">{{ countCat }}</div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats"><i class="ti-user"></i> Categorie</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Contact Message</h4>
            </div>

            <div class="content table-responsive table-full-width">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Sujet</th>
                    <th>Message</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="contact in contacts" :key="contact.id">
                    <td>{{contact.name}}</td>
                    <td>{{contact.email}}</td>
                    <td>{{contact.phone_number}}</td>
                    <td>{{contact.subject}}</td>
                    <td>{{contact.message}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      countCat: null,
      countProd: null,
     contacts: [],
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/admin/contact")
      .then((response) => (this.contacts = response.data));
        axios
      .get("http://127.0.0.1:8000/api/admin/countcat")
      .then((response) => (this.countCat = response.data));

   axios
      .get("http://127.0.0.1:8000/api/admin/countprod")
      .then((response) => (this.countProd = response.data));
  },

};
</script>

<style>
</style>
