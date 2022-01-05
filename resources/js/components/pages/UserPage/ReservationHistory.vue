<template>
    <div>
        <v-container>
            <v-row no-gutters v-for="(reserve,index) in reserves" :key="index">
                <v-col>{{ reserve.address }}</v-col>
                <v-col>{{ reserve.date }}{{ reserve.start_time }}-{{ reserve.end_time }}</v-col>
                <v-col><Button buttonName="詳細"></Button></v-col>
            </v-row>
        </v-container>
        this is ReservationHistoryPage.
    </div>
</template>
<script>
    import Button from '../../Button.vue'
    export default{
        data() {
            return {
            reserves: [
                {
                    address: 'sample1',
                    date: '0000-00-00',
                    start_time: '00:00:00',
                    end_time: '00:00:00',
                },
                {
                    address: 'sample2',
                    date: '0000-11-22',
                    start_time: '16:10:00',
                    end_time: '18:10:00',
                },
                {
                    address: 'sample3',
                    date: '0000-00-00',
                    start_time: '00:00:00',
                    end_time: '00:00:00',
                },
            ],
            }
        },
        components:{
            Button,
        },
    }
</script>
