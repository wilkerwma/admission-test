<template>
  <li class="list-group-item">
    <input type="text" class="form-control input-sm" placeholder="Add new item" v-on:keyup.enter="updateName" v-model="name" />
       <!-- Task: {{name}} <br> -->
      Assigned to: {{user_name}}
      <br>
      <select v-model="task_assign_update">
        <option @selected="updateAssign" v-for="user in users" v-bind:value="user.id">
          {{ user.name }}
        </option>
      </select>
      <!-- <button v-on:click="deleteTask">Delete</button> -->
      <button v-confirm="{ok: deleteTask, message: 'Do you really want to delete the task?'}">Delete</button>
  </li>
</template>

<script>
import draggable from 'vuedraggable';
import axios from 'axios';
import VuejsDialog from "vuejs-dialog"

export default {
  props: {
    id: Number,
    user: Number,
    board_id: Number
  },
  components: { draggable },
  data() {
      return {
          name: '',
          task_assign_update: 0,
          lane_id: '',
          users: [],
          user_name: ''
      }
  },
  created() {
      this.fetch();
  },
  methods: {
      fetch() {
          axios.get("/task/" + this.id)
               .then((response) => {
                  this.name  = response.data.data.name;
                  this.task_assign_update = response.data.data.assigned_to;
                  this.user_name = response.data.data.user_name;
                  this.lane_id = response.data.data.lane_id;
               });
               axios.get("/users")
                    .then((response) => {
                       this.users  = response.data;
                    });
      },
      addTask() {
          const data = {
              'lane_id': this.id,
              'name': this.new_item,
              'user_id': this.user,
              'board_id': this.board_id
          }
          axios.post('/task/', data).then((response) => {
              let last_id = 0;
              if (this.tasks.length > 0) {
                  let last_id = this.tasks[this.tasks.length-1].id + 1;
              }
              this.tasks.push({id: response.data.data.id, name: data.name});
          });
          this.new_item = '';
      },
      saveState() {
          axios.put('/task/update-order/', {tasks: this.tasks})
               .then((response) => {
                  //
               });
      },
      updateName() {
          const data = {
              id: this.id,
              name: this.name,
              assigned_to: this.task_assign_update
          }
          axios.put('/task/' + this.id, data)
               .then((response) => {
                  this.name = response.data.data.name;
               });
           this.show_title_form = false;
      },
      updateAssign() {
          const data = {
              id: this.id,
              name: this.name,
              assigned_to: this.task_assign_update
          }
          axios.put('/task/' + this.id, data)
               .then((response) => {
                  this.name = response.data.data.name;
               });
           this.show_title_form = false;
      },
      deleteTask() {
        axios.delete('task/' + this.id);
      },
      mouseOver() {
          this.show_add = true;
      },
      mouseOut() {
          this.show_add = false;
      },
      toggleTitleForm() {
          this.show_title_form = !this.show_title_form;
          // Use nextTick because the element might not be in the DOM yet
          this.$nextTick(() => {
              if (this.$refs.titlefield) {
                  this.$refs.titlefield.focus();
                  this.$refs.titlefield.select();
              }
          })
      }
  }
}
</script>
