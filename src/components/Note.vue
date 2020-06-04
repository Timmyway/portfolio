<template>
<div 
    :class="['note', isDarkMode ? 'dark' : 'light', isTopMost ? 'topmost' : '']" 
    :style="{background: '#' + code}"
    ref="note"
>
    <!-- Top fixed bar to change colors and close note -->    
    <div class="note-action--top" v-show="isTopMost">
        <button @click="$emit('newNote')">New</button>
        <button @click="$emit('deleteNote', noteid)">Delete</button>
        <!-- Note color selector -->
        <select 
            v-model="noteColor" 
            class="note-action--top__select" 
            @change="note.saved = false"
        >            
            <option 
                v-for="(color,index) in variantColors" :key="index" 
                :value="color.name"
                :style="{background: '#' + color.hex}"
                :class="['note-action--top__select__item', color.dark ? 'dark' : 'light']"
            >
                {{ color.name }}
            </option>
        </select>    
        <button @click="minimised = !minimised">{{ minimised ? '+' : '-' }}</button>
    </div>

    <div class="note-header" @mousedown="dragMouseDown">
        <h3 :class="['note-header__author', isDarkMode ? 'dark' : 'light']">Author: {{ author.toUpperCase() }}</h3>        
    </div>

    <div class="note-body" v-show="! minimised">
        <!-- Note heading -->
        <input 
            :class="['note-header__heading', isDarkMode ? 'dark' : 'light']"
            v-model="note.title"
            :readonly="isReadonly"
            @change="note.saved = false"
        >
        <!-- Note content, can be a very long text -->
        <textarea 
            :class="['note-body__textarea', isDarkMode ? 'dark' : 'light']"
            rows="10"
            v-model="note.content"
            :readonly="isReadonly"
            @change="note.saved = false"
        >            
        </textarea>
    </div>

    <div class="note-footer" v-show="!minimised && !isReadonly">
        <button 
            :class="[isDarkMode ? 'dark dark--btn' : 'light light--btn']"
            @click="save"
            :style="{background: note.saved ? '' : 'red'}"
        >Save</button>				
        <button :class="[isDarkMode ? 'dark dark--btn' : 'light light--btn']">Share</button>        
    </div>
</div>
</template>

<script>
import db from '../plugins/Firebase.js';

export default {
    props: {
        noteid: String,
        colorname: String,
        dark: Boolean,
        content: String,
        title: String,
        author: String,
        notesCount: Number,
        currentTopMost: String,
        isReadonly: Boolean,
        pos: Array        
    },
    data() {
        return {
            noteColor: this.colorname,
            variantColors: [],
            pos1: 0,
            pos2: 0,
            pos3: 0,
            pos4: 0,
            notePosition: this.pos,
            topMost: false,
            minimised: false,
            note: {
                title: this.title,
                content: this.content,
                saved: true
            },            
        }
    },
    computed: {
        isSaved() {
            if (this.saved) {
                return true;
            } else {
                return false;
            }
        },
        isTopMost() {
            if (this.currentTopMost === this.noteid) {
                return true;
            } else {
                return false;
            }
        },
        isDarkMode() {
            const selection = this.variantColors.filter((color) => {                
                return color.name === this.noteColor
            });
            if (selection.length > 0) {
                return selection[0].dark;
            } else {
                return this.dark
            }
        },
        code() {
            console.log('Some properties have changed')
            const colorCode = this.variantColors.filter((color) => {   
                return this.noteColor == color.name
            });
            if (colorCode.length > 0) {
                return colorCode[0].hex;
            } else {
                return 'E9C46A';
            }
        },        
    },
    mounted() {        
        this.$refs.note.style.top = this.notePosition[0] + "px";
        this.$refs.note.style.left = this.notePosition[1] + "px";
    },
    created() {        
        // Get colors from database
        db.collection('colors').get().then((snapshot) => {
            snapshot.docs.forEach(doc => {
                this.variantColors.push(doc.data())                
            })
        })        
    },
    methods: {
        save() {
            this.$emit('updateNote', 
                {
                    id: this.noteid, 
                    color: this.noteColor, 
                    title: this.note.title, 
                    content: this.note.content, 
                    pos: this.notePosition
                }
            );
        },
        // Drag note feature
        dragMouseDown(e) {
            this.$emit('update:currentTopMost', this.noteid)
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            this.pos3 = e.clientX;
            this.pos4 = e.clientY;
            document.onmouseup = this.closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = this.elementDrag;
        },
        elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            this.pos1 = this.pos3 - e.clientX;
            this.pos2 = this.pos4 - e.clientY;
            this.pos3 = e.clientX;
            this.pos4 = e.clientY;
            // set the element's new position:
            const top = (this.$refs.note.offsetTop - this.pos2)
            const left = (this.$refs.note.offsetLeft - this.pos1)
            this.notePosition = [top, left];
            this.$refs.note.style.top = top + "px";
            this.$refs.note.style.left = left + "px";
            console.log('Actual position: ', this.pos1, this.pos2, this.pos3, this.pos4)
        },
        closeDragElement() {
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
            this.$emit('updatePos', {id: this.noteid, pos: this.notePosition})
        }
    },    
}
</script>

<style lang="scss" scoped>
.topmost {
    z-index: 9999999 !important;
}
.note {    
    padding: 0.3rem 0.5rem;
    text-align: center;
    min-width: 280px;
    margin: auto;
    font-size: 1.1rem;
    border-radius: 4px;
    position: absolute;
    z-index: 2;
    .note-header {
        cursor: move;
    }
    .note-header__author, .note-header__heading {
        margin: 0.5rem 0.3rem;
        font-size: 1rem;
        padding: 0.5rem;
        width: 100%;
        border-radius: 4px;
        outline: none;
        overflow: hidden;
        text-overflow: ellipsis;
        background: transparent !important;
    }
    .note-body__textarea {
        width: 100%;
        font-size: 1rem;
        background: transparent;
        border: 2px solid transparent;
        padding: 0.5rem;        
        border-radius: 4px;
        &:focus {
            border-bottom: 4px solid grey;
        }
    }
    .note-action--top {        
        position: absolute;        
        top: 1%; right: 2%;
        z-index: 1;        
    }
    .note-action--top__select {
        outline: none;
        border-radius: 4px;
        background: #333333;
        color: white;
        padding: 0.1rem;      
        option {
            font-weight: 100;
            font-size: 1.2rem;             
        }        
    }    
    .note-footer {
        margin: 0.5rem;
        display: flex;
        justify-content: space-around;
        button {
            background: transparent;            
            border: 2px solid transparent;
            padding: 0.5rem 0.8rem;
            font-size: 1rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            &.dark:hover {                
                background: white !important;
                color: #333333 !important;                
            }
            &.light:hover {                
                background: #333333 !important;
                color: white !important;                
            }
        }
    }
    .dark {
        border-color: white !important; 
        color: white !important;        
    }
    .light {
        border-color: #333333 !important;
        color: #333333 !important;        
    }
}
</style>