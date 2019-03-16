<template>
    <div>
        <v-btn @click="ToFormTambah()" small color="orange" dark style="float: right;">Tambah</v-btn>
        <v-data-table
            :headers="headers"
            :items="data_nasabah"
            class="elevation-1"
        >
            <template v-slot:items="props">
                <td>{{ props.index + 1 }}</td>
                <td>{{ props.item.no_rekening }}</td>
                <td>{{ props.item.nama }}</td>
                <td>{{ props.item.alamat }}</td>
                <td>{{ props.item.telepon }}</td>
                <td><v-btn @click="ToFormEdit(props.item.id)" small color="blue" dark>Edit</v-btn>
                <v-btn @click="deleteRow(props.item.id)" small color="red" dark>Delete</v-btn></td>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import { api } from '@/helper/api'
import 'vuetify/dist/vuetify.min.css'

export default {
    name: 'Nasabah',
    data () {
        return {
            headers: [
            { text: 'No', align: 'centre'},
            {
            text: 'No Rekening',
            align: 'centre',
            sortable: false,
            value: 'no_rekening'
          },
            {
            text: 'Nama',
            align: 'centre',
            sortable: false,
            value: 'nama'
          },
          { text: 'Alamat', align: 'centre', value: 'alamat' },
          { text: 'No Telepon', align: 'centre', value: 'telepon' },
          { text: '', sortable: false}
        ],
            data_nasabah: []
        }
    },
    mounted () {
        this.get()
    },
    methods: {
        get () {
            api.get('nasabah').then(res => {
                if (res.data.status === 'success') {
                    this.data_nasabah = res.data.result
                } else {
                    console.log(res.data.message)
                }
            }).catch(err => {
                console.log(err)
            })
        },
        deleteRow(id) {
            api.delete('nasabah/' + id).then((res) => {
                if (res.data.status === 'success') {
                    this.get()
                } else {
                    console.log(res.data.message)
                }
            }).catch(err => {
                console.log(err)
            })
        },
        ToFormEdit(id) {
            this.$router.push('/nasabah/' + id)
        },
        ToFormTambah() {
            this.$router.push('/nasabah/create/')
        }
    }
}
</script>

