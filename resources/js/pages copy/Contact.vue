<template>
<div class="container-fluid">    
    <section class="mt-4 container-xxl">
        <h4 class="text-lg text-center">Contact me</h4>
        <div class="ti-form">            
            <form>
                <MdTextfield
                    label="Lastname *" field="lastname" type="text"
                    v-model:value="form.lastname"
                    :validator="v$"
                ></MdTextfield>
                <MdTextfield
                    label="Firstname *" field="firstname"
                    v-model:value="form.firstname"
                    :validator="v$"                    
                ></MdTextfield>
                <MdTextfield
                    label="Email *" field="email" type="email"
                    v-model:value="form.email"
                    :validator="v$"                    
                ></MdTextfield>
                <MdTextfield
                    label="Phone" field="phone" type="tel"
                    v-model:value="form.phone"
                    :validator="v$"                    
                ></MdTextfield>
                <textarea 
                    class="form-control mb-2" 
                    cols="30" rows="10" v-model="form.msg"
                    placeholder="Leave me a message, I will be happy to read it."
                ></textarea>
                <button class="btn btn-success" @click.prevent="">Contacter</button>
            </form>
        </div>
    </section>
</div>
</template>

<script>
import Hero from '../components/Hero.vue';
// import useVuelidate from '@vuelidate/core';
import MdTextfield from '../components/MdTextfield.vue';
import useValidation from '../composables/useValidation';

export default {
    components: {
        Hero,
        MdTextfield
    }, 
    setup() {        
        const { v$, form, validationData } = useValidation();
        return { v$, form, validationData };
    },
    data() {
        return {
            
        }
    }    
}
</script>

<style>

</style>