<template>
    <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="Add a lane..." v-on:keyup.enter="newLane" v-model="name" />
    </div>
</template>

<style>
.form-control {
    background-color: rgba(0, 0, 0, 0.12);
    border: 0;
    color: #fff;
}
.form-control:hover {
    background-color: rgba(0, 0, 0, 0.2);
}
</style>

<script>
import axios from 'axios';
export default {
    props: {
      boardId: Number,
      user: Number
    },
    // ['boardId', 'userId'],
    data() {
        return {
            name: ''
        }
    },
    methods: {
        newLane() {
            const data = {
                'name': this.name,
                'board_id': this.boardId,
                'user_id': this.user
            };
            console.log(data);
            axios.post('/lane/', data)
                 .then((response) => {
                    this.name = '';
                    this.$emit('new-lane', response.data.data);
                 });
        }
    }
}
</script>
