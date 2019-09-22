<template>
    <div>
        <button @click="showDenda" style="display: inline" type="button" class="btn btn-sm btn-success"
            data-toggle="tooltip" data-placement="top" title="Bayar Disini">
            {{ total }}
        </button>

        <modal height="auto" name="eksemplar">
            <denda-component @closeDenda="hideDenda" @updateDenda="getResults" :denda="item2" :total="total"
                :store="stores">
            </denda-component>
        </modal>
    </div>
</template>

<script>
    import * as moment from 'moment'
    var momentRange = require('moment-range');
    momentRange.extendMoment(moment);
    const convertRupiah = require('rupiah-format');
    import Denda from './Denda';

    export default {
        props: ['dend', 'val', 'item2', 'stores', 'index'],

        data() {
            return {
                total: '',
            }
        },

        components: {
            DendaComponent: Denda,
        },

        created() {
            this.denda();
        },

        methods: {
            getResults() {
                 window.location = this.index;
            },

            showDenda() {
                this.$modal.show('eksemplar');
            },
            hideDenda() {
                this.$modal.hide('eksemplar');
            },

            format(angka) {
                return angka.split(',')[0];
            },

            denda() {
                var a = moment();
                var b = this.val;
                this.total = this.format(convertRupiah.convert(a.diff(b, 'days') * this.dend));
            }
        }
    }

</script>

<style>

</style>
