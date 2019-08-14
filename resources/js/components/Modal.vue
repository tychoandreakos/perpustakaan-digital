<template>
    <div>
        <div class="col-md-12">
            <slot></slot>
            <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
                aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">

                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="py-3 text-center">
                                <i class="ni ni-bell-55 ni-3x"></i>
                                <h4 class="heading mt-4">You should read this!</h4>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white">Ok, Got it</button>
                            <button type="button" class="btn btn-link text-white ml-auto"
                                data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }

</script>

<style>

</style>
