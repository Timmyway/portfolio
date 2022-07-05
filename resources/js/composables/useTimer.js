import { inject, onMounted, reactive, ref } from 'vue';

export default function useTimer() {
    const publicPath = inject('$siteURL');    
    const timerState = ref('stopped');
    const currentTimer = ref(0);
    const pausedtime = ref(0);
    const formattedTime = '00:00:00';
    const ticker = undefined;
    const snackbar = ref(false);
    const laps = [];
    const latestlap = '';
    const notifTime = reactive({
      spacing: 10,
      duration: 3,
      loop: false
    });
    let audio = null;
    onMounted(() => {
        audio = new Audio(`${publicPath}alarm.mp3`);
    })

    function start() {
        if (timerState !== 'running') {
            tick();
            timerState = 'running';
        }      
    }
    function lap() {
        snackbar = true;
        laps.push({
            seconds: currentTimer,
            formattedTime: formatTime(currentTimer)
        });
        latestlap = formatTime(currentTimer);    
    }

    function tick() {
        ticker = setInterval(() => {
            // Play a sound when current timer's time is equal to <notifTime.spacing:int>
            if (notifTime.spacing > 0 && (currentTimer % notifTime.spacing == 0) && currentTimer > 0)
            {
                if (notifTime.loop) {
                    playSound(notifTime.duration);
                } else {
                    playSound(10);
                }            
            }
            currentTimer ++;
            formattedTime = formatTime(currentTimer);
        }, 1000);
    }

    function countdown(countdownValue) {      
        if (timerState !== 'running' && countdownValue > 0) {        
            if (timerState == 'paused') {
            currentTimer = pausedtime;
            } else {
            currentTimer = countdownValue;
            }        
            timerState = 'running';        
            ticker = setInterval(() => {
                currentTimer --;
                formattedTime = formatTime(currentTimer);
                if (currentTimer == 0) {
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
        pausedtime = currentTimer;
        stopSound()
    }

    function stop () {
        window.clearInterval(ticker);
        currentTimer = 0;
        formattedTime = '00:00:00';
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
        
    return { publicPath, timerState, currentTimer, pausedtime, 
        formattedTime, ticker, snackbar, laps, 
        latestlap, notifTime, 
        lap, countdown, start, pause, 
        stop, playSound, stopSound, formatTime
    }
}