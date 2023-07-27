<template>
    <div class="typewriter">
      <p :class="{ 'typewriter-text': true, 'typing-animation': isTyping}" v-bind="$attrs">{{ sentence }}</p>
    </div>
  </template>
  
<style>
.typewriter {    
    width: fit-content;
    padding-right: 10px;
}
.typewriter-text {
    overflow: hidden;
    white-space: nowrap;
    width: 0;    
    border-right: 2px solid transparent;    
}
  
.typing-animation {
    animation: typing 4s steps(40, end) infinite, blink-caret 0.75s step-end infinite;
    animation-direction: alternate;
}
  
@keyframes typing {
    from {
        width: 0;
    }
    10% {
        width: 0
    }
    80% {
        width: 100%;
    }
    100% {
        width: 100%;
    }
}

@keyframes typing-reverse {
    from {
        width: 100%;
    }
    to {
        width: 0;
    }
}
  
  @keyframes blink-caret {
    from, to {
      border-right-color: transparent;
    }
    50% {
      border-right-color: black;
    }
  }
  </style>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  
  const sentence = ref('Bienvenue sur mon portfolio!');
  const isTyping = ref(true);
  
  onMounted(() => {
    // Delay the animation start to ensure it triggers after the initial render
    setTimeout(() => {
      isTyping.value = true;
    }, 100);
  });
  </script>
  