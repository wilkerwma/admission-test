<template >
    <div class="container-fluid">
            <draggable v-model="lanes" class="row flex-row flex-now">
                <lane v-for="(lane, index) in lanes" :key="lane.id" :id="lane.id"></lane>
                <!-- <add-lane :boardId="id" @new-lane="laneAdded"></add-lane> -->
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
// import AddLane from './AddLane.vue';
import draggable from 'vuedraggable';


export default {
    props: ['id'],
    components: { Lane, draggable },
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            lanes: []
        }
    },
    created() {
        this.fetchBoard();
    },
    methods: {
        fetchBoard() {
          axios.get("/board/" + this.id)
                      .then((response) => {
                        console.log(response)
                         this.id  = response.data.data.id;
                         this.lanes = response.data.data.lanes;
                      });


                //  .then( res => res.json()
                //  // this.name  = response.data.data.name;
                //     // this.lanes = response.data.data.lanes;
                //  ).then( res => {
                //    console.log(res);
                //  }

                //  );
        },
        laneAdded(lane) {
            this.lanes.push(lane);
        }
    }
}
</script>
