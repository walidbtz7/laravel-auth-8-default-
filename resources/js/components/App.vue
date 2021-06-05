<template>
  <div class="container-lg">
    <div class="table-responsive">
      <form v-on:submit.prevent="submitForm">
        <div class="form-group">
          <label for="exampleFormControlInput1">Serie</label>
          <input
            type="text"
            class="form-control"
            v-model="form.serie"
            id="exampleFormControlInput1"
            placeholder="nom de produit"
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">categorie</label>
          <select
            class="form-control"
            id="exampleFormControlSelect1"
            v-model="form.categorie_id"
          >
            <option
              v-for="option in categories"
              :key="option.title"
              :value="option.id"
            >
              {{ option.title }}
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Image</label>
          <input
            type="file"
            class="form-control"
            id="file"
            ref="file"
            v-on:change="handleFileUpload"
          />
        </div>
        <button type="submit" class="btn btn-primary">ajoute</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      categories: {},
      image:null,
      form: {
        serie: "",
        categorie_id: "",
        file: null
      },
    };
  },

  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/admin/categories")
      .then((response) => (this.categories = response.data.data));
  },
  methods: {
    handleFileUpload(e) {
           this.form.file = e.target.files[0];

    },
    submitForm() {
        let formData = new FormData();

        formData.append("serie", this.form.serie);
        formData.append("categorie_id", this.form.categorie_id);
        formData.append("file", this.form.file);
      axios
        .post("http://127.0.0.1:8000/api/admin/product",formData)
        .then((res) => {
          console.log("le produit est bien ajouter");
        })
        .catch((error) => {
          console.log("le produit est ne pas ajouter");
        })
        .finally(() => {
          //Perform action in always
        });
    },
  },
};
</script>

<style>
</style>
