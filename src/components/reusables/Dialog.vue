<template>
  <div class="dialog">      
      <div class="dialog-body" v-if="dialog">
          <span>{{ message }}</span>
            <button class="dialog__ok" @click="okAction">OK</button>
            <button class="dialog__cancel" @cancel="cancelAction">Cancel</button>
      </div>
  </div>
</template>

<script>
export default {
    props: {
        message: String,
        dialog: Boolean
    },
    data() {
        return {
            
        }
    },
    methods: {
        okAction() {
            this.value = 1;
            this.dialog = false;
        },
        okCancel() {
            this.value = 0;
            this.dialog = false;
        }
    }
}
</script>

<style>

</style>