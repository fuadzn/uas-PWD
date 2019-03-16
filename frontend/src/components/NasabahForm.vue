<template>
    <v-container style="max-width: 600px">
            <v-form
                ref="form"
                @submit.prevent="submitForm()">
                <v-text-field
                v-model="nasabah.no_rekening"
                label="No Rekening"
                required
                ></v-text-field>

                <v-text-field
                v-model="nasabah.nama"
                label="Nama"
                required
                ></v-text-field>

                <v-text-field
                v-model="nasabah.alamat"
                label="Alamat"
                required
                ></v-text-field>
                
                <v-text-field
                v-model="nasabah.telepon"
                label="No Telepon"
                required
                ></v-text-field>
            <button type="submit">Save</button>
            </v-form>
    </v-container>
</template>

<script>
import { api } from '@/helper/api'

export default {
    name: 'NasabahForm',
    data () {
        return {
            nasabah: {
                id: null,
                no_rekening: '',
                nama: '',
                alamat: '',
                telepon: ''
            }
        }
    },
    mounted() {
        let id = this.$route.params.id

        if (id != null) {
            api.get('/nasabah/' + id).then(res => {
                this.nasabah.id = res.data.result.id
                this.nasabah.no_rekening = res.data.result.no_rekening
                this.nasabah.nama = res.data.result.nama
                this.nasabah.alamat = res.data.result.alamat
                this.nasabah.telepon = res.data.result.telepon
            })
        }
    },
    methods: {
        submitForm () {
            let data = this.nasabah
            let url = 'nasabah'
            
            if (this.nasabah.id) {
                url += '/' + this.nasabah.id
            }
            
            api.post(url, data).then(res => {
                if (res.data.status === 'success') {
                    this.$router.push({name: 'Nasabah'})
                } else {
                    console.log(res.data.message)
                }
            }).catch(err => {
                console.log(err)
            })
        }
    } 
}
</script>
