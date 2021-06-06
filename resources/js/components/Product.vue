<template>
  <div class="container-lg">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
          </div>
        </div>
        <button class="btn btn-success bg-success text-white" style="margin-left:85%">
          Ajout Produit
        </button>

        <table class="table">
          <thead style="background-color:#0000FF ; color:white ">
            <tr>
              <th style="width: 22%">Serie</th>
              <th style="width: 22%">Categorie</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody style="background-color:#fff;color:#000" >
            <tr v-for="prod in products" :key="prod.id">
              <td>{{ prod.serie }}</td>
              <td>{{ prod.categorie }}</td>
              <td>
                <img
                  v-bind:src="'/storage/image/produit/' + prod.picture"
                  width="90px"
                  v-bind:alt="prod.picture"
                />
              </td>
              <td>
                <button
                  class="btn btn-danger"
                  @click.prevent="deleteProd(prod.id)"
                >
                  supprimer
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import swal from "sweetalert2";

import axios from "axios";

export default {
  data() {
    return {
      products: [],
    };
  },
  methods: {
    getProd() {
      axios
        .get("http://127.0.0.1:8000/api/admin/product")
        .then((response) => (this.products = response.data.data));
    },
    deleteProd(id) {
      // sweet alert confirmation
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          // confirm delete?
          if (result.value) {
            // request delete
            axios
              .delete("http://127.0.0.1:8000/api/admin/product/" + id, {})
              .then(() => {
                // sweet alert success
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                this.getProd(); // reload table admin
              })
              .catch(() => {
                // sweet alert fail
                swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Something went wrong!",
                  footer: "<a href>Why do I have this issue?</a>",
                });
              });
          }
        });
    },
  },
  created() {
    this.getProd();
  },
};
</script>
<style scoped>
body {
  color: #566787;
  background: #f7f5f2;

  font-family: "Roboto", sans-serif;
}
.table-responsive {
  margin: 30px 0;
}
.table-wrapper {
  /* min-width: 1000px; */
  padding: 20px 25px;
  padding: 10%;
  padding: 0%;
  border-radius: 3px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.table-title {
  color: #fff;
  padding: 16px 25px;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
}
.table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
}

table.table {
  table-layout: fixed;
  margin-top: 15px;
}
table.table tr th,
table.table tr td {
  border-color:#e9e9e9;
}
table.table th i {
  font-size: 13px;
  margin: 0 5px;
  cursor: pointer;
}
table.table th:first-child {
  width: 60px;
}
table.table th:last-child {
  width: 120px;
}
table.table td a {
  color: #a0a5b1;
  display: inline-block;
  margin: 0 5px;
}
table.table td a.view {
  color: #03a9f4;
}
table.table td a.edit {
  color: #ffc107;
}
table.table td a.delete {
  color: #e34724;
}
table.table td i {
  font-size: 19px;
}
</style>
