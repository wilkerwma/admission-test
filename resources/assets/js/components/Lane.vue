<template>
    <div class="col-sm-3" v-on:mouseover="mouseOver" v-on:mouseout="mouseOut">
      <!-- <button v-on:click="deletar">Delete!</button> -->
        <div class="panel panel-default">
            <div class="panel-heading"> <!-- @click="toggleTitleForm" -->
                <!-- <span v-if="!show_title_form">{{ name }}</span> -->
                <span> <!-- v-if="show_title_form"-->
                    <input type="text" ref="titlefield" class="form-control" v-on:keyup.enter="update"  v-model="name" />
                </span>
            </div>
            <div class="panel-body">
                <ul class="list-group mb0">
                  <draggable v-model="tasks" :options="{group:'lanes'}"  @change="changeLane">
                        <task :user="parseInt(user)" v-for="(task, index) in tasks" :key="task.id" :id="task.id" :board_id="board_id"></task>
                  </draggable>
                </ul>
            </div>
            <div class="panel-footer" style="margin-top: 10px;">
                <input type="text" class="form-control input-sm" placeholder="Add new task" v-on:keyup.enter="addTask" v-model="task_name" />
                <select v-model="task_assign">
                  <option v-for="user in users" v-bind:value="user.id">
                    {{ user.name }}
                  </option>
                </select>
            </div>
        </div>
    </div>
</template>

<style>
.panel {
    width: 100%;
    height: fit-content;
}
.list-group-item {
    padding: 5px 15px;
}
.panel-heading {
    color: #333;
    background-color: #e2e4e6 !important;
    font-weight: bold;
    border: 0;
}
.panel-default {
    background-color: #e2e4e6;
    width: 100%;
    /*height: 100%;*/
}
.panel-body {
    padding-top: 0;
    width: 200px;
}
.list-group-item {
    margin: 2px;
    margin-left: 22px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 3px;
}
.panel-footer {
    border-top: 0;
}
</style>

<script>
import draggable from 'vuedraggable';
import axios from 'axios';
export default {
    props: {
      id: Number,
      user: Number
    },
    components: { draggable },
    data() {
        return {
            task_name: '',
            task_assign: 0,
            show_add: false,
            name: '',
            tasks: [],
            board_id: "",
            users: []
        }
    },
    created() {
        this.fetch();
    },
    ready() {
       Echo.channel('task-channel')
           .listen('TaskEdited', (data) => {
              console.log(data);
              //  this.tasks.push({
              //      message: data.chatMessage.message,
              //      username: data.user.name
              //  });
              this.tasks.push({
                id: response.data.data.id,
                name: data.name,
                board_id: data.board_id,
                lane_id: data.lane_id,
                user_id: data.user_id
              });
           });
    },
    methods: {
        fetch() {
            axios.get("/lane/" + this.id)
                 .then((response) => {
                    this.name  = response.data.data.name;
                    this.board_id = response.data.data.board_id;
                    this.tasks = response.data.data.tasks;
                 });
                 axios.get("/users")
                .then((response) => {
                   this.users  = response.data;
                });
        },
        addTask() {
            const data = {
                'lane_id': this.id,
                'name': this.task_name,
                'user_id': this.user,
                'board_id': this.board_id,
                'assigned_to': this.task_assign
            }
            axios.post('/task/', data).then((response) => {
                let last_id = 0;
                if (this.tasks.length > 0) {
                    let last_id = this.tasks[this.tasks.length-1].id + 1;
                }
                this.tasks.push({id: response.data.data.id, name: data.name, board_id: data.board_id, lane_id: data.lane_id, user_id: data.user_id});
            });
            this.new_item = '';
        },
        saveState() {
            axios.put('/task/changeLane', )
                 .then((response) => {
                    //
                 });
        },
        update() {
            const data = {
                id: this.id,
                name: this.name
            }
            axios.put('/lane/' + this.id, data)
                 .then((response) => {
                    this.name = response.data.data.name;
                 });
             this.show_title_form = false;
        },
        deletar() {

        },
        mouseOver() {
            this.show_add = true;
        },
        mouseOut() {
            this.show_add = false;
        },
        changeLane()
        {
          console.log(this.tasks);
          console.log(this.id);
          axios.put('/task/changeLane', {tasks: this.tasks, lane_id: this.id} )
               .then((response) => {
                  //
               });
        }
    }
}

</script>

</script>
