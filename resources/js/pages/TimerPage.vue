<template>
<div>
    <div class="control">
        <div class="control__division">
            <div class="form-group">
                <label class="mr-2">Sonnez après (seconds)</label>
                <input
                    type="number"
                    class="form-control"
                    v-model="notifTime.spacing"            
                    :rules="[notifTime.spacing > 1 && notifTime.spacing <= 3600]"
                    style="max-width: 120px; min-width: 100px;"
                />
            </div>
        </div>
        <div class="control__division ml-1">
            <div class="form-group">
                <label>En boucle</label>
                <input type="checkbox"
                    class="checkbox--lg ml-1"
                    v-model="notifTime.loop"            
                    color="primary"                        
                />
                <button class="btn btn-icon"
                    @click="stopSound"             
                >
                    <i class="fa-solid fa-hourglass text-primary"></i>
                </button>
            </div>
        </div>
    </div>
    <Timer         
        :notifTime="notifTime"
        @notif="notifUser"
    >
    </Timer>    
</div>

<transition name="fade">
<div v-if="notif.isVisible" class="notif" :class="`bg-${notif.type}`">  
    <div class="notif__container">
        <span class="notif__msg">{{ notif.msg }}</span>
        <button class="notif__btn-close btn btn-danger btn-sm" @click="notif.isVisible = false">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
</transition>
</template>

<script>
import Timer from '../components/Timer.vue';
import { reactive } from 'vue';

export default {
    name: 'TimerPage',

    components: {    
        Timer
    },
    setup() {
        const notifTime = reactive({
            spacing: 3600,
            duration: 3,
            loop: false
        });

        let notif = reactive({ type: 'danger', msg: '', isVisible: false });

        function notifUser($event) {
            console.log($event);
            notif.msg = $event.msg;
            notif.type = $event.type;
            notif.isVisible = true;
            setTimeout(() => {
                notif.isVisible = false;
            }, 3000)
        }

        return { notifTime, notif, notifUser }
    }
};
</script>
<style scoped>
.form-group {
    display: flex; flex-direction: row; align-items: center;
    justify-content: center;  
}

.notif {
    padding: 1rem;
    width: 60%;
    position: absolute;
    bottom: 0; right: 1%;
    border-radius: 6px;    
}
.notif__container {
    position: relative;
}
.notif__msg {
    font-size: 1.6rem;
}
.notif__btn-close {
    position: absolute;
    right: 1%;
    top: 50%;
    transform: translate(0, -50%);
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .6s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>