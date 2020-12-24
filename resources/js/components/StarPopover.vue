<template>
    <div :class="'popover signature-' + signature.id + '-popover bs-popover-top'" role="tooltip">
        <div class="arrow"></div>
        <h3 class="popover-header">
            <span>Signature Details</span>
            <button v-if="!edit" class="btn btn-outline-dark btn-sm ml-4" @click="editSignatureDetails" title="Edit Signature"><i class='fas fa-edit'></i></button>
            <button v-if="edit" class='btn btn-outline-success btn-sm submit-update ml-4' @click="updateSignatureDetails" title="Update Signature Details">Update</button>
            <button v-if="edit" class="btn btn-outline-dark btn-sm ml-2" @click="deleteSignature" title="Delete Signature"><i class="far fa-trash-alt"></i></button>
        </h3>
        <div class="popover-body">
            <div :id="'signature-' + signature.id" class="signature-detail-body">
                <strong>Date: </strong>
                <p class="date">
                    <span v-if="!edit">{{ signature.sig_date }}</span>
                    <input v-if="edit" v-model="update.date" name='date' type='date' class='form-control form-control-sm'>
                </p>

                <strong>Listener: </strong>
                <p class="listener">
                    <span v-if="!edit">{{ signature.from_member }}</span>
                    <input v-if="edit" v-model="update.listener" name='listener' type='text' class='form-control form-control-sm'>
                </p>  
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['signature'],
    
    data() {
        return {
            edit: false,
            update: {
                date: this.signature.sig_date,
                listener: this.signature.from_member
            }
        }
    },
    methods: {
        editSignatureDetails() {
            this.edit = true;
        },
        updateSignatureDetails() {
            axios.post('/signatures/' + this.signature.id + '/update', this.update)
                .then((response) => {
                    flashMessage(response.data.title, response.data.message);
                    this.signature.sig_date = this.update.date;
                    this.signature.from_member = this.update.listener;
                    this.edit = false;
                });
        },
        deleteSignature() {
            axios.delete('/signatures/' + this.signature.id + '/delete')
                .then((response) => {
                    flashMessage(response.data.title, response.data.message);
                    //this.$emit('delete-signature', {bookid: this.signature.book_id, chapterid: this.signature.chapter_id});
                    window.location.reload();
                });
        }
    }
}
</script>