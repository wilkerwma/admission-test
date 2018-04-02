<template >
    <div class="container-fluid">
            <add-lane :boardId="id" :user="parseInt(user)" @new-lane="laneAdded"></add-lane>
            <draggable v-model="lanes" class="row flex-row flex-now">
                <lane :user="parseInt(user)" v-for="(lane, index) in lanes" :key="lane.id" :id="lane.id"></lane>
            </draggable>
    </div>
</template>

<style>
.row {
    overflow-x: scroll;
}
.row > .col-sm-3 {
    display:flex;
    flex: 0 0 270px;
    max-width: 270px;
}
</style>

<script>
import Lane from './Lane.vue';
import AddLane from './AddLane.vue';
import draggable from 'vuedraggable';


export default {
    props: ['user'],
    components: { Lane, draggable, AddLane },
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            lanes: [],
        }
    },
    created() {
        this.fetchBoard();
    },
    methods: {
        fetchBoard() {
          axios.get("/board/" + 1)
                      .then((response) => {
                         this.id  = response.data.data.id;
                         this.lanes = response.data.data.lanes;
                      });
        },
        laneAdded(lane) {
            this.lanes.push(lane);
        }
    }
}
</script>
