<template>
<div class="container mx-auto p-4" :style="{ backgroundColor: bgcolor }">
    <div class="timer-card space-y-4">
        <div class="timer-card__title">
            {{ formattedTime }}
        </div>

        <div class="timer-card__subtitle p-2">
            <div class="control__division">
                <div class="flex items-center gap-4 flex-wrap">
                    <label for="chk-countdown-mode">Compte à rebours</label>
                    <input type="checkbox"
                        class="w-8 h-8"
                        for="chk-countdown-mode"
                        v-model="countdownMode"
                    >
                </div>
            </div>
        </div>

        <div class="timer-card__text border border-gray-300 px-3 py-4" v-if="countdownMode">
            <div class="control space-y-2">
                <div class="control__division">
                    <!-- Maximum value allowed for countdown -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <label for="input-text-max-value">Max (86399sec)</label>
                        <input type="number"
                            id="input-number-max-value"
                            class="form-control ml-1"
                            v-model="countdownValueMax"
                            :rules="[countdownValueMax > 0 && countdownValueMax < 86400]"
                            style="max-width: 160px; min-width: 100px;"
                        />
                    </div>
                </div>
                <!-- Step value for countdown slider -->
                <div class="control__division">
                    <div class="flex items-center gap-2 flex-wrap">
                        <label for="input-number-step">Step (max 3600sec)</label>
                        <input type="number"
                            class="form-control ml-1"
                            v-model="countdownValueStep"
                            :rules="[countdownValueStep > 1 && countdownValueStep <= 3600]"
                            style="max-width: 120px; min-width: 100px;"
                        />
                    </div>
                </div>

                <div class="control__division">
                    <!-- Slider that let selecting countdown time -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <label for="slider-countdown">Durée (en secondes)</label>
                        <input type="range"
                            :style="{ minWidth: '120px'}"
                            class="form-control ml-1"
                            id="slider-countdown"
                            :min="countdownValueMin"
                            :max="countdownValueMax"
                            :step="countdownValueStep"
                            v-model="countdownValue"
                        >
                        <div :style="{fontSize: '2rem'}">
                            {{ formatTime(countdownValue) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div>
            <ul class="flex flex-col gap-4">
                <li class="timer-card-list__item bg-success"
                    v-if="countdownMode"
                    @click="countdown"
                >
                    <span class="font-bold uppercase">Compte à rebours</span>
                </li>

                <li class="timer-card-list__item bg-green-400"
                    v-if="!countdownMode"
                    @click="start"
                >
                    <i class="fas fa-play"></i>
                </li>

                <li class="timer-card-list__item bg-yellow-400"
                    @click="lap"
                    :disabled="timerState == 'stopped' || timerState == 'paused'"
                >
                    <i class="fas fa-flag"></i>
                </li>

                <li class="timer-card-list__item bg-orange-400"
                    @click="pause"
                    :disabled="timerState == 'stopped' || timerState == 'paused'"
                >
                    <i class="fas fa-pause"></i>
                </li>

                <li class="timer-card-list__item bg-red-400 mb-3"
                    @click="stop"
                    :disabled="timerState == 'stopped'"
                >
                    <i class="fas fa-stop"></i>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>

<script setup>
import { inject, onMounted, reactive, ref } from 'vue';

const props = defineProps({
    notifTime: {
        type: Object
    },
    bgcolor: {
        type: String,
        default: '#000000'
    }
});

// Datas
let countdownMode = ref(false);
let countdownValue = ref(60);
let countdownValueMax = ref(600);
let countdownValueMin = ref(0);
let countdownValueStep = ref(30);

let timerState = ref('stopped');
let formattedTime = ref('00:00:00');

const publicPath = inject('$siteURL');
let currentTimer = ref(0);
let pausedtime = ref(0);
let ticker = undefined;
const snackbar = ref(false);
let laps = reactive([]);
let latestlap = ref('');
let audio = null;

// Life cycle hook
onMounted(() => {
    audio = new Audio(`${publicPath}alarm.mp3`);
})

// Methods
function start() {
    if (timerState !== 'running') {
        tick();
        timerState = 'running';
    }
}

const emit = defineEmits(['update:notif'])

function lap() {
    emit('update:notif', {msg: 'New lap added', type: 'success'});
    laps.push({
        seconds: currentTimer.value,
        [formattedTime.value]: formatTime(currentTimer.value)
    });
    latestlap.value = formatTime(currentTimer.value);
}

function tick() {
    ticker = setInterval(() => {
        // Play a sound when current timer's time is equal to <props.notifTime.spacing:int>
        if (props.notifTime.spacing > 0 && (currentTimer.value % props.notifTime.spacing == 0) && currentTimer.value > 0)
        {
            if (props.notifTime.loop) {
                playSound(props.notifTime.duration);
            } else {
                playSound(10);
            }
        }
        currentTimer.value ++;
        formattedTime.value = formatTime(currentTimer.value);
    }, 1000);
}

function countdown() {
    if (timerState !== 'running' && countdownValue.value > 0) {
        if (timerState == 'paused') {
        currentTimer.value = pausedtime;
        } else {
        currentTimer.value = countdownValue.value;
        }
        timerState = 'running';
        ticker = setInterval(() => {
            currentTimer.value --;
            formattedTime.value = formatTime(currentTimer.value);
            if (currentTimer.value == 0) {
                stop();
                playSound(5)
            }
        }, 1000);
    }
}

function formatTime (seconds) {
    // Format to h:m:s time
    let measuredTime = new Date(null);
    measuredTime.setSeconds(seconds);
    let MHSTime = measuredTime.toISOString().substr(11, 8);
    return MHSTime;
}

function pause () {
    window.clearInterval(ticker);
    timerState = 'paused';
    pausedtime = currentTimer.value;
    stopSound()
}

function stop () {
    window.clearInterval(ticker);
    currentTimer.value = 0;
    formattedTime.value = '00:00:00';
    timerState = 'stopped';
    stopSound()
}

function playSound(duration = -1) {
    if (duration > 0) {
        audio.play();
        setTimeout(() => {
            stopSound()
        }, duration * 1000)
    } else {
        audio.play();
    }
}

function stopSound() {
    audio.pause();
}
</script>

<style lang="scss">
.timer-card {
    background-color: #F7F5FB;
    border-radius: 26px 0 26px 0;
    transition: transform .4s;
    padding: 1rem;
}
.timer-card-list__item {
    list-style-type: none;
    padding: 1.5rem 2rem;
    font-size: 2rem;
    border-radius: 6px;
    cursor: pointer;
    display: flex; align-items: center;
}
.timer-card__title {
    background: #1E1E1E;
    color: white;
    font-weight: bold;
    font-size: 2rem;
    text-transform: uppercase;
    text-align: center;
    @media screen and (min-width:  992px) {
        font-size: 4rem;
    }
}
.control {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}
@media screen and (min-width: 720px)  {
    .timer-card__title {
        font-size: 6rem;
    }
}

</style>
